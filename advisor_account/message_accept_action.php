<?php 
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckAdvisorSession:
checkAdvisorSession($_SESSION['advisor_id']);

$mid = $_GET['mid'];
//header("Location: ".site_path."message-advisor-payment/".$mid);
//die($mid);
$objMsg = new User();
$table_name = "message";
$set = "`status` = 'accepted'";
$where = " where `advisor_id` = ".$_SESSION['advisor_id']." and `message_id` = '".$mid."'";
$objMsg->update_record_in_table($table_name,$set,$where);

header("Location: ".site_path."message-advisor-payment/".$mid);
?>