<?php
// 数据库配置信息
$dbinfo = array(
    "host" => '127.0.0.1',  // 数据库主机地址
    "db" => 'sss',          // 数据库
    "user" => 'root',       // 用户
    "password" => 'root',   // 密码
    "prefix" => 'wxr_',     // 表前缀
    'charset' => 'utf8'
);
// 网站配置信息
$config = array(
    'debug' => 1,
    'theme' => 'default',
);

include ('Core.php');