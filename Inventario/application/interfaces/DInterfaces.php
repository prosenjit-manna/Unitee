<?php


interface DInterfaces {
    
    public function Header($args = NULL);
    public function Main($args = NULL);
    public function Complements($args = NULL);
    public function Footer($args = NULL);
    public function Route();
    public function JS();
    public function CSS();
    public function TITLE($title = NULL);
    public function _404($args = NULL);
    public function _500($args = NULL);
    public function Priv($args = NULL);
    public function GetObject();
    public function SetObject($name , $data);
    public function _JSdashboard();
}
