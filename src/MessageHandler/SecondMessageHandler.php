<?php


namespace App\MessageHandler;


use App\Message\SecondMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SecondMessageHandler implements MessageHandlerInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(SecondMessage $message)
    {
        $this->logger->info($message->getContent());

        return 'success';
    }

}