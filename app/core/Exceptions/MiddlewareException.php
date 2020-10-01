<?php

declare(strict_types=1);

namespace LearningCore\Exceptions;

class MiddlewareException extends \RuntimeException
{
    public function __construct($message = "")
    {
        parent::__construct($message, 400, null);
    }
}
