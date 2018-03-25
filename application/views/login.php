<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8">
		<link href="../../css/style.css" rel="stylesheet" type="text/css">
		<script src="../../js/jquery-1.6.3.min.js"></script>
		<script src="../../js/jquery.validate.min.js"></script>
		<script src="../../js/form1.js"></script>
	</head>
		
	<body>
		<?php
			include "libs/connect_smarty.php";
				$smarty->display('libs/templates/header.tpl');
				$smarty->display('libs/templates/menu.tpl');
		?>
		<div class="login">
			<h3 class="enter_to_site">Enter to site:</h3>
				<form method="post" action="../controllers/work_login.php" name="login" id="login">
					<p><strong>Username: <input name="username" type="text" class="field_login" placeholder="Enter your username"></strong></p>
					<p><strong>Password: <input name="password" type="password" class="field_login" placeholder="Enter your password"></strong></p>
					<p><input type="submit" value="Login"></p>
				</form>
				
				<form action="signup.php" id="wantregister">
					<button type="submit">I want to register</button>
				</form>
		</div>	
		
		<?php
			$smarty->display('libs/templates/footer.tpl');
		?>
	</body>
</html>	