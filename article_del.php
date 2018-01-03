<?php  //article_del.php - delete article
if (session_id() == "") session_start();
global  $conn,$_PSESSION;
include_once ('connect.php');
include 'read_table_parameters_site.php'; //read all parameters from table table_parameters_site into array $_PSESSION

$all_pages = $_PSESSION['all_pages'];
if($all_pages > 0)
{		   
    $current_article_id = $_PSESSION['id_article_read'];

	try 
    {
         $query = "DELETE FROM articles_tags_table WHERE article_id=".$conn->quote($current_article_id);
         $stmt = $conn->prepare($query);
		 $stmt->execute();
    }
    catch(PDOException $e)
    {
       echo $query . "<br>" . $e->getMessage();
    }

    try 
    {
         $query = "DELETE FROM articles_table WHERE article_id=".$conn->quote($current_article_id);
         $stmt = $conn->prepare($query);
		 $stmt->execute();
    }
    catch(PDOException $e)
    {
       echo $query . "<br>" . $e->getMessage();
    }
}//if
?>