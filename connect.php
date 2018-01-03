<?php
// connect.php - connect to database Article_DB
if (session_id() == "") session_start();
$dsn = 'mysql:host=localhost;dbname=Articles_DB';
$username = 'root';
$password = "1";

$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

try {
    $conn = new PDO($dsn, $username, $password, $options);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
#    echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>
