<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckUserLogin:
checkAdvisorSession($_SESSION['advisor_id']);

#Objects:
$objUser = new User();

	$table_name = "communication";
	$whereCnd = " where `to` = '".$_SESSION['advisor_id']."'and `from_type` = '0' and communication_id = '".$_GET['cid']."'";
	$objUser->retrieve_data_from_table($table_name, $whereCnd);
	$objUsrImg = clone $objUser;
	$tempRow = $objUser->getAllRow();
	
	$set = "`new_adv` = '0'";
	$objUser->update_record_in_table($table_name,$set,$whereCnd);
	
	if($tempRow['new_adv'] == '1'){
	$new_adv['count(*)'] = --$new_adv['count(*)'];
	$smarty->assign("new_adv",$new_adv['count(*)']);
	}
	
	
	
	$objUsrImg->retrieve_data_from_table("user_details", " where `user_id` = ".$tempRow['from']);
	$tempRowImg = $objUsrImg->getAllRow();
	$tempRow['img'] = $tempRowImg['image_path'];
	$tempRow['uname'] = $tempRowImg['username'];
	if(empty($tempRow['img'])){
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
		}
		if(empty($tempRow['img'])){
			$tempRow['img'] = "user-comment.png";
		}
		$tempRow['date'] = date("dS M Y | g:iA", strtotime($tempRow['date']));
		$com_rep[] = $tempRow;
	}
	//echo "COMM-----------------  <pre>";print_r($communication);echo"----------------------<br>";print_r($com_rep);echo "</pre>";die;
	
	
	
	#Other Step:
	$smarty->assign('communication', $communication);
	$smarty->assign('com_rep', $com_rep);
	
	
	
	#View:
	$smarty->display('../templates/advisor_account/communication_detail.tpl');
?>