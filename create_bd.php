<?php
$link = mysql_connect('localhost', "root","");
if (!$link) {
    die('������ ����������: ' . mysql_error());
}

$sql = 'CREATE DATABASE articles_bd';
if (mysql_query($sql, $link)) {
    echo "���� articles_bd ������� �������\n";
	$cfg['Servers'][$i]['controluser'] = '<VIK>';
    $cfg['Servers'][$i]['controlpass'] = '<111>';
} else {
    echo '������ ��� �������� ���� ������: ' . mysql_error() . "\n";
}
?> 
