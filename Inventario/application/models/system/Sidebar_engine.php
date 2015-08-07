<?php

class Sidebar_engine extends CI_Model {
    
    protected $query = NULL;
    
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->model("user/user_auth");
    }
    
    public function _init(){
        $namespaces     = $this->get_namespaces();
        $sections       = $this->get_seccion();
        $sidebars       = $this->get_sidebars();
         
        $roles      = $this->user_auth->roles;
        
        if($roles === NULL){
            return FALSE;
        }
        
        $spaces = array();   
        if(sizeof($namespaces) === 0){
            $spaces[0] = array(
                "namespaces"    => "",
                "seccions"      => array()
             );
        }
        else{
            foreach ($namespaces as $ns){
                    $spaces[$ns->id_namespace] = array(
                        "namespaces" => $ns->name,
                        "seccions"   => array()
                    );
            }
        }
        
        
        $current_rol            = $roles['nivel'];
        
        foreach($sections as $sec){
           
            $array_         = array();
            $rol_           = explode(",", $sec->roles);
            $flag           = FALSE;
            $sp             = 0;
            
            
            foreach($rol_ as $r )
            {
                if($r === $current_rol){
                    $flag = TRUE;
                }
            }
              
            if($flag ){
                
                
                $array_ = array(
                    "name"          => $sec->name,
                    "icon"          => $sec->icon,
                    "start"         => $sec->start,
                    "complement"    => $sec->complement,
                    "sub_seccion"   => array(),
                    "sidebars"      => array()
                );
                
                if($sec->id_namespace !== NULL)
                {
                    $sp = $sec->id_namespace;
                }
                
                if($sec->sub_seccion === NULL)
                {
                     $spaces[$sp]['seccions'][$sec->id_seccion] = $array_;
                }
                else
                {
                    $spaces[$sp]['seccions']
                            [$sec->sub_seccion]
                            ['sub_seccion']
                            [$sec->id_seccion] = $array_;
                }

            }  
            
        }
        
        foreach ($sidebars as $side)
        {
            
            $array_         = array();
            $rol_           = explode(",", $side->roles);
            $flag           = FALSE;
            $sp             = 0;
            
            foreach($rol_ as $r )
            {
                if($r === $current_rol){
                    $flag = TRUE;
                }
            }
            
            if($flag)
            {
                $array_ = array(
                    "name"              =>$side->name,
                    "url"               =>$side->model_dir . "=" . $side->model,
                    "icon"              =>$side->icon,
                    "start"             =>$side->start,
                    "cmp"               =>$side->complement
                );
                
                foreach ($spaces as $k=>$v)
                {
                    if(isset($spaces[$k]['seccions'][$side->id_seccion]))
                    {
                        $spaces[$k]['seccions']
                                [$side->id_seccion]
                                ['sidebars'] = $array_;
                        break;
                    }else
                    {
                        foreach($spaces[$k]['seccions'] as $kk=>$vv)
                        {
                            if(isset($spaces[$k]
                                    ['seccions']
                                    [$kk]
                                    ['sub_seccion'][$side->id_seccion]))
                            {
                                $spaces[$k]
                                    ['seccions']
                                    [$kk]
                                    ['sub_seccion'][$side->id_seccion]['sidebars'] = $array_;
                                break;
                            }
                        }
                    }
                }
                
            }
            
        }
        
      
        return $spaces;
        
       /*  echo "<pre>";
         print_r($spaces);
         print_r($namespaces);
         print_r($sections);
         print_r($sidebars);
         print_r($roles);
         echo "</pre>"; */
    }
    
    private function get_namespaces(){
        
        $this->query = "SELECT * FROM namespaces";
        return $this->db->query($this->query)->result_object();
        
    }
    
    private function get_seccion(){
        
      
        $this->query = "SELECT * FROM seccion WHERE status LIKE 1";
        
        return $this->db
                ->query($this->query)
                ->result_object();
       
    }
    
    
    private function get_sidebars(){
         $this->query = "SELECT * FROM sidebar WHERE status LIKE 1";
         return $this->db->query($this->query)->result_object();
    }
    
    
    
  
}
