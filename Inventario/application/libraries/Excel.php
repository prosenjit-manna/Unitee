<?php

/**
 * @version 1.0
 * @author  Rolando Arriaza 
 * @todo Libreria excel para codeigniter
 * @depends De la libreria phpExcel.php
 * @name Excel
 * 
 * **/

get_instance()->load->complement("EXCEL/PHPExcel");

class Excel extends PHPExcel {

    public function __clone() {
        parent::__clone();
    }
    
    public function __construct() {
        
      /***
        * ESTA LIBRERIA DEPENDE DE PHPEXCEL.PHP
        *  ESTA DENTRO DE COMPLEMENT/EXCEL/..
        * ***/
        
        parent::__construct();
    }
    
    public function __destruct() {
        parent::__destruct();
    }
    
}
