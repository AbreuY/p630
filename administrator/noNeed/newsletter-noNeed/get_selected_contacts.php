<?php
//require_once("../../pi_classes/commonSetting.php");
//chkAdminLogin($_SESSION['adminID']);
require_once("../../pi_classes/class.users.php");
$usersObj=new users();	
$usersObj1=clone $usersObj;
$usersObj2=clone $usersObj;
$usersObj3=clone $usersObj;
$usersObj4=clone $usersObj;

//print_r($_POST);print_r($_GET);die;

if(isset($_POST['group_id']) && $_POST['group_id'] != '')
{
	if(strcmp($_POST['group_id'],"0")==0)
	{
		$whereCnd=" `user_status`='Active'";
		$usersObj->getRecordList($whereCnd); 
		$recordcount = $usersObj->getCount();
		$str="";		
		if($recordcount > 0)
		{
			while($usersObj->getRow())
			{
				$email_fld=$usersObj->getField('email');
				if($str!="")
					$str.=",";
				$str.=$email_fld; 		 
			}	 
		}
		echo $str;
	}
	else if(strcmp($_POST['group_id'],"1")==0)
	{
		$whereCnd=" `user_status`='Active' and `style_notes`='Y'";
		$usersObj1->getRecordList($whereCnd); 
		$recordcount = $usersObj1->getCount();
		$str="";		
		if($recordcount > 0)
		{
			while($usersObj1->getRow())
			{
				$email_fld=$usersObj1->getField('email');
				if($str!="")
					$str.=",";
				$str.=$email_fld; 		 
			}	 
		}
		echo $str;		
	}
	else if(strcmp($_POST['group_id'],"2")==0)
	{
		$whereCnd=" `user_status`='Active' and `receive_bidder_email`='y'";
		$usersObj2->getRecordList($whereCnd); 
		$recordcount = $usersObj2->getCount();
		$str="";		
		if($recordcount > 0)
		{
			while($usersObj2->getRow())
			{
				$email_fld=$usersObj2->getField('email');
				if($str!="")
					$str.=",";
				$str.=$email_fld; 		 
			}	 
		}
		echo $str;		
	}	
	else if(strcmp($_POST['group_id'],"3")==0)
	{
		$whereCnd=" `user_status`='Active' and `upcoming_auctions`='Y'";
		$usersObj3->getRecordList($whereCnd); 
		$recordcount = $usersObj3->getCount();
		$str="";		
		if($recordcount > 0)
		{
			while($usersObj3->getRow())
			{
				$email_fld=$usersObj3->getField('email');
				if($str!="")
					$str.=",";
				$str.=$email_fld; 		 
			}	 
		}
		echo $str;		
	}
	else if(strcmp($_POST['group_id'],"4")==0)
	{
		$usersObj4->getSubscribers(); 
		$recordcount = $usersObj4->getCount();
		$str="";		
		if($recordcount > 0)
		{
			while($usersObj4->getRow())
			{
				$email_fld=$usersObj4->getField('sub_email');
				if($str!="")
					$str.=",";
				$str.=$email_fld; 		 
			}	 
		}
		echo $str;		
	}	
	else
	{
		$str="";
		echo $str;
	}	
}
else
{
	$str="";
	echo $str;	
}
?>