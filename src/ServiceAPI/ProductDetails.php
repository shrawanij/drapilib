<?php
namespace DRAPILIB\ServiceAPI;


use \GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class ProductDetails extends \DRAPILIB\ServiceAPI\ApiCall
{
    
    public function __construct(){
        parent::__construct();
    }

    public function getAllProducts()
    {
        $allProductsObj=parent::ApiCall($type='GET',$url='products/?expand=all&format=json&token='.$_SESSION["access_token"]);
        return $allProductsObj;
    }
    public function getProduct($productId)
    {
       if($productId==null ||$productId=='')
       {
           echo "Please pass the correct OfferID";
       } 
       else {
           $productObj=parent::ApiCall($type='GET',$url='products/'.$productId.'?expand=all&format=json&token='.$_SESSION["access_token"]);
           return $productObj;
       }
    }
}    