<?php
#RequiresFiles:
require_once("../../../pi_classes/commonSetting.php");
include('../../../pi_classes/User.php');

#Objects:
$objAdv	=	new User();
$objUsr	=	new User();

#Action:
	#Var:
	$email = $_REQUEST['email'];		
	
	#Qry::parameter-For Advisor:	
	$table_name = "advisor_details";
	$whereCnd = " where email = '".$email."'";
	$objAdv->retrieve_data_from_table($table_name, $whereCnd);
	if($objAdv->numofrows())
	{
		die("false");
	}
	else{
		die("true");
	}
?>