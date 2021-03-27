<?php
class App{
    protected $page=1, $db, $config=array(),$action="", $do="", $id="", $http="http", $sandbox = false;

    protected $actions = ["user","encryption","text","login","register","receive","upload"];

    public function __construct($db,$config){
        $this->config=$config;
        $this->db=$db;
        $this->db->object=TRUE;
    }

    public function run(){
        //判断操作方法
		if(isset($_GET["a"]) && !empty($_GET["a"])){
			// Validate Request
			$var = explode("/",$_GET["a"]);
			if(count($var) > 4) return $this->_404();
			// Removes dots
			$var[0] = str_replace(".","", $var[0]);
			$this->action = clean($var[0],3,TRUE);
			// Run Methods
			if(isset($var[1]) && !empty($var[1])) $this->do = clean($var[1],3);
			if(isset($var[2]) && !empty($var[2])) $this->id = clean($var[2],3);			
			if(in_array($var[0],$this->actions)){
				return $this->{$var[0]}();
			}
			return;
		}else{
			
			if(defined('ADMIN')){
				//访问网站后台
				return $this->admin();
			}else {
				// 访问主页
				return $this->home();
			}
			
		}
	}
	//后台管理
	protected function admin(){
		//判断是否登录
		if(1){
		// if(isset($_SESSION['admin_id']) && $_SESSION['admin_id'] > 0){
			//退出登录
			if(isset($_GET['do']) && $_GET['do'] == 'logout'){
				unset($_SESSION['admin_id']);
				unset($_SESSION['admin']);
				redirect('?do=login');
			}
			if(isset($_GET['do']) &&  strlen($_GET['do']) >= 4){
				include(ADMIN_TEMPLATE."/".$_GET['do'].".php");
			}else{
				include(ADMIN_TEMPLATE."/base.php");
			}
		}else{
			if(isPost() && $_GET['do'] == 'login'){
				$username = $_POST['username'];
				$password = $_POST['password'];
				$ret = $this->db->where("username", $username)->where("password", md5(md5($password)))->getOne("admin");
				if($ret){
					$_SESSION['admin']['id'] = $_SESSION['admin_id'] = $ret['id'];
					$_SESSION['admin']['username'] = $ret['username'];
					$_SESSION['admin']['login_time'] = $ret['login_time'];
					redirect('?do=base');
				}else{
					exit('账号密错误！');
				}
			}
			include(ADMIN_TEMPLATE."/login.php");
		}
	}

    protected function home(){
		include(TEMPLATE."/index.php");
	}

	protected function text(){
		include(TEMPLATE."/text.php");
	}

	protected function encryption(){
		include(TEMPLATE."/encryption.php");
	}

    protected function receive(){
		include(TEMPLATE."/receive.php");
	}
	protected function login(){
		include(TEMPLATE."/login.php");
	}
	protected function register(){
		if(isPost()){
			if(!isset($_POST['username']) || strlen($_POST['username']) > 12 || strlen($_POST['username']) < 4){
				$this->error('用户名不符合规定，请修改');
			}
			if(!isset($_POST['password']) || strlen($_POST['password']) > 24 || strlen($_POST['password']) < 6){
				$this->error('密码不符合规定，请修改');
			}
			if($_POST['password'] != $_POST['password1']){
				$this->error('两次输入的密码不一致');
			}
			//开始写入数据库
			$data = [
               "username" 		=> (string)$_POST['username'],
               "password" 		=> md5( md5((string)$_POST['password'])),
			   "create_time" 	=> time(),
			];
			$ret = $this->db->where("username", $data['username'])->getOne("user");
			if($ret){
				$this->error('此用户名已存在');
			}
			$user_id =  $this->db->insert('user', $data);
			if($user_id > 0){
				$this->success('注册成功，请登录','?do=base');
			}else{
				$this->error('注册失败，请重试');
			}
		}else{
			include(TEMPLATE."/register.php");
		}
	}
	
	protected function upload(){
		include(TEMPLATE."/upload.php");
	}


	public function error($msg){
		exit($msg);
	}

	public function success($msg, $url = null){
		exit('success：'.$msg);
	}



}

?>