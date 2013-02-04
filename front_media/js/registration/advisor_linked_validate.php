<?php
#RequiresFiles:
require_once("../../../pi_classes/commonSetting.php");
include('../../../pi_classes/User.php');

#Objects:
$obj	=	new User();

#Action:
	#Var:
	$email = $_REQUEST['linkd'];
	
	#Qry::parameter-	
	$table_name = "advisor_details";
	$whereCnd = " where linkedin_profile_id = '".$email."'";
	$obj->retrieve_data_from_table($table_name, $whereCnd);
	if($obj->numofrows())
	{
		die("false");
	}
	else{
		die("true");
	}
?>