<?php

namespace App\Model;

use PDO;
use PDOException;

class Adminn extends \Core\Model
{
    public static function getAllproducts()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('Select * FROM products WHERE product_id=product_id');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function addproducts($data)
    {
        try {
            $db = static::getDB();
            $tablefield = [];
            $tablevalue = [];
            $category = 0;
            $flag=0;
            $temp=$category;
            foreach ($data as $tablefields => $values) {
                if ($tablefields != 'category') {
                    array_push($tablefield, $tablefields);
                    array_push($tablevalue, $values);
                }
                if ($tablefields == 'category') {
                    $flag=1;
                    $category = $values;
                }
                if ($tablefields == 'product_name') {
                    if ($values != null) {
                        $product_url = $values;
                    } else {
                        $product_url = "";
                    }
                }
            }
            $product_url = str_replace([" ", "&"], ["-", "%20"], strtolower($product_url));
            $product_url = "'" . $product_url . "'";
            $category = "'" . $category . "'";
            $tablefields = implode(",", $tablefield);
            $tableValues = "'" . implode("','", $tablevalue) . "'";
            $tablefields = $tablefields . ",url_key";
            $stmt = "INSERT INTO products ($tablefields) VALUES ($tableValues,$product_url)";
            $db->exec($stmt);
            if($flag==0)
            $temp=$category;
            $product = $db->lastInsertId();
            if (is_array($product))
            $product = implode($product);
        $product = $product;
         $product = "'" . $product . "'";
            if ($category !== $temp) {
             $stmt = "INSERT INTO product_categoris (product_id,category_id) VALUES ($product,$category)";
                $db->exec($stmt);
            }

            echo "<script>
            alert('product added successfully');
            window.location.replace('/cybercom/php/MVC/public/Admin/Productt/product');
        </script>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function delete($value = "")
    {
        try {
            $db = static::getDB();

            $stmt = "DELETE FROM products WHERE product_id='$value'";
            $db->exec($stmt);

            echo "<script>
                    alert('product deleted successfully');
                    window.location.replace('/cybercom/php/MVC/public/Admin/Productt/product');
                </script>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function getData($value = "")
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("Select * FROM products WHERE product_id=$value");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function updateValue($data, $value = "")
    {
        try {
            $db = static::getDB();
            $tablefield = [];
            $tablevalue = [];
            foreach ($data as $tablefields => $values) {
                if ($tablefields != 'category') {
                    array_push($tablefield, $tablefields);
                    array_push($tablevalue, $values);
                }
                if($tablefields == 'category'){
                    $category=$values;
                }
            }
            $tablefield=array_combine($tablefield,$tablevalue);
            foreach ($tablefield as $tablefields => $tableValues) {
                $stmt = "UPDATE products SET $tablefields='$tableValues' where product_id='$value'";
                $db->exec($stmt);
            }
            $stmt = "UPDATE product_categoris SET category_id='$category' where product_id='$value'";
            $db->exec($stmt);
            echo "<script>
                    alert('product updated successfully');
                    window.location.replace('/cybercom/php/MVC/public/Admin/Productt/product');
                </script>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function returnlastid()
    {
        try {
            $db = static::getDB();
            $result = $db->lastInsertId();
          echo $result;
           die();
            if (empty($result)) {
                $result = 0;
            }
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
