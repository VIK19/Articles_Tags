<?php //Deleting table tegs_table
$link = mysql_connect('localhost', "root","");
if (!$link) {
    die('������ ����������: ' . mysql_error());
}

include('config.php');

$tablename = 'tags_table';

$sql="DROP TABLE " . (string)$tablename;
if (mysql_query($sql, $link)) {
    echo "������� " . $tablename . " ������� �������\n";
} else {
    echo '������ ��� �������� �������: ' . mysql_error() . "\n";
}
?> 