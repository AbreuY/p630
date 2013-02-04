<?php
	require_once('../pi_classes/commonSetting.php');
	require_once('../pi_classes/Admin.php');
	
	#objects:
	$objAdminLog=new Admin();
	$objAdminLog->getLoginDetails($_POST['admin_uname'],$_POST['admin_pass']);
	$xy = $objAdminLog->getAllRow();
		
	print_r($xy);
	echo "vdl";
	
	if($objAdminLog->numofrows()>0){
		if($objAdminLog->getField('active')){
			$_SESSION['admin_id']=$objAdminLog->getField('admin_id');
			$_SESSION['admin_email']=$objAdminLog->getField('email');
			$_SESSION['username']=$objAdminLog->getField('username');
			header("location:index.php");
		}else{
			$_SESSION['admin_inactive']=true;
			header("location:login.php?admin_inactive=yes");
		}
	}else{
		$_SESSION['no_admin_record']=true;
		header("location:login.php?no_admin_record=yes");
	}
?>