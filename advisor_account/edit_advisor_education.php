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
	#GetAdvisorEducation:
	$objAdvEdut = clone $objUser;
	#prameter:
	$setColoumFields = "*";
	$tableName 		 = "advisor_education";
	$whereField 	 = "`advisor_id` = '".$advisorId."' ";
	$objAdvEdut->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
	$numOfAdvEdut 	 = $objAdvEdut->numofrows();
	$lp = "1"; 
 	while($tmpRow = $objAdvEdut->getAllRow()){
		  $tmpRow['lp']	= $lp;
		  $advEdutInfo[] = $tmpRow;
		$lp++; 
	}
	$smarty->assign("numOfAdvEdut",$numOfAdvEdut);	
	$smarty->assign("advEdutInfo",$advEdutInfo);	
	
#View:
$smarty->display('../templates/advisor_account/edit_advisor_education.tpl');
?>