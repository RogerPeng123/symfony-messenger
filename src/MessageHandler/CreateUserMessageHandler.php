<?php


namespace App\MessageHandler;

use App\Entity\User;
use App\Message\CreateUserMessage;
use App\Service\UserService;
use App\Tools\GetRandTools;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CreateUserMessageHandler implements MessageHandlerInterface
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(UserService $userService, LoggerInterface $logger)
    {
        $this->userService = $userService;

        $this->logger = $logger;
    }

    public function __invoke(CreateUserMessage $message)
    {
        $UserEntity = new User();

        $UserEntity->setNickName($message->getUser());
        $UserEntity->setIdCard(GetRandTools::getRandIdCard());
        $UserEntity->setSex(GetRandTools::getRandSex());
        $UserEntity->setGold(GetRandTools::getRandFloat(0, 99));
        $UserEntity->setCreatedAt(new \DateTime('now'));
        $UserEntity->setUpdatedAt(new \DateTime('now'));
        $UserEntity->setBirthday(new \DateTime('now'));

        return $this->userService->createUser($UserEntity);
    }


}