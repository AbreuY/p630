<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');



extract($_POST);
#Objects
	$objFile = new User();
#GetCategory:
	$table_name ="files";
	$set = "`name` = '".$name."'";
	$whereCnd = " where `file_id` = ".$id;
	$objFile->update_record_in_table($table_name,$set,$whereCnd);
	
	echo "<div id='user_interface_msg' class='succes_msg'> Name of the file has been updated successfully.<span id='msg_close'><img id='msg_close' src='".site_path."front_media/images/close.png' alt='Close'/></span></div>";


?>