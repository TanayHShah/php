<?php

namespace App\Controller;

use \Core\View;
use \App\Model\home_page;
use \App\Model\Category;

class productPage extends \Core\Controller
{
    function __construct()
    {
        $pages = home_page::getheader();
        $categories = Category::displayParentCategory();
        $category_name = Category::returnCategoryName();
        View::renderTemplate(
            'frontend.html',
            ["pages" => $pages, "categories" => $categories, "category_name" => $category_name]
        );
    }
    public function indexAction($urlkey)
    {
        $product=home_page::returnProductDescription($urlkey);
        View::renderTemplate(
            'Home/product.html',['products'=>$product]
        );
    }
}
