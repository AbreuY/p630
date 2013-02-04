<?php
#RequirFile:
require_once('../../../pi_classes/commonSetting.php');
require_once('../../../pi_classes/User.php');

	$objAdv = new User();
	$table = "advisor_details";
	$where = " where advisor_id =".$_SESSION['advisor_id'];
	$objAdv->retrieve_data_from_table($table,$where);
	$data = $objAdv->getAllRow();
	
	//$site="192.168.2.40/p630/";
	$site=site_path;
	if($_GET['shw'] == "yes"){
		$price_code = "<div style='width:167px;height:32px;float:left;margin:2px 0;background:url(".$site."front_media/images/promt4.png) no-repeat;
	position:relative;'><div style='font-size:12px;color:#fff;float:left;position:absolute;left:30px;top:6px;'>$".intval($data['priceWebConsulte'])." / hr</div> <div style='font-size:12px;color:#fff;float:left;position:absolute;left:110px;top:6px;'>$".intval($data['priceEmailConsulte'])." </div> </div>";
		$ht = "280";
	}
	else{
		$price_code = "";
		$ht = "245";
	}
	
	
	$code="<div style='width: 170px;height:".$ht."px;border:1px solid #ccc;padding:10px;margin-bottom:8px;'>
			<div style='width:167px;height:48px;float:left;margin:2px 0;'><img src='".$site."front_media/images/promt01.png' ></div>
			<div style='width:167px;height:48px;float:left;margin:2px 0;'><a href='".$site."view-advisor-profile/".$_SESSION['advisor_id']."'><img src='".$site."front_media/images/promt1.png' title='View my guru bul profile' ></a></div>
			<div style='width:167px;height:48px;float:left;margin:2px 0;'><a href='".$site."schedule-web-cam/".$_SESSION['advisor_id']."'><img src='".$site."front_media/images/promt2.png' title='Book a phone consultation' ></a></div>
			<div style='width:167px;height:48px;float:left;margin:2px 0;'><a href='".$site."book-an-email/".$_SESSION['advisor_id']."'><img src='".$site."front_media/images/promt3.png' title='Schedule an email consultation' ></a></div>".$price_code."
			<div style='width:100%;float:left;text-align:center;'><a href='".$site."'>Powered by guru bul</a></div>
         </div>" //<div class='powrd_txt'><a href='#'>Get your opwn guru bul widget</a></div>
?>
<html>
<title>Get Your Widget</title>
<head>
<link rel="stylesheet" href="<?=site_path?>front_media/css/style.css" type="text/css" />
<script src="<?=site_path?>front_media/js/jquery.js"></script>
<script type="text/javascript" src="<?=site_path?>front_media/js/JAlert/jquery.alerts.js"></script>
<link href="<?=site_path?>front_media/js/JAlert/jquery.alerts.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.fancybox_close {
	background: url(../../../front_media/images/close_pop.png) left top no-repeat;
	cursor: pointer;
	height: 30px;
	position: absolute;
	right: -18px;
	top: -10px;
	width: 30px;
	z-index: 1103;
}
.fancybox-outer {
	width: auto;
	height: auto;
	padding: 15px;
	float:left;
	background: #fff;
	margin:9px;
	border: 1px solid #807d75;
	border-radius: 5px;
	behavior: url(PIE.htc);
	position: relative;
}

</style>

</head>
<body style="background:none;">
<div class="fancybox-outer"><a href="#" class="fancybox_close" onClick="self.parent.tb_remove();self.close();"></a>
  <div class="pop_inbox">
         <div class="username_outer_pop_scnd">
        <div class="username_pop_otr">
          <div class="username_text_outer">
            <div class="username_text"><strong>Copy &amp; Paste the below code.</strong></div>
          </div>
          <div class="username_text_outer">
            <div class="username_text"><textarea readonly style="width:570px; height:315px; border:solid; border-width:2px;"><?=$code?></textarea></div>
          </div>
       </div>
       
               
       
      </div>
  </div>
</div>
</body>
</html>
