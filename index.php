<?php
require_once __DIR__ . '/vendor/autoload.php';

$getSessionAccessToken = new DRAPILIB\ServiceAPI\AccessToken();
$getSessionAccessToken->getAccessToken();
$access_token=$_SESSION["access_token"];

$obj1=new DRAPILIB\ServiceAPI\cart;
$obj1=$obj1->addToCart($productId='5343419900');
$obj1=json_decode($obj1->getBody(), true);
$consoleCode='<script>console.log(' .json_encode($obj1, JSON_HEX_TAG) . ')</script>';
echo $consoleCode;

$obj2=new DRAPILIB\ServiceAPI\cart;
$obj2=$obj2->updateLineItemQuantity('5343419900','2');



$obj2=new DRAPILIB\ServiceAPI\cart;
$obj2=$obj2->getActiveCart();
$obj2=json_decode($obj2->getBody(), true);
$consoleCode='<script>console.log(' .json_encode($obj2, JSON_HEX_TAG) . ')</script>';
echo $consoleCode;
/* 
$obj2=new DRAPILIB\ServiceAPI\cart;
$billingAddress='{                                                   
    "address": {
        "firstName": "shrawani",
        "lastName": "jagtap",
        "city": "new york",
        "countrySubdivision": "NA",
        "postalCode": "55334",
        "country": "US",
        "countryName": "USA",                         
        "line1": "avenue",
        "line2": "404"
        "phoneNumber": "1111111111",
        "emailAddress": "shrawanij@gmail.com",
    }                        
  }';
$billingAddress = json_encode($billingAddress,JSON_HEX_TAG);
$obj2=$obj2->applyBillingAddress($billingAddress);
$obj2=json_decode($obj2->getBody(), true);
$consoleCode='<script>console.log(' .json_encode($obj2, JSON_HEX_TAG) . ')</script>';
echo $consoleCode;




$obj2=new DRAPILIB\ServiceAPI\cart;
$obj2=$obj2->getActiveCart();
$obj2=json_decode($obj2->getBody(), true);
$consoleCode='<script>console.log(' .json_encode($obj2, JSON_HEX_TAG) . ')</script>';
echo $consoleCode;
*/

 

?>