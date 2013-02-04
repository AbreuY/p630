<?php
	
#RequirFile:
require_once('../pi_classes/commonSetting.php');

if(isset($_SESSION['advisor_id']))
{
	unset($_SESSION['advisor_id']);
}
	header("Location: home");

?>