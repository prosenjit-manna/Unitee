<?php

if(!function_exists("get_key")){
    function get_key()
    {
        return "APANtByIGI1BpVXZTJgcsAG8GZl8pdwwa84";
    }
}

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