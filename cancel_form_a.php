<?php  //cancel_form_a.php - Save form for new editing
    if (session_id() == "") session_start();

    global $lan, $conn, $_PSESSION;
   
    include_once './html/site_html_library.php';

    include_once 'connect.php';

	include_once 'site_php_library.php';

	$all_pages = $_PSESSION['all_pages'];
    if($all_pages > 0)
    {		
	    html_cancel_form_a(1);
	
        table_articles();//call articles table (second time)
		   
	    html_cancel_form_a(2);
		
		if($all_pages == 1)
		{
		   html_cancel_form_a(3);
		}//if
		else
				{
		   html_cancel_form_a(4);
		}//if
		
	}//if
	
	

?>