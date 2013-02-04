<?php 
require_once("../pi_classes/commonSetting.php");
require_once("../pi_classes/Admin.php");

#Object:
$objAdmin = new Admin();

#Variables:
$q 	   		 = strtolower($_GET["q"]);
$advisorId   = $_GET["advisorId"];

#Action:
if (!$q) return;

		$setColoumFields = "lang_name as resulte ";
		$tableName 		 = "language";
		$whereField 	 = "lang_name LIKE '%".$q."%' ";

	$objAdmin->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
	while($rs = $objAdmin->getAllRow()){
			$Ans = $rs['resulte'];
			echo "$Ans\n";
	}
?>
