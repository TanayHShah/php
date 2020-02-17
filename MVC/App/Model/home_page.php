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
    // public static function addCategory($data)
    // {
    //     try {
    //         $db = static::getDB();
    //         foreach ($data as $tablefields => $values) {
    //             if ($tablefields == 'category_name') {
    //                 if ($values != null) {
    //                     $category_url = $values;
    //                 } else {
    //                     $category_url = "";
    //                 }
    //             }
    //         }
    //         $category_url = str_replace([" ", "&"], ["-", "%20"], strtolower($category_url));
    //         $category_url = "'" . $category_url . "'";
    //         $tablefields = implode(",", array_keys($data));
    //         $tableValues = "'" . implode("','", array_values($data)) . "'";
    //         $tablefields = $tablefields . ",url_key";

    //         $stmt = "INSERT INTO category ($tablefields) VALUES ($tableValues,$category_url)";
    //         $db->exec($stmt);

    //         echo "<script>
    //         alert('Category addded successfully');
    //         window.location.replace('/cybercom/php/MVC/public/Admin/Categories/category');
    //     </script>";
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //     }
    // }
    // public static function delete($value = "")
    // {
    //     try {
    //         $db = static::getDB();

    //         $stmt = "DELETE FROM category WHERE category_id='$value'";
    //         $db->exec($stmt);
    //         echo "<script>
    //                 alert('Category deleted successfully');
    //                 window.location.replace('/cybercom/php/MVC/public/Admin/Categories/category');
    //             </script>";
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //     }
    // }
    // public static function getData($value = "")
    // {
    //     try {
    //         $db = static::getDB();
    //         $stmt = $db->query("Select * FROM category WHERE category_id=$value");
    //         $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //         return $result;
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //     }
    // }
    // public static function updateValue($data, $value = "")
    // {
    //     try {
    //         $db = static::getDB();

    //         foreach ($data as $tablefields => $tableValues) {

    //             $stmt = "UPDATE category SET $tablefields='$tableValues' where category_id='$value'";
    //             $db->exec($stmt);
    //         }
    //         echo "<script>
    //                 alert('Category updated successfully');
    //                 window.location.replace('/cybercom/php/MVC/public/Admin/Categories/category');
    //             </script>";
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //     }
    // }
    // public static function returnParentName($value)
    // {
    //     try {
    //         $db = static::getDB();
    //         $stmt = $db->query("Select parent_category_name FROM parent_category WHERE parent_category_id='$value'");
    //         $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //         foreach ($result as $fieldname => $key) {
    //             return $key;
    //         }
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //     }
    // }
    // public static function displayParentCategory()
    // {
    //     try {
    //         $db = static::getDB();
    //         $stmt = $db->query("Select * FROM parent_category WHERE parent_category_id=parent_category_id");
    //         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //         return $result;
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //     }
    // }
    // public static function returnCategoryName()
    // {
    //     try {
    //         $db = static::getDB();
    //         $stmt = $db->query("Select * FROM category WHERE category_id=category_id");
    //         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //         return $result;
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //     }
    // }
}