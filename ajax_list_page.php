<?php  //ajax_list_page - creating pages list
    if (session_id() == "") session_start();
	global $lan, $conn, $_PSESSION;
	include_once './html/site_html_library.php';  
	include 'read_table_parameters_site.php';
    include_once 'site_php_library.php';
	
	$all_pages = $_PSESSION['all_pages'];
	if($all_pages > 0)
	{	
       html_ajax_list_page(1, $all_pages); 

	   p_write_table_parameters_site('current_row_table', '0');//number of selected row on current page 
  
     }//if
?>