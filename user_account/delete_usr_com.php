<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

$cid = $_GET['cid'];

$objDel = new User();
$table = "communication";
$set = "`del_usr` = '1'";
$where = " where `communication_id` = ".$cid;
$objDel->update_record_in_table($table,$set,$where);

header("Location: ".site_path."user-communication"); 
?>