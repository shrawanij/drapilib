<?php
namespace DRAPILIB\ServiceAPI;

class order extends \DRAPILIB\ServiceAPI\ApiCall{
  public function __construct(){
    parent::__construct();
  }
  public function getOrderDetails($orderID){
    $orderObj=parent::ApiCall($type='GET',$url='orders/'.$orderID.'?expand=all&format=json&token='.$_SESSION["access_token"].'&testOrder=true&orderState=In process');
    return $orderObj;
  }
}

