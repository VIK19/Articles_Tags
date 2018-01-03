<?php // recovery_password.php — recovery password

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
	$lan_Press_OK_to_continue=$lan['Press_OK_to_continue'];

    $login = $_POST['login'];
    //cut spaces
    $login1 = trim($login);
    // Screening dangerous symbols
    $login2 = htmlspecialchars($login1);

   // check login, password
    if($login2 != '') 
	{	

	  # read user with this login
	  $sql = "SELECT users_id FROM users WHERE users_login="."'".$login2."'";
	  $data = $conn->query($sql);
      $members = count($data);
      if($members == 0)  
	  { //There is not  registred user with this Login
	    $data = $data->fetch(PDO::FETCH_LAZY);
        html_recovery_password(1);// html code
	  }//if	
      else //There is user with this Login
      {
         html_recovery_password(2);// html code
      }//else	  
	}//if
    else  //Login wasn't inputed
	{
	    html_recovery_password(3);// html code 
	} //if

?>  
