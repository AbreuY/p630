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

#Action::GetInfoOfAdvisorByAdvisorId-
	 #clone:
	 $objAdvPitch	= clone $objUser;
	 	 #parameter:	
		 $setColoumFields 	= "";	$tableName = "";	$whereField = "";
		 $setColoumFields 	= "my_pitch";
		 $tableName 	  	= "advisor_details";
		 $whereField 	  	= "advisor_id='".$advisorId."' ";
	 $objAdvPitch->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
	 $foundNumRow = $objAdvPitch->numofrows();
	 $advPitchInfo = $objAdvPitch->getAllRow();
	 		$pitchCnt = 600-strlen($advPitchInfo['my_pitch']);
	 $smarty->assign("pitchCnt",$pitchCnt);					 
	 $smarty->assign("my_pitch",$advPitchInfo['my_pitch']);


	#View:
	$smarty->display('../templates/advisor_account/edit_advisor_pitch.tpl');
?>