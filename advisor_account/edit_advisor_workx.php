<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckAdvisorSession:
checkAdvisorSession($_SESSION['advisor_id']);

#Objects
	$objUser = new User();

#GetVar:
	$advisorId	= $_SESSION['advisor_id'];
	$smarty->assign("advisor_id",base64_encode($advisorId));

#Action:
#GetgetAllCountry()-
	#clone:
	$objCountry = clone $objUser;	
    $objCountry->getAllCountry();
	while($fieldsCountry = $objCountry->getAllRow()){
			$countryInfo[] = $fieldsCountry;
	}
	$smarty->assign("countryInfo",$countryInfo);
	
	#GetgetAllSate()-
	#clone:
	$objState = clone $objUser;	
    $objState->retrieve_data_from_table("us_state");
	while($fieldsState = $objState->getAllRow()){
			$stateInfo[] = $fieldsState;
	}
	$smarty->assign("stateInfo",$stateInfo);
	
#GetAdvisorWorkedExperience:
	#clone:
	$objAdvExp = clone $objUser;
	#prameter:
	$setColoumFields = "*";
	$tableName 		 = "advisor_experience";
	$whereField 	 = "`advisor_id` = '".$advisorId."' ";
	$objAdvExp->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
	$numOfAdvExp 	 = $objAdvExp->numofrows();
	$lp = "1"; 
 	while($tmpRow = $objAdvExp->getAllRow()){
		  $tmpRow['lp']	= $lp;
		  $advExpInfo[] = $tmpRow;
		$lp++; 
	}
	$smarty->assign("numOfAdvExp",$numOfAdvExp);	
	$smarty->assign("advExpInfo",$advExpInfo);	

#ExperienceYearFrom:
	#clone:
	$tempYear = array();
	$frmCrntYear = date('Y')+1;
	for($frmDt=63;$frmDt>0;$frmDt--){
		 $tempYear[] = $frmCrntYear - number_format($frmDt);
		 $year = $tempYear;	 
	}
	krsort($year);
	$smarty->assign("year",$year);	
	
	#View:
	$smarty->display('../templates/advisor_account/edit_advisor_workx.tpl');
?>