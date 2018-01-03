<?php  // all_pages.php  -  calculation all articles pages
    if (session_id() == "") session_start();
	global $_PSESSION, $conn;
    include_once 'site_php_library.php';	
    include 'read_table_parameters_site.php';
    include_once './html/site_html_library.php';

    $login_user2 = $_PSESSION['login_user'];
    $sql = "SELECT article_id, article_name, article_content, article_data  FROM articles_table
	        WHERE users_login=".$conn->quote($login_user2);
    $data = $conn->query($sql);
	$number_rows =  $data->rowCount();

    if($number_rows > $_PSESSION['max_rows_page'])
	{
	     $all_pages = ceil($number_rows/$_PSESSION['max_rows_page']);
	     p_write_table_parameters_site('all_pages', $all_pages);
	}//if
	else 
	{
             if($number_rows > 0)
             {
	          $all_pages = 1;
	          p_write_table_parameters_site('all_pages', '1');
             }
             else
             {
	          $all_pages = 0;
	          p_write_table_parameters_site('all_pages', '0');
             }//else
	}//else 
	p_write_table_parameters_site('current_page', '0');
    
    //Form list of tags for this user
	$ar_tags = '';
	$tag_name_fist = '';

	for ($i = 0; $i < $number_rows; $i++)//list of article
	{
	    $data2 = $data->fetch(PDO::FETCH_LAZY); 
        $article_id = $data2['article_id'];	
        $sql = "SELECT tag_id  FROM articles_tags_table
	            WHERE article_id=".$conn->quote($article_id);
        $data3 = $conn->query($sql);
	    $number_rows3 =  $data3->rowCount();
		
        if($number_rows3 > 0) 
        {
            for ($k = 0; $k < $number_rows3; $k++)//list of tags for this article
	        { 
		        $data4 = $data3->fetch(PDO::FETCH_LAZY); 
                $tag_id = $data4['tag_id'];
                $sql2 = "SELECT tag_name  FROM tags_table
	                     WHERE tag_id=".$conn->quote($tag_id);
                $data5 = $conn->query($sql2);
	            $number_rows5 =  $data5->rowCount();
				if($number_rows5 > 0) 
                {
				    $data5 = $data5->fetch(PDO::FETCH_LAZY); 
					$tag_name = $data5['tag_name'];	
					$rab = strrpos($ar_tags,$tag_name);
					if($rab === false)
					{
					    if(strlen($ar_tags) == 0) {$ar_tags = $tag_name;}
					    else {$ar_tags = $ar_tags."^^^".$tag_name;}
					}//if
				}//if
		    }//for
        }//if		
	}//for
    if(strlen($ar_tags) > 0)
	{
	    if(strrpos($ar_tags,'^^^'))
		{
		    $array_ar_tags = explode('^^^',$ar_tags);
		    $tag_name_fist = $array_ar_tags[0];
		}
		else {$tag_name_fist = $ar_tags;}
    }//if

    if($tag_name_fist != ""){p_write_table_parameters_site('current_tag', $tag_name_fist);} //current tag of this user
	else {p_write_table_parameters_site('current_tag', '^^^');}
	p_write_table_parameters_site('ar_tags', $ar_tags); //All tags of this user
	p_write_table_parameters_site('login_user', $login_user2); //User login
	p_write_table_parameters_site('array_user_articles_tag', ''); //array of user articles for the selected tag
	p_write_table_parameters_site('current_page', 0);
	p_write_table_parameters_site('current_tag_read', '^^^');
	p_write_table_parameters_site('current_row_table', '');
		
	html_all_pages(1,$all_pages,$ar_tags);	
	
?>
