<?php

namespace Learning\Controllers;

use Doctrine\ORM\EntityRepository;
use LearningCore\Controller;
use LearningCore\Res;
use LearningCore\Utils;
use Learning\Entities\User;
use Symfony\Component\HttpFoundation\Request;

class UsersController extends Controller
{
    private EntityRepository $userRepository;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->userRepository = $this->entityManager->getRepository(User::class);
    }

    public function getAll()
    {
        $users = Utils::getJsonSerializeArray($this->userRepository->findAll());
        return Res::json($users);
    }

    public function create()
    {
        $user = new User($this->requestBody->name, $this->requestBody->email);
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return Res::json($user);
    }

    public function update($id)
    {
        $user = $this->userRepository->findOneBy(['id' => $id]);

        if (!$user) {
            return Res::error('User not found');
        }

        if ($this->requestBody->name) {
            $user->setName($this->requestBody->name);
        }

        if ($this->requestBody->email) {
            $user->setName($this->requestBody->name);
        }

        $this->entityManager->flush();

        return Res::json($user);
    }

    public function delete($id)
    {
        $user = $this->userRepository->findOneBy(['id' => $id]);

        if (!$user) {
            return Res::error('User not found');
        }

        $this->entityManager->remove($user);
        $this->entityManager->flush();

        return Res::send('');
    }
}
