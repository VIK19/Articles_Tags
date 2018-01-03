<?php  //search_page.php - searching first and next article and page with this tag
    if (session_id() == "") session_start();
	global  $conn, $_PSESSION;
    include_once ('connect.php');
    include_once './html/site_html_library.php'; 
	include 'read_table_parameters_site.php'; //read all parameters from table table_parameters_site into array $_PSESSION
    include_once 'site_php_library.php';

 	$ar_tags = $_PSESSION['ar_tags'];
	$all_pages = $_PSESSION['all_pages'];
	$flag = false; //there is not the tag in articles
	if($all_pages > 0)
	{
	       if(strrpos($ar_tags,'^^^'))
	       {
	           $array_ar_tags = explode('^^^',$ar_tags);
	       }//if
		   else {$array_ar_tags[0] = $ar_tags;}
           
		   
	       $login_user = $_PSESSION["login_user"];
	   
		   $search_tag = strip_tags(substr($_POST['search_term'],0, 100));

           $array_user_articles_tag = array();
		   if($search_tag != '^^^') // search tag in 1th article
		   {
			   $index_array_user_articles_tag = 0;
			   p_write_table_parameters_site('current_tag',$search_tag);
		   }//if
           else // go to next article with this tag  - $search_tag = '^^^' (or 1th tag in tag list)
		   {
		       $search_tag = $_PSESSION["current_tag"];
		       $index_array_user_articles_tag = $_PSESSION["index_array_user_articles_tag"] + 1;
			   $rab = strrpos($_PSESSION["array_user_articles_tag"],'^^^');
			   if($rab)
			   {$array_user_articles_tag = explode('^^^',$_PSESSION["array_user_articles_tag"]);}
			   else
			   {$array_user_articles_tag[0] = $_PSESSION["array_user_articles_tag"];}			   
			   if($index_array_user_articles_tag > count($array_user_articles_tag)-1)
			   {
			       $index_array_user_articles_tag = 0;
			   }//if
		   }//else

           p_write_table_parameters_site('index_array_user_articles_tag',$index_array_user_articles_tag);
		   
		   //defenition $array_user_articles - id of  all article of this user
		   $array_user_articles = array();//all article of this user
		   $sql = "SELECT article_id FROM articles_table WHERE 
      		          users_login=".$conn->quote($login_user);
		   $data = $conn->query($sql);
		   $members =  $data->rowCount();	
           if($members >0)	
           {	
               for($i=0; $i<$members; $i++)
               {			   
                   $data2 = $data->fetch(PDO::FETCH_LAZY);
		           $array_user_articles[count($array_user_articles)] = 
			                                    $data2['article_id'];
		       }//for
		   }//if

		   $search_tag = stripWhitespaces($search_tag);
		   //id of the selected tag
		   $sql = "SELECT tag_id FROM tags_table WHERE tag_name=".$conn->quote($search_tag);
		   $data = $conn->query($sql);
		   $n_id_tag =  $data->rowCount();

		   if($n_id_tag == 0) {echo '<br>Error: there is not any tag_id ';}
		   else //there is tag in DB 
		   {
		       $flag = true; //there is the tag in articles
		       $data2 = $data->fetch(PDO::FETCH_LAZY);
		       $search_id_tag = $data2['tag_id'];

               $array_article_id = array();
			   //article_id for the selected tag
			   $sql = "SELECT article_id FROM articles_tags_table WHERE 
      		          tag_id=".$conn->quote($search_id_tag);
			   $data = $conn->query($sql);
		       $members =  $data->rowCount();	

			   if($members >0)	//there are articles with this tag
               {
			       for($i=0; $i<$members; $i++)
                   {
				       $data2 = $data->fetch(PDO::FETCH_LAZY);
			           $array_article_id[count($array_article_id)] = $data2['article_id'];

			       }//for
                   if(count($array_article_id) > 0) //there is article for this tag
			       {
				       $expl_array_user_articles_tag = '';
			           for ($i = 0; $i < count($array_article_id); $i++)
	                   {
			                $sql = "SELECT article_id FROM articles_table WHERE  article_id="
					                 .$conn->quote($array_article_id[$i]).
								     "AND  users_login=".$conn->quote($login_user);
                            $data = $conn->query($sql);
		                    $members =  $data->rowCount();

					        if($members > 0)	
                            {			
					           $data2 = $data->fetch(PDO::FETCH_LAZY);
							   if(strlen($expl_array_user_articles_tag) > 0)
							   {
							       $expl_array_user_articles_tag = $expl_array_user_articles_tag.'^^^'.$data2['article_id'];   						   
							   }//if
							   else
							   {
							       $expl_array_user_articles_tag = $data2['article_id'];   						   
							   }//else
					        }//if
				        }//for
;						
					    p_write_table_parameters_site('array_user_articles_tag', $expl_array_user_articles_tag);
						if(strpos($expl_array_user_articles_tag, '^^^'))
						{$array_user_articles_tag = explode('^^^',$expl_array_user_articles_tag);}
						else {$array_user_articles_tag[0] = $expl_array_user_articles_tag;}
						if($index_array_user_articles_tag == 0)
						{
						    $current_article_tag = $array_user_articles_tag[0]; //curent article_id with this tag
						}//if
						else
						{
						    $current_article_tag = $array_user_articles_tag[$index_array_user_articles_tag]; //curent article_id with this tag
						}//else

				        //Definition of current_row_table - number article row in current page
				        //defenition page and row of article for the tag
				        for ($i = 0; $i < count($array_user_articles); $i++)
	                    {

				            if($array_user_articles[$i] == $current_article_tag)
					        {
							   $rab = ceil(($i+1)/$_PSESSION['max_rows_page']);
                               p_write_table_parameters_site('current_page',$rab);
					   
							   $rab = $i+1 - ($rab - 1)*$_PSESSION["max_rows_page"] ;
							   p_write_table_parameters_site('current_row_table',$rab);
							   
							   p_write_table_parameters_site('id_article_read',$array_user_articles[$i]);

						    }//if
				        }//for
			        }//if
			   }//if		   
		   }//else   
		   
           table_articles();//List of Articles
	   
		   if($flag){html_search_page(1);}
		   
    }//if
?>