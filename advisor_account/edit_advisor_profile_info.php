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

#GetAdvisorInfo:
	#clone:
	$obj_AdvInfo = clone $objUser;
	$obj_AdvInfo->getAdvisorDetailsById($advisorId);
	$advisorInfo = $obj_AdvInfo->getAllRow();
	#@~::priceCalculate-For priceWebConsulte.
		#1.
		$adminPrice		= ($advisorInfo['priceWebConsulte']*$globalSettingArr['FIRST_CONSULTATIONS_COST']) / 100;
		$firstPriceWebConsulte	= number_format($advisorInfo['priceWebConsulte']-$adminPrice,2);
		$advisorInfo['firstPriceWebConsulte'] = $firstPriceWebConsulte;
		#2.
		$adminPriceRep = ($advisorInfo['priceWebConsulte']*$globalSettingArr['REPEAT_CONSULTATIONS_COST']) / 100;
		$repeatPriceWebConsulte = number_format($advisorInfo['priceWebConsulte']-$adminPriceRep,2);
		$advisorInfo['repeatPriceWebConsulte'] = $repeatPriceWebConsulte;
	#@~::priceCalculate-For priceEmailConsulte.
		#1.
		$adminPrice		= ($advisorInfo['priceEmailConsulte']*$globalSettingArr['FIRST_CONSULTATIONS_COST']) / 100;
		$firstPriceWebcamEmailConsulte	= number_format($advisorInfo['priceEmailConsulte']-$adminPrice,2);
		$advisorInfo['firstPriceWebcamEmailConsulte'] = $firstPriceWebcamEmailConsulte;
		#2.
		$adminPriceRep = ($advisorInfo['priceEmailConsulte']*$globalSettingArr['REPEAT_CONSULTATIONS_COST']) / 100;
		$repeatPriceWebcamEmailConsulte = number_format($advisorInfo['priceEmailConsulte']-$adminPriceRep,2);
		$advisorInfo['repeatPriceWebcamEmailConsulte'] = $repeatPriceWebcamEmailConsulte;	

	$smarty->assign("advisorInfo",$advisorInfo);

#GetTimeZone:
	#clone:
	$objTimeZone = clone $objUser;
	$objTimeZone->retrieve_data_from_table("timezones");
	while($Temp =  $objTimeZone->getAllRow()){
		$TimeZone[] = $Temp;
	}
	$smarty->assign("TimeZone",$TimeZone);
		
#GetAdvSocailMediaInfo:
	#clone:
	$objAdvSocailMediaInfo = clone $objUser;
	$objAdvSocailMediaInfo->getAdvisorSocailMediaDetailsByAdvId($advisorId);
	$advSocailMediaInfo    =  $objAdvSocailMediaInfo->getAllRow();
	$smarty->assign("advSocailMediaInfo",$advSocailMediaInfo);	
		
#GetUserSelectlanguageIdArr:
		 #clone:
			$advSelLangArr = array();	
			$objAdvSelLang = clone $objUser;
			$objAdvSelLang->getAdvisorLangSelctInfo($advisorId);
			$k = 0;
			while($advSelLang = $objAdvSelLang->getAllRow()){
				$advSelLangArr[$k] = $advSelLang['lang_id'];
				$k++;
			}
		$smarty->assign("advSelLangArr",$advSelLangArr);											
		
#LaguageDetails:
		#clone:	
		$objLang = clone $objUser;
		$objLang->getLanguageDetails();
		$iter1 = 1;
	 	while($tmpRow = $objLang->getAllRow()){
			 $tmpRow['iter1'] = $iter1;
			 $langInfo[] = $tmpRow; 
			 $iter1++;
	 	}
		$smarty->assign("langInfo",$langInfo);

#GetCountryPhoneCode:
	#clone:
	$objCountryPhnCd = clone $objUser;	
	$objCountryPhnCd->getAllCountry();
	while($arrRow = $objCountryPhnCd->getAllRow()){
			$countryPhnCdArr[] = $arrRow;
	}
	$smarty->assign("countryPhnCdArr",$countryPhnCdArr);
	
#GetAllSelectedLangInfo:
		 #clone:
		 $objAdvisorLang	= clone $objUser;
		 $setColoumFields = "";	 $tableName = "";	$whereField = "";
		 $setColoumFields = "adv.*,lng.lang_name,lng.lang_id";
		 $tableName 	  = "advisor_language AS adv INNER JOIN ".SUFFIX."language AS lng on adv.lang_id = lng.lang_id ";
		 $whereField 	  = "adv.advisor_id='".$advisorId."' and adv.flag_more_lang = '1' ";
		 $objAdvisorLang->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
		 $foundNumRow = $objAdvisorLang->numofrows();
		 $iter2 = 1;
		 while($tmpRow = $objAdvisorLang->getAllRow()){
			 $tmpRow['iter2'] = $iter2;
			 $addedLangInfo[] = $tmpRow; 
		 $iter2++;
		 }
		$smarty->assign("addedLangInfo",$addedLangInfo);
		
#GetAdvisorAvailabilityTime:
	#clone:
	$objAdvAvailability	= clone $objUser ;
	$objAdvAvailability->getAdvisorAvailability($advisorId);
	while($tmpRow = $objAdvAvailability->getAllRow()){
			$tmpRow['hour'] = str_replace('.',':',number_format($tmpRow['time_id'],2));	
			$advAvailability[] = $tmpRow;	
	} 
	$smarty->assign("advAvailability",$advAvailability);

	
#View:
$smarty->display('../templates/advisor_account/edit_advisor_profile_info.tpl');
?>