<?php 
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckUserLogin:
checkUserSession($_SESSION['user_id']);

$mid = $_GET['mid'];
//obj
$objMsg = new User();

//Action get message
$table_name = "message";
$where = " where `user_id` = ".$_SESSION['user_id']." and `message_id` = '".$mid."'";
$objMsg->retrieve_data_from_table($table_name,$where);
$message = $objMsg->getAllRow();

#Action :: Show Message Files-
$objFiles = clone $objMsg;
$table_name = "message_file";
$where = " where `message_id` = ".$message['message_id'];
$objFiles->retrieve_data_from_table($table_name,$where);
$show_file = false;
$indx = "1"; 
while($temp = $objFiles->getAllRow()){
	$show_file = true;
	$temp['indx'] = $indx;
	$files[] = $temp;
	$indx++;
}
$smarty->assign('files', $files);
$smarty->assign('show_file', $show_file);

#Action :: Show User details-
$objUsr = clone $objMsg;
$table_name = "user_details";
$where = " where `user_id` = ".$message['user_id'];
$objUsr->retrieve_data_from_table($table_name,$where);
$user = $objUsr->getAllRow();

#Action :: Show Adv details-
$objAdv = clone $objMsg;
$table_name = "advisor_details";
$where = " where `advisor_id` = ".$message['advisor_id'];
$objAdv->retrieve_data_from_table($table_name,$where);
$adv = $objAdv->getAllRow();


$objChat = new User();
$table_name = "clarify_msg";
$where = " where `message_id` = '".$mid."' order by `date` ASC";
$objChat->retrieve_data_from_table($table_name, $where);
$chat = "";
$objChatUP = clone $objChat;
$table1 = "clarify_msg";
$set1 = "`new` = '0'";
while($temp = $objChat->getAllRow()){
	if($temp['from_user'] == '0'){
		$name = $user['username'];
		if($temp['new'] == '1'){
			$where1 = " where `clarify_msg_id` = '".$temp['clarify_msg_id']."'";
			$objChatUP->update_record_in_table($table1, $set1, $where1);
		}
	}
	elseif($temp['from_user'] == '1'){
		$name = $adv['first_name'];
	}
	$chat .= "<div>".$name."--><span>".$temp['content']."</span></div>";
	
}

$smarty->assign('message', $message);
$smarty->assign('user', $user);
$smarty->assign('adv', $adv);
$smarty->assign('chat', $chat);
#View:
$smarty->display('../templates/user_account/message_user_payment.tpl');

?>

