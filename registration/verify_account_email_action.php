<?php 
#RequirFile:
	require_once('../pi_classes/commonSetting.php');
	require_once('../pi_classes/User.php');

#Objects
	$objUser = new User();

if(strcmp($_POST['submit'],"Verify Account Email")==0){

#GetVar:	
	$tmpArr 	= explode(':',$_POST['registrationCode']);
	$advId		= base64_decode($tmpArr[0]);
	$confimCode	= $_POST['registrationCode'];
	$confirmLink= $confirmLink = site_path."verify-account/".$confimCode;
	
#Clone
$objGetAdv = clone $objUser;

#GetInfoOfAdvisor:
	$table_name="advisor_details";
	$whereCnd=" where `advisor_id` ='".$advId."'";
	$objGetAdv->retrieve_data_from_table($table_name, $whereCnd);
	$rsAdvInfoArr = $objGetAdv->getAllRow();
	
	if(strcmp($rsAdvInfoArr['advisor_status'],'Inactive')==0){
	#Movment::ToInitializeAvailabilityUpdat-AndThisIsNecc. 

	#chk::point-&&!empty($rsInsrtAdvAvlblty)
		if((strcmp($rsAdvInfoArr['verification_code'],$confimCode)==0)&&(strcmp($advId,$rsAdvInfoArr['advisor_id'])==0)){
			 
			 #updateUserInfo:
			 	#clone:
				$objUdCodeLink = clone $objUser;
					#parameter:
					$tableName   = "advisor_details";
					$set_fields  = "`first_name`='".$_POST['fname']."',`last_name`='".$_POST['lname']."',`password`='".base64_encode($_POST['pass'])."'";
					$where_field = "`advisor_id`='".$advId."'";
					$rsCodeUp = $objUdCodeLink->UPDATE_ANYRECORD_IN_TABLE($tableName,$set_fields,$where_field);

					#SendMail:
					#clone:
					$objGblSett=clone $objUser;
					$objGblSett->getGlobalRecordById($rec_id=2);
					
						$to		   = $_POST['email'];
						$from      = $objGblSett->getField('value');
						$temp_name = "advisor_verify_account"; 	
						$var_array = array("%%first_name%%"=>$rsAdvInfoArr['first_name'],"%%last_name%%"=>$rsAdvInfoArr['last_name'],
											"%%confirm_link%%"=>$confirmLink,"%%password%%"=>$_POST['pass'],"%%email%%"=>$rsAdvInfoArr['email']);
					
					#clone:
					$objRegMail = $objUser;
					$result = $objRegMail->custom_send_email($to,$from,$temp_name,$var_array);
				
			 #headerRedirect:
			 $_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> 
			 					Thank you ! You have successfully verify account email. Please check mail on email address.  
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
								</div>';
			 header("Location:".site_path."register-code");
			 exit;
		}else{
			 #headerRedirect:
			 header("Location:../404.php");
			 exit;
		}
	}else{
			#headerRedirect:
			 header("Location:../404.php");
			 exit;
	}
}else{
			#headerRedirect:
			 header("Location:../404.php");
			 exit;
}
?>