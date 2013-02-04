<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');
extract($_POST);
$date = date('Y-m-d H:i:s');
if($from == "advisor"){
	$from_user = "1";
}
else if($from == "user"){
	$from_user = "0";
}


$objChat = new User();
$table = "clarify_msg";
$fields = "`message_id`, `from_user`, `content`, `date`, `new`";
$values = "'".$mid."', '".$from_user."', '".addslashes($content)."', '".$date."', '1'";
$objChat->insert_row_in_table($table,$fields,$values);


echo"<div>".$name."--><span>".$content."</span></div>";

?>