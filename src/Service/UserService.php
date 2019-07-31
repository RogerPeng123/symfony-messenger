<?php


namespace App\Service;


use App\Entity\User;
use App\Entity\UserExtension;

interface UserService
{
    public function getUserInfoById(int $id): User;

    public function getUserExtension(int $uid): UserExtension;

    public function getUserExtensionByUid(User $uid): UserExtension;

    public function createUserExtension(User $user): UserExtension;

    public function createUser(User $user): User;

    public function deleteUser(int $id): int;

    public function getAll(): array;

}