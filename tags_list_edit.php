<?php //tags_list_edit.php - creating article tags list for reading selected article
	session_start();
//$file = 'Debugging.txt';
//$current = file_get_contents($file);
	
    //changing language
    include 'language.php';
	
	# include DB in config.php
    include 'connect.php';
	
	# include my php-lib
    include 'site_php_library.php';

	$number_rows_tag = array(); //id_tags array for selected article
//	$login_user = $_SESSION['login_user'];
//	$query = "SELECT article_id  FROM articles_table WHERE users_login ="."'".$login_user."'";
//	$data = mysql_query($query);
//	while($data2 = mysql_fetch_assoc($data))
//	{
	    $data_article_id = $_SESSION['id_article_read'];
	    $data_article_id = stripWhitespaces($data_article_id);
 	    $data_article_id = mysql_real_escape_string($data_article_id);
//$current .= '   ajax_list_tags_read.php:  data_article_id  = '.$data_article_id;
//file_put_contents($file, $current);		
		$query2 = "SELECT tag_id  FROM articles_tags_table WHERE article_id ="."'".$data_article_id."'";
		$data3 = mysql_query($query2);
	
		while($data4 = mysql_fetch_assoc($data3))
	    {
		     $flag_tag = true;
		     for ($k = 0; $k < count($number_rows_tag); $k++)
	         {

//$current .= '   1:  $number_rows_tag[k]  = '.$number_rows_tag[$k];
//file_put_contents($file, $current);	
//$current .= '   11:  $data4["tag_id"] = '.$data4["tag_id"];
//file_put_contents($file, $current);	
			     if($number_rows_tag[$k] == $data4["tag_id"]) {$flag_tag = false;}
			 }//for
		     if($flag_tag) 
			 {
			     $number_rows_tag[count($number_rows_tag)] = $data4["tag_id"];
//$current .= '   2:  count($number_rows_tag) = '.count($number_rows_tag);
//file_put_contents($file, $current);					 
//$current .= '   3:  number_rows_tag = '.$data4["tag_id"];
//file_put_contents($file, $current);	
			 }//if
		}//wile
		
//	}//while
	
//for ($k = 0; $k < count($number_rows_tag); $k++)
//{
//$current .= '   list_tags_article.php:  number_rows_tag = '.$number_rows_tag[$k];
//file_put_contents($file, $current);				 			 
//}//for
	
    $str1 = $lan["Tags"].':
			  <br />
			  '.$lan["Add_Tag"].':
			  <input id="Name_tag_auto" type="text" name="Name_tag" value="" size="30"   />
			  <input id="button_tag_add" type="button" name="tag_add" size="20" value="'.$lan["Save"].'" onClick="save_tag()" />
			  <br />
			  '.$lan["Select_Tag"].'
			  <select name="select_flag">
		   ';

	$str2 = '';	   
    if(count($number_rows_tag) > 0)//there are tags
    {	
		for ($k = 0; $k < count($number_rows_tag); $k++)
	    {
		    $query = "SELECT  tag_name FROM tags_table WHERE tag_id="."'".$number_rows_tag[$k]."'"." ORDER BY tag_name";
	        $query2 = mysql_query($query);
			$data2 = mysql_fetch_assoc($query2);
			$article_tag_name = $data2['tag_name'];
//$current .= '   list_tags_article_read.php:  article_tag_name = '.$article_tag_name;
//file_put_contents($file, $current);				
            $str2 = $str2.'<option  value='.$article_tag_name.'>'.$article_tag_name.'</option>';
		}//for
		
	    $str3 = 
		  '  </select>
	         <input id="button_tag_edit" type="button" name="tag_edit" size="20" value="'.$lan["Edit"].'" onClick="edit_tag()" />
			 <input id="button_del_tag" type="button" name="name_del_tag" size="20" value="'.$lan["Delete"].'" onClick="del_tag()" />			 
			 <br />
		  ';
	    echo $str1.$str2.$str3;
	}//if

?>