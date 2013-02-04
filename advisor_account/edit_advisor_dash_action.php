<?php 
require_once("../pi_classes/commonSetting.php");
require_once("../pi_classes/User.php");
require_once("../pi_classes/ThumbLib.inc.php"); 

#Object:
$objUser = new User();

#echo "<pre>"; print_r($_POST); echo "</pre>"; # die;

#Action::btnAdvEduSubmit~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
if((strcmp($_POST['btnAdvEdutSubmit'],"Save and continue")==0)||(strcmp($_POST['btnAdvEdutSubmit'],"Save Education Information")==0)){

	#Defn::Var-
	$advisorId = base64_decode($_POST['advisor_id']);
	
	#stepA:deleteAll-allReadyExists-
		#clone:
		$objDelAdvEdut = clone $objUser;
			$tableName 	 = "advisor_education";
			$where_field = "`advisor_id` = '".$advisorId."' ";
		$resltDelAdvEdut  = $objDelAdvEdut->DELETE_ANYRECORD_FROM_TABLE($tableName,$where_field);
		
	#stepB:setRecord-
	for($fildLp=0;$fildLp<count($_POST['schoolName']);$fildLp++){
		#clone:
		$objInsrtAdvEdut = clone $objUser;
			#parameters:
			$tableName 		  = "advisor_education";
			$fields 	  	  = "`advisor_id`,`school`,`degree`,`concentration`,`graduation_year`,`current_students_free_call`,
								`current_students_free_email`,`to_alumni_free_call`,`to_alumni_free_email`,`ondate`";
			$values 	  	  = "'".$advisorId."','".$_POST['schoolName'][$fildLp]."','".$_POST['degreeName'][$fildLp]."',
								 '".$_POST['concentrationField'][$fildLp]."','".$_POST['graduationYear'][$fildLp]."',
								 '".$_POST['crntStudntFreeCall'][$fildLp]."','".$_POST['crntStudntFreeEmail'][$fildLp]."',
								 '".$_POST['toAlumniFreeCall'][$fildLp]."','".$_POST['toAlumniFreeEmail'][$fildLp]."',
								 '".date('Y-m-d H:i:s')."'";
			$rsInsrtAdvEdut   = $objInsrtAdvEdut->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);
	}	

	if($rsInsrtAdvEdut){
		if(strcmp($_POST['btnAdvEdutSubmit'],"Save and continue")==0){
			$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Your education information has been save successfully.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
								</div>';
			header("Location:".site_path."my-profile/edit-advisor-workx");
			exit;
		}else{
			$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Your education information has been save successfully.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
								</div>';
			header("Location:".site_path."my-profile/edit-advisor-education");
			exit;
		}
	}	
}

#Action::btnAdvExpSubmit~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
if((strcmp($_POST['btnAdvExpSubmit'],"Save and continue")==0)||(strcmp($_POST['btnAdvExpSubmit'],"Save Employment History")==0)){

	#Defn::Var-
	$advisorId = base64_decode($_POST['advisor_id']);
	
	#stepA:deleteAll-allReadyExists-
		#clone:
		$objDelAdvExp = clone $objUser;
			$tableName 	 = "advisor_experience";
			$where_field = "`advisor_id` = '".$advisorId."' ";
		$resltDelAdvExp  = $objDelAdvExp->DELETE_ANYRECORD_FROM_TABLE($tableName,$where_field);
		
	#stepB:setRecord-
	for($fildLp=0;$fildLp<count($_POST['employerField']);$fildLp++){
		#clone:
		$objInsrtAdvExp = clone $objUser;
			#parameters:
			$tableName 		  = "advisor_experience";
			$fields 	  	  = "`advisor_id`,`employer`,`title`,`office_country_id`,`state_province_id`,`office_city`,`industry_id`,`time_period_type`,
								 `time_period_from`,`time_period_to`,`description`,`ondate`";
			$values 	  	  = "'".$advisorId."','".$_POST['employerField'][$fildLp]."','".$_POST['titleField'][$fildLp]."',
								 '".$_POST['officeCountry'][$fildLp]."','".$_POST['stateProvinceId'][$fildLp]."',
								 '".$_POST['officeCity'][$fildLp]."','".$_POST['industryField'][$fildLp]."',
								 '".$_POST['timePeriodType'][$fildLp]."','".$_POST['timePeriodFrom'][$fildLp]."',
								 '".$_POST['timePeriodTo'][$fildLp]."','".$_POST['description'][$fildLp]."','".date('Y-m-d H:i:s')."'";
			$rsInsrtAdvExp    = $objInsrtAdvExp->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);
	}	
	
	if($rsInsrtAdvExp){
		if(strcmp($_POST['btnAdvExpSubmit'],"Save and continue")==0){
			$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Your employment history has been save successfully.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
								</div>';
			header("Location:".site_path."my-profile/edit-advisor-exper");
			exit;
		}else{
			$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Your employment history has been save successfully.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
								</div>';
			header("Location:".site_path."my-profile/edit-advisor-workx");
			exit;
		}
	}	
}

