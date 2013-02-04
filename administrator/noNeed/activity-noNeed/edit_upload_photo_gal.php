<?php
	require_once('../../pi_classes/commonSetting.php');
	require_once('../../pi_classes/Admin.php');
	require_once("../../pi_classes/ThumbLib.inc.php");
	ob_start();
	session_start();
	chkAdminLogin();
	
	$objUploadPhotoGallary=new Admin();
	$objUploadPhotoGallaryImg=clone $objUploadPhotoGallary;
	
	$objUploadPhotoGallaryImg->getImageDetailById(base64_decode($_REQUEST['img_id']));
	$objUploadPhotoGallaryImg->getAllRow();
	
	if(isset($_SESSION['msg']['updated'])){
		unset($_SESSION['msg']['updated']);
	}
	
	if($_POST['btnUpdate']=='Update'){
		$file_name=time();
		if($_FILES['img_path']['name']!=''){
		$imgData=array();
		$imgData=getimagesize($_FILES['img_path']['tmp_name']);
		$img_width=$imgData[0];
		$img_height=$imgData[1];
		$new_img_path_temp=$_FILES['img_path'];	
		$filename=explode(".",$new_img_path_temp['name']);
		$frontfile=time().".".$filename[1];				
		$file_name=$frontfile;
		$target_path ="../../upload/activity/".$frontfile;		
		$upload_dir="../../upload/activity/".$frontfile; 
		$dest="../../upload/activity/thumbnail/".$frontfile;
				
		$upsus=move_uploaded_file($new_img_path_temp['tmp_name'],$target_path);				  
		$thumb = PhpThumbFactory::create($target_path);
		$thumb->adaptiveResize(214, 117); //width, height
		//$thumb->resize(214, 117); //width, height
		$thumb->save($dest);	
		
			/*$ext=end(explode(".",$_FILES['img_path']['name']));
			$file_name=$file_name.".".$ext;
			move_uploaded_file($_FILES['img_path']['tmp_name'],"../dump_body_image_file/".$file_name);*/
		}else{
			$file_name=$_POST['old_img'];
		}
		$objUploadPhotoGallary=$objUploadPhotoGallary->editUploadPhotoGallary($_POST,$file_name);
		$_SESSION['msg']['updated']='updated';
		header("location:photogallary.php?act_id=".base64_encode($_POST['id'])."&user_id=".$_POST['user_id']);
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
	jQuery("#edit_upload_photo_gallary").validate({
		errorElement:'div',
		rules: {
			image_title: {
				required: true
			},
			img_path:{
				accept:"jpg|jpeg|png|gif"
			}
		},
		messages: {
			image_title:{
				required:"Please image enter title"
			},
			img_path: {
				accept:"Please upload jpg|jpeg|png|gif format file"
			}
		}
	});
	jQuery('#btnCancel').click(function(){
		location.href="photogallary.php?act_id="+jQuery('#return_id').val()+"&user_id="+jQuery('#user_id').val();
	});
});
</script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">		
		<form name="edit_upload_photo_gallary" id="edit_upload_photo_gallary" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" id="id" value="<?php echo base64_decode($_GET['act_id']);?>" />
		<input type="hidden" name="return_id" id="return_id" value="<?php echo $_GET['act_id'];?>" />
		<input type="hidden" name="img_id" id="img_id" value="<?php echo base64_decode($_GET['img_id']);?>" />
		<input type="hidden" name="user_id" id="user_id" value="<?php echo $_GET['user_id'];?>" />
		<article class="module width_full">
		<?php include("../supplier_menu.php");?>
				<header><h3>Edit Image For
				<font color="#0000FF"><?php 
					$objActivityName=new Admin();
					$objActivityName->getActivityNameById($_REQUEST['act_id']);				
					$objActivityName->getRow();
					echo $objActivityName->getField('activity_booker_name'); ?>
				</font>
			</h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/photogallary.php?act_id=<?php echo $_GET['act_id'];?>&user_id=<?php echo $_GET['user_id'];?>" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Image Title<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="image_title" id="image_title" value="<?php echo $objUploadPhotoGallaryImg->getField('photo_name');?>" style="width:92%;" />
						</fieldset>						
						<fieldset style="width:48%; float:left;">
							<label>Upload image file</label>
							<input type="file" name="img_path" id="img_path" style="width:92%;" />
							<input type="hidden" name="old_img" id="old_img" value="<?php echo $objUploadPhotoGallaryImg->getField('image_path');?>" />
							<span>Please upload image format file(.jpg, .jpeg, .png, .gif)</span>
						</fieldset><div class="clear"></div>						
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label style="float: left; width: 415px;">Cover Page</label>
							<input type="checkbox" name="cover_page" id="cover_page" <?php if($objUploadPhotoGallaryImg->getField('default')){ echo "checked=checked";}?> style="float: left; width: 25px;" /> 
							<span>Please check this to make this as cover page</span>
						</fieldset>						
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label style="float: left; width: 415px;">Uploaded image</label>
							<?php 
								if($objUploadPhotoGallaryImg->getField('image_path')!=''){
							?>
							 
							<img src="<?php echo AbstractDB::SITE_PATH.'phpThumbnail/phpThumb.php?src=../upload/activity/thumbnail/'.$objUploadPhotoGallaryImg->getField('image_path').'&w=100&h=100'; ?>" />
																										
							<?php }else{ ?>
							No image uploaded.
							<?php } ?>
						</fieldset>						
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" name="btnUpdate" id="btnUpdate" value="Update" class="alt_btn">
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