<?php
	#RequirFile:
	require_once('../pi_classes/commonSetting.php');
	require_once('../pi_classes/User.php');
	
	$linkArr = explode(":",$_GET['cd']);
	$uid = base64_decode($linkArr[0]);
	$code = $linkArr[1];
	
	#Objects:
	$objUsr = new User();
	
	
	#Condition:: Type 1,Check any one account session is active on same browser.
		if(!empty($_SESSION['user_id']) || !empty($_SESSION['advisor_id']) || !empty($_SESSION['advisor_id_IA'])){
			 #headerRedirect:
			 header("Location:".site_path."browser-message");
			 exit;
		}
	
	
	
	$tN="user_details";
	$wC=" where `user_id` = '".$uid."'";
	$objUsr->retrieve_data_from_table($tN,$wC);
	$objUsr->getRow();

	#Condition:: Type 2.
		if(strcmp("Active",$objUsr->getField('user_status')) == 0){
			$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg">You have already activated your account.
									<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
								</div>';
								if($_SESSION['user_id']){
									header("Location:".site_path."/user-edit-profile");exit;	 
								}else{
									header("Location:".site_path."/login");exit;	 								
								}
		}
	
	#Condition:: Type 3.
		if(strcmp($_GET['cd'], $objUsr->getField('verification_code')) == 0){
			$set_fields= "`user_status` = 'Active'";
			$objUsr->update_record_in_table($tN, $set_fields, $wC);
			$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg">You have activated your account, now you can Login.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
			if($_SESSION['user_id']){
				header("Location:".site_path."/user-edit-profile");exit;	 
			}else{
				header("Location:".site_path."/login");exit;	 								
			} 
		}
		else{
			$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> Do not edit the link, your account might still be inactive.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
			if($_SESSION['user_id']){
				header("Location:".site_path."/user-edit-profile");exit;	 
			}else{
				header("Location:".site_path."/login");exit;	 								
			}
		}
?>