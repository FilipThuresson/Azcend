<?php

namespace Azcend;
use Azcend\controllers\IndexController;

class Router
{
    public static function contentToRender() : void
    {
        $uri = self::processURI();
        if (class_exists($uri['controller'])) {
            $controller = $uri['controller'];
            $method = $uri['method'];
            $args = $uri['args'];

            $controller = new $controller;
            if (method_exists($controller, $method)) {
                $args ? (new $controller)->{$method}(...$args) :
                    (new $controller)->{$method}();
            } else {
                self::error(404);
            }
        } else {
            self::error(404);
        }
    }

    private static function getURI() : array
    {
        $path_info = $_SERVER['REQUEST_URI'] ?? '/';
        return explode('/', $path_info);
    }

    private static function processURI() : array
    {
        $controllerPart = self::getURI()[1] ?? '';
        $methodPart = self::getURI()[2] ?? '';
        $numParts = count(self::getURI());
        $argsPart = [];
        for ($i = 2; $i < $numParts; $i++) {
            $argsPart[] = self::getURI()[$i] ?? '';
        }

        //Let's create some defaults if the parts are not set
        $controller = !empty($controllerPart) ?
            'Azcend\\Controllers\\'.$controllerPart.'Controller' :
            'Azcend\\Controllers\IndexController';

        $method = !empty($methodPart) ?
            $methodPart :
            'index';

        $args = !empty($argsPart) ?
            $argsPart :
            [];

        return [
            'controller' => $controller,
            'method' => $method,
            'args' => $args
        ];
    }

    private static function error(int $code): void
    {
        include_once ("Views/errors/{$code}.html");
    }
}