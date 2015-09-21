<?php


/**
 * @todo ROUTES: PARA EL SISTEMA MVA 
 * @version 1.0
 * @author Rolando Arriaza <rolignu90@gmail.com>
 * @copyright (c) 2015, Rolando Arriaza
 * 
 * --------------------------------------------------------
 * 
 * INICIATIVA CLASE ROUTES :
 * 
 *          ESTA CLASE FUE CREADA DADA LA PROBLEMATICA EN LAS VISTAS
 *          DE LAS DIRECCIONES O URL , ESTO AYUDA A LA SEGURIDAD A ESCONDER
 *          LA RUTA ORIGINAL EN EL MVA A UNA RUTA MAS "BONITA"
 * 
 *          LAS RUTAS EN VEZ DE VER ASI : /0/mode=name_model
 *                                        SERA ASI:
 *                                        /0/HelloPrettyRoute
 * 
 * VERSION 1.0:
 * 
 *          PRIMERAS FUNCIONES 
 * 
 *                      get() , set() , push() , pop()
 * 
 * **/

class Routes {
    
    
    protected  $MVA_ROUTES = [];


    public function __construct() {
          $this->MVA_ROUTES   = [];
    }
    
    public function Get($name = NULL){
        return $name != NULL ? isset($this->MVA_ROUTES[$name]) ? $this->MVA_ROUTES[$name] 
                : NULL
                : sizeof($this->MVA_ROUTES) >= 1 ? $this->MVA_ROUTES 
                : NULL;
    }
    
    public function Set($model  , $name){
        $this->MVA_ROUTES[$name] = $model;
    }
    
    public function Push($model , $name){
        
    }
    
    public function  Pop($model){
        
    }
   
}
