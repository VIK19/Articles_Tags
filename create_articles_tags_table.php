<?php //Creating table articles_tags_table
session_start();
include('connect.php');

try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
$sql = 'CREATE TABLE IF NOT EXISTS
articles_tags_table
(
  articles_tags_id INT(11)  AUTO_INCREMENT,
  article_id INT(11) NOT NULL,
  tag_id INT(11) NOT NULL,
  PRIMARY KEY  (articles_tags_id),
  FOREIGN KEY (article_id) REFERENCES articles_table (article_id),
  FOREIGN KEY (tag_id) REFERENCES tags_table (tag_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1; 
';
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table articles_tags_table created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

?> 