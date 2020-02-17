<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-17
 * Time: 14:29
 */

namespace Optimize\Bean;


use com_jjcbs\lib\BaseBean;
use com_jjcbs\lib\ListBean;

class RuleBean extends BaseBean
{
    /**
     * 作用于类的规则
     * @var ListBean $classScope
     */
    protected $classScope;
    /**
     * 作用于方法的规则
     * @var ListBean $methodScope
     */
    protected $methodScope;

    /**
     * @return ListBean
     */
    public function getClassScope(): ListBean
    {
        return $this->classScope;
    }

    /**
     * @param ListBean $classScope
     */
    public function setClassScope(ListBean $classScope): void
    {
        $this->classScope = $classScope;
    }

    /**
     * @return ListBean
     */
    public function getMethodScope(): ListBean
    {
        return $this->methodScope;
    }

    /**
     * @param ListBean $methodScope
     */
    public function setMethodScope(ListBean $methodScope): void
    {
        $this->methodScope = $methodScope;
    }


}