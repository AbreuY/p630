<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');

#checkUserTypeLogSession:-
$userType = ($_SESSION['advisor_type']=="Advisor")? $_SESSION['advisor_type']: $_SESSION['user_type'];
checkUserTypeLogSession($userType);

#View:
$smarty->display('../templates/registration/register.tpl');
?>