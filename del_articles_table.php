<?php
$link = mysql_connect('localhost', "root","");
if (!$link) {
    die('������ ����������: ' . mysql_error());
}

include('config.php');

$tablename = 'articles_table';

$sql="DROP TABLE " . (string)$tablename;
if (mysql_query($sql, $link)) {
    echo "������� " . $tablename . " ������� �������\n";
} else {
    echo '������ ��� �������� �������: ' . mysql_error() . "\n";
}
?> 