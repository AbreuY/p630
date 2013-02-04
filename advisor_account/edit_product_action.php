<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

/*echo"Coming up <br>";
echo"<pre>";
print_r($_POST);
die;*/


$advisorId	= $_SESSION['advisor_id'];
$pid = $_GET['pid'];
extract($_POST);


if(!isset($category_2)){
	$category_2 = $category;
}

//Object-Store in dbTable product
	$objProduct = new User();
	$objAdv = clone $objProduct;
	
		$table_name		=	"product";
		$set_field			=	"`name` = '".$name."',
								 `type` = '".$type."',
								 `description` = '".$description."',
								 `price` = '".$price."'";
								 
								 // `combination` = '".$combination."',
		$whereCnd			=	" where `product_id`=".$pid." and `advisor_id`=".$advisorId;
		$objProduct->update_record_in_table($table_name, $set_field, $whereCnd);
		
//Managing Category
$category = array_merge($category,$category_2);
$objCat = clone $objProduct;
$table_name="product_category";
$where = "`product_id` = ".$pid;
$objProduct->DELETE_ANYRECORD_FROM_TABLE($table_name, $where);
$fields = "`product_id`, `cat_id`";
foreach($category as $cat){
	$values = "'".$pid."', '".$cat."'";
	$objCat->insert_row_in_table($table_name, $fields, $values);
}
		
		

//Managing File_product
	$objProFile = clone $objProduct;
	$objProFile->deleteProductFile($pid);
	$tableName = "product_file";
	$fields = "`product_id`, `file_id`, `advisor_id`";
	foreach($check_file as $val1){
		$values = "'".$pid."', '".$val1."','".$advisorId."'";
		$objProFile->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);
	}



$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Product information changes has been updated successfully.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';

header("Location: ../edit-product/".$pid);
?>