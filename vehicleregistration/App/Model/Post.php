<?php

namespace App\Model;

use PDO;
use PDOException;

class Post extends \Core\Model
{
    public static function getAll()
    {
        // $host='localhost';
        // $dbname='mvc';
        // $username='root';
        // $password='';
        try {
            // $db=new PDO("mysql:host=$host; dbname=$dbname; charset=utf8",
            // $username, $password);
            $db = static::getDB();
            $stmt = $db->query('Select * FROM posts WHERE post_id=post_id');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function add($data)
    {
        // $host='localhost';
        // $dbname='mvc';
        // $username='root';
        // $password='';
        try {
            $db = static::getDB();

            $tablefields = implode(",", array_keys($data));
            $tableValues = "'" . implode("','", array_values($data)) . "'";

            $stmt = "INSERT INTO posts ($tablefields) VALUES ($tableValues)";
            $db->exec($stmt);

            echo "<script>
                    alert('post added successfully');
                    window.location.replace('/cybercom/php/MVC/public/posts/index');
                </script>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function delete($value = "")
    {
        try {
            $db = static::getDB();

            $stmt = "DELETE FROM posts WHERE post_id='$value'";
            $db->exec($stmt);
            echo "<script>
                    alert('post deleted successfully');
                    window.location.replace('/cybercom/php/MVC/public/posts/index');
                </script>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function getData($value = "")
    {
        // $host='localhost';
        // $dbname='mvc';
        // $username='root';
        // $password='';
        try {
            // $db=new PDO("mysql:host=$host; dbname=$dbname; charset=utf8",
            // $username, $password);
            $db = static::getDB();
            $stmt = $db->query("Select * FROM posts WHERE post_id=$value");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function updateValue($data, $value = "")
    {
        // $host='localhost';
        // $dbname='mvc';
        // $username='root';
        // $password='';
        try {
            $db = static::getDB();

            foreach ($data as $tablefields => $tableValues) {
                print_r($data);

             $stmt = "UPDATE posts SET $tablefields='$tableValues' where post_id='$value'";
                $db->exec($stmt);
            }
            echo "<script>
                    alert('post added successfully');
                    window.location.replace('/cybercom/php/MVC/public/posts/index');
                </script>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
