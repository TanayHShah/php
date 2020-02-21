<?php

namespace App\Controller;

use \Core\View;
use \App\Model\home_page;


 class Home extends \Core\Controller
{
    public function indexAction()
    {
        $data=home_page::displayServices();
        View::renderTemplate(
            'Home/index.html',['data'=>$data]
        );
   }
//     public function viewAction($urlkey)
//     {
        
//         $url=home_page::viewContent($urlkey);
//         View::renderTemplate(
//             'Home/index.html',["url"=>$url]
//         );
//     }
    
 }
