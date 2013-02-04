<?php 
#RequirFile:
	require_once('../pi_classes/commonSetting.php');
	require_once('../pi_classes/User.php');

#Objects
	$objUser = new User();
	
#GetVar:	
	$tmpArr 	= explode(':',$_GET['cd']);
	$advId		= base64_decode($tmpArr[0]);
	$confimLink	= $_GET['cd'];
	
#Clone
$objGetAdv = clone $objUser;
	
#GetInfoOfAdvisor:
	$table_name="advisor_details";
	$whereCnd=" where `advisor_id` ='".$advId."'";
	$objGetAdv->retrieve_data_from_table($table_name, $whereCnd);
	$rsAdvInfoArr = $objGetAdv->getAllRow();
	
	if(strcmp($rsAdvInfoArr['advisor_status'],'Inactive')==0){
	#Movment::ToInitializeAvailabilityUpdat-AndThisIsNecc. 
			
			#Condition:: Check any one account session is active on same browser.
			if(!empty($_SESSION['user_id']) || !empty($_SESSION['advisor_id']) || !empty($_SESSION['advisor_id_IA'])){
				 #headerRedirect:
				 header("Location:".site_path."browser-message");
				 exit;
			}
			
			#Chk::AdvisorAvailabiltyAlreadyExistsOrNot. 
			$objChkAdvAvlbtExst = clone $objUser;
				#parameter:
				$setColoumFields = "";$tableName = "";$whereField = "";
				$setColoumFields = "id,advisor_id";
				$tableName 		 = "advisor_availability";
				$whereField 	 = "`advisor_id`='".$advId."'";
			$objChkAdvAvlbtExst->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
			
			if($objChkAdvAvlbtExst->numofrows()==0){
			
				#Step::1-set_default_availability:
				for($time=0;$time<=23;$time++){
						#clone:
						$objInsrtSetAdvAvlbltyDft = clone $objUser;
							#parameters:
							$tableName 		  = "advisor_availability";
							$fields 	 	  = "`advisor_id`,`time_id`,`monday`,`tuesday`,`wednesday`,`thursday`,`friday`,`saturday`,`sunday`";
							$values 	  	  = "'".$advId."','".$time."','No','No','No','No','No','No','No'";
							$rsInsrtAdvAvlblty = $objInsrtSetAdvAvlbltyDft->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);
				}	
			}
			
	#chk::point-&&!empty($rsInsrtAdvAvlblty)
		if((strcmp($rsAdvInfoArr['verification_code'],$confimLink)==0)&&(strcmp($advId,$rsAdvInfoArr['advisor_id'])==0)){
			 #headerRedirect:
			 $_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg">
			 					 You have successfully verified your email account. Please login and complete your profile to make your account Active.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
 			 header("Location:".site_path."login");
			 #header("Location:".site_path."active-account/profile-info/".$tmpArr[1].":".$tmpArr[0]);
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
?>