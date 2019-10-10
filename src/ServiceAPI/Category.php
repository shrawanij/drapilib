<?php 

namespace DRAPILIB\ServiceAPI;

class Category extends \DRAPILIB\ServiceAPI\ApiCall
{
    public function __construct(){
        parent::__construct();
    }
    public function getAllCategories()
    {
       
           $allCategoryObj=parent::ApiCall($type='GET',$url='categories/?expand=all&format=json&token='.$_SESSION["access_token"]);
           return $allCategoryObj;
       
    }
    public function getCategory($categoryId)
    {
       
           $categoryObj=parent::ApiCall($type='GET',$url='categories/'.$categoryId.'?expand=all&format=json&token='.$_SESSION["access_token"]);
           return $categoryObj;
       
    }
}