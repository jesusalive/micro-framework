<?php

namespace Learning\Services\User;

use Learning\Repositories\Users\DTO\UpdateUserDTO;
use Learning\Repositories\Users\IUserRepository;
use LearningCore\Exceptions\DBException;
use LearningCore\Exceptions\EntityNotFoundException;
use LearningCore\Res;

class UpdateUserService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $repository)
    {
        $this->userRepository = $repository;
    }

    public function __invoke($id, UpdateUserDTO $userDTO)
    {
        try {
            $response = $this->userRepository->update($id, $userDTO);
            return Res::json($response, 200);
        } catch (EntityNotFoundException|DBException $e) {
            return Res::error($e->getMessage(), $e->getType(), $e->getCode());
        }

    }
}