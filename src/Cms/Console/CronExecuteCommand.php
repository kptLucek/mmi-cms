<?php

namespace Cms\Console;

use Mmi\Console\CommandAbstract;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CronExecuteCommand extends CommandAbstract
{

    public function configure()
    {
        $this->setName('cms:cron:execute');
        $this->setDescription('Execute cron jobs');
        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        \Cms\Model\Cron::run();
    }

}