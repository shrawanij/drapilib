<?php
namespace DRAPILIB\ServiceAPI;


use \GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class cart extends  \DRAPILIB\ServiceAPI\ApiCall
{
    public function __construct(){
        parent::__construct();
    }
    public function addToCart($productId)
    {
        //$headers=['Accept' => 'application/json','content-type' => 'application/json'];
        $headers = array(
            'Accept' => 'application/json'
        );
        $data=array();
        $addToCartObj=parent::ApiCall($type='POST',$url='carts/active.json?productId='.$productId.'&expand=all&testOrder=true&sendEmail=true&token='.$_SESSION["access_token"],$headers,$data);
        return $addToCartObj;
    }
    public function getActiveCart()
    {
        $activeCartObj=parent::ApiCall($type='GET',$url='carts/active.json?fields=lineItems,shippingOptions,pricing,billingAddress,shippingAddress,shippingCountries,paymentMethods,applyPaymentMethod,currency&expand=all&testOrder=true&sendEmail=true&token='.$_SESSION["access_token"]);
        return $activeCartObj;
    }
    public function applyBillingAddress($billingAddress)
    {
        $headers = array(
            'Accept' => 'application/json'
        );
        $data=$billingAddress;

        $applyBillingObj=parent::ApiCall($type='PUT',$url='carts/active/billing-address.json?expand=all&token='.$_SESSION["access_token"],$headers,$data);
        return $applyBillingObj;
    }
    public function applyPaymentMethod($sourceId)
    {
        $sourcePayment = '{
            "paymentMethod": {
            "sourceId":'. $sourceId.
            '}
            }';
        $headers = array(
            'Accept' => 'application/json'
        );
        $data=$sourcePayment;
        $applyPaymentMethod=parent::ApiCall($type='POST',$url='carts/active/apply-payment-method.json?expand=all&token='.$_SESSION["access_token"],$headers,$data);
        return $applyPaymentMethod;

    }
    public function updateLineItemQuantity($productId, $quantity)
    {
        $headers = array(
            'Accept' => 'application/json'
        );
        $data=array();
        $updateQuantityObj=parent::ApiCall($type='POST',$url='carts/active.json?productId='.$productId.'&quantity='.$quantity.'&expand=all&token='.$_SESSION["access_token"],$headers,$data);
        return $updateQuantityObj;
    }

    public function removeLineItem($productId)
    {
        $headers = array(
            'Accept' => 'application/json'
        );
        $data=array();
        $removeLineItemObj=parent::ApiCall($type='POST',$url='carts/active.json?productId='.$productId.'&quantity=0&expand=all&token='.$_SESSION["access_token"],$headers,$data);
        return $removeLineItemObj;
    }
    public function submitCart()
    {
        $headers = array(
            'Accept' => 'application/json'
        );
        $data=array();
        $submitCartObj=parent::ApiCall($type='POST',$url='carts/active/submit-cart.json?token='.$_SESSION["access_token"],$headers,$data);
        return $submitCartObj;
    }
    

}