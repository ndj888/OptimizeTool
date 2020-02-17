<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-17
 * Time: 14:27
 */

namespace Optimize\Lib;

use com_jjcbs\lib\ListBean;
use com_jjcbs\lib\Service;
use Optimize\Bean\RuleBean;
use Optimize\Conf\RuleConf;

/**
 * 规则Builder器
 * Class Builder
 * @package Optimize\Lib
 */
class Builder extends Service
{
    /**
     * @var RuleBean $ruleBean
     */
    protected $ruleBean;

    public function init()
    {
        $classListBean = new ListBean();
        $methodListBean = new ListBean();

        foreach (RuleConf::$data['class'] as $o) {
            $classListBean->append($o);
        }
        foreach (RuleConf::$data['method'] as $o) {
            $classListBean->append($o);
        }
        $this->ruleBean->setClassScope($classListBean);
        $this->ruleBean->setMethodScope($methodListBean);
    }

    public function exec()
    {
        // TODO: Implement exec() method.
    }

}