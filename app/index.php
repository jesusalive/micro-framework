<?php
declare(strict_types = 1);

use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . '/vendor/autoload.php';
include __DIR__ . '/src/routes.php';

$request = Request::createFromGlobals();

$app->handle($request)->send();