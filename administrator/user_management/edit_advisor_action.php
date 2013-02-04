<?php 
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/Admin.php");
require_once("../../pi_classes/ThumbLib.inc.php"); 

#Object:
$objAdmin = new Admin();


#Action::btnAdvExpSubmit~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
if(strcmp($_POST['btnAdvEdutSubmit'],'Save')==0){	

	#Defn::Var-
	$advisorId = $_POST['advisor_id'];
	
	#stepA:deleteAll-allReadyExists-
		#clone:
		$objDelAdvEdut = clone $objAdmin;
			$tableName 	 = "advisor_education";
			$where_field = "`advisor_id` = '".$advisorId."' ";
		$resltDelAdvEdut  = $objDelAdvEdut->DELETE_ANYRECORD_FROM_TABLE($tableName,$where_field);
		
	#stepB:setRecord-
	for($fildLp=0;$fildLp<count($_POST['schoolName']);$fildLp++){
		#clone:
		$objInsrtAdvEdut = clone $objAdmin;
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
		$_SESSION['msg']['updated'] = 'updated';
		header("Location:edit_advisor_education.php?advisorId=".base64_encode($_POST['advisor_id']));
		exit;
	}	
}

#Action::btnAdvExpSubmit~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
if(strcmp($_POST['btnAdvExpSubmit'],'Save')==0){	

	#Defn::Var-
	$advisorId = $_POST['advisor_id'];
	
	#stepA:deleteAll-allReadyExists-
		#clone:
		$objDelAdvExp = clone $objAdmin;
			$tableName 	 = "advisor_experience";
			$where_field = "`advisor_id` = '".$advisorId."' ";
		$resltDelAdvExp  = $objDelAdvExp->DELETE_ANYRECORD_FROM_TABLE($tableName,$where_field);
		
	#stepB:setRecord-
	for($fildLp=0;$fildLp<count($_POST['employerField']);$fildLp++){
		#clone:
		$objInsrtAdvExp = clone $objAdmin;
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
		$_SESSION['msg']['updated'] = 'updated';
		header("Location:edit_advisor_experience.php?advisorId=".base64_encode($_POST['advisor_id']));
		exit;
	}	
}

#Action::btnMyPitchSubmit~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
if(strcmp($_POST['btnMyPitchSubmit'],'Save')==0){	
	
	#Defn::Var-
	$advisorId = $_POST['advisor_id'];
	#clone:
	$objUpdtAdvPitch = clone $objAdmin;
		#parameters:
		$tableName 		  = "advisor_details";
		$set_fields 	  = "`my_pitch` = '".$_POST['pitchField']."',`upd_date`='".date('Y-m-d H:i:s')."' ";
		$where_field 	  = "`advisor_id` = '".$advisorId."' ";
		$rsUpdtAdvAvlblty = $objUpdtAdvPitch->UPDATE_ANYRECORD_IN_TABLE($tableName,$set_fields,$where_field);

	if($rsUpdtAdvAvlblty){
		$_SESSION['msg']['updated'] = 'updated';
		header("Location:edit_advisor_pitch.php?advisorId=".base64_encode($_POST['advisor_id']));
		exit;
	}	
}

