<?php


namespace App\Message;


class DeleteUserMessage
{
    /**
     * @var integer
     */
    private $uid;

    public function __construct(int $uid)
    {
        $this->uid = $uid;
    }

    public function getUid(): int
    {
        return $this->uid;
    }
}