<?php

namespace App\Controller;
use \Core\View;
use App\Model\adminn;
use App\Model\Category;


class Admin extends \Core\Controller
{
    public function loginAction()
    {
        View::renderTemplate('Admin/index.html');
    }
    public function indexAction()
    {
        if($_POST['username']=='admin' && $_POST['password']=='admin'){
         View::renderTemplate('Admin/dashboard.html');
        }
        else{
            echo "<script>alert('WRONG USERNAME OR PASSWORD')</script>";
            View::renderTemplate('Admin/index.html');
        }
    }
    // public function addNewAction()
    // {
    //     View::renderTemplate('Posts/addNew.html');
    // }
    // public function edit(){
    //     echo '<br><pre>';
    //     print_r(htmlspecialchars(print_r($this->route_params, true)));
    //     echo '</pre>';
    // }
    // public function insertAction(){
    //     $data=$_POST;
    //     // echo $this->route_params['id'];
    //     Post::add($data);

    // }
    // public function deleteAction(){
    //     $data=$_POST;
    //     // echo $this->route_params['id'];
    //     Post::delete($this->route_params['id']);

    // }
    // public function updateAction()
    // {
    //     $posts=Post::getData($this->route_params['id']);
    //     View::renderTemplate('Posts/update.html',['post'=>$posts]);
    // }
    // public function updateDataAction()
    // {
    //     $data=$_POST;
    //     Post::updateValue($data,$this->route_params['id']);
    // }
    
}
