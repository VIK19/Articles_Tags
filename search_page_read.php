<?php  //search_page_read.php - searching first and next page  with this tag in the selected article for reading
    if (session_id() == "") session_start();
	global $lan, $conn, $_PSESSION;
	include_once './html/site_html_library.php';  
	include 'read_table_parameters_site.php';
	include_once 'site_php_library.php';

	$current_row_table = $_PSESSION['current_row_table'];
	$ar_tags_read = $_PSESSION['ar_tags_read'];
	if(($current_row_table != '') and (strlen($ar_tags_read) > 0))
	{
	        $current_page_read = 1;
		    $length_page = $_PSESSION['n_symbols_in_row'] * $_PSESSION['max_rows_page_read'];
            $first_number_symbol_current_page = $_PSESSION['first_number_symbol_current_page'];
			$last_number_symbol_current_page = $_PSESSION['last_number_symbol_current_page'];
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
		   
		    //defenition of n_pos_tag_in_article
			$n_pos_tag_in_article = $_PSESSION['n_pos_tag_in_article'];

		    $current_tag_read = strip_tags(substr($_POST['search_term'],0, 100));//selected tag for reading
			
			if(($_PSESSION['current_tag_read'] == '^^^')
		       && ($current_tag_read == '^^^')
		     )// it is 1th time of serching 1th tag
		    {
			    //reading 1th tag
			   $array_tags_read = array();
			   $ar_tags_read = $_PSESSION['ar_tags_read'];
			   if(strlen($ar_tags_read) > 0) //there is a tag
	           {
	                if(strrpos($ar_tags_read,'^^^'))
		            {
		                $array_tags_read = explode('^^^',$ar_tags_read);
		                $current_tag_read = $array_tags_read[0];
		            }
		            else {$current_tag_read = $ar_tags_read;}
                }//if
			   
		       p_write_table_parameters_site('current_tag_read',$current_tag_read);
			   $rab = stripos($article_content,$current_tag_read,0);
			   if(!$rab) {$n_pos_tag_in_article = 0;}
               else {$n_pos_tag_in_article = $rab;}			   
		    }//if
			else // it is 1th time of serching not 1th tag
			{
		        if(($_PSESSION['current_tag_read'] != $current_tag_read)
		           && ($current_tag_read != '^^^')
		           )// it is 1th time of serching this tag
		        {
		            p_write_table_parameters_site('current_tag_read',$current_tag_read);
			        $rab = stripos($article_content,$current_tag_read,0);
			        if($rab == false) {$n_pos_tag_in_article = 0;}			   
					else {$n_pos_tag_in_article = $rab;}
		        }//if
			}//else
			
			if(($_PSESSION['current_tag_read'] != '^^^')
		           && ($current_tag_read == '^^^')
		           )// it is next time of serching the same tag
		    {
		            $rab = stripos($article_content,$_PSESSION['current_tag_read'],$n_pos_tag_in_article+1);
			        if($rab){$n_pos_tag_in_article = $rab;}	
					else {$n_pos_tag_in_article = 0;}
		    }//if
		    p_write_table_parameters_site('n_pos_tag_in_article',$n_pos_tag_in_article);

		    if(($n_pos_tag_in_article > 0) && ($_PSESSION['all_pages_read'] > 1))
		    {    
		        if($n_pos_tag_in_article > $length_page) //the tag is not in 1th page
		        {
			        $current_page_read = floor($n_pos_tag_in_article/$length_page) + 1;
					$first_number_symbol_current_page = ($current_page_read - 1 )*$length_page;
					$rab = stripos($article_content,' ',$first_number_symbol_current_page);

					if($rab)
					{
					    if($rab >= $n_pos_tag_in_article)
					    {
					        $first_number_symbol_current_page = ($current_page_read - 1 )*$length_page;

					    }//if
						else
						{
					        $first_number_symbol_current_page = $rab;

					    }//if
					}//if
					else
					{$first_number_symbol_current_page = ($current_page_read - 1 )*$length_page;}
					$last_number_symbol_current_page = $first_number_symbol_current_page + $length_page;

					if($last_number_symbol_current_page > $n_symbols_article)
				    {$last_number_symbol_current_page = $n_symbols_article;}
				    else
				    {
					    $rab = stripos($article_content,' ',$last_number_symbol_current_page);
					    if($rab){$last_number_symbol_current_page = $rab;}
				        else 
				        {
					        $last_number_symbol_current_page = $n_symbols_article;
				        }//else
					}//else
				}//if
			}//if
			else //the tag is in 1th page (the article has only one page)
		    {			  
			    if($n_pos_tag_in_article > 0)
				{
				    $first_number_symbol_current_page = 0; 
				    $last_number_symbol_current_page = $length_page;
				    if($last_number_symbol_current_page > $n_symbols_article)
				    {
					    $last_number_symbol_current_page = $n_symbols_article;
					}//if
				    else
				    {
					    $last_number_symbol_current_page = stripos($article_content,' ',$length_page);
					}//else				
				}//if	
			}//else



			p_write_table_parameters_site('first_number_symbol_current_page',$first_number_symbol_current_page);
			p_write_table_parameters_site('last_number_symbol_current_page',$last_number_symbol_current_page);			
			p_write_table_parameters_site('current_page_read',$current_page_read);
			
			if($current_tag_read != '^^^')
			{$par = '^^^';}
			else 
			{$par = '1';}

            read_article($par);//page of content for reading selected article
    }//if
?>