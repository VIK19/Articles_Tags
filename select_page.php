<?php  //select_page.php  -  go to selected page
    if (session_id() == "") session_start();
	global $_PSESSION, $conn;
    include_once 'site_php_library.php';	
    include 'read_table_parameters_site.php';
 

	$ar_tags = $_PSESSION['ar_tags'];
	$all_pages = $_PSESSION['all_pages'];
	if($all_pages > 0)
	{
		   $current_page = strip_tags(substr($_POST['search_term'],0, 100));
		   p_write_table_parameters_site('current_page', $current_page);
           $current_page = $_PSESSION['current_page'];
		   p_write_table_parameters_site('current_row_table', -1);

           $rab = table_articles();//List of Articles
    }//if
?>