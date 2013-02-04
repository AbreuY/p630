<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');

#variables:
$_GET['priceWebConsulte'];
$globalSettingArr['FIRST_CONSULTATIONS_COST'];

#admin first consult pirce for webCam.
$adminPrice = ($_GET['priceWebConsulte']*$globalSettingArr['FIRST_CONSULTATIONS_COST']) / 100;
echo $advFirstPrice	= number_format($_GET['priceWebConsulte']-$adminPrice,2);
echo "|8!8|";
#admin repeate consult pirce for webCam.
$adminPriceRep   = ($_GET['priceWebConsulte']*$globalSettingArr['REPEAT_CONSULTATIONS_COST']) / 100;
echo $advRepatPrice	= number_format($_GET['priceWebConsulte']-$adminPriceRep,2);
?>