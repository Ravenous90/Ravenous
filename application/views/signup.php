<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">

<html>
<head>
    <meta charset="utf-8">
    <title>Sign up</title>
    <link href="../../css/style.css" rel="stylesheet" type="text/css">
    <script src="../../js/jquery-1.6.3.min.js"></script>
    <script src="../../js/jquery.validate.min.js"></script>
    <script src="../../js/form.js"></script>
</head>

<body>
<?php
include "libs/connect_smarty.php";
$smarty->display('libs/templates/header.tpl');
$smarty->display('libs/templates/menu.tpl');
?>
<div class="signup">
    <h3 class="create_account">Create account:</h3>
    <form method="post" action="../controllers/work_signup.php" name="signup" id="signup">
        <p><strong>Username: <input name="username" type="text" class="field"
                                    placeholder="Enter your username"></strong></p>
        <p><strong>E-mail: <input name="email" type="text" class="field" placeholder="Enter your E-mail"></strong></p>
        <p><strong>Password: <input name="password" type="password" class="field"
                                    placeholder="Enter your password"></strong></p>
        <p><input type="submit" value="Sign up"></p>
    </form>
    <form action="login.php" id="haveaccount">
        <button type="submit">I have account</button>
    </form>
</div>
<?php
$smarty->display('libs/templates/footer.tpl');
?>
</body>
</html>
