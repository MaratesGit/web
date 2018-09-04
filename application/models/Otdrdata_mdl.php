<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!class_exists('Otdrdata_mdl')) {


    class Otdrdata_mdl extends CI_Model
    {

        public function __construct()
        {
            parent::__construct();

        }

        public function getOtdrdata($id_otdr)
        {

//         return $this->db->query("SELECT f.fiber_name, ot.otdr_active, ot.otdr_cert, ot.id_otdr, ot.otdr_imei, ot.otdr_name, ot.otdr_ports_count
//                                    FROM otdr ot, fiber f WHERE ot.id_otdr = $id_otdr")->result_array();

            return $this->db->get_where('otdr', array('id_otdr' => $id_otdr))->row_array();
        }

        public function getOtdr()
        {
            return $this->db->query("SELECT id_otdr, otdr_name FROM otdr")->result_array();
        }

        public function getAllOtdrdata()
        {

            return $this->db->query("SELECT ot.otdr_active, ot.otdr_cert, ot.id_otdr, ot.otdr_imei, ot.otdr_name, ot.otdr_ports_count, rl.value AS rangel, wl.value  AS wavel,pd.value AS pulsel,ta.value AS timel
                            FROM rangeoflength rl, wavelength wl, pulse_duration pd, time_accum ta, otdr ot
                            WHERE ot.id_otdr = rl.id_otdr
                            AND ot.id_otdr = wl.id_otdr 
                            AND ot.id_otdr = pd.id_otdr
                            AND ot.id_otdr = ta.id_otdr")->result_array();
        }

        public function getFiberOtdr($id_otdr)
        {
            return $this->db->get_where('fiber', array('id_otdr' => $id_otdr))->result_array();
        }

        public function add_fiber_group()
        {
            if ($this->db->insert('fiber_group', array('name_fiber_group' => 'Первая группа',))) {
                return true;
            }
            return false;
        }

        public function getOtdrFiberInfo()
        {
            $result = $this->db->query("SELECT * FROM otdr");
            $otdr = array();
            if ($result->num_rows() > 0) {
                foreach ($result->result_array() as $value) {
                    $result_fibers = $this->db->query("SELECT * FROM fiber where id_otdr = " . $value["id_otdr"]);
                    $otdr[$value["id_otdr"]] = $value;
                    $fibers = array();
                    if ($result_fibers->num_rows() > 0) {
                        foreach ($result_fibers->result_array() as $fiber) {
                            $fibers[$fiber["id_fiber"]] = $fiber;
                        }
                        $otdr[$value["id_otdr"]]["fibers"] = $fibers;
                    } else {
                        $otdr[$value["id_otdr"]]["fibers"] = array();
                    }
                }
            }
            return $otdr;
        }

        public function insert_otdr($otdr_name, $otdr_imei, $otdr_port, $otdr_act, $otdr_cert, $otdr_poverka)
        {

            if ($this->db->insert('otdr', array('otdr_name' => $otdr_name, 'otdr_active' => $otdr_act, 'otdr_imei' => $otdr_imei, 'otdr_ports_count' => $otdr_port, 'otdr_cert' => $otdr_cert, 'otdr_poverka' => date('Y-m-d', strtotime($otdr_poverka))))) {
                return true;
            }
            return false;
        }

        public function delete_($id)
        {

            if ($this->db->delete('otdr', array('id_otdr' => $id))) {
                return true;
            }
            return false;
        }


        public function getPD($id_otdr)
        {

            return $this->db->order_by('value', 'ASC')->get_where('pulse_duration', array('id_otdr' => $id_otdr))->result_array();
        }

        public function getRL($id_otdr)
        {

            return $this->db->order_by('value', 'ASC')->get_where('rangeoflength', array('id_otdr' => $id_otdr))->result_array();
        }

        public function getWL($id_otdr)
        {

            return $this->db->order_by('value', 'ASC')->get_where('wavelength', array('id_otdr' => $id_otdr))->result_array();
        }

        public function getTA($id_otdr)
        {

            return $this->db->order_by('value', 'ASC')->get_where('time_accum', array('id_otdr' => $id_otdr))->result_array();
        }

        public function get_($id_otdr, $table_name_)
        {

            $query = $this->db->query("SELECT value FROM $table_name_ WHERE id_otdr = $id_otdr")->result_array();

            if (!$query) {
                $plsd = array();
            } else {
                foreach ($query as $pulsef => $value_puls) {
                    $plsd[] = $value_puls['value'];
                }
            }
            return $plsd;
        }

        public function add_param_($id_otdr, $value_pd, $table_name_)
        {

            foreach ($value_pd as $va_p) {
                $res = $this->db->insert($table_name_, array('id_otdr' => $id_otdr, 'value' => $va_p));
            }
            if ($res == true) {
                return true;
            }
            return false;
        }

        public function delete_param_($id_otdr, $value_pd, $table_name_)
        {

            foreach ($value_pd as $va_p) {
                $res = $this->db->delete($table_name_, array('id_otdr' => $id_otdr, 'value' => $va_p));
            }
            if ($res == true) {
                return true;
            }
            return false;
        }

        public function getFiberGroup()
        {
            return $this->db->query("SELECT id_fiber_group, name_fiber_group FROM fiber_group")->result_array();
        }

        public function insert_fiber($id_otdr, $fiber_name, $fiber_group, $fiber_type, $fiber_length, $gi, $fiber_info)
        {

            if ($this->db->insert('fiber', array('id_otdr' => $id_otdr, 'fiber_name' => $fiber_name, 'id_fiber_group' => $fiber_group, 'fiber_length' => $fiber_length, 'fiber_type' => $fiber_type, 'gi' => $gi, 'fiber_info' => $fiber_info))) {
                return true;
            }
            return false;
        }

        public function delete_ol($id)
        {

            if ($this->db->delete('fiber', array('id_fiber' => $id))) {
                return true;
            }
            return false;
        }
    }
}