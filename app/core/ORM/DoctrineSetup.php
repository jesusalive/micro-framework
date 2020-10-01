<?php

namespace LearningCore\ORM;

use Doctrine\DBAL\DBALException;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;
use LearningCore\Res;

class DoctrineSetup
{
    protected EntityManager $entityManager;

    public function start()
    {
        $config = Setup::createAnnotationMetadataConfiguration(
            [__DIR__ . '/../../../src/Entities'],
            $_ENV['IN_DEVELOPMENT']
        );

        try {
            $this->entityManager = EntityManager::create(
                [
                    'driver' => $_ENV['DB_DOCTRINE_DRIVER'],
                    'user' => $_ENV['DB_USER'],
                    'password' => $_ENV['DB_PASSWORD'],
                    'dbname' => $_ENV['DB_NAME'],
                    'host' => $_ENV['DB_HOST']
                ],
                $config
            );
        } catch (ORMException $e) {
            Res::error($e->getMessage(), 'ORMConnectError')->send();
        } catch (DBALException $e) {
            Res::error('Doctrine driver invalid. Verify your .env', 'DoctrineDriverError')->send();
        }
    }

    public function getEntityManager()
    {
        return $this->entityManager;
    }
}
