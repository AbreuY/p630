<?php
	session_start();
	 unset($_SESSION['admin_id']);
	 unset($_SESSION['username']);	 
	 unset($_SESSION['admin_email']);
	#session_destroy();
	header("location:login.php");
?>