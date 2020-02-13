<?php

namespace App\Controller;
use \Core\View;
use App\Model\Post;

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
    public function addNewAtion()
    {
        echo "Hello From addNew Action";
    }
    public function edit(){
        echo '<br><pre>';
        print_r(htmlspecialchars(print_r($this->route_params, true)));
        echo '</pre>';
    }
}
