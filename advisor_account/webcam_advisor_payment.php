<?php 
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckAdvisorSession:
checkAdvisorSession($_SESSION['advisor_id']);

$wid = $_GET['wid'];

$objWebCam = new User();
$table_name = "webcam";
$where = " where `advisor_id` = ".$_SESSION['advisor_id']." and `webcam_id` = '".$wid."'";
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

$objUsr = clone $objWebCam;
$table_name = "user_details";
$where = " where `user_id` = ".$webcam['user_id'];
$objUsr->retrieve_data_from_table($table_name,$where);
$user = $objUsr->getAllRow();

$objAdv = clone $objWebCam;
$table_name = "advisor_details";
$where = " where `advisor_id` = ".$_SESSION['advisor_id'];
$objAdv->retrieve_data_from_table($table_name,$where);
$adv = $objAdv->getAllRow();
//$adv['will_get'] = $webcam['duration'] * ($adv['priceWebConsulte'] - ($adv['priceWebConsulte'] * $globalSettingArr['FIRST_CONSULTATIONS_COST']/100));

$smarty->assign('webcam', $webcam);
$smarty->assign('user', $user);
$smarty->assign('adv', $adv);//echo("<pre>");print_r($webcam);die("here");
#View:
$smarty->display('../templates/advisor_account/webcam_advisor_payment.tpl');

?>

