<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-17
 * Time: 15:38
 */

namespace Optimize\Rule;


use com_jjcbs\lib\ListBean;
use Optimize\Bean\NoticeBean;
use Optimize\Fun\Helper;
use Optimize\Lib\CodeParser;
use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

class ForNodeVisitor extends NodeVisitorAbstract
{
    public function leaveNode(Node $node)
    {
        $msg = '在for中不建议使用函数';
        if ($node instanceof Node\Stmt\For_) {
            foreach ($node->cond as $v) {
                if ($v->right instanceof Node\Expr\FuncCall
                    || $v->right instanceof Node\Expr\MethodCall
                ) {
                    CodeParser::pushNoticeList(new NoticeBean([
                        'startLine' => $v->getStartLine(),
                        'msg' => $msg
                    ]));
                    break;
                }
                if ($v->right instanceof Node\Expr\BinaryOp\Minus) {
                    if ($v->right->left instanceof Node\Expr\FuncCall
                        || $v->right->right instanceof Node\Expr\FuncCall
                        || $v->right->right instanceof Node\Expr\MethodCall
                    ) {
                        CodeParser::pushNoticeList(new NoticeBean([
                            'startLine' => $v->getStartLine(),
                            'msg' => $msg
                        ]));
                    }
                }
            }
        }


    }


}