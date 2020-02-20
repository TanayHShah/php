<?php
session_start();
// require 'D:\cybercom creation\xamp\htdocs\cybercom\php\MVC\App\Controller\Home.php';
// require '../Core/Router.php';
require '../vendor/autoload.php';
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

$router = new Core\Router();
$router->add('', ['controller' => 'User', 'action' => 'index']);
$router->add('Home', ['controller' => 'Home', 'action' => 'index']);
$router->add('{urlkey}', ['controller' => 'Home', 'action' => 'view']);
// $router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
// $router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
// $router->add('{controller}/{id:\d+}/{action}',['namespace' => 'Admin']);
$router->add('Admin/{controller}/{action}',['namespace' => 'Admin']);
$router->add('Admin/cms/{controller}/{action}',['namespace' => 'Admin\CMS']);
$router->add('Admin/cms/{controller}/{action}/{id:\d+}',['namespace' => 'Admin\CMS']);
$router->add('Admin/{controller}/{action}/{id:\d+}',['namespace' => 'Admin']);
// $router->add('{controller}/{action}/{urlkey}');
$router->add('{controller}/{action}/"urlkey"');

$url = $_SERVER['QUERY_STRING'];
// if ($router->match($url)) {
//     echo '<pre>';
//     print_r($router->getParam());
//     echo '</pre>';
// }
// echo '<pre>';
// var_dump($router->getRoutes());
// echo htmlspecialchars(print_r($router->getRoutes(),true));
// echo '</pre>';
// if ($router->match_regex($url)) {
//     var_dump($router->getParam());
// } else {
//     echo 'NO ROUTE TO THE URL';
// }
// $router->replace($url);
$router->dispatch($url);
