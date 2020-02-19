<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-17
 * Time: 15:38
 */

namespace Optimize\Rule;


use Optimize\Bean\NoticeBean;
use Optimize\Fun\Helper;
use Optimize\Lib\CodeParser;
use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

class ForNodeVisitor extends NodeVisitorAbstract
{
    public function leaveNode(Node $node)
    {
        $msg = '在for中不建议使用函数或方法';
        if ($node instanceof Node\Stmt\For_) {
            // 检测sql
            $code = CodeParser::$Printer->prettyPrint($node->stmts);
            if ( Helper::hasSql($code)){
                CodeParser::pushNoticeList(new NoticeBean([
                    'startLine' => $node->getStartLine(),
                    'msg' => '不建议在Foreach中使用sql循环查询'
                ]));
            }

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