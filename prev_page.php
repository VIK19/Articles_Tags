<?php  //prev_page.php - go to prev. page
    if (session_id() == "") session_start();
	global $_PSESSION, $conn;
    include_once 'site_php_library.php';	
    include 'read_table_parameters_site.php';
	
	$all_pages = $_PSESSION['all_pages'];
	$current_row_table = $_PSESSION['current_row_table'];
	if(($all_pages > 0) and ($current_row_table != ''))
	{
           $current_page = $_PSESSION['current_page'];
		   p_write_table_parameters_site('current_row_table', -1);//number of selected row on current page
		   if($current_page < 2) 
		   {
		       $current_page = 2;
		   }//if
		   $prev_page = $current_page - 1;

		   p_write_table_parameters_site('current_page', $prev_page);

		   html_prev_page(1);

           table_articles();//List of Articles
		   
		   html_prev_page(2);
    }//if
?>