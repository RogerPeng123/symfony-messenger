<?php


namespace App\Command;


use App\Message\UpdateUserMessage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class UpdateUserCommand extends Command
{
    protected static $defaultName = 'app:update-user';

    /**
     * @var MessageBusInterface
     */
    private $bus;

    public function __construct(MessageBusInterface $bus)
    {
        parent::__construct();

        $this->bus = $bus;
    }

    public function configure()
    {
        $this
            ->addArgument('id', InputArgument::REQUIRED, '需要更新的数据id')
            ->setDescription('修改User实体数据')
            ->setHelp('对实体数据更新命令');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');

        $this->bus->dispatch(new UpdateUserMessage($id));

        $output->writeln('success');
    }

}