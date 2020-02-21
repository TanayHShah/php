<?php

namespace App\Controller;

use \Core\View;
use App\Model\home_page;
use App\Model\adminBackend;

class Admin extends \Core\Controller
{

    public function indexAction()
    {
        $data = home_page::displayAllServices();
        View::renderTemplate('Admin/index.html', ['data' => $data]);
    }
    public function update()
    {
        $id = $this->route_params['id'];
        $data = adminBackend::returnService($id);
        View::renderTemplate('Admin/update.html', ['services' => $data]);
    }
    public function updateData()
    {
        $data = $_POST;
        $id = $this->route_params['id'];
        $data = adminBackend::updateService($data, $id);
    }
}
