<?php
//REQUIRED FILE :
	require_once("../pi_classes/commonSetting.php");
	include('../pi_classes/User.php');
	
$mid = $_GET['mid'];
$objCheck = new User();
$table =	"message";
$where = 	" where `message_id` = ".$mid." and `advisor_id` = ".$_SESSION['advisor_id'];
$objCheck->retrieve_data_from_table($table, $where);
if(!$objCheck->numofrows()){
	header("Location: ".site_path."session-pending");exit;
}

$objReject = new User();
$set = "`status` = 'rejected'";

$objReject->update_record_in_table($table,$set,$where);
	header("Location: ".site_path."session-pending");
?>