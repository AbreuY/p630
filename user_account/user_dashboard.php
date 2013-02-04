<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');

#CheckUserLogin:
checkUserSession($_SESSION['user_id']);

#Variables:
$smarty->assign('user_id',$_SESSION['user_id']);

#View:
$smarty->display('../templates/user_account/user_dashboard.tpl');
?>