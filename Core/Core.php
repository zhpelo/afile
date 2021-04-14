<?php
require ROOT.'/vendor/autoload.php';

class SSS {

    protected $action = "", $db = null;
    protected $config = [];
    protected $actions = ["user", "encryption", "text", "login","page","file", "download", "register", "receive", "upload"];

    public function __construct() {
        global $dbinfo;
        spl_autoload_register('self::AutoLoad');

        $this->db = new MysqliDb($dbinfo);
        //网站后台设置项
        foreach($this->db->get('options') as $item){
            $this->config[ $item['option_name'] ] = $item['option_value'];
        }
    }
    public function get_db(){
        return $this->db;
    }
    public function get_config(){
        return $this->config;
    }
    public function run()
	{
		$APP =  new App();
		//判断操作方法
		if (isset($_GET["a"]) && !empty($_GET["a"])) {
			// Validate Request
			$var = explode("/", $_GET["a"]);
			
			if (count($var) > 4) return $this->_404();
			// Removes dots
			$var[0] = str_replace(".", "", $var[0]);
			
			$this->action = clean($var[0], 3, TRUE);
			// Run Methods
			if (isset($var[1]) && !empty($var[1])) $this->do = clean($var[1], 3);
			if (isset($var[2]) && !empty($var[2])) $this->id = clean($var[2], 3);
			if (in_array($var[0], $this->actions)) {
				return $APP->{$var[0]}();
			}else{
                $this->_404();
            }
		} else {
			if (defined('ADMIN')) {
				//访问网站后台
				return $APP->admin();
			} else {
				// 访问主页
				return $APP->home();
			}
		}
	}

    public function _404()
	{
		exit('404');
	}

    public static function AutoLoad(string $r)
    {
       
        $path_arr = explode('\\', $r);
        // $path_root = array_shift($path_arr);
        $fileName = array_pop($path_arr);
        // $sub_path = $path_arr ? implode('/', $path_arr) . '/' : '';
        $path = ROOT."/Core/";
        // p("{$path}{$fileName}.class.php");
        if (is_file($file = "{$path}{$fileName}.class.php") || is_file($file = "{$path}{$fileName}.php")) {
            require $file;
        } else {
            throw new \Exception("file not fond: {$path}{$fileName}.class.php");
        }
    }

    public function error($msg)
	{
        $code = 0;
        $wait = 3;
        $url = $_SERVER['HTTP_REFERER'];
        include(TEMPLATE . "/error.php");
	}

	public function success($msg, $url = null)
	{
		$message = $msg;
        include(TEMPLATE . "/error.php");
	}
}


