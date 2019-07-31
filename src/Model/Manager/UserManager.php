<?php

namespace App\Model\Manager;

use App\Entity\User;
use App\Entity\UserExtension;
use App\Model\UserInterface;
use App\Tools\GetRandTools;
use Doctrine\ORM\ORMInvalidArgumentException;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

class UserManager implements UserInterface
{
    /**
     * @var RegistryInterface
     */
    private $registry;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(RegistryInterface $registry, LoggerInterface $logger)
    {
        $this->registry = $registry;

        $this->logger = $logger;
    }

    public function getAllUser(int $id): User
    {
        return $this->registry->getManager()->find(User::class, $id);
    }

    public function getUserExtensionByUid(int $uid): UserExtension
    {
        return $this->registry->getManager()->getRepository(UserExtension::class)->find($uid);
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

    public function deleteUser(int $id): int
    {
        try {
            $user = $this->registry->getManager()->find(User::class, $id);
            $this->registry->getManager()->remove($user);
            $this->registry->getManager()->flush();

            return $id;
        } catch (ORMInvalidArgumentException $exception) {
            $this->logger->error($exception->getMessage(),
                ['message' => '删除数据失败,失败ID: ' . $id]);

            return 0;
        }
    }

    public function getAll(): array
    {
        return $this->registry->getManager()->getRepository(User::class)->findAll();
    }

    public function setUserExtensionByUids(User $user): ?UserExtension
    {
        $data = $this->registry
            ->getManager()
            ->getRepository(UserExtension::class)
            ->createQueryBuilder('u')
            ->where('u.uId = :uid')
            ->setParameter('uid', $user->getId())
            ->getQuery()
            ->getOneOrNullResult();

        return $data;
    }

    public function createExtension(User $user): UserExtension
    {
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

        return $UserExtension;
    }


}