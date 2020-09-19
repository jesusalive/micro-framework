<?php

use Dotenv\Dotenv;
use Learning\Core\ORM\DoctrineSetup;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$doctrine = new DoctrineSetup();
$doctrine->start();
