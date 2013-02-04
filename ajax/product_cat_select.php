<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

//die($_REQUEST['id']);
#Objects
	$objUser = new User();
#GetCategory:
	$table_name ="category";
	$whereCnd = " where `parent_id` in (".$_REQUEST['id'].")";
	$objCat = clone $objUser;
	$objCat->retrieve_data_from_table($table_name, $whereCnd);
	if($objCat->numofrows()){
	echo	'<label for="login"> &nbsp;</label>';
    echo	'<select id = "category_2" name="category_2[]" multiple="multiple">';
    //echo 	'<option value="">--Select a sub-category--</option>';
    while($tmpAray = $objCat->getAllRow()){
		echo '<option value="'.$tmpAray['cat_id'].'">'.$tmpAray['cat_name'].'</option>';        
	}  
			  echo '</select>';
	}
?>