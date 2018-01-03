<?php  //next_page.php - go to next page

    if (session_id() == "") session_start();

    include_once ('connect.php');		   
    include 'read_table_parameters_site.php';
    include_once 'site_php_library.php'; # include my php-lib
	include_once 'html/site_html_library.php';
	global $_PSESSION, $conn;

	$all_pages = $_PSESSION['all_pages'];
	if($all_pages > 0)
	{
           $current_page = $_PSESSION['current_page'];
		   if($all_pages > 0)
		   {
		       if($current_page >= $all_pages) 
		       {$current_page = $all_pages;}
			   else {$current_page = $current_page + 1;}
           }
		   else {$current_page = 0;}
		   
		   p_write_table_parameters_site('current_page', $current_page);

           table_articles();//List of Articles
    }//if
	
?>