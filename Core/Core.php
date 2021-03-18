<?php
//系统版本号
define("VERSION", "0.0.1");
define("APP", TRUE);
//网站根目录地址
define("ROOT", dirname(dirname(__FILE__)));

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
define("TEMPLATE", ROOT . "/Themes/{$config["theme"]}");

//引入通用函数库
require_once(ROOT.'/Core/Function.php');
//引入mysql类库
require_once(ROOT.'/Core/MysqliDb.php');
$db = new Mysqlidb($dbinfo);

include(ROOT."/Core/AppClass.php");
$app = new App($db,$config);