<?php
	session_start();
	//if(isset($_SESSION["username"]) && !empty($_SESSION["username"])){
	//	echo "<script>window.location = 'home_page.php';</script>";
	//}
?>
<!DOCTYPE html>
<?php
if(isset($_REQUEST['autor']) && !empty($_REQUEST['autor']) &&
   isset($_REQUEST['titlu']) && !empty($_REQUEST['titlu']) )
{
  require('./database_connection.php');
  $query = "delete from book where author='".$_REQUEST['autor']."'and title='".
                                             $_REQUEST['titlu']."'";
   mysql_query($query,$con);
   mysql_close($con);
   echo "<script>window.location = 'home_page.php?page=admin';</script>";
}

?>

</html>