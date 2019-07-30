<?php


namespace App\MessageHandler;

use App\Entity\User;
use App\Message\CreateUserMessage;
use App\Service\UserService;
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
        $UserEntity->setIdCard($this->someIdCard());
        $UserEntity->setSex($this->someSex());
        $UserEntity->setGold($this->someGold(0, 99));
        $UserEntity->setCreatedAt(new \DateTime('now'));
        $UserEntity->setUpdatedAt(new \DateTime('now'));
        $UserEntity->setBirthday(new \DateTime('now'));

        return $this->userService->createUser($UserEntity);
    }

    /**
     * 随机生成一个随机数
     * Author: roger peng
     * Time: 2019-07-30 11:34
     * @param int $min
     * @param int $max
     * @return float
     */
    private function someGold($min = 0, $max = 1): float
    {
        return $min + mt_rand() / mt_getrandmax() * ($max - $min);
    }

    /**
     * 获取一个随机的性别数值,随手写的 不保证好用
     * Author: roger peng
     * Time: 2019-07-30 11:31
     * @return int
     */
    private function someSex(): int
    {
        try {
            $random = random_int(0, 2);
        } catch (\Exception $exception) {
            $this->logger->error($exception->getMessage());
            $random = 2;
        }

        return $random;
    }

    /**
     * 随机生成一个身份证号码(不保证唯一性,手写的获取18位长度纯数字字符串)
     * Author: roger peng
     * Time: 2019-07-30 11:22
     * @return string
     */
    private function someIdCard(): string
    {
        $range = range(0, 9);

        $array = [];
        for ($i = 0; $i < 18; $i++) {
            $array[] = array_rand($range);
        }

        return implode("", $array);
    }
}