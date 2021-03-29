<?php
class App
{
	protected $page = 1, $db, $config = array(), $action = "", $do = "", $id = "", $http = "http", $sandbox = false;

	protected $actions = ["user", "encryption", "text", "login", "register", "receive", "upload"];

	public function __construct($db, $config)
	{
		$this->config = $config;
		$this->db = $db;
		$this->db->object = TRUE;
	}

	public function run()
	{
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
				return $this->{$var[0]}();
			}
			return;
		} else {

			if (defined('ADMIN')) {
				//访问网站后台
				return $this->admin();
			} else {
				// 访问主页
				return $this->home();
			}
		}
	}
	//后台管理
	protected function admin()
	{
		//判断是否登录
		if (1) {
			// if(isset($_SESSION['admin_id']) && $_SESSION['admin_id'] > 0){
			//退出登录
			if (isset($_GET['do']) && $_GET['do'] == 'logout') {
				unset($_SESSION['admin_id']);
				unset($_SESSION['admin']);
				redirect('?do=login');
			}
			if (isset($_GET['do']) &&  strlen($_GET['do']) >= 4) {
				include(ADMIN_TEMPLATE . "/" . $_GET['do'] . ".php");
			} else {
				include(ADMIN_TEMPLATE . "/base.php");
			}
		} else {
			if (isPost() && $_GET['do'] == 'login') {
				$username = $_POST['username'];
				$password = $_POST['password'];
				$ret = $this->db->where("username", $username)->where("password", md5(md5($password)))->getOne("admin");
				if ($ret) {
					$_SESSION['admin']['id'] = $_SESSION['admin_id'] = $ret['id'];
					$_SESSION['admin']['username'] = $ret['username'];
					$_SESSION['admin']['login_time'] = $ret['login_time'];
					redirect('?do=base');
				} else {
					exit('账号密错误！');
				}
			}
			include(ADMIN_TEMPLATE . "/login.php");
		}
	}

	protected function home()
	{
		$ip = get_real_ip();
		if($ip){
			$intranet = $this->db->where("upload_ip", $ip)->where("is_lan", 1)->where("create_time", strtotime("-1 hours"),">")->get("file");
		}
		include(TEMPLATE . "/index.php");
	}

	protected function text()
	{
		include(TEMPLATE . "/text.php");
	}

	protected function encryption()
	{
		include(TEMPLATE . "/encryption.php");
	}

	protected function receive()
	{
		include(TEMPLATE . "/receive.php");
	}
	protected function login()
	{
		if (isPost()) {
			if (!isset($_POST['username']) || strlen($_POST['username']) > 12 || strlen($_POST['username']) < 4) {
				$this->error('用户名不符合规定，请修改');
			}
			if (!isset($_POST['password']) || strlen($_POST['password']) > 24 || strlen($_POST['password']) < 6) {
				$this->error('密码不符合规定，请修改');
			}
			$username = (string)$_POST['username'];
			$password = md5(md5((string)$_POST['password']));
			$ret = $this->db->where("username", $username)->where("password", $password)->getOne("user");
			if ($ret) {
				//开始执行登录操作
				$this->direct($ret['user_id']);
				redirect('?do=home');
			} else {
				$this->error('账号或密码错误');
			}
		} else {
			include(TEMPLATE . "/login.php");
		}
	}
	protected function direct($user_id)
	{
		$user = $this->db->where("user_id", $user_id)->getOne("user");
		if ($user) {
			$_SESSION['is_login'] = TRUE;
			$_SESSION['user'] = [
				'user_id' => $user['user_id'],
				'username' => $user['username'],
			];
		}
	}
	protected function register()
	{
		if (isPost()) {
			if (!isset($_POST['username']) || strlen($_POST['username']) > 12 || strlen($_POST['username']) < 4) {
				$this->error('用户名不符合规定，请修改');
			}
			if (!isset($_POST['password']) || strlen($_POST['password']) > 24 || strlen($_POST['password']) < 6) {
				$this->error('密码不符合规定，请修改');
			}
			if ($_POST['password'] != $_POST['password1']) {
				$this->error('两次输入的密码不一致');
			}
			//开始写入数据库
			$data = [
				"username" 		=> (string)$_POST['username'],
				"password" 		=> md5(md5((string)$_POST['password'])),
				"create_time" 	=> time(),
			];
			$ret = $this->db->where("username", $data['username'])->getOne("user");
			if ($ret) {
				$this->error('此用户名已存在');
			}
			$user_id =  $this->db->insert('user', $data);
			if ($user_id > 0) {
				$this->success('注册成功，请登录', '?do=base');
			} else {
				$this->error('注册失败，请重试');
			}
		} else {
			include(TEMPLATE . "/register.php");
		}
	}

	public function upload()
	{
		if (isPost()) {
			$md5 = md5_file($_FILES['file']['tmp_name']);
			$extension = pathinfo($_FILES['file']['name'])['extension'];
			$save_filename = $md5 . '.' . $extension;
			$save_filepath = 'upload/' . date('Y/m/d/', time());
			//开始创建文件目录
			sss_mkdir($save_filepath);
			//移动临时文件到 指定目录
			$ret = move_uploaded_file($_FILES["file"]["tmp_name"], $save_filepath . $save_filename);
			if (!$ret) $this->error('文件上传失败');

			$is_lan = isset($_POST['isLAN']) && $_POST['isLAN'] ?: 0;
			$is_only = isset($_POST['time']) && $_POST['time'] == 1 ?: 0;
			$expire_time = NULL;
			if (!$is_only) {
				if ($_POST['time'] == '1d') {
					$expire_time = strtotime("+1 day");
				}
				if ($_POST['time'] == '7d') {
					$expire_time = strtotime("+7 day");
				}
			}
			//开始写入数据库
			$data = [
				"user_id" 		=> (int)$_SESSION['user']['user_id'],
				"name" 		=> $_FILES["file"]["name"],
				"md5"	=> $md5,
				"suffix"	=> $extension,
				"size"	=> $_FILES["file"]["size"],
				"url"	=> $save_filepath . $save_filename,
				"is_lan"	=> $is_lan,
				"upload_ip" => get_real_ip(),
				"is_only"	=> $is_only,
				"create_time" 	=> time(),
				"expire_time" => $expire_time,
			];
			$file_id =  $this->db->insert('file', $data);
			if ($file_id > 0) {
				$this->success('文件上传成功');
			} else {
				$this->error('文件上传失败，请重试');
			}
		} else {
			exit('9999');
			redirect('?do=home');
		}
	}


	public function error($msg)
	{
		exit($msg);
	}

	public function success($msg, $url = null)
	{
		exit('success：' . $msg);
	}
}
