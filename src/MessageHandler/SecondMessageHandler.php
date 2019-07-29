<?php


namespace App\MessageHandler;


use App\Entity\User;
use App\Message\SecondMessage;
use App\Service\UserService;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SecondMessageHandler implements MessageHandlerInterface
{
    private $logger;

    private $userService;

    public function __construct(LoggerInterface $logger, UserService $userService)
    {
        $this->logger = $logger;

        $this->userService = $userService;
    }

    public function __invoke(SecondMessage $message)
    {
        $this->logger->info($message->getContent());

        $UserEntity = new User();

        $UserEntity->setSex(1);
        $UserEntity->setBirthday(new \DateTime('now'));
        $UserEntity->setNickName('Someone');
        $UserEntity->setGold(23.3);
        $UserEntity->setIdCard('500500500500500500');
        $UserEntity->setCreatedAt(new \DateTime());
        $UserEntity->setUpdatedAt(new \DateTime());

        $this->userService->createUser($UserEntity);

        return 'success';
    }

}