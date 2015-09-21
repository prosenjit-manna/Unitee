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

class Pdf extends \fpdf\FPDF{
    
    public function __construct($orientation='P', $unit='mm', $size='Letter') {
        /***
         * ESTA LIBRERIA DEPENDE ROTUNDAMENTE DE FPDF 
         * QUE ESTA COMO COMPLEMENTO DENTRO DEL DIRECTORIO 
         * DE "complement" SU MANUAL ESTA EN DICHO DIRECTORIO
         * DE FPDF/DOC , BASICAMENTE FPDF ES UN PUENTE A LA EXTENCION
         * ***/
       parent::__construct($orientation, $unit, $size);
    }
    
}
