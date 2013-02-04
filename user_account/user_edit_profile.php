<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckUserLogin:
checkUserSession($_SESSION['user_id']);

#Objects:
$objUser = new User();

	$table_name = "user_details";
	$whereCnd = " where user_id = '".$_SESSION['user_id']."'";
	$objUser->retrieve_data_from_table($table_name, $whereCnd);
	$objUser->getRow();

	#Other Step:
	$smarty->assign('username', $objUser->getField('username'));
	$smarty->assign('bank', $objUser->getField('bank_code'));
	$smarty->assign('branch', $objUser->getField('branch_code'));
	$smarty->assign('iban', $objUser->getField('IBAN_code'));
	$smarty->assign('pass', base64_decode($objUser->getField('password')));
	$smarty->assign('email', $objUser->getField('email'));
	$smarty->assign('image_path', $objUser->getField('image_path'));
	$smarty->assign('user_id', $_SESSION['user_id']);
	
	
	#View:
	$smarty->display('../templates/user_account/user_edit_profile.tpl');
?>