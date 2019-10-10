<?php

namespace DRAPILIB\ServiceAPI;
use \GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;


class AccessToken extends \DRAPILIB\EnvironmentSetup
{
    public $BASICURI;
    public function __construct(){
       parent::__construct();
       $this->BASICURI= "https://drhadmin.digitalriver.com/store/";
    }

    public function getAccessToken(){
        $client = new \GuzzleHttp\Client(['base_uri' => $this->BASICURI]);
        $response=$client->request('GET',\DRAPILIB\EnvironmentSetup::SITEID."/SessionToken?apiKey=".\DRAPILIB\EnvironmentSetup::APIKEY."&format=json");    
        
        $response=json_decode($response->getBody(), true);
        $js_code='<script>console.log("get_data_offerImage"); console.log(' .json_encode($response, JSON_HEX_TAG) . ')</script>';
        echo $js_code;
        session_start();
        $_SESSION["access_token"]=$response['access_token'];

       
    }
    
}

//$abc = new AccessToken();
//echo $abc->$BASIC_URI;