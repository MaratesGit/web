<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!class_exists('Reflect_mdl')) {


    class Reflect_mdl extends CI_Model
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

        /**
         * @param $id_fiber
         * @return mixed
         */
        public function getLastTraceFiber($id_fiber)
        {
            $result = $this->db->query("SELECT * FROM trace WHERE id_fiber = " . $id_fiber . " order by id_trace DESC LIMIT 1")->result_array();
            if (count($result) > 0) {
                return $result[0];
            }
        }

        /**
         * @param int $id_fiber
         * @return dots_array
         */
        public function getLastTraceDots($id_fiber = 0){
            $id_fiber   = $id_fiber == 0 ? $this->_id_fiber : $id_fiber;
            $this->_trace = $this->getLastTraceFiber($id_fiber);
            return $this->getTraceDots($this->_trace["id_trace"]);
        }

        /**
         * @param $id_trace
         * @return dots_array
         */
        public function getTraceDots($id_trace)
        {
            return $this->db->get_where("dots", array('id_trace' => $id_trace))->result_array();
        }

        /**
         * @param int $id_fiber
         * @return array
         */
        public function getStandard($id_fiber = 0)
        {
            $id_fiber = $id_fiber == 0 ? $this->_id_fiber : $id_fiber;
            $this->_trace = $this->getStandardTrace($id_fiber);
            return $this->db->get_where('reference_point', array('id_trace' => $this->_trace['id_trace']))->result_array();
        }

        /**
         * @param int $id_fiber
         * @return array
         */
        public function getStandardTrace($id_fiber = 0)
        {
            $id_fiber = $id_fiber == 0 ? $this->_id_fiber : $id_fiber;

            $this->db->where('id_fiber', $id_fiber);
            $this->db->order_by("id_trace","DESC");
            return $this->db->get('reference_trace')->row_array();
        }

        /**
         * @param int $id_fiber
         * @return string
         */
        public function getStandardSerialize($id_fiber = 0)
        {
            $id_fiber   = $id_fiber == 0 ? $this->_id_fiber : $id_fiber;
            $dots       = $this->getStandard($id_fiber);
            return      $this->serializeReflectogramm($dots);
        }

        /**
         * @param int $id_fiber
         * @return string
         */
        public function getLastReflectogrammSerialize($id_fiber = 0)
        {
            $id_fiber   = $id_fiber == 0 ? $this->_id_fiber : $id_fiber;
            $dots       = $this->getLastTraceDots($id_fiber);
            return      $this->serializeReflectogramm($dots);
        }

        /**
         * @param int $id_fiber
         * @return string
         */
        public function getAlfaCompareSerialize($id_fiber = 0){
            $id_fiber   = $id_fiber == 0 ? $this->_id_fiber : $id_fiber;
            $this->_trace = $this->getLastTraceFiber($id_fiber);
            $alfas = $this->db->get_where("alfa_compare", array('id_trace' => $this->_trace["id_trace"]))->result_array();
            return $this->serializeAlfa($alfas);
        }

        public function convertDotToMeter($dot, $ds){
            return $this->getConstValue($ds) * (double)$dot;
        }

        /**
         * @param $dots
         * @return string
         */
        private function serializeReflectogramm($dots)
        {
            $constValue = $this->getConstValue();
            $n = 1;
            $series = '[ [';
            foreach ($dots as $dot) {
                $X = $n * $constValue;
                if ($n != 1) {
                    $series .= ' ,';
                }
                $series = $series . ' [' . $X . ',' . $dot['dot_value'] * (-1) . ']';
                $n++;
            }
            $series .= ' ]]';
            return $series;
        }

        /**
         * Получение постоянного значения для оптического волокна
         * @param double $ds  = 0
         * @return double
         */
        private function getConstValue($ds = 0.0){
            $vs = 1.4681 * 1000000.0;
            if($ds == 0.0){
                $ds = (double)$this->_trace['ds'];
            }
            $ches = $ds * 2.99792458;
            $constValue = $ches / $vs;
            return $constValue;
        }

        private function serializeAlfa($dots)
        {
            $constValue = $this->getConstValue();
            $n = 1;
            $series = '[ [';
            foreach ($dots as $dot) {
                $X = $n * $constValue;
                if ($n != 1) {
                    $series .= ' ,';
                }
                $series = $series . ' [' . $X . ',' . $dot['alfa'] * (-1) . ']';
                $n++;
            }
            $series .= ' ]]';
            return $series;
        }
    }
}