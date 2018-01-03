<?php  //Edit or delet new tag
	session_start();
// echo '==============';
	global $lang, $lan,  $autor_registr;
	
    //changing language
    include 'language.php';
	
	# Подключаем конфиг
    include 'config.php';

	$edit_newtag = $_GET['q'];
	for ($i = 0; $i < count($_SESSION['ar_tags']); $i++)
	{
	  if($_SESSION['ar_tags'][$i] == $edit_newtag)
	  {
	    $_SESSION['n_last_tag']=$i;
	  }//if
	}//for

	

   $str1 = $lan["Edit_Tag"].
           '
			 <input id="st_Edit_Del_Tag" type="text" name="edit_tag" value="'.$edit_newtag.'" size="30"   />
			 <input id="button_save_edit_tag" type="button" name="name_save_edit_tag" size="20" value="'.$lan["Save"].'" onClick="save_edit_tag()" />
		   ';
   echo $str1;
?>