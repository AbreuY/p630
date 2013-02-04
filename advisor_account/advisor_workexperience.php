<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

chkAdvIALogin();

#Objects:
	$objUser = new User();

#GetVar:	
	$tmpArr 	= explode(':',$_GET['cd']);
	$advisorId	= base64_decode($tmpArr[1]);
	$smarty->assign("advisor_id",base64_encode($advisorId));

#GetAdvisorInfo:
	#clone:
	$obj_AdvInfo = clone $objUser;
	$obj_AdvInfo->getAdvisorDetailsById($advisorId);
	$advisorInfo = $obj_AdvInfo->getAllRow();

#ChkUserAlradyActive:-	
if(strcmp($advisorInfo['advisor_status'],"Inactive")==0){

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
$smarty->display('../templates/advisor_account/advisor_workexperience.tpl');

}elseif(strcmp($advisorInfo['advisor_status'],"Active")==0){

	$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Your account has been activated succesfully.
						Please, log in by using credential.  
						<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
						</div>';
	header("Location:".site_path."login");	
}
?>