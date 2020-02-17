<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-17
 * Time: 10:53
 */

namespace Optimize\Bean;



use com_jjcbs\lib\BaseBean;

class FileInfoBean extends BaseBean
{
    protected $fileName = '';
    protected $filePath = '';
    protected $lineNum = 1;
    protected $createTime;
    protected $updateTime;
    protected $content = '';
    protected $codeArray = [];

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName(string $fileName): void
    {
        $this->fileName = $fileName;
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * @param string $filePath
     */
    public function setFilePath(string $filePath): void
    {
        $this->filePath = $filePath;
    }

    /**
     * @return int
     */
    public function getLineNum(): int
    {
        return $this->lineNum;
    }

    /**
     * @param int $lineNum
     */
    public function setLineNum(int $lineNum): void
    {
        $this->lineNum = $lineNum;
    }

    /**
     * @return mixed
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * @param mixed $createTime
     */
    public function setCreateTime($createTime): void
    {
        $this->createTime = $createTime;
    }

    /**
     * @return mixed
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    /**
     * @param mixed $updateTime
     */
    public function setUpdateTime($updateTime): void
    {
        $this->updateTime = $updateTime;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return array
     */
    public function getCodeArray(): array
    {
        return $this->codeArray;
    }

    /**
     * @param array $codeArray
     */
    public function setCodeArray(array $codeArray): void
    {
        $this->codeArray = $codeArray;
    }




}