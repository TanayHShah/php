<?php

namespace Core;
use Twig;
use Twig\Loader;
class View
{
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);
        $file = "../App/View/$view";
        if (is_readable($file)) {
            require $file;
        } else {
            echo "$file not found";
        }  
    }
    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;
        if ($twig === null) {
            $loader = new \Twig\Loader\FilesystemLoader('../App/View');
            $twig = new \Twig\Environment($loader);
            $twig->addGlobal('session',$_SESSION);
        }
        echo $twig->render($template, $args);
    }
}
