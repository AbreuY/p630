<?php
	require_once('../../../pi_classes/commonSetting.php');
    $loc = $_GET['location'];
?>

<html>
<title>Image</title>
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
            <div class="username_text">
            	<img src="<?php echo site_path; ?>/front_media/product_files/<?php echo $loc; ?>" style = "height: 400px; width: 600px;">
            	</div>
          </div>
       </div>
       
               
       
      </div>
  </div>
</div>
</body>
</html>