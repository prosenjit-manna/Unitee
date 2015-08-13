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
                "seccions"      => array(),
                "start"         => 0
             );
        }
        else{
            foreach ($namespaces as $ns){
                                      
                    $spaces[0] = array(
                        "namespaces" => "",
                        "seccions"   => array(),
                        "start"      => 0
                    );
                
                    $spaces[$ns->id_namespace] = array(
                        "namespaces" => $ns->name,
                        "seccions"   => array(),
                        "start"      => $ns->start
                    );
            }
        }
        
        
        $current_rol            = $roles['nivel'];
        $sub_rol                = $roles['sub_nivel'];
        
        if($sub_rol != 0){
            $current_rol = array(
                0   => $current_rol ,
                1   => $sub_rol
            );
        }
 
        foreach($sections as $sec)
        {
           
            $array_         = array();
            $rol_           = explode(",", $sec->roles);
            $sp             = 0;
            
            $flag           = $this->check_rol($current_rol, $rol_);

            if($flag){
                
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
            $sp             = 0;
            
            
            $flag           = $this->check_rol($current_rol, $rol_);
            
            if($flag)
            {
                
                $uri = $side->model_dir . system_token() . $side->model;
                if($side->model == NULL || $side->model == "")
                {
                    $uri = $side->model_dir;
                }
                
                $array_ = array(
                    "name"              =>$side->name,
                    "url"               =>$uri,
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
                                ['sidebars'][] = $array_;
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
                                    ['sub_seccion']
                                    [$side->id_seccion]
                                    ['sidebars'][] = $array_;
                                break;
                            }
                        }
                    }
                }
                
            }
            
        }
        
      
        return $spaces;

    }
    
    public function _echo(){
         
         $the_sidebar   = $this->_init();
         $view          = NULL;
         
        // echo "<pre>" , print_r($the_sidebar) , "</pre>";  
        // return;
         
         foreach ($the_sidebar as $side)
         {
             
             if(sizeof($side['seccions']) != 0){
                 if($side['namespaces'] != NULL 
                     || $side['namespaces'] != "" ){
                    $view .= '<li class="heading">';
                    $view .= '<h3 class="uppercase">';
                    $view .= $side['namespaces'];
                    $view .= '</h3></li>';
                }
             }
             
             
             foreach($side['seccions'] as $data){
                  
                 
                  $view .= "<li>";
                  $view .= '<a href="javascript:;">';
                  $view .= '<i class="' . $data['icon'] .  '"></i>&nbsp;';
                  $view .= '<span class="title">' . $data['name'] . '</span>';
                  $view .= $data['complement'];
                  $view .= '<span class="arrow"></span>';
                  $view .= '</a>';
                  
                  if(sizeof($data['sub_seccion']) >= 1){
                   
                   $view .= '<ul class="sub-menu">';  
                      
                    foreach ($data['sub_seccion'] as $sub){
                     
                      $view .= '<li>';
                      $view .= '<a href="javascript:;">';
                      $view .= '&nbsp;<i class="' . $sub['icon'] .  '"></i>&nbsp;';
                      $view .= '<span class="title">' . $sub['name'] . '</span>';
                      $view .= $sub['complement'];
                      $view .= '<span class="arrow"></span>';
                      $view .= '</a>';

                      if(count($sub['sidebars']) >= 1){
                       $view .= '<ul class="sub-menu">';  
                      foreach($sub['sidebars'] as $s){
                        
                          $view .= '<li>';
                          $view .= '<a href="' . site_url("/0/" . $s['url']) . '">';
                          $view .= '<i class="' . $s['icon'] . '"></i>&nbsp;';
                          $view .= $s['name'];
                          $view .= $s['cmp'];
                          $view .= '</a>';
                          $view .= '</li>';
                      }
                       $view .= '</ul>';
                      }
                   
                      $view .= '</li>';
                     
                  }
                  
                     $view .= '</ul>';
                  
                  }
                                                
                  $view .= '<ul class="sub-menu">';

                     foreach($data['sidebars'] as $s){
                        
                          $view .= '<li>';
                          $view .= '<a href="' . site_url("/0/" . $s['url']) . '">';
                          $view .= '<i class="' . $s['icon'] . '"></i>&nbsp;';
                          $view .= $s['name'];
                          $view .= $s['cmp'];
                          $view .= '</a>';
                          $view .= '</li>';
                      }
                      
                $view .= '</ul>';
                $view .= "</li>";
             }
             
            
         }
         
       
         echo $view;
    }
    
    private function check_rol($current , $roles)
    {
         if(isset($roles[0]))
         {
             if($roles[0] == 0){ return TRUE; }
         }
         
         if(!is_array($current)){
           foreach ($roles as $rol){
             if ($rol === $current) {
                return TRUE;
            }
         }
        }else{
            foreach ($roles as $rol){
                foreach ($current as $c){
                    if($rol === $c){
                        return TRUE;
                    }
                }
            }
        }
        
        return FALSE;
    }
    
    private function get_namespaces(){
        
        $this->query = "SELECT * FROM namespaces";
        return $this->db
                ->query($this->query)
                ->result_object();
        
    }
    
    private function get_seccion(){
        
      
        $this->query = "SELECT * FROM seccion WHERE status LIKE 1";
        
        return $this->db
                ->query($this->query)
                ->result_object();
       
    }
    
    private function get_sidebars(){
         $this->query = "SELECT * FROM sidebar WHERE status LIKE 1";
         return $this->db
                 ->query($this->query)
                 ->result_object();
    }
    
    
    
  
}
