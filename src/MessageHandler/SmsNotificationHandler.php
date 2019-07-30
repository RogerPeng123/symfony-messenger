<?php


namespace App\MessageHandler;


use App\Message\SecondMessage;
use App\Message\SmsNotification;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\DispatchAfterCurrentBusStamp;

class SmsNotificationHandler implements MessageHandlerInterface
{
    private $logger;

    private $bus;

    public function __construct(LoggerInterface $logger, MessageBusInterface $bus)
    {
        $this->logger = $logger;

        $this->bus = $bus;
    }

    public function __invoke(SmsNotification $message)
    {
        $this->logger->info($message->getContent());

        $this->bus->dispatch(
            new SecondMessage('派发到第二个信息'), [new DispatchAfterCurrentBusStamp()]);
    }
}