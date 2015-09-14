<?php


/**
 * @version 1.0
 * @author  Rolando Arriaza 
 * @todo Libreria pdf para codeigniter
 * @depends De la libreria fpdf
 * @name Pdf
 * 
 * **/

get_instance()->load->complement("FPDF/fpdf");

class Pdf extends FPDF {
    
    public function __construct() {
        /***
         * ESTA LIBRERIA DEPENDE ROTUNDAMENTE DE FPDF 
         * QUE ESTA COMO COMPLEMENTO DENTRO DEL DIRECTORIO 
         * DE "complement" SU MANUAL ESTA EN DICHO DIRECTORIO
         * DE FPDF/DOC , BASICAMENTE FPDF ES UN PUENTE A LA EXTENCION
         * ***/
    }
    
}
