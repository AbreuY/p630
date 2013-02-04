<?php
//REQUIRED FILE :
	require_once("../pi_classes/commonSetting.php");
	include('../pi_classes/User.php');

//Objects:
$objUser = new User();

//GET USER PASSWORD
	$table_name = "user_details";
	$whereCnd = " where `email` = '".$_POST['femail']."'";
	$objUser->retrieve_data_from_table($table_name, $whereCnd);
	$objUser->getRow();
	if($objUser->numofrows()){
	$pass = base64_decode($objUser->getField('password'));
	$username = $objUser->getField('username');
	
//SEND EMAIL TO USER
	#clone:
			$objGblSett=clone $objUser;
			$objGblSett->getGlobalRecordById($rec_id=2);
	#clone:
			$objForgotMail = clone $objUser;
				$to		   = $_POST['femail'];
				$from      = $objGblSett->getField('value');
				$temp_name = "forgot_password";
				$var_array = array("%%username%%"=>ucwords($username),"%%email%%"=>$_POST['femail'],
								   "%%password%%"=>$pass);
			$objForgotMail->custom_send_email($to,$from,$temp_name,$var_array);
			time_nanosleep(0,100000);
			
			$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Email with your login details has been sent successfully.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
	}
	
	
#~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	
	//GET Advisor PASSWORD
	$objAdv = clone $objUser;
	$table_name = "advisor_details";
	$whereCnd = " where `email` = '".$_POST['femail']."'";
	$objAdv->retrieve_data_from_table($table_name, $whereCnd);
	$objAdv->getRow();
	if($objAdv->numofrows()){
	
	$pass = base64_decode($objAdv->getField('password'));
	$username = $objAdv->getField('first_name');
	
//SEND EMAIL TO USER
	#clone:
			$objGblSett=clone $objUser;
			$objGblSett->getGlobalRecordById($rec_id=2);
	#clone:
			$objForgotMail = clone $objUser;
				$to		   = $_POST['femail'];
				$from      = $objGblSett->getField('value');
				$temp_name = "forgot_password";
				$var_array = array("%%username%%"=>ucwords($username),"%%email%%"=>$_POST['femail'],
								   "%%password%%"=>$pass);
			$objForgotMail->custom_send_email($to,$from,$temp_name,$var_array);
			time_nanosleep(0,100000);
			
			$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Email with your login details has been sent successfully.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
	}
			header("Location: ../login");
?>