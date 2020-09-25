<?php

declare(strict_types=1);

use LearningCore\Kernel;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . '/bootstrap/bootstrap.php';

$router = require_once __DIR__ . '/src/routes.php';
$kernel = new Kernel($router->getRoutesCollection());

$request = Request::createFromGlobals();
$kernel->handle($request)->send();
