<?php
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/PriceCalendar.php");
$objDailyPriceUpd=new PriceCalendar();
echo "<pre>";
print_r($_POST);
echo "</pre>";
$objDailyPriceUpd->updateDailyPriceByDate($_POST);
$_SESSION['msg']['availability_price_update']='Record updated successfully!';
header("location:availabilty_list.php?user_id=".$_POST['user_id']);
?>