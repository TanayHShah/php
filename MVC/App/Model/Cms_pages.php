<?php

namespace App\Model;

use PDO;
use PDOException;

class Cms_pages extends \Core\Model
{
    public static function getAllcms()
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
    public static function addCms($data)
    {
        try {
            $db = static::getDB();
            foreach ($data as $tablefields => $values) {
                if ($tablefields == 'page_title') {
                    if ($values != null) {
                        $cms_url = $values;
                    } else {
                        $cms_url = "";
                    }
                }
            }
            $cms_url = str_replace([" ", "&"], ["-", "%20"], strtolower($cms_url));
            $cms_url = "'" . $cms_url . "'";
            $tablefields = implode(",", array_keys($data));
            $tableValues = "'" . implode("','", array_values($data)) . "'";
            $tablefields = $tablefields . ",url_key";

           $stmt = "INSERT INTO cms_pages ($tablefields) VALUES ($tableValues,$cms_url)";
            $db->exec($stmt);

            echo "<script>
            alert('Cms_Page addded successfully');
            window.location.replace('/cybercom/php/MVC/public/Admin/Cms/pages');
        </script>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function delete($value = "")
    {
        try {
            $db = static::getDB();

            $stmt = "DELETE FROM cms_pages WHERE cms_id='$value'";
            $db->exec($stmt);
            echo "<script>
                    alert('Cms_page deleted successfully');
                    window.location.replace('/cybercom/php/MVC/public/Admin/Cms/pages');
                </script>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function getData($value = "")
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("Select * FROM cms_pages WHERE cms_id=$value");
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

            foreach ($data as $tablefields => $tableValues) {

                $stmt = "UPDATE cms_pages SET $tablefields='$tableValues' where cms_id='$value'";
                $db->exec($stmt);
            }
            echo "<script>
                    alert('Cms_Page updated successfully');
                    window.location.replace('/cybercom/php/MVC/public/Admin/Cms/pages');
                </script>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
