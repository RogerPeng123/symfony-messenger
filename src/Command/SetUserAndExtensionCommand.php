<?php


namespace App\Command;


use App\Message\FillUserExtensionMessage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * 命令填充所有extension缺省数据
 * Class SetUserAndExtensionCommand
 * @package App\Command
 */
class SetUserAndExtensionCommand extends Command
{
    protected static $defaultName = 'app:fill-extension';

    /**
     * @var MessageBusInterface
     */
    private $bus;

    public function __construct(MessageBusInterface $messageBus)
    {
        parent::__construct();

        $this->bus = $messageBus;
    }

    public function configure()
    {
        $this->setDescription('填充UserExtension实体相对于User的缺省数据')
            ->setHelp('填充Extension数据');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->bus->dispatch(new FillUserExtensionMessage());

        $output->writeln('success');
    }


}