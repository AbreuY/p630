<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckUserLogin:
checkAdvisorSession($_SESSION['advisor_id']);

extract($_POST);

$objReply = new User();

$date = date('Y-m-d H:i:s');

$table_name="communication_reply";
$field="`from`, `to`, `from_type`, `new_flag`, `message`, `communication_id`, `date`";
$value="'".$_SESSION['advisor_id']."', '".$to."', '1', '1', '".$reply_con."', '".$cid."', '".$date."'";
$objReply->insert_row_in_table($table_name,$field,$value);

$objUD = clone $objReply;

$table_name="communication";
$set_fields="`date_updated` = '".$date."', `new_usr` = '1'";
$where_field=" where communication_id = '".$cid."'";
$objUD->update_record_in_table($table_name, $set_fields, $where_field);

header("location: ".site_path."communication-detail/".$cid);

?>