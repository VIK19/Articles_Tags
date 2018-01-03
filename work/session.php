<?php  //session.php - defenition variables of session

	if (!file_exists('work/session.ini')) echo "File work/session.ini not exist";
	else 
	{
	    $_RSESSION = parse_ini_file('work/session.ini');
	}//else

?>	