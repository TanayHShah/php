<?php

namespace App\Controller;
use \Core\View;
class Home extends \Core\Controller
{
    public function indexAction()
    {
        // echo "Hello From Home Index";
    //     View::render('Home/index.php',
    //     ['name' =>'ABC','colours'=>['red','green']]);
    // }
    View::renderTemplate('Home/index.html',
    ['name' =>'ABC','colours'=>['red','green']]);
}
    // protected function before() 
    // {
    //     echo "(before)";
    // }
    // protected function after()
    // {
    //     echo "(after)";
    // }  
}
