<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!class_exists('Login_mdl')) {
    
    class Login_mdl extends CI_Model
    {

        public function __construct()
        {
            parent::__construct();
        }

        public function login($user_name, $password)
        {
            if (empty($user_name) || empty($password)) {
                return -1;
            }
            $query = $this->db->get_where('optic_users', array('user_name' => $user_name))->result_array();
            if ($password == $query[0]['pass']) {
                return true;
            } else {
                return false;
            }
        }

        public function getUser($user_name)
        {
            return $this->db->get_where('optic_users', array('user_name' => $user_name))->result_array();
        }

        function is_admin()
        {
            $d = $this->session->userdata('admin_name');
            $logged_in = $this->session->userdata('is_admin');
            if ($d != FALSE && $logged_in == TRUE) {
                return true;
            } else {
                return false;
            }
        }

        function getSessionUnit()
        {
            $d = $this->session->userdata('admin_name');
            $logged_in = $this->session->userdata('is_admin');
            if ($d != FALSE && $logged_in == TRUE) {
                return $this->session->userdata('id_user');
            } else {
                return 0;
            }
        }

        function getSessionUserName()
        {
            $d = $this->session->userdata('admin_name');
            $logged_in = $this->session->userdata('is_admin');
            $lod_in = $this->session->userdata('user_name');
            if ($d != FALSE || $logged_in == TRUE) {
                return $this->session->userdata('admin_name');
            } else {
                //  return $this->session->userdata('admin_name');
                return -1;
            }
        }

        function setLastVisit($url)
        {
            $last = $this->getNumLastVisit();
            $last++;
            $data = array('back_' . $last => $url,
                'last' => $last);
            $this->session->set_userdata($data);
        }

        function getLastVisit()
        {
            $data['last'] = $this->getNumLastVisit();
            $data['back'] = $this->session->userdata('back_' . $data['last']);
            return $data;
        }

        function getNumLastVisit()
        {
            return $this->session->userdata('last');
        }

        function setNumLastVisit($last)
        {
            $data = array('last' => $last);
            $this->session->set_userdata($data);
        }

        function getPrevVisit()
        {
            $last = $this->getNumLastVisit();
            if ($last > 1) {
                $last = $last - 1;
            }
            return $this->session->userdata('back_' . $last);
        }

        function setPrevNum()
        {
            $last = $this->getNumLastVisit();
            if ($last > 1) {
                $last = $last - 1;
            }
            $this->setNumLastVisit($last);
        }

        public function session_history($is_prev, $url)
        {
            if ($is_prev) {
                $this->setPrevNum();
            } else {
                $this->setLastVisit($url);
            }
        }

        public function isLogginingUser()
        {
            if ($this->getSessionUserName() != -1) {
                if (!$this->is_admin()) {
                    return 2;
                } else {
                    return 1;
                }
            } else {
                return false;
            }
        }

    }
}
