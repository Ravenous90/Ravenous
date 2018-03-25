<?php
	include 'controller.php';
	include '../models/model.php';
	
	$get_login = new Controller;
		$get_login->getDataLogin($username, $password);
	
	$set_login = new Model;
		$set_username = $get_login->username;
		$set_password = $get_login->password;
		
		$set_login->isEmptyFieldsLogin($set_username, $set_password);
		$set_login->cleanFieldsLogin($set_username, $set_password);
		$set_login->lengthUsername();
		$set_login->lengthPassword();
		$set_login->selectRow();
		
		$set_login->testLogin();
?>