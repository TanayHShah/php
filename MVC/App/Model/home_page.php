<?php

namespace App\Model;

use PDO;
use PDOException;

class home_page extends \Core\Model
{
    public static function getheader()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('Select * FROM cms_pages WHERE cms_id=cms_id');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function viewContent($value = "")
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("Select content FROM cms_pages WHERE url_key='$value'");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function returnCategoryId($value = "")
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("Select category_id FROM category WHERE url_key='$value'");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function returnProducts($value = "")
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT
            P.product_name,
            P.image,
            P.price,
            P.url_key
        FROM
            products P
        LEFT JOIN product_categoris PC
        ON P.product_id = PC.product_id 
        WHERE
        PC.category_id = '$value'");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function returnProductDescription($value = "")
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT *FROM products WHERE url_key = '$value'");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function userRegistration($data)
    {
        try {
            $columnName = [];
            $columnValue = [];
            foreach ($data as $key => $value) {
                array_push($columnName, $key);
                array_push($columnValue, $value);
            }
            $key = implode(',', $columnName);
            $value = "'".implode("','", $columnValue)."'";
            $db = static::getDB();
            $stmt = $db->query("INSERT INTO user ($key) VALUES ($value)");
            echo "<script>alert(REGISTRATION COMPLETED);
            window.location.replace('/cybercom/php/MVC/public/');</script>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function userCheck($data){
        try {
            $db = static::getDB();
            $email="'".$data['email']."'";
            $password="'".$data['password']."'";
            $stmt = $db->query("SELECT * FROM user WHERE email=$email AND password=$password ");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
