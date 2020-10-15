<?php

namespace Learning\Controllers;

use Learning\Repositories\Users\DTO\CreateUserDTO;
use Learning\Repositories\Users\DTO\UpdateUserDTO;
use Learning\Repositories\Users\DoctrineUserRepository;
use Learning\Services\User\CreateUserService;
use Learning\Services\User\DeleteUserService;
use Learning\Services\User\GetAllUsersService;
use Learning\Services\User\UpdateUserService;
use LearningCore\Controller;
use LearningCore\Exceptions\DBException;
use LearningCore\Exceptions\EntityNotFoundException;
use LearningCore\Exceptions\ValidationException;
use LearningCore\Res;

class UsersController extends Controller
{
    public function getAll()
    {
        return (new GetAllUsersService(new DoctrineUserRepository()))();
    }

    public function create()
    {
        $userDTO = new CreateUserDTO($this->requestBody->name, $this->requestBody->email);
        return (new CreateUserService(new DoctrineUserRepository()))($userDTO);
    }

    public function update($id)
    {
        $userDTO = new UpdateUserDTO($this->requestBody->name, $this->requestBody->email);
        return (new UpdateUserService(new DoctrineUserRepository()))($id, $userDTO);
    }

    public function delete($id)
    {
        return (new DeleteUserService(new DoctrineUserRepository()))($id);
    }
}
