<?php

#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckAdvisorSession:
checkAdvisorSession($_SESSION['advisor_id']);
	
$pid = $_GET['pid'];
$objPro = new User();
$table = "product";
$where = " where `product_id` = ".$pid;
$objPro->retrieve_data_from_table($table,$where);
$pro = $objPro->getAllRow();
$paid = $pro['type'];

	$smarty->assign("pid",$pid);
	$smarty->assign("paid",$paid);
	



#View:
$smarty->display('../templates/advisor_account/preview_product.tpl');
?>