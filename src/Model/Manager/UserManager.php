<?php

namespace App\Model\Manager;

use App\Entity\User;
use App\Entity\UserExtension;
use App\Model\UserInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

class UserManager implements UserInterface
{
    private $registry;

    public function __construct(RegistryInterface $registry)
    {
        $this->registry = $registry;
    }

    public function getAllUser(int $id): User
    {
        return $this->registry->getManager()->find(User::class, $id);
    }

    public function getUserExtensionByUid(int $uid): UserExtension
    {
        return $this->registry->getManager()->find(UserExtension::class, $uid);
    }

    public function createUser(User $user): User
    {
        $this->registry->getManager()->getRepository(User::class);

        $this->registry->getManager()->persist($user);

        $this->registry->getManager()->flush();

        return $user;
    }


}