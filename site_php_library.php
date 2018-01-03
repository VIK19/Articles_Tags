<?php  //site_php_library.php - library of php-programs of this site
if (session_id() == "") session_start();
include 'read_table_parameters_site.php';
include_once './html/site_html_library.php';
global $_PSESSION, $conn;

include_once('connect.php');

function table_articles()// list of articles
{
    include 'read_table_parameters_site.php';
    global $_PSESSION, $conn;

	global $_PSESSION, $conn;
	$login_user2 = $_PSESSION['login_user'];
	$sql = "SELECT * FROM articles_table WHERE users_login=".$conn->quote($login_user2);
	$query = $conn->query($sql);
	$number_rows =  $query->rowCount();
	$query6 = $query;
    $current_page = $_PSESSION['current_page'];
	$max_rows_page = $_PSESSION['max_rows_page'];

    if($number_rows > $max_rows_page)
	{
	     $all_pages = ceil($number_rows/$max_rows_page);
		 p_write_table_parameters_site('all_pages', $all_pages);
    }
	else 
	{
	    $all_pages = 1;
		p_write_table_parameters_site('all_pages', '1');
	}

    if($current_page > $all_pages) {$current_page = $all_pages;}
    if($current_page < 1) {$current_page = 1;}

    if($number_rows > 0)//there are articles of this user
	{
         html_site_php_library(1,0,0,0,0,0);//html code - Caption of the table
         if($number_rows > $_PSESSION['max_rows_page']) {$number_rows_page = $_PSESSION['max_rows_page'];}
		 else {$number_rows_page = $number_rows;}
         $row_first = (($current_page - 1) * $max_rows_page) + 1;
		 $row_last = $current_page * $max_rows_page;
		 if($row_last > $number_rows) {$row_last = $number_rows;}

         if($row_first > 1)
		 for($i = 0; $i < $row_first-1; $i++)
		 {$data = $query6->fetch(PDO::FETCH_LAZY);}//if

		 $kk = 0;
		 $all_row_current_page = $row_last - $row_first + 1;//all rows in current page
		 p_write_table_parameters_site('all_row_current_page', $all_row_current_page);
		 for ($i = $row_first-1; $i < $row_last; $i++)//list of article
	     {
			       $kk = $kk + 1;
			       $data = $query6->fetch(PDO::FETCH_LAZY); 
		           $t_article_name = $data['article_name'];
				   $article_content = $data['article_content'];
			       $article_data = $data['article_data'];
  
				   //read tags of article
			       $t_article_tag = $data['article_id'];
				   $sql = "SELECT tag_id  FROM articles_tags_table 
	                          WHERE article_id=".$conn->quote($t_article_tag);
				   $query4 = $conn->query($sql);
				   $query2 = $query4;
				   $number_rows_tag =  $query4->rowCount();
                   $article_tags = '';	

                   if($number_rows_tag > 0)//there are tags
                   {				   
				        for ($k = 0; $k < $number_rows_tag; $k++)
	                    {
				            $data2 = $query2->fetch(PDO::FETCH_LAZY);
						    $article_tag_id = $data2['tag_id'];
						    //read tag
							$sql = "SELECT tag_name  FROM tags_table 
	                                  WHERE tag_id=".$conn->quote($article_tag_id)."  LIMIT 1";
							$query5 = $conn->query($sql);
							$query3 = $query5;
							$count_query5 =  $query4->rowCount();
                            if($count_query5 == 0) {echo 'Error: there is not any tag in tags_table';}
                            else
                            {
							    $data3 = $query3->fetch(PDO::FETCH_LAZY);
						        if($article_tags == '') {$article_tags = $data3['tag_name'];}
							    else $article_tags = $article_tags.' &nbsp; &nbsp; &nbsp;   '.$data3['tag_name'];
                            }//if						
				        }//for
				   }//if


				   // $rab - number row wtith selected tag on the curent page
				   if($_PSESSION['current_row_table'] != $kk)
				   {
                       html_site_php_library(2,$kk,$all_row_current_page,$t_article_name,$article_tags,$article_data);//html code 
				   }//if
				   else
				   {
				       html_site_php_library(3,$kk,$all_row_current_page,$t_article_name,$article_tags,$article_data);//html code 

				   }//else
		 }//for

		 html_site_php_library(4,$number_rows,0,0,0,0);//html code 

    }//if

    return '1';

}//function table_articles()

