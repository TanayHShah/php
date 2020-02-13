<?php
// require 'D:\cybercom creation\xamp\htdocs\cybercom\php\MVC\App\Controller\Home.php';
// require '../Core/Router.php';
require '../vendor/autoload.php';



$router = new Core\Router();
$router->add('', ['controller' => 'Home', 'action' => 'index']);
// $router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
// $router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
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
