<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-17
 * Time: 14:14
 */

namespace Optimize\Interfaces;

/**
 * 代码审核规则
 * Interface RuleInterface
 * @package Optimize\Interfaces
 */
interface RuleInterface
{
    /**
     * 输入代码片段，返回是否符合规则
     * @param string $code
     * @return bool
     */
    public function check(string $code) : bool;

    /**
     * 获取代码提醒建议
     * @return string
     */
    public function getNotice() :string;
}