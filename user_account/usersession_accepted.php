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
	$where = " where `user_id` = ".$_SESSION['user_id']." and `status` = 'accepted'";
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

#Action :: Get Info of Message Request by user to adv-
	#clone:
	$objMsg = $objSes;
	$table_name = "message";
	$where = " where `user_id` = ".$_SESSION['user_id']." and `status` = 'accepted'";
	$objMsg->retrieve_data_from_table($table_name,$where);
	while($temp = $objMsg->getAllRow()){
		$message[] = $temp;
	} 		


$smarty->assign('webcam', $webcam);
$smarty->assign('message', $message); 		
	
#View:
$smarty->display('../templates/user_account/usersession_accepted.tpl');
?>