#Action::PersonalInfo:~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
if($_POST['email']){
	#Defn::Var-
	$advisorId = $_POST['advisor_id'];
	
		#Action::AvailabilityUpdat-
		#Step::1-set_default_availability:
		for($time=0;$time<=23;$time++){
				#clone:
				$objUpdtSetAdvAvlbltyDft = clone $objAdmin;
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
						$objUpdtAdvAvlblty = clone $objAdmin;
							$tableName = "advisor_availability";
							$set_fields = "".$fieldName."='Yes'";
							$where_field = "`advisor_id` = '".$advisorId."' and `time_id`='".$main_key."'";
							
						$rsUpdtAdvAvlblty = $objUpdtAdvAvlblty->UPDATE_ANYRECORD_IN_TABLE($tableName,$set_fields,$where_field);
					}
				}
			}	
		}		
	#Action::AdvisorProfilePhotoThunailOptn-
	if($_FILES['profilePhoto']['name'] != ''){
			$photo_name 	= $_FILES['profilePhoto']['name'];
			$photo_type 	= $_FILES['profilePhoto']['type'];
			$photo_tmp_name = $_FILES['profilePhoto']['tmp_name'];
			$photo_error 	= $_FILES['profilePhoto']['error'];
			$photo_size 	= $_FILES['profilePhoto']['size'];
			
			$pathInfoArr = pathinfo($photo_name);
			$rename_photo_name = uniqid().".".$pathInfoArr['extension'];

			$org_target_path	= "../../front_media/images/advisor_images/".$rename_photo_name;
			$thumb_target_path	= "../../front_media/images/advisor_images/180X180px/".$rename_photo_name;

			$upsus=move_uploaded_file($photo_tmp_name,$org_target_path);				  
			$thumb = PhpThumbFactory::create($org_target_path);
			$thumb->adaptiveResize(180, 180); //width, height
			$thumb->resize(180, 180); //width, height
			$thumb->save($thumb_target_path);		
		}
		else{
			$rename_photo_name = $_POST['old_image_path'];
		}

			if($_FILES['profileIntoVideo']['name'] != ''){
			$video_name 	= $_FILES['profileIntoVideo']['name'];
			$video_type 	= $_FILES['profileIntoVideo']['type'];
			$video_tmp_name = $_FILES['profileIntoVideo']['tmp_name'];
			$video_error 	= $_FILES['profileIntoVideo']['error'];
			$video_size 	= $_FILES['profileIntoVideo']['size'];
			
			$pathInfoArrV = pathinfo($video_name);
			$rename_video_name = uniqid().".".$pathInfoArrV['extension'];

			$org_target_path_v	= "../../front_media/videos/advisor_videos/".$rename_video_name;
			$upsusv=move_uploaded_file($video_tmp_name,$org_target_path_v);
		}else{
			$rename_video_name = $_POST['old_video_path'];
		}




	#UpdateAdvisor-PersonalInfo:
		#clone:
		$objAdvPersonalInfo = $objAdmin;
		$returnPersnlInfoRs = $objAdvPersonalInfo->updateAdvisorDetails_personalInfo($_POST,$rename_photo_name, $rename_video_name);	
	
	if($returnPersnlInfoRs){
		$_SESSION['msg']['updated'] = 'updated';
		header("Location:edit_advisor.php?advisorId=".base64_encode($_POST['advisor_id']));
		exit;
	}	
}

