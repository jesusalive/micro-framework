<?php

declare(strict_types=1);

namespace LearningCore\Exceptions;

class Exception extends \RuntimeException
{
    private string $type;

    /**
     * Exception constructor.
     * @param string $message
     * @param string $type
     * @param int $code
     */
    public function __construct(string $message, string $type, int $code)
    {
        parent::__construct($message, $code);
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Exception
     */
    public function setType(string $type): Exception
    {
        $this->type = $type;
        return $this;
    }
}