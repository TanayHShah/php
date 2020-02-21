<?php

namespace App\Model;

use PDO;
use PDOException;

class cartItems extends \Core\Model
{
    public static function addCart($data)
    {
        try {
            foreach ($data as $key => $value) {
                if ($key == 'userId') {
                    $id = "'" . $value . "'";
                }
                if ($key == 'price') {
                    $price = $value;
                }
                if ($key == 'quantity') {
                    $quantity = $value;
                }
                if ($key == 'productId') {
                    $pid = $value;
                }
            }
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM cart WHERE userId=$id AND cartStatus='1'");
            $userCheck = $stmt->fetch(PDO::FETCH_ASSOC);
            if (empty($userCheck)) {
                $singlePrice=$price;
                $price = "'" . $price * $quantity . "'";
                $stmt = $db->query("INSERT INTO cart(userId,totalAmount) VALUES ($id,$price) ");
                $cart = $db->lastInsertId();
                $stmt = $db->query("INSERT INTO cartitem(productId,price,quantity,cartId) 
            VALUES ($pid,$singlePrice,$quantity,$cart) ");
             $stmt = $db->query("SELECT cartId from cart WHERE userId=$id AND cartStatus='1' ");
             $result = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $stmt = $db->query("SELECT totalAmount FROM cart WHERE userId=$id AND cartStatus='1' ");
                $amount = $stmt->fetch(PDO::FETCH_ASSOC);
                $amount = implode($amount);
                $newprice = $price;
                $price = $amount + ($price * $quantity);
                $price = "'" . $price . "'";
                $stmt = $db->query("UPDATE cart SET totalAmount=$price  WHERE userId=$id AND cartStatus='1'");
                $stmt = $db->query("SELECT cartId from cart WHERE userId=$id AND cartStatus='1' ");
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $cartid = $result;
                $cartid=implode($cartid);
                $stmt = $db->query("SELECT productId from cartitem WHERE cartId=$cartid ");
                $returnproduct = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $flag = 0;
                foreach ($returnproduct as $key => $value) {
                    $value=implode($value);
                    if ($value == $pid) {
                        $flag = 1;
                    }
                }
                if ($flag == 0) {
                    $stmt = $db->query("INSERT INTO cartitem(productId,price,quantity,cartId)
                 VALUES ($pid,$newprice,$quantity,$cartid) ");
                } elseif($flag==1) {
                    $stmt = $db->query("SELECT quantity from cartitem WHERE productId=$pid AND cartId=$cartid ");
                    $returnquantity = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($returnquantity as $key => $value){
                        $value=implode($value);
                        $oldquantity=$value;
                    }
                    $oldquantity = $oldquantity + $quantity;
                    $stmt = $db->query("UPDATE cartitem SET quantity=$oldquantity
                 WHERE productId=$pid AND cartId=$cartid ");
                }
            }
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function returnquantityCount(){
        try {
            if(isset($_SESSION['cartId'])){
            $id=$_SESSION['cartId'];
            $id=implode($id);
            $db = static::getDB();
             $stmt = $db->query( "SELECT COUNT(quantity) AS quantity  FROM cartitem WHERE cartId='$id'");
           $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $result=implode($result);
                $result="MY CART(".$result.")";
            }
            else{
             $result="MY CART(0)";;   
            }
            echo $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
