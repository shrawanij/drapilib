<?php 

namespace DRAPILIB;

class EnvironmentSetup
{
     public $DOMAIN; 
     public $APIVERSION;
     public $BASIC_URI;
     const SITEID="drdod19";
     const APIKEY="5b3cbb55681c48bab419e17c8b52b7d7";

     public function __construct()
     {
        $this->DOMAIN = "https://api.digitalriver.com/";
        $this->APIVERSION="v1/";
        $this->BASIC_URI=$this->DOMAIN.$this->APIVERSION."shoppers/me/";
        
     }


     function getBasic_URI()
    {
        return $this->BASIC_URI;
    }
     
}



