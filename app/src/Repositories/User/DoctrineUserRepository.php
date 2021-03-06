<?php

namespace Learning\Repositories\User;

use Doctrine\DBAL\Driver\PDOException;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Learning\Entities\User;
use Learning\Repositories\User\DTO\CreateUserDTO;
use Learning\Repositories\User\DTO\UpdateUserDTO;
use LearningCore\DoctrineRepository;
use LearningCore\Exceptions\DBException;
use LearningCore\Exceptions\EntityNotFoundException;
use LearningCore\Exceptions\ValidationException;

class DoctrineUserRepository extends DoctrineRepository implements IUserRepository
{
    private EntityRepository $entityRepository;

    public function __construct()
    {
        parent::__construct();
        $this->entityRepository = $this->entityManager->getRepository(User::class);
    }

    public function getAll(): array
    {
        return $this->entityRepository->findAll();
    }

    public function create(CreateUserDTO $userDTO): User
    {
        $emailAlreadyInUse = $this->entityRepository->findOneBy(['email' => $userDTO->getEmail()]);

        if ($emailAlreadyInUse) {
            throw new ValidationException('Email already in use');
        }

        try {
            $user = new User($userDTO->getName(), $userDTO->getEmail());
            $this->entityManager->persist($user);
            $this->entityManager->flush();

            return $user;
        } catch (OptimisticLockException|ORMException $e) {
            throw new DBException($e->getMessage());
        }
    }

    public function update(int $id, UpdateUserDTO $userDTO): User
    {
        $user = $this->entityRepository->findOneBy(['id' => $id]);

        if (!$user) {
            throw new EntityNotFoundException('User not found');
        }

        try {
            if ($userDTO->getName()) {
                $user->setName($userDTO->getName());
            }

            if ($userDTO->getEmail()) {
                $user->setEmail($userDTO->getEmail());
            }

            $this->entityManager->flush();

            return User::fromObject($user);
        } catch (OptimisticLockException|ORMException $e) {
            throw new DBException($e->getMessage());
        }
    }

    public function delete(int $id): void
    {
        $user = $this->entityRepository->findOneBy(['id' => $id]);

        if (!$user) {
            throw new EntityNotFoundException('User not found');
        }

        try {
            $this->entityManager->remove($user);
            $this->entityManager->flush();
        } catch (OptimisticLockException|ORMException $e) {
            throw new DBException($e->getMessage());
        }
    }
}