#Action::btnMyPitchSubmit~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
if((strcmp($_POST['btnAdvPitchSubmit'],"Save Pitch")==0)||(strcmp($_POST['btnAdvPitchSubmit'],"Save and Complete")==0)){

	#Defn::Var-
	$advisorId = base64_decode($_POST['advisor_id']);

	#clone:
	$objUpdtAdvPitch = clone $objUser;
		#parameters:
		$tableName 		  = "advisor_details";
		$set_fields 	  = "`my_pitch` = '".$_POST['pitchField']."',`upd_date`='".date('Y-m-d H:i:s')."' ";
		$where_field 	  = "`advisor_id` = '".$advisorId."' ";
		$rsUpdtAdvAvlblty = $objUpdtAdvPitch->UPDATE_ANYRECORD_IN_TABLE($tableName,$set_fields,$where_field);

	if($rsUpdtAdvAvlblty){
		if(strcmp($_POST['btnAdvPitchSubmit'],"Save Pitch")==0){
			$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Your pitch has been save successfully.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
								</div>';
			header("Location:".site_path."my-profile/edit-advisor-pitch");
			exit;
		}else{
			$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Your pitch has been save successfully.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
								</div>';
			header("Location:".site_path."my-profile/edit-advisor-pitch");
			exit;
		}
	}	
}

