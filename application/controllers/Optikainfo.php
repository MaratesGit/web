<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Optikainfo extends CI_Controller {

    /**
     * Optikainfo constructor.
     */
    function __construct() {
        parent::__construct();
        $this->load->model('login_mdl');
        $this->load->model('fiber_mdl');
        $this->load->model('settingdata_mdl');
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('Layouts');
        $this->load->library('form_validation');
    }
   
// ================= информация о всех настройках ===========================

    /**
     * @param $id_fiber
     */
    public function optikainfo($id_fiber) {

        /** @var int or false $rules */
        $rules = $this->login_mdl->isLogginingUser();
        if ($rules == false) {
            redirect('userlogin/login', 'refresh');
        } elseif ($rules == 1) {  //** is admin
            $this->load->model('alarm_mdl');
            $this->load->model('reflect_mdl');
            $data = $this->login_mdl->getSessionUserName();
            $this->layouts->set_user_name($data);
            $fiberinfo = $this->settingdata_mdl->getOtdrFiberInfo();
            $fiber_data['fiber_data']   = $this->fiber_mdl->getFiberdata($id_fiber);
            $fiber_data['fiber_group']  = $this->settingdata_mdl->getFiberGroup();
            $fiber_data['schedule']     = $this->fiber_mdl->getFiberSchedule($id_fiber);
            $fiber_data['segments_alfas'] = $this->fiber_mdl->getSegmentsAlfas($id_fiber);
            $fiber_data['alarms'] = $this->alarm_mdl->getFiberAckAlarms($id_fiber);
            for ($i = 0; $i < count($fiber_data['alarms']); $i++) {
                $fiber_data['alarms'][$i]['point'] = $this->reflect_mdl->convertDotToMeter($fiber_data['alarms'][$i]['point'], $fiber_data['alarms'][$i]['ds']);
            }
            $this->layouts->set_treeview($fiberinfo);
            $this->layouts->set_title('Информация');
            $this->layouts->view('optika_view/optika_view', $fiber_data);
                        
        } else {//** is user
            
        }
    }

    /**
     * @param $id_fiber
     */
    public function etaloninfo($id_fiber) {
        $data = $this->login_mdl->getSessionUserName();
        $fiberinfo = $this->settingdata_mdl->getOtdrFiberInfo();
        $fiber_data['fiber_data'] = $this->fiber_mdl->getFiberdata($id_fiber);
        $fiber_data['fiber_segments'] = $this->fiber_mdl->getFiberSegments($id_fiber);
        $this->layouts->set_user_name($data);
        $this->layouts->set_treeview($fiberinfo);
        $this->layouts->set_title('Эталон');
        $this->layouts->view('optika_view/etalon_view',$fiber_data);
    }
}