<?php


interface PInterface {
    
    /**
     * @todo inicia todos los componentes necesarios 
     *       esto pueden ser librerias , helpers y las vistas
     * @return null no debe de retornar un valor ya que no se tomara en cuenta
     */
    public function _init();
    
    /**
     * @todo realiza todos los componentes necesarios de la instalacion 
     *       esto pueden ser creacion de bases de datos , constructores , vistas
     *       entre otras cosas
     * @return bool , debe de retornar un valor booleano si se completo la instalacion
     */
    public function _install();
    
    /**
     * @todo actualiza los componentes necesarios 
     *       esto se verificara de acuerdo al versionamiento del desarrollador 
     * @return bool true si actualizo correctamente
     */
    public function _update();
    
    /**
     * @todo establece todas las dependencias css dentro del header
     * @return array , devuelve un arreglo con las direcciones de los css
     *                 
     */
    public function _css();
    
     /**
     * @todo establece todas las dependencias js dentro del footer
     * @return array , devuelve un arreglo con las direcciones de los js
     *                 
     */
    public function _js();
    
     /**
     * @todo establece funciones javascript dentro de DOM init o document.ready
     * @return array , devuelve un array donde iran las funciones 
     * @example  arra("funcion1();" , "var func = function(){}" , ...);
     *                 
     */
    public function _jsLoader();
    
     /**
     * @todo establece el titulo dentro del header 
     * @return string , solo devuelve una cadena ... 
     *                 
     */
    public function _title();
    
    /**
     * @todo funcion que requiere el nivel de seguridad de acuerdo a los roles
     * @return string/null/array , retorna un nivel , ninguno , o varios 
     */
    public function _rols();
    
    
  
}
