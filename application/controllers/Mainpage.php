<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mainpage extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('mainpage_mdl');
        $this->load->model('otdrdata_mdl');
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('Layouts');
        $this->load->library('form_validation');
    }

    function index()
    {
        $rules = $this->login_mdl->isLogginingUser();

        switch ($this->input->get('error')) {
            case '1':
                $data_header['error_'] = 'Внимание!';
                $data_header['error_text'] = 'Необходимо заполнить все поля';
                break;
            case '2':
                $data_header['error_'] = 'Внимание!';
                $data_header['error_text'] = 'Пользователя не существует';
                break;
            case '3':
                $data_header['error_'] = 'Внимание!';
                $data_header['error_text'] = 'Ошибка добавления параметров в БД';
                break;
        }
        switch ($this->input->get('success')) {
            case '1':
                $data_header['success_'] = 'Успешно!';
                $data_header['success_text'] = 'Рефлектометр добавлен в БД';
                break;
            case '2':
                $data_header['success_'] = 'Успешно!';
                $data_header['success_text'] = 'Рефлектометр удален из базы';
                break;
            case '3':
                $data_header['success_'] = 'Успешно!';
                $data_header['success_text'] = 'Параметры добавлены в БД';
                break;
        }

        $data_header['null'] = '';

        if ($rules == false) {
            redirect('userlogin/login', 'refresh');
        }
        $this->load->model('alarm_mdl');
        $this->load->model('reflect_mdl');
        $data = $this->login_mdl->getSessionUserName();
        $fiberinfo = $this->otdrdata_mdl->getOtdrFiberInfo();
        $otdr_info['otdr_info'] = $fiberinfo;
        $otdr_info['error'] = $data_header;
        $otdr_info['success'] = $data_header;
        $this->layouts->set_treeview($fiberinfo);
        $this->layouts->set_user_name($data);
        $this->layouts->set_title('ВОЛС');
        $otdr_info['alarms'] = $this->alarm_mdl->getAckAlarms();
        for ($i = 0; $i < count($otdr_info['alarms']); $i++) {
            $otdr_info['alarms'][$i]['point'] = $this->reflect_mdl->convertDotToMeter($otdr_info['alarms'][$i]['point'], $otdr_info['alarms'][$i]['ds']);
        }
        if ($rules == 1) {
            //** is admin
            if ($otdr_info['otdr_info'] != NULL) {
                $this->layouts->view('main_view/main_view', $otdr_info, array('add_otdr' => 'main_view/button_add_otdr'));
            } else {
                $this->layouts->view('main_view/clear_view', $otdr_info, array('add_otdr' => 'main_view/button_add_'));
            }
        } else {
            if ($otdr_info['otdr_info'] != NULL) {
                $this->layouts->view('main_view/main_view', $otdr_info);
            } else {
                $this->layouts->view('main_view/clear_view', $otdr_info);
            }
        }
    }

    // ================= настройки =============================================
//    function all_setting() {
//        $data = $this->login_mdl->getSessionUserName();
//    //   $otdr_info['otdr_info'] = $this->otdrdata_mdl->getAllOtdrdata();
//        $fiberinfo = $this->otdrdata_mdl->getOtdrFiberInfo();
//        $this->layouts->set_treeview($fiberinfo);
//        $otdr_info['otdr_info'] = $fiberinfo;
//        $this->layouts->set_user_name($data);
//        $this->layouts->set_title('Настройки');
//        $this->layouts->view('settings_view/settings_view', $otdr_info);
//        //$this->layouts->view('main_view/clear_view', array('latest' => 'settings_view/settings_view'),$otdr_info);
//    }
    // ================= информация о опт. волокна ===========================
//    function optikainfo($id_fiber){
//        $data = $this->login_mdl->getSessionUserName();
//        $fiberinfo = $this->otdrdata_mdl->getOtdrFiberInfo();
//        $fiber_data['fiber_data'] = $this->otdrdata_mdl->getFiberdata($id_fiber);
//        $this->layouts->set_user_name($data);
//        $this->layouts->set_treeview($fiberinfo);
//        $this->layouts->set_title('Информация ');
//        $this->layouts->view('optika_view/optika_view',$fiber_data);
//    }
    function eventsinfo()
    {
        $data = $this->login_mdl->getSessionUserName();
        $fiberinfo = $this->otdrdata_mdl->getOtdrFiberInfo();
        $this->load->model('alarm_mdl');
        $this->load->model('reflect_mdl');

        $this->layouts->set_user_name($data);
        $this->layouts->set_treeview($fiberinfo);
        $this->layouts->set_title('Информация ');
        $data_alarm['alarms'] = $this->alarm_mdl->getAckAlarms();
        for ($i = 0; $i < count($data_alarm['alarms']); $i++) {
            $data_alarm['alarms'][$i]['point'] = $this->reflect_mdl->convertDotToMeter($data_alarm['alarms'][$i]['point'], $data_alarm['alarms'][$i]['point']);
        }
        $this->layouts->view('events_view/events_view', $data_alarm);
    }

    function add_otdr()
    {
        $otdr_name = $this->input->post('otdr_name');
        $otdr_imei = $this->input->post('otdr_imei');
        $otdr_port = $this->input->post('otdr_ports_count');
        $otdr_act = $this->input->post('otdr_active');

        if (!isset($otdr_act))
            $otdr_act = "0";
        $otdr_cert = $this->input->post('otdr_cert');
        if (!isset($otdr_cert))
            $otdr_cert = "0";
        $otdr_poverka = $this->input->post('otdr_poverka');

        if ($this->otdrdata_mdl->insert_otdr($otdr_name, $otdr_imei, $otdr_port, $otdr_act, $otdr_cert, $otdr_poverka)) {
            redirect('mainpage?success=1');
        } else {
            redirect('mainpage?error=1');
        }
    }

    function delete_otdr($id_otdr = 0)
    {

        if (empty($id_otdr)) {
            show_404();
        }
        $this->otdrdata_mdl->delete_($id_otdr);
        redirect('mainpage?success=2');
    }
}
