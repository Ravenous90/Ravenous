<?php
	include 'controller.php';
	include '../models/model.php';
	
	$get_account = new Controller;
		$get_account->getDataAccount($username, $email, $old_password, $new_password, $gender, $age, $phone, $info);
	
	$set_account = new Model;
		$set_username = $get_account->username;
		$set_email = $get_account->email;
		$set_old_password = $get_account->old_password;
		$set_new_password = $get_account->new_password;
		$set_gender = $get_account->gender;
		$set_age = $get_account->age;
		$set_phone = $get_account->phone;
		$set_info = $get_account->info;
		
		$set_account->selectRowByEmail($set_email);
		$set_account->updateInfo($set_username, $set_email, $set_gender, $set_age, $set_phone, $set_info);
		$set_account->updateSession($set_username, $set_email, $set_gender, $set_age, $set_phone, $set_info);
		
			if (($set_old_password != '') && ($set_new_password != '')) {
				$set_account->updatePassword($set_old_password, $set_new_password, $set_email);
			}
			
		$set_account->isOkUpdate();	
?>
