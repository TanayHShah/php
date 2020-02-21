<?php

namespace App\Controller;

use \Core\View;
use \App\Model\CartItems;

class Cart extends \Core\Controller
{
    public function addAction()
    {
        
        $data=(array)json_decode($_POST['data']);
      $id=CartItems::addCart($data);
      $_SESSION['cartId']=$id;
    }
    public function displayQuantityAction()
    {
        
      CartItems::returnquantityCount();
    }
    // public function setSessionAction()
    // {
    //     $id=implode($_SESSION['cartId']);
    //     CartItems::checkStatus($id);
    //     unset($_SESSION['cartId']);
    // }
}