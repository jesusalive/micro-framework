<?php

declare(strict_types=1);

namespace LearningCore;

use Doctrine\ORM\EntityManager;
use LearningCore\ORM\ORMCore;
use Symfony\Component\HttpFoundation\Request;

abstract class Controller
{
    protected Request $request;
    protected $requestBody;
    protected EntityManager $entityManager;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->requestBody = json_decode($request->getContent());
        $this->entityManager = ORMCore::getEntityManager();
    }
}
