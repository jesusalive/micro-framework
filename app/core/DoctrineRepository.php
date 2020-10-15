<?php

declare(strict_types=1);

namespace LearningCore;

use Doctrine\ORM\EntityManager;
use LearningCore\ORM\ORMCore;
use Symfony\Component\HttpFoundation\Request;

abstract class DoctrineRepository
{
    protected EntityManager $entityManager;

    public function __construct()
    {
        $this->entityManager = ORMCore::getEntityManager();
    }
}
