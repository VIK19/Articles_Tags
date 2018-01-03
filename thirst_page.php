<?php  //thirst_page.php - go to thirst page

    if (session_id() == "") session_start();

    include_once ('connect.php');		   
    include 'read_table_parameters_site.php';
    include_once 'site_php_library.php'; // include my php-lib
	global $_PSESSION, $conn;

	$all_pages = $_PSESSION['all_pages'];
	if($all_pages > 0)
	{	   
		   p_write_table_parameters_site('current_page', '1');

           table_articles();//List of Articles
    }//if
	
?>