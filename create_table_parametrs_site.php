<?php
include('config.php');
global $conn;

$table= "table_parametrs_site";
$columns = 
'
  Theme_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1; 
';

$createTable = $conn->exec("CREATE TABLE IF NOT EXISTS mydb.$table ($columns)");

if ($createTable) 
{
    echo "Table $table - Created!<br /><br />";
}
else { echo "Table $table not successfully created! <br /><br />";
}
?> 
