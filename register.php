<?php
// Start the session
session_start();
?>

<html>

<?php
     include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
     $securimage = new Securimage();
     $default_type = 0;
     if($_POST['newsletter'] == 1)
     $news = 1;
     else
     $news = 0;
     require('./database_connection.php');
     if(strcmp($_POST['parola'],$_POST['confirmare_parola']) == 0)
     {
       if($securimage->check($_POST['captcha_code']) == true)
       {
        $query = 'insert into user(last_name,first_name,email,username,password,type,newsletter)
                  values("'.$_POST['nume'].'","'.
                  $_POST['prenume'].'","'.
                  $_POST['email'].'","'.
                  $_POST['username'].'","'.
                  crypt($_POST['parola'],'criptografie').'",'.
                  $default_type.','.
                  $news.')';			
        $result=mysql_query($query,$con);  
        mysql_close($con);
     	echo "<script>window.location = 'home_page.php?page=home';</script>";
        }
        else
         {
            
            echo "Codul de securitate introdus nu a fost corect.<br /><br />"; 
            echo "Mergeti <a href='javascript:history.go(-1)'>inapoi</a> si incercati din nou."; 
            exit; 

         }
      }
      else
      {
	 echo '<br><p> Introduceti acceasi parola pentru confirmare </p>';
      }

?>

</html>