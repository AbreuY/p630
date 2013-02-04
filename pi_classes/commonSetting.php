<?php
ob_start();
session_start();

#RequiresFiles:
require_once(dirname(__FILE__)."/AbstractDB.php");
require_once(dirname(__FILE__)."/commonFunction.php");

#Action:
if(!substr_count($_SERVER['PHP_SELF'],"admin"))
{
	#Requires Files:
	require_once("libs/Smarty.class.php");
	require_once("Comman.class.php");
	
	#Objects:
	$smarty	     = new Smarty();
	$obj_comncls = new Comman();
	
	$smartyTplObj=clone $smarty;
	
	#~:	
	define("SUFFIX",AbstractDB::SUFFIX);
	define("site_path",AbstractDB::SITE_PATH);
	define("site_abs_path",AbstractDB::SITE_ABS_PATH);
	$smarty->assign("header1","E:/wamp/www/p630/templates/header1.tpl");
	$smarty->assign("header2","E:/wamp/www/p630/templates/header2.tpl");
	$smarty->assign("banner","../templates/banner.tpl");
	$smarty->assign("footer","../templates/footer.tpl");
	$smarty->assign("advisorLeftMenu","../templates/advisor_account/advisor_left_menu.tpl");
	$smarty->assign("userLeftMenu","../templates/user_account/user_left_menu.tpl");
	#~:
	$smarty->assign("site_title",AbstractDB::SITE_TITLE);
	$smarty->assign("site_path",AbstractDB::SITE_PATH);
	
	
	
	#GetGobalRecordFromDatabase:
		#clone:
		$objGlobalSett = $obj_comncls;
		$objGlobalSett->GET_GLOBAL_DETAILS();
		while($tmpRowGlobalSettingArr = $objGlobalSett->getAllRow()){
			$globalSettingArr[$tmpRowGlobalSettingArr['name']] = $tmpRowGlobalSettingArr['value'];
		}

	#Query::ForInformationOfUserByUserId:
	  	if($_SESSION['user_id']){ 
			#clone:
			$objUsrInfo = clone $obj_comncls;
				#parameter:
				$setColoumFields = "`username`,`email`";
				$whereField 	 = "`user_id`='".$_SESSION['user_id']."'";
			$objUsrInfo->GET_USER_DETAILS($setColoumFields,$whereField);
			$userDetailsArr = $objUsrInfo->getAllRow();
			$smarty->assign("userDetailsArr",$userDetailsArr);
			
			$objCntNew = clone $obj_comncls;
			$objCntNew->GET_ANYRECORD_FROM_TABLE("count(*)", "communication", "`from` = ".$_SESSION['user_id']." and `new_usr` = '1' and `del_usr` = '0'");
			$new_usr = $objCntNew->getAllRow();
			$smarty->assign("new_usr",$new_usr['count(*)']);
		}

	#Query::ForInformationOfUserByAdvisorId:
		if($_SESSION['advisor_id']){ 
			#clone:
			$objAdvInfo = clone $obj_comncls;
				#parameter:
				$setColoumFields = "`first_name`,`last_name`,`email`"; 	
				$whereField 	 = "`advisor_id`='".$_SESSION['advisor_id']."'";
			$objAdvInfo->GET_ADVISOR_DETAILS($setColoumFields,$whereField);
			$advisorDetailsArr = $objAdvInfo->getAllRow();
			$smarty->assign("advisorDetailsArr",$advisorDetailsArr);
			
			$objCntNew = clone $obj_comncls;
			$objCntNew->GET_ANYRECORD_FROM_TABLE("count(*)", "communication", "`to` = ".$_SESSION['advisor_id']." and `new_adv` = '1' and `del_adv` = '0'");
			$new_adv = $objCntNew->getAllRow();
			$smarty->assign("new_adv",$new_adv['count(*)']);
		}
		
	#Query::ForInformationOfUserByAdvisorId_IA:
		if($_SESSION['advisor_id_IA']){ 
			#clone:
			$objAdvInfo = clone $obj_comncls;
				#parameter:
				$setColoumFields = "`first_name`,`last_name`,`email`,`verification_code`"; 	
				$whereField 	 = "`advisor_id`='".$_SESSION['advisor_id_IA']."'";
			$objAdvInfo->GET_ADVISOR_DETAILS($setColoumFields,$whereField);
			$advisorDetailsArr = $objAdvInfo->getAllRow();
			$tmpcd = explode(':',$advisorDetailsArr['verification_code']);
			$advisorDetailsArr['cd'] = $tmpcd[1].":".$tmpcd[0];
			$smarty->assign("advisorDetailsArr",$advisorDetailsArr);
		}	
		
	
		
				
	#Set/Unset-Show/Hide Messages: 
	if($_SESSION['msg']!=''){
		$msg=$_SESSION['msg'];
		if($smarty){ $smarty->assign("msg",$msg); }
		unset($_SESSION['msg']);
	} 
}
else
{	
	#~:
	define("site_title",AbstractDB::SITE_TITLE);
	define("site_path",AbstractDB::SITE_PATH);
	define("SUFFIX",AbstractDB::SUFFIX);
	#~:
	require_once("Comman.class.php");
	$obj_comncls = new Comman();
	#GetGobalRecordFromDatabase:
		#clone:
		$objGlobalSett = $obj_comncls;
		$objGlobalSett->GET_GLOBAL_DETAILS();
		while($tmpRowGlobalSettingArr = $objGlobalSett->getAllRow()){
			$globalSettingArr[$tmpRowGlobalSettingArr['name']] = $tmpRowGlobalSettingArr['value'];
		}
}

#echo "<pre>"; print_r($_SESSION); echo "</pre>";
?>

