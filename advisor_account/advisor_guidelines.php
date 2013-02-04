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
$whereCnd = " where page_name = 'advisor-guidelines'";
$objContent->retrieve_data_from_table($table_name, $whereCnd);
$objContent->getRow();

#varAssign
$smarty->assign('content', $objContent->getField('content'));





#View:
$smarty->display('../templates/advisor_account/advisor_guidelines.tpl');
?>