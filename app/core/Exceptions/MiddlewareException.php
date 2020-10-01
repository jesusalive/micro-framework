<?php

declare(strict_types=1);

namespace LearningCore\Exceptions;

class MiddlewareException extends \RuntimeException
{
    public function __construct($message = "", $code = 400)
    {
        parent::__construct($message, $code, null);
    }
}
