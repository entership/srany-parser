<?php

namespace Etki\SranyParserBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 *
 *
 * @version 0.1.0
 * @since
 * @package Etki\SranyParserBundle\Command
 * @author  Etki <etki@etki.name>
 */
class LaunchParserCommand extends ContainerAwareCommand
{
    public function configure()
    {
        $this
            ->setName('parser:parse')
            ->setDescription('A wonderful parsing command')
            ->setHelp('help')
            ->addArgument(
                'url',
                InputArgument::REQUIRED,
                'URL to parse'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $parser = $this->getContainer()->get('srany_parser.parser');
        $parser->parse($input->getArgument('url'));
    }
}
