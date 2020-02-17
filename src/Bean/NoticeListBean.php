<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-17
 * Time: 17:47
 */

namespace Optimize\Bean;


use com_jjcbs\lib\BaseBean;
use com_jjcbs\lib\ListBean;

class NoticeListBean extends BaseBean
{
    protected $fileName = '';
    /**
     * @var ListBean
     */
    protected $notices;

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName(string $fileName): void
    {
        $this->fileName = $fileName;
    }

    /**
     * @return ListBean
     */
    public function getNotices(): ListBean
    {
        return $this->notices;
    }

    /**
     * @param ListBean $notices
     */
    public function setNotices(ListBean $notices): void
    {
        $this->notices = $notices;
    }


}