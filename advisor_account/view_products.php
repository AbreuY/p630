<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

checkAdvisorSession($_SESSION['advisor_id']);
$advisorId	= $_SESSION['advisor_id'];
#Objects
	$objUser = new User();

#GetData~~~Products
	$objPro = clone $objUser;
	$table_name='product';
	$whereCnd=' where `advisor_id` = '.$advisorId;
	$objPro->retrieve_data_from_table($table_name, $whereCnd);
	while($tempArr =  $objPro->getAllRow()){
		$ProArr[] = $tempArr;
	}
	$smarty->assign("ProArr",$ProArr);
#View:
$smarty->display('../templates/advisor_account/view_products.tpl');
?>