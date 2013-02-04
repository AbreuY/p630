<?php 
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckUserLogin:
checkUserSession($_SESSION['user_id']);

#Objects:
$objWebCam = new User();

#Get Var:
$wid = $_GET['wid'];

#Action ::
	$table_name = "webcam";
	$where = " where `user_id` = ".$_SESSION['user_id']." and `webcam_id` = '".$wid."'";
	$objWebCam->retrieve_data_from_table($table_name,$where);
	$webcam = $objWebCam->getAllRow();
	if($webcam['date_accept'] == '1'){
			$webcam['date'] = date('dS M Y \a\t g:iA' , strtotime($webcam['date_1']));
	}
	if($webcam['date_accept'] == '2'){
		$webcam['date'] = date('dS M Y \a\t g:iA' , strtotime($webcam['date_2']));
	}
	elseif($webcam['date_accept'] == '3'){
		$webcam['date'] = date('dS M Y \a\t g:iA' , strtotime($webcam['date_3']));
	}


#@~Action :: Webcamp session file-
	$objFiles = clone $objWebCam;
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
	$smarty->assign('files', $files);
	$smarty->assign('show_file', $show_file);

#Action::
	#clone:
	$objUsr = clone $objWebCam;
	$table_name = "user_details";
	$where = " where `user_id` = ".$webcam['user_id'];
	$objUsr->retrieve_data_from_table($table_name,$where);
	$user = $objUsr->getAllRow();

	#clone:
	$objAdv = clone $objWebCam;
	#@-
	$table_name = "advisor_details";
	$where = " where `advisor_id` = ".$webcam['advisor_id'];
	$objAdv->retrieve_data_from_table($table_name,$where);
	$adv = $objAdv->getAllRow();
	
	$webcam['cost'] = $webcam['duration'] * $adv['priceWebConsulte'];;
	#@-
	$smarty->assign('webcam', $webcam);
	$smarty->assign('user', $user);
	$smarty->assign('adv', $adv);
	
#View:
$smarty->display('../templates/user_account/webcam_user_payment.tpl');

?>

