<?php 
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckUserLogin:
checkUserSession($_SESSION['user_id']);

#Objects:
$objSes = new User();

#Action :: Get Info of webcam Request by user to adv-
	$table_name = "webcam";
	$where      = " where `user_id` = ".$_SESSION['user_id']." and `status` = 'pending' order by `date_created` DESC";
	$objSes->retrieve_data_from_table($table_name,$where);
	while($temp = $objSes->getAllRow()){
		$webcam[] = $temp;
	}


#Action :: Get Info of Message Request by user to adv-
	#clone:
	$objMsg = clone $objSes;
	$table_name = "message";
	$where      = " where `user_id` = ".$_SESSION['user_id']." and `status` = 'pending' order by `date_created` DESC";
	$objMsg->retrieve_data_from_table($table_name,$where);
	while($temp = $objMsg->getAllRow()){
		$message[] = $temp;
	} 		
	//echo"<pre>";print_r($message);die("hello");

$smarty->assign('webcam', $webcam);
$smarty->assign('message', $message);
#View:
$smarty->display('../templates/user_account/usersession_pending.tpl');
?>	