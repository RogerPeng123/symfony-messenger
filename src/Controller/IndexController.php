<?php

namespace App\Controller;

use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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


    public function example(string $string, array ...$array)
    {
    }

    public function message()
    {
        dd(132131);
    }
}
