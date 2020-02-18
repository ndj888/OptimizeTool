<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-18
 * Time: 13:36
 */

namespace Optimize\Command;


use com_jjcbs\lib\ServiceFactory;
use Optimize\Fun\Helper;
use Optimize\Lib\CodeParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class ScanCommand extends Command
{
    public function configure()
    {
        $this->setDescription('scan php file auto check')
            ->addArgument('dir', InputArgument::REQUIRED)
            ->addArgument('filter', InputArgument::IS_ARRAY);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $data = [];
        if ( !$input->getArgument('dir') || !$input->getArgument('filter')){
            $output->writeln('must dir and filter');
            return 0;
        }
        $files = Helper::scanDirectories($input->getArgument('dir'), $input->getArgument('filter'));
        $codeParser = ServiceFactory::getInstance(CodeParser::class);
        foreach ($files as $file) {
            $fileInfoBean = Helper::readFile($file);
            $fileName = $fileInfoBean->getFilePath();
            $codeParser->setFileInfoBean($fileInfoBean);
            $codeParser->exec();
            if (isset(CodeParser::$NOTICE_LIST_BEAN[$fileName])) {
                $data[] = CodeParser::$NOTICE_LIST_BEAN[$fileName]->toArray();
                unset(CodeParser::$NOTICE_LIST_BEAN[$fileName]);
            }
        }

        $output->writeln(json_encode($data, true));
        return 0;
    }
}