<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-17
 * Time: 18:29
 */

namespace Optimize\Rule;


use Optimize\Bean\NoticeBean;
use Optimize\Lib\CodeParser;
use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

class ForeachNodeVisitor extends NodeVisitorAbstract
{
    public function leaveNode(Node $node)
    {
        if ($node instanceof Node\Stmt\Foreach_) {
            if ($node->expr instanceof Node\Expr\MethodCall
                || $node->expr instanceof Node\Expr\FuncCall
            ) {
                CodeParser::pushNoticeList(new NoticeBean([
                    'startLine' => $node->getStartLine(),
                    'msg' => '不建议在Foreach结构中使用函数或方法。'
                ]));
            }
        }
    }

}