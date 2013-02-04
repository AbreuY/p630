<?php
	require_once('../../pi_classes/Admin.php');
	ob_start();
	session_start();
	if(empty($_SESSION['admin_id'])){
		header("location:login.php");
	}
	$objFeedback=new Admin();
	$objAddFeedback=clone $objFeedback;
	$objUpdateFeedback=clone $objFeedback;
	if(isset($_SESSION['msg'])){
		unset($_SESSION['msg']);
	}
	if(isset($_GET['fb_cat_id']))
	{
		$fb_cat_id=base64_decode($_GET['fb_cat_id']);
		$whereCnd="fb_cat_id=".$fb_cat_id;
		$arrFeedbackDtl=array();
		$res =$objFeedback->getFbCategorySpecificRecord("*",$whereCnd);
		while($row = $objFeedback->getAllRow())
		{
			$arrFeedbackDtl[]=$row;
		}
	}
	if($_POST['btnSubmit']=='Update'){
		$objUpdateFeedback->updateFeedbackCategory($_POST);
		$_SESSION['msg']['updated']='updated';
		header("location:".AbstractDB::SITE_PATH."admin/feedback/feedback_category_list.php");	
	}
	elseif($_POST['btnSubmit']=='Submit')
	{
		$objAddFeedback->addFeedbackCatDtl($_POST);
		$_SESSION['msg']['added']='added';
		header("location:".AbstractDB::SITE_PATH."admin/feedback/feedback_category_list.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery("#frm_feedback_category").validate({
		errorElement:'div',
		rules:{
				fb_cat_name:{
							 required:true
							/* remote:{
								url: "../ajax/ajax_request.php",
								type: "post",
								data: {
									 action:"chk_fb_cat_name",old_fb_cat_name:jQuery('#old_fb_cat_name').val(),action_type:jQuery('#action_type').val()
									  }
						  			}	*/
				},
				fb_cat_defination:{
							 required:true
				}
		},
		messages:{
				fb_cat_name:{
							required:"Please enter the feedback category name.",
							remote:"This feedback category is alredy added."
				},
				fb_cat_defination:{	
							required:"Please enter the feedback category defination."
				}
		}
	});
	
	jQuery('#btnCancel').click(function(){
		location.href="feedback_category_list.php";
	});
});
</script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">		
		<form name="frm_feedback_category" id="frm_feedback_category" method="post">
			<input type="hidden" name="old_fb_cat_name" id="old_fb_cat_name" value="<?php echo $arrFeedbackDtl[0]['fb_cat_name'];?>" />
			<input type="hidden" name="action_type" id="action_type" value="<?php if(isset($_GET['fb_cat_id'])){echo "edit";} else {echo "add";}?>" />
			<input type="hidden" name="edit_id" id="edit_id" value="<?php echo base64_decode($_GET['fb_cat_id']);?>" />
		<article class="module width_full">
			<header><h3><?php if(isset($_REQUEST['fb_cat_id'])){ echo "Edit"; } else { echo "Add New"; }?> Feedback Category</h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/feedback/feedback_category_list.php" title="Go back"><img src="<?php echo AbstractDB::SITE_PATH;?>admin/images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
					<fieldset>
						<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
					</fieldset>
					<fieldset style="width:48%; float:left; margin-right: 3%;">
						<label>Category Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="fb_cat_name" id="fb_cat_name" value="<?php echo $arrFeedbackDtl[0]['fb_cat_name'];?>" />
					</fieldset><div class="clear"></div>
					<div class="clear"></div>
						<fieldset style="width:48%; float:left;">
							<label>Category Defination<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
						 <textarea type="text" name="fb_cat_defination" id="fb_cat_defination" style="width:425px"><?php echo $arrFeedbackDtl[0]['fb_cat_defination'];?></textarea>
						</fieldset><div class="clear"></div>	
				</div>
				<footer>
					<div class="submit_link">
						<input type="submit" name="btnSubmit" id="btnSubmit" value="<?php if(isset($_GET['fb_cat_id'])){echo "Update";} else {echo "Submit";}?>" class="alt_btn">
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