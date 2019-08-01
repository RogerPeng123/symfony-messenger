<?php

namespace App\Controller;

use App\Message\SmsNotification;
use App\Model\ProductManager;
use App\Model\UserInterface;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\MessageBusInterface;

class IndexController extends AbstractController
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * @var UserInterface
     */
    private $userManager;

    /**
     * @var ProductManager
     */
    private $productManager;

    public function __construct(UserService $userService, UserInterface $userInterface, ProductManager $productManager)
    {
        $this->userService = $userService;

        $this->userManager = $userInterface;

        $this->productManager = $productManager;
    }

    public function index()
    {
        $uid = 1;

        $data = $this->userService->getUserExtension($uid);

        dd($data->getUId()->getNickName());
    }

    public function message(MessageBusInterface $bus)
    {
        $result = $bus->dispatch(new SmsNotification('fist message'));

        dd('派发完成', $result);

    }

    //TODO 一对一单向查询
    public function curdOneToOne(int $uid)
    {
        $data = $this->userManager->getUserExtensionByUid($uid);

        dd($data->getUId()->getNickName());
    }

    //TODO 一对多 双向向查询
    public function curdOneToMany(int $pid)
    {
        $db = $this->productManager->getProductById($pid);

        dd($db->getFeatures()[0]->getInfo());
    }
}
