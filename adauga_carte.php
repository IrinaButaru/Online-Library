<?php
	session_start();
?>
<?php

require('./database_connection.php');
$query = 'insert into book(title,author,link,category)values("'.
          $_POST['titlu'].'","'.
          $_POST['autor'].'","'.
          $_POST['link'].'","'.
          $_POST['categorie'].'")';

//if($_SESSION["user"] == 1) 
{mysql_query($query,$con);
 echo "<script>window.location = 'home_page.php?page=admin';</script>";
}  
mysql_close($con);

?>