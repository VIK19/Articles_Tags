<?php //Come back from the user
  if (session_id() == "") session_start();
  global  $lan, $conn;
  $lan = $_SESSION['lan'];
  include_once ('connect.php');
  include_once './html/site_html_library.php';  
  include 'read_table_parameters_site.php'; //read all parameters from table table_parameters_site into array $_PSESSION
  include_once 'site_php_library.php';

  $email2=$_GET['email'];
  $ip=$_SERVER['REMOTE_ADDR'];

  $sql = "SELECT users_id FROM users WHERE users_email=".$conn->quote($email2);
  $data = $conn->query($sql);
  $members =  $data->rowCount();
  if($members > 0) //Login was found
  {
         $row = $data->fetch(PDO::FETCH_LAZY);
		 $CheckSum = $row['users_hash'];
   }//if
 
  $email_cnx=explode("@",$email);
  
  $new_checkSum=base64_encode(substr($login2,0,3).$email_cnx[0].md5($_SERVER['REMOTE_ADDR']));

  if($checkSum != $new_checkSum) {die("Error during checking the kye !");}
  else 
  {
       try 
       {
            $sql = "UPDATE users SET users_status='1' WHERE users_email=".$conn->quote($email2);
            $stmt = $conn->prepare($sql);
		    $stmt->execute();
       }
      catch(PDOException $e)
      {
           echo $sql . "<br>" . $e->getMessage();
      }  
  }//else
  
 ?>