<?php


namespace App\MessageHandler;


use App\Message\UpdateUserMessage;
use App\Service\UserService;
use App\Tools\GetRandTools;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class UpdateUserMessageHandler implements MessageHandlerInterface
{
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function __invoke(UpdateUserMessage $message)
    {
        $user = $this->userService->getUserInfoById($message->getId());

        $user->setSex(GetRandTools::getRandSex());
        $user->setIdCard(GetRandTools::getRandIdCard());
        $user->setGold(GetRandTools::getRandFloat(1, 99));
        $user->setBirthday(new \DateTime('2015-01-01'));

        $this->userService->saveUser($user);

    }

}