<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-17
 * Time: 17:41
 */

namespace Optimize\Bean;


use com_jjcbs\lib\BaseBean;

/**
 * 提示信息
 * Class NoticeBean
 * @package Optimize\Bean
 */
class NoticeBean extends BaseBean
{
    protected $startLine = 1;
    protected $msg = '';

    /**
     * @return int
     */
    public function getStartLine(): int
    {
        return $this->startLine;
    }

    /**
     * @param int $startLine
     */
    public function setStartLine(int $startLine): void
    {
        $this->startLine = $startLine;
    }

    /**
     * @return string
     */
    public function getMsg(): string
    {
        return $this->msg;
    }

    /**
     * @param string $msg
     */
    public function setMsg(string $msg): void
    {
        $this->msg = $msg;
    }


}