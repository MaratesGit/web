<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!class_exists('Settingdata_mdl')) {
    class Settingdata_mdl extends CI_Model
    {

        public function __construct()
        {
            parent::__construct();

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


        public function getPD($id_ot)
        {

            $query = $this->db->query("SELECT * FROM pulse_duration where id_otdr = $id_ot");
            $query_rl = $this->db->query("SELECT * FROM rangeoflength where id_otdr = $id_ot");
            $query_wl = $this->db->query("SELECT * FROM wavelength where id_otdr = $id_ot");
            $query_ta = $this->db->query("SELECT * FROM time_accum where id_otdr = $id_ot");

            $array_end = array();
            $array_end_rl = array();
            $array_end_wl = array();
            $array_end_ta = array();

            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $value => $ter) {
                    $array_end[$ter['id_otdr']][$ter['id_pulse_duration']] = $ter['value'];
                }
                $znach['value_pd'] = $this->multi_implode(',', $array_end);
                $znach['id_otdr'] = $id_ot;
            } else {
                $znach['value_pd'] = 'не установлено';
                $znach['id_otdr'] = $id_ot;

            }
            if ($query_rl->num_rows() > 0) {
                foreach ($query_rl->result_array() as $value_ => $ter_) {
                    $array_end_rl[$ter_['id_otdr']][$ter_['id_range_of_length']] = $ter_['value'];
                }
                $znach['value_rl'] = $this->multi_implode(',', $array_end_rl);

            } else {
                $znach['value_rl'] = 'не установлено';
                $znach['id_otdr'] = $id_ot;

            }
            if ($query_wl->num_rows() > 0) {
                foreach ($query_wl->result_array() as $value_wl => $ter_wl) {
                    $array_end_wl[$ter_wl['id_otdr']][$ter_wl['id_wavelength']] = $ter_wl['value'];
                }
                $znach['value_wl'] = $this->multi_implode(',', $array_end_wl);

            } else {
                $znach['value_wl'] = 'не установлено';
                $znach['id_otdr'] = $id_ot;

            }
            if ($query_ta->num_rows() > 0) {
                foreach ($query_ta->result_array() as $value_ta => $ter_ta) {
                    $array_end_ta[$ter_ta['id_otdr']][$ter_ta['id_time_occum']] = $ter_ta['value'];
                }
                $znach['value_ta'] = $this->multi_implode(',', $array_end_ta);

            } else {
                $znach['value_ta'] = 'не установлено';
                $znach['id_otdr'] = $id_ot;

            }
            return $znach;
        }

        function multi_implode($sep, $array)
        {

            foreach ($array as $val)
                $_array[] = is_array($val) ? $this->multi_implode($sep, $val) : $val;
            return implode($sep, $_array);
        }

        public function getFiberGroup()
        {
            return $this->db->query("SELECT id_fiber_group, name_fiber_group FROM fiber_group")->result_array();
        }

        public function update_tcp($value, $name, $id_system)
        {


            $query = $this->db->get('system');

            if ($query->num_rows() > 0) {
                $data = array(
                    'id_system' => $id_system,
                    $name => $value);
                $this->db->update('system', $data);
            } else {
                $data = array(
                    'id_system' => $id_system,
                    $name => $value);
                $this->db->insert('system', $data);
            }
        }

        public function get_data_tcp()
        {

            $query = $this->db->query("SELECT id_system ,ipaddr_work, netmask, gw, dns, dns2, domain_name, ssh_man, ssh_work FROM system");
            $result = array();
            if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $value => $q) {
                    $result = $q;
                }

                $result['ipaddr_work'] = long2ip($result['ipaddr_work']);
                $result['netmask'] = long2ip($result['netmask']);
                $result['gw'] = long2ip($result['gw']);
                $result['dns'] = long2ip($result['dns']);
                $result['dns2'] = long2ip($result['dns2']);

                return $result;

            } else {
                $res = array(
                    'id_system' => '1',
                    'ssh_man' => 'f',
                    'ssh_work' => 'f',
                    'ipaddr_work' => '0.0.0.0',
                    'netmask' => '0.0.0.0',
                    'gw' => '0.0.0.0',
                    'dns' => '0.0.0.0',
                    'dns2' => '0.0.0.0',
                    'domain_name' => 'SMURF');
                return $res;
            }


//         return $this->db->query("SELECT * FROM system where id_system = $id_system")->result_array();
        }
    }
}