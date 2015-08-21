<?php

get_instance()->load->interfaces("SystemPlugin");

class Plugin implements SystemPlugin {
    
    var $class                       = NULL;
    
    var $model_                      = NULL;
    
    var $controller_                 = NULL;
    
    protected  $docs                 = array();


    public function __construct() {
        $this->class = &get_instance();
        $this->class->load->helper("file");
        
         
        $m                  = get_dir_file_info(APPPATH . "models/" , false);
        $c                  = get_dir_file_info(APPPATH . "controllers/" , false);
        $this->model_       = $this->SetWrite($m, "models\\");
        $this->controller_  = $this->SetWrite($c, "controllers\\");
    }

    public function _install() {
        
    }

    public function _show() {
       
       $the_model           =  array();
       $the_controller      =  array();
       $filter              =  $this->ModelInfo();
       $filter_c            =  $this->ControllerInfo();
       
       foreach($filter as $f){
           $id          = NULL;
           if(is_array($f['data'])  && count($f['data']) >= 2){
               foreach ($f['data'] as $i ){
                   $fill = explode(":", $i);
                   if(count($fill) >= 2 && strcmp(trim($fill[0]), "id") == 0){
                       $id = $fill[1];
                   }
               }
               if($id != NULL){
                   $the_model[$id][] = $f;
                   if(!isset($the_model[$id]['controller'])){
                        $the_model[$id]['controller']         = array();
                        $the_model[$id]['dependencies']       = array();
                   }
               }
           } 
       }
       
       foreach($filter_c as $c){
           $id          = NULL;
           if(is_array($c['data'])  && count($c['data']) >= 2){
               foreach ($c['data'] as $i ){
                   $fill = explode(":", $i);
                   if(count($fill) >= 2 && strcmp(trim($fill[0]), "id") == 0){
                       $id = $fill[1];
                   }
               }
               if($id != NULL){
                   $the_controller[$id][] = $c;
               }
           } 
       }
       
       foreach($the_model as $i=>$m){
            $m_id = $i;
            foreach($the_controller as $ii=>$c){
                if(strcmp(trim($m_id), trim($ii)) == 0){
                    foreach($c as $cc){
                        $the_model[$m_id]['controller'][] = $cc; 
                    }
                }
            }
       }

       return $the_model;
    }
    
    private function ModelInfo(){
        $docs   = array();    
        
        foreach ($this->model_ as $m){
            
            $this->class->load->model($m['init']);
            
            $document           = new ReflectionClass($this->class->$m['name']);
            $data               = explode("@@",$document->getDocComment() );
           
            $array = array_map(
                function($str) {
                    return str_replace('*', '', $str);
            },$data );
            
           $array = array_map(
                function($str) {
                    return str_replace('/', '', $str);
            },$array );
            
            $docs[] = array(
                "model"                     => $m['name'],
                "path_model"                => $m['init'],
                "data"                      => $array,
                "controller"                => array(),
                "dependencies"              => array()
             );
            
            unset($this->class->$m['name']);
        }

        return $docs;
    }
    
    private function ControllerInfo(){
        
        $docs           = array();    
        
        foreach ($this->controller_ as $m){
            
            get_instance()->load->controllers($m['name']);
            $class = $m['name'];
            
            $document           = new ReflectionClass($class);
            $data               = explode("@@",$document->getDocComment() );

            
            $array = array_map(
                function($str) {
                    return str_replace('*', '', $str);
            },$data );
            
            $array = array_map(
                function($str) {
                    return str_replace('/', '', $str);
            },$array );
            
            $docs[] = array(
                "controller"                        => $m['name'],
                "path_controller"                   => $m['init'],
                "data"                              => $array
             );
            
            unset($this->class->$m['name']);
        }

        return $docs;
    }
    
    private function SetWrite($data , $type ){
         
         $array_    = array();
        
         foreach ($data as $d){
             
            $name       = explode(".", $d['name']);
            $directory  = NULL;
            
            if(end($name) == "php"){
                $m          = $name[0];
                $v          = explode($type , $d['relative_path']);
                $directory  = end($v);
                
                if(empty($directory)){
                    $array_[] = array(
                        "name"  => $m,
                        "init"  => $m
                    );
                }else{
                    $array_[] = array(
                        "name"  => $m,
                        "init"  =>  str_replace("\\", "/", $directory) . $m
                    );
                }
            }
            
            
        }
        
        return $array_;
    }

}