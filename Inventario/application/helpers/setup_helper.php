<?php


/**
 * Configuracion de la llave AES-256 
 * para encriptacion de las contraseñas
 * **/
if(!function_exists("get_key")){
    function get_key()
    {
        return "APANtByIGI1BpVXZTJgcsAG8GZl8pdwwa84";
    }
}


/**
 * Region de configuracion de correo electronico
 * : config
 * : email from config
 * **/

if(!function_exists("email_config")){
    function email_config(){
        
         $config['protocol']='smtp';
         $config['smtp_host']='ssl://marmot.arvixe.com';
         $config['smtp_port']='465';
         $config['smtp_timeout']='10';
         $config['smtp_user']='test@soft.lieison.com';
         $config['smtp_pass']='Support2015';
         $config['charset']='utf-8';
         $config['newline']="\r\n";
         $config['wordwrap'] = TRUE;
         $config['mailtype'] = 'html';
         
         return $config;
            
    }
}

if(!function_exists("email_from")){
    function email_from(){
        return array(
            "from"  => "rmarroquin@lieison.com",
            "name"  => "Rolando Arriaza Marroquin"
        );
    }
}


/**
 * Varios
 */

if(!function_exists("check_model")){
    function check_model($model){
        if(file_exists(APPPATH . "models/$model" . ".php")){
            return TRUE;
        }else
        {
            return FALSE;
        }
    }
}

if(!function_exists("system_token")){
    function system_token(){
        return "=";
    }
}
