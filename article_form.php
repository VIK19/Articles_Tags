<?php  // article_form.php - form for adding an article
	if (session_id() == "") session_start();
	global  $lan, $conn;

    include_once ('connect.php');
	include_once './html/site_html_library.php';  
	include 'read_table_parameters_site.php'; //read all parameters from table table_parameters_site into array $_PSESSION
    include_once 'site_php_library.php';		

	
    $lan = $_SESSION['lan'];    
	$login_user2 = $_PSESSION['login_user'];
	
    p_write_table_parameters_site('ar_tags',   ''); 
	 
	//form for adding article
    html_article_form(1); //html code
?>