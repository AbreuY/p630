<?php 
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckAdvisorSession:
checkAdvisorSession($_SESSION['advisor_id']);
 		
$objSes = new User();
$table_name = "webcam";
$where = " where `advisor_id` = ".$_SESSION['advisor_id']." and `status` = 'accepted'";
$objSes->retrieve_data_from_table($table_name,$where);
while($temp = $objSes->getAllRow()){
	if($temp['date_accept'] == '1'){
		$temp['date'] = date('dS M Y \a\t g:iA',strtotime($temp['date_1']));
	}
	if($temp['date_accept'] == '2'){
		$temp['date'] = date('dS M Y \a\t g:iA',strtotime($temp['date_2']));
	}
	elseif($temp['date_accept'] == '3'){
		$temp['date'] = date('dS M Y \a\t g:iA',strtotime($temp['date_3']));
	}
	$webcam[] = $temp;
}
//echo"<pre>";print_r($webcam);die("hello");
$objMsg = $objSes;
$table_name = "message";
$where = " where `advisor_id` = ".$_SESSION['advisor_id']." and `status` = 'accepted'";
$objMsg->retrieve_data_from_table($table_name,$where);
while($temp = $objMsg->getAllRow()){
	$message[] = $temp;
} 		
//echo"<pre>";print_r($message);die("hello");

$smarty->assign('webcam', $webcam);
$smarty->assign('message', $message); 		
	
#View:
$smarty->display('../templates/advisor_account/session_accepted.tpl');
?>
