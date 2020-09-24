<?php

namespace LearningCore\ORM;

class ORMCore
{
    private static function connect()
    {
        $doctrine = new DoctrineSetup();
        $doctrine->start();

        return $doctrine;
    }

    public static function getEntityManager()
    {
        $doctrine = self::connect();
        return $doctrine->getEntityManager();
    }
}