#Action::PersonalInfo:~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
if((strcmp($_POST['submittAdvProfileInfo'],"Save and continue")==0)||(strcmp($_POST['submittAdvProfileInfo'],"Save personal information")==0)){	

	#Defn::Var-
	$advisorId = base64_decode($_POST['advisor_id']);
	
		#Action::AvailabilityUpdat-
			#Step::1-set_default_availability:
			for($time=0;$time<=23;$time++){
					#clone:
					$objUpdtSetAdvAvlbltyDft = clone $objUser;
						#parameters:
						$tableName 		  = "advisor_availability";
						$set_fields 	  = "`monday`='No',`tuesday`='No',`wednesday`='No',`thursday`='No',`friday`='No',`saturday`='No',`sunday`='No'";
						$where_field 	  = "`advisor_id` = '".$advisorId."' and `time_id` = '".$time."' ";
						$rsUpdtAdvAvlblty = $objUpdtSetAdvAvlbltyDft->UPDATE_ANYRECORD_IN_TABLE($tableName,$set_fields,$where_field);
			}
			#Step::2-set_availability:
			if(is_array($_POST['availability'])){
				foreach($_POST['availability'] as $main_key=>$arrVal){
					if(is_array($arrVal)){
						foreach($arrVal as $key=>$arrValDtl){
							switch($key){
								case 0:
									$fieldName="monday";
									break;
								case 1:
									$fieldName="tuesday";
									break;
								case 2:
									$fieldName="wednesday";
									break;
								case 3:
									$fieldName="thursday";
									break; 
								case 4:
									$fieldName="friday";
									break;
								case 5:
									$fieldName="saturday";
									break;
								case 6:
									$fieldName="sunday";
									break;
							}
							#clone:
							$objUpdtAdvAvlblty = clone $objUser;
								$tableName = "advisor_availability";
								$set_fields = "".$fieldName."='Yes'";
								$where_field = "`advisor_id` = '".$advisorId."' and `time_id`='".$main_key."'";
								
							$rsUpdtAdvAvlblty = $objUpdtAdvAvlblty->UPDATE_ANYRECORD_IN_TABLE($tableName,$set_fields,$where_field);
						}
					}
				}	
			}
		    #End::AvailabilityUpdat.

	#Action::AdvisorProfilePhotoThunailOptn-		
		#ChnageInCode:
		if($_POST['profilePhoto']!=''){
			$rename_photo_name = $_POST['profilePhoto'];
		}else{
			$rename_photo_name = $_POST['old_image_path'];
		}
		
	#CheckSocialMediaInfoExists:
		#clone:
		$objAdvSocailMediaInfo = clone $objUser;
		$objAdvSocailMediaInfo->getAdvisorSocailMediaDetailsByAdvId($advisorId);
		if($objAdvSocailMediaInfo->numofrows()>0){  $socialMediaInfoExists = "1"; }else{ $socialMediaInfoExists = "0"; }
		
	#UpdateAdvisor-PersonalInfo:
		#clone:
		$objAdvPersonalInfo = $objUser;
		$returnPersnlInfoRs = $objAdvPersonalInfo->updateAdvisorDetails_personalInfo($_POST,$rename_photo_name,$socialMediaInfoExists,$rename_video_name);

	#If advisor-user password chnage, Then system send bellow mail to user - mailing Function will go here		
		#Dfn Var:
		$returnEmail = false;
		$email 		 = $_POST['email'];
		$oemail 	 = $_POST['oemail'];

	#If user email id chnage, Then system send bellow mail to user with emial account activation link - mailing Function will go here			
		if($email != $oemail){
			
				#clone:
				$objAdvEmail = clone $objUser;
				#parameters:
				$objAdvEmail->retrieve_data_from_table($table_name="advisor_details",$where_field=" where `advisor_id`= '".$_SESSION['advisor_id']."'");
				$objAdvEmail->getRow();
				$code = $objAdvEmail->getField("verification_code");
				$link = site_path."adviosr-email-account-activate/".$code;

				#Mailing Function will go here
					#clone:
					$objRegMail = clone $objUser;
						$to		   = $email;
						$from      = $globalSettingArr['SITE_EMAIL'];
						$temp_name = "user_change_email";
						$var_array = array("%%username%%"=>ucwords($objAdvEmail->getField("first_name")),"%%email%%"=>$email,
										   "%%password%%"=>base64_decode($objAdvEmail->getField("password")), "%%confirm_link%%"=> $link);
					$objRegMail->custom_send_email($email,$from,$temp_name,$var_array);
					time_nanosleep(0,5000);

				#@~:
				#clone:
				$objUpdateUser  = clone $objUser;
				$set_fields 	= "`email` = '".$email."',`advisor_status`='Inactive'";
				$objUpdateUser->update_record_in_table($table_name, $set_fields, $where_field);
				
				#@~
				$_SESSION['advisor_email'] = $email;
			
				#Redirect:
				 $_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg">
										Email with an verification link has been sent on your new email address, until you verify,
										 your account will be inactive 
										for new email address.
										<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
									</div>';
				 header("Location:".site_path."my-profile/edit-advisor-profile"); exit;
			}	

	if($returnPersnlInfoRs){
		if(strcmp($_POST['submittAdvProfileInfo'],"Save and continue")==0){
			$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Your personal information has been save successfully.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
								</div>';
								
			if($returnEmail){
				 $_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> 
				 				Email with an verification link has been sent on your new email address. Until you verify, your account will be inactive.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
			}
			header("Location:".site_path."my-profile/edit-advisor-education");
			exit;
		}else{
			$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Your personal information has been save successfully.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
								</div>';
			if($returnEmail){
				 $_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> 
				 				Email with an verification link has been sent on your new email address. Until you verify, your account will be inactive.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
			}
			header("Location:".site_path."my-profile/edit-advisor-profile");
			exit;
		}
	}	
}

