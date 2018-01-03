<?php
$link = mysql_connect('localhost', "root","");
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}

include('config.php');
$sql="DROP TABLE users";
mysql_query($sql);
$sql = 'CREATE TABLE IF NOT EXISTS
users
(
  users_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  users_login VARCHAR(30) NOT NULL UNIQUE,
  users_password VARCHAR(32) NOT NULL,
  users_hash VARCHAR(32) NOT NULL,
  users_email VARCHAR(30)  NOT NULL UNIQUE,    
  users_region VARCHAR(30)  NULL,
  article_data DATE NOT NULL,
  article_time TIME NOT NULL, 
  users_status BIT NOT NULL,
  PRIMARY KEY  (users_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1; 
';
if (mysql_query($sql, $link)) {
    echo "таблица users успешно создана\n";
} else {
    echo 'Ошибка при создании таблицы: ' . mysql_error() . "\n";
}
?> 

