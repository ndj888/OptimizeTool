<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-17
 * Time: 14:31
 */

namespace Optimize\Conf;


use com_jjcbs\lib\Conf;
use Optimize\Rule\ForNodeVisitor;

/**
 * 规则配置，绑定作用域
 * Class RuleConf
 * @package Optimize\Conf
 */
class RuleConf extends Conf
{
    public static $data = [
        'class' => [

        ],
        'method' => [
            ForNodeVisitor::class
        ]
    ];
}