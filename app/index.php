<?php

use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . '/vendor/autoload.php';
include __DIR__ . '/src/routes.php';

$request = Request::createFromGlobals();
$router->handle($request)->send();