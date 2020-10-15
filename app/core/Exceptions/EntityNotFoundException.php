<?php

declare(strict_types=1);

namespace LearningCore\Exceptions;

class EntityNotFoundException extends Exception
{
    public function __construct($message = "")
    {
        parent::__construct($message, 'NotFoundError', 400);
    }
}
