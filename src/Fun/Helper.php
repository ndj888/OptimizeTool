<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-17
 * Time: 14:51
 */

namespace Optimize\Fun;


use Optimize\Bean\FileInfoBean;
use PhpParser\NodeDumper;

class Helper
{
    /**
     * 读文件返回fileInfo
     * @param string $filePath
     * @return FileInfoBean
     */
    public static function readFile(string $filePath): FileInfoBean
    {
        $fileInfoBean = new FileInfoBean();
        $fileInfoBean->setUpdateTime(filectime($filePath));
        $fileInfoBean->setCreateTime(filemtime($filePath));
        $fileStr = file_get_contents($filePath);
        $file = file($filePath);
        $fileInfoBean->setContent($fileStr);
        $fileInfoBean->setCodeArray($file);
        $fileInfoBean->setFilePath($filePath);
        $fileInfoBean->setFileName(basename($filePath));
        $fileInfoBean->setLineNum((int)array_key_last($file) + 1);
        return $fileInfoBean;
    }

    public static function nodeDump($v)
    {
        echo (new NodeDumper())->dump($v);
    }
}