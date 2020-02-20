<?php

namespace App\Controller;

use \Core\View;
use \App\Model\home_page;
use \App\Model\Category;
class User extends \Core\Controller
{
    public function indexAction()
    {

        $url = home_page::viewContent();
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
        $data = $_POST;
        home_page::userRegistration($data);
    }
    public function checkLoginAction()
    {
        $data = $_POST;
        $returnUser = home_page::userCheck($data);
        if (empty($returnUser)) {
            echo "<script>alert('Enter Valid Username And Password');
            window.location.replace('/cybercom/php/MVC/public/');</script>";
        } else {
            $_SESSION['user_Id'] = $returnUser['userId'];
            echo "<script> window.location.replace('/cybercom/php/MVC/public/Home/index');</script>";
        }
    }
    // public function CartAction()
    // {

    //     $data=(array)json_decode($_POST['data']);
    //     print_r($data);
    //     die();
    //     View::renderTemplate(
    //         'Home/index.html'
    //     );
    // }

}
