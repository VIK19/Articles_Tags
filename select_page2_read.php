<?php  //select_page2_read.php - rewrite list pages  with selected curent page for reading selected article
    if (session_id() == "") session_start();
	global  $conn, $_PSESSION;
    include_once ('connect.php');
	include_once './html/site_html_library.php'; 
	include 'read_table_parameters_site.php'; //read all parameters from table table_parameters_site into array $_PSESSION
    include_once 'site_php_library.php';   
	
	$all_pages = $_PSESSION['all_pages'];
	$current_row_table = $_PSESSION['current_row_table'];	
	if(($all_pages > 0) and ($current_row_table != ''))
	{
           if($_PSESSION['all_pages_read'] > 1)
		   {
               html_select_page2_read(1);
           }//if
    }//if
?>