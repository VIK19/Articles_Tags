<?php  //ok_err_no_content_a.php - no Content of Article in form
    if (session_id() == "") session_start();
	global $lan, $_PSESSION;
    include 'read_table_parameters_site.php';
    include_once './html/site_html_library.php';  
	
	$ar_new_tags = array();
	
	$ar_tags = $_PSESSION['ar_tags'];
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

	html_ok_err_no_content_a(1,$ar_new_tags);
	
?>