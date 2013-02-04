<?php
	require_once("../pi_classes/commonSetting.php");
	require_once('../pi_classes/Admin.php');
	require_once("../pi_classes/ThumbLib.inc.php");
	ob_start();
	session_start();
	
	if(empty($_SESSION['admin_id'])){
		header("location:login.php");
	}
	$objAddCntPerson=new Admin();
	$objUpdateCntPerson=clone $objAddCntPerson;
	if(isset($_SESSION['msg'])){
		unset($_SESSION['msg']);
	}
	if($_POST['btnSubmit']=='Submit'){		
	
		if($_FILES['image_path']['name'] != '')
		{
			$img_path=$_FILES['image_path']['name'];
			$new_img_path_temp=$_FILES['image_path'];
			$delete_path_image="../upload/activity/".$img_path;
			$delete_path_thambel="../upload/activity/thumbnail/".$img_path;
		
			unlink($delete_path_image);
			unlink($delete_path_thambel);
				
			 $filename=explode(".",$new_img_path_temp['name']);
			$frontfile=rand(1,100000).".".$filename[1];
			
			$target_path ="../upload/activity/".$frontfile;
			$upload_dir="../upload/activity/".$frontfile; 
			 $dest="../upload/activity/thumbnail/".$frontfile;
				
			$img_id=$frontfile;	
			
			$upsus=move_uploaded_file($new_img_path_temp['tmp_name'],$target_path);				  
				
			$thumb = PhpThumbFactory::create($target_path);
			
			$thumb->adaptiveResize(100, 100); //width, height
			$thumb->resize(100, 100); //width, height
			$thumb->save($dest);		
			//echo "run";die;	
						
		}else{
			$img_id=$_POST['old_image_path'];
		}
			$objAddCntPerson->addCntPersonDetails($_POST,$img_id);
			$_SESSION['msg']['added']='added';
			header("location:manage_contact_person.php");
	}
	if($_POST['btnSubmit']=='Update'){		
		if($_FILES['image_path']['name'] != '')
		{
			$img_path=$_FILES['image_path']['name'];
			$new_img_path_temp=$_FILES['image_path'];
			$delete_path_image="/../upload/activity/".$img_path;
			$delete_path_thambel="/../upload/activity/thumbnail/".$img_path;
		
			unlink($delete_path_image);
			unlink($delete_path_thambel);
				
			 $filename=explode(".",$new_img_path_temp['name']);
			$frontfile=rand(1,100000).".".$filename[1];
			
			$target_path ="../upload/activity/".$frontfile;
			$upload_dir="../upload/activity/".$frontfile; 
			 $dest="../upload/activity/thumbnail/".$frontfile;
				
			$img_id=$frontfile;	
			
			$upsus=move_uploaded_file($new_img_path_temp['tmp_name'],$target_path);				  
				
			$thumb = PhpThumbFactory::create($target_path);
			
			$thumb->adaptiveResize(100, 100); //width, height
			$thumb->resize(100, 100); //width, height
			$thumb->save($dest);		
			//echo "run";die;	
						
		}else{
			
			$img_id=$_POST['old_image_path'];
			echo $img_id;die();
		}
			$objUpdateCntPerson->updateCntPersonDetails($_POST,$img_id);
			$_SESSION['msg']['updated']='updated';
			header("location:manage_contact_person.php");
	}
	
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IN ADMIN PANEL | Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/layout.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/ie.css" type="text/css" media="screen" />
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/hideshow.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/password_strength_plugin.js"  language="javascript" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery("#frm_cnt_person").validate({
		errorElement:'div',
		rules: {
			name: {
				required: true
			},
			position:{
				required: true
			},
			special_area:{
				required: true
			},
			description:{
				required: true
			},
			image_path:{
				accept: "jpg|jpeg|png|gif"
			}
		},
		messages: {
			name:{
				required:"Please enter name"
			},
			position: {
				required:"Please enter position"
			},
			special_area: {
				required:"Please enter special_area."
			},
			description: {
				required:"Please enter description."
			},
			image_path: {
				accept:"Please Upload jpg|jpeg|gif|png image format file."
			}
		}
	});
			
	jQuery('#btnCancel').click(function(){
		location.href="manage_contact_person.php";
	});
});
</script>
</head>
<body>
	<?php include("header.php");?>	
	<?php include("menu.php");?>	
	<section id="main" class="column">		
		<form name="frm_cnt_person" id="frm_cnt_person" method="post" enctype="multipart/form-data">
		<input type="hidden" name="cnt_person_id" id="cnt_person_id" value="<?php echo base64_decode($_REQUEST['cnt_person_id']); ?>" />
		<article class="module width_full">
			<header><h3><?php 
							if(isset($_GET['cnt_person_id'])) 
								echo "Edit";
							else
								echo "Add New";	
			 ?> Person Details</h3></header>
				<header>
				
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/manage_contact_person.php" title="Go back"><img src="images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				
				<div class="module_content">
				<?php 		
							$objCntPerson=new Admin();	
							$objCntPerson->getCntPersonDtlById(base64_decode($_GET['cnt_person_id']));
							$objCntPerson->getAllRow(); 
						?>
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="name" id="name" style="width:92%;" value="<?php echo $objCntPerson->getField('name');?>"/>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Position<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="position" id="position" style="width:92%;"  value="<?php echo $objCntPerson->getField('position');?>" />
						</fieldset><div class="clear"></div>
						
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Special Area<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="special_area" id="special_area" style="width:92%;" value="<?php echo $objCntPerson->getField('special_area');?>"/>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Description<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							
							<textarea name="description" id="description" style="width:92%;"><?php echo $objCntPerson->getField('description');?></textarea>
						</fieldset><div class="clear"></div>	
							
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Upload Image<sup id="new_pass_div" style="color:#FF0000;font-weight:bold;">*</sup></label>
							<!-- <input type="text" name="image_path" id="image_path"  style="width:92%;" /> -->
							<input type="hidden" name="img_id" id="img_id" value="<?php echo $img_id ?>"  />
							<input type="hidden" name="old_image_path" id="old_image_path" value="<?php echo $objCntPerson->getField('image_path');?>" />
							<input type="file" name="image_path" id="image_path"  style="vertical-align: top; margin-top: 46px;"/>
							<img src="<?php echo AbstractDB::SITE_PATH;?>/upload/activity/thumbnail/<?php echo $objCntPerson->getField('image_path');?>" />
		
						</fieldset>
						
						<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" name="btnSubmit" id="btnSubmit" value="<?php if(isset($_GET['cnt_person_id'])) { ?>Update<?php }else{ ?>Submit<?php } ?>" class="alt_btn">
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