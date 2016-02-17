<?php
	session_start();
	//if(isset($_SESSION["username"]) && !empty($_SESSION["username"])){
	//	echo "<script>window.location = 'home_page.php';</script>";
	//}
?>
<html>
<?php
$username = $_POST['username'];
$parola = $_POST['parola'];

require('./database_connection.php');
$query = 'select password,type from user where username = "'.$username.'"';
$query2 = 'insert into login(username,date_time)values("'.
           $username.'","'. date("Y-m-d h:i:s").'")';
$result = mysql_query($query);
$row= mysql_fetch_row($result);
if( crypt($parola,'criptografie') == $row[0])
{
  $_SESSION["username"] = $_username;
  $_SESSION["type"] = $row[1];
  mysql_query($query2);
  mysql_close($con);
  echo "<script>window.location = 'home_page.php?page=home';</script>";
}
else
{
  echo 'Username sau parola incorecte!';
}
?>
</html>
