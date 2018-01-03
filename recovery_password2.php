<?php // recovery_password2.php — recovery password (step 2)

    session_start();  
    $lan = $_SESSION['lan'];
    include ('connect.php'); 
	global $conn;
    //include html library
	include 'html/site_html_library.php';
	
    $lan_n_o_registred_user=$lan['n_o_registred_user'];
	$lan_email_rec=$lan['email_rec'];
	$lan_Input=$lan['Input'];
	$lan_err8=$lan['err8'];
	$lan_err5=$lan['err5'];
	$lan_Email_to_user=$lan['Email_to_user'];
	$lan_Press_OK_to_continue=$lan['Press_OK_to_continue'];
	$lan_your_new_password=$lan['your_new_password'];

    // get variables from post
    $login = $_POST['login'];
	$email_rec_p_value = $_POST['email_rec_p_value'];

    // cut srases
    $login1 = trim($login);
	$email_rec_p_value1 = trim($email_rec_p_value);
    // ecran dang. symbols
    $login2 = htmlspecialchars($login1);
	$email_rec_p_value2 = htmlspecialchars($email_rec_p_value1);

	// Check login, password
    if($login2 != '') 
	{	

	  if($email_rec_p_value2 != '') 
	  {	
	    # Is there this user?
		$sql = "SELECT users_id, users_email, users_status  FROM users 
	            WHERE users_login="."'".$login2."'"." LIMIT 1";
		$data = $conn->query($sql);
        $members = count($data);
	    if($members == 1) //Login was found
	    {
	       $data = $data->fetch(PDO::FETCH_LAZY);
	       $email2 = $data->users_email;
           if ($email2 != $email_rec_p_value2) //Emails are different 
		   {
		      html_recovery_password2(1);
           }
		   else 
		   {
		      if($email_rec_p_value2 == $email2) //mail correct - generate new password
		      {
			     $new_password = generateCode(10); 
			     $_SESSION['new_password'] = $new_password;
                 $orig = html_recovery_password2(2);//html code
                 $message_user = htmlentities($orig);
			     $headers = "Content-type: text/html; charset=UTF-8 \r\n";
			     $headers .= "From: site Articles" . "<".$_SESSION['Back_Mail'].">\r\n";
			     $rab = mail($email2, $lan_Email_to_user, $message_user, $headers);//Send new password to the user
			     if($rab)
			    {
			        $password2 = md5(md5(trim($new_password)));
			        $sql = "UPDATE users SET users_password="."'".$password2."'"." WHERE users_login="."'".users_login2."'";
			        // Prepare statement
                    $stmt = $conn->prepare($sql);
		            // execute the query
		            $stmt->execute();
			        // Password and Login are correct
		            $autor_registr = 'yes';
		            $_SESSION['autor_registr']=$autor_registr;
		            $_SESSION['login'] = $login2;
		            $_SESSION['users_id'] = $query['users_id'];
			    }//if
			    else  html_recovery_password2(6);//html code
		     }//if
		 }//else  
       }//if
	   else
	   {
           html_recovery_password2(3);//html code
	   }//else 
	  }//if	
	  else
	  {
         html_recovery_password2(4);//html code
	  }//else

    }//if	
	else  //Login  wasn't inputed
	{
	   html_recovery_password2(5);//html code
	} //if

	function generateCode($length) 
    { 
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789"; 
        $code = ""; 
        $clen = strlen($chars) - 1;   
        while (strlen($code) < $length) { 
          $code .= $chars[mt_rand(0,$clen)];   
        }//while
        return $code; 
    } //function generateCode($length) 

?>  