<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Created by FoDuKa tc _2016
 */

class Userlogin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_mdl');
        $this->load->library('form_validation');
    }
    
        function index() {
        
        
        $this->login();
    }

    function login() {
        
        switch ($this->input->get('error')) {
        case '1':
            $data_header['error_'] = 'Внимание!';
            $data_header['error_text'] = 'Проверьте введенное имя пользователя и пароль';
            break;
        }
        $data_header['null'] = '';

        //validate form input
        $this->form_validation->set_rules('login_name', 'Имя пользователя', 'required');
        $this->form_validation->set_rules('password', 'Пароль', 'required');
        if ($this->form_validation->run()){
            sleep(1);
            $is_successful=$this->login_mdl->login($this->input->post('login_name'), $this->input->post('password'));
            if ($is_successful) { //if the login is successful
                $query = $this->login_mdl->getUser($this->input->post('login_name'));
                $admin_data = array(
                    'admin_name' => $query[0]['user_name'],
                    'is_admin' => $query[0]['perpission'],                  
                );
                $this->session->set_userdata($admin_data);
        
                //redirect them back to the home page
                redirect('mainpage', 'refresh');
                //redirect($this->config->item('base_url'), 'refresh');
            } else { //if the login was un-successful
                redirect('userlogin/login?error=1');
            }
        } else {
            $data = array('login_name' => '', 'password' => '');
            $data['error'] = $data_header;
            $this->load->view('login_view/header_log_view');
            $this->load->view('login_view/login_view', $data);
        }
    }

    function logout() {
        $d = $this->session->userdata('admin_name');
        $logged_in = $this->session->userdata('is_admin');
        if ($d != FALSE && $logged_in == TRUE) {
            $this->session->sess_destroy();
            redirect('userlogin/login', 'refresh');
        } else {
            redirect('userlogin/login', 'refresh');
        }
    }
}