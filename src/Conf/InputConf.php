<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-19
 * Time: 21:23
 */

namespace Optimize\Conf;

use com_jjcbs\lib\Conf;

/**
 * 可变输入配置
 * Class InputConf
 * @package Optimize\Conf
 */
class InputConf extends Conf
{
    public static $data = [
        //方法代码最大长度
        'METHOD_CODE_MAX_LEN' => 100,
    ];
}