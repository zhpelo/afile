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
function is_get()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET' ? true : false;
}

function is_post()
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
            if (!preg_match("^(10│172.16│192.168).", $ips[$i])) {
                $ip = $ips[$i];
                break;
            }
        }
    }
    //客户端IP 或 (最后一个)代理服务器 IP
    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}



/**
 * 随机字符串
* @param length, start
* @return 
*/    
function strrand($length=6){    
    $use = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"; 
    srand((double)microtime()*1000000);
    $str = ''; 
    for($i=0; $i<$length; $i++) { 
      $str .= $use[rand()%strlen($use)]; 
    } 
    return $str; 
}

//判断是手机访问还是电脑访问
function is_mobile() {
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        return true;
    
    //此条摘自TPM智能切换模板引擎，适合TPM开发
    if(isset ($_SERVER['HTTP_CLIENT']) &&'PhoneClient'==$_SERVER['HTTP_CLIENT'])
        return true;
    //如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset ($_SERVER['HTTP_VIA']))
        //找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;
    //判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array(
            'nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile'
        );
        //从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }
    //协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT'])) {
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
}


//文件大小 人性化显示
function zpl_size($size){
	$dw= " Byte";
	
	if ($size >= pow(2, 40)){
	  $size=round($size/pow(2, 40), 2);
	  $dw= " TB" ;
	} else if ($size >= pow(2, 30)){
	  $size=round($size/pow(2, 30), 2);
	  $dw= " GB" ;
	} else if ($size >= pow(2, 20)){
	  $size=round($size/pow(2, 20), 2);
	  $dw= " MB" ;
	} else if ($size >= pow(2, 10)){
	  $size=round($size/pow(2, 10), 2);
	  $dw= " KB" ;
	} else {
	  $dw= " Bytes" ;
	}
	return $size.$dw;

}

//时间 人性化显示
function zpl_time($timeOreign){
    if(!is_numeric($timeOreign)){
        $timeOreign = strtotime(time());
    }

    $todayTime = strtotime(date('Y-m-d'));
    $time = time() - $timeOreign;
    if ($time < 60){
        $str = '刚刚';
    }elseif($time < 60 * 60){
        $min = floor($time/60);
        $str = $min.'分钟前';
    }elseif($timeOreign >  $todayTime){
        $h = floor($time/(60*60));
        $str = $h.'小时前';
    }elseif($timeOreign > $todayTime - 86400 ){
        $str = '昨天';
    }else{
        if(date("Y", $timeOreign) == date("Y", time())){
            $str = date("n月j日",$timeOreign);
        }else{
            $str = date("Y-m-d",$timeOreign);
        }
    }
    return $str;
}
//全站网址生成函数
function url($path,$data)
{
    global $web_config;
    switch ($path) {
        case "file_share":
            $url =  "/s/".$data;
            break;
        case "text_share":
            $url =  "/t/".$data;
            break;
        case "green":
            echo "你喜欢的颜色是绿色!";
            break;
        default:
            $url = '/404.html';
    }
    return $web_config['siteurl'].$url;
}