<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckUserLogin:
checkUserSession($_SESSION['user_id']);

#Objects:
$objUser = new User();

	$table_name = "communication";
	$whereCnd = " where `from` = '".$_SESSION['user_id']."'and `from_type` = '0' and communication_id = '".$_GET['cid']."'";
	$objUser->retrieve_data_from_table($table_name, $whereCnd);
	
	$tempRow = $objUser->getAllRow();
	$objUsrImg = clone $objUser;
	$objUsrImg->retrieve_data_from_table("user_details", " where `user_id` = ".$tempRow['from']);
	$tempRowImg = $objUsrImg->getAllRow();
	$tempRow['img'] = $tempRowImg['image_path'];
	if(!isset($tempRow['img'])){
			$tempRow['img'] = "user-comment.png";
	}
	$tempRow['date_created'] = date("dS M Y | g:iA", strtotime($tempRow['date_created']));
	$communication = $tempRow;
	//echo "<pre>";print_r($communication);echo "</pre>";die;
	
	$objComRep = clone $objUser;
	$table_name = "communication_reply";
	$whereCnd = " where `communication_id` = '".$communication['communication_id']."' order by `date` ASC";
	$objComRep->retrieve_data_from_table($table_name, $whereCnd);
	$objUsrImg = clone $objUser;
	$objAdvImg = clone $objUser;
	$objUsrImg->retrieve_data_from_table("user_details", " where `user_id` = ".$communication['from']);
	$objAdvImg->retrieve_data_from_table("advisor_details", " where `advisor_id` = ".$communication['to']);
	$usr = $objUsrImg->getAllRow();
	$adv = $objAdvImg->getAllRow();
	while($tempRow = $objComRep->getAllRow()){
		if($tempRow['from_type'] == 0){
			$tempRow['img'] = $usr['image_path'];
			$tempRow['u_a'] = "user_images";
		}else{
			$tempRow['img'] = $adv['image_path'];
			$tempRow['u_a'] = "advisor_images";
			$adv_name = $adv['first_name'];
		}
		if(!isset($tempRow['img'])){
			$tempRow['img'] = "user-comment.png";
		}
		$tempRow['date'] = date("dS M Y | g:iA", strtotime($tempRow['date']));
		$com_rep[] = $tempRow;
	}
	//echo "COMM-----------------  <pre>";print_r($communication);echo"----------------------<br>";print_r($com_rep);echo "</pre>";die;
	
	
	
	#Other Step:
	$smarty->assign('communication', $communication);
	$smarty->assign('com_rep', $com_rep);
	$smarty->assign('adv_name', $adv_name);
	
	
	#View:
	$smarty->display('../templates/user_account/communication_detail.tpl');
?>