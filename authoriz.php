<?php // authoriz.php - Autorization of user;

    if (session_id() == "") session_start();

	global $lan, $conn, $_PSESSION;
	
    include_once './html/site_html_library.php';

    include_once 'connect.php';

	include_once 'site_php_library.php';

	include 'read_table_parameters_site.php'; //read all parameters from table table_parameters_site into array $_PSESSION

    $lan = $_SESSION['lan'];
	
	$lan_Authentication_is_successful=$lan['Authentication_is_successful'];
	$lan_Login_or_password_is_incorrect=$lan["Login_or_password_is_incorrect"];
	$lan_err7=$lan['err7'];
	$lan_err8=$lan['err8'];//No Login
	$lan_Press_OK_to_continue=$lan["Press_OK_to_continue"];
	$lan_confirm_your_Registration=$lan['confirm_your_Registration'];
	$lan_n_o_registred_user = $lan["n_o_registred_user"];
	$lan_N_o_login_and_password = $lan['N_o_login_and_password'];
 
    $login = iconv("UTF-8", "UTF-8", $_POST['login']);
	$password = iconv("UTF-8", "UTF-8", $_POST['password']);

    $login1 = trim($login);
	$password1 = trim($password);

    $login2 = htmlspecialchars($login1);
    $password2 = htmlspecialchars($password1);

   // Checking login, password
    if(($login2 != '') and ($password2 != '')) 
	{	
     $sql = "SELECT users_id, users_password, users_status  FROM users 
 	          WHERE `users_login`=".$conn->quote($login1)." LIMIT 1";
	  $data = $conn->query($sql);
      $members = $data->rowCount();

	  if($members == 1) //Login was founf
	  {
	     $data = $data->fetch(PDO::FETCH_LAZY);
      # Compare passwords 
      if($data->users_password === md5(md5($_POST['password'])))
      { 
		if($data->users_status != 0) //There was a user's confirmation
		{
          # genaretion rendom code 
          $hash = md5(generateCode(10)); 

          # Generation new cash-code
		  try 
          {
		         $sql = "UPDATE users SET users_hash="."'".$hash."'". 
		                    " WHERE users_id=".$conn->quote($data->users_id);
		         // Prepare statement
                $stmt = $conn->prepare($sql);
		        // execute the query
		        $stmt->execute();
		  }
          catch(PDOException $e)
          {
                 echo $sql . "<br>" . $e->getMessage();
          }
		  # password and login are correct
		  $autor_registr = 'yes';
		  p_write_table_parameters_site('autor_registr',$autor_registr);
		  p_write_table_parameters_site('login_user',$login2);
		  p_write_table_parameters_site('users_id',$data['users_id']);
	  
		  //Authentication_is_successful
		  html_authoriz(1);//html cod
          $current_page = $_PSESSION['current_page'];
	      $max_rows_page = $_PSESSION['max_rows_page'];
		   
		  $login_user2 = $login2;

		  $sql = "SELECT article_id, article_name, article_content, article_data  FROM articles_table
	                WHERE users_login=".$conn->quote($login_user2);
		  $data = $conn->query($sql);
          $number_rows = $data->rowCount();

          if($number_rows > $max_rows_page)
		  {
		     $rab = ceil($number_rows/$max_rows_page);
			 p_write_table_parameters_site('all_pages',$rab);
		  }
		  else 
		  {
		      p_write_table_parameters_site('all_pages','1');
		  }

        }//if	
		else //There wasn't a user's confirmation
		{
		  html_authoriz(2);//html cod
		}//else
	  }		
	  else //Password is not correct
	  {
	     html_authoriz(3);//html cod
	  } //if

	  }//if
	  else //There is not  registred user with this Login
	  {
	    html_authoriz(4);//html cod
	  }//else
	}//if
    else  //Login or Password wasn't inputed
	if(($password2 == '') and ($login2 != ''))
	{
	   html_authoriz(5);//html cod
    }//if
    else//No Login
	if(($password2 != '') and ($login2 == ''))
    {
	   html_authoriz(6);//html cod
    }//else
	else //No Login, no Password
    if(($login2 == '') and ($password2 == ''))
	{
	  html_authoriz(7);//html cod
	}//if

    function generateCode($length=6) # Geneneration random code 
  { 
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789"; 
    $code = ""; 
    $clen = strlen($chars) - 1;   
    while (strlen($code) < $length) { 
        $code .= $chars[mt_rand(0,$clen)];   
    } 
    return $code; 
  } //function generateCode($length=6) 
	

?>  
