<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-17
 * Time: 14:40
 */

namespace Optimize\Lib;


use com_jjcbs\lib\ListBean;
use com_jjcbs\lib\Service;
use Optimize\Bean\BaseListBean;
use Optimize\Bean\FileInfoBean;
use Optimize\Bean\NoticeBean;
use Optimize\Bean\NoticeListBean;
use PhpParser\NodeTraverser;
use PhpParser\Parser;
use PhpParser\ParserFactory;

/**
 * 代码解析
 * Class CodeParser
 * @package Optimize\Lib
 */
class CodeParser extends Service
{
    /**
     * @var FileInfoBean $fileInfoBean
     */
    protected static $fileInfoBean;

    /**
     * @var Parser $parser
     */
    protected static $parser;
    /**
     * @var NodeTraverser
     */
    protected static $traverser;
    /**
     * @var ListBean
     */
    public static $NOTICE_LIST_BEAN;
    /**
     * @var \PhpParser\PrettyPrinter\Standard
     */
    public static $Printer;
    protected static $rules = [];

    public function __construct()
    {
        self::$parser = (new ParserFactory())->create(ParserFactory::ONLY_PHP7);
        self::$traverser = new NodeTraverser;
        $this->initVisitor();
        self::$NOTICE_LIST_BEAN = [];
        self::$Printer = new \PhpParser\PrettyPrinter\Standard;
    }

    public function exec()
    {
        $stmts = self::$parser->parse(self::$fileInfoBean->getContent());
        // traverse
        self::$traverser->traverse($stmts);
    }

    /**
     * @param FileInfoBean $fileInfoBean
     */
    public function setFileInfoBean(FileInfoBean $fileInfoBean): void
    {
        self::$fileInfoBean = $fileInfoBean;
    }


    protected function initVisitor()
    {
        foreach (self::$rules as $o) {
            self::$traverser->addVisitor(new $o);
        }
    }

    /**
     * push notice
     * @param NoticeBean $noticeBean
     */
    public static function pushNoticeList(NoticeBean $noticeBean)
    {
        $fileName = self::$fileInfoBean->getFilePath();
        if (!isset(self::$NOTICE_LIST_BEAN[$fileName])) {
            self::$NOTICE_LIST_BEAN[$fileName] = new NoticeListBean([
                'fileName' => $fileName,
                'notices' => new BaseListBean()
            ]);
        }
        self::$NOTICE_LIST_BEAN[$fileName]->getNotices()->append($noticeBean);
    }

    /**
     * @param array $rules
     */
    public static function setRules(array $rules): void
    {
        self::$rules = $rules;
    }


}