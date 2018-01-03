<?php  //  read_table_parameters_site.php - read all parameters from table table_parameters_site into array $_PSESSION
    if (session_id() == "") session_start();
    include_once('connect.php');
    global $conn, $_PSESSION;

    $sql = "SELECT * FROM table_parameters_site";
	$data = $conn->query($sql);
    $members =  $data->rowCount();
	if($members > 0) //there is parametrs list
	{
	    $_PSESSION = $data->fetch(PDO::FETCH_LAZY);
    }

?>