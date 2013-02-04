<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
include("../captcha/simple-php-captcha.php");
$_SESSION['captcha'] = captcha();

#AssignVar:
$smarty->assign('captchaimg', $_SESSION['captcha']['image_src']);

#View:
$smarty->display('../templates/registration/register_as_advisor.tpl');
?>