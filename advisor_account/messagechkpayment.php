<?php 
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckAdvisorSession:
checkAdvisorSession($_SESSION['advisor_id']);


#Obj
$objSes = new User();
# GET Vars
$mid = $_GET['mid'];

#Action : get message details
$table_name = "message";
$where = " where `message_id` = ".$mid." and `status` = 'accepted'";
$objSes->retrieve_data_from_table($table_name,$where);
$message = $objSes->getAllRow();

if($message['paid'] == 'n'){
	header("Location: ".site_path."message-advisor-payment/".$mid);
}
elseif($message['paid'] == 'y'){
	header("Location: ".site_path."");
}
?>