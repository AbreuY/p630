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
	
#GetData~~~personal info~~~TimeZone:
	#clone:
	$objTimeZone = clone $objUser;
	$objTimeZone->retrieve_data_from_table("timezones");
	while($Temp =  $objTimeZone->getAllRow()){
		$TimeZone[] = $Temp;
	}
	$smarty->assign("TimeZone",$TimeZone);
	
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
	
#GetData~~~advisor~~~Availibility:
	#clone:
	$objAvail = clone $objUser;
	$objAvail->retrieve_data_from_table("advisor_availability", " where `advisor_id` = ".$advisorId);
	while($TempAv =  $objAvail->getAllRow()){
		$AvailArr[] = $TempAv;
	}
	$smarty->assign("AvailArr",$AvailArr);	//echo"<pre>"; print_r($AvailArr);die;


$smarty->display('../templates/advisor_account/schedule_web_cam.tpl');
?>