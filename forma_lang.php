<?php
echo('1');
	if (session_id() == "") session_start();
	global $_PSESSION;

	if (isset($_POST['button_eng']))
	{
	  $lang = 'eng';
	  $_SESSION['lang2']='eng';	
echo('2');
	}
	else
	{
	  $lang = 'rus';
	  $_SESSION['lang2']='rus';	
echo('3');
	}

	include 'index.php';
?>
