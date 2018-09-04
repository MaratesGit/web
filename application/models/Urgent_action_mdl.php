<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!class_exists('Urgent_action_mdl')) {

    class Urgent_action_mdl extends CI_Model
    {
        /**
         * Urgent_action_mdl constructor.
         */
        public function __construct()
        {
            parent::__construct();
        }

        public function doStandardReflectogramm($id_fiber){
            $data = array('id_fiber' => $id_fiber, 'action' => 3);
            $this->db->insert("urgent_action", $data);
        }

        public function doReflectogramm($id_fiber){
            $data = array('id_fiber' => $id_fiber, 'action' => 1);
            $this->db->insert("urgent_action", $data);
        }

        public function switchTo($id_fiber){
            $data = array('id_fiber' => $id_fiber, 'action' => 2);
            $this->db->insert("urgent_action", $data);
        }
    }

}