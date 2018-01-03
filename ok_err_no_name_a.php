<?php  //ok_err_no_name_a.php  -  no name of Article in form
    if (session_id() == "") session_start();
	global $lan,$_PSESSION;
    include_once 'site_php_library.php';	
    include 'read_table_parameters_site.php';
	
	$ar_new_tags = array();
	
	$ar_tags = $_PSESSION['ar_tags_read'];
	if(strlen($ar_tags) > 0)
	{
	    if(strrpos($ar_tags,'^^^'))
		{
		    $ar_new_tags = explode('^^^',$ar_tags);
		}
		else 
		{
		    $ar_new_tags[0] = $ar_tags;
	    }
    }//if

	html_ok_err_no_name_a(1,$ar_new_tags);
	
?>