<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-17
 * Time: 15:41
 */

namespace Optimize\Tests\Resource;


class BadForExample
{
    private function mCount($arr)
    {
        return count($arr);
    }

    public function check()
    {
        $arr = [0, 1, 2, 3, 4, 5];
        for ($i = 0; $i < $this->mCount($arr); $i++) {
            echo $i;
        }

        foreach (explode(',', '1,2,3,4,5') as $v) {
            echo $v;
        }
    }
}