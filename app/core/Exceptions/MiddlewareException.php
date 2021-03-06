<?php

declare(strict_types=1);

namespace LearningCore\Exceptions;

class MiddlewareException extends Exception
{
    public function __construct($message = "")
    {
        parent::__construct($message, 'MiddlewareException', 400);
    }
}
