<?php

use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Learning\Core\ORM\ORMCore;
use Symfony\Component\Console\Helper\HelperSet;

require_once __DIR__ . '/bootstrap/bootstrap.php';

$entityManager = ORMCore::getEntityManager();

return new HelperSet([
    'em' => new EntityManagerHelper($entityManager),
    'db' => new ConnectionHelper($entityManager->getConnection())
]);
