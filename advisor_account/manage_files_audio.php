<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#CheckAdvisorSession:
checkAdvisorSession($_SESSION['advisor_id']);

#Objects
	$objAdv = new User();

#GetVar:
	$advisorId	= $_SESSION['advisor_id'];
	$table_name ="files";
	$whereCnd = " where advisor_id=".$advisorId." and type = 'audio'";
	
	
	$objAdv->retrieve_data_from_table($table_name, $whereCnd);
	$objFilePro = clone $objAdv;
	$objPro = clone $objAdv;
	while($tmpAray = $objAdv->getAllRow()){
		
		
		$objFilePro->retrieve_data_from_table("product_file", " where `file_id`=".$tmpAray['file_id']);
		while($tmpFP = $objFilePro->getAllRow()){
			$FP[] = $tmpFP['product_id'];
		}
	if(!empty($FP)){
		$FP_str = implode(",", $FP);
		$objPro->retrieve_data_from_table("product", " where `product_id` in (".$FP_str.")");
		
		while($tmpPro = $objPro->getAllRow()){
			$pro[] = $tmpPro['name'];
		}
		$tmpAray['products'] = $pro;
	}
	else{
		$tmpAray['products'][0] = "No products here";
	}
		unset($pro);
		unset($FP);
		$files[] = $tmpAray;
	}
	
	$smarty->assign("files",$files);

#View:
$smarty->display('../templates/advisor_account/manage_files_audio.tpl');
?>