function p_write_table_parameters_site($name_par,$val_par)
{
    global $conn;
    try {
        $sql = "UPDATE  table_parameters_site SET "
    		   .$name_par."=".$conn->quote($val_par);

	   $stmt = $conn->prepare($sql);
       $stmt->execute();
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

}//function p_write_table_parameters_site($name_par,$val_par)


//===========================================================================================

function read_article($par1)  //reading curent page of the selected article
{    // ($par1 = '0') - reading without a tag, other = searching tag
           include_once './html/site_html_library.php'; //include html library
		   include 'read_table_parameters_site.php';
	       global $conn, $_PSESSION;

           $article_content = '';
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
		   
           $begin = (int)$_PSESSION['first_number_symbol_current_page'];
           $end = (int)$_PSESSION['last_number_symbol_current_page'] - $begin;

		   if($_PSESSION['n_symbols_article'] > 0)//there is content of article
		   {
		       html_site_php_library(5,0,0,0,0,0);//html code 
               $content_page = substr($article_content, $begin, $end);
				   
			   if($par1 == '0') //reading without a tag
			   {
			        html_site_php_library(6,$content_page,0,0,0,0);//html code 
			   }//if
			   else //reading with a tag in $par1
			   {
			        if(($_PSESSION['n_pos_tag_in_article'] > 0) && 
					   ($_PSESSION['n_pos_tag_in_article'] < $_PSESSION['last_number_symbol_current_page']) &&
					   ($_PSESSION['n_pos_tag_in_article'] > $_PSESSION['first_number_symbol_current_page']))
					{
					    $n_pos_tag_in_page = $_PSESSION['n_pos_tag_in_article'] - 
						                      $_PSESSION['first_number_symbol_current_page'];
			            $part1 = substr($content_page, 0, $n_pos_tag_in_page);
					    $part2 = (int)strlen($_PSESSION['current_tag_read']);
					    $rab = $n_pos_tag_in_page + $part2;
			            $part3 = substr($content_page, $rab);
						if(!$part3)
						{
						    $part1 = "";
						    $part3 = $content_page;
						}
						html_site_php_library(7,$part1,$part3,0,0,0);//html code

					}//if
					else
					{
			            html_site_php_library(6,$content_page,0,0,0,0);//html code 
			        }//if					 
			   }//if
		    }//if

		    return '1';
}//function read_article

//===========================================================================================	
function stripWhitespaces($string) //delete spaces and specsymbols
{
  if($string != '')
  {
      $rab = strip_tags($string);
      $rab = preg_replace('/([^\pL\pN\pP\pS\pZ])|([\xC2\xA0])/u', ' ', $string);
      $rab = str_replace('  ',' ', $string);
      $rab = trim($string);
	  $rab = htmlspecialchars($string);
  }//if
  return $string;  
}//function stripWhitespaces($string) 

function changespace($string) //changing ' ' for '^'
{
  if($string != '')
  {
      $rab = strip_tags($string);
	  $rab = trim($string);
	  $rab = str_replace('  ',' ', $string);
	  $rab = str_replace('  ',' ', $string);
	  $lenstr = strlen($string);
	  $pos = strripos($string, ' ');
	  while ($pos > 0)
	  {
	     $string = substr($string, 0, $pos - 1).'^'. substr($string, $pos + 1, $lenstr);
		 $pos = strripos($string, ' ');
	  }//while
  }//if
  return $string;  
}//function changespace($string)


	function pre($array)
    {
        echo '<pre>';
        print_r($array);
        echo "</pre>";
    }//function pre($array)
	
function search_pos($s1)
{ // search nearest symbol ' ' from end of string $s1
   $nom = strripos($s1,' '); //last position ' ' in $s1
   if(!$nom)
   {$nom = 0;}
   else {$nom = strlen($s1) - $nom;}
   return $nom;
}//function search_pos

?>
