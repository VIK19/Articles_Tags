<?php

echo '
	     <div id="messages_ok">
		  <br/>
		  <img src="img/111.png" align="left" color="#30a0c6";>
		  <p align="center"><font>lang прошла успешно!<br/><br/>
		  Для продолжения нажмите ОК </font></p><br/><br/>
		  <div id="button_ok">
				<input  id="button_ok2" type="button"  align="middle" name="ok_reg" value="OK" onClick="out_autoriz_ok()" />
          </div>
         </div><br>';
 
// lang_server.php - определение выбранного языка
//  $lang = iconv("UTF-8", "Windows-1251", $_POST['par_lang']);
//echo  'lang = '.$lang; 
//  $lan = parse_ini_file('txt/'.$lang.".ini"); //Открываем соответствующий языковой файл 
//echo $lan["10"]; //Выводим значение языковой константы 
?>