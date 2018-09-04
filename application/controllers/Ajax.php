<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax extends CI_Controller
{

    /**
     * Ajax constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_mdl');
        $this->load->model('mainpage_mdl');
        $this->load->model('otdrdata_mdl');
        $this->load->model('settingdata_mdl');
        $this->load->model('fiber_mdl');
        $this->load->model('reflect_mdl');
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    function index()
    {

    }

    /**
     * @param $id_fiber
     */
    public function getReflectogramm($id_fiber)
    {
        echo $this->reflect_mdl->getLastReflectogrammSerialize($id_fiber);
    }

    /**
     * @param $id_fiber
     * @internal param object $load
     */
    public function getAlfaCompare($id_fiber)
    {
        echo $this->reflect_mdl->getAlfaCompareSerialize($id_fiber);
    }

    /**
     * @param $id_fiber
     */
    public function getStandardReflectogramm($id_fiber)
    {
        echo $this->reflect_mdl->getStandardSerialize($id_fiber);
    }

    /**
     * @param $id_fiber
     */
    public function doStandardReflectogramm($id_fiber){
        $this->load->model('urgent_action_mdl');
        echo $this->urgent_action_mdl->doStandardReflectogramm($id_fiber);
    }

    /**
     * @param $id_fiber
     * @param $offOn
     */
    public function fiberMonitoringOff($id_fiber, $offOn)
    {
        $this->fiber_mdl->update_schedule_fiber($offOn, "enabled", $id_fiber);
            echo $offOn;

    }

    /**
     * @param $name
     * @param $id_system
     */
    public function ajax_tcp_property($name, $id_system)
    {
        $value = $this->input->post('spisok');
        if (($name == 'ipaddr_work') || ($name == 'netmask') || ($name == 'gw') || ($name == 'dns') || ($name == 'dns2')) {
            $value = sprintf('%u', ip2long($value));
            $data[$name] = $value;
        } else {
            $data[$name] = $value;
        }
        $this->settingdata_mdl->update_tcp($value, $name, $id_system);
    }

    /**
     * @param $name
     * @param $id_fiber
     */
    public function ajax_fiber_property($name, $id_fiber)
    {
        $value = $this->input->post('spisok');
        $this->fiber_mdl->update_fiber($value, $name, $id_fiber);
    }

    /**
     * @return mixed
     */
    public function addFiberSegment(){
        $id_fiber = $this->input->post('id_fiber');
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $name = $this->input->post('name');
        echo $this->fiber_mdl->addFiberSegment($id_fiber, $start, $end, $name);
    }

    /**
     * @param $id_fiber_segments
     */
    public function deleteFiberSegment($id_fiber_segments){
        $this->fiber_mdl->deleteFiberSegment($id_fiber_segments);
    }

    /**
     * @return object
     */
    public function restAlarm($id_alarm)
    {
        $this->load->model('alarm_mdl');
        $this->load->model('user_mdl');
        $user_name = $this->login_mdl->getSessionUserName();
        $user = $this->user_mdl->getUserByName($user_name);
        $this->alarm_mdl->restAlarm($id_alarm,$user['id_user']);
    }
    
}