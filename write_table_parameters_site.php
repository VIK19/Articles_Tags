<?php  //  write_table_parameters_site.php - write (update) all parameters to table table_parameters_site into array $val_par
 
include_once('connect.php');

global $conn;

function p_write_table_parameters_site($name_par,$val_par)
{

    global $conn;
    try {
        $sql = "UPDATE  table_parameters_site 
               SET 
               " .$name_par."="."'".$val_par."'".
			   " WHERE par_id=1";
 	
	   $stmt = $conn->prepare($sql);
       $stmt->execute();
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

}//function p_write_table_parameters_site($name_par,$val_par)

?>