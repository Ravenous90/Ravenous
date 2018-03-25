<?php session_start(); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
	<head>
		<meta charset="utf-8">
		<title>My account</title>
		<link href="../../css/style.css" rel="stylesheet" type="text/css">
		<link href="../../css/jquery.arcticmodal-0.3.css" rel="stylesheet">
		<link rel="stylesheet" href="../../css/themes/simple.css">
		<script src="../../js/jquery-1.6.3.min.js"></script>
		<script src="../../js/jquery.validate.min.js"></script>
		<script src="../../js/jquery.arcticmodal-0.3.min.js"></script>
		<script src="../../js/form2.js"></script>
		<script src="../../js/change_info.js"></script>
	</head>																						
	
	<body>
		<?php 
			include "libs/connect_smarty.php";
				$smarty->display('libs/templates/header.tpl');
				$smarty->display('libs/templates/menu.tpl');
		?>	
			<div class="account" id="account_block">
				<h3 class="account_room">Your have entered to site as <?=$_SESSION['username']?> <input type="submit" value="Edit profile" id="edit_profile"></h3>
					<div style="display: none;">
						<div class="box-modal" id="modal">
					<form method="post" action="" id="change">
						<p>Username: <input name="username" type="text" class ="field_account" placeholder="Change username" value="<?=$_SESSION['username']?>"</p>
						<p>E-mail: <input name="email" type="email" class ="field_account" value="<?=$_SESSION['email']?>" readonly></p>
						<p><input name="password" type="hidden" class ="field_account" value="<?=$_SESSION['password']?>" readonly></p>
						<p>Old password: <input name="old_password" type="password" class ="field_account" placeholder="Enter password"></p>
						<p>New password: <input name="new_password" type="password" class ="field_account" placeholder="Change password"></p>
							<span style="vertical-align:middle; padding:20px";>Gender:</span>
							<input type="radio" name="gender" value="1" style="vertical-align:middle;"/>
							<span style="vertical-align:middle;">Male</span>
							<input type="radio" name="gender" value="2" style="vertical-align:middle;"/>
							<span style="vertical-align:middle;">Female</span> 
						<p>Age: <input name="age" type="text" class ="field_account" value="<?=$_SESSION['age']?>" placeholder="Add age"></p>
						<p>Phone: <input name="phone" type="text" class ="field_account" value="<?=$_SESSION['phone']?>" placeholder="Add phone"></p>
						<p>Info: <input name="info" type="textarea" class ="field_account" value="<?=$_SESSION['info']?>" placeholder="Add info about yourself"></p>
						<p><input type="submit" value="Save change" id="edit"></p>
					</form><br>
				<div id="result_change"></div>
						</div>
					</div>
				<div id="account">		
					<span style="vertical-align:middle; padding:20px";>Information:</span><br><br>	
					<span style="vertical-align:middle; padding:20px";>Username: <?=$_SESSION['username']?></span><br>
					<span style="vertical-align:middle; padding:20px";>E-mail: <?=$_SESSION['email']?></span><br>
					<span style="vertical-align:middle; padding:20px";>Gender: 
						<?php
							if (empty($_SESSION['gender'])) {
								echo "";
							}
							if ($_SESSION['gender'] == 1) {
								echo "Male";
							}
							if ($_SESSION['gender'] == 2) {
								echo "Female";
							}							
						?> </span><br>
					<span style="vertical-align:middle; padding:20px";>Age: <?=$_SESSION['age']?></span><br>
					<span style="vertical-align:middle; padding:20px";>Phone: <?=$_SESSION['phone']?></span><br>
					<span style="vertical-align:middle; padding:20px";>Info: <?=$_SESSION['info']?></span><br>
				</div>
			</div>
		<?php
			$smarty->display('libs/templates/footer.tpl');
		?>
	</body>
</html>