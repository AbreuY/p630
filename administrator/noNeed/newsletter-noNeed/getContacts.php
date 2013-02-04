<?php 
require_once("../../pi_classes/commonSetting.php");
chkAdminLogin($_SESSION['adminID']);
require_once("../../pi_classes/class.users.php");
$usersObj=new users();	

$fp = fopen('upload/user_report.csv','r') or die("can't open file");
$str="";
$row=0;

while($csv_line = fgetcsv($fp,1024)) {   
    for ($i=0, $j=count($csv_line); $i < $j; $i++) {
		if($i==4)
		{
			if($row!=0)
			{
					if($str!="")
				  		$str.=",";
					$str.=$csv_line[$i]; 	 	 								
			}	
		}		
    }
	$row++;
}
fclose($fp) or die("can't close file");

$arr=explode(",",$str);
if (!preg_match('|^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$|i',$arr[0])) {
	$str="";
}


/*
$whereCnd=" `user_status`='Active' and `receive_bidder_email`='y'";
$usersObj->getRecordList($whereCnd); 
$recordcount = $usersObj->getCount();
$str1="";

if($recordcount > 0)
{
	while($usersObj->getRow())
	{
		$email_fld=$usersObj->getField('email');
	//	echo $email_fld;die;
		if($str1!="")
			$str1.=",";
		$str1.=$email_fld; 		 
	}	 
}
*/

echo $str;
?>