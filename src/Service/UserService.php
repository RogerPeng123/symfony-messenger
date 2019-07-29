<?php


namespace App\Service;


use App\Entity\User;
use App\Entity\UserExtension;

interface UserService
{
    /**
     * 获取用户信息
     * User: roger peng
     * Time: 2019-07-25 15:48
     * @param int $id
     * @return User
     */
    public function getUserInfoById(int $id): User;

    public function getUserExtension(int $uid): UserExtension;

    public function createUser(User $user): User;

}