<?php

namespace Learning\Services\User;

use Learning\Repositories\User\DTO\CreateUserDTO;
use Learning\Repositories\User\IUserRepository;
use LearningCore\Exceptions\DBException;
use LearningCore\Exceptions\ValidationException;
use LearningCore\Res;

class CreateUserService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $repository)
    {
        $this->userRepository = $repository;
    }

    public function __invoke(CreateUserDTO $userDTO)
    {
        try {
            $userDTO->validateFields();
            $response = $this->userRepository->create($userDTO);

            return Res::json($response, 201);
        } catch (DBException|ValidationException $e) {
            return Res::error($e->getMessage(), $e->getType(), $e->getCode());
        }
    }
}