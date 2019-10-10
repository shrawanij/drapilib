<?php
namespace DRAPILIB\ServiceAPI;


use \GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Merchandise extends \DRAPILIB\ServiceAPI\ApiCall
{
    
    public function __construct(){
        parent::__construct();
    }

    public function getOffer($offerId)
    {
       if($offerId==null ||$offerId=='')
       {
           echo "Please pass the correct OfferID";
       } 
       else {
           $offerObj=parent::ApiCall($type='GET',$url='offers/'.$offerId.'?expand=all&format=json&token='.$_SESSION["access_token"]);
           return $offerObj;
       }
    }
    public function getPOP($popName)
    {
        if($popName==null ||$popName=='')
        {
            echo "Please pass the correct popName";
        } 
        else {
            $popName=parent::ApiCall($type='GET',$url='point-of-promotions/'.$popName.'?expand=all&format=json&token='.$_SESSION["access_token"]);
            return $popName;
        } 
    }    
}