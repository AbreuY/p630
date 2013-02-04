<?php
	
#RequirFile:
require_once('../pi_classes/commonSetting.php');

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);
}
	header("Location: home");

?>