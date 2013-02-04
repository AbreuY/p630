<?php 
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckAdvisorSession:
checkAdvisorSession($_SESSION['advisor_id']);

extract($_GET);
//header("Location: ".site_path."webcam-advisor-payment/".$wid);die;

$objMsg = new User();
$table_name = "webcam";
$set = "`status` = 'accepted', `date_accept` = '".$dat."'";
$where = " where `advisor_id` = ".$_SESSION['advisor_id']." and `webcam_id` = '".$wid."'";
$objMsg->update_record_in_table($table_name,$set,$where);

header("Location: ".site_path."webcam-advisor-payment/".$wid);
?>