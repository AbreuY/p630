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
	$pend_webcam[] = $temp;
}
//echo"<pre>";print_r($pend_webcam);die;
$objSesPd = clone $objSes;
$where = " where `advisor_id` = ".$_SESSION['advisor_id']." and `status` = 'accepted' and `paid` = 'y' order by `date_paid` DESC";
$objSesPd->retrieve_data_from_table($table_name,$where);
while($temp = $objSesPd->getAllRow()){
	$paid_webcam[] = $temp;
} 		



//echo"<pre>";print_r($webcam);die("hello");
$objMsg = clone $objSes;
$table_name = "message";
$where = " where `advisor_id` = ".$_SESSION['advisor_id']." and `status` = 'pending' order by `date_created` DESC";
$objMsg->retrieve_data_from_table($table_name,$where);
while($temp = $objMsg->getAllRow()){
	$pend_message[] = $temp;
}
$objMsgPd = clone $objSes;
$where = " where `advisor_id` = ".$_SESSION['advisor_id']." and `status` = 'accepted' and `paid` = 'y' order by `date_paid` DESC";
$objMsgPd->retrieve_data_from_table($table_name,$where);
while($temp = $objMsgPd->getAllRow()){
	$paid_message[] = $temp;
}  		
//echo"<pre>";print_r($message);die("hello");

$smarty->assign('pend_webcam', $pend_webcam);
$smarty->assign('pend_message', $pend_message);
$smarty->assign('paid_webcam', $paid_webcam);
$smarty->assign('paid_message', $paid_message);
 		
	
#View:
$smarty->display('../templates/advisor_account/advisor_dashboard.tpl');
?>	