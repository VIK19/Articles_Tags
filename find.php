<?php
session_start();
	# Подключаем конфиг
    include 'config.php';
    $dbname = $_SESSION['dbname'];
    $link = $_SESSION['link'];	
  
//echo 'find 1';

$term = strip_tags(substr($_POST['search_term'],0, 100));
$term = mysql_escape_string($term);

$sql = "select article_name ,article_content  
from articles_table
where article_name like '%$term%'
or article_content  like '%$term%'
order by article_name asc";

$result = mysql_query($sql);
$string = '';

if (mysql_num_rows($result) > 0){
  while($row = mysql_fetch_object($result)){
    $string .= "<b>".$row->article_name."</b> - ";
    $string .= $row->article_content."</a>";
    $string .= "<br/>\n";
  }

}else{
  $string = "No matches!";
} 

echo $string;
?>