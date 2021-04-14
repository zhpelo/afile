<?php
	class Person{
		protected $name = "Tom";
		
		public function Say(){
			echo "My name is ".$this->name;
		}
	}
	
	class Man extends Person{
		function Speak(){
			echo $this->name." can speak Chinese";
		}
	}
	
	$p1 = new Man();
	$p1->Speak();
	$p1->Say(); //在子类外部调用父类中受保护的方法
?>