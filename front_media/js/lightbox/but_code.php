<?php
#RequirFile:
require_once('../../../pi_classes/commonSetting.php');
require_once('../../../pi_classes/User.php');

	//$site="192.168.2.40/p630/";
	$site=site_path;
	$shw = $_GET['shw'];

	$code="<div class='guru_btn_otr'>
              <a  href='".$site."view-advisor-profile/".$_SESSION['advisor_id']."'><img src='".$site."front_media/images/guru_btn".$shw.".png' ></a>
          </div>";
?>
<html>
<title>Get your button</title>
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
            <div class="username_text"><textarea readonly style="width:570px; height:130px; border:solid; border-width:2px;"><?=$code?></textarea></div>
          </div>
       </div>
       
               
       
      </div>
  </div>
</div>
</body>
</html>
