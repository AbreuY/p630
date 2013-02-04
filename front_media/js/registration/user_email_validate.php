<?php
#RequiresFiles:
require_once("../../../pi_classes/commonSetting.php");
include('../../../pi_classes/User.php');

#Objects:
$obj	=	new User();

#Action:
	#Var:
	$email = $_REQUEST['email'];		
	
	#Qry::parameter-	
	$table_name = "user_details";
	$whereCnd   = "where email = '".$email."'";
	$obj->retrieve_data_from_table($table_name, $whereCnd);
	if($obj->numofrows())
	{
		die("false");
	}
	else{
		die("true");
	}
?>