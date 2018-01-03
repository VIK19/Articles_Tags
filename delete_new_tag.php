<?php  //Save tag after editing
	session_start();
// echo '==============';
	global $lang, $lan,  $autor_registr;
	
	if (isset($_SESSION['lang2']))
	{
	  if ($_SESSION['lang2'] == 'eng')
	  {
			$lang = 'eng';
	  }
	  else
	  {
	  	    $lang = 'rus';
	  }
	}
	else
	{
		$lang = 'eng';
		$_SESSION['lang2']='eng';
	}

	if (!file_exists('txt/'.$lang.".ini")) echo "File 'txt/'.$lang.'.ini' not exist";
	else $lan = parse_ini_file('txt/'.$lang.".ini");
	
	# Подключаем конфиг
    include 'config.php';
    
	$ar_new_tags = array();
	$delete_newtag = $_GET['q'];

	for ($i = 0; $i < count($_SESSION['ar_tags']); $i++)
	{
	  if($_SESSION['ar_tags'][$i] == $delete_newtag)
	  {
	    $_SESSION['ar_tags'][$i] = '';

	  }//if
	}//for
	$k = 0;
	for ($i = 0; $i < count($_SESSION['ar_tags']); $i++)
	{
	  if($_SESSION['ar_tags'][$i] != '')
	  {
	    $ar_new_tags[$k] = $_SESSION['ar_tags'][$i];

		$k++;
	  }//if
	}//for
	
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
	for ($i = 0; $i < count($ar_new_tags); $i++)
	{
	  $str2 = $str2.'<option>'.$ar_new_tags[$i].'</option>';
	}//for
	$str3 = '</select>
	         <input id="button_tag_edit" type="button" name="tag_edit" size="20" value="'.$lan["Edit"].'" onClick="edit_tag()" />
			 <input id="button_del_tag" type="button" name="name_del_tag" size="20" value="'.$lan["Delete"].'" onClick="del_tag()" />			 
			 <br />
		  ';
	echo $str1.$str2.$str3;
	
?>