<?php

class Country extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * type = 1 --> controller
     *      = 2 --> js
     */
    public function GetCountry($type){
        $this->load->model("system/country_engine");
        $data           = $this->country_engine->get_country();
        switch ($type) {
            case 1:
                return $data;
            case 2:
                echo json_encode($data);
                break;
            default:
                echo "Una vaca loca se perdio ... ";
                break;
        }
    }
   
}
