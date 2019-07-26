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


}