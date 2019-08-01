<?php


namespace App\Command;


use App\Message\ProductMessage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class ProductActionCommand extends Command
{
    protected static $defaultName = 'app:product-action';

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
        $this->addArgument('action', InputArgument::REQUIRED, '判断操作指令')
            ->setDescription('对product进行数据操作')
            ->setHelp('操作主要针对product进行增删改查');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $action = $input->getArgument('action');

        $result = $this->messageBus->dispatch(new ProductMessage($action));

        $output->writeln($result->last(HandledStamp::class)->getResult());

    }
}