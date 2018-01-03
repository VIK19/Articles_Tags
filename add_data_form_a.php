<?php  //add_data_form_a.php - Save form for new article
	if (session_id() == "") session_start();
	global  $lan, $conn,$_PSESSION;
    $lan = $_SESSION['lan'];
    include_once ('connect.php');
	include_once './html/site_html_library.php';  
	include 'read_table_parameters_site.php'; //read all parameters from table table_parameters_site into array $_PSESSION
    include_once 'site_php_library.php';
      
	//Check data form
	$php_Name_article = $_GET['p_Name_article'];
	$php_Name_article = stripWhitespaces($php_Name_article);	
	$php_Name_article = htmlspecialchars($php_Name_article);
	$p_content_form_article = $_GET['p_text_form_article'];
	$p_button_URL_adress = '';
	$p_button_URL_adress =  $_GET['p_button_URL_adress'];
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
            $p_tags_form_article = Tags_Article_URL_adress($php_Name_article);
			$flag_form = true;
		}//if
		else //there is error: site was not found
		{
		    $flag_form = false;
			html_add_data_form_a(1);//html code
		}//else
	}//if

	else //no any URL-adress
	{
	    if($php_Name_article == '') //no any name of Article
	    {
		    html_add_data_form_a(2);//html code
	    }//if
	    else //there is name of Article
	    {
	        $p_content_form_article = trim($p_content_form_article);
	        $p_content_form_article = htmlspecialchars($p_content_form_article);
			//check - is there name in DB ?
			$sql = "SELECT article_id FROM articles_table WHERE 
				   article_name=".$conn->quote($php_Name_article);
			$result = $conn->query($sql);
			$result->fetch(PDO::FETCH_LAZY);
            if((count($result) > 0) && ($result->fetch(PDO::FETCH_LAZY)->article_id > 0)) //there is  this name in DB
            { // 
			    html_add_data_form_a(3);//html code
				$flag_name = false;
			}//if
			else $flag_name = true;
	        if($p_content_form_article == '') // no content of the Article
	        {//no content of Article
			    html_add_data_form_a(4);//html code
	        }//if
	        else //There are Name and Content of new Article
	        {   
	            $flag_form = true;
				//form array of tags
			    $ar_tags = $_PSESSION['ar_tags'];
			    $ar_new_tags = explode('^^^',$ar_tags);
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
 		 //adding new tags
		 if(count($p_tags_form_article) > 0)//there are new tags
		 {
		     $flag2 = true;
		     for ($i = 0; $i < count($p_tags_form_article); $i++)
	         {
			     $new_tag = $p_tags_form_article[$i];
				 $new_tag = stripWhitespaces($new_tag);
				 $sql = "SELECT COUNT(tag_id) FROM tags_table WHERE 
				   tag_name=".$conn->quote($new_tag);
		         $data = $conn->query($sql);
				 $members =  $data->rowCount();
                 if($members == 0) //there is not this tag in DB
                 { // add new tag into tags_table
					if($new_tag != '')
					{
						try 
                        {
                            $sql = "INSERT INTO tags_table  (tag_name) VALUES 
                                    (".$conn->quote($new_tag).")";
						    $stmt = $conn->prepare($sql);
						    $stmt->execute();
                        }
                        catch(PDOException $e)
                        {
                            echo $sql . "<br>" . $e->getMessage();
                        }						
					}//if
		         }//if
		     }//for
		 }//if
		 //adding new Article
         $data_reg2 = date('Y-m-d H:i:s');
 		 $php_Name_article = stripWhitespaces($php_Name_article);
		 $sql = "SELECT article_id FROM articles_table 
		                       WHERE article_name=".$conn->quote($php_Name_article);
         $data = $conn->query($sql);
         $members =  $data->rowCount();
	     if($members == 0) //php_Name_article was not found
	     {
			 $p_content_form_article = stripWhitespaces($p_content_form_article);
			 $p_button_URL_adress = stripWhitespaces($p_button_URL_adress);
			 $data_reg2 = stripWhitespaces($data_reg2);
			 $login_user= stripWhitespaces($login_user);
			 if($php_Name_article != '')
			 {
			    try 
                {
			        $sql = "INSERT INTO articles_table  
			             (article_name, article_content, article_URL, article_data, users_login) 
						 VALUES (".$conn->quote($php_Name_article).", ".$conn->quote($p_content_form_article).", ".
						 $conn->quote($p_button_URL_adress).", ".$conn->quote($data_reg2).", ". 
						 $conn->quote($login_user).")";
					$stmt = $conn->prepare($sql);
                    $stmt->execute();
					$flag3 = true;
                }
                catch(PDOException $e)
                {
                    echo $sql . "<br>" . $e->getMessage();
                }		
			 }//if

		 }//if 

		 //creating articles_tags_table
		 if($flag2 and $flag3) //there are writing into DB for tags_table and articles_table
		 {
		     $sql = "SELECT article_id  FROM articles_table WHERE article_name ="
			        .$conn->quote($php_Name_article)."  LIMIT 1";
             $data = $conn->query($sql); 
			 $members =  $data->rowCount();
			 
			 if($members == 0) {echo 'Error in selecting from articles_table';}
			 else
             {			   
				 $data = $data->fetch(PDO::FETCH_LAZY);
				 $data_article_id = $data["article_id"];
			 }//else

		     for ($i = 0; $i < count($p_tags_form_article); $i++)
	         {		
				 $new_tag = $p_tags_form_article[$i];
				 $new_tag = stripWhitespaces($new_tag);
				 $sql = "SELECT tag_id FROM tags_table WHERE tag_name = ".$conn->quote($new_tag)."  LIMIT 1";
				 $data = $conn->query($sql);
				 $members =  $data->rowCount();
				 if($members == 0) {echo 'Error in selecting from tags_table';}
				 $data = $data->fetch(PDO::FETCH_LAZY);
                 $new_tag_id = $data['tag_id'];

                 if(($data_article_id != '') and ($new_tag_id != ''))
                 {				 
				    try 
                    {
					    $sql = "INSERT INTO articles_tags_table
			                    (article_id, tag_id) 
							    VALUES (".$conn->quote($data_article_id).", ".$conn->quote($new_tag_id).")";
					    $add_tag = $conn->prepare($sql);
					    $add_tag->execute();



					}
                    catch(PDOException $e)
                    {
                        echo $sql . "<br>" . $e->getMessage();
                    }	
				 }//if
			 }//for
			 
			 p_write_table_parameters_site('ar_tags', '');
		 }//if       

		 //Hide Article form
		 html_add_data_form_a(5); //html code
         
		 //rewrite articles table
         table_articles();

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
		  $sql = "SELECT COUNT(tag_id) FROM tags_table WHERE tag_name=".$conn->quote($tags_array[$i]);
		  $query = $conn->query($sql);
          if(count($query) == 0) //there is not this tag in DB
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