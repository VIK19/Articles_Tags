<?php  //select_page_read.php  -  read selected page of content of selected article
    if (session_id() == "") session_start();
	global  $conn, $_PSESSION;
    include_once ('connect.php');
	include 'read_table_parameters_site.php'; //read all parameters from table table_parameters_site into array $_PSESSION
    include_once 'site_php_library.php';
	
	$all_pages = $_PSESSION['all_pages'];
	if($all_pages > 0)
	{
			$n_symbols_article = $_PSESSION['n_symbols_article'];
			
		    //reading content of the selected article
			$article_content = '';
		    $id_article_read = $_PSESSION['id_article_read'];
		    $sql = "SELECT  article_content FROM articles_table 
		           WHERE article_id=".$conn->quote($id_article_read);
		    $data = $conn->query($sql);
		    $members =  $data->rowCount();
		    if($members > 0)//there are articles of this article_id
		    {
               $data2 = $data->fetch(PDO::FETCH_LAZY);
			   $article_content = $data2["article_content"];
		    }//if
	
	        $current_page_read = strip_tags(substr($_POST['search_term'],0, 100));
		    p_write_table_parameters_site('current_page_read',$current_page_read);
	
            if($_PSESSION['all_pages_read'] > 1) //there are some pages of content of selected article
			{
				$length_page = $_PSESSION['n_symbols_in_row'] * $_PSESSION['max_rows_page_read'];
				$first_number_symbol_current_page = ($current_page_read - 1 )*$length_page;
				
				$first_number_symbol_current_page = stripos($article_content,' ',$first_number_symbol_current_page);
 
				if($first_number_symbol_current_page)
				{
				    if($first_number_symbol_current_page >= $n_symbols_article)
				    {
				        $first_number_symbol_current_page = ($current_page_read - 1 )*$length_page;
				    }//if
				}//if
				else
				{$first_number_symbol_current_page = ($current_page_read - 1 )*$length_page;}
				p_write_table_parameters_site('first_number_symbol_current_page',$first_number_symbol_current_page);
				$last_number_symbol_current_page = $first_number_symbol_current_page + $length_page;
				if($last_number_symbol_current_page > $n_symbols_article)
				{$last_number_symbol_current_page = $n_symbols_article;}
				else
				{
				    $rab = stripos($article_content,' ',$last_number_symbol_current_page);
				    if($rab){$last_number_symbol_current_page = $rab;}
				}//else
				p_write_table_parameters_site('last_number_symbol_current_page',$last_number_symbol_current_page);
		    }//if
			
            read_article('0');//selected page of content of selected article
    }//if
?>