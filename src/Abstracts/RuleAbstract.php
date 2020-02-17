<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-17
 * Time: 14:17
 */

namespace Optimize\Abstracts;


use Optimize\Bean\FileInfoBean;
use Optimize\Exception\NotFoundLineException;
use Optimize\Interfaces\RuleInterface;
use PhpParser\NodeVisitorAbstract;

/**
 * 校验规则
 * Class RuleAbstract
 * @package Optimize\Abstracts
 */
abstract class RuleAbstract extends NodeVisitorAbstract implements RuleInterface
{
    /**
     * @var FileInfoBean $fileInfoBean
     */
    protected $fileInfoBean;

    /**
     * @return FileInfoBean
     */
    public function getFileInfoBean(): FileInfoBean
    {
        return $this->fileInfoBean;
    }

    /**
     * @param FileInfoBean $fileInfoBean
     */
    public function setFileInfoBean(FileInfoBean $fileInfoBean): void
    {
        $this->fileInfoBean = $fileInfoBean;
    }

}