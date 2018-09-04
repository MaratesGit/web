<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!class_exists('Fiber_mdl')) {


    class Fiber_mdl extends CI_Model
    {
        private $_id_fiber = 0;
        private $_trace = array();

        public function __construct()
        {
            parent::__construct();
        }

        /**
         * @param mixed $id_fiber
         */
        public function setIdFiber($id_fiber)
        {
            $this->_id_fiber = $id_fiber;
        }

        /**
         * @return mixed
         */
        public function getIdFiber()
        {
            return $this->_id_fiber;
        }

        public function getFiber($id_fiber)
        {
            $result = $this->db->get_where('fiber', array('id_fiber' => $id_fiber))->result_array();
            if (count($result) > 0) {
                return $result[0];
            }
        }

        public function getFiberdata($id_fiber)
        {
            return $this->db->query("SELECT ot.id_otdr, f.aproximation_points, ot.otdr_name, f.fiber_name, f.id_fiber, f.id_fiber_group, f.fiber_length, f.fiber_type, f.gi, f.fiber_info
                                FROM otdr ot, fiber f
                                WHERE f.id_fiber = $id_fiber AND ot.id_otdr = f.id_otdr")->row_array();
        }

        public function update_fiber($value, $name, $id_fiber)
        {
            $data = array($name => $value);
            $this->db->where('id_fiber', $id_fiber);
            $this->db->update('fiber', $data);
        }

        /**
         * @param $value
         * @param $name
         * @param $id_fiber
         */
        public function update_schedule_fiber($value, $name, $id_fiber)
        {
            $data = array($name => $value);
            $this->db->where('id_fiber', $id_fiber);
            $this->db->update('schedule', $data);
        }

        /**
         * @param $id_fiber
         * @return mixed
         */
        public function getFiberSchedule($id_fiber){
            return $result = $this->db->get_where('schedule', array('id_fiber' => $id_fiber))->row_array();
        }

        /**
         * @param $id_fiber
         * @param $start
         * @param $end
         * @param $name
         */
        public function addFiberSegment($id_fiber, $start, $end, $name){
            $data = array(
                'id_fiber' => $id_fiber,
                'start' => $start,
                'end' => $end,
                'name' => $name
            );
            $result = $this->db->query("INSERT INTO fiber_segments  VALUES (DEFAULT,$id_fiber,$start,$end, '$name') RETURNING id_fiber_segments")->result_array();
            if (count($result) > 0) {
                return $result[0]['id_fiber_segments'];
            }else{
                return 0;
            }
        }

        /**
         * @param $id_fiber_segments
         */
        public function deleteFiberSegment($id_fiber_segments){
            $this->db->where('id_fiber_segments', $id_fiber_segments);
            $this->db->delete('fiber_segments');
        }

        /**
         * @param $id_fiber
         * @return array
         */
        public function getFiberSegments($id_fiber){
            $result = $this->db->get_where('fiber_segments', array('id_fiber' => $id_fiber))->result_array();
            if (count($result) > 0) {
                return $result;
            }else{
                return array();
            }
        }

        public function getSegmentsAlfas($id_fiber){

            $result = $this->db->query("SELECT name,alfa FROM fiber_segments fs, segments_alfas sa WHERE fs.id_fiber = $id_fiber and fs.id_fiber_segments = sa.id_fiber_segments ORDER BY id_segments_alfas DESC LIMIT (SELECT count(*) FROM fiber_segments WHERE id_fiber = $id_fiber)")->result_array();
            if (count($result) > 0) {
                return $result;
            }else{
                return array();
            }
        }
        
    }
}