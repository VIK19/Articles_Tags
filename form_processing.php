<?php  // form_processing.php -  registration new user

	if (session_id() == "") session_start();
	include_once ('connect.php'); 
	include_once 'html/site_html_library.php';
	include 'read_table_parameters_site.php'; //read all parameters from table table_parameters_site into array $_PSESSION
	global  $lan, $lang, $conn, $_PSESSION, $autor_registr;

	$kod_flag = '0';

    //Errors
    $lan_err1=$lan["Username_can_only_consist"]; //Login includes only english.
	$lan_err2=$lan["Username_must_be_at_least"]; //login must be more than  3 letters and less 30.
	$lan_err3=$lan["err3"]; //the user is alredy registrated
	$lan_err4=$lan["err4"]; //there is error in Email .
	$lan_err5=$lan["err5"]; //Email is not inputed
	$lan_err6=$lan["err6"]; //there is error in copy of password.
	$lan_err7=$lan["err7"]; //	Password is not inputed.
	$lan_err8=$lan["err8"]; //	Login is not inputed
	$lan_err9=$lan["err9"]; //	E-mail is not unique

	$Registration_was_successful= $lan["Registration_was_successful"];//Registration was successful
	$Press_OK_to_continue = $lan["Press_OK_to_continue"];
	$message_to_user = $lan["message_to_user"];
	$account_activation = $lan["account_activation"];
	$lan_backwebsite = $lan["backwebsite"];

    // get variables from post
    $login = iconv("UTF-8", "Windows-1251", $_POST['login']);
	$password = iconv("UTF-8", "Windows-1251", $_POST['password']);
	$password22 = iconv("UTF-8", "Windows-1251", $_POST['password2']); //copy password
    $email1 = iconv("UTF-8", "Windows-1251", $_POST['email2']);

    // cut spaces
    $login1 = trim($login);
	$password1 = trim($password);
	$password221 = trim($password22);

    $email2 = trim($email1);

    // hide dengerous symbols
    $login2 = htmlspecialchars($login1);
    $password2 = htmlspecialchars($password1);	
	$password2222 = htmlspecialchars($password221);	

    $err = '';    
   // check input data
    if($login2 !== '') //Control Login
	{	   
       # check login: 
	   if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login'])) 
       { 
        $err = $err.$lan_err1; //login can includ only english letters 
		$kod_flag = '1';
       } 
    
	   if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) 
       { 
        $err = $err.'<br/>'.$lan_err2; //login must be more than  3 letters and less 30
		$kod_flag = '1';
       } 
	
       # check user with this name in DB
       $sql = "SELECT COUNT(*)  as count FROM users WHERE users_login="."'".$login2."'";
       $query = $conn->query($sql);
       $members = $query->fetchColumn();

       if($members > 0) 
       { 
          $err = $err.'<br/>'.$lan_err3; //user with this name already exist
		  $kod_flag = '1';
       } 
	}//if
	else {$err = $err.'<br/>'.$lan_err8;} //Login is not inputed
	
    // check email:	
    if ($email2 !== '')
	{
	     $regexp = '/^[a-z_0-9\-\.]+@[a-z_0-9\-\.]+\.[a-z]{2,6}$/i'; 
         if (!preg_match($regexp, $email2)) 
		 {
		   $err = $err.'<br/>'.$lan_err4; //there is error in Email
         }
		 else {$email2 = htmlspecialchars($email1);}
		 //check the Email in DB
		 $sql = "SELECT COUNT(*)  as count FROM users WHERE users_email="."'".$email2."'";
         $query = $conn->query($sql);
         $members = $query->fetchColumn();

       if($members > 0) 
       { 
          $err = $err.'<br/>'.$lan_err9; //E-mail is not unique
		  $kod_flag = '1';
       } 
    }
	else {$err = $err.'<br/>'.$lan_err5;} //Email is not correct
	  	
	if($password2 != '') //Control Password
	{
	  if($password2222 != $password2) 
	  {
	    $err = $err.'<br/>'.$lan_err6;
	  } //there is error in copy of password
	}
	else 
	{
	  $err = $err.'<br/>'.$lan_err7;
	} //password is not inputed
		

	if($err == '') //there is not error
	{
	  // add new user
      $password2 = md5(md5(trim($password2))); 
      $data_reg2 = date('Y-m-d H:i:s');

	  $users_status2 = 0;//Status of user (= 0 - we don't have reply yet; or 1 - we have reply from user)

	  $email_cnx=explode("@",$email2);
	  $CheckSum=base64_encode(substr($login2,0,3).$email_cnx[0].md5($_SERVER['REMOTE_ADDR']));
	  $sql = "INSERT INTO users  
         (users_login, users_password, users_hash, users_email, users_data, users_status) 
         VALUES 
         (".$conn->quote($login2).",".$conn->quote($password2).",".$conn->quote($CheckSum).",".$conn->quote($email2)
	      .",".$conn->quote($data_reg2).",".$conn->quote($users_status2).")";

      try // set the PDO error mode to exception
	  {
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $conn->exec($sql);
      }//try
      catch(PDOException $e)
      {
          echo $sql . "<br>" . $e->getMessage();
      }

	  if(!$conn) {echo html_form_processing('Error in adding new user');}
	  else //registration is successfull
	  {
	       confirmation_Email();
	       echo  html_form_processing(1);
		   
	  }//else
    }//if

	else //There are errors
	{	
	  $all_error = '';
      echo  html_form_processing($err);
	   
	}//else

  function confirmation_Email() // confirmation Registration
  {
     global $email2, $lan, $CheckSum, $_PSESSION;
     $subject=$lan["confirmation_email"];
     $message= $lan["hello"].'<br/> <a href='.$_PSESSION["Back_Mail"].'/activate.php?CheckSum='.
	           $CheckSum.'&email='.$email2.'\>'.$lan["Please_go_to"].'</a>';
	 $from1 = "From: ".$_PSESSION["Back_Mail"];
	 
     mail($email2, $subject, $message, $from1);
 
  }//function confirmation_Email()
 
 
	
?> 

