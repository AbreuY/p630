<?php
#RequiresFiles:
require_once("../../../pi_classes/commonSetting.php");
include('../../../pi_classes/User.php');

#Objects:
$objAdv	=	new User();

$table_name ="advisor_details";
$whereCnd=" where advisor_id =".$_SESSION['advisor_id'];
$objAdv->retrieve_data_from_table($table_name, $whereCnd);
$objAdv->getRow();

if($_REQUEST['old_pass'] == base64_decode($objAdv->getField('password'))){
	die("true");
}
else{
	die("false");	
}


?>