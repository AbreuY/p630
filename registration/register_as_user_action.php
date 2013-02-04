<?php
//REQUIRED FILE:
	require_once("../pi_classes/commonSetting.php");
	include('../pi_classes/User.php');

#Objects:
$objUser = new User();
	
if($_POST['submit']){
		#PostVar:
		extract($_POST);
		
		#Validations:
		if(($captchaword==$_SESSION['captcha']['code']) )
		{
			#clone:
			$objInertResgt = clone $objUser;
			
			#Entering values in DB
			$table_name = "user_details";
			$fields 	= "`username`,`email`,`password`,`verified`,`created_date`";
			$values 	= "'".$name."' ,'".$email."', '".base64_encode($pass)."','Yes','".date('Y-m-d H:i:s')."'";
			$uid=$objInertResgt->insert_row_in_table($table_name,$fields,$values);
			
			$code = base64_encode($uid).":".uniqid("",true);
			$link = site_path."activate-user/".$code;
			
			$set_fields= "`user_status` = 'Inactive', `verification_code` = '".$code."'";
			$where_field=" where user_id = '".$uid."'";
			$objInertResgt->update_record_in_table($table_name, $set_fields, $where_field);
			
			
			#Mailing Function will go here
			#clone:
			$objGblSett=clone $objUser;
			$objGblSett->getGlobalRecordById($rec_id=2);
			#clone:
			$objRegMail = clone $objUser;
				$to		   = $email;
				$from      = $objGblSett->getField('value');
				$temp_name = "user_registration";
				$var_array = array("%%username%%"=>ucwords($name),"%%email%%"=>$email,
								   "%%password%%"=>$pass, "%%confirm_link%%"=> $link);
			$objRegMail->custom_send_email($to,$from,$temp_name,$var_array);
			time_nanosleep(0,100000);
			
			
			#MAil to admin~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
			if(true){
				#clone:
				$objAdmMail = clone $objUser;
				$to_adm		   = $globalSettingArr['SITE_EMAIL'];
				$from_adm      = $globalSettingArr['SITE_EMAIL'];
				$temp_name_adm = "new_user_registration";
				$var_array_adm = array("%%username%%"=>ucwords($name),"%%email%%"=>$email);
				$objAdmMail->custom_send_email($to_adm,$from_adm,$temp_name_adm,$var_array_adm);
				time_nanosleep(0,30000);
				
			}
			
			#Redirect:
			 $_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Email with your login details has been sent on your email address.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
			header("location: ../login");
			exit;
		}
		else{
			die;
			header("Location: ../register-as-user");
		}
}

?>