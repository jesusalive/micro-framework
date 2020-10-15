<?php

declare(strict_types=1);

namespace Learning\Repositories\Users;

use Learning\Entities\User;
use Learning\Repositories\Users\DTO\CreateUserDTO;
use Learning\Repositories\Users\DTO\UpdateUserDTO;

interface IUserRepository
{
    public function getAll(): array;
    public function create(CreateUserDTO $userDTO): User;
    public function update(int $id, UpdateUserDTO $userDTO): User;
    public function delete(int $id): void;
}