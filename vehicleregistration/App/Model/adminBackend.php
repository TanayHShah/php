<?php

namespace App\Model;

use PDO;
use PDOException;

class adminBackend extends \Core\Model
{
    public static function returnService($data)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM service_registrations WHERE serviceId	='$data'   ");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function updateService($data,$id)
    {
        try {
            $db = static::getDB();
            foreach($data as $key => $value){
                $stmt = $db->query("UPDATE service_registrations SET $key='$value' WHERE serviceId	='$id'   ");
            }
            echo "<script>alert('SERVICE EDITED')
            window.location.replace('/cybercom/php/vehicleregistration/public/Admin/index');</script>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
