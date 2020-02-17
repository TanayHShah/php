<?php

namespace App\Controller\Admin;
use \Core\View;
use App\Model\Category;


class Categories extends \Core\Controller
{
    
    public function categoryAction()
    {
        $categories=Category::getAllcategories();
        View::renderTemplate('Admin/Category/category.html',['categories'=>$categories]);
    }
    public function viewCategoryAction()
    {
        $categories=Category::displayParentCategory();
        View::renderTemplate('Admin/Category/addCategory.html',['categories'=>$categories]);
    }
  
    public function addCategory(){
        $data=$_POST;
        $data['image'] = $_FILES['image']['name'];
        if(static::getImageData('image')) {
        Category::addCategory($data);
        }
    }
    public function deleteAction(){
        Category::delete($this->route_params['id']);

    }
    public function updateAction()
    {
        $categories=Category::getData($this->route_params['id']);
        $category=Category::displayParentCategory();
        View::renderTemplate('Admin/Category/update.html',['categories'=>$category, 'post'=>$categories]);
    }
    public function updateDataAction()
    {
        $data=$_POST;
        Category::updateValue($data,$this->route_params['id']);
    }
    public static function getImageData($imageName) {
        if(!empty($_FILES[$imageName]['name'])) {
            $name = $_FILES[$imageName]['name'];
            $size = $_FILES[$imageName]['size'];
            $type = $_FILES[$imageName]['type'];
            $tmp_name = $_FILES[$imageName]['tmp_name'];
            $uploadPath = 'D:/cybercom creation/xamp/htdocs/cybercom/php/MVC/public/image/product/';
            $extension = strtolower(substr($name,strpos($name,'.')+1));
            if(($extension === 'jpeg' || $extension === 'png' || $extension === 'jpg'  || $extension === 'jfif') && ($type === 'image/png' || $type === 'image/jpeg' || $type === 'image/jpg')) {
                    if($size < 3526840) {
                        if(move_uploaded_file($tmp_name, $uploadPath.$name)) {
                            return true;
                        } else {
                            echo "Something went wrong";
                        } 
                    } else {
                        echo "Please select file upto 2 Mb";
                    }
            } else {
                echo "Please select only image file";
            }
        } else {
            echo "Please Select the file";
        }
    }
    
}
