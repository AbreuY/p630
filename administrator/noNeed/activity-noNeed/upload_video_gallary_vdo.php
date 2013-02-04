<?php
	require_once('../../pi_classes/commonSetting.php');
	require_once('../../pi_classes/Admin.php');
	require_once("../../pi_classes/ThumbLib.inc.php");
	ob_start();
	session_start();

    /*$currentFile = $_SERVER["PHP_SELF"];
    $parts = Explode('/', $currentFile);
    echo $parts[count($parts) - 1];die();*/
    
	
	chkAdminLogin();
	$objUploadvideogallary=new Admin();
	if(isset($_SESSION['msg']['added'])){
		unset($_SESSION['msg']['added']);
	}
	if($_POST['btnSubmit']=='Submit'){
		$objUploadvideogallary=$objUploadvideogallary->uploadVideoGallaryVdo($_POST);
		$_SESSION['msg']['added']='added';
		header("location:videogallary.php?act_id=".base64_encode($_POST['id'])."&user_id=".$_POST['user_id']);
	}	
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IN ADMIN PANEL | Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/layout.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/ie.css" type="text/css" media="screen" />
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/hideshow.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery("#frm_upload_photo_gallary").validate({
		errorElement:'div',
		rules: {
			video_name: {
				required: true
			},
			video_url:{
				required: true
			}
		},
		messages: {
			video_name:{
				required:"Please enter video title"
			},
			video_url: {
				required:"Please enter the video URL"				
			}
		}
	});
		
	jQuery('#btnCancel').click(function(){
		location.href="videogallary.php?act_id="+jQuery("#return_id").val()+"&user_id="+jQuery("#user_id").val();
	});
});
</script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">
		<form name="frm_upload_photo_gallary" id="frm_upload_photo_gallary" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" id="id" value="<?php echo base64_decode($_GET['act_id']);?>" />
		<input type="hidden" name="return_id" id="return_id" value="<?php echo $_GET['act_id'];?>" />
		<input type="hidden" name="user_id" id="user_id" value="<?php echo $_GET['user_id'];?>" />
		
		<article class="module width_full">
		<?php include("../supplier_menu.php");?>	
						<?php 
							$objGetActName=clone $objUploadvideogallary;
							$objGetActName->getActivityNameById($_GET['act_id']);
							$objGetActName->getAllRow();
					 	?>
				<header><h3>Add New Video for <font color="#0000FF"> <?php echo $objGetActName->getField('activity_booker_name');?></font></h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
					
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/videogallary.php?act_id=<?php echo $_REQUEST['act_id'];?>&user_id=<?php echo $_REQUEST['user_id'];?>" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Video Title<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="video_name" id="video_name" style="width:92%;" />
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Video Embed code<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<textarea name="video_url" id="video_url" rows="3" cols="18"></textarea>
						</fieldset><div class="clear"></div>	
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" class="alt_btn">
					<input type="reset" name="btnReset" id="btnReset" value="Reset">
					<input type="button" name="btnCancel" id="btnCancel" value="Cancel" class="btn_cancel">
				</div>
			</footer>
		</article><!-- end of post new article -->
		</form>
		<div class="spacer"></div>
	</section>
</body>
</html>