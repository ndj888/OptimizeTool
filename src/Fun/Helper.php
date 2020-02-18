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

    /**
     * @param $rootDir
     * @param array $allData
     * @return array
     * @author php.net
     */
    public static function scanDirectories($rootDir, $filter = [], $allData = array())
    {
        // set filenames invisible if you want
        $invisibleFileNames = array(".", "..", ".htaccess", ".htpasswd");
        // run through content of root directory
        $dirContent = scandir($rootDir);
        foreach ($dirContent as $key => $content) {
            if (in_array($content, $filter)) continue;
            // filter all files not accessible
            $path = $rootDir . '/' . $content;
            if (!in_array($content, $invisibleFileNames)) {
                // if content is file & readable, add to array
                if (is_file($path) && is_readable($path)) {
                    // save file name with path
                    $allData[] = $path;
                    // if content is a directory and readable, add path and name
                } elseif (is_dir($path) && is_readable($path)) {
                    // recursive callback to open new directory
                    $allData = self::scanDirectories($path, $filter, $allData);
                }
            }
        }
        return $allData;
    }
}