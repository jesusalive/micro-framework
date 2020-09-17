<?php
declare(strict_types = 1);

use Learning\Core\Kernel;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap/bootstrap.php';

$router = require_once __DIR__ . '/src/routes.php';
$kernel = new Kernel($router->getRoutesCollection());

$request = Request::createFromGlobals();
$kernel->handle($request)->send();