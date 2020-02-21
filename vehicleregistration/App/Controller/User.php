<?php

namespace App\Controller;

use \Core\View;
use \App\Model\home_page;

class User extends \Core\Controller
{
    public function indexAction()
    {
        View::renderTemplate(
            'Home/userLogin.html'
        );
    }
    public function RegisterAction()
    {
        View::renderTemplate(
            'Home/registrationPage.html'
        );
    }
    public function registerUserAction()
    {
        $userdata = [];
        $useraddress = [];
        $flag = 0;
        foreach ($_POST as $key => $value) {
            if ($key == 'user') {
                $userdata = $value;
            }
            if ($key == 'address') {

                $useraddress = $value;
            }
        }
        foreach ($userdata as &$key) {
            if ($key == null)
                $flag = 1;
        }
        foreach ($useraddress as &$key) {
            if ($key == null)
                $flag = 1;
        }
        foreach ($userdata as $key => $value) {
            if ($key == 'email') {
                $checkmail = $value;
            }
        }
        $mail = home_page::userMail($checkmail);
        if ($flag == 0) {
            if (empty($mail)) {
                home_page::userRegistration($userdata, $useraddress);
            } else {
                echo "<script>alert('MAIL ALREADY EXISTS')
                window.location.replace('/cybercom/php/vehicleregistration/public/User/register');</script>";
            }
        } else {
            echo "<script>alert('ALL FIELDS ARE MUST')
            window.location.replace('/cybercom/php/vehicleregistration/public/User/register');</script>";
        }
    }
    public function checkLoginAction()
    {
        $data = $_POST;
        $returnUser = home_page::userCheck($data);
        if (empty($returnUser)) {
            echo "<script>alert('Enter Valid Username And Password');
            window.location.replace('/cybercom/php/vehicleregistration/public/');</script>";
        } else {
            $_SESSION['user_Id'] = $returnUser['userId'];
            echo "<script> window.location.replace('/cybercom/php/vehicleregistration/public/Home/index');</script>";
        }
    }
    public function serviceFormAction()
    {
        View::renderTemplate(
            'Home/serviceForm.html'
        );
    }
    public function serviceAction()
    {
        $flag = 0;
        foreach ($_POST as $key => $value) {
            if ($value == null)
                $flag = 1;
        }
        if ($flag == 1) {
            echo "<script>alert('ALL FIELDS ARE MUST')
            window.location.replace('/cybercom/php/vehicleregistration/public/User/serviceForm');</script>";
        } else {
            foreach ($_POST as $key => $value) {
                if ($key == 'date') {
                    $time = $value;
                }
                if ($key == 'vehicleNumber') {
                    $vehiclenumber = $value;
                }
                if ($key == 'licenceNumber') {
                    $licencenumber = $value;
                }
                if ($key == 'timeslot') {
                    $timeslot = $value;
                }
            }
            $checkVehicle = home_page::checkVehicle($vehiclenumber);
            if (!empty($checkVehicle)) {
                echo "<script>alert('Vehicle Already Booked For Service')
                window.location.replace('/cybercom/php/vehicleregistration/public/User/serviceForm');</script>";
            } else {
                $checkLicense = home_page::checkLicense($licencenumber);
                if (!empty($checkLicense)) {
                    echo "<script>alert('License Already Booked For Service')
                    window.location.replace('/cybercom/php/vehicleregistration/public/User/serviceForm');</script>";
                } else {
                    $timeSlot = home_page::checkTimeSlot($timeslot,$time);
                    $timeSlot = implode($timeSlot);
                    if ($timeSlot < 3) {
                        if (strtotime($time) > strtotime(date("Y/m/d"))) {
                            home_page::insertService($_POST);
                        } else {
                            echo "<script>alert('DATE MUST BE OF FUTURE')
                        window.location.replace('/cybercom/php/vehicleregistration/public/User/serviceForm');</script>";
                        }
                    }else{
                        echo "<script>alert('BOOKINGS FULL AT THAT TIME PLEASE SELECT ANOTHER SLOT')
                        window.location.replace('/cybercom/php/vehicleregistration/public/User/serviceForm');</script>";

                    }
                }
            }
        }
    }
}
