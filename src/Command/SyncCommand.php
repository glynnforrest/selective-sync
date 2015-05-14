<?php

namespace SelectiveSync\Command;

use SelectiveSync\Handler\PhpHandler;
use SelectiveSync\Source\LocalSource;
use SelectiveSync\Sync;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * SyncCommand
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class SyncCommand extends Command
{
    protected $input;
    protected $output;

    protected function configure()
    {
        $this->setName('sync')
             ->setDescription('Sync part of a directory')
             ->addArgument('source', InputArgument::REQUIRED, 'The source directory.')
             ->addArgument('target', InputArgument::REQUIRED, 'The target directory.')
            ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $sourceDirectory = $input->getArgument('source');
        $targetDirectory = $input->getArgument('target');

        $source = new LocalSource($sourceDirectory);
        $handler = new PhpHandler($sourceDirectory, $targetDirectory);
        $sync = new Sync($source, $handler);
        $sync->sync();
    }
}
