<?php  // button_article_edit.php - form for editing selected article

if (session_id() == "") session_start();
global $lan, $conn, $_PSESSION;
include_once './html/site_html_library.php';
include_once 'connect.php';
include_once 'site_php_library.php';
include 'read_table_parameters_site.php'; //read all parameters from table table_parameters_site into array $_PSESSION

$all_pages = $_PSESSION['all_pages'];
if($all_pages > 0)
{	
	$current_page = $_PSESSION['current_page'];
	$max_rows_page = $_PSESSION['max_rows_page'];
	$array_ar_tags_read = array();
	
    //finding article_id for reading (for this user)		   
	$login_user2 = $_PSESSION['login_user'];
	$sql = "SELECT article_id, article_name, article_content, article_data FROM articles_table". 
	                      " WHERE users_login=".$conn->quote($login_user2);
	$data3 = $conn->query($sql);
    $number_rows =  $data3->rowCount();

	if($number_rows > 0) //Login was found
	{
        $n_row_article = (($current_page - 1) * $max_rows_page) + $_PSESSION["current_row_table"] - 1;

		for($i = 0; $i < $number_rows; $i++)
		{
		    $article_name = '';
		    $data = $data3->fetch(PDO::FETCH_LAZY);
		    if($i == $n_row_article)
			{
	            $article_name = $data['article_name'];
			    p_write_table_parameters_site('t_article_name',$article_name);// article name for reading

			    //reading content of the selected article
		        $id_article_read = $data['article_id'];
		        $sql = "SELECT  article_content FROM articles_table 
		                WHERE article_id=".$conn->quote($id_article_read);
		        $data4 = $conn->query($sql);
		        $members =  $data4->rowCount();
		        if($members > 0)//there are articles of this article_id
		        {
                   $data2 = $data4->fetch(PDO::FETCH_LAZY);
			       $article_content = $data2["article_content"];
		        }//if

				//symbols number of all content of the article
				$rab = strlen($article_content);
	            p_write_table_parameters_site('n_symbols_article',$rab);
				p_write_table_parameters_site('id_article_read',$id_article_read);
				p_write_table_parameters_site('article_data_time',$data['article_data']);
				p_write_table_parameters_site('current_tag_read','^^^');
				p_write_table_parameters_site('article_URL',$data['article_URL']);

			    //definition page number of the article
				$rab = ceil($_PSESSION['n_symbols_article']/$_PSESSION['n_symbols_in_row']/
				            $_PSESSION['max_rows_page_read']);
				p_write_table_parameters_site('n_symbols_article',$rab);				    					   
	
	            $ar_tags_read = $_PSESSION['ar_tags_read'];
	            if(strlen($ar_tags_read) > 0)
	            {
	                if(strrpos($ar_tags_read,'^^^'))
		            {
		                $array_ar_tags_read = explode('^^^',$ar_tags_read);
		                $tag_name_fist = $array_ar_tags_read[0];
		            }
		            else 
					{
					    $tag_name_fist = $ar_tags_read;
						$array_ar_tags_read[0] = $ar_tags_read;
				    }//else
                }//if
			}//if
		}//for
		
        html_button_article_edit(1,$article_name,$article_content,$array_ar_tags_read);	
		
    }//if	

}//if
?>
