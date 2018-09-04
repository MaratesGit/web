<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!class_exists('User_mdl')) {
    
    class User_mdl extends CI_Model
    {

        public function __construct()
        {
            parent::__construct();
        }

        public function getUserByName($user_name)
        {
            return $this->db->get_where('optic_users', array('user_name' => $user_name))->result_array()[0];
        }

        public function getUserById($id_user)
        {
            return $this->db->get_where('optic_users', array('id_user' => $id_user))->result_array();
        }

        public function addUser()
        {

        }

        public function editUser()
        {

        }

        public function deletUser()
        {

        }

    }
}
