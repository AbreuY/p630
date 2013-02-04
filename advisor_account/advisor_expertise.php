<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

chkAdvIALogin();

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

	#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	#GetExpertiseAreaCategoryFromDatabase:
		#clone:
		$objGetExperCat = clone $objUser;
		#prameter:
		$setColoumFields = "*";
		$tableName 		 = "category";
		$whereField 	 = "`parent_id`='0' and `cat_level`='1' and `expr`='1' ORDER BY cat_name ASC";
		$objGetExperCat->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
		$numOfExperCat 	 = $objGetExperCat->numofrows();
		$lp = "1"; 
		while($tmpRow = $objGetExperCat->getAllRow()){
			  $tmpRow['lp']	= $lp;
			  $area_expertise_cat[]	= $tmpRow;
			$lp++; 
		}
		$smarty->assign("area_expertise_cat",$area_expertise_cat);
	
	#GetExpertiseAreaCategoryFromDatabase:
		#clone:
		$objGetExperCat = clone $objUser;
		#prameter:
		$setColoumFields = "*";
		$tableName 		 = "category";
		$whereField 	 = "`parent_id`='0' and `cat_level`='1' and `expr`='1' ORDER BY cat_name ASC";
		$objGetExperCat->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
		$numOfExperCat 	 = $objGetExperCat->numofrows();
		$lp = "1"; 
		while($tmpRow = $objGetExperCat->getAllRow()){
			  $tmpRow['lp']	= $lp;
			  #Query::-
				#clone:
				$objGetSubCat = clone $objUser;
				#prameter:
				$setColoumFields = "*";
				$tableName 		 = "category";
				$whereField 	 = "`parent_id`='".$tmpRow['cat_id']."' and `cat_level`='2' and `expr`='1' ORDER BY cat_name ASC";
				$objGetSubCat->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
				$numOfExperSubCat= $objGetSubCat->numofrows();
				$lpSub = "1"; 
				while($tmpSubCatRow = $objGetSubCat->getAllRow()){
					 #Query::-ForFetchingServices:  
						#clone:
						$objGetSubCatService = clone $objUser;
						#prameter:
						$setColoumFields = "*";	$tableName 		 = "category_expertise_services";
						$whereField 	 = "`parent_cat_id`='".$tmpRow['cat_id']."' and `cat_level`='2' and `cat_id`='".$tmpSubCatRow['cat_id']."'";
						$objGetSubCatService->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
						$tmpSubCatService 		 = $objGetSubCatService->getAllRow();
						$numOfExperSubCatService = $objGetSubCatService->numofrows();
							#-:
							$tmpSubCatRow['serviceA']	= $tmpSubCatService['serviceA']; 	
							$tmpSubCatRow['serviceB']	= $tmpSubCatService['serviceB']; 	
							$tmpSubCatRow['serviceC']	= $tmpSubCatService['serviceC']; 	
							$tmpSubCatRow['serviceD']	= $tmpSubCatService['serviceD']; 	
							$tmpSubCatRow['serviceE']	= $tmpSubCatService['serviceE']; 	
							#-:						
							$tmpSubCatRow['lpSub']	= $lpSub;
							$tmpRow['subServices'][] = $tmpSubCatRow;
					$lpSub++;
				}
			  $services_expertise_subcat[]	= $tmpRow;
			$lp++; 
		}
		#echo "<pre>"; print_r($services_expertise_subcat); echo "</pre>";
		$smarty->assign("services_expertise_subcat",$services_expertise_subcat);	
	
	#Action::ExpertiseInfo:
		/*~~Case A~~*/
		#GetAdvisorEducation:
		$objAdvExpr = clone $objUser;
	
		#prameter:
		$setColoumFields = "*";
		$tableName 		 = "advisor_expertise";
		$whereField 	 = "`advisor_id` = '".$advisorId."'";
		$objAdvExpr->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
		$numOfAdvExpr 	 = $objAdvExpr->numofrows();
		$lp = "1"; 
		while($tmpRow = $objAdvExpr->getAllRow()){
			  $tmpRow['lp']	= $lp;
			  $area_service_catid[]		= $tmpRow['area_service_id'];
			  $area_service_subcatid[]	= $tmpRow['expertise_cat_id'];
			  $advExpAreaServiceInfo[$tmpRow['expertise_cat_id']] = $tmpRow;
			$lp++; 
		}
		$smarty->assign("numOfAdvExpr",$numOfAdvExpr);
		#echo "<pre>"; print_r($area_service_catid);	echo "</pre>";	
		$smarty->assign("area_service_catid",$area_service_catid);		
		#echo "<pre>"; print_r($area_service_subcatid);	echo "</pre>";	
		$smarty->assign("area_service_subcatid",$area_service_subcatid);		
		#echo "<pre>"; print_r($advExpAreaServiceInfo);	echo "</pre>";	
		$smarty->assign("area_service_info",$advExpAreaServiceInfo);	
		/*~~End::Case A~~*/	
	#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	
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