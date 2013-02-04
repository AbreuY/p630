<?php 
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckUserLogin:
checkUserSession($_SESSION['user_id']);

#objects:
$objWebCam = new User();

#GetVaribales-
$wid = $_GET['wid'];

#Action :: Get webcam details - 
	$table_name = "webcam";
	$where = " where `user_id` = ".$_SESSION['user_id']." and `webcam_id` = '".$wid."'";
	$objWebCam->retrieve_data_from_table($table_name,$where);
	$webcam = $objWebCam->getAllRow();
	$webcam['date_1'] = date('dS M Y \a\t g:iA',strtotime($webcam['date_1']));
	$webcam['date_2'] = date('dS M Y \a\t g:iA',strtotime($webcam['date_2']));
	$webcam['date_3'] = date('dS M Y \a\t g:iA',strtotime($webcam['date_3']));
	#@-
	$smarty->assign('webcam', $webcam);
	
#Action :: Get webcam details Files - 
	#clone:
	$objFiles = clone $objWebCam;
	#@-
	$table_name = "webcam_file";
	$where = " where `webcam_id` = ".$webcam['webcam_id'];
	$objFiles->retrieve_data_from_table($table_name,$where);
	$show_file = false;
	$indx = '1';
	while($temp = $objFiles->getAllRow()){
		$show_file = true;
		$temp['indx'] = $indx;
		$files[] = $temp;
		$indx++;
	}
	#@-
	$smarty->assign('files', $files);
	$smarty->assign('show_file', $show_file);


#Action :: Get User details - 
	#clone:
	$objUsr = clone $objWebCam;
	#@-
	$table_name = "user_details";
	$where = " where `user_id` = ".$webcam['user_id'];
	$objUsr->retrieve_data_from_table($table_name,$where);
	$user = $objUsr->getAllRow();
	#@-
	$smarty->assign('user', $user);

#Action :: Get advisor details - 
	#clone:
	$objAdv = clone $objWebCam;
	#@-
	$table_name = "advisor_details";
	$where = " where `advisor_id` = ".$webcam['advisor_id'];
	$objAdv->retrieve_data_from_table($table_name,$where);
	$adv = $objAdv->getAllRow();
	$adv['will_get'] = $webcam['duration'] * ($adv['priceWebConsulte'] - ($adv['priceWebConsulte'] * $globalSettingArr['FIRST_CONSULTATIONS_COST']/100));
	#@-
	$smarty->assign('adv', $adv);	

#View:
$smarty->display('../templates/user_account/userwebcam_accept_detail.tpl');
?>

