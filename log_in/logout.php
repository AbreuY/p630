<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');

if(strcmp($_SESSION['user_type'],'User')==0)
{
	unset($_SESSION['user_id']);
	unset($_SESSION['user_type']);
	unset($_SESSION['user_email']);	
}elseif(strcmp($_SESSION['advisor_type'],'Advisor')==0){
	unset($_SESSION['advisor_id']);
	unset($_SESSION['advisor_type']);
	unset($_SESSION['advisor_email']);
}
elseif(isset($_SESSION['advisor_id_IA'])){
	unset($_SESSION['advisor_id_IA']);
}

header("Location:".site_path."home");exit;
?>