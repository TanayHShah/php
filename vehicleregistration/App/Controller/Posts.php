<?php

namespace App\Controller;
use \Core\View;
use App\Model\Post;
use Core\Model;

class Posts extends \Core\Controller
{
    public function indexAction()
    {
        $posts=Post::getAll();
        // echo "Hello From Index Action";
        // echo '<br><pre>';
        // print_r(htmlspecialchars(print_r($_GET, true)));
        // echo '</pre>';
        View::renderTemplate('Posts/index.html',['posts'=>$posts]);
    }
    public function addNewAction()
    {
        View::renderTemplate('Posts/addNew.html');
    }
    public function edit(){
        echo '<br><pre>';
        print_r(htmlspecialchars(print_r($this->route_params, true)));
        echo '</pre>';
    }
    public function insertAction(){
        $data=$_POST;
        // echo $this->route_params['id'];
        Post::add($data);

    }
    public function deleteAction(){
        $data=$_POST;
        // echo $this->route_params['id'];
        Post::delete($this->route_params['id']);

    }
    public function updateAction()
    {
        $posts=Post::getData($this->route_params['id']);
        View::renderTemplate('Posts/update.html',['post'=>$posts]);
    }
    public function updateDataAction()
    {
        $data=$_POST;
        Post::updateValue($data,$this->route_params['id']);
    }
    
}
