<?php


interface PluginInterface {
    
    public function _init();
    public function _install();
    public function _update();
    public function _header();
    public function _footer();
    
}
