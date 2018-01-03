<?php  // content_main.php - main of AUTHORIZATION 
    if (session_id() == "") session_start();

    global $_PSESSION, $conn;

	
	//include html library
	include_once './html/site_html_library.php'; 

	html_content_main();
?>			