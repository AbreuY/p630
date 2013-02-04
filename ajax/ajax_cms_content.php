<?php	
#RequirFile:
require_once('../pi_classes/commonSetting.php');
include('../pi_classes/User.php');

#Objects:
$objUser = new User();

#clone:
$objContent = clone $objUser;


#dbQry
$table_name = "cms";
$whereCnd = " where page_name = '".$_POST['coloumn']."'";
$objContent->retrieve_data_from_table($table_name, $whereCnd);
$objContent->getRow();

#displaYResult
echo $objContent->getField('content');

?>