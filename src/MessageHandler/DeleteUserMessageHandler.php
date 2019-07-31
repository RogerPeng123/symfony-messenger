<?php

namespace App\MessageHandler;

use App\Message\DeleteUserMessage;
use App\Service\UserService;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class DeleteUserMessageHandler implements MessageHandlerInterface
{
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function __invoke(DeleteUserMessage $message)
    {
        return $this->userService->deleteUser($message->getUid());
    }

}