<?php
// 通用函数库
function p($val)
{
    echo '<pre>';
    var_dump($val);
    echo '</pre>';
    exit();
}

function clean($string, $level = '1', $chars = FALSE, $leave = "")
{
    if (is_array($string)) return array_map("clean", $string);

    $string = preg_replace('/<script[^>]*>([\s\S]*?)<\/script[^>]*>/i', '', $string);
    switch ($level) {
        case '3':
            $search = array(
                '@<script[^>]*?>.*?</script>@si',
                '@<[\/\!]*?[^<>]*?>@si',
                '@<style[^>]*?>.*?</style>@siU',
                '@<![\s\S]*?--[ \t\n\r]*>@'
            );
            $string = preg_replace($search, '', $string);
            $string = strip_tags($string, $leave);
            if ($chars) {
                if (phpversion() >= 5.4) {
                    $string = htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, "UTF-8");
                } else {
                    $string = htmlspecialchars($string, ENT_QUOTES, "UTF-8");
                }
            }
            break;
        case '2':
            $string = strip_tags($string, '<b><i><s><u><strong><span><p>');
            break;
        case '1':
            $string = strip_tags($string, '<b><i><s><u><strong><a><pre><code><p><div><span>');
            break;
    }
    $string = str_replace('href=', 'rel="nofollow" href=', $string);
    return $string;
}


function get_header()
{
    return include(TEMPLATE . "/header.php");
}
function get_footer()
{
    return include(TEMPLATE . "/footer.php");
}


function get_admin_header()
{
    return include(ADMIN_TEMPLATE . "/header.php");
}
function get_admin_footer()
{
    return include(ADMIN_TEMPLATE . "/footer.php");
}
function isGet()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET' ? true : false;
}

function isPost()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false;
}
function redirect($url)
{
    Header("Location:$url");
}

function sss_mkdir($path)
{
    //判断目录存在否，不存在则创建目录
    if (!is_dir($path)) {
        if (!mkdir($path, 0755, true)) return false;
    }
    return true;
}

function get_real_ip()
{
    $ip = FALSE;
    //客户端IP 或 NONE
    if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    }
    //多重代理服务器下的客户端真实IP地址（可能伪造）,如果没有使用代理，此字段为空
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
        if ($ip) {
            array_unshift($ips, $ip);
            $ip = FALSE;
        }
        for ($i = 0; $i < count($ips); $i++) {
            if (!eregi("^(10│172.16│192.168).", $ips[$i])) {
                $ip = $ips[$i];
                break;
            }
        }
    }
    //客户端IP 或 (最后一个)代理服务器 IP
    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}
