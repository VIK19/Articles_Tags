<?php  //ajax_list_page_read.php - creating pages list for reading selected article
    if (session_id() == "") session_start();
	global $lan, $conn, $_PSESSION;
	include_once './html/site_html_library.php';  
	include 'read_table_parameters_site.php';
    include_once 'site_php_library.php';
	
	$all_pages = $_PSESSION['all_pages'];
	$current_row_table = $_PSESSION['current_row_table'];
	if(($all_pages > 0) and ($current_row_table != ''))
	{
	       if($_PSESSION['all_pages_read'] > 1)
		   {
		        html_ajax_list_page_read(1, $_PSESSION['all_pages_read'], $_PSESSION['current_page_read']);
		   }//if
    }//if
?>