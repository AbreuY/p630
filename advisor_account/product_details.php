<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');
$pid = $_GET['pid'];
#Objects
	$objUser = new User();
#GetData~~~Products
	$objPro = clone $objUser;
	$table_name='product';
	$whereCnd=" where `product_id` = '".$pid."' and `status`='active'";
	$objPro->retrieve_data_from_table($table_name, $whereCnd);
	$ProArr =  $objPro->getRow();
	
	$smarty->assign("ProArr",$ProArr);
	
	#View:
	$smarty->display('../templates/advisor_account/product_details.tpl');
?>