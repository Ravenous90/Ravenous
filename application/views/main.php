<title>Main page</title>
<?php
include 'libs/connect_smarty.php';
$smarty->display('libs/templates/header.tpl');
$smarty->display('libs/templates/menu.tpl');
$smarty->display('libs/templates/maintext.tpl');
$smarty->display('libs/templates/footer.tpl');
?>
