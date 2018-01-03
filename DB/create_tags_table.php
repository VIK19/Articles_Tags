<?php //Creating table tags_table
session_start();
include('../connect.php');

try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
$sql = 'CREATE TABLE IF NOT EXISTS
tags_table
(
  tag_id INT(11)  AUTO_INCREMENT,
  tag_name VARCHAR(30) NOT NULL UNIQUE,
  PRIMARY KEY  (tag_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1; 
';

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table MyGuests created successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
?> 