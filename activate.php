<?php // get reply from user E-mail after Registration
	
	session_start();

	global $lan, $conn, $_PSESSION;
	
    include_once 'html/site_html_library.php';

    include_once 'connect.php';

	include_once 'site_php_library.php';

	include_once 'read_table_parameters_site.php'; //read all parameters from table table_parameters_site into array $_PSESSION

	$lan = $_SESSION['lan'];
	
    if(!empty($_GET['CheckSum']) && isset($_GET['CheckSum']))
    {
        $CheckSum=mysql_real_escape_string($_GET['CheckSum']);
		$email=mysql_real_escape_string($_GET['email']);
		$email_cnx=explode("@",$email);
		$sql = "SELECT users_login users_hash FROM users WHERE users_email=".$conn->quote($email);
        $query = $conn->query($sql);
        $members = $query->fetchColumn();
        if($members == 1) //there is user with this email
        {  //new control sum
           $new_checkSum=base64_encode(substr($login,0,3).$email_cnx[0].md5($_SERVER['REMOTE_ADDR']));
		   //check the CheckSum in DB
		   $checkSum = $query->users_hash;
		   if($checkSum == $new_checkSum) //control sums are equal
		   {
		      $users_status = '1';
		      $sql = "UPDATE  users SET users_status=".$conn->quote($users_status)." WHERE  users_email=".$conn->quote($email);
              $query = $conn->query($sql);
			  $query->execute();
			  $subject=$lan["confirmation_sum"];
              $message= $lan["account_activated"];
	          $from1 = "From: webmaster@".$_PSESSION["base_url"];
              $from2 = "-fwebmaster@".$_PSESSION["base_url"];
	          mail($email2, $subject, $message, $from1, $from2);
		   }//if
		   else
		   {
		       $subject=$lan["confirmation_sum"];
               $message= $lan["bye_registration"];
	           $from1 = "From: webmaster@".$_PSESSION["base_url"];
               $from2 = "-fwebmaster@".$_PSESSION["base_url"];
	           mail($email2, $subject, $message, $from1, $from2);
		   }//else
		}//if
		else  //there is not user with this email
		{
		    $subject=$lan["confirmation_email"];
            $message= $lan["bye_registration"];
	        $from1 = "From: webmaster@".$_PSESSION["base_url"];
            $from2 = "-fwebmaster@".$_PSESSION["base_url"];
	        mail($email2, $subject, $message, $from1, $from2);
		}//else
    }//if
 ?>