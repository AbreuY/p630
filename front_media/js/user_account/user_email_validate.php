<?php
#RequiresFiles:
require_once("../../../pi_classes/commonSetting.php");
include('../../../pi_classes/User.php');

#Objects:
$obj	=	new User();
$objUsr = clone $obj;
$objUsr->retrieve_data_from_table("user_details", " where user_id = '".$_SESSION['user_id']."'");
$objUsr->getRow();
$oemail = $objUsr->getField("email");

#Action:
	#Var:
	$email = $_REQUEST['email'];		
	
	if($email != $oemail){
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
	}
	else{
		die("true");
	}
?>