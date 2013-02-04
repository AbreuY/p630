<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#Objects
	$objUser = new User();
	$objCat		=	new User();

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
	
#clone:
$objAdd = clone $objCat;
$table_name = "category";
$whereCnd=" where `expr`='1' and `parent_id`=18 order by cat_name ASC";
$objAdd->retrieve_data_from_table($table_name, $whereCnd);
	while($tmpRow = $objAdd->getAllRow()){
		$catAdd[] = $tmpRow;
	}
$smarty->assign("catAdd", $catAdd);


$whereCnd=" where `expr`='1' and `parent_id`=23 order by cat_name ASC";
$objAdd->retrieve_data_from_table($table_name, $whereCnd);
	while($tmpRow = $objAdd->getAllRow()){
		$catCar[] = $tmpRow;
	}
$smarty->assign("catCar", $catCar);


#Action::ExpertiseInfo:
	
	/*Case A~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
	#GetAdvisorEducation:
	$objAdvExpr = clone $objUser;

	#prameter:
	$setColoumFields = "*";
	$tableName 		 = "advisor_expertise";
	$whereField 	 = "`advisor_id` = '".$advisorId."' and `area_service`='Admissions' ";
	$objAdvExpr->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
	$numOfAdvExpr 	 = $objAdvExpr->numofrows();
	$lp = "1"; 
	while($tmpRow = $objAdvExpr->getAllRow()){
		  $tmpRow['lp']	= $lp;
		  $area_service_admission_catid[]			= $tmpRow['expertise_cat_id'];
		  $advExpAreaServiceAdmissionInfo[$tmpRow['expertise_cat_id']] = $tmpRow;
		$lp++; 
	}
	
	$smarty->assign("numOfAdvExpr",$numOfAdvExpr);
	$smarty->assign("area_service_admission_catid",$area_service_admission_catid);		
	$smarty->assign("area_service_admission_info",$advExpAreaServiceAdmissionInfo);	
	
	/*Case B~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
	#GetAdvisorEducation:
	$objAdvExprCareers = clone $objUser;

	#prameter:
	$setColoumFields = "*";
	$tableName 		 = "advisor_expertise";
	$whereField 	 = "`advisor_id` = '".$advisorId."' and `area_service`='Careers' ";
	$objAdvExprCareers->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
	$numOfAdvExprCareers = $objAdvExprCareers->numofrows();
	$lp = "1"; 
	while($tmpRow = $objAdvExprCareers->getAllRow()){
		  $tmpRow['lp']	= $lp;
  		  $area_service_careers_catid[]	 = $tmpRow['expertise_cat_id'];
		  $advExpAreaServiceCareersInfo[$tmpRow['expertise_cat_id']] = $tmpRow;
		$lp++; 
	}
	
	$smarty->assign("numOfAdvExprCareers",$numOfAdvExprCareers);	
	$smarty->assign("area_service_careers_catid",$area_service_careers_catid);	
	$smarty->assign("area_service_careers_info",$advExpAreaServiceCareersInfo);	

#View:
$smarty->display('../templates/advisor_account/advisor_expertise.tpl');

}elseif(strcmp($advisorInfo['advisor_status'],"Active")==0){

	$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Your account has been activated succesfully.
						Please, log in by using credential.  
						<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
						</div>';
	header("Location:".site_path."login");	
}
?>