<?php

namespace DRAPILIB\ServiceAPI;

use \GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class ApiCall extends \DRAPILIB\EnvironmentSetup 
{
public $access_token;
public $BASIC_URI;

  public function __construct()
  {
      
      parent::__construct();
      $this->access_token= $_SESSION["access_token"];
      $this->BASIC_URI=parent::getBasic_URI();
     
  }
  public function ApiCall($type="GET",$relative_url='',$headers='',$data='')
  {
      
      if($relative_url==''|| $type=='')
      {
          echo "please pass correct information to this call";
          
      }
      else {
        $client = new \GuzzleHttp\Client(['base_uri' => $this->BASIC_URI]);
        if($type=='POST' || $type=='PUT')
        {
          $response=$client->request($type,$relative_url,[
            'form_params' => [ $data ],
            'headers' =>  $headers
        ]);
          //$response=json_decode($response->getBody(), true);
          // $consoleCode='<script>console.log("get_data_offerImage"); console.log(' .json_encode($response, JSON_HEX_TAG) . ')</script>';
          return $response;
        }
        else if($type=='GET'){
          $response=$client->request($type,$relative_url);
          // $response=json_decode($response->getBody(), true);
          // $consoleCode='<script>console.log("get_data_offerImage"); console.log(' .json_encode($response, JSON_HEX_TAG) . ')</script>';
          return $response;
        }
        
        
      }
      
  }

}