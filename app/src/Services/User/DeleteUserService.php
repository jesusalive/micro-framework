<?php

declare(strict_types=1);

namespace Learning\Services\User;

use Learning\Repositories\Users\IUserRepository;
use LearningCore\Exceptions\DBException;
use LearningCore\Exceptions\EntityNotFoundException;
use LearningCore\Res;

class DeleteUserService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $repository)
    {
        $this->userRepository = $repository;
    }

    public function __invoke(int $id)
    {
        try {
            $this->userRepository->delete($id);

            return Res::send('');
        } catch (EntityNotFoundException|DBException $e) {
            return Res::error($e->getMessage(), $e->getType(), $e->getCode());
        }
    }
}