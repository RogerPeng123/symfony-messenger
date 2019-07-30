<?php


namespace App\Message;


use App\Entity\User;

class CreateUserMessage
{
    /**
     * @var string
     */
    private $user;

    public function __construct(string $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): string
    {
        return $this->user;
    }
}