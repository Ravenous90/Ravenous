<?php
	include 'controller.php';
	include '../models/model.php';
	
	$get_signup = new Controller;
		$get_signup->getDataSignup($username, $email, $password);

	$set_signup = new Model;
		$set_username = $get_signup->username;
		$set_email = $get_signup->email;
		$set_password = $get_signup->password;

			$set_signup->isEmptyFieldsSignup($set_username, $set_email, $set_password);
			$set_signup->cleanFieldsSignup($set_username, $set_email, $set_password);
			$set_signup->lengthUsername();
			$set_signup->lengthPassword();
			$set_signup->isValidateEmail();

			$set_signup->isUsernameOrEmailExist();
			$set_signup->insertSignup();
			$set_signup->sendConfirmMessage();
?>