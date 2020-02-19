<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-17
 * Time: 15:12
 */

namespace Optimize\Tests\Cases;


use com_jjcbs\lib\ServiceFactory;
use Optimize\Conf\RuleConf;
use Optimize\Fun\Helper;
use Optimize\Lib\CodeParser;
use PHPUnit\Framework\TestCase;

class TestCodeParser extends TestCase
{
    public function testStms(){
        $filePath = '/Users/longbob/work/OptimizeTool/src/Tests/Resource/BadForExample.php';
        $fileInfoBean = Helper::readFile($filePath);
        CodeParser::setRules(RuleConf::$data['forOrForeach']);
        $codeParser = ServiceFactory::getInstance(CodeParser::class);
        $codeParser->setFileInfoBean($fileInfoBean);
        $codeParser->exec();
        $a = CodeParser::$NOTICE_LIST_BEAN;
        $this->assertNotEmpty($a);
    }
}