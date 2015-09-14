<?php

get_instance()->load->complement("EXCEL/PHPExcel");

class Excel extends PHPExcel {

    public function __clone() {
        parent::__clone();
    }
    
    public function __construct() {
        parent::__construct();
    }
    
    public function __destruct() {
        parent::__destruct();
    }
    
}