#Action::btnMyexpertiseSubmit~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
if((strcmp($_POST['btnAdvExprSubmit'],"Save Expertise Information")==0)||(strcmp($_POST['btnAdvExprSubmit'],"Save and continue")==0)){

	#Defn::Var-
	$advisorId = base64_decode($_POST['advisor_id']);

	#stepA:deleteAll-allReadyExists-
		#clone:
		$objDelAdvEdut = clone $objUser;
			$tableName 	 = "advisor_expertise";
			$where_field = "`advisor_id` = '".$advisorId."' ";
		$resltDelAdvEdut = $objDelAdvEdut->DELETE_ANYRECORD_FROM_TABLE($tableName,$where_field);

	#stepB:setRecord-Admission:
	if(count($_POST['expertArea'])>0){
		foreach($_POST['expertise_cat_id'] as $key=>$val){
				#~:
				$area_service_id = $key;
				$tmpKey = explode("'",$area_service_id);
				if(in_array($tmpKey[1],$_POST['expertArea'])==1){
					for($expLp=0;$expLp<count($val);$expLp++){
						#Var:
						$forCatId = $val[$expLp];
						$expertise_cat_id = $val[$expLp];

						$forCatId;
						$about_experience_info = $_POST['textAdd'.$forCatId];
						#~:				
						$one  	= $_POST['checkPY'.$forCatId]; $one_txt		= $_POST['textPY'.$forCatId];
						$two	= $_POST['checkCM'.$forCatId]; $two_txt		= $_POST['textCM'.$forCatId];
						$three  = $_POST['checkAP'.$forCatId]; $three_txt	= $_POST['textAP'.$forCatId];
						$four   = $_POST['checkIP'.$forCatId]; $four_txt	= $_POST['textIP'.$forCatId];
						$five	= $_POST['checkPC'.$forCatId]; $five_txt	= $_POST['textPC'.$forCatId];
						
						#@~:InsertQuery:
							#clone:
							$objInsrtAdvEdut = clone $objUser;
							#parameters:
							$tableName 		  = "advisor_expertise";
							$fields 	  	  = "`advisor_id`,`area_service_id`,`expertise_cat_id`,`about_experience_info`,
												`one`,`two`,`three`,`four`,`five`,
												`one_txt`,`two_txt`,`three_txt`,`four_txt`,`five_txt`,`date_on`";
							$values 	  	  = "'".$advisorId."',".$area_service_id.",'".$expertise_cat_id."','".$about_experience_info."',
												 '".$one."','".$two."','".$three."','".$four."','".$five."',
												 '".$one_txt."','".$two_txt."','".$three_txt."','".$four_txt."','".$five_txt."','".date('Y-m-d H:i:s')."'";
							$rsInsrtAdvEdut   = $objInsrtAdvEdut->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);
					}#end::Forloop.
				}else{
					$rsInsrtAdvEdut = "1";
				}	
	}#end::Foreach.
	}
	
	#stepC:setRecord-Admission:
	if(empty($rsInsrtAdvEdut)){
		if(count($_POST['expertArea'])!=0){
			foreach($_POST['expertArea'] as $key=>$val){
				#~:
				$area_service_id = $val;
					#Var:
						$forCatId 		  = "";
						$expertise_cat_id = "";
						$forCatId;
						$about_experience_info = "";
						#~:				
						$one  	= ""; $one_txt	 = "";
						$two	= ""; $two_txt	 = "";
						$three  = ""; $three_txt = "";
						$four   = ""; $four_txt  = "";
						$five	= ""; $five_txt	 = "";
						#@~:InsertQuery:
							#clone:
							$objInsrtAdvEdut = clone $objUser;
							#parameters:
							$tableName 		  = "advisor_expertise";
							$fields 	  	  = "`advisor_id`,`area_service_id`,`expertise_cat_id`,`about_experience_info`,
												`one`,`two`,`three`,`four`,`five`,
												`one_txt`,`two_txt`,`three_txt`,`four_txt`,`five_txt`,`date_on`";
							$values 	  	  = "'".$advisorId."',".$area_service_id.",'".$expertise_cat_id."','".$about_experience_info."',
												 '".$one."','".$two."','".$three."','".$four."','".$five."',
												 '".$one_txt."','".$two_txt."','".$three_txt."','".$four_txt."','".$five_txt."','".date('Y-m-d H:i:s')."'";
							$rsInsrtAdvEdut   = $objInsrtAdvEdut->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);
			}#end::Foreach.
		}else{
			$rsInsrtAdvEdut = "1";
		}	
	}
	
	
	if($rsInsrtAdvEdut){
		if(strcmp($_POST['btnAdvExprSubmit'],"Save and continue")==0){
			$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Your expertise information has been save successfully.
						<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
						</div>';
			header("Location:".site_path."my-profile/edit-advisor-pitch");
			exit;
		}else{
			$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Your expertise information has been save successfully.
						<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
						</div>';
			header("Location:".site_path."my-profile/edit-advisor-exper");
			exit;
		}
	}	
	
}

