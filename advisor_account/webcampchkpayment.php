<?php 
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckAdvisorSession:
checkAdvisorSession($_SESSION['advisor_id']);


#Obj
$objSes = new User();
# GET Vars
$wid = $_GET['wid'];

#Action : get webcam details
$table_name = "webcam";
$where = " where `webcam_id` = ".$wid." and `status` = 'accepted'";
$objSes->retrieve_data_from_table($table_name,$where);
$webcam = $objSes->getAllRow();

if($webcam['paid'] == 'n'){
	header("Location: ".site_path."webcam-advisor-payment/".$wid);
}
elseif($webcam['paid'] == 'y'){
	header("Location: ".site_path."");
}
?>