<?php


namespace App\MessageHandler;

use App\Entity\User;
use App\Message\FillUserExtensionMessage;
use App\Service\UserService;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class FillUserExtensionMessageHandler implements MessageHandlerInterface
{
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function __invoke(FillUserExtensionMessage $message)
    {
        $userList = $this->userService->getAll();
        foreach ($userList as $item) {
            if ($item instanceof User) {
                $userExtension = $this->userService->getUserExtensionByUid($item);
                if ($userExtension === null) {
                    $this->userService->createUserExtension($item);
                }
            }
        }
    }
}