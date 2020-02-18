<?php

namespace App\Controller;

use \Core\View;
use \App\Model\home_page;
use \App\Model\Category;

class categoryPage extends \Core\Controller
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
       $id=home_page::returnCategoryId($urlkey);
        foreach($id as &$tablefield){
            $value=$tablefield['category_id'];
        }
        $product=home_page::returnProducts($value);
        View::renderTemplate(
            'Home/category.html',['products'=>$product]
        );
    }
}
