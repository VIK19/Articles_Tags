<?php
$link = mysql_connect('localhost', "root","");
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}

include('config.php');

$tablename = 'users';

$sql="DROP TABLE " . (string)$tablename;
if (mysql_query($sql, $link)) {
    echo "таблица " . $tablename . " успешно удалена\n";
} else {
    echo 'Ошибка при удалении таблицы: ' . mysql_error() . "\n";
}
?> 