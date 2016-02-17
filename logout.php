<?php 
	session_start();
	session_unset();
        session_destroy();
echo "<script>window.location = 'home_page.php?page=home';</script>";
?>