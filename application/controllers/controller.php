<?php
	class Controller {
		public $username, $email, $password, $old_password, $new_password,
		$gender, $phone, $age, $info;	
			
		function getDataSignup($username, $email, $password) { // получение данных с полей регистрации и запись их переменным
			if (isset($_POST['username'])) { $username = $_POST['username'];
			if ($username == '') {unset($username);}}
			if (isset($_POST['email'])) { $email = $_POST['email'];
			if ($email == '') {unset($email);}}
			if (isset($_POST['password'])) { $password = $_POST['password'];
			if ($password == '') {unset($password);}}
			
				$this->username = $username;
				$this->email = $email;
				$this->password = $password;
		}

		function getDataLogin($username, $password) { // получение данных с полей входа и запись их переменным
			if (isset($_POST['username'])) { $username = $_POST['username'];
			if ($username == '') {unset($username);}}
			if (isset($_POST['password'])) { $password = $_POST['password'];
			if ($password == '') {unset($password);}}
			
				$this->username = $username;
				$this->password = $password;
		}			
		
		function getDataAccount($username, $email, $old_password, $new_password, $gender, $age, $phone, $info) { // получение данных с полей редактировани профиля  и запись их в переменные
			if (isset($_POST['username'])) {$username = $_POST['username'];
			if ($username == '') {unset($username);}}
			
			$email = $_POST['email'];
				
			if (isset($_POST['old_password'])) {$old_password = $_POST['old_password'];}
			if (isset($_POST['new_password'])) {$new_password = $_POST['new_password'];}
			if (isset($_POST['gender'])) {$gender = $_POST['gender'];}
			if (isset($_POST['age'])) {$age = $_POST['age'];}
			if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
			if (isset($_POST['info'])) {$info = $_POST['info'];}
			
			$this->username = $username;
			$this->email = $email;
			$this->old_password = $old_password;
			$this->new_password = $new_password;
			$this->gender = $gender;
			$this->age = $age;
			$this->phone = $phone;
			$this->info = $info;
		}
	}		
?>