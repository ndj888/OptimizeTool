<?php
/**
 * Created by PhpStorm.
 * User: longbob
 * Date: 2020-02-14
 * Time: 17:37
 */

//入口文件
require '../vendor/autoload.php';

$app = new \Symfony\Component\Console\Application();
$app->add(new \Optimize\Command\MainCommand());
$app->run();