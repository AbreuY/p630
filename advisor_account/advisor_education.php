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
$smarty->display('../templates/advisor_account/advisor_education.tpl');

}elseif(strcmp($advisorInfo['advisor_status'],"Active")==0){

	$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Your account has been activated succesfully.
						Please, log in by using credential.  
						<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
						</div>';
	header("Location:".site_path."login");	
}
?>