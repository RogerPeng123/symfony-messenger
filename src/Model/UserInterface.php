<?php


namespace App\Model;


use App\Entity\User;
use App\Entity\UserExtension;

interface UserInterface
{
    public function getAllUser(int $id): User;

    public function getUserExtensionByUid(int $uid): UserExtension;

    public function createUser(User $user): User;
}