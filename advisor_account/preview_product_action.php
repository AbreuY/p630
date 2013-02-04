<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');
extract($_POST);

//Object
$objProduct = new User();
$tableName = "product";
$setField = "`price`='".$price."',`status`='active'";
$where = " where `product_id`='".$pid."'";
$objProduct->update_record_in_table($tableName,$setField,$where);

$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> A new product has been added.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
header("Location: ".site_path."view-products");
?>