<?php
	include "config.php";
		$db = mysql_connect ($dbHost, $dbUsername, $dbPassword);
		$connectdb = mysql_select_db ($dbName, $db);

/*	if($db)
		echo '<br>GOOD';
	else 
		die ('<br>ERROR');
	
	if ($connectdb) 
		echo '<br>Connect successful';
	else 
		die ('<br>DB not found');
*/
	?>