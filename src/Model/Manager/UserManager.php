<?php

namespace App\Model\Manager;

use App\Entity\User;
use App\Entity\UserExtension;
use App\Model\UserInterface;
use App\Repository\UserExtensionRepository;
use App\Repository\UserRepository;

class UserManager implements UserInterface
{
    private $userRepository;

    private $userExtensionRepository;

    public function __construct(UserRepository $userRepository, UserExtensionRepository $userExtensionRepository)
    {
        $this->userRepository = $userRepository;

        $this->userExtensionRepository = $userExtensionRepository;
    }

    public function getAllUser(int $id): User
    {
        return $this->userRepository->find($id);
    }

    public function getUserExtensionByUid(int $uid): UserExtension
    {
        return $this->userExtensionRepository->find($uid);
    }

    public function createUser(User $user): User
    {
        return $this->userRepository->createUser($user);
    }
}