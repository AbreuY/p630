<?php
ob_start();
session_start();
 require_once("../pi_classes/class.users.php");
$obj_user=new users();
if($_POST['end_date']=='')
{
	$end_date=date("Y-m-d");
}
else
{
	$end_date=$_POST['end_date'];
}
$whereCnd="`created_date` BETWEEN '".$_POST['start_date']."' and '".$end_date."'";
$obj_user->getRecordList($whereCnd);
$no_of_users=$obj_user->getCount();

echo $no_of_users;
?>