<?php

require_once "config_class.php";

class Check {

    private $config;

    public function __construct($amp = true) {
        $this->config = new Config();
    }

    public function id($id, $zero = FALSE) {
        if (!$this->intNumder($id)) {
            return FALSE;
        }
        if ((!$zero) && ($id === 0)) {
            return FALSE;
        }
        return $id >= 0;
    }

    public function oneOrZero($number) {
        if (!$this->intNumder($number)) {
            return FALSE;
        }
        return (($number == 0) || ($number == 1));
    }

    public function count($count) {
        return $this->noNegativeInteger($count);
    }

    public function offset($offset) {
        return $this->intNumder($offset);
    }

    private function noNegativeInteger($number) {
        if (!$this->intNumder($number)) {
            return FALSE;
        }
        return ($number >= 0);
    }

    private function intNumder($number) {
        if (!is_int($number) && !is_string($number)) {
            return FALSE;
        }
        return preg_match("/^-?(([1-9][0-9]*)|(0))$/", $number);
    }

}
?>


