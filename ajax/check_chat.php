<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');
extract($_POST);
if($from == "advisor"){
	$from_user = "0";
}
else if($from == "user"){
	$from_user = "1";
}
$objChat = new User();
$table = "clarify_msg";
$where = " where `message_id` = '".$mid."' and `from_user` = '".$from_user."' and `new` = '1' order by `date` ASC";
$objChat->retrieve_data_from_table($table, $where);
$objChatUP = clone $objChat;
if($objChat->numofrows()){
	while($tempArr = $objChat->getAllRow()){
		$table = "clarify_msg";
		$set = "`new` = '0'";
		$where = " where `clarify_msg_id` = '".$tempArr['clarify_msg_id']."'";
		$objChatUP->update_record_in_table($table, $set, $where);
		echo"<div>".$name."--><span>".stripslashes($tempArr['content'])."</span></div>";
	}
}else{
	die;
}


?>