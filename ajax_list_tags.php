<?php //ajax_list_tags.php - creating article tags list
	if (session_id() == "") session_start();
	global  $lan, $conn;
    $lan = $_SESSION['lan'];
    include_once ('connect.php');
	include_once './html/site_html_library.php';  
	include 'read_table_parameters_site.php'; //read all parameters from table table_parameters_site into array $_PSESSION
    include_once 'site_php_library.php';

	$all_pages = $_PSESSION['all_pages'];
	if($all_pages > 0)
	{
	    $number_rows_tag = array(); //all id of all user tag
	    $login_user = $_PSESSION['login_user'];
	    //select all articles of the user
	    $sql = "SELECT article_id  FROM articles_table WHERE users_login =".$conn->quote($login_user);
	    $data = $conn->query($sql);
        $members =  $data->rowCount();

	    if($members > 0) //there are articles of the user
	    {
	        for ($i = 0; $i < $members; $i++)
	        {
	            $data2 = $data->fetch(PDO::FETCH_LAZY);
	            $data_article_id = $data2["article_id"];
	            $data_article_id = stripWhitespaces($data_article_id);
			    //select all tags of the user
		        $sql = "SELECT tag_id  FROM articles_tags_table WHERE article_id =".$conn->quote($data_article_id);
		        $data3 = $conn->query($sql);
			    $members3 =  $data3->rowCount();
			    if($members3 > 0) //there are tags of the article
			    {
			        for ($k = 0; $k < $members3; $k++)
	                {
		                $data4 = $data3->fetch(PDO::FETCH_LAZY);
					    $flag_tag = true;
		                for ($j = 0; $j < count($number_rows_tag); $j++)
	                    {
			                if($number_rows_tag[$j] == $data4["tag_id"]) {$flag_tag = false;}
			            }//for
		                if($flag_tag) 
			            {
			                $number_rows_tag[count($number_rows_tag)] = $data4["tag_id"];
			            }//if
		            }//for
			    }//if
	        }//for
	    }//if
	
        if(count($number_rows_tag) > 0)//there are tags
        {	
	        html_ajax_list_tags(1,$number_rows_tag); //html code for  ajax_list_tags.php
	    }//if
	}//if

?>