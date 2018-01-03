<?php //ajax_list_tag_read.php - creating article tags list for reading selected article
    if (session_id() == "") session_start();
	global $lan, $conn, $_PSESSION;
	include_once './html/site_html_library.php';  
	include 'read_table_parameters_site.php';

	$all_pages = $_PSESSION['all_pages'];
	$current_row_table = $_PSESSION['current_row_table'];
	if(($all_pages > 0) and ($current_row_table != ''))
	{
	    $ar_tags_read = $_PSESSION['ar_tags_read'];
	    $ar_tags_read = explode('^^^',$ar_tags_read);
	    if(count($ar_tags_read > 0)) //there are tags for this article
	    {
		   html_ajax_ajax_list_tag_read(1, $ar_tags_read);
	    }//if
        else	
	    {
		    html_ajax_ajax_list_tag_read(2, $ar_tags_read);
	    }//if
	}//if
?>