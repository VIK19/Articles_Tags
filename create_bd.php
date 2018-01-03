<?php
$link = mysql_connect('localhost', "root","");
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}

$sql = 'CREATE DATABASE articles_bd';
if (mysql_query($sql, $link)) {
    echo "База articles_bd успешно создана\n";
	$cfg['Servers'][$i]['controluser'] = '<VIK>';
    $cfg['Servers'][$i]['controlpass'] = '<111>';
} else {
    echo 'Ошибка при создании базы данных: ' . mysql_error() . "\n";
}
?> 
