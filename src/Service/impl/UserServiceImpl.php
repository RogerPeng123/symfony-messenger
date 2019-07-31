<?php


namespace App\Service\impl;


use App\Entity\User;
use App\Entity\UserExtension;
use App\Model\UserInterface;
use App\Service\UserService;

class UserServiceImpl implements UserService
{
    private $userServerMapper;

    public function __construct(UserInterface $userServerMapper)
    {
        $this->userServerMapper = $userServerMapper;
    }

    public function getUserInfoById(int $id): User
    {
        return $this->userServerMapper->getAllUser($id);
    }

    public function getUserExtension(int $uid): UserExtension
    {
        return $this->userServerMapper->getUserExtensionByUid($uid);
    }

    public function createUser(User $user): User
    {
        return $this->userServerMapper->createUser($user);
    }

    public function deleteUser(int $id): int
    {
        return $this->userServerMapper->deleteUser($id);
    }

    public function getAll(): array
    {
        return $this->userServerMapper->getAll();
    }

    public function createUserExtension(User $user): UserExtension
    {
        return $this->userServerMapper->createExtension($user);
    }

    public function getUserExtensionByUid(User $uid): UserExtension
    {
        return $this->userServerMapper->getUserExtensionByUids($uid);
    }


}