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
		$LanArrTemp[] = "'".$tempArr['lang_id']."'";
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
	

#GetData~~~WorkExperiance
	$objWExp = clone $objUser;
	$objCntry = clone $objUser;
	$table_name='advisor_experience';
	$whereCnd=' where `advisor_id` = '.$advisorId;
	$objWExp->retrieve_data_from_table($table_name, $whereCnd);
	while($tempArr =  $objWExp->getAllRow()){
		$table_name='country';
		$whereCnd=' where `id` = '.$tempArr['office_country_id'];
		$objCntry->retrieve_data_from_table($table_name, $whereCnd);
		$tempcntryArr = $objCntry->getRow();
		$tempArr['country_name'] = $tempcntryArr['country_name'];
		$WExpArr[] = $tempArr;
	}
	
	$smarty->assign("WExpArr",$WExpArr);
	
#GetData~~~Education
	$objEdu = clone $objUser;
	$table_name='advisor_education';
	$whereCnd=' where `advisor_id` = '.$advisorId.' order by `graduation_year` DESC';
	$objEdu->retrieve_data_from_table($table_name, $whereCnd);
	while($tempArr =  $objEdu->getAllRow()){
		$EduArr[] = $tempArr;
	}
	$smarty->assign("EduArr",$EduArr);
	
#GetData~~~Exprtise
	$objExp		=	clone $objUser;
	$objArea	=	clone $objUser;
	$table_name='advisor_expertise';
	$whereCnd=' where `advisor_id` = '.$advisorId;
	$objExp->retrieve_data_from_table($table_name, $whereCnd);
	while($tempArr =  $objExp->getAllRow()){
		$table_name='category';
		$whereCnd=' where `cat_id` = '.$tempArr['area_service_id'];
		$objArea->retrieve_data_from_table($table_name, $whereCnd);
		$tempcntryArr = $objArea->getRow();
		$tempArr['area_name'] = $tempcntryArr['cat_name'];
		unset($tempcntryArr);
		$whereCnd=' where `cat_id` = '.$tempArr['expertise_cat_id'];
		$objArea->retrieve_data_from_table($table_name, $whereCnd);
		$tempcntryArr = $objArea->getRow();
		$tempArr['cat_name'] = $tempcntryArr['cat_name'];
		unset($tempcntryArr);
		$table_name='category_expertise_services';
		$whereCnd=' where `cat_id` = '.$tempArr['expertise_cat_id'];
		$objArea->retrieve_data_from_table($table_name, $whereCnd);
		$tempcntryArr = $objArea->getRow();
		$tempArr['A'] = $tempcntryArr['serviceA'];
		$tempArr['B'] = $tempcntryArr['serviceB'];
		$tempArr['C'] = $tempcntryArr['serviceC'];
		$tempArr['D'] = $tempcntryArr['serviceD'];
		$tempArr['E'] = $tempcntryArr['serviceE'];
		$to_show = false;
		if($tempArr['one'] == 'on' || $tempArr['two'] == 'on' || $tempArr['three'] == 'on' || $tempArr['four'] == 'on' || $tempArr['five'] == 'on'){
			$to_show = true;
		}
		$tempArr['to_show'] = $to_show;
		$ExpArr[] = $tempArr;
	}
	$smarty->assign("ExpArr",$ExpArr);
	
	
	#GetData~~~Products
	$objPro = clone $objUser;
	$table_name="product";
	$whereCnd=" where `advisor_id` = ".$advisorId." LIMIT 6";
	$objPro->retrieve_data_from_table($table_name, $whereCnd);
	while($tempArr =  $objPro->getAllRow()){
		$tempArr['description'] = substr($tempArr['description'],0,25);
		$ProArr[] = $tempArr;
	}
	//echo"<pre>";print_r($ProArr);die;
	$smarty->assign("ProArr",$ProArr);
/*	
echo"<pre>";
print_r($ExpArr);die;		print_r($LanArr);
	print_r($WExpArr);
	print_r($EduArr);
	
	print_r($DetArr);
*/
	
#View:
$smarty->display('../templates/advisor_account/view_advisor_profile.tpl');
?>