#Action::btnMyexpertiseSubmit~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
if((strcmp($_POST['btnAdvExprSubmit'],"Save")==0)){

	#Defn::Var-
	$advisorId = $_POST['advisor_id'];
	
	
	#stepA:deleteAll-allReadyExists-
		#clone:
		$objDelAdvEdut = clone $objAdmin;
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
							$objInsrtAdvEdut = clone $objAdmin;
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
		if(count($_POST['expertArea'])!=0&&count($_POST['expertise_cat_id'])==0){
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
							$objInsrtAdvEdut = clone $objAdmin;
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

	$_SESSION['msg']['updated'] = 'updated';
	header("Location:edit_advisor_expertise.php?advisorId=".base64_encode($_POST['advisor_id']));
	exit;
}

?>





<?php /*#stepA:deleteAll-allReadyExists-
		#clone:
		$objDelAdvEdut = clone $objAdmin;
			$tableName 	 = "advisor_expertise";
			$where_field = "`advisor_id` = '".$advisorId."' ";
		$resltDelAdvEdut = $objDelAdvEdut->DELETE_ANYRECORD_FROM_TABLE($tableName,$where_field);

	#stepB:setRecord-Admission:
	foreach($_POST['expertise_cat_id'] as $key=>$val){
				#~:
				$area_service = $key;
				if(strcmp($area_service,"'Admissions'")==0 && (!empty($_POST['admission']))){
					for($expLp=0;$expLp<count($val);$expLp++){
						#Var:
						$forCatId = $val[$expLp];
						$expertise_cat_id = $val[$expLp];
						$about_experience_info = $_POST['textAdd'.$forCatId];
						#~:				
						$one  	= $_POST['checkPY'.$forCatId]; $one_txt		= $_POST['textPY'.$forCatId];
						$two	= $_POST['checkCM'.$forCatId]; $two_txt		= $_POST['textCM'.$forCatId];
						$three  = $_POST['checkAP'.$forCatId]; $three_txt	= $_POST['textAP'.$forCatId];
						$four   = $_POST['checkIP'.$forCatId]; $four_txt	= $_POST['textIP'.$forCatId];
						$five	= $_POST['checkPC'.$forCatId]; $five_txt	= $_POST['textPC'.$forCatId];
						
						#@~:InsertQuery:
							#clone:
							$objInsrtAdvEdut = clone $objAdmin;
							#parameters:
							$tableName 		  = "advisor_expertise";
							$fields 	  	  = "`advisor_id`,`area_service`,`expertise_cat_id`,`about_experience_info`,
												`one`,`two`,`three`,`four`,`five`,
												`one_txt`,`two_txt`,`three_txt`,`four_txt`,`five_txt`,`date_on`";
							$values 	  	  = "'".$advisorId."',".$area_service.",'".$expertise_cat_id."','".$about_experience_info."',
												 '".$one."','".$two."','".$three."','".$four."','".$five."',
												 '".$one_txt."','".$two_txt."','".$three_txt."','".$four_txt."','".$five_txt."','".date('Y-m-d H:i:s')."'";
							$rsInsrtAdvEdut   = $objInsrtAdvEdut->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);
					}#end::Forloop.
				}elseif(strcmp($area_service,"'Careers'")==0 && (!empty($_POST['career']))){
					for($expLp=0;$expLp<count($val);$expLp++){
						#Var:
						$forCatId = $val[$expLp];
						$expertise_cat_id = $val[$expLp];
						$about_experience_info = $_POST['textCar'.$forCatId];
						#~:
						$one  	= $_POST['checkCA'.$forCatId]; $one_txt		= $_POST['textCA'.$forCatId];
						$two	= $_POST['checkII'.$forCatId]; $two_txt		= $_POST['textII'.$forCatId];
						$three  = $_POST['checkRC'.$forCatId]; $three_txt	= $_POST['textRC'.$forCatId];
						$four   = $_POST['checkJS'.$forCatId]; $four_txt	= $_POST['textJS'.$forCatId];
						$five	= $_POST['checkIPR'.$forCatId]; $five_txt	= $_POST['textIPR'.$forCatId];
						
						#@~:InsertQuery:
							#clone:
							$objInsrtAdvEdut = clone $objAdmin;
							#parameters:
							$tableName 		  = "advisor_expertise";
							$fields 	  	  = "`advisor_id`,`area_service`,`expertise_cat_id`,`about_experience_info`,
												`one`,`two`,`three`,`four`,`five`,
												`one_txt`,`two_txt`,`three_txt`,`four_txt`,`five_txt`,`date_on`";
							$values 	  	  = "'".$advisorId."',".$area_service.",'".$expertise_cat_id."','".$about_experience_info."',
												 '".$one."','".$two."','".$three."','".$four."','".$five."',
												 '".$one_txt."','".$two_txt."','".$three_txt."','".$four_txt."','".$five_txt."','".date('Y-m-d H:i:s')."'";
							$rsInsrtAdvEdut   = $objInsrtAdvEdut->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);
					}#end::Forloop.
				}
	}#end::Foreach.*/?>
