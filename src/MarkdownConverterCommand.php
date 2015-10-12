<?php namespace Alioygur\Postman2HTML;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MarkdownConverterCommand extends Command
{
    protected function configure()
    {
        $this->setName('convert')
            ->setDescription('convert Markdonw file to html')
            ->addArgument('inputfile', InputArgument::REQUIRED, 'input file')
            ->addArgument('outputfile', InputArgument::OPTIONAL, 'output file', 'convert.html');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $markdownString = file_get_contents($input->getArgument('inputfile'));

        file_put_contents($input->getArgument('outputfile'), (new \Parsedown())->text($markdownString));

        $filePath = realpath($input->getArgument('outputfile'));

        $output->writeln("<info>The output file is created at, {$filePath}</info>");
    }
}