<?php
class App
{
	protected $page = 1, $db, $config = array(), $action = "", $do = "", $id = "", $http = "http", $sandbox = false;

	protected $actions = ["user", "encryption", "text", "login","user", "download", "register", "receive", "upload"];

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
	public function _404(){
		exit('404');
	}
	//后台管理
	protected function admin()
	{
		//判断是否登录
		if(isset($_SESSION['admin_id']) && $_SESSION['admin_id'] > 0){
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
			if (is_post() && $_GET['do'] == 'login') {
				$username = $_POST['username'];
				$password = $_POST['password'];

				
				$ret = $this->db->where("username", $username)->where("password", md5(md5($password)))->getOne("admin");

				if ($ret) {
					$_SESSION['admin']['id'] = $_SESSION['admin_id'] = $ret['admin_id'];
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
			$intranet = $this->db->where("upload_ip", $ip)
								 ->where("is_lan", 1)
								 ->where("create_time", strtotime("-1 hours"),">")
								 ->where("expire_time", time(),">")
								 ->orderBy("create_time","Desc")
								 ->get("file");
		}
		include(TEMPLATE . "/index.php");
	}

	public function user()
	{
		//不登录不允许访问
		if(!isset($_SESSION['is_login']) && !$_SESSION['is_login']){
			redirect('?a=login');
		}
		if( isset($_GET['c']) ){
			if($_GET['c'] == 'logout'){
				//退出
				unset($_SESSION['is_login']);
				unset($_SESSION['user']);
				redirect('?a=login');
			}
			if($_GET['c'] == 'index'){
				if (is_post()) {
					if (!isset($_POST['nickname']) || strlen($_POST['nickname']) > 12 || strlen($_POST['nickname']) < 4) {
						$this->error('用户名不符合规定，请修改');
					}
					if ($_POST['bio'] != '' && (strlen($_POST['bio']) > 24 || strlen($_POST['bio']) < 6) ) {
						$this->error('个人简介不符合规定，请修改');
					}
					$nickname = (string)$_POST['nickname'];
					$bio = (string)$_POST['bio'];

					$this->db->where("user_id", $_SESSION['user']['user_id'])->update("user",['nickname' =>$nickname ,'bio' =>$bio]);
					$this->success('修改成功', );
				}else{
					$template_data = $this->db->where("user_id", $_SESSION['user']['user_id'])->getOne("user");
				}
			}

			if($_GET['c'] == 'setpass'){
				if (is_post()) {
					if (!isset($_POST['newpassword']) || strlen($_POST['newpassword']) > 24 || strlen($_POST['newpassword']) < 6) {
						$this->error('新密码不符合规定，请修改');
					}
					if (!isset($_POST['newpassword2']) || $_POST['newpassword2'] != $_POST['newpassword']) {
						
					}
					$user = $this->db->where("user_id", $_SESSION['user']['user_id'])->getOne("user");
					if($user['password'] != md5(md5((string)$_POST['oldpassword'])) ){
						$this->error('旧密码不正确');
					}
					$this->db->where("user_id",$user['user_id'])->update("user",['password' => md5(md5((string)$_POST['newpassword']))] );
					$this->success('密码修改成功', );
				}
			}

			if($_GET['c'] == 'file'){
				$template_data = $this->db->where("user_id", $_SESSION['user']['user_id'])
										->orderBy("create_time","Desc")
										->get("file");
			}

		}
		include(TEMPLATE . "/user.php");
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
		if (is_post()) {
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
		if (is_post()) {
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
		if (is_post()) {
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

			if( isset($_GET['c']) && $_GET['c'] == 'text'){
				//开始写入数据库
				$data = [
					"user_id" 		=> 0,
					"alias"		=> $this->alias(),
					"content"	=> htmlentities((string)$_POST['text']),
					"is_lan"	=> $is_lan,
					"upload_ip" => get_real_ip(),
					"is_only"	=> $is_only,
					"create_time" 	=> time(),
					"expire_time" => $expire_time,
				];
				if( isset($_SESSION['is_login']) && $_SESSION['is_login']){
					$data['user_id'] = (int)$_SESSION['user']['user_id'];
				}
				$text_id =  $this->db->insert('text', $data);
				if ($text_id > 0) {
					include(TEMPLATE . "/upload_success.php");
				} else {
					$this->error('文件上传失败，请重试');
				}
			}else{
				$md5 = md5_file($_FILES['file']['tmp_name']);
				$extension = pathinfo($_FILES['file']['name'])['extension'];
				$save_filename = $md5 . '.' . $extension;
				$save_filepath = 'upload/' . date('Y/m/d/', time());
				//开始创建文件目录
				sss_mkdir($save_filepath);
				//移动临时文件到 指定目录
				$ret = move_uploaded_file($_FILES["file"]["tmp_name"], $save_filepath . $save_filename);
				if (!$ret) $this->error('文件上传失败');
				//开始写入数据库
				$data = [
					"user_id" 		=> 0,
					"name" 		=> $_FILES["file"]["name"],
					"md5"	=> $md5,
					"alias"		=> $this->alias(),
					"suffix"	=> $extension,
					"size"	=> $_FILES["file"]["size"],
					"url"	=> $save_filepath . $save_filename,
					"is_lan"	=> $is_lan,
					"upload_ip" => get_real_ip(),
					"is_only"	=> $is_only,
					"create_time" 	=> time(),
					"expire_time" => $expire_time,
				];
				if( isset($_SESSION['is_login']) && $_SESSION['is_login']){
					$data['user_id'] = (int)$_SESSION['user']['user_id'];
				}
				$file_id =  $this->db->insert('file', $data);
				if ($file_id > 0) {
					include(TEMPLATE . "/upload_success.php");
				} else {
					$this->error('文件上传失败，请重试');
				}
			}
		} else {
			redirect('?do=home');
		}
	}
	public function download(){
		if( isset($_GET['alias']) && strlen($_GET['alias']) >= 6){
			$alias = (string)$_GET['alias'];

			if( isset($_GET['c']) && $_GET['c'] == 'text'){
				$data = $this->db->where("alias", $alias)->getOne("text");
			}else{
				$data = $this->db->where("alias", $alias)->getOne("file");
			}

			if(!$data) $this->error('找不到此文件');
			if($data['expire_time'] != NULL && $data['expire_time'] <= time()) {
				$this->error('文件失效');
			}


			

			
			
			if( isset($_GET['c']) && $_GET['c'] == 'download'){
				$file_dir = ROOT.'/'.$data['url'];
				//检查文件是否存在 
				if(!file_exists($file_dir)) {
					$this->error('文件找不到');
				} else {  
					$file = fopen($file_dir,"r"); // 打开文件  
					// 输入文件标签  
					Header("Content-type: application/octet-stream");  
					Header("Accept-Ranges: bytes");  
					Header("Accept-Length: ".filesize($file_dir));  
					Header("Content-Disposition: attachment; filename=" . $data['name']);  
					// 输出文件内容  
					echo fread($file,filesize($file_dir));  
					fclose($file);
				}
				//给阅后即焚文件 进行设置到期时间
				if($data['is_only'] == 1){
					// exit('设置到期时间');
					$this->db->where("file_id", $data['file_id'])->update("file",['expire_time' => time()]);
				}
				return;
			}
		}
		include(TEMPLATE . "/download.php");
	}

	protected function alias(){
		$unique = FALSE;
		$max_loop = 100;
		$i=0;
		$alias_length = 6;
	
		while (!$unique) {
			// retry if max attempt reached
			if($i>=$max_loop) {
				$alias_length++;
				$i=0;
			}
			$alias = strrand($alias_length);
			if( !$this->db->where("alias", $alias)->getOne("file") ) $unique=TRUE;
			$i++;
		}		
		return $alias;
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
