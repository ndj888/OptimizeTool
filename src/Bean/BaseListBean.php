<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-17
 * Time: 19:16
 */

namespace Optimize\Bean;


use com_jjcbs\lib\BaseBean;
use com_jjcbs\lib\ListBean;

class BaseListBean extends ListBean
{
    public function toArray(){
        $out = [];
        $arr = $this->getArrayCopy();
        foreach ($arr as $v){
            if ( $v instanceof BaseBean){
                array_push($out , $v->toArray());
            }
        }
        return $out;
    }
}