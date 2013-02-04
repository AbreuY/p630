<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

checkAdvisorSession($_SESSION['advisor_id']);
$advisorId	= $_SESSION['advisor_id'];
$pid = $_GET['pid'];
#Objects
	$objUser = new User();



#GetData~~~Products
	$objPro = clone $objUser;
	$table_name='product';
	$whereCnd=" where `product_id` = '".$pid."' and `advisor_id`=".$advisorId;
	$objPro->retrieve_data_from_table($table_name, $whereCnd);
	if(!$objPro->numofrows()){
		$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> No such product here.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
		header("Location: ".site_path."view-products");exit;
	}
	$ProArr =  $objPro->getRow();
if($ProArr['status'] == "active"){

	
	
	//Get Product Category
	$table_name ="product_category";
	$whereCnd = " where product_id = ".$ProArr['product_id'];
	$objCatPro = clone $objUser;
	$objCatPro->retrieve_data_from_table($table_name, $whereCnd);
	while($temp = $objCatPro->getAllRow()){
		$ProCatArr[] = $temp['cat_id'];
		
	}
	
			#GetCategory:
	$table_name ="category";
	$whereCnd = " where cat_level= 1";
	$objCat = clone $objUser;
	$objCat->retrieve_data_from_table($table_name, $whereCnd);
	while($tmpAray = $objCat->getAllRow()){
		$category[] = $tmpAray;
		if(in_array($tmpAray['cat_id'], $ProCatArr)){
			$check2[] = $tmpAray['cat_id'];
		}
	}
	$chkstr = implode("," , $check2);
	
	
	$chk_2= false;
	$whereCnd = " where `parent_id` in (".$chkstr.")";
	$objCat2 = clone $objUser;
	$objCat2->retrieve_data_from_table($table_name, $whereCnd);
	while($tmpAray = $objCat2->getAllRow()){
		$category2[] = $tmpAray;
		$chk_2= true;
	}
	
	
	$smarty->assign("category",$category);
	$smarty->assign("category2",$category2);
	$smarty->assign("chk_2",$chk_2);
	$smarty->assign("ProArr",$ProArr);
	$smarty->assign("ProCatArr",$ProCatArr);
	
	#GetFiles:
	$table_name ="product_file";
	$whereCnd = " where product_id = '".$pid."' and `advisor_id` = '".$advisorId."'";
	$objFile = clone $objUser;
	$objFile->retrieve_data_from_table($table_name, $whereCnd);
	//$objFileName = clone $objUser;
	while($tmpAray = $objFile->getAllRow()){
		//$objFileName->retrieve_data_from_table("files", " where `file_id` =".$tmpAray['file_id']);
		//$tmpFileName = $objFileName->getRow();
		//$tmpAray['name'] = $tmpFileName['name'];
		$filesIn[] = $tmpAray['file_id'];
	}
	
	
	
	#GetFiles:
	$table_name ="files";
	$whereCnd = " where advisor_id=".$advisorId;
	
	$objAdv = clone $objUser;
	$objAdv->retrieve_data_from_table($table_name, $whereCnd);
	while($tmpAray = $objAdv->getAllRow()){
		$tmpAray['check'] = false;
		if(in_array($tmpAray['file_id'], $filesIn)){
			$tmpAray['check'] = true;
		}
		$files[$objAdv->getField('type')][] = $tmpAray;
	}
	$smarty->assign("files",$files);
	//echo"<pre>";print_r($files);die;
	
	
	#View:
	$smarty->display('../templates/advisor_account/edit_product.tpl');
}else{
	header("Location: ".site_path."preview-product/".$pid);
}
?>