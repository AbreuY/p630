<?php	
// REQUIRED FILE :
	require_once("../pi_classes/commonSetting.php");
	include('../pi_classes/User.php');

extract($_POST);

if($user_advisor == 'user') //USER LOGIN
{
	#Objects:
	$objUser = new User();
	$table_name = "user_details";
	$whereCnd = " where email = '".$email."' AND password = '".base64_encode($pass)."'";
	$objUser->retrieve_data_from_table($table_name, $whereCnd);
	$objUser->getRow();

	if($objUser->numofrows()>0&&(strcmp($objUser->getField('user_status'),"Active")==0)){
		#@:-
		$_SESSION['user_id']    = $objUser->getField('user_id');
		$_SESSION['user_type']  = "User";
		$_SESSION['user_email'] = $objUser->getField('email');
		header("Location: ../user-dashboard");
	
	}elseif($objUser->getField('user_status')=="Inactive"){
		#@:-
		$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> Sorry! your account status is inactive.
								Please contact to administrator.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
		header("Location: ../login");
	}
	else{
		$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> Wrong email address and passowrd as an service seeker !
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
		header("Location: ../login");
	}
}
else if($user_advisor == 'advisor') // ADVISOR LOGIN
{
	#Objects:
	$objAdv = new User();
	$table_name = "advisor_details";
	$whereCnd = " where email = '".$email."' AND password = '".base64_encode($pass)."'";
	$objAdv->retrieve_data_from_table($table_name, $whereCnd);
	$objAdv->getRow();
	if($objAdv->numofrows()>0&&(strcmp($objAdv->getField('advisor_status'),"Active")==0)&&(strcmp($objAdv->getField('verified'),"Yes")==0))
	{
		#@:-
		$_SESSION['advisor_id'] = $objAdv->getField('advisor_id');
		$_SESSION['advisor_type']  = "Advisor";
		$_SESSION['advisor_email'] = $objAdv->getField('email');		
		header("Location:".site_path."my-profile/edit-advisor-profile");

	}elseif($objAdv->getField('verified')=="No"){
		#@:-
		$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> Sorry! your request for advisor is still not verified by administrator.
								Please wait for approval.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
		header("Location: ../login");	
	}elseif($objAdv->getField('advisor_status')=="Inactive"){
		#@:-
		$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> Please complete your profile to make it Active.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
		$code= $objAdv->getField('verification_code');
		$cd = explode(":", $code);
		$_SESSION['advisor_id_IA'] = $objAdv->getField('advisor_id');
		header("Location: ../active-account/profile-info/".$cd[1].":".$cd[2]);
	}else{
		#@:-
		$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> Wrong email address and passowrd as an advisor !
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
		header("Location: ../login");
	}
}
else
{
	$_SESSION['msg'] = "Select one user or advisor!";
	header("Location: ../login");
}
?>