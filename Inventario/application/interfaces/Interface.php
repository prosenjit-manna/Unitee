<?php


interface PInterface {
    
    public function _init();
    public function _install();
    public function _update();
    public function _header();
    public function _footer();
    public function _jsLoader();
}
