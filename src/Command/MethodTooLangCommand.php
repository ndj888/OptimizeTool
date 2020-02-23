<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-19
 * Time: 21:25
 */

namespace Optimize\Command;


use Optimize\Conf\RuleConf;
use Optimize\Lib\CodeParser;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MethodTooLangCommand extends ScanCommand
{
    protected static $defaultName = 'scan:method-too-lang';

    public function execute(InputInterface $input, OutputInterface $output)
    {
        CodeParser::setRules(RuleConf::$data['methodTooLang']);
        return parent::execute($input, $output); // TODO: Change the autogenerated stub
    }

}