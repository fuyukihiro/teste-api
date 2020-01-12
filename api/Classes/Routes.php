<?php

namespace api\classes;

class Routes {

    public static function load($routes, $uri)
    {
        if (!array_key_exists($uri, $routes)) {
            throw new Exception("Está página não existe {$uri}");
        } else {
            return "../api/{$routes[$uri]}".'.php';
        }
    }

}