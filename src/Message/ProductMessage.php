<?php


namespace App\Message;


class ProductMessage
{
    /**
     * @var string
     */
    private $action;

    public function __construct(string $action = 'create')
    {
        $this->action = $action;
    }

    public function getAction(): string
    {
        return $this->action;
    }
}