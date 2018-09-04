<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Otdrpage extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_mdl');
        $this->load->model('mainpage_mdl');
        $this->load->model('otdrdata_mdl');
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('Layouts');
        $this->load->library('form_validation');
    }
   
// ================= информация о рефлектометрах из сайдбара ===========================
    
    function otdrinfo($id_otdr) {
        
        $rules = $this->login_mdl->isLogginingUser();
        switch ($this->input->get('error')) {
        case '1':
            $data_header['error_'] = 'Внимание!';
            $data_header['error_text'] = 'Параметры рефлектометра не были выбраны';
            break;
        case '2':
            $data_header['error_'] = 'Внимание!';
            $data_header['error_text'] = 'Ошибка удаления параметров';
            break;
        case '3':
            $data_header['error_'] = 'Внимание!';
            $data_header['error_text'] = 'Параметры оптической линии введены не полностью';
            break;
        }
        switch ($this->input->get('success')) {
        case '1':
            $data_header['success_'] = 'Успешно!';
            $data_header['success_text'] = 'Параметры рефлектометра изменены';
            break;
        case '2':
            $data_header['success_'] = 'Успешно!';
            $data_header['success_text'] = 'Параметры удалены из БД';
            break;
        case '3':
            $data_header['success_'] = 'Успешно!';
            $data_header['success_text'] = 'Оптическая линия добавлена';
            break;
        case '4':
            $data_header['success_'] = 'Успешно!';
            $data_header['success_text'] = 'Оптическая линия удалена';
            break;
        }
        $data_header['null'] = '';
     //   $otdr_data['pul_d'] = '';
        if ($rules == false) {
            redirect('userlogin/login', 'refresh');
        } elseif ($rules == 1) {  //** is admin
            $data = $this->login_mdl->getSessionUserName();
            $this->layouts->set_user_name($data);
            $fiberinfo = $this->otdrdata_mdl->getOtdrFiberInfo();
            $fiber_otdr['info'] = $this->otdrdata_mdl->getFiberOtdr($id_otdr);
            $otdr_data['otdr_info'] = $this->otdrdata_mdl->getOtdrdata($id_otdr);
            $otdr_data['error'] = $data_header;
            $otdr_data['success'] = $data_header;
            $otdr_data['pul_d'] = $this->otdrdata_mdl->getPD($id_otdr);
            $otdr_data['range_l'] = $this->otdrdata_mdl->getRL($id_otdr);
            $otdr_data['wave_l'] = $this->otdrdata_mdl->getWL($id_otdr);
            $otdr_data['time_l'] = $this->otdrdata_mdl->getTA($id_otdr);
            $otdr_data['fiber_group'] = $this->otdrdata_mdl->getFiberGroup();
            // временно добавление группы волокна 
            if (empty($otdr_data['fiber_group'])){
                $this->otdrdata_mdl->add_fiber_group();
                $otdr_data['fiber_group'] =  $otdr_data['fiber_group'] = $this->otdrdata_mdl->getFiberGroup();
            }
            //***********************************
            $this->layouts->set_treeview($fiberinfo);
            $this->layouts->set_title('Информация о приборе');
            if ( $fiber_otdr['info'] != NULL){
            $this->layouts->view('pribor_view/pribor_view', $otdr_data, array('add_param' => 'pribor_view/button_add_param', 'add_param_opt' => 'pribor_view/button_add_opt'));
            } else {
            $this->layouts->view('pribor_view/pribor_view', $otdr_data, array('add_param' => 'pribor_view/button_add_param', 'add_param_opt' => 'pribor_view/button_add_opt_no_del'));
            } 
                        
        } else {//** is user
            $data = $this->login_mdl->getSessionUserName();
            $this->layouts->set_user_name($data);
            $fiberinfo = $this->otdrdata_mdl->getOtdrFiberInfo();
            $fiber_otdr['info'] = $this->otdrdata_mdl->getFiberOtdr($id_otdr);
            $otdr_data['otdr_info'] = $this->otdrdata_mdl->getOtdrdata($id_otdr);
            $otdr_data['error'] = $data_header;
            $otdr_data['success'] = $data_header;
            $otdr_data['pul_d'] = '';
            $otdr_data['range_l'] = '';
            $otdr_data['wave_l'] = '';
            $otdr_data['time_l'] = '';
            $otdr_data['fiber_group'] = $this->otdrdata_mdl->getFiberGroup();
            $this->layouts->set_treeview($fiberinfo);
            $this->layouts->set_title('Информация о приборе');
            $this->layouts->view('pribor_view/pribor_view', $otdr_data);
        }
    }
    
    function add_param($id = 0){
        
        $value_pd = $this->input->post('value');
        $value_range = $this->input->post('value_rg');
        $value_wl = $this->input->post('value_wl');
        $value_ta = $this->input->post('value_ta');
       
        $table_name_pd = 'pulse_duration';
        $table_name_rl = 'rangeoflength';
        $table_name_wl = 'wavelength';
        $table_name_ta = 'time_accum';
        
        if (empty($value_pd)){
           $value_pd = array();
        }
        if (empty($value_range)){
           $value_range = array();
        }
        if (empty($value_wl)){
           $value_wl = array();
        }
        if (empty($value_ta)){
           $value_ta = array();
        }
        $plsd = $this->otdrdata_mdl->get_($id,$table_name_pd);
        $rangol = $this->otdrdata_mdl->get_($id,$table_name_rl);
        $wavel = $this->otdrdata_mdl->get_($id,$table_name_wl);
        $timea = $this->otdrdata_mdl->get_($id,$table_name_ta);

        $array_for_del_pd = array_diff($plsd,$value_pd);
        $array_for_add_pd = array_diff($value_pd,$plsd);
        $array_for_del_rl = array_diff($rangol,$value_range);
        $array_for_add_rl = array_diff($value_range,$rangol);
        $array_for_del_wl = array_diff($wavel,$value_wl);
        $array_for_add_wl = array_diff($value_wl,$wavel);
        $array_for_del_ta = array_diff($timea,$value_ta);
        $array_for_add_ta = array_diff($value_ta,$timea);
        
        if ($array_for_del_pd){
            $this->otdrdata_mdl->delete_param_($id, $array_for_del_pd,$table_name_pd);
        }  
        if ($array_for_add_pd){
            $this->otdrdata_mdl->add_param_($id, $array_for_add_pd,$table_name_pd);
        }
        if ($array_for_del_rl){
            $this->otdrdata_mdl->delete_param_($id, $array_for_del_rl,$table_name_rl);
        }  
        if ($array_for_add_rl){
            $this->otdrdata_mdl->add_param_($id, $array_for_add_rl,$table_name_rl);
        }
        if ($array_for_del_wl){
            $this->otdrdata_mdl->delete_param_($id, $array_for_del_wl,$table_name_wl);
        }  
        if ($array_for_add_wl){
            $this->otdrdata_mdl->add_param_($id, $array_for_add_wl,$table_name_wl);
        }
        if ($array_for_del_ta){
            $this->otdrdata_mdl->delete_param_($id, $array_for_del_ta,$table_name_ta);
        }  
        if ($array_for_add_ta){
            $this->otdrdata_mdl->add_param_($id, $array_for_add_ta,$table_name_ta);
        }
        

//        if ((!$array_for_del_pd) && (!$array_for_add_pd)){
//            redirect('otdrpage/otdrinfo/'.$id .'?error=1');
//        }
//        redirect('otdrpage/otdrinfo/'.$id .'?success=1');
        redirect('otdrpage/otdrinfo/'.$id);
        
    }
    
    function add_optik_line($id_otdr = 0){
        
        if (empty($id_otdr)) {
            show_404();
        }
        
        $fiber_name = $this->input->post('fiber_name');
        $fiber_group = $this->input->post('name_fiber_group');
        $fiber_type = $this->input->post('fiber_type');
        if (!isset($fiber_type))
        $fiber_type = "0";
        $fiber_length = $this->input->post('fiber_length');
        $gi = $this->input->post('gi');
        $fiber_info = $this->input->post('fiber_info');
        
        
        if (empty($fiber_name) || empty($fiber_group) || empty($fiber_length) || empty($gi) || empty($fiber_info)) {
            redirect('otdrpage/otdrinfo/'.$id_otdr .'?error=3');
        }
        if ($this->otdrdata_mdl->insert_fiber($id_otdr,$fiber_name,$fiber_group,$fiber_type,$fiber_length,$gi,$fiber_info)) {
            redirect('otdrpage/otdrinfo/'.$id_otdr .'?success=3');
        } else {
            redirect('otdrpage/otdrinfo/'.$id_otdr .'?error=3');
        }
        
    }
    function del_optik_line($id_fiber = 0, $id_otdr = 0){
        
        if (empty($id_fiber)) {
            show_404();
        }
        
        $this->otdrdata_mdl->delete_ol($id_fiber);
        redirect('otdrpage/otdrinfo/'.$id_otdr .'?success=4');
    }
}