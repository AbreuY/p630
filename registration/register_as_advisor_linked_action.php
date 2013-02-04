<?php
// REQUIRED FILE :
	require_once("../pi_classes/commonSetting.php");
	include('../pi_classes/User.php');

#Objects:
$objUser = new User();
	
if($_POST['submit']){
		#PostVar:
		extract($_POST);

			#clone:
			$objInsertAdv = clone $objUser;
			
			$objInsertAdv->advisor_reg_linkedin($email, $linkd);
			
			#Mailing Function will go here
			#clone:
			$objGblSett=clone $objUser;
			$objGblSett->getGlobalRecordById($rec_id=2);
			#clone:
			$objRegMail = clone $objUser;
				$to		   = $email;
				$from      = $objGblSett->getField('value');
				$temp_name = "advisor_linkedin_registration";
				$var_array = array("%%email%%"=>$email);
			$objRegMail->custom_send_email($to,$from,$temp_name,$var_array);
			time_nanosleep(0,100000);
			
			
			
			#MAil to admin~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
			if(true){
				#clone:
				$objAdmMail = clone $objUser;
				$to_adm		   = $globalSettingArr['SITE_EMAIL'];
				$from_adm      = $globalSettingArr['SITE_EMAIL'];
				$temp_name_adm = "new_advisor_linkedin_registration";
				$var_array_adm = array("%%linked%%"=>$linkd,"%%email%%"=>$email);
				$objAdmMail->custom_send_email($to_adm,$from_adm,$temp_name_adm,$var_array_adm);
				time_nanosleep(0,30000);
				
			}
					
			
			#Redirect:
			$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> You have successfully requested for advisor profile, you will receive confirmation email in coming 48/hr.!
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
								</div>';
			header("location:../login");
}
?>