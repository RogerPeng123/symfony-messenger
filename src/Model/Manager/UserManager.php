<?php

namespace App\Model\Manager;

use App\Entity\User;
use App\Entity\UserExtension;
use App\Model\UserInterface;
use App\Tools\GetRandTools;
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

        $UserExtension = new UserExtension();

        $UserExtension->setUId($user);
        $UserExtension->setUHeight(GetRandTools::getRandHeight());
        $UserExtension->setUWeight(GetRandTools::getRandWeight());
        $UserExtension->setBust(GetRandTools::getRandFloat(84, 100));
        $UserExtension->setWaist(GetRandTools::getRandFloat(60, 70));
        $UserExtension->setHips(GetRandTools::getRandFloat(70, 90));
        $UserExtension->setCreatedAt(new \DateTime('now'));
        $UserExtension->setUpdatedAt(new \DateTime('now'));

        $this->registry->getManager()->getRepository(UserExtension::class);
        $this->registry->getManager()->persist($UserExtension);
        $this->registry->getManager()->flush();


        return $user;
    }


}