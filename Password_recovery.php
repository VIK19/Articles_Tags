<?php  //�������������� ������
if (isset($_POST['submit'])){     
    $login = $_POST['login'];
    $email = $_POST['email'];
                
    if (empty($login)){
        echo "������� �����!";
    }
    elseif (empty($email)){
        echo "������� e-mail!";
    }
   else{
        $resultat = mysql_query("SELECT * FROM users WHERE login = '$login' AND email = '$email'");
        $array = mysql_fetch_array($resultat);
        if (empty($array)){
            echo '������! ������ ������������ �� ����������';
        }
        elseif (mysql_num_rows($resultat) > 0){
        $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
        $max=10; 
        $size=StrLen($chars)-1; 
        $password=null; 

        while($max--) {
              $password.=$chars[rand(0,$size)]; 
        }
        $newmdPassword = md5($password); 
        $title = '������������� ������ ������������ '.$login.' ��� ����� Site.ru!';
        $letter = '�� ��������� �������������� ������ ��� �������� '.$login.' �� ����� Site.ru \r\n��� ����� ������: '.$password.'\r\n� ��������� ������������� ����� Site.ru';
// ���������� ������
        if (mail($email, $title, $letter, "Content-type:text/plain; Charset=windows-1251\r\n")) {
             mysql_query("UPDATE users SET password = '$newmdPassword' WHERE login = '$login'  AND email = '$email'");
        echo '����� ������ ��������� �� ��� e-mail!<br><a ref="index.php">������� ��������</a>';
         }
      }                              
   }
}
mysql_close();
?>