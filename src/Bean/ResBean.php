<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-17
 * Time: 18:51
 */

namespace Optimize\Bean;


use com_jjcbs\lib\BaseBean;
use com_jjcbs\lib\ListBean;

class ResBean extends BaseBean
{
    /**
     * @var ListBean
     */
    protected $data;

    /**
     * @return ListBean
     */
    public function getData(): ListBean
    {
        return $this->data;
    }

    /**
     * @param ListBean $data
     */
    public function setData(ListBean $data): void
    {
        $this->data = $data;
    }


}