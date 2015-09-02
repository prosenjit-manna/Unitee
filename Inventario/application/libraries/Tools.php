<?php


class Tools {
    
    var $class      = NULL;
    
    private $lang_date      = array(
        "es"     => array(
            "now"       => " ahora",
            "week"      => " semana",
            "day"       => " dia",
            "days"      => " dias",
            "month"     => " mes",
            "months"    => " meses",
            "year"      => " año",
            "years"     => " años",
            "minutes"   => " minutos",
            "hour"      => " hora(s)"
        ),
        "en"    => array(
            "now"       => " now",
            "week"      => " week",
            "day"       => " day",
            "month"     => " months",
            "year"      => " years"
        )
    );
    
    private $timezone       = "America/El_Salvador";
    
    public function __construct() {
        if(function_exists("get_instance"))
             $this->class = &get_instance();
        
    }
    
   
    public function __call($name, $arguments) {
        //NO CALLS 
    }
    
    
    /**
     * GET Y SET DE LA LIBRERIA TOOLS 
     * 
     * **/
    
    public function get(){
        return $this;
    }
    
    public function set(){
        return $this;
    }
    
    public function PrettyDate($date , $lang = "es"){
        $this->default_timezone();
        $d              = new DateTime($date);
        $n              = new DateTime("now");
        $interval       = $n->diff($d);
        $days           = $interval->d;
        $month          = $interval->m;
        $year           = $interval->y;
        $hour           = $interval->h;
        $min            = $interval->i;
        if($year != 0){
            if($year == 1){
                return $year . $this->lang_date[$lang]['year'];
            }else{
                return $year . $this->lang_date[$lang]['years'];
            }
        }else if($month != 0){
            if($month == 1){
                return $month . $this->lang_date[$lang]['month'];
            }else{
                return $month . $this->lang_date[$lang]['months'];
            }
        }else if($days != 0){
            if($days == 1){
                return $days . $this->lang_date[$lang]['day'];
            }else{
                return $days . $this->lang_date[$lang]['days'];
            }
        }else if($hour != 0){
             return $hour == 1
                         ? $hour . $this->lang_date[$lang]['hour'] : 
                           $hour . $this->lang_date[$lang]['hours'];
        }
        else{
            return $min >= 0 && $min <= 2 
                    ? $this->lang_date[$lang]['now'] : 
                     $min . $this->lang_date[$lang]['minutes'];
        }
    }
    
    
    public function default_timezone(){
        date_default_timezone_set($this->timezone);
    }
    
    
   
}
