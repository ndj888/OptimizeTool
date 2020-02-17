<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-17
 * Time: 15:01
 */

namespace Optimize\Tests\Cases;


use Optimize\Fun\Helper;
use PHPUnit\Framework\TestCase;

class TestHelper extends TestCase
{
    public function testReadFileFun(){
        $filePath = '/Users/longbob/work/OptimizeTool/src/Lib/Builder.php';
        $fileInfoBean = Helper::readFile($filePath);
        $this->assertNotEmpty($fileInfoBean);
        $this->assertNotEquals($fileInfoBean->getLineNum() , 0);
    }
}