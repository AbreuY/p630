<?php 
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckAdvisorSession:
checkAdvisorSession($_SESSION['advisor_id']);

$objSes = new User();
$table_name = "webcam";
$where = " where `advisor_id` = ".$_SESSION['advisor_id']." and `status` = 'pending' order by `date_created` DESC";
$objSes->retrieve_data_from_table($table_name,$where);
while($temp = $objSes->getAllRow()){
	$webcam[] = $temp;
}
//echo"<pre>";print_r($webcam);die("hello");
$objMsg = clone $objSes;
$table_name = "message";
$where = " where `advisor_id` = ".$_SESSION['advisor_id']." and `status` = 'pending' order by `date_created` DESC";
$objMsg->retrieve_data_from_table($table_name,$where);
while($temp = $objMsg->getAllRow()){
	$message[] = $temp;
} 		
//echo"<pre>";print_r($message);die("hello");

$smarty->assign('webcam', $webcam);
$smarty->assign('message', $message);
#View:
$smarty->display('../templates/advisor_account/session_pending.tpl');
?>	