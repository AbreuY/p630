<?php
//REQUIRED FILE :
	require_once("../pi_classes/commonSetting.php");
	include('../pi_classes/User.php');


if($_POST['submit']){
	#PostVar:
		extract($_POST);

#Objects:
$objUser = new User();
$objUpdateUser = clone $objUser;
$table_name = "advisor_details";
$set_fields 	= "`password` = '".base64_encode($new_pass)."'";
$where_field 	= " where advisor_id = '".$_SESSION['advisor_id']."'";
$objUpdateUser->update_record_in_table($table_name, $set_fields, $where_field);


#clone:
			$objGblSett=clone $objUser;
			$objGblSett->getGlobalRecordById($rec_id=2);
			#clone:
			$objRegMail = clone $objUser;
				$to		   = $_SESSION['advisor_email'];
				$from      = $objGblSett->getField('value');
				$temp_name = "advisor_change_pass";
				$var_array = array("%%first_name%%"=>ucwords($_SESSION['user_name']),"%%email%%"=>$to,
								   "%%password%%"=>$new_pass);
			$objRegMail->custom_send_email($to,$from,$temp_name,$var_array);
			time_nanosleep(0,100000);
			
			$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Your profile information has been updated successfully.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							    </div>';
								
			header("Location: ../change-pass");

}