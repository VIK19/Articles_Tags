<?php  //adit_data_form_a.php - form for  article editing
	session_start();
	global $lan, $conn, $_PSESSION;
    include_once 'html/site_html_library.php';
    include_once 'connect.php';
	include_once 'site_php_library.php';
	include 'read_table_parameters_site.php'; //read all parameters from table table_parameters_site into array $_PSESSION	


	$lan_not_Name_Article = $lan["not_Name_Article"];
	$ar_new_tags = array();
	$array_ar_tags = array();
	$current_article_id = $_PSESSION['id_article_read'];

	$ar_tags_read = $_PSESSION['ar_tags_read'];
	if(strlen($ar_tags_read) > 0)
	{
	    if(strrpos($ar_tags_read,'^^^'))
		{
		    $array_ar_tags = explode('^^^',$ar_tags_read);
		    $tag_name_fist = $array_ar_tags[0];
		}
		else 
		{
		    $array_ar_tags[0] = $ar_tags_read;
		    $tag_name_fist = $ar_tags_read;
	    }
    }//if

	
	$k = 0;
	for ($i = 0; $i < count($array_ar_tags); $i++) //array of tag_name
	{
	  if($array_ar_tags[$i] != '')
	  {
	    $ar_new_tags[$k] = $array_ar_tags[$i];
		$k++;	
	  }//if
	}//for

	//Check data form
	$php_Name_article = $_GET['p_Name_article'];
	$rab = stripWhitespaces($php_Name_article);	

	$rab = htmlspecialchars($php_Name_article);		
	$p_content_form_article = $_GET['p_text_form_article'];

	$p_button_URL_adress = '';
	$p_button_URL_adress =  $_GET['p_button_URL_adress'];

	//check URL_adress
	$p_button_URL_adress = trim($p_button_URL_adress);
	if($p_button_URL_adress != '')
	{
	  $p_button_URL_adress = htmlspecialchars($p_button_URL_adress);
	}//if
	$login_user = $_PSESSION['login_user'];
	$flag_form = false;
	$flag2 = false;
	$flag3 = false;
	$p_tags_form_article = array();
	if($p_button_URL_adress != '') //there is URL_adress 
	{	  
        //name of Article from site
		$php_Name_article = Name_Article_URL_adress($p_button_URL_adress);
	    $php_Name_article = htmlspecialchars($php_Name_article);

		//content from site
		$p_content_form_article = Content_Article_URL_adress($p_button_URL_adress);

		if($p_content_form_article != '')
		{
		    $p_content_form_article = trim($p_content_form_article);
	        $p_content_form_article = htmlspecialchars($p_content_form_article);

		//array of tags from site
            $p_tags_form_article = Tags_Article_URL_adress($php_Name_article);
			$flag_form = true;
		}//if
		else //there is error: no content
		{
		    $flag_form = false;
			html_edit_data_form_a(1,0,0);
		}//else
	}//if
	else //no any URL-adress
	{
	    if($php_Name_article == '') //no any name of Article
	    {
		    html_edit_data_form_a(2,$lan_not_Name_Article,0);
	    }//if
	    else //there is name of Article
	    {
	        $p_content_form_article = trim($p_content_form_article);
	        $p_content_form_article = htmlspecialchars($p_content_form_article);

			//check - is there name in DB ?
			$flag_name = false;
			$sql = "SELECT COUNT(article_id) FROM articles_table WHERE 
				   article_name=".$conn->quote($php_Name_article);
	        $data = $conn->query($sql);
            $members =  $data->rowCount();
	        if($members > 0) //there is this article name in DB
	        {
			    while($data2 = $data->fetch(PDO::FETCH_LAZY))
			    {
			        if((count($data2) > 0) and ($current_article_id != $data2['article_id']))
				    {$flag_name = true;}// there is the article with this name and another article_id			
			    }//while
            }//if				
            if(!$flag_name)//there is  this name in DB with anothe id = $current_article_id 
			{
			    html_edit_data_form_a(3,0,0);
			}//if			
	        if($p_content_form_article == '') // no content of the Article
	        {
			   html_edit_data_form_a(4,0,0);
	        }//if
	        else //There are Name and Content of new Article
	        {   
	            $flag_form = true;
				//form array of tags
				$k = 0;
	            for ($i = 0; $i < count($ar_new_tags); $i++)
	            {
	                if($ar_new_tags[$i] != '')
	                {
	                    $p_tags_form_article[$k] = $ar_new_tags[$i];
		                $k++;
	                }//if
	            }//for
	        }//else
	    }//else
	}//else
	if($flag_form and $flag_name)//there are all data in form - write into DB
	{ 

	    try // UPDATE article parameters
        { 	
		    $data_reg2 = date("d.m.Y");
            $time_reg2 = date("H:i:s"); //format is: 13:45:32
		    $data_reg2 = stripWhitespaces($data_reg2);
		    $time_reg2 = stripWhitespaces($time_reg2);
		    $data_reg2 = $data_reg2.' '. $time_reg2;				
	        $sql = "UPDATE articles_table SET article_name=" . $conn->quote($php_Name_article). 
		           ", article_content=" . $conn->quote($p_content_form_article).
				   ", article_URL=" . $conn->quote($p_button_URL_adress).
				  ", article_data=" . $conn->quote($data_reg2) .
		          " WHERE article_id=" . $conn->quote($current_article_id);
 
			$stmt = $conn->prepare($sql);
            $stmt->execute();

		}//try
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }//catch		  
				  
		 //add new tags
		if(count($ar_new_tags) > 0)
		{
		    for ($kk = 0; $kk < count($ar_new_tags); $kk++)
	        {
			    $tagname = $ar_new_tags[$kk];				
		        if(strlen(($tagname)) > 1) 
	            {	
					$sql = "SELECT tag_id  FROM tags_table WHERE tag_name = ".$conn->quote($tagname);
					$data = $conn->query($sql);
                    $number_rows_tag =  $data->rowCount();
					if($number_rows_tag == 0) //there is not this tagname in DB
					{
                        $query2 = $data->fetch(PDO::FETCH_LAZY);
						try 
                        {
						    $query = "INSERT INTO tags_table(tag_name) VALUES (" . $conn->quote($tagname) . ")";
						    $stmt = $conn->prepare($sql);
		                    $stmt->execute();
                        }//try
                        catch(PDOException $e)
                        {
                            echo $sql . "<br>" . $e->getMessage();
                        }//catch
					}//if
					
					$sql = "SELECT tag_id  FROM tags_table WHERE tag_name = " . "'" . $tagname . "'";
					$query2 = $conn->query($sql);
                    $number_rows_tag =  $query2->rowCount();
					if($number_rows_tag > 0) //there ir the tag with this tagname
					{
					    $query = $query2->fetch(PDO::FETCH_LAZY);
						$tagid = $query['tag_id'];
					
					    $sql = "SELECT article_id  FROM articles_tags_table WHERE tag_id = " . "'" . $tagid . "'";
					    $query3 = $conn->query($sql);
                        $number =  $query3->rowCount();
					    if($number == 0) //there is not the tag with this article
					    {
 					        try 
                            {
							    $sql = "INSERT INTO articles_tags_table(article_id, tag_id) 
						                VALUES ('" . $current_article_id . "', '" . $tagid . "')";
		                        $stmt = $conn->prepare($sql);
		                        $stmt->execute();
							}//try
                            catch(PDOException $e)
                            {
                                echo $sql . "<br>" . $e->getMessage();
                            }//catch
						}//if
					}//if
                }//if
		    }//for
		}//if

		 //Hide Article form and  rewrite articles table
         html_edit_data_form_a(5,0,0);
	}//if
	
	function Tags_Article_URL_adress($Name_Article) //read tags from Name of Article (without URL-adress)
	{
	  if($Name_Article != '')
	  {
	    $tags_array = array();
	    $tags_array = explode(" ", $Name_Article);
		$new_tags_array = array();
		//check unique of tegs
		for ($i = 0; $i < count($tags_array); $i++)
	    {
		  $query = mysql_query("SELECT COUNT(tag_id) FROM tags_table WHERE tag_name='".mysql_real_escape_string($tags_array[$i])."'")or die ("<br>Invalid query: " . mysql_error()); 
          if(mysql_result($query, 0) == 0) //there is not this tag in DB
          { 
		    $new_tag = $tags_array[$i];
            $new_tag = trim($new_tag);
            $new_tag = htmlspecialchars($new_tag);
            $new_tags_array[count($new_tags_array)] =  $new_tag;
          } 
		}//for
		return $new_tags_array;
      }//if
	  else return false;
	}//function Tags_Article_URL_adress
	
	function Name_Article_URL_adress($URLadress) //read Name from url-adress
	{
	  if($URLadress != '')
	  {
	      $pos_slash = strripos($URLadress, '/');
	      $Name_Article = '';
	      if($pos_slash > 0)
	      {
	           $Name_Article = substr($URLadress,$pos_slash,strlen($URLadress));
	      }//if
	      else
	      {
	          $Name_Article = $URLadress;
	      }//else
          return $Name_Article;
	  }//if
	  else
      {
  	      echo 'Error in function Name_Article_URL_adress';
		  return false;		
	  }//else	  
    }//function Name_Article_URL_adress
	
    function Content_Article_URL_adress($URLadress) //read content from url-adress
	{
	  $e='';
	  if($URLadress != '')
	  {
	    $content_URL_article1 = '';
		$exc = 1;
		if (!file_exists(urlencode($URLadress)))
		{
		   $content_URL_adress1 = '';
		}//if
		else
		{
		    $content_URL_adress1 = @file_get_contents(urlencode($URLadress));
		}//else

		if($content_URL_adress1 != '') 
		{
		    $len_URLadress = strlen($URLadress);
		     $content_URL_article2 = substr($content_URLadress1,$len_URLadress);
		     if($content_URL_article2 == '')
		     {
		          $content_URL_article2 = substr($content_URLadress1,0);
		     }//if
		     $content_URL_article1 = $content_URL_article2;
		}//if

		return $content_URL_adress1;
	  }//if
	  else
      {
  	    echo 'Error in function Content_Article_URL_adress';
		return false;		
	  }//else
    }//function Content_Article_URL_adress

?>