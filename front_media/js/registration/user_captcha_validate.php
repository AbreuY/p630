<?php
session_start();
	$cap = $_REQUEST['captchaword'];		
	
	
	if($cap != $_SESSION['captcha']['code'])
	{
		die("false");
	}
	else{
		die("true");
	}
?>