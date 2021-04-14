<?php
// 数据库配置信息
$dbinfo = Array (
    'host' => 'localhost',
    'username' => 'root', 
    'password' => 'root',
    'db'=> 'sss',
    'port' => 3306,
    'prefix' => 'zpl_',
    'charset' => 'utf8'
);

// 网站配置信息
$config = array(
    'debug' => 1,
    'theme' => 'default',
);

//系统版本号
define("VERSION", "0.0.1");
define("APP", TRUE);
//网站根目录地址
define("ROOT", dirname(dirname(__FILE__)));
define("TEMPLATE", ROOT . "/Themes/{$config["theme"]}");
define("ADMIN_TEMPLATE", ROOT . "/Core/Admin");
//开启 session
if (!isset($_SESSION)) {
    session_start();
}

//开启DEBUG模式
if (!isset($config["debug"]) || $config["debug"] == 0) {
    error_reporting(0);
} else {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
//引入通用函数库
require_once(ROOT.'/Core/Function.php');

include ('Core.php');