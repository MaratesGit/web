<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_mdl');
        $this->load->model('mainpage_mdl');
        $this->load->model('settingdata_mdl');
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('Layouts');
        $this->load->library('form_validation');
    }
   
// ================= информация о всех настройках ===========================
    
    function all_setting() {
        
        $rules = $this->login_mdl->isLogginingUser();
        switch ($this->input->get('error')) {
        case '1':
            $data_header['error_'] = 'Внимание!';
            $data_header['error_text'] = 'Параметры рефлектометра не были выбраны';
            break;
        }
        switch ($this->input->get('success')) {
        case '1':
            $data_header['success_'] = 'Успешно!';
            $data_header['success_text'] = 'Параметры рефлектометра изменены';
            break;
        }
        $data_header['null'] = '';
        $puls = '';
        if ($rules == false) {
            redirect('userlogin/login', 'refresh');
        } elseif ($rules == 1) {  //** is admin
            $data = $this->login_mdl->getSessionUserName();
            $this->layouts->set_user_name($data);
            $fiberinfo = $this->settingdata_mdl->getOtdrFiberInfo();
            $otdr_data['otdr_info'] = $fiberinfo;
                foreach($fiberinfo as $id){
                    $puls[$id['id_otdr']] = $this->settingdata_mdl->getPD($id['id_otdr']);
                }
            $otdr_data['system'] = $this->settingdata_mdl->get_data_tcp();
            $otdr_data['puls'] = $puls;
            $otdr_data['error'] = $data_header;
            $otdr_data['success'] = $data_header;
            $otdr_data['fiber_group'] = $this->settingdata_mdl->getFiberGroup();
            $this->layouts->set_treeview($fiberinfo);
            $this->layouts->set_title('Настройки');
            $this->layouts->view('settings_view/settings_view', $otdr_data);
                        
        } else {//** is user
            $data = $this->login_mdl->getSessionUserName();
            $this->layouts->set_user_name($data);
            $fiberinfo = $this->settingdata_mdl->getOtdrFiberInfo();
            $otdr_data['otdr_info'] = $fiberinfo;
            $otdr_data['error'] = $data_header;
            $otdr_data['success'] = $data_header;
            $otdr_data['fiber_group'] = $this->settingdata_mdl->getFiberGroup();
            $this->layouts->set_treeview($fiberinfo);
            $this->layouts->set_title('Настройки');
            $this->layouts->view('settings_view/settings_view', $otdr_data);
        }
    }
    
    
    
}