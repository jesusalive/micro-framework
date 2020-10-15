<?php

declare(strict_types=1);

namespace LearningCore\Exceptions;

class ValidationException extends Exception
{
    public function __construct($message = "")
    {
        parent::__construct($message, 'ValidationError', 400);
    }
}
