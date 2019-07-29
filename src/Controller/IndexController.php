<?php

namespace App\Controller;

use App\Message\SmsNotification;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class IndexController extends AbstractController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $uid = 1;

        $data = $this->userService->getUserExtension($uid);

//        $nickName = $data->getUId()->getBirthday();

        dd($data->getUId()->getNickName());
    }

    public function message(MessageBusInterface $bus)
    {
        $result = $bus->dispatch(new SmsNotification('fist message'));

        dd('派发完成', $result);

//        dd($result->last(HandledStamp::class)->getResult());

//        $this->dispatchMessage(new SmsNotification('second message'));

//        dd(132131);
    }
}
