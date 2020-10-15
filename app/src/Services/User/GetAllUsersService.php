<?php

namespace Learning\Services\User;

use Learning\Repositories\Users\IUserRepository;
use LearningCore\Res;
use LearningCore\Utils;

class GetAllUsersService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $repository)
    {
        $this->userRepository = $repository;
    }

    public function __invoke()
    {
        $users = Utils::getJsonSerializedArray($this->userRepository->getAll());
        return Res::json($users);
    }
}