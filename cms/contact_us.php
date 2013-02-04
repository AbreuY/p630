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
$whereCnd = " where page_name = 'contact-us'";
$objContent->retrieve_data_from_table($table_name, $whereCnd);
$objContent->getRow();

#varAssign
$smarty->assign('content', $objContent->getField('content'));





#View:
$smarty->display('../templates/cms/contact_us.tpl');
?>