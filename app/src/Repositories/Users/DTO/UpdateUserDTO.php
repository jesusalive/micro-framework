<?php

declare(strict_types=1);

namespace Learning\Repositories\Users\DTO;

use LearningCore\IDTO;

class UpdateUserDTO implements IDTO
{
    private ?string $name;
    private ?string $email;

    /**
     * UpdateUserDTO constructor.
     * @param string|null $name
     * @param string|null $email
     */
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
     * @param string|null $name
     * @return UpdateUserDTO
     */
    public function setName(?string $name): UpdateUserDTO
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
     * @param string|null $email
     * @return UpdateUserDTO
     */
    public function setEmail(?string $email): UpdateUserDTO
    {
        $this->email = $email;
        return $this;
    }

    public function validateFields(): void
    {
    }
}