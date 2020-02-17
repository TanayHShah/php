<?php

namespace App\Controller\Admin;
use \Core\View;
use App\Model\Cms_pages;


class Cms extends \Core\Controller
{
    
    public function pagesAction()
    {
        $home=Cms_pages::getAllcms();
        View::renderTemplate('Admin/Cms/home.html',['cms'=>$home]);
    }
    public function viewCmsAction()
    {
        View::renderTemplate('Admin/Cms/addCms.html');
    }
  
    // public function addCms(){
    //     $data=$_POST;
    //     // echo $this->route_params['id'];
    //     Cms_pages::addCms($data);

    // }
    // public function deleteAction(){
    //     Cms_pages::delete($this->route_params['id']);

    // }
    // public function updateAction()
    // {
    //     $cms_page=Cms_pages::getData($this->route_params['id']);
    //     View::renderTemplate('Admin/Cms/update.html',['cms'=>$cms_page]);
    // }
    // public function updateDataAction()
    // {
    //     $data=$_POST;
    //     Cms_pages::updateValue($data,$this->route_params['id']);
    // }
    
}
