<?php

namespace App\Controller;

use \Core\View;
use \App\Model\home_page;
use \App\Model\Category;

class Home extends \Core\Controller
{
    function __construct()
    {
        $pages = home_page::getheader();
        $categories = Category::displayParentCategory();
        $category_name=Category::returnCategoryName();
        View::renderTemplate(
            'frontend.html',
            ["pages" => $pages, "categories" => $categories,"category_name"=>$category_name]
        );
    }
    public function indexAction()
    {
        View::renderTemplate(
            'Home/index.html'
        );
    }
    public function viewAction($urlkey)
    {
        $url=$urlkey;
        View::renderTemplate(
            'Home/category.html',["url"=>$urlkey]
        );
    }
}
