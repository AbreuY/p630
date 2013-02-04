<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');


#Objects
	$objUser = new User();

#GetVar:
	$advisorId	= $_GET['aid'];
	$smarty->assign("aid", $advisorId);
#GetData~~~personal info
	$objDet = clone $objUser;
	$table_name='advisor_details';
	$whereCnd=' where `advisor_id` = '.$advisorId;
	$objDet->retrieve_data_from_table($table_name, $whereCnd);
	$DetArr = $objDet->getRow();
	$smarty->assign("DetArr",$DetArr);
	
#GetData~~~language
	$objLan = clone $objUser;
	$table_name='advisor_language';
	$whereCnd=' where `advisor_id` = '.$advisorId;
	$objLan->retrieve_data_from_table($table_name, $whereCnd);
	while($tempArr =  $objLan->getAllRow()){
		$LanArrTemp[] = $tempArr['lang_id'];
	}
if(!empty($LanArrTemp)){
	$languages = implode(",",$LanArrTemp);
	$table_name='language';
	$whereCnd=" where `lang_id` in (".$languages.")";
	$objLan->retrieve_data_from_table($table_name, $whereCnd);
	while($tempArr =  $objLan->getAllRow()){
		$LanArr[] = $tempArr['lang_name'];
	}
	$Lan = implode(", ",$LanArr);
}
else{$Lan = "";}
	$smarty->assign("Lan",$Lan);

$smarty->display('../templates/advisor_account/send_free_msg.tpl');
?>