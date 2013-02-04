<?php
	require_once('../../pi_classes/Admin.php');
	ob_start();
	session_start();
	if(empty($_SESSION['admin_id'])){
		header("location:login.php");
	}
	
	if(isset($_SESSION['msg'])){
		unset($_SESSION['msg']);
	}
	$objUpdateRating=new Admin();
	if(isset($_POST["btnSubmit"])=="Update")
	{	
			$objUpdateRating->updateRating($_POST);
			$_SESSION['msg']["rating_update"]="Rating updated successfully.";
			header("location:".AbstractDB::SITE_PATH."admin/feedback/user_feedback_list.php?user_id=".$_REQUEST['user_id']);
	}
	
	
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IN ADMIN PANEL | Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/layout.css" type="text/css" media="screen" />
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery("#frm_user_feedback_detail").validate({
		errorElement:'div',
		rules: {
			"rating[]" : {
				required: true
						}
		},
		messages: {
			"rating[]":{
				required: "Please select proper rating."
			}
		}
	});
	jQuery('#btnCancel').click(function(){
		location.href="user_feedback_list.php?user_id="+jQuery('#user_id').val();
	});
});
</script>
<script type="text/javascript">
function change_feedback_active_status(rating_id,status,user_id){
	Display_Load();
	jQuery.ajax({
		url: "<?php echo AbstractDB::SITE_PATH;?>admin/ajax/ajax_request.php",
		type:"post",
		data:"action=change_rating_status&rating_id="+rating_id+"&status="+status,
		success:function(msg)
		{
			Hide_Load();
			window.location.href='<?php echo AbstractDB::SITE_PATH;?>admin/feedback/user_feedback_detail.php?rating_id=<?php echo $_GET['rating_id'];?>&user_id='+user_id;
		}
	});
	

}

//Display Loading Image
function Display_Load()
{
	$("#loading").fadeIn(900,0);
	$("#loading").html("<img src='../images/bigLoader.gif' />");
}
//Hide Loading Image
function Hide_Load()
{
	$("#loading").fadeOut('slow');
};

</script>

</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">		
		<form name="frm_user_feedback_detail" id="frm_user_feedback_detail" method="post">
		<article class="module width_full">
		<?php include("../supplier_menu.php");?>
		<?php
			/* Getting the rating information */
			$objFeedbackDtl=clone $objUpdateRating;
			$objFeedbackDtl->getFeedbackDtlByRatingId(base64_decode($_REQUEST['rating_id']));
			$objFeedbackDtl->getAllRow();
		 ?>
		
			<header><h3>Edit User Feedback Detail</h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/feedback/user_feedback_list.php?user_id=<?php echo $_REQUEST['user_id'];?>" title="Go back"><img src="<?php echo AbstractDB::SITE_PATH;?>admin/images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
						<fieldset style="width:99%;">
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
									<input type="hidden" name="rating_id" id="rating_id" value="<?php echo base64_decode($_REQUEST['rating_id']);?>" />
									<input type="hidden" name="user_id" id="user_id" value="<?php echo $_REQUEST['user_id'];?>" />
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label for="time_schedule_id">Reference id</label>		
								<span style="padding-left:20px"><?php echo $objFeedbackDtl->getField('refence_id');?></span>
						</fieldset>				
						<fieldset style="width:48%; float:left;">
							 <label for="sub_activity_name">Activity Name</label>
							 		<span style="padding-left:20px"><?php echo $objFeedbackDtl->getField('activity_booker_name');?></span>	
						</fieldset><div class="clear"></div>
						
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label for="sub_activity_descr">User Name</label>
								<span style="padding-left:20px"><?php echo $objFeedbackDtl->getField('first_name');?> <?php echo $objFeedbackDtl->getField('last_name');?></span>
						</fieldset>
						
						<fieldset style="width:48%; float:left;">
							<label for="sub_activity_descr">User Email</label>
								<span style="padding-left:20px">
									<a href="mailto:<?php echo $objFeedbackDtl->getField('email');?>"><?php echo $objFeedbackDtl->getField('email');?></a>
								</span>
						</fieldset><div class="clear"></div>
						
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label for="sub_activity_descr" >Average Rating</label>
								<span style="padding-left:20px"><?php echo number_format($objFeedbackDtl->getField('average_rating'),2);?>%</span>					
						</fieldset>
						
						<fieldset style="width:48%; float:left;">
							<label for="sub_activity_descr">Feedback Status</label>
								<span style="padding-left:20px">
								<a href="javascript:void(0);" onclick="change_feedback_active_status('<?php echo base64_decode($_REQUEST['rating_id']);?>','<?php echo $objFeedbackDtl->getField('status');?>','<?php echo $_REQUEST['user_id'];?>');"><?php if($objFeedbackDtl->getField('status')=='0'){ echo "Inactive";}else{ echo "Active";}?></a>
</span>
						</fieldset><div class="clear"></div>
						
						<fieldset style="width:48%; float:left;">
							<label for="sub_activity_descr">Added Date</label>
								<span style="padding-left:20px"><?php echo $objFeedbackDtl->getField('added_date');?></span>							
						</fieldset><div class="clear"></div>
						
						<fieldset style="width:48%; float:left;">
							<label for="sub_activity_descr">Rating Category</label>
						</fieldset><div class="clear"></div>
						
						<?php
						$objRatingInfo=clone $objFeedbackDtl;
						$objRatingInfo->getFeedbackRatingInfo(base64_decode($_REQUEST['rating_id']));
						while($objRatingInfo->getRow())
						{
						?>
						<fieldset style="width:97%; float:left; margin-left:20px">
						<input type="hidden" name="count_of_rating" value="<?php echo $objRatingInfo->numofrows(); ?>" />
							<label for="sub_activity_descr"><?php echo $objRatingInfo->getField('fb_cat_name') ?></label>
								<span style="padding-left:20px"><?php echo $objRatingInfo->getField('fb_cat_defination') ?></span> <br />
								<span style="padding-left:20px">
							<select name="rating[<?php echo $objRatingInfo->getField('rating_detail_id');?>]" id="rating" style="width:150px;">
								<option value="">----Select Rating -----</option>
								<?php 
								for($i=0; $i<=100; $i++)
								{
								?>
								<option value="<?php echo $i;?>" <?php if($i==$objRatingInfo->getField('rating_value')){?> selected="selected"<?php }?>><?php echo $i;?></option>
								<?php
								}
								?>
							</select>	
								
								</span>							
						</fieldset><div class="clear"></div>
						<?php	
						}
						?>
						
						<fieldset style="width:99%; float:left;">
							<label for="sub_activity_descr">Comment</label>
								<span style="padding-left:20px"><textarea name="comment" id="comment"><?php echo $objFeedbackDtl->getField('comment');?></textarea></span>							
						</fieldset><div class="clear"></div>
						
					</div>
			<footer>
				<div class="submit_link">
					<input type="submit" name="btnSubmit" id="btnSubmit" value="Update" class="alt_btn">
					<input type="reset" name="btnReset" id="btnReset" value="Reset">
					<input type="button" name="btnCancel" id="btnCancel" value="Cancel" class="btn_cancel" onclick="fn_cancel_click();">
				</div>
			</footer>
		</article><!-- end of post new article -->
		</form>
		<div class="spacer"></div>
	</section>
</body>
</html>