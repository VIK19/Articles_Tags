<?php //save_new_tag.php - save new tag
    if (session_id() == "") session_start();
	global $_PSESSION, $conn;
	include_once 'connect.php';
    include 'read_table_parameters_site.php';
    include_once 'site_php_library.php';
    include_once './html/site_html_library.php';  

	$array_tags = array();
	$array_ar_tags = array();
	
	$newtag = $_GET['q'];
    $newtag = stripWhitespaces($newtag);
	$newtag  = changespace($newtag);
    $ar_tags_read = '';

    if(strlen($newtag) > 1) 
	{
        $sql = "SELECT tag_id  FROM tags_table WHERE tag_name =".$conn->quote($newtag);
		$data = $conn->query($sql);
        $members =  $data->rowCount();
		
	    if($members == 0) //tag was not found
        {	
           $ar_tags = $_PSESSION['ar_tags'];
		   $ar_tags = stripWhitespaces($ar_tags);
		   //add to array  and save in the table new tag
		   if(strlen($ar_tags) == 0) {$ar_tags = $newtag;}
		   else {$ar_tags = $ar_tags."^^^".$newtag;}
		   p_write_table_parameters_site('ar_tags', $ar_tags);
		   
		   $ar_tags_read = $_PSESSION['ar_tags_read'];
		   $ar_tags_read = stripWhitespaces($ar_tags_read);
		   //add to array  and save in the table new tag
		   if(strlen($ar_tags_read) == 0) {$ar_tags_read = $newtag;}
		   else {$ar_tags_read = $ar_tags_read."^^^".$newtag;}
		   p_write_table_parameters_site('ar_tags_read', $ar_tags_read);

		   try 
           {
               $sql = "INSERT INTO tags_table  (tag_name) VALUES 
	                   (".$conn->quote($newtag).")";
               $stmt = $conn->prepare($sql);
		       $stmt->execute();

           }
           catch(PDOException $e)
           {
               echo $sql . "<br>" . $e->getMessage();
           }	
		   
		   if(strrpos($ar_tags_read,'^^^'))
		   {
		      $array_ar_tags = explode('^^^',$ar_tags_read);
		   }
		   else 
		   {
		       if(strlen($ar_tags_read) > 0) {$array_ar_tags[0] = $ar_tags_read;}
	       }	  


		   html_save_new_tag(1, $array_ar_tags);
		}//if
        else //there is the tag in DB
        {
           html_save_new_tag(2, $array_ar_tags); 
        }//else		
        
    }//if
 

	 

?>