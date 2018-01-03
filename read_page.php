<?php  //read_page.php  -  reading curent page of selected article
    if (session_id() == "") session_start();
	global  $conn, $_PSESSION;
    include_once ('connect.php');
	include 'read_table_parameters_site.php'; //read all parameters from table table_parameters_site into array $_PSESSION
    include_once 'site_php_library.php';

	$all_pages = $_PSESSION['all_pages'];
	$current_row_table = $_PSESSION['current_row_table'];
	if(($all_pages > 0) and ($current_row_table != ''))
	{
		   //reading content of the selected article
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
		   else {echo 'Error in DB articles_table !';}
		   
		   $search_term = strip_tags(substr($_POST['search_term'],0, 100));

           $length_page = $_PSESSION['n_symbols_in_row'] * $_PSESSION['max_rows_page_read'];
		   if($length_page > $_PSESSION['n_symbols_article'])
		   {$length_page = $_PSESSION['n_symbols_article'];}
		   
           $first_number_symbol_current_page = $_PSESSION['first_number_symbol_current_page'];
		   $last_number_symbol_current_page = $_PSESSION['last_number_symbol_current_page'];
		   $current_page_read = $_PSESSION['current_page_read'];
		   
           if($_PSESSION['all_pages_read'] == 1)//there is only one page
		   {
			       $begin = 0;
				   $end = $_PSESSION['n_symbols_article'];
				   $first_number_symbol_current_page = 0;
				   p_write_table_parameters_site('first_number_symbol_current_page',$first_number_symbol_current_page);
				   $last_number_symbol_current_page = $_PSESSION['n_symbols_article'];
				   p_write_table_parameters_site('last_number_symbol_current_page',$last_number_symbol_current_page);
		   }//if
		   else//there are some pages
		   if($search_term == '2')//next page
		   {   
		        if($last_number_symbol_current_page < $_PSESSION['n_symbols_article'])
				{
		            $first_number_symbol_current_page = $last_number_symbol_current_page + 1;
			        p_write_table_parameters_site('first_number_symbol_current_page',
					   				           $first_number_symbol_current_page);
                    $begin = $first_number_symbol_current_page;	
               				
		            if($_PSESSION['all_pages_read'] > 2)
			        {
                        $current_page_read = $current_page_read + 1;
					    p_write_table_parameters_site('current_page_read',$current_page_read);
				        $last_number_symbol_current_page =  $begin + $length_page - 1;  		   
				        if($last_number_symbol_current_page > $_PSESSION['n_symbols_article'])
				        {
					        $last_number_symbol_current_page = $_PSESSION['n_symbols_article'];
					    }//if
				        else // $end <= $_PSESSION['n_symbols_article']
				        {
						    $rab = stripos($article_content,' ',$last_number_symbol_current_page);
					        if($rab){$last_number_symbol_current_page = $rab;}
				            else 
				            {
					            $last_number_symbol_current_page = $_PSESSION['n_symbols_article'];
				            }//else
					    }//else
					    p_write_table_parameters_site('last_number_symbol_current_page',$last_number_symbol_current_page);
			        }//if
			        else //$_PSESSION['all_pages_read'] = 2
			        {
				        $last_number_symbol_current_page = $_PSESSION['n_symbols_article'];
			            p_write_table_parameters_site('last_number_symbol_current_page',$last_number_symbol_current_page);
			        }//else
				}//if
		   }//if
		   else // ($current_page_read != '2')  and ($_PSESSION['all_pages_read'] > 2)
		   if($search_term == '-1')//previous page
		   {
			    if($first_number_symbol_current_page > 0)
			    {
				    $current_page_read = $current_page_read - 1;
					p_write_table_parameters_site('current_page_read',$current_page_read);
					if($current_page_read <= 1)
		            {
					      $current_page_read = 1;
						  p_write_table_parameters_site('current_page_read',$current_page_read);
						  $first_number_symbol_current_page = 0;
						  p_write_table_parameters_site('first_number_symbol_current_page',$first_number_symbol_current_page);
                          $last_number_symbol_current_page = $first_number_symbol_current_page + $length_page - 1;						  
				          if($last_number_symbol_current_page > $_PSESSION['n_symbols_article'])
				          {
					          $last_number_symbol_current_page = $_PSESSION['n_symbols_article'];
					      }//if
				          else 
				          {
							  $rab = stripos($article_content,' ',$last_number_symbol_current_page);
					          if($rab)
							  {$last_number_symbol_current_page = $rab;}
				              else 
				              {$last_number_symbol_current_page = $_PSESSION['n_symbols_article'];}//else
					      }//else										  
						  p_write_table_parameters_site('last_number_symbol_current_page',$last_number_symbol_current_page);
					}//if
					else //$_PSESSION['current_page_read'] > 1
					{
					    $last_number_symbol_current_page = $first_number_symbol_current_page - 1;
						p_write_table_parameters_site('last_number_symbol_current_page',
						                    $last_number_symbol_current_page); 							 
					    if($last_number_symbol_current_page > $_PSESSION['n_symbols_article'])
						{
						       $last_number_symbol_current_page = $_PSESSION['n_symbols_article'];
						       p_write_table_parameters_site('last_number_symbol_current_page',$last_number_symbol_current_page);
						}//if
						$first_number_symbol_current_page = $last_number_symbol_current_page - $length_page + 1;								  
					    if($first_number_symbol_current_page <= 0)
						{
						       $first_number_symbol_current_page = 0;
						}//if
                        else //$first_number_symbol_current_page > 0
                        {//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
						    $start = $first_number_symbol_current_page - $length_page;
							$length_str = $length_page;
							if($start < 0)
							{
							    $start = 0;
								$length_str = $first_number_symbol_current_page;
							}//if
						    $rab = substr($article_content,$start, $length_str);
							$start = search_pos($rab);
							$first_number_symbol_current_page = $first_number_symbol_current_page - $start;
							if($first_number_symbol_current_page < 0)
						    {$first_number_symbol_current_page = 0;}
                            $rab = stripos($article_content,' ',$last_number_symbol_current_page);
					        if($rab){$last_number_symbol_current_page = $rab;}
				            else 
				            {
					            $last_number_symbol_current_page = $_PSESSION['n_symbols_article'];
				            }//else
                        }//else						
						p_write_table_parameters_site('first_number_symbol_current_page',
							                              $first_number_symbol_current_page);
											  
					    if($first_number_symbol_current_page == 0)
					    {
						      $last_number_symbol_current_page = $first_number_symbol_current_page + $length_page;  
							  if($last_number_symbol_current_page > $_PSESSION['n_symbols_article'])
							  {
							       $last_number_symbol_current_page = $_PSESSION['n_symbols_article'];
							       p_write_table_parameters_site('last_number_symbol_current_page',
							                                     $last_number_symbol_current_page);
		                      }//if
							  else
							  {
							      p_write_table_parameters_site('last_number_symbol_current_page',
							                                 $last_number_symbol_current_page);	
							  }//else
					    }//if
					}//else
				}//if
		    }//if
			else //($search_term != '-1')
            if($search_term == '1') //1th page selected article
		    {	
			    $first_number_symbol_current_page = 0;
				p_write_table_parameters_site('first_number_symbol_current_page',$first_number_symbol_current_page);
				$last_number_symbol_current_page = $length_page;
				if($last_number_symbol_current_page > $_PSESSION['n_symbols_article'])
			    {
				    $last_number_symbol_current_page = $_PSESSION['n_symbols_article'];
				    p_write_table_parameters_site('last_number_symbol_current_page',
				                                   $last_number_symbol_current_page);
		        }//if
				else
				{
				    p_write_table_parameters_site('last_number_symbol_current_page',
				                                   $last_number_symbol_current_page);	
			    }//else
			}//if
			else //$search_term != -1,  1,  2
			{
				p_write_table_parameters_site('current_page_read',1);
				$first_number_symbol_current_page = 0;
				p_write_table_parameters_site('first_number_symbol_current_page',$first_number_symbol_current_page);
				$last_number_symbol_current_page = $_PSESSION['n_symbols_article'];
				p_write_table_parameters_site('last_number_symbol_current_page',$last_number_symbol_current_page);	
			}//else
		   
		    if($_PSESSION['n_symbols_article'] > 0)//there is content of article
		    {
		        $begin = $first_number_symbol_current_page;
                $end = $last_number_symbol_current_page - $begin;
		        html_site_php_library(5,0,0,0,0,0);//html code 
                $content_page = substr($article_content, $begin, $end);  
				html_site_php_library(6,$content_page,0,0,0,0);//html code   

		    }//if
	}//if	   
	   
?>