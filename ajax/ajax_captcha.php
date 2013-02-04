<?php
	require_once('../pi_classes/commonSetting.php');
include("../captcha/simple-php-captcha.php");

$_SESSION['captcha'] = captcha();

#AssignVar:
$captchaimg = $_SESSION['captcha']['image_src'];


echo '<img src='.$captchaimg.' width="226" height="100">';
?>