?>















































<?php 
#comment code
#Action::AdvisorProfilePhotoThunailOptn-
	/*if($_FILES['profilePhoto']['name'] != ''){
			$photo_name 	= $_FILES['profilePhoto']['name'];
			$photo_type 	= $_FILES['profilePhoto']['type'];
			$photo_tmp_name = $_FILES['profilePhoto']['tmp_name'];
			$photo_error 	= $_FILES['profilePhoto']['error'];
			$photo_size 	= $_FILES['profilePhoto']['size'];
			
			$pathInfoArr = pathinfo($photo_name);
			$rename_photo_name = uniqid().".".$pathInfoArr['extension'];

			$org_target_path	= "../front_media/images/advisor_images/".$rename_photo_name;
			$thumb_target_path	= "../front_media/images/advisor_images/180X180px/".$rename_photo_name;

			$upsus=move_uploaded_file($photo_tmp_name,$org_target_path);				  
			$thumb = PhpThumbFactory::create($org_target_path);
			$thumb->adaptiveResize(180, 180); //width, height
			$thumb->resize(180, 180); //width, height
			$thumb->save($thumb_target_path);		
		}
		else{
			$rename_photo_name = $_POST['old_image_path'];
		}*/
	/*if($_FILES['profileIntoVideo']['name'] != ''){
			$video_name 	= $_FILES['profileIntoVideo']['name'];
			$video_type 	= $_FILES['profileIntoVideo']['type'];
			$video_tmp_name = $_FILES['profileIntoVideo']['tmp_name'];
			$video_error 	= $_FILES['profileIntoVideo']['error'];
			$video_size 	= $_FILES['profileIntoVideo']['size'];
			
			$pathInfoArrV = pathinfo($video_name);
			$rename_video_name = uniqid().".".$pathInfoArrV['extension'];

			$org_target_path_v	= "../front_media/videos/advisor_videos/".$rename_video_name;
			$upsusv=move_uploaded_file($video_tmp_name,$org_target_path_v);
		}else{
			$rename_video_name = $_POST['old_video_path'];
		}*/


	/*//CHange email
		if($email != $oemail){
				
				$tNN 		 = "advisor_details";
				$where_field = " where advisor_id = '".$_SESSION['advisor_id']."'";
				$objUseEmail = clone $objUser;
				$objUseEmail->retrieve_data_from_table($tNN, $where_field);
				$objUseEmail->getRow();
				$code = $objUseEmail->getField("verification_code");
				$link = site_path."activate-advisor/".$code;
			
			
				$set_fields 	= "`email` = '".$email."', advisor_status = 'Inactive'";
				$objUpdateUser->update_record_in_table($tNN, $set_fields, $where_field);
				
				
				#Mailing Function will go here
			#clone:
			$objGblSett=clone $objUser;
			$objGblSett->getGlobalRecordById($rec_id=2);
			#clone:
			$objRegMail = clone $objUser;
				$email = $_POST['email'];
				$to		   = $email;
				$from      = $objGblSett->getField('value');					 
				$temp_name = "user_change_email";
				$var_array = array("%%username%%"=>ucwords($objUseEmail->getField("first_name"))." ".ucwords($objUseEmail->getField("last_name")),"%%email%%"=>$email,"%%password%%"=>base64_decode($objUseEmail->getField("password")), "%%confirm_link%%"=> $link);
			$objRegMail->custom_send_email($email,$from,$temp_name,$var_array);
			time_nanosleep(0,100000);
			
				$returnEmail = true;
	
						
				
		}*/
?>