<?php

declare(strict_types=1);

namespace LearningCore\Exceptions;

class DBException extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message, 'DatabaseError', 400);
    }
}