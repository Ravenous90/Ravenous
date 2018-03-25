<?php
	require_once('Smarty.class.php');
	$smarty = new Smarty();

		$smarty->template_dir = 'libs/templates/';
		$smarty->compile_dir = 'libs/templates_c/';
		$smarty->cache_dir = 'libs/cache/';
		$smarty->caching = false;
	
			include "/../content.php";

		$smarty->assign('title', $myContent->title);
		$smarty->assign('header', $myContent->header);
		$smarty->assign('footer', $myContent->footer);
		$smarty->assign('maintext', $myContent->maintext);
		$smarty->assign('guidelines', $myContent->guidelines);
		$smarty->assign('contact', $myContent->contact);		// Загрузка контента и добавление в переменные Smarty

?>