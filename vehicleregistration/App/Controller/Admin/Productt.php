<?php

namespace App\Controller\Admin;
use \Core\View;
use App\Model\Adminn;
use App\Model\Category;


class Productt extends \Core\Controller
{
    
    public function productAction()
    {
        $posts=Adminn::getAllproducts();
        View::renderTemplate('Admin/Product/product.html',['posts'=>$posts]);
    }
    public function viewProductAction()
    {
        $data=Category::returnCategoryName();
        View::renderTemplate('Admin/Product/addProduct.html',['categories'=>$data]);
    }
    public function addProduct(){
        $data=$_POST;
        $data['image'] = $_FILES['image']['name'];
        if(static::getImageData('image')) {
            Adminn::addproducts($data);
        }
    }
    public function deleteAction(){
        $data=$_POST;
        Adminn::delete($this->route_params['id']);

    }
    public function updateAction()
    {
        $data=Category::returnCategoryName();
        $posts=Adminn::getData($this->route_params['id']);
        View::renderTemplate('Admin/Product/update.html',['post'=>$posts, 'categories'=>$data]);
    }
    public function updateDataAction()
    {
        $data=$_POST;
        Adminn::updateValue($data,$this->route_params['id']);
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
