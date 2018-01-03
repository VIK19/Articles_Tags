<?php  //select_page2.php - creating pages list
    if (session_id() == "") session_start();
	global $lan, $conn, $_PSESSION;
	include_once './html/site_html_library.php';  
	include 'read_table_parameters_site.php';
    include_once 'site_php_library.php';
		   
	$all_pages = $_PSESSION['all_pages'];
	if($all_pages > 0)
	{			   
		   html_select_page2(1, $_PSESSION['current_page'], $all_pages);
    }//if	
	
?>