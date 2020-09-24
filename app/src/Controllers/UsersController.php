<?php

namespace Learning\Controllers;

use Doctrine\ORM\EntityRepository;
use Learning\Core\Controller;
use Learning\Core\Res;
use Learning\Core\Utils;
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
        return Res::json([
            'id' => $id,
            'name' => 'Matheus Gomes'
        ]);
    }
}
