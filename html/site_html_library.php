<?php  // site_html_library.php - html library of Articles site
	if (session_id() == "") session_start();
	global $lan;
	
    $lan = $_SESSION['lan'];

	include 'read_table_parameters_site.php'; //read all parameters from table table_parameters_site into array $_PSESSION
	
	function html_content_main() //html for content_main.php - main of AUTHORIZATION
    {
	    global $lan, $_PSESSION;
		
	    $str1 = '
			<div id="content_left">
				<div id="author"><h1>'.$lan["AUTHORIZATION"].'</h1></div>
				<div id="authoriz1">
					
                        <div id="login1">
                            '.$lan["Login"].':<br />
							<input id="login_auto" type="text" name="login_auto" value="111" size="25" maxlength="30"  autofocus/>
						</div>
						<div id="password1">
							'.$lan["Password"].':<br />				
							<input id="password_auto" type="password" name="password_auto" size="25" maxlength="30" value="1" />
							<span><input id="Re_password_auto" type="button" name="Re_password_auto" size="25" value="'.$lan["Re_password"].'" onClick="Re_password()" /></span>							
						</div>	
						<div id="submit_button1">
							<input id="button_auto" type="button" name="input_author1" size="100" value="'.$lan["Input"].'" onClick="in_autoriz()" />
							<br/>
						</div>				
						<br/>
				</div>	
				<div id="messages">
					<div id="load1_auto" style="display:none;"><img src="img/load.gif" />
					</div>
					<div id="answer_auto"> 
					</div>
					<div id="answer2_auto">
					</div>
					<div id="load1_check" style="display:none;"><img src="img/load.gif" />
					</div>
					<div id="answer_check"> 
					</div>
					<div id="answer2_check">
					</div>
                </div>	

                   <div id="line_podch1">
						<hr width="190"  color="#b3b3b3" align="left" size="2">
				    </div>
					<div id="registration1">
						<div  id="registration" onClick="visibl_form_reg()">'.$lan["REGISTRATION"].'</div>
					</div>
                    <br/>
                    <div id="line_podch1">
					   <hr width="190"  color="#b3b3b3" align="left" size="2">
				    </div>
					<div id="form_registr">
            	        
						<div id="form_registr_zag" ><center>'.$lan["Registration_Form"].'</center></div>
						<div id="form_registr_main">
							
                          	    <img id="out_messages" src="/img/out.jpg" width="12" height="12" onClick="out_messages1()" />				
                                <table id="table_autoriz" >
                                  <tr>
                                    <td colspan="2" height="30" cellpadding="10" >'.$lan["Enter_the_data"].':</td>
                                  </tr>
                                  <tr>
								    <td  width="30"  id="td1_table_autoriz">'.$lan["Login"].':*</td>
                                    <td   width="70" id="td2_table_autoriz"><input id="login" type="text"  value="" size="20" maxlength="30"  name="login" autofocus></td>
                                  </tr>
                                  <tr>
                                	<td>'.$lan["Password"].':*</td>
                                    <td><input id="password" type="password" size="20" value="" maxlength="30" name="password"  
									        onkeyup="FLevelPassword() "/> 
									</td>
                                  </tr>
                                  <tr>
                                	<td>'.$lan["Password2"].':*</td>
                                    <td><input id="password2" type="password" size="20" maxlength="30" name="password2"  
									           value=""  /></td>
                                  </tr>
								  <tr>
								    <td width="30">Email:*<br /></td>
                                    <td width="70"><input id="email2" type="text" size="20"  value="" name="email2" value=""   /></td>
                                  </tr>
								  
                                  <tr>
								    <td width="30"> </td>
                                	
                                  </tr>
								  <tr>
									<td width="30">'.$lan["Level_Password"].':</td>
									<td width="70"><input id="ProcLevelPassword" type="text" name="ProcLevelPassword" size="3" maxlength="3" width="10">
									  <meter value="0" id="LevelPassword" max="100" low="100" high="60"></meter>
									</td>
								  </tr>
                                  <tr>
                                    <td  colspan="2" height="20">* - '.$lan["obligatory_for_input"].'.</td>
                                  </tr>
								  <tr>
                                    <td  colspan="2" height="40">'.$lan["Username_can_only_consist"].'<br/>
									                             '.$lan["Username_must_be_at_least"].'<br/>
									</td>
                                  </tr>
								  <tr>
                                    <td></td>
                                    <td><pre>  </pre> </td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td height="30"><input id="button" type="button" name="b_form_reg" value="'.$lan['Send'].'" onClick="out_form()" /></td>
                                  </tr>

                                </table>
                                <div id="load1" style="display:none;"><img src="img/load.gif" />
								</div>
								<div id="answer"> 
								</div>
								<div id="answer2">
								</div>
                            
						</div>

					</div>
			</div>
			
            <style>
			  #main {background: #dcdcdc;}
			  #catalog {background: #dcdcdc; }	  
		    </style>					
			
			<div id="forum_messages">				
					<div id="messages_err"> 
						<br/>
						<img src="img/error.png" align="left">
						<p align="center"><font color="red">'.$lan["Please_go_to"].' <br/>
							'.$lan["Sign_in_or_Register"].'<br/>
							'.$lan["Press_OK_to_continue"].' </font></p><br/><br/>
						<div id="button_ok">
							<input  id="button_ok2" type="button"  align="middle" name="ok_forum" value="OK" onClick="out_forum_messages()" />
						</div>
					</div>
			</div>
		';	
	    echo $str1;

	}//function html_content_main()
	
	function html_form_processing($par) //messages
	{

	   global $lan, $_PSESSION;
	   $str = '';

	   if($par == 1)
	   {  //Registration_was_successful
	       $str =  '
                    <div id="messages_ok_reg">
                      <img src="img/111.png" align="left">
			          '.$lan["Registration_was_successful"].'<br/>
			          '.$lan["Press_OK_to_continue"].'<br/>
			          <div style="clear:left;"></div><br/>
			          <div id="button_ok">
				         <input  id="button_ok2" type="button"  align="left" name="ok_reg" value="OK" onClick="out2_form()" />
                      </div>
                    </div><br>
		          ';
	    }//if
		else //There are errors
		{
			$str =  '
	                  <div id="messages_err_reg">
                          <img src="img/error.png" align="left"><br/><br/><p align="left">'.$par.'</p>
                          <div style="clear:left;"></div>
                      </div><br>
		            ';
		}//else
		return $str;
	}//function html_form_processing($par)

	function html_authoriz($par) //html code for authoriz.php — Autorization of user
	{
	    global $lan, $_PSESSION;
		$lan = $_SESSION['lan'];
	    switch ($par) 
	    {
         case 1:
		     echo 
		     '
	         <div id="messages_ok">
		       <br/>
		       <img src="img/111.png" align="left" color="#30a0c6";>
		       <p align="center"><font>'.$lan["Authentication_is_successful"].'<br/><br/>
		       '.$lan["Press_OK_to_continue"].'</font></p><br/><br/>
		       <div id="button_ok">
				 <input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="out_autoriz_ok()" />
               </div>
             </div><br>
			 <style>
               #content_left {visibility:  hidden; }
             </style>;
		    ';
	     break;
		 case 2:
 		     echo '
	         <div id="messages_err">
		          <br/>
                  <img src="img/error.png" align="left">
		          <p align="center"><font color="red">'.$lan["confirm_your_Registration"].'<br/>
		          '.$lan["Press_OK_to_continue"].'</font></p><br/><br/>
                  <div id="button_ok">
				    <input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="out2_autoriz_err()" />
                  </div>
             </div><br>';	
	     break;
		 case 3:
	          echo '
	            <div id="messages_err">
		          <br/>
                  <img src="img/error.png" align="left">
		          <p align="center"><font color="red">'.$lan["Login_or_password_is_incorrect"].'<br/>
		          '.$lan["Press_OK_to_continue"].'</font></p><br/><br/>
                  <div id="button_ok">
				    <input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="out2_autoriz_err()" />
                  </div>
                </div><br>';
		break;
		case 4:
	          echo '
	            <div id="messages_err">
		          <br/>
                  <img src="img/error.png" align="left">
		          <p align="center"><font color="red">'.$lan["n_o_registred_user"].'<br/>
		          '.$lan["Press_OK_to_continue"].'</font></p><br/><br/>
                  <div id="button_ok">
				    <input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="out_autoriz_err()" />
                  </div>
                </div><br>
		    ';
		break;
		case 5:
             echo '
	         <div id="messages_err">
		       <br/>
               <img src="img/error.png" align="left">
		       <p align="center"><font color="red">'.$lan_err7.'<br/>
		       '.$lan["Press_OK_to_continue"].'</font></p><br/><br/>
               <div style="clear:left;"></div><br/>
		       <div id="button_ok">
				 <input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="out5_autoriz_err()" />
               </div>
             </div><br>
			';
		break;
		case 6:
	         echo '
	         <div id="messages_err">
		       <br/>
               <img src="img/error.png" align="left">
		       <p align="center"><font color="red">'.$lan_err8.'<br/>
		       '.$lan["Press_OK_to_continue"].'</font></p><br/><br/>
               <div style="clear:left;"></div><br/>
		       <div id="button_ok">
				 <input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="out4_autoriz_err()" />
               </div>
             </div><br>
			';
		break;
		case 7:
             echo '
	         <div id="messages_err">
		       <br/>
               <img src="img/error.png" align="left">
		       <p align="center"><font color="red">'.$lan_N_o_login_and_password.'<br/>
		       '.$lan["Press_OK_to_continue"].'</font></p><br/><br/>
               <div style="clear:left;"></div><br/>
		       <div id="button_ok">
				 <input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="out4_autoriz_err()" />
               </div>
             </div><br>
		   ';
		break;
	   }//switch
	}//function html_authoriz($par) 

	function html_recovery_password2($par) //html code of recovery_password2.php
	{

		global $lan, $_PSESSION;
		$lan = $_SESSION['lan'];
        $orig = '';
	    switch ($par) 
	    {
         case 1:
		    echo 
		    '
		     <style>
                  #authoriz1 {visibility: hidden;}
				  #author {visibility: hidden;}
				  #content_left {visibility: hidden;}
             </style>
	         <div id="messages_err">
		        <br/>
                <img src="img/error.png" align="left">
		        <p align="center"><font color="red">'.$lan["err4"].'<br/>'.$lan["Press_OK_to_continue"].'</font></p><br/><br/>
                <div style="clear:left;"></div><br/>
		        <div id="button_ok">
				  <input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="out3_autoriz_err()" />
                </div>
             </div><br/>
		   ';
		 break;
		 case 2:
		     $orig ="<html>
                       <head>
                         <title>New password</title>
                       </head>
                       <body>
                         <p>Please, verify your new password for site Article.com</p>
                         <p>".$_PSESSION['new_password']."</p>
                       </body>
                     </html>";
		 break;
		 case 3:
	       echo '
	       <div id="messages_err">
		      <br/>
              <img src="img/error.png" align="left">
		      <p align="center"><font color="red">'.$lan["n_o_registred_user"].'
		      '.$lan["Press_OK_to_continue"].'</font></p><br/><br/>
              <div style="clear:left;"></div><br/>
		      <div id="button_ok">
				<input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="out_autoriz_err()" />
              </div>
           </div><br>
		   ';
		 break;
		 case 4:
	       echo 
		   '
	        <div id="messages_err">
		      <br/>
              <img src="img/error.png" align="left">
		      <p align="center"><font color="red">'.$lan["err5"].'
		      '.$lan["Press_OK_to_continue"].'</font></p><br/><br/>
              <div style="clear:left;"></div><br/>
		      <div id="button_ok">
				<input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="out_autoriz_err()" />
              </div>
            </div><br>
		   ';   	   
		 break;
		 case 5:
		   echo 
	       '
	        <div id="messages_err">
		      <br/>
              <img src="img/error.png" align="left">
		      <p align="center"><font color="red">'.$lan["err8"].'
		      '.$lan["Press_OK_to_continue"].'</font></p><br/><br/>
              <div style="clear:left;"></div><br/>
		      <div id="button_ok">
				<input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="out_autoriz_err()" />
              </div>
            </div><br>
	        ';   	   	  
		 break;
		 case 6:
		    echo 
	       '
	        <div id="messages_err">
		      <br/>
              <img src="img/error.png" align="left">
		      <p align="center"><font color="red">'.$lan["err9"].'<br/'
		      .$lan["Press_OK_to_continue"].'</font></p><br/><br/>
              <div style="clear:left;"></div><br/>
		      <div id="button_ok">
				<input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="out_autoriz_err()" />
              </div>
            </div><br>
	        ';   	   	  
		 break;
	    }//switch
        return $orig;
	}//function html_recovery_password2($par);

	function html_recovery_password($par) //html code of recovery_password.php
	{
		global $lan, $_PSESSION;
		$lan = $_SESSION['lan'];
        $orig = '';
	    switch ($par) 
	    {
           case 1:
		      echo 
		        '
	             <div id="messages_err">
		            <br/>
                    <img src="img/error.png" align="left">
		            <p align="center"><font color="red">'.$lan["n_o_registred_user"].'
		            '.$lan["Press_OK_to_continue"].'</font></p><br/><br/>
                    <div style="clear:left;"></div><br/>
		            <div id="button_ok">
				        <input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="out_autoriz_err()" />
                    </div>
                 </div><br>
		        ';
		   break;
           case 2:
		   	    echo 
		          '
		          <style>
                      #content_left {visibility:  hidden; }
			          #messages {visibility:  hidden; }
                  </style>
		          <div id="email_rec_password">
		             <div id="email_rec_password2">
                        '.$lan["email_rec"].':<br />			
			            <input id="email_rec_p" type="text" size="20"  value="" name="email_rec_p" value=""  onclick="form_email_rec()" autofocus/>			
			         </div>
			         <div id="submit_button1">
				         <input id="button_auto" type="button" name="input_email_rec" size="100" value="'.$lan["Input"].'" onClick="in_email_rec()" />
				         <br/>
			         </div>				
		          </div>
		          ';
		    break;
			case 3:
				  echo '
	                 <div id="messages_err">
		                 <br/>
                         <img src="img/error.png" align="left">
		                 <p align="center"><font color="red">'.$lan["err8"].'
		                 '.$lan["Press_OK_to_continue"].'</font></p><br/><br/>
                         <div style="clear:left;"></div><br/>
		                 <div id="button_ok">
				             <input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="out3_autoriz_err()" />
                         </div>
                     </div><br>';  
			break;
		}//switch
	}//function html_recovery_password($par);

	function html_article_form($par)//html code of article_form.php
	{

	    global $lan, $_PSESSION;
		$lan = $_SESSION['lan'];

	    switch ($par) 
	    {
           case 1:   
		       echo '
                    <style>
				      #forma_article{
					      display: block;
						  visibility:  visible;
					  }
					  #content_main11{
                          display: block;
						  visibility:  visible;
						  z-index: 50;
					  } 
				    </style>
		           ';

	           echo '
	                <form id="forma_article_2" name="forma_add_article"  method="post" action="">
			            <div id="title_forma_article"><h1>'.$lan["Forma_for_adding_article"].'</h1></div>
			            <div id="Name_article">
                            '.$lan["Name_article"].':<br />
							<input id="Name_article_auto" type="text" name="Name_article" value="" size="135" maxlength="100"  autofocus/>
				        </div>
				        <div id="Content_article">
                            '.$lan["Text_article"].':<br />
							<textarea rows="20" cols="120" name="text_form_article" wrap="soft">						
							</textarea> 							
				        </div>
				        <div id="bl_URL_adress">
				           '.$lan["URL_adress"].':<br />
					       <input id="st_URL_adress" type="text" name="name_URL_adress" value="" size="135" maxlength="200" />
				        </div>
				        <div id="Article_Tags">
				            '.$lan["Tags"].':
			                    <br />
			                 '.$lan["Add_Tag"].':
			                <input id="Name_tag_auto" type="text" name="Name_tag" value="" size="30"   />
			                <input id="button_tag_add" type="button" name="tag_add" size="20" value="'.$lan["Save"].'" onClick="save_tag()" />
			                <br />
				        </div>
  				        <input id="button_submit_tag" type="button" name="name_submit_tag" size="100" value="'.$lan["Send"].'" onClick="add_data_form_a()" />			 
				        <input id="button_cancel_tag" type="button" name="name_cancel_tag" size="100" value="'.$lan["cancel"].'" onClick="cancel_form_a()" />			 
			        </form>
	                ';

		   break;
		}//switch
	}//function html_article_form($par)

	function html_site_php_library($par1,$par2,$par3,$par4,$par5,$par6)//html code site_php_library.php 
	{
	   	global  $t_article_name, $article_tags, $article_data_time, $_PSESSION;

		$lan = $_SESSION['lan'];
	    switch ($par1) 
	    {
            case 1:
		      echo 
			   '    
		       <style>
			     #content_main3 {visibility:  visible;}
    	       </style>
			   ';
		      echo 
			   '     <div id="forma_box">
				      <table id="table_articles" width="100%"  border="1" align="center" cellspacing="5" cellpadding="10" >
					    <tr  height="5">
					      <th width="60%">'.$lan["Articles_Names"].'</th>
					      <th width="30%">'.$lan["Article_Tags"].'</th>
					      <th width="10%">'.$lan["Creation_Time"].'</th>						  
					    </tr>
		       ';
		    break;
		    case 2:
		      echo 
			           '
				        <tr  height="5" onclick="fnselect'.$par2.'('.$par3.')" id="row'.$par2.'" >
					      <td width="60%">'.$par4.'</td>
						  <td width="30%">'.$par5.'</td>
					      <td width="10%">'.$par6.'</td>	
						</tr>
                       ';					
		    break;
			case 3:
			    echo 
			           '
				        <tr  height="5" style="background-color:#d0c3b2" 
						     onclick="fnselect'.$par2.'('.$par3.')" id="row'.$par2.'" >
					      <td width="60%">'.$par4.'</td>
						  <td width="30%">'.$par5.'</td>
					      <td width="10%">'.$par6.'</td>	
						</tr>
                       ';					
			break;
			case 4:
			   $str1 = '<select name="select_page">';
			   $str2 = '';
			   for ($i = 0; $i < $par2; $i++)
	           {
	                $str2 = $str2.'<option onClick="choice_page()">'.$par2.'</option>';
	           }//for 
			   echo 
			   '
                     </table>
				  </div>
			   ';	  
			break;
			case 5:
			    echo 
			    '  <div id="forma_box">
				      <table id="table_articles" width="100%"  border="1" align="center" cellspacing="5" cellpadding="10" >
					    <tr  height="5">
					      <th id="table_articles_read_head" width="90%">'.$_PSESSION["t_article_name"].'</th>
					      <th width="10%">'.$_PSESSION["article_data_time"].'</th>						  
					    </tr>
		        ';
			break;
			case 6:
				echo 
			          '        <tr   id="content_page_id" >
					              <td  colspan="2" >'.$par2.'
						           </td>
						       </tr>
					      </table>
				       </div>
                      ';	
			break;
			case 7:
				echo 
			        '        <tr   id="content_page_id" >
					             <td  colspan="2" >'.$par2.
						           '<SPAN style="color:#ffff00">'.$_PSESSION["current_tag_read"].'</SPAN>'.$par3.
						        '</td>
						     </tr>
					     </table>
				      </div>
                    ';	
			break;
		}//switch
	}//function html_site_php_library($par1,$par2,$par3,$par4,$par5,$par6)

	function html_ajax_list_tags($par,$par2) //html code for  ajax_list_tags.php
	{
        global  $conn;
	    switch ($par) 
	    {
            case 1:
			
                $str2 = '<select id="search_number_article" name="search_article" size="1" onChange="StatusSearch();">';
		        for ($k = 0; $k < count($par2); $k++)
	            {
                   $rab = $conn->quote($par2[$k]);
		           $query = "SELECT  tag_name FROM tags_table WHERE tag_id=".$rab." ORDER BY tag_name";
	               $query2 = $conn->query($query);
				   $members =  $query2->rowCount();
				   if($members > 0)
				   {
			           $data2 = $query2->fetch(PDO::FETCH_LAZY);
			           $article_tag_name = $data2['tag_name'];
                       $str2 = $str2.'<option  value='.$article_tag_name.'>'.$article_tag_name.'</option>';
				   }//if
		        }//for
		        echo $str2.'</select>';

			break;
		}//switch
	}//function html_ajax_list_tags($par,$par2)
	

	function html_add_data_form_a($par) //html code for  add_data_form_a.php - Save form for new editing
	{
	    global $lan, $t_article_name, $article_tags, $article_data_time, $_PSESSION;
		$lan = $_SESSION['lan'];
	    switch ($par) 
	    {
            case 1:
			   echo '
	               <div id="messages_err">
		              <br/>
                      <img src="img/error.png" align="left">
		              <p align="center"><font color="red">'.$lan["not_site"].'<br/>
		              '.$lan["Press_OK_to_continue"].'</font></p><br/><br/>
                      <div id="button_ok">
				        <input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="ok_err_no_name_a()" />
                      </div>
                   </div><br>
	                ';
			break;
			case 2:
				echo '
	              <div id="messages_err">
		              <br/>
                      <img src="img/error.png" align="left">
		              <p align="center"><font color="red">'.$lan["not_Name_Article"].'<br/>
		              '.$lan["Press_OK_to_continue"].'</font></p><br/><br/>
                      <div id="button_ok">
				        <input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="ok_err_no_name_a()" />
                      </div>
                 </div><br>
	            ';
			break;
			case 3:
				echo 
				   '
	                 <div id="messages_err">
		                <br/>
                        <img src="img/error.png" align="left">
		                <p align="center"><font color="red">'.$lan["there_is_this_name_Article"].'<br/>
		                  '.$lan["Press_OK_to_continue"].'</font>
						</p><br/><br/>
                        <div id="button_ok">
				            <input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="ok_err_no_content_a()" />
                        </div>
                     </div><br>
	               ';
			break;
			case 4:
			    echo '
	                <div id="messages_err">
		                <br/>
                        <img src="img/error.png" align="left">
		                <p align="center"><font color="red">'.$lan["not_Content_Article"].'<br/>
		                  '.$lan["Press_OK_to_continue"].'</font>
						</p><br/><br/>
                        <div id="button_ok">
				            <input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="ok_err_no_content_a()" />
                        </div>
                    </div><br>;
	             ';
			break;
			case 5:
		       echo '
                  <style>
				      #forma_article{
                          display: none;
					  } 
					  #table1_articles{
                          display: block;
					  } 
					  #content_main11{
						  visibility:  hidden;
					  } 
				  </style>
		           ';
				   
			break;
		}//switch
	}//function html_add_data_form_a($par,$par2,$par3) 

	
	function html_cancel_form_a($par1) //html code for  cancel_form_a.php
	{
	    switch ($par1) 
	    {
            case 1:
			     echo '
                  <style>
					  #content_main11{
						  visibility:  hidden;
					  } 
				  </style>
		              ';
					  
                  //rewrite articles table
                 echo  '<div id="articles_content2">'; 
			break;
			case 2:
			      echo '</div> ';   
			break;
			case 3:
			    echo 
				'
					 <script type="text/javascript">
					 
					   var button_prev_page = document.getElementById("button_prev_page");
                       button_prev_page.disabled=true;
					 	
					   var button_next_page = document.getElementById("button_next_page");
                       button_next_page.disabled=true;
						
					   var button_article_search = document.getElementById("button_article_search");
                       button_article_search.disabled=false;
						
                       var read_page = document.getElementById("read_page");
                       read_page.disabled=false;
					   
                       var button_article_edit = document.getElementById("button_article_edit");
                       button_article_edit.disabled=false;
					   
					   var button_article_del = document.getElementById("button_article_del");
                       button_article_del.disabled=false;
   
                     </script>
		        ';
			break;
			case 4:
			    echo 
				'
					 <script type="text/javascript">
					 
					   var button_prev_page = document.getElementById("button_prev_page");
                       button_prev_page.disabled=false;
					 	
					   var button_next_page = document.getElementById("button_next_page");
                       button_next_page.disabled=false;
						
					   var button_article_search = document.getElementById("button_article_search");
                       button_article_search.disabled=false;
						
                       var read_page = document.getElementById("read_page");
                       read_page.disabled=false;
					   
                       var button_article_edit = document.getElementById("button_article_edit");
                       button_article_edit.disabled=false;
					   
					   var button_article_del = document.getElementById("button_article_del");
                       button_article_del.disabled=false;
   
                     </script>
		        ';
			break;
		}//switch
	}//function html_cancel_form_a($par1) 
	
	
	function html_ajax_list_page($par1, $par2) //html code for ajax_list_page.php.php
	{
	    switch ($par1) 
	    {
            case 1:    
                $str2 = '<form id="form_number_page" name="name_form_number_page"  method="post">
			                <select id="select_number_page" name="name_select_number_page" size="1"  
						    multiple="multiple" onchange="select_page();">';
                for ($i = 1; $i <=$par2; $i++)
                {
                    $str2 = $str2.'<option value='.$i.'>'.$i.'</option>';
                }//for
                $str3 = '</select></form>';
                echo $str2.$str3;
			break;
		}//switch
	}//function html_ajax_list_page($par1, $par2)
	
	
	function html_ajax_list_page_read($par1, $par2, $par3) //html code for ajax_list_page_read.php.php
	{
	    switch ($par1) 
	    {
            case 1:   
			     $str2 = '<form id="form_number_page_read" name="name_form_number_page_read"  method="post">
			                       <select id="select_number_page_read" name="name_select_number_page_read" size="1"  
						                  multiple="multiple" onchange="select_page_read();">';
                for ($i = 1; $i <= $par2; $i++)
                {
		            if($par3 == $i)
				    {
				        $str2 = $str2."<option selected value=".$i.">'.$i.'</option>";
				    }//if
				    else
                    {$str2 = $str2.'<option value='.$i.'>'.$i.'</option>';}
                }//for
                $str3 = '</select></form>';
                echo $str2.$str3;
			break;
		}//switch
	}//function html_ajax_list_page_read($par1, $par2, $par3)
	
	
	function html_ajax_ajax_list_tag_read($par1, $par2) //html code for ajax_ajax_list_tag_read.php
	{
	    switch ($par1) 
	    {
            case 1:  
			   echo '
			        <script type="text/javascript">
			           var button_prev_page_read = document.getElementById("button_article_search_read");
                       button_prev_page_read.disabled=false;
                    </script>
				   ';
	    	    $str2 = '<form id="form_search_article_read" method="post">
		             <select id="search_page_article" name="search_article" size="1" onChange="StatusSearch_read();">';
		        for ($k = 0; $k < count($par2); $k++)
	            {
                     $str2 = $str2.'<option  value='.$par2[$k].'>'.$par2[$k].'</option>';
		        }//for
		       echo $str2.'</select></form>';
			break;
			case 2:  
	    	    echo '
					<script type="text/javascript">
			           var button_prev_page_read = document.getElementById("button_article_search_read");
                       button_prev_page_read.disabled=true;
                    </script>
		           ';
			break;
		}//switch
	}//function html_ajax_ajax_list_tag_read($par1, $par2) 
	
	
	function html_save_new_tag($par1, $par2) //  html code for save_new_tag.php
	{
	    global $lan, $_PSESSION;
		$lan = $_SESSION['lan'];
	    switch ($par1) 
	    {
            case 1: 
			    echo '
					<script type="text/javascript">
			           var button_prev_page_read = document.getElementById("button_prev_page_read");
                       button_prev_page_read.disabled=true;
			           var button_prev_page_read = document.getElementById("button_next_page_read");
                       button_prev_page_read.disabled=true;
                    </script>
		        ';
			
                $str1 = $lan["Tags"].':
			    <br />
			    '.$lan["Add_Tag"].':
			    <input id="Name_tag_auto" type="text" name="Name_tag" value="" size="30"   />
			    <input id="button_tag_add" type="button" name="tag_add" size="20" value="'.$lan["Save"].'" onClick="save_tag()" />
			    <br />
			    '.$lan["Select_Tag"].'
			       <select name="select_flag">
		        ';
	            $str2 = '';        
	            for ($i = 0; $i < count($par2); $i++)
	            {
	                $str2 = $str2.'<option>'.$par2[$i].'</option>';
	            }//for
	            $str3 = '</select>
	                <input id="button_tag_edit" type="button" name="tag_edit" size="20" value="'.$lan["Edit"].'" onClick="edit_tag()" />
			        <input id="button_del_tag" type="button" name="name_del_tag" size="20" value="'.$lan["Delete"].'" onClick="del_tag()" />			 
			        <br />
		        ';
	            echo $str1.$str2.$str3;
            break;
			case 2:  
		       echo '
	               <div id="messages_err">
		              <br/>
                      <img src="img/error.png" align="left">
		              <p align="center"><font color="red">'.$lan["Thereis_tag"].'<br/>
		              '.$lan["Press_OK_to_continue"].'</font></p><br/><br/>
                      <div id="button_ok">
				        <input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="ok_err_no_name_a()" />
                      </div>
                   </div><br>
	           ';
           break;
		}//switch			
	} //function html_save_new_tag($par1, $par2)
	
	function html_select_page2($par1, $par2, $par3) //  html code for select_page2.php
	{
	    global $lan, $_PSESSION;
		$lan = $_SESSION['lan'];
	    switch ($par1) 
	    {
            case 1: 
		       $str2 = '<form id="form_number_page" name="name_form_number_page"  method="post">
			            <select id="select_number_page" name="name_select_number_page" size="1"  
						        multiple="multiple" onchange="select_page();">';
	           for ($i = 1; $i <= $par3; $i++)
	           {
			       if($par2 == $i)
			       {$str2 = $str2.'<option selected value='.$i.'>'.$i.'</option>';}
				   else
	               {$str2 = $str2.'<option value='.$i.'>'.$i.'</option>';}
	           }//for
	           $str3 = '</select> </form>';
		       echo $str2.$str3;
		   
		       if($par3 < 2)
		       {
		           echo 
			       "
			           <script>
                            $('#button_prev_page').css('display', 'none');
                       </script>
			       ";
		       }//if
		       else
		       {
		          echo 
			      "
			       <script>
                        $('#button_prev_page').css('display', 'block');
                   </script>
			      ";
		       }//else
			break;
		}//switch			
	} //function html_select_page2($par1, $par2)
	
	function html_prev_page($par1) //  html code for select_page2.php
	{
	    global $lan, $_PSESSION;
		$lan = $_SESSION['lan'];
	    switch ($par1) 
	    {
            case 1: 
			    echo 
		        '
		     		<div id="articles_content1">
					</div>
                ';   
	            echo '<div id="articles_content2">';
			break;
			case 2: 
	            echo '</div>';
			break;
		}//switch			
	} //function html_prev_page($par1)
	
	function html_select_page2_read($par1) //  html code for select_page2_read.php
	{
	    global $_PSESSION;
	    switch ($par1) 
	    {
            case 1: 
               $current_page_read = $_PSESSION['current_page_read'];
	   
                $str2 = '<form id="form_number_page_read" name="name_form_number_page_read"  method="post">
			             <select id="select_number_page_read" name="name_select_number_page_read" size="1"  
						        multiple="multiple" onchange="select_page_read();">';
                for ($i = 1; $i <= $_PSESSION['all_pages_read']; $i++)
                {
		            if($current_page_read == $i)
				    {
				         $str2 = $str2.'<option selected value='.$i.'>'.$i.'</option>';
				    }//if
				    else
                    {$str2 = $str2.'<option value='.$i.'>'.$i.'</option>';}
                }//for
                $str3 = '</select></form>';
                echo $str2.$str3;
			break;
		}//switch			
	} //function html_select_page2_read
	
	function html_all_pages_read($par)//html code of all_pages_read.php
	{
	    global $lan, $_PSESSION;

	    switch ($par) 
	    {
           case 1:   
		       echo '
			        <script type="text/javascript">
			           var button_prev_page_read = document.getElementById("button_prev_page_read");
                       button_prev_page_read.disabled=true;
					   var button_next_page_read = document.getElementById("button_next_page_read");
                       button_next_page_read.disabled=true;
                    </script>
		           ';
		   break;
		   case 2:   
		       echo '
                    <script type="text/javascript">
			           var button_prev_page_read = document.getElementById("button_prev_page_read");
                       button_prev_page_read.disabled=false;
					   var button_next_page_read = document.getElementById("button_next_page_read");
                       button_next_page_read.disabled=false;
                    </script>
		           ';
		   break;
           case 3:  //hide and visible  buttons in #content_main3 and
		     echo 
		     '
		      <script type="text/javascript">
		        document.getElementById("button_prev_page").style.visibility = "hidden";
                document.getElementById("button_next_page").style.visibility = "hidden";
		        document.getElementById("many_pages").style.visibility = "hidden";
		        document.getElementById("select_page").style.visibility = "hidden";
	            document.getElementById("button_article_search").style.visibility = "hidden";
		        document.getElementById("button_article_add").style.visibility = "hidden";
		        document.getElementById("read_page").style.visibility = "hidden";
		        document.getElementById("button_article_edit").style.visibility = "hidden";
		        document.getElementById("button_article_del").style.visibility = "hidden";
		        document.getElementById("search_article").style.visibility = "hidden";
			    document.getElementById("searchform").style.visibility = "hidden";
	   
		        document.getElementById("button_prev_page_read").style.visibility = "visible";   
		        document.getElementById("button_next_page_read").style.visibility = "visible";
		        document.getElementById("many_pages_read").style.visibility = "visible";
		        document.getElementById("select_page_read").style.visibility = "visible";
	            document.getElementById("button_article_search_read").style.visibility = "visible";
		        document.getElementById("back_menu_article").style.visibility = "visible";	  
			    document.getElementById("searchform_read").style.visibility = "visible";
			    document.getElementById("search_article_read").style.visibility = "visible";
		        document.getElementById("button_prev_page_read").style.zIndex = "10";   
		        document.getElementById("button_next_page_read").style.zIndex = "10";
		        document.getElementById("many_pages_read").style.zIndex = "10";
		        document.getElementById("select_page_read").style.zIndex = "10";
	            document.getElementById("button_article_search_read").style.zIndex = "10";
		        document.getElementById("back_menu_article").style.zIndex = "10";
                document.getElementById("searchform_read").style.zIndex = "10";			 
			    document.getElementById("search_article_read").style.zIndex = "20";
		      </script>
		     ';
           break;
		}//switch
	}//function html_all_pages_read($par)
	
		
	function html_button_article_edit($par1,$par2,$par3,$par4)//html code of button_article_edit.php
	{
	    global $lan, $_PSESSION;

	    switch ($par1) 
	    {
           case 1:   
		      	//form for adding (editing) article
			 echo '
                  <style>
				      #forma_article{
						  z-index: 20;
					  } 
				  </style>
				  <script type="text/javascript">
				    try{document.getElementById("forma_article").style.visibility = "visible";}
					catch(e){}
				  </script>
		      ';
	         echo '
	         <form id="forma_article" name="forma_add_article"  method="post" action="">
			    <div id="title_forma_article"><h1>'.$lan["Forma_for_editing_article"].'</h1></div>
			    <div id="Name_article">
                            '.$lan["Name_article"].':<br />
							<input id="Name_article_auto" type="text" name="Name_article" value='.$par2.' size="135" maxlength="100"  autofocus/>
				</div>
				<div id="Content_article">
                            '.$lan["Text_article"].':<br />
							<textarea rows="20" cols="125" name="text_form_article" wrap="soft">'.$par3.'						
							</textarea> 							
				</div>
				<div id="bl_URL_adress">
				  '.$lan["URL_adress"].':<br />
					<input id="st_URL_adress" type="text" name="name_URL_adress"
		     ';
	         echo 		'value =""';
	         echo
		       '       size="128" maxlength="200" />
				</div>
				<div id="Article_Tags">
				  '.$lan["Tags"].':
			      <br />
			      '.$lan["Add_Tag"].':
			      <input id="Name_tag_auto" type="text" name="Name_tag" value="" size="30"   />
			      <input id="button_tag_add" type="button" name="tag_add" size="20" value="'.$lan["Save"].'" onClick="save_tag()" />
			      <br />
		       ';

	         if(count($par4) > 0)
	         {
	            $str2 = $lan["Select_Tag"].'<select name="select_flag">';
	            for ($kk = 0; $kk < count($par4); $kk++)
	            {
	                $str2 = $str2.'<option>'.$par4[$kk].'</option>';
	            }//for
	            $str3 = '</select>
	             <input id="button_tag_edit" type="button" name="tag_edit" size="20" value="'.$lan["Edit"].'" onClick="edit_tag()" />
			     <input id="button_del_tag" type="button" name="name_del_tag" size="20" value="'.$lan["Delete"].'" onClick="del_tag()" />			 
			     <br />
		        ';
	            echo $str2.$str3;
	         }//if
	         echo
	         '
		        </div>
  				<input id="button_submit_tag" type="button" name="name_submit_tag" size="100" value="'.$lan["Save"].'" onClick="edit_data_form_a()" />			 
				<input id="button_cancel_tag" type="button" name="name_cancel_tag" size="100" value="'.$lan["cancel"].'" onClick="cancel_form_a()" />			 
			 </form>
	         '; 
			 echo 
			    '
					 <script type="text/javascript">
						
                       var forma_article = document.getElementById("forma_article");
                       forma_article.disabled=false;
					   
                     </script>
		        ';
		     break;
		}//switch
	}//function html_button_article_edit
	
	function html_edit_data_form_a($par1,$par2,$par3)//html code of edit_data_form_a.php
	{
	    global $lan, $_PSESSION;

	    switch ($par1) 
	    {
           case 1:  
		       echo '
	               <div id="messages_err">
		              <br/>
                      <img src="img/error.png" align="left">
		              <p align="center"><font color="red">'.$lan["not_site"].'<br/>
		              '.$lan["Press_OK_to_continue"].'</font></p><br/><br/>
                      <div id="button_ok">
				        <input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="ok_err_no_name_a()" />
                      </div>
                   </div><br>
	           ';
           break;
		   case 2: 
		   	  echo '
	              <div id="messages_err">
		              <br/>
                      <img src="img/error.png" align="left">
		              <p align="center"><font color="red">'.$par2.'<br/>
		              '.$lan["Press_OK_to_continue"].'</font></p><br/><br/>
                      <div id="button_ok">
				        <input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="ok_err_no_name_a()" />
                      </div>
                 </div><br>
	           ';
		   break;
		   case 3:
		   	  echo 
				   '
	                 <div id="messages_err">
		                <br/>
                        <img src="img/error.png" align="left">
		                <p align="center"><font color="red">'.$lan["there_is_this_name_Article"].'<br/>
		                  '.$lan["Press_OK_to_continue"].'</font>
						</p><br/><br/>
                        <div id="button_ok">
				            <input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="ok_err_no_content_a()" />
                        </div>
                     </div><br>
	               ';
		    break;
			case 4:
	          echo '
	                <div id="messages_err">
		                <br/>
                        <img src="img/error.png" align="left">
		                <p align="center"><font color="red">'.$lan["not_Content_Article"].'<br/>
		                  '.$lan["Press_OK_to_continue"].'</font>
						</p><br/><br/>
                        <div id="button_ok">
				            <input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="ok_err_no_content_a()" />
                        </div>
                    </div><br>;
	             ';
			break;
			case 5: 
			 //Hide Article form
		      echo '
                  <style>
				      #forma_article{
                          display: none;
					  } 
					  #table1_articles{
                          display: block;
					  } 
				  </style>
		           ';
		      //rewrite articles table
              echo 
		      '
               table_articles();//call articles table (second time)
		      ';
			break;
		}//switch
	}//function html_edit_data_form_a
	
	function html_ok_err_no_name_a($par1,$par2)//html code of ok_err_no_name_a.php
	{
	    global $lan;

	    switch ($par1) 
	    {
           case 1:  
	        $str1 = $lan["Tags"].':
			  <br />
			  '.$lan["Add_Tag"].':
			  <input id="Name_tag_auto" type="text" name="Name_tag" value="" size="30"   />
			  <input id="button_tag_add" type="button" name="tag_add" size="20" value="'.$lan["Save"].'" onClick="save_tag()" />
			  <br />
			  '.$lan["Select_Tag"].'
			  <select name="select_flag">
		    ';
	        $str2 = '';
	        for ($i = 0; $i < count($par2); $i++)
	        {
	            $str2 = $str2.'<option>'.$par2[$i].'</option>';
	        }//for
	        $str3 = '</select>
	          <input id="button_tag_edit" type="button" name="tag_edit" size="20" value="'.$lan["Edit"].'" onClick="edit_tag()" />
			  <input id="button_del_tag" type="button" name="name_del_tag" size="20" value="'.$lan["Delete"].'" onClick="del_tag()" />			 
			  <br />
		    ';
	        echo $str1.$str2.$str3;
           break;
		}//switch
	}//function html_ok_err_no_name_a
	
	function html_ok_err_no_content_a($par1,$par2)//html code of ok_err_no_content_a.php
	{
	    global $lan;

	    switch ($par1) 
	    {
           case 1:  
	            $str1 = $lan["Tags"].':
			        <br />
			        '.$lan["Add_Tag"].':
			        <input id="Name_tag_auto" type="text" name="Name_tag" value="" size="30"   />
			        <input id="button_tag_add" type="button" name="tag_add" size="20" value="'.$lan["Save"].'" onClick="save_tag()" />
			        <br />
			        '.$lan["Select_Tag"].'
			        <select name="select_flag">
		        ';
	            $str2 = '';
	            for ($i = 0; $i < count($par2); $i++)
	            {
	                $str2 = $str2.'<option>'.$par2[$i].'</option>';
	            }//for
	            $str3 = '</select>
	              <input id="button_tag_edit" type="button" name="tag_edit" size="20" value="'.$lan["Edit"].'" onClick="edit_tag()" />
			      <input id="button_del_tag" type="button" name="name_del_tag" size="20" value="'.$lan["Delete"].'" onClick="del_tag()" />			 
			      <br />
		        ';
	            echo $str1.$str2.$str3;
           break;
		}//switch
	}//function html_ok_err_no_content_a
	
	function html_all_pages($par1,$par2,$par3)//html code of all_pages.php
	{
	    switch ($par1) 
	    {
            case 1:  
			
			    if($par2 == 0)//all pages = 0
			    { //hide buttons: prev, next, search, read, edit, delete
			        echo '
					 <script type="text/javascript">
					 
					   var button_prev_page = document.getElementById("button_prev_page");
                       button_prev_page.disabled=true;
					 	
					   var button_next_page = document.getElementById("button_next_page");
                       button_next_page.disabled=true;
						
					   var button_article_search = document.getElementById("button_article_search");
                       button_article_search.disabled=true;
						
                       var read_page = document.getElementById("read_page");
                       read_page.disabled=true;
					   
                       var button_article_edit = document.getElementById("button_article_edit");
                       button_article_edit.disabled=true;
					   
					   var button_article_del = document.getElementById("button_article_del");
                       button_article_del.disabled=true;
					   
                     </script>
		            ';
			    }//if
			    else //all pages > 0
			    {
			        echo 
					'
					 <script type="text/javascript">
					 
                       var read_page = document.getElementById("read_page");
                       read_page.disabled=true;
					   
                       var button_article_edit = document.getElementById("button_article_edit");
                       button_article_edit.disabled=true;
					   
					   var button_article_del = document.getElementById("button_article_del");
                       button_article_del.disabled=true;
					   
                     </script>
		            ';
					
				    if($par2 == 1) //all pages = 1
					{ //hide buttons: prev, next

			           echo '
					     <script type="text/javascript">
			              var button_prev_page = document.getElementById("button_prev_page");
                          button_prev_page.disabled=true;
					   
			              var button_next_page = document.getElementById("button_next_page");
                          button_next_page.disabled=true;
						  
                         </script>
		               ';	
					}//if
					else //all pages > 1
					{ //show buttons: prev, next, search, read, edit, delete

			           echo '
					     <script type="text/javascript">
			              var button_prev_page = document.getElementById("button_prev_page");
                          button_prev_page.disabled=false;
					   
			              var button_next_page = document.getElementById("button_next_page");
                          button_next_page.disabled=false;
						  
                         </script>
		               ';						 

					}//else
					
                    if((strlen($par3) > 0) and ($par3 != '^^^')) //there are tags
					{
			           echo '
					     <script type="text/javascript">
			               var button_article_search = document.getElementById("button_article_search");
                           button_article_search.disabled=false;
                         </script>
		               ';
					}//if
					else //there are not tags
					{
			           echo '
					     <script type="text/javascript">
			               var button_article_search = document.getElementById("button_article_search");
                           button_article_search.disabled=true;
                         </script>
		               ';					
					}//else

			    }//else

	        break;
		}//switch
	}//function html_all_pages
	
	function html_f_read_page($par1)//html code of html_f_read_page.php
	{
	    switch ($par1) 
	    {
            case 1: 
			    echo 
			    '
					 <script type="text/javascript">
						
                       var read_page = document.getElementById("read_page");
                       read_page.disabled=false;
					   
                       var button_article_edit = document.getElementById("button_article_edit");
                       button_article_edit.disabled=false;
					   
					   var button_article_del = document.getElementById("button_article_del");
                       button_article_del.disabled=false;
					   
                     </script>
		        ';
	        break;
		}//switch
	}//function html_html_f_read_page	
	
	function html_search_page($par1)//html code of search_page.php
	{
	    switch ($par1) 
	    {
            case 1: 
	           echo 
			    '
					 <script type="text/javascript">
						
                       var read_page = document.getElementById("read_page");
                       read_page.disabled=false;
					   
                       var button_article_edit = document.getElementById("button_article_edit");
                       button_article_edit.disabled=false;
					   
					   var button_article_del = document.getElementById("button_article_del");
                       button_article_del.disabled=false;
					   					   
                     </script>
		        ';

	  
		    break;
	    }//switch
	}//function html_html_f_read_page	    
?>
