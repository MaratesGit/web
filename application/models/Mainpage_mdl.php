<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

if (!class_exists('Mainpage_mdl')) {


    class Mainpage_mdl extends CI_Model
    {

        public function __construct()
        {
            parent::__construct();
            //  $this->load->model('login_model');
        }


    }
}
