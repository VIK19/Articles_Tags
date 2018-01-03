<?php //create_users_table.php - CREATE TABLE  users

session_start();

include('connect.php');


try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'CREATE TABLE IF NOT EXISTS
users
(
  users_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  users_login VARCHAR(30) NOT NULL UNIQUE,
  users_password VARCHAR(32) NOT NULL,
  users_hash VARCHAR(32) NOT NULL,
  users_email VARCHAR(30)  NOT NULL UNIQUE,    
  users_region VARCHAR(30)  NULL,
  users_data DATE NOT NULL,
  users_time TIME NOT NULL, 
  users_status BIT NOT NULL,
  PRIMARY KEY  (users_id)
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

$conn = null;

?> 

