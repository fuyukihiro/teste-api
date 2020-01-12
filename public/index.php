<?php
require "../vendor/autoload.php";

use api\classes\Layout;
use api\classes\Uri;
use api\classes\Routes;

$routes = [
    '/' => 'Controller/login',
];

$uri = Uri::load();
$layout = new Layout;

require Routes::load($routes, $uri);

require $layout->master('master');