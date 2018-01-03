<?php  //language.php - changing language
    if (session_id() == "") session_start();

	if (isset($_SESSION['lang2']))
	{
	  if ($_SESSION['lang2'] == 'eng')
	  {
			$lang = 'eng';
	  }
	  else
	  {
	  	    $lang = 'rus';
	  }
	}
	else
	{
		$lang = 'eng';
		$_SESSION['lang2']='eng';
	}

	if (!file_exists('txt/'.$lang.".ini")) echo "File 'txt/'.$lang.'.ini' not exist";
	else 
	{
	    $lan = parse_ini_file('txt/'.$lang.".ini");
		$_SESSION['lan'] = $lan;

	}//else

?>	