<?php

/**
 * @version 1.2
 * @author Rolando Arriaza
 * @copyright (c) 2015, Rolando Arriaza
 * 
 * -----------------------------------------------------------
 * ESTE CODIGO FUNCIONA SOLO PARA EL SIDEBAR DE LADO IZQUIERDO 
 * Y PARA LA PLANTILLA METRONICS , SI DESEA CAMBIAR LA INTERFAZ GRAFICA
 * NO SE PREOCUPE ES SIMPLE , SOLO NECESITA CAMBIAR LA FUNCION _echo();
 * ESTA IMPRIME EL SIDEBAR DE METRONICS, PERO LA FUNCION _init() ES LA 
 * QUE SIRVE PARA GENERAR EL ARREGLO O MULTI ARREGLO QUE TIENE TODO LO NECESARIO 
 * PARA CREAR EL SIDEBAR
 * 
 * ------------------------------------------------------------
 * 
 * ACLARO EL CODIGO SE DESARROLLO EN UN TIEMPO DE 7 HORAS 
 * POR LO TANTO ESTA EN SU ETAPA JOVEN, SE PUEDE OPTIMIZAR Y POR 
 * ENDE MEJORAR, SE VERSIONA YA QUE SE AGREGA ALGUNAS CARACTERISTICAS EN EL ARRAY 
 * 
 * ------------------------------------------------------------
 * 
 * VERSION 1.2:
 *              
 *              SE AGREGO EN _INIT() DENTRO DEL ARRAY QUE GENERA EL SIDEBAR
 *              LA SOCIACION route => routes de la base de datos para rutas 
 *              mas bonitas.
 * 
 *-------------------------------------------------------------
 * 
 * OJOOOOOOOOOOOOOOOOOOOO!!!!
 * 
 *          ESTA CLASE NECESITA DE LAS SIGUIENTES TABLAS 
 * 
 *          CREATE TABLE `namespaces` (
                `id_namespace` INT(11) NOT NULL AUTO_INCREMENT,
                `name` TEXT NULL,
                `start` INT(11) NULL DEFAULT NULL,
                PRIMARY KEY (`id_namespace`)
            )
            COLLATE='latin1_swedish_ci'
            ENGINE=MyISAM
            AUTO_INCREMENT=4;
 * 
 *          
 *           CREATE TABLE `seccion` (
                `id_seccion` INT(11) NOT NULL AUTO_INCREMENT,
                `id_namespace` INT(11) NULL DEFAULT NULL,
                `sub_seccion` INT(11) NULL DEFAULT NULL,
                `roles` TEXT NULL,
                `name` TEXT NULL,
                `icon` TEXT NULL,
                `start` INT(11) NULL DEFAULT NULL,
                `status` INT(11) NULL DEFAULT NULL,
                `complement` TEXT NULL,
                PRIMARY KEY (`id_seccion`)
            )
            COLLATE='latin1_swedish_ci'
            ENGINE=MyISAM
            AUTO_INCREMENT=22;



            CREATE TABLE `sidebar` (
	`id_sidebar` INT(11) NOT NULL AUTO_INCREMENT,
	`id_seccion` INT(11) NULL DEFAULT NULL,
	`roles` TEXT NULL,
	`name` TEXT NULL,
	`model_dir` TEXT NULL,
	`model` TEXT NULL,
	`routes` TEXT NULL,
	`type` TEXT NULL,
	`status` INT(11) NULL DEFAULT NULL,
	`icon` TEXT NULL,
	`start` INT(11) NULL DEFAULT NULL,
	`complement` TEXT NULL,
	`operations` TEXT NULL,
	PRIMARY KEY (`id_sidebar`)
        )
        COLLATE='latin1_swedish_ci'
        ENGINE=MyISAM
        AUTO_INCREMENT=32;


        ESTAS TRES TABLAS ESTAN ANIDADAS CON LA TABLA ROLES ASI QUE TAMBIEN ES
 *      INDISPENSABLE , ESO SI ACA NO SE VE ESTA TABLA.

 * 
 * ****/

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
        
        

        $this->load->model("system/permission_engine");
        $current_rol            = $this->permission_engine
                                    ->GetDataRol(
                                            $roles['nivel'] ,
                                            $roles['sub_nivel'] 
                                    );
        
        unset($this->permission_engine);

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
                    "cmp"               =>$side->complement,
                    "route"             =>$side->routes
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
    
    
    /**
     * @deprecated since version 1.1
     * **/
    public function _ParseJson(){
        
        return json_encode($this->_init());
        
    }
    
    public function _echo()
    {
         
         $the_sidebar   = $this->_init();
         $view          = NULL;
         
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
                          $R_       = is_null($s['route']) ? $s['url'] : $s['route'];
                          $view .= '<li>';
                          $view .= '<a href="' . site_url("/0/" . $R_) . '">';
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
                        
                          $R_       = is_null($s['route']) ? $s['url'] : $s['route'];
                          $view .= '<li>';
                          $view .= '<a href="' . site_url("/0/" . $R_) . '">';
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
