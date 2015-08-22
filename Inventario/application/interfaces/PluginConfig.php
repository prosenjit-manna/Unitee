<?php

trait PluginConfig
{
     public $_config = array(
        "version"       => 0,
        "author"        => "",
        "type"          => "plugin",
        "name"          => "",
        "description"   => "",
        "id_model"      => 0,
        "id_update"     => 0,
        "update"        => "",
        "license"       => "",
        "controller"    => "",
        "views"         => ""
    );
     
    public abstract function _Getconfig();
    
}
