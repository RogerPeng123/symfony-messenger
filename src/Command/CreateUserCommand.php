<?php

namespace App\Command;

use App\Message\CreateUserMessage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class CreateUserCommand extends Command
{
    /**
     * 命令字符
     * @var string
     */
    protected static $defaultName = 'app:create-user';

    /**
     * @var MessageBusInterface
     */
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        parent::__construct();

        $this->messageBus = $messageBus;
    }

    protected function configure()
    {
        $this
            ->addArgument('nick_name', InputArgument::REQUIRED, '输入的是用户实体的username')
            ->setDescription('命令详情: 命令创建用户信息')
            ->setHelp('帮助信息: 此命令可以创建用户信息');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $nickName = $input->getArgument('nick_name');

        $result = $this->messageBus->dispatch(new CreateUserMessage($nickName));

        $user = $result->last(HandledStamp::class)->getResult();

        $output->writeln("命令执行了,新建数据为: " . $user->getId());
    }

}