<?php

interface SystemPlugin {
   
    public function _show();
    public function _install();
    public function _unistall($id_model = NULL);
    public function _update($id_model = NULL);
    
}
