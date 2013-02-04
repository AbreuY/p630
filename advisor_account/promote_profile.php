<?php 
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckAdvisorSession:
checkAdvisorSession($_SESSION['advisor_id']);
 		$objAdv = new User();
	$table = "advisor_details";
	$where = " where advisor_id =".$_SESSION['advisor_id'];
	$objAdv->retrieve_data_from_table($table,$where);
	$data = $objAdv->getAllRow();
	$data['priceWebConsulte'] = intval($data['priceWebConsulte']);
	$data['priceEmailConsulte']= intval($data['priceEmailConsulte']);
	
	$smarty->assign("data",$data);
	
#View:
$smarty->display('../templates/advisor_account/promote_profile.tpl');
?>	