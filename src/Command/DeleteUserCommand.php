<?php


namespace App\Command;


use App\Message\DeleteUserMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class DeleteUserCommand extends Command
{
    protected static $defaultName = 'app:delete-user';

    private $bus;

    private $logger;

    public function __construct(MessageBusInterface $messageBus, LoggerInterface $logger)
    {
        parent::__construct();

        $this->bus = $messageBus;

        $this->logger = $logger;
    }

    public function configure()
    {
        $this
            ->addArgument('uid', InputArgument::REQUIRED, '被删除数据的id')
            ->setDescription('删除指定一条用户数据')
            ->setHelp('命令删除指定一条id的用户数据');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $uid = $input->getArgument('uid');

        $result = $this->bus->dispatch(new DeleteUserMessage($uid));

        $result = $result->last(HandledStamp::class)->getResult();

        $output->writeln($result);

        $output->writeln("编号为 {$result} 的数据已被删除");
    }

}