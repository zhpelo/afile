<?php
class App{
    protected $page=1, $db, $config=array(),$action="", $do="", $id="", $http="http", $sandbox = false;

    protected $actions = ["user","receive","upload"];

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
			// 访问主页
			return $this->home();
		}
	}

    protected function home(){
		include(TEMPLATE."/index.php");
	}


    protected function receive(){
		include(TEMPLATE."/receive.php");
	}

	protected function upload(){
		include(TEMPLATE."/upload.php");
	}



}

?>