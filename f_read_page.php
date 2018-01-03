<?php  //f_read_page.php - imaging selected article in list of articles
           if (session_id() == "") session_start();
	       global  $conn, $_PSESSION;
           include_once ('connect.php');
	       include_once './html/site_html_library.php'; 
	       include 'read_table_parameters_site.php'; //read all parameters from table table_parameters_site into array $_PSESSION
           include_once 'site_php_library.php';   
		   
		   //number_select_row_table (on current page, calculating all rows of articles)
		   $current_row_table = strip_tags(substr($_POST['search_term'],0, 100));
		   p_write_table_parameters_site('current_row_table', $current_row_table);

		   $current_page = $_PSESSION["current_page"] ;
	   
		   //finding article_id for reading		   
		   $login_user2 = $_PSESSION['login_user'];
		   
		   $sql = "SELECT article_id, article_name, article_content, article_data
  		           FROM articles_table WHERE users_login=".$conn->quote($login_user2);
		   $data = $conn->query($sql);
		   $members =  $data->rowCount();
			   
		   if($members > 0)//there are articles of this user
		   {
                $n_row_article = (($current_page - 1) * $_PSESSION['max_rows_page']) + $current_row_table - 1;	   		   
 
		        for($i = 0; $i < $members; $i++)
		        {
				    $data2 = $data->fetch(PDO::FETCH_LAZY);
		            if($i == $n_row_article) //FOR SELECTED ARTICLE
			        {				 			   
					   $n_symbols_article = strlen($data2["article_content"]);
					   p_write_table_parameters_site('n_symbols_article',$n_symbols_article);//symbols number of all content of the article 
					   p_write_table_parameters_site('id_article_read',$data2['article_id']);
					   p_write_table_parameters_site('article_data_time',$data2['article_data']);	  
			        }//if
		        }//for
			    html_f_read_page(1);
		   }//if
		   
           table_articles();//List of Articles
		   
?>