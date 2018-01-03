<?php  // all_pages_read.php  -  calculation all article pages  for reading the selected article 
    if (session_id() == "") session_start();
	global $_PSESSION, $conn;
    include_once 'site_php_library.php';	
    include 'read_table_parameters_site.php';
	include_once './html/site_html_library.php';  
    include_once ('connect.php');

	$all_pages = $_PSESSION['all_pages'];
	$current_row_table = $_PSESSION['current_row_table'];
	if(($all_pages > 0) and ($current_row_table != ''))
	{
		   p_write_table_parameters_site('current_page_read', '1');
		   p_write_table_parameters_site('n_pos_tag_in_article', 0);//curent number of tag position in content of the article
		   $n_pos_tag_in_article = 0;
           $current_page = $_PSESSION['current_page'];
		   $max_rows_page = $_PSESSION['max_rows_page'];
		   $id_article_read = $_PSESSION['id_article_read'];
		   $login_user2 = $_PSESSION['login_user'];
		   
           //finding article_id for reading		   
           $sql = "SELECT article_id, article_name, article_content, article_data  FROM articles_table 
	                WHERE article_id=".$conn->quote($id_article_read);

	       $data = $conn->query($sql);
           $members =  $data->rowCount();

	       if($members > 0) //id_article_read was found
	       {
	                   $data = $data->fetch(PDO::FETCH_LAZY);
                       p_write_table_parameters_site('t_article_name',  $data['article_name']);// article name for reading
					   $article_content = $data['article_content'];//all content of the article
					   $n_symbols_article = strlen($article_content);//number symbols of all content of the article
				       p_write_table_parameters_site('n_symbols_article',   $n_symbols_article);//symbols number of all content of the article
				       p_write_table_parameters_site('article_data_time',   $data['article_data']);					   
					   p_write_table_parameters_site('current_tag_read',   '^^^');//curent  tag searchinh page of reading article					   

					   //definition page number of the article
					   $rab =  ceil($n_symbols_article/$_PSESSION['n_symbols_in_row']/$_PSESSION['max_rows_page_read']);
					   p_write_table_parameters_site('all_pages_read',   $rab);	
					   if($rab == 1)
					   {html_all_pages_read(1);} //disabled buttons Prev and Next
					   else
                       {html_all_pages_read(2);} //enabled buttons Prev and Next
					   
					   //definition first and last symbol number of the current article page
					   $length_page = $_PSESSION['n_symbols_in_row'] * $_PSESSION['max_rows_page_read'];
		               if($length_page > $n_symbols_article)
		               {$length_page = $n_symbols_article;}
					   $first_number_symbol_current_page = '0';
					   p_write_table_parameters_site('first_number_symbol_current_page', $first_number_symbol_current_page);
                       $begin = $first_number_symbol_current_page;				   
					   $end = $begin + $length_page - 1;
				       if($end > $n_symbols_article)
				       {
					        $end = $n_symbols_article;
					   }//if
				       else
				       {
					        $end = stripos($article_content,' ',$end);
					   }//else
					   p_write_table_parameters_site('last_number_symbol_current_page',   $end);				   
					   
					   //defenite names array of tags for only one article of this user
                       $ar_tag_id = array();				   
					   $ar_tags_read = array();
		               $sql = "SELECT tag_id  FROM articles_tags_table WHERE article_id =".$conn->quote($id_article_read);
					   $data = $conn->query($sql);
                       $members =  $data->rowCount();

	                   if($members > 0) //article_id was found
	                   {
		                    while($data4 = $data->fetch(PDO::FETCH_LAZY))
	                        {
			                     $ar_tag_id[count($ar_tag_id)] = $data4["tag_id"];	
							     $rab = $data4["tag_id"];
		                    }//while
					   }//if

					   if(count($ar_tag_id)  >  0) 
					   {
					       for ($kk = 0; $kk < count($ar_tag_id); $kk++)
	                       {	
						       $rab = $ar_tag_id[$kk];
			                   $query4 = "SELECT tag_name  FROM tags_table WHERE tag_id =".$conn->quote($rab);
							   $query5 = $conn->query($query4);
                               $members =  $query5->rowCount();
	                           if($members > 0) //tag_id was found
	                           {
		                            while($data5 = $query5->fetch(PDO::FETCH_LAZY))
		                            {
							             $ar_tags_read[count($ar_tags_read)] =  $data5["tag_name"]; 
							        }//while
							   }//if
			               }//for

						   if(count($ar_tags_read) > 0)
						   {
						        $rab = '';
						        for ($k = 0; $k < count($ar_tags_read); $k++)
	                            {
								     if($k == 0) 
									 {$rab = $ar_tags_read[0];}
						             else {$rab = $rab.'^^^'.$ar_tags_read[$k];}

							    }//for
								p_write_table_parameters_site('ar_tags_read', $rab);
 
						   }//if
					   }//if
		   }//if
		   
		html_all_pages_read(3);   
		
    }//if
?>