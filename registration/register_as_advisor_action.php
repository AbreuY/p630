<?php
// REQUIRED FILE :
	require_once("../pi_classes/commonSetting.php");
	include('../pi_classes/User.php');

#Objects:
$objAdv = new User();

if(strcmp($_POST['submit'],"Apply as advisor")==0){
		#PostVar:
		extract($_POST);
		
			#clone:
			$objInertResgt = clone $objAdv;
			
			#Entering values in DB 
			$table_name = "advisor_details";
			$fields 	= "`first_name`,`last_name`,`email`,`password`,`qualification`,`created_date`";
			$values 	= "'".$fname."', '".$lname."', '".$email."', '".base64_encode($pass)."','".$qual."','".date('Y-m-d H:i:s')."'";
			$aid = $objInertResgt->insert_row_in_table($table_name,$fields,$values);
		
		// Entering user workX
			
			#clone:
			$objInsertWork = clone $objAdv;
			
			#Entering values in DB
			$table_name = "advisor_experience";
			$fields 	= "`employer`,`advisor_id`,`title`,`month_from`,`month_to`";
			$n = count($employer);
			
			for($i = 0; $i<$n;$i++)
			{
				$values 	= "'".$employer[$i]."', '".$aid."', '".$titlePosition[$i]."', '".$monthFrom[$i]."', '".$monthTo[$i]."'";
				$objInsertWork->insert_row_in_table($table_name,$fields,$values);
			}
			
			
			// Entering user Education	
			#clone:
			$objInsertEdu = clone $objAdv;
			
			#Entering values in DB
			$table_name = "advisor_education";
			$fields 	= "`advisor_id`,`school`,`degree`";
			$n = count($university);
			
			for($i = 0;$i<$n;$i++)
			{
				$values 	= "'".$aid."', '".$university[$i]."', '".$degree[$i]."'";
				$objInsertEdu->insert_row_in_table($table_name,$fields,$values);
			}
			
			
			
			#Mailing Function will go here
			
			#clone:
			$objGblSett=clone $objAdv;
			$objGblSett->getGlobalRecordById($rec_id=2);
			#clone:
			$objRegMail = clone $objAdv;
				$to		   = $email;
				$from      = $objGblSett->getField('value');
				$temp_name = "advisor_regular_registration";
				$var_array = array("%%email%%"=>$email,"%%first_name%%"=>$fname,"%%last_name%%"=>$lname,"%%password%%"=>$pass);
			$objRegMail->custom_send_email($to,$from,$temp_name,$var_array);
			
			time_nanosleep(0, 200000);
			
			
			#MAil to admin~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
			if(true){
				#clone:
				$objAdmMail = clone $objAdv;
				$to_adm		   = $globalSettingArr['SITE_EMAIL'];
				$from_adm      = $globalSettingArr['SITE_EMAIL'];
				$temp_name_adm = "new_advisor_regular_registration";
				$var_array_adm = array("%%first_name%%"=>$fname,"%%email%%"=>$email);
				$objAdmMail->custom_send_email($to_adm,$from_adm,$temp_name_adm,$var_array_adm);
				time_nanosleep(0,30000);
				
			}
			
			
			#Redirect:
			$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> You have successfully requested for advisor profile, 
								you will receive confirmation email in coming 48/hr.!
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
								</div>';
			header("location: ../login");

}


?>