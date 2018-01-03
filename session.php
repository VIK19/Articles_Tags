<?php  //session.php - defenition variables of session
echo 'session.php';
	if (!file_exists('work/session.ini')) echo "File 'work/session.ini' not exist";
	else 
	{
	    $_RSESSION = parse_ini_file('work/session.txt');
	}//else
echo 'session.php  $_RSESSION[max_rows_page] = '.$_RSESSION['max_rows_page'] ;

?>	