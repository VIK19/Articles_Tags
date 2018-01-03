<?php
$link = mysql_connect('localhost', "root","");
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}

include('config.php');
$sql="DROP TABLE Theme_Rules";
mysql_query($sql);
$sql = 'CREATE TABLE IF NOT EXISTS
Theme_Rules
(
  Theme_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  Theme_users_id INT(11) NOT NULL,
  Theme_kol_users INT(11) NOT NULL,
  Theme_text VARCHAR(50) NOT NULL,
  Theme_data DATE NOT NULL,
  Theme_time TIME NOT NULL,
  PRIMARY KEY  (Theme_id),
  UNIQUE users_login (users_login)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1; 
';
if (mysql_query($sql, $link)) {
    echo "таблица users успешно создана\n";
} else {
    echo 'Ошибка при создании таблицы: ' . mysql_error() . "\n";
}
?> 

