<?php
#RequiresFiles:
require_once("../../../pi_classes/commonSetting.php");
include('../../../pi_classes/User.php');

#Objects:
$obj	=	new User();

#Action:
	#Var:
	$email = $_REQUEST['femail'];
	
	#Qry::parameter-	
	$table_name = "user_details";
	$whereCnd = " where email = '".$email."'";
	$obj->retrieve_data_from_table($table_name, $whereCnd);
	#clone
	$objAdv = clone $obj;
	$table_name = "advisor_details";
	$objAdv->retrieve_data_from_table($table_name, $whereCnd);
	
	if($obj->numofrows() || $objAdv->numofrows()) //ENTER ADVISOR NUMOFROWS IN IF COND USING OR
	{
		die("true");
	}
	else{
		die("false");
	}
?>