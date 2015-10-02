<?php

if(!function_exists("DocType")){
    function DocType($extend){
          switch($extend){
            case 'docx':
            case 'doc':
                return 'word.png';
            case 'xls':
                return 'excel.png';
            case 'gif':
                return 'gif.png';
            case 'jpg':
            case 'jpeg':
                return 'jpg.png';
            case 'txt' :
                return 'txt.png';
            case 'pdf' : 
                return 'pdf.png';
            case 'png' :
                return 'png.png'; 
        }
         return 'blank.png';
    }
}
