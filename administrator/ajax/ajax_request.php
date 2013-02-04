<?php
	#RequirFile:
	require_once('../../pi_classes/commonSetting.php');
	require_once('../../pi_classes/Admin.php');
	#Objects:
	$obj_admin = new Admin();
	$ajaxObj=new Admin();
	#Action:
	if($_REQUEST['action']=='chk_emp_email'){
		$ajaxObj->chkEpmEmail($_REQUEST['email']);
		if($ajaxObj->numofrows()>0){
			echo "false";
		}else{
			echo "true";
		}
	}
	if($_REQUEST['action']=='chnage_emp_status'){
		if($_REQUEST['status']){
			$status=0;
		}else{
			$status=1;
		}
		echo $ajaxObj->changeEmpStatus($_REQUEST['admin_id'],$status);
	}
	if($_REQUEST['action']=='chk_emp_other_email'){
		if($_REQUEST['email']==$_REQUEST['old_email']){
			echo "true";
		}else{
			$ajaxObj->chkEpmEmail($_REQUEST['email']);
			if($ajaxObj->numofrows()>0){
				echo "false";
			}else{
				echo "true";
			}
		}
	}
	if($_REQUEST['action']=='chk_user_other_email'){
		if($_REQUEST['email']==$_REQUEST['old_email']){
			echo "true";
		}else{
			$ajaxObj->chkUserEmail($_REQUEST['email']);
			if($ajaxObj->numofrows()>0){
				echo "false";
			}else{
				echo "true";
			}
		}
	}
	if($_REQUEST['action']=='chk_advisor_other_email'){
		if($_REQUEST['email']==$_REQUEST['old_email']){
			echo "true";
		}else{
			$ajaxObj->chkAdvisorEmail($_REQUEST['email']);
			if($ajaxObj->numofrows()>0){
				echo "false";
			}else{
				echo "true";
			}
		}
	}
	if($_REQUEST['action']=='chk_emp_username'){
		$ajaxObj->chkEpmUsername($_REQUEST['username']);
		if($ajaxObj->numofrows()>0){
			echo "false";
		}else{
			echo "true";
		}
	}
	if($_REQUEST['action']=='chk_emp_other_username'){
		if($_REQUEST['username']==$_REQUEST['old_username']){
			echo "true";
		}else{
			$ajaxObj->chkEpmOtherUsername($_REQUEST['username']);
			if($ajaxObj->numofrows()>0){
				echo "false";
			}else{
				echo "true";
			}
		}
	}
	if($_REQUEST['action']=='chk_emp_old_pass'){
		$abc = $ajaxObj->chkEpmOldPass($_REQUEST['old_pass'],$_REQUEST['admin_id']);
		$abc = $ajaxObj->numofrows();
		if( $abc){
			echo "true";
		}else{
			echo "false";
		}
	}
	if($_REQUEST['action']=='chnage_user_status'){
		if($_REQUEST['status']=='Active'){
			$status='Inactive';
		}else{
			$status='Active';
		}
		echo $ajaxObj->changeUserStatus($_REQUEST['emp_id'],$status);
	}
	if($_REQUEST['action']=='chnage_advisor_status'){
		if($_REQUEST['status']=='Active'){
			$status='Inactive';
		}else{
			$status='Active';
		}
		echo $ajaxObj->changeAdvisorStatus($_REQUEST['emp_id'],$status);
	}
	if($_REQUEST['action']=='chnage_advisor_verify_status'){
		if($_REQUEST['status']=='Yes'){
			$status='No';
		}else{
			#GetAdvisorAccountDetails::ByAdvisorId;
				$objAdvisorInfo = clone $obj_admin;
				$objAdvisorInfo->getAdvisorDtlById(base64_decode($_REQUEST['advisorId']));
				$advisorInfo = $objAdvisorInfo->getAllRow();
			
			#ConditionPoint:
			if(!empty($advisorInfo['linkedin_profile_id'])){
				#Generate verification code
				$confirmCode = $_REQUEST['advisorId'].":".uniqid().":".$_REQUEST['advisorId'];
				#$confirmLink = $_SERVER['HTTP_HOST']."activate_account.php?cd=".$confirmCode;
				$confirmLink = site_path."register-code";
					#SendMail:
					#clone:
					$objGblSett=clone $ajaxObj;
					$objGblSett->getGlobalRecordById($rec_id=2);
					
					#clone:
					$objRegMail = clone $ajaxObj;
					$objAdv = clone $ajaxObj;
					$objAdv->getAdvisorDtlById(base64_decode($_REQUEST['advisorId']));
					$objAdv->getRow();
					
						$to		   = $objAdv->getField('email');
						$from      = $objGblSett->getField('value');
						$temp_name = "verify_account_email_by_admin ";
						$var_array = array("%%first_name%%"=>$objAdv->getField('first_name'),"%%last_name%%"=>$objAdv->getField('last_name'),
											"%%confirm_link%%"=>$confirmLink,"%%confirm_code%%"=>$confirmCode);
					$result = $objRegMail->custom_send_email($to,$from,$temp_name,$var_array);

			}else{ 				
					#Generate verification code
					$confirmCode = $_REQUEST['advisorId'].":".uniqid().":".$_REQUEST['advisorId'];
					#$confirmLink = $_SERVER['HTTP_HOST']."activate_account.php?cd=".$confirmCode;
					$confirmLink = site_path."verify-account/".$confirmCode;
					
					#SendMail:
					#clone:
					$objGblSett=clone $ajaxObj;
					$objGblSett->getGlobalRecordById($rec_id=2);
					
					#clone:
					$objRegMail = clone $ajaxObj;
					$objAdv = clone $ajaxObj;
					$objAdv->getAdvisorDtlById(base64_decode($_REQUEST['advisorId']));
					$objAdv->getRow();
					
						$to		   = $objAdv->getField('email');
						$from      = $objGblSett->getField('value');
						$temp_name = "advisor_verify_account";
						$var_array = array("%%first_name%%"=>$objAdv->getField('first_name'),"%%last_name%%"=>$objAdv->getField('last_name'),
											"%%confirm_link%%"=>$confirmLink,"%%password%%"=>base64_decode($objAdv->getField('password')),"%%email%%"=>$objAdv->getField('email'));
					$result = $objRegMail->custom_send_email($to,$from,$temp_name,$var_array);

			}

			time_nanosleep(0,100000);			

			#KeeoInDbTbl::advisor_details.
			if($result){
				#clone:
				$objUdCodeLink = clone $obj_admin;
					#parameter:
					$tableName   = "advisor_details";
					$set_fields  = "`verification_code`='".$confirmCode."'";
					$where_field = "`advisor_id`='".base64_decode($_REQUEST['advisorId'])."'";
				$rsCodeUp = $objUdCodeLink->UPDATE_ANYRECORD_IN_TABLE($tableName,$set_fields,$where_field);
			}
			
			$status='Yes';
		}
		echo $ajaxObj->changeAdvisorVerifyStatus($_REQUEST['advisorId'],$status);
	}
	if($_REQUEST['action']=='chk_cat_duplication'){
		$ajaxObj->chkCatNameDuplication($_REQUEST['crntCatId'],$_REQUEST['cat_name']);
		if($ajaxObj->numofrows()>0){
			echo "false";
		}else{
			echo "true";
		}
	}
	if($_REQUEST['action']=='get_cat_name_by_id'){
		$ajaxObj->getCategoryDtlById($_REQUEST['cat_id']);
		if($ajaxObj->numofrows()>0){
			$ajaxObj->getRow();
			echo '<label>Parent Category Name : <sup style="color:#FF0000;font-weight:bold;"></sup></label>
							<input type="text" name="parentCatName" id="parentCatName" value="'.$ajaxObj->getField('cat_name').'" 
                            style="width:92%;" />
                            <input type="hidden" name="parentCatId" id="parentCatId" style="width:92%;"
							value="'.$ajaxObj->getField('cat_id').','.$ajaxObj->getField('cat_level').'" />';
		}else{
			echo '<label>Parent Category Name : <sup style="color:#FF0000;font-weight:bold;"></sup></label>
							<input type="text" name="parentCatName" id="parentCatName" value="Main" style="width:92%;" />
                            <input type="hidden" name="parentCatId" id="parentCatId" style="width:92%;" value="0,0" />';
		}
	}

?>