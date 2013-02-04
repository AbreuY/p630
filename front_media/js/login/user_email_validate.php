<?php
#RequiresFiles:
require_once("../../../pi_classes/commonSetting.php");
include('../../../pi_classes/User.php');

#Objects:
$obj	=	new User();
$objAdv	=	new User();
#Action:
	#Var:
	$email = $_REQUEST['email'];
	
	#Qry::parameter-	
	$table_name = "user_details";
	$whereCnd   = "where email = '".$email."'";
	$obj->retrieve_data_from_table($table_name,$whereCnd);
	$objAdv->retrieve_data_from_table("advisor_details", $whereCnd);
	$cnd = $obj->numofrows() + $objAdv->numofrows();
	
	if($cnd) //ENTER ADVISOR NUMOFROWS IN IF COND USING OR
	{
		die("true");
	}
	else{
		die("false");
	}
?>