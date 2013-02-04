<?php
define('FACEBOOK_APP_ID', '499539660078768');
define('FACEBOOK_SECRET', 'c3ff4798316542b6285399f555336053');

function parse_signed_request($signed_request, $secret) {
  list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

  // decode the data
  $sig = base64_url_decode($encoded_sig);
  $data = json_decode(base64_url_decode($payload), true);

  if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
    error_log('Unknown algorithm. Expected HMAC-SHA256');
    return null;
  }

  // check sig
  $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
  if ($sig !== $expected_sig) {
    error_log('Bad Signed JSON signature!');
    return null;
  }

  return $data;
}

function base64_url_decode($input) {
    return base64_decode(strtr($input, '-_', '+/'));
}

if ($_REQUEST) {
  echo '<p>signed_request contents:</p>';
  $response = parse_signed_request($_REQUEST['signed_request'], 
                                   FACEBOOK_SECRET);
 /* echo '<pre>';
  print_r($response);
  echo '</pre>';*/
  
  // REQUIRED FILE :
	require_once("../pi_classes/commonSetting.php");
	include('../pi_classes/User.php');

#Objects:
$objUser = new User();
$email = $response['registration']['email'];
$name = $response['registration']['name'];
$gender = $response['registration']['gender'];
$dob = $response['registration']['birthday'];
$pass = $response['registration']['password'];
	
	#Qry::parameter-	
	$table_name = "user_details";
	$whereCnd = " where email = '".$email."'";
	$objUser->retrieve_data_from_table($table_name, $whereCnd);
	
	
	if($objUser->numofrows())
  	{
		//USERALREADY REGISTERED ---> REDIRECT TO LOGIN PAGE WITH MESSAGE
		$_SESSION['msg'] = "You are already registered with, why don't you Login";
		$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> You are already registered with, why do not you log in !
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
		header("Location: ../login");
	}
  	else
	{
		//REGISTER USER
		#clone:
			$objInertResgt = clone $objUser;
			
			#Entering values in DB
			$fields 	= "`username`,`email`,`password`,`verified`,`created_date`, `gender`";
			$values 	= "'".$name."' ,'".$email."', '".base64_encode($pass)."','Yes','".date('Y-m-d H:i:s')."' ,'".$gender."'";
			$uid = $objInertResgt->insert_row_in_table($table_name,$fields,$values);
			
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
  
  
  
  
}
else {
 // echo '$_REQUEST is empty';
  header("location: ../register");
}
?>