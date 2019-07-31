<?php


namespace App\Model;


use App\Entity\User;
use App\Entity\UserExtension;
use phpDocumentor\Reflection\Types\Integer;

interface UserInterface
{
    public function getAllUser(int $id): User;

    public function getUserExtensionByUid(int $uid): UserExtension;

    public function getUserExtensionByUids(User $uid): UserExtension;

    public function createExtension(User $user): UserExtension;

    public function createUser(User $user): User;

    public function deleteUser(int $id): int;

    public function getAll(): array;
}