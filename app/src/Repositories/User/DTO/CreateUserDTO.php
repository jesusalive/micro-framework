<?php

declare(strict_types=1);

namespace Learning\Repositories\User\DTO;

use LearningCore\Exceptions\ValidationException;
use LearningCore\IDTO;

class CreateUserDTO implements IDTO
{
    private ?string $name;
    private ?string $email;

    public function __construct(string $name = null, string $email = null)
    {
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CreateUserDTO
     */
    public function setName(string $name): CreateUserDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return CreateUserDTO
     */
    public function setEmail(string $email): CreateUserDTO
    {
        $this->email = $email;
        return $this;
    }

    public function validateFields(): void
    {
        if (!$this->getName()) {
            throw new ValidationException('Name field cannot be null');
        }

        if (!$this->getEmail()) {
            throw new ValidationException('Email field cannot be null');
        }
    }
}