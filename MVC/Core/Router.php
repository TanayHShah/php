<?php

namespace Core;

class Router
{
    protected $routes = [];
    protected $param = [];
    public function add($route, $parm = [])
    {
        $route = preg_replace('/\//', '\\/', $route);
        $route = preg_replace('/\{([a-z0-9-]+)\}/', '(?P<\1>[a-z0-9-]+)', $route);
        $route = preg_replace('/\{([a-z0-9-]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
        $route = '/^' . $route . '$/i';
        $this->routes[$route] = $parm;
    }
    function getRoutes()
    {
        return $this->routes;
    }

    function match($url)
    {
        foreach ($this->routes as $route => $param) {
            if ($url == $route) {
                $this->param = $param;
                print_r($this->param);
                return true;
            }
        }
        return false;
    }
    public function match_regex($url)
    {
        // $url_regex = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/i";
        foreach ($this->routes as $route => $param) {
            if (preg_match($route, $url, $matches)) {
                // $param = [];
                foreach ($matches as $controller => $action) {
                    if (is_string($controller))
                        $param[$controller] = $action;
                }
                $this->param = $param;
                return true;
            }
        }
        return false;
    }
    public function replace($url)
    {
        $url_regex = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/i";
        $url = preg_replace($url_regex, 'being replaced string', $url);
        echo '<br>' . $url;
    }
    function getParam()
    {
        return $this->param;
    }
    public function dispatch($url)
    {
        $url = $this->removeQueryStringVariables($url);
        if ($this->match_regex($url)) {
            $controller = $this->param['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            $controller = $this->getNamespace() . $controller;
            if (class_exists($controller)) {
                $controller_object = new $controller($this->param);
                $action = $this->param['action'];
                $action = $this->convertToCamelCase($action);
                if (is_callable([$controller_object, $action])) {
                    if (isset($this->param['urlkey'])) {
                        $controller_object->$action($this->param['urlkey']);
                    } else {
                        $controller_object->$action();
                    }
                } else {
                    echo "Method $action (in controller $controller) not found";
                    throw new \Exception("Method $action (in controller $controller) not found");
                }
            } else {
                echo "Controller class $controller not found";
                throw new \Exception("Controller class $controller not found");
            }
        } else {
            // echo "No Route Matched";
            throw new \Exception("No Route Matched", 404);
        }
    }
    protected function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }
    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }
    protected function removeQueryStringVariables($url)
    {
        if ($url != '') {
            $parts = explode('&', $url, 2);
            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }
        return $url;
    }
    protected function getNamespace()
    {
        $namespace = 'App\Controller\\';

        if (array_key_exists('namespace', $this->param)) {
            $namespace .= $this->param['namespace'] . '\\';
        }
        return $namespace;
    }
}
