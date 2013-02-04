<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckAdvisorSession:
checkAdvisorSession($_SESSION['advisor_id']);

#Objects
	$objUser = new User();

#GetVar:
	$advisorId	= $_SESSION['advisor_id'];
	
	#GetFiles:
	$table_name ="files";
	$whereCnd = " where advisor_id=".$advisorId;
	
	$objAdv = clone $objUser;
	$objAdv->retrieve_data_from_table($table_name, $whereCnd);
	while($tmpAray = $objAdv->getAllRow()){
		$files[$objAdv->getField('type')][] = $tmpAray;
	}
	$smarty->assign("files",$files);
	
	
	#GetCategory:
	$table_name ="category";
	$whereCnd = " where cat_level= 1";
	$objCat = clone $objUser;
	$objCat->retrieve_data_from_table($table_name, $whereCnd);
	while($tmpAray = $objCat->getAllRow()){
		$category[] = $tmpAray;
	}
	
	$smarty->assign("category",$category);
	



#View:
$smarty->display('../templates/advisor_account/create_product.tpl');
?>