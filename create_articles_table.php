<?php //Creating table articles_table
try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table

$sql = 'CREATE TABLE IF NOT EXISTS
articles_table
(
  article_id INT(11) AUTO_INCREMENT,
  article_name VARCHAR(100) NOT NULL UNIQUE,
  article_content MEDIUMTEXT NOT NULL,
  article_URL VARCHAR(200),
  article_data DATE NOT NULL,
  article_time TIME NOT NULL, 
  users_login VARCHAR(200),
  PRIMARY KEY  (article_id),
  FOREIGN KEY (users_login) REFERENCES users (users_login)
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

