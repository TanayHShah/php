<?php

namespace App\Model;

use PDO;
use PDOException;

class home_page extends \Core\Model
{

    public static function userRegistration($data, $address)
    {
        try {
            $columnName = [];
            $columnValue = [];
            foreach ($data as $key => $value) {
                array_push($columnName, $key);
                array_push($columnValue, $value);
            }
            $key = implode(',', $columnName);
            $value = "'" . implode("','", $columnValue) . "'";
            $db = static::getDB();
            $stmt = $db->query("INSERT INTO users ($key) VALUES ($value)");
            $id = $db->lastInsertId();
            $columnName = [];
            $columnValue = [];
            foreach ($address as $key => $value) {
                array_push($columnName, $key);
                array_push($columnValue, $value);
            }
            $key = implode(',', $columnName);
            $value = "'" . implode("','", $columnValue) . "'";
            $db = static::getDB();
            $stmt = $db->query("INSERT INTO user_addresses ($key,userId) VALUES ($value,$id)");
            echo "<script>alert('REGISTRATION COMPLETED')
            window.location.replace('/cybercom/php/vehicleregistration/public/');</script>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function userCheck($data)
    {
        try {
            $db = static::getDB();
            $email = "'" . $data['email'] . "'";
            $password = "'" . $data['password'] . "'";
            $stmt = $db->query("SELECT * FROM users WHERE email=$email AND password=$password ");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function userMail($data)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM users WHERE email='$data'  ");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function checkVehicle($data)
    {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM service_registrations WHERE vehicleNumber='$data'  ");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function checkLicense($data)
    {
        try {
            $db = static::getDB();
            $id = $_SESSION['user_Id'];
            $stmt = $db->query("SELECT * FROM service_registrations WHERE licenceNumber	='$data' AND userId != $id  ");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function insertService($data)
    {
        try {
            $columnName = [];
            $columnValue = [];
            foreach ($data as $key => $value) {
                array_push($columnName, $key);
                array_push($columnValue, $value);
            }
            $key = implode(',', $columnName);
            $value = "'" . implode("','", $columnValue) . "'";
            $db = static::getDB();
            $id = $_SESSION['user_Id'];
            $stmt = $db->query("INSERT INTO service_registrations ($key,userId) VALUES ($value,$id)   ");
            echo "<script>alert('SERVICE IS BEING BOOKED')
            window.location.replace('/cybercom/php/vehicleregistration/public/Home/index');</script>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function checkTimeSlot($data,$checkDate)
    {
        try {
            $db = static::getDB();
            $id = $_SESSION['user_Id'];
            $stmt = $db->query("SELECT COUNT(timeslot) FROM service_registrations WHERE timeslot='$data' AND date='$checkDate'  ");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function displayServices()
    {
        try {
            $db = static::getDB();
            $id = $_SESSION['user_Id'];
            $stmt = $db->query("SELECT * FROM service_registrations WHERE userId=$id  ");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function displayAllServices()
    {
        try {
            $db = static::getDB();
            $id = $_SESSION['user_Id'];
            $stmt = $db->query("SELECT * FROM service_registrations WHERE userId=userId  ");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
