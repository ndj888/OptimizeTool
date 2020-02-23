<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-19
 * Time: 21:19
 */

namespace Optimize\Rule;


use Optimize\Bean\NoticeBean;
use Optimize\Conf\InputConf;
use Optimize\Lib\CodeParser;
use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

/**
 * 方法代码过长
 * Class MethodTooLang
 * @package Optimize\Rule
 */
class MethodTooLang extends NodeVisitorAbstract
{
    protected $maxLen = 100;

    public function leaveNode(Node $node)
    {
        $this->maxLen = InputConf::$data['METHOD_CODE_MAX_LEN'];
        if ( $node instanceof Node\Stmt\ClassMethod){
            if ( $node->getEndLine() - $node->getStartLine() > $this->maxLen){
                // too lang
                CodeParser::pushNoticeList(new NoticeBean([
                    'startLine' => $node->getStartLine(),
                    'msg' => '方法过长，超过 ' . $this->maxLen . '行'
                ]));
            }
        }
    }


}