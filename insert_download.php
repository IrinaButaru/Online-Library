<?php
require('./database_connection.php');
$query = "insert into download(user_id,book_id,date)values(".
          $_REQUEST["id_carte"].",".
          $_REQUEST["id_user"].",".
          date("Y-m-d h:i:s").")";
mysql_query($query,$con); 
mysql_close($con);
?>
