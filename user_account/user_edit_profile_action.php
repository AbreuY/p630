<?php
//REQUIRED FILE :
	require_once("../pi_classes/commonSetting.php");
	require_once("../pi_classes/ThumbLib.inc.php"); 
	include('../pi_classes/User.php');

#Objects:
$objUser = new User();


if(!empty($_POST['email'])){

	#PostVar:
		extract($_POST);
	#clone:
			$objUpdateUser = clone $objUser;
			
	#Action::UsrProfilePhotoThunailOptn-
			#Entering values in DB
			$table_name 	= "user_details";
			$set_fields 	= 	"`username` = '".$name."',
								`bank_code` = '".$bank_code."',
								`branch_code` = '".$branch_code."',
								`IBAN_code` = '".$iban_no."'";
			$where_field 	= " where user_id = '".$_SESSION['user_id']."'";
			$objUpdateUser->update_record_in_table($table_name, $set_fields, $where_field);
			
			#If user password chnage, Then system send bellow mail to user - mailing Function will go here
			if($change_pass_check)
			{
					$set_fields 	= "`password` = '".base64_encode($new_pass)."'";
					$where_field 	= " where user_id = '".$_SESSION['user_id']."'";
					$objUpdateUser->update_record_in_table($table_name, $set_fields, $where_field);
					
				#mailing Function will go here
					#clone:
					$objGblSett=clone $objUser;
					$objGblSett->getGlobalRecordById($rec_id=2);
					#clone:
					$objRegMail = clone $objUser;
						$to		   = $email;
						$from      = $objGblSett->getField('value');
						$temp_name = "user_change_pass";
						$var_array = array("%%username%%"=>ucwords($name),"%%email%%"=>$email,
										   "%%password%%"=>$new_pass);
					$objRegMail->custom_send_email($to,$from,$temp_name,$var_array);
				time_nanosleep(0,100000);
			}
			
			#If user email id chnage, Then system send bellow mail to user with emial account activation link - mailing Function will go here			
			if($email != $oemail){
				#clone:
				$objUseEmail = clone $objUser;
				#parameters:
				$where_field 	= " where user_id = '".$_SESSION['user_id']."'";
				$objUseEmail->retrieve_data_from_table($table_name, $where_field);
				$objUseEmail->getRow();
				$code = $objUseEmail->getField("verification_code");
				$link = site_path."activate-user/".$code;

				#Mailing Function will go here
					#clone:
					$objRegMail = clone $objUser;
						$to		   = $email;
						$from      = $globalSettingArr['SITE_EMAIL'];
						$temp_name = "user_change_email";
						$var_array = array("%%username%%"=>ucwords($objUseEmail->getField("username")),"%%email%%"=>$email,
										   "%%password%%"=>base64_decode($objUseEmail->getField("password")), "%%confirm_link%%"=> $link);
					$objRegMail->custom_send_email($email,$from,$temp_name,$var_array);
					time_nanosleep(0,100000);
				
				
				$set_fields 	= "`email` = '".$email."', user_status = 'Inactive'";
				$objUpdateUser->update_record_in_table($table_name, $set_fields, $where_field);
				#@~
				$_SESSION['user_email'] = $email;
			
				#Redirect:
				 $_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg">
										Email with an verification link has been sent on your new email address, until you verify, your account will be inactive 
										for new email address.
										<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
									</div>';
				 header("Location: ../user-edit-profile"); exit;
			}
			$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Your profile information has been updated successfully.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							    </div>';
			header("Location: ../user-edit-profile"); exit;
}
?>



<?php 
#BK-Code::
/*'	if($_FILES['profilePhoto']['name'] != ''){
'			$photo_name 	= $_FILES['profilePhoto']['name'];
'			$photo_type 	= $_FILES['profilePhoto']['type'];
'			$photo_tmp_name = $_FILES['profilePhoto']['tmp_name'];
'			$photo_error 	= $_FILES['profilePhoto']['error'];
'			$photo_size 	= $_FILES['profilePhoto']['size'];
'			
'			$pathInfoArr = pathinfo($photo_name);
'			$rename_photo_name = uniqid().".".$pathInfoArr['extension'];
'
'			$org_target_path	= "../front_media/images/user_images/".$rename_photo_name;
'			$thumb_target_path	= "../front_media/images/user_images/180X180px/".$rename_photo_name;
'
'			$upsus=move_uploaded_file($photo_tmp_name,$org_target_path);
'			$thumb = PhpThumbFactory::create($org_target_path);
'			$thumb->adaptiveResize(180, 180); //width, height
'			$thumb->resize(180, 180); //width, height
'			$thumb->save($thumb_target_path);		
'		}
'	else{
'			$rename_photo_name = $old_image_path;
'		}*/
?>