<?php
namespace App\Model;
use PDO;
use PDOException;

class Post{
    public static function getAll(){
        $host='localhost';
        $dbname='mvc';
        $username='root';
        $password='';
        try{
            $db=new PDO("mysql:host=$host; dbname=$dbname; charset=utf8",
            $username, $password);
            // $stmt=$db->query('Select * FROM posts WHERE post_id=1');
            // $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            // return $result;
            $stmt=$db->query('Select * FROM posts WHERE post_id=1');
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
