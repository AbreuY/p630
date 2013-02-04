<?php
	require_once('../../pi_classes/commonSetting.php');
	require_once('../../pi_classes/Admin.php');
	require_once("../../pi_classes/ThumbLib.inc.php");
	ob_start();
	session_start();
	$objUpdateAdvertisement=new Admin();
	chkAdminLogin();
	if(isset($_SESSION['msg']['addv_added'])){
		unset($_SESSION['msg']['addv_added']);
	}
	
	if($_POST['btnSubmit']=='Update'){
		$file_name=time();
			if($_FILES['img_path']['name']!='')
			{
				$new_img_path_temp=$_FILES['img_path'];  // Taking the image info from $_FILES array
				$filename=explode(".",$new_img_path_temp['name']); // exploding the image name from and put into filename array
				
				$frontfile=time().".".$filename[1]; // creating the new image name from time and file extension
					$target_path=AbstractDB::SITE_ABS_PATH."upload/advertisement/".$frontfile;  // target path to move the file
					$dest=AbstractDB::SITE_ABS_PATH."upload/advertisement/thumbnail/".$frontfile; // Thumbnail file for display on frontend
					$upsus=move_uploaded_file($new_img_path_temp['tmp_name'],$target_path); // Moving the file to target path
					$thumb=PhpThumbFactory::create($target_path);  // creating the thumbnail of target file
					$thumb->adaptiveResize(255,220);// resizing the file .. width and height
					$thumb->save($dest); // Saving the file to admin/advertisement/thumbnail folder
			}
			else
			{
				$frontfile=$_POST['old_img'];
			}
			$objUpdateAdvertisement->UpdateAdvertisement($_POST,$frontfile);
			$_SESSION['msg']['addv_added']='Advertisement added successfully';
			header("location:add_list.php");			
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

<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.core.js"></script> 
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.datepicker.js"></script>	
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.all.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.theme.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.core.css" rel="stylesheet" /> 
<link rel="stylesheet" type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>css/ui.dropdownchecklist.themeroller.css" />
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>js/ui.dropdownchecklist-1.4-min.js"></script>

<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery("#page_name").dropdownchecklist({ emptyText: "--Select Page Name --"});
	jQuery('.ui-dropdownchecklist-text').css('float','none');
	jQuery('.ui-dropdownchecklist-selector').css('width','300px');
	jQuery('.ui-dropdownchecklist-text').css('width','310px');
	jQuery('#ddcl-page_name-ddw').css('width','310px');
	jQuery('.active').css('width','30px');
	jQuery('.ui-dropdownchecklist-selector').css('background','#cccccc');
	jQuery('.ui-dropdownchecklist-selector').css('margin-left','10px');
	
	jQuery("#frm_add_advertisement").validate({
		errorElement:'div',
		rules: {
			add_name: {
				required: true
			},
			add_url:{
				required: true,
				url:true
			},
			img_path:{
				accept:"jpg|jpeg|png|gif"
			}
		},
		messages: {
			add_name:{
				required:"Please enter the add name title"
			},
			add_url:{
				required:"Please enter the advertisement URL",
				url:"Please enter the valid url path"
			},
			img_path: {
				accept:"Please upload jpg|jpeg|png|gif format file"
			}
		}
	});
		
	jQuery('#btnCancel').click(function(){
		location.href="<?php echo AbstractDB::SITE_PATH;?>admin/advertisement/add_list.php";
	});
});
</script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<?php 
		$objAddDetail=clone $objUpdateAdvertisement;
		$objAddDetail->getAdvertiseDetailById(base64_decode($_REQUEST['add_id']));
		$objAddDetail->getAllRow();

	?>
<section id="main" class="column">
	<form name="frm_add_advertisement" id="frm_add_advertisement" method="post" enctype="multipart/form-data">
		<article class="module width_full">
			<header><h3>Add New Advertisement</h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/advertisement/add_list.php" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Advertisement Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="hidden" name="add_id" id="add_id" value="<?php echo base64_decode($_REQUEST['add_id']);?>" />
							<input type="hidden" name="old_img" id="old_img" value="<?php echo $objAddDetail->getField('image_path');?>" />
							<input type="text" name="add_name" id="add_name" style="width:92%;" value="<?php echo $objAddDetail->getField('advertise_name');?>" />
						</fieldset>
						
						<fieldset style="width:48%; float:left;">
							<label>Advertisement Url<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="add_url" id="add_url" style="width:92%;" value="<?php echo $objAddDetail->getField('nevigate_url');?>" />
						</fieldset><div class="clear"></div>	
						
						<fieldset style="width:48%; float:left;">
							<label>Upload Add Image<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<span style="margin-left:10px"><input type="file" name="img_path" id="img_path" style="width:92%;" /></span>
							<span style="margin-left:10px">Please upload image format file(.jpg, .jpeg, .png, .gif)</span>
						</fieldset><div class="clear"></div>	
						
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label style="float: left; width: 415px;">Uploaded image</label>
							<?php 
								if($objAddDetail->getField('image_path')!=''){
							?>
							 <span style="margin-left:10px">
							<img style="margin-left:10px" src="<?php echo AbstractDB::SITE_PATH.'phpThumbnail/phpThumb.php?src=../upload/advertisement/thumbnail/'.$objAddDetail->getField('image_path').'&w=100&h=100'; ?>" /></span>
																										
							<?php }else{ ?>
							No image uploaded.
							<?php } ?>
						</fieldset>
						
						<?php 
							$strPage=$objAddDetail->getField('location_to_display');
							$arrPage=explode(",",$strPage);
						?>
						
	<fieldset style="width:48%; float:left;">
		<label>Select Page To Display<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
			<select id="page_name" name="page_name[]" multiple="multiple">
				<option value="1" <?php if(in_array(1,$arrPage)) {?> selected="selected"<?php } ?>>Home Page</option>
				<option value="2" <?php if(in_array(2,$arrPage)) {?> selected="selected"<?php } ?>>All Activity</option>
				<option value="3" <?php if(in_array(3,$arrPage)) {?> selected="selected"<?php } ?>>Activity Detail</option>
				<option value="4" <?php if(in_array(4,$arrPage)) {?> selected="selected"<?php } ?>>Country Page</option>
				<option value="5" <?php if(in_array(5,$arrPage)) {?> selected="selected"<?php } ?>>City Page 1</option>	
				<option value="6" <?php if(in_array(6,$arrPage)) {?> selected="selected"<?php } ?>>City Page 2</option>
				<option value="7" <?php if(in_array(7,$arrPage)) {?> selected="selected"<?php } ?>>Gift Page</option>
				<option value="8" <?php if(in_array(8,$arrPage)) {?> selected="selected"<?php } ?>>Bucket List</option>
				<option value="9" <?php if(in_array(9,$arrPage)) {?> selected="selected"<?php } ?>>Shoping Cart</option>
				<option value="10" <?php if(in_array(10,$arrPage)) {?> selected="selected"<?php } ?>>Cheackout Page</option>
			</select>
	</fieldset>
						
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" name="btnSubmit" id="btnSubmit" value="Update" class="alt_btn">
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