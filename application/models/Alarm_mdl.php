<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!class_exists('Alarm_mdl')) {
    class Alarm_mdl extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Возвращает все не обработанные события
         * @return mixed
         */
        public function getAckAlarms(){
            $result = $this->db->query('select id_alarm, user_name, alarm_type, fiber_name, alarm_start,alarm_close, statuschanged, ackstatus, fiber_status, id_trace, "dB", point from alarm al, optic_users ou, fiber fi where al.id_user = ou.id_user and fi.id_fiber = al.id_fiber ORDER BY statuschanged DESC LIMIT 10')->result_array();
            if (count($result) > 0) {
                return $result;
            }else{
                return array();
            }
        }

        public function getFiberAckAlarms($id_fiber){

            $result = $this->db->query("select id_alarm, user_name, alarm_type, fiber_name, alarm_start,alarm_close, statuschanged, ackstatus, fiber_status, id_trace, \"dB\", point, ds from alarm al, optic_users ou, fiber fi, trace tr where ackstatus = false AND al.id_fiber = $id_fiber and al.id_user = ou.id_user and fi.id_fiber = al.id_fiber and tr.id_trace = al.id_trace ORDER BY statuschanged DESC LIMIT 10")->result_array();
            if (count($result) > 0) {
                return $result;
            }else{
                return array();
            }
        }

        public function restAllFiberAlarms($id_fiber,$id_user){
            $data = array(
                'ackstatus' => TRUE,
                'id_user' => $id_user,
                'statuschanged' => ' NOW() '
            );
            $this->db->where('id_fiber', $id_fiber);
            $this->db->update('alarm', $data);
        }

        public function restAlarm($id_alarm,$id_user){
            $data = array(
                'ackstatus' => TRUE,
                'id_user' => $id_user,
                'statuschanged' => ' NOW() '
            );
            $this->db->where('id_alarm', $id_alarm);
            $this->db->update('alarm', $data);
        }
    }
}