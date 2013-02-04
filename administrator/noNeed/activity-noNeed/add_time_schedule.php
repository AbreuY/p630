<?php
	require_once('../../pi_classes/Admin.php');
	ob_start();
	session_start();
	if(empty($_SESSION['admin_id'])){
		header("location:login.php");
	}
	$objAddTimeSchedule=new Admin();
	if(isset($_SESSION['msg'])){
		unset($_SESSION['msg']);
	}
	if($_POST['btnSubmit']=='Submit'){
		//print_r($_POST);die();
	$objAddTimeSchedule->addActTimeShcedule($_POST);
		$_SESSION['msg']['added']='added';
		header("location:time_schedule.php?user_id=".$_POST['user_id']."&act_id=".$_POST['act_id']);
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
	jQuery("#frm_activity_time_schedule").validate({
		errorElement:'div',
		rules: {
			
			time_hour:{
				required: true
			},
			time_minute:{
				required: true
			},
			schedule_at:{
				required: true
			}
		},
		messages: {
			time_hour:{
				required: "Please select hour"
			},
			time_minute:{
				required: "Please select minute"
			},
			schedule_at:{
				required: "Please select schedule at"
			}
		}
	});
	jQuery('#btnCancel').click(function(){
		location.href="time_schedule.php?user_id="+jQuery('#user_id').val()+"&act_id="+jQuery('#act_id').val();
	});
});
</script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	]
	
	<section id="main" class="column">		
		<form name="frm_activity_time_schedule" id="frm_activity_time_schedule" method="post">
		<article class="module width_full">
		<?php include("../supplier_menu.php");?>
		<?php include("../activity_menu.php")?>
			<header><h3>Add Activity Time Schdule
			<font color="#0000FF"><?php 
					$objActivityName=new Admin();
					$objActivityName->getActivityNameById($_REQUEST['act_id']);				
					$objActivityName->getRow();
					echo $objActivityName->getField('activity_booker_name'); ?>
			</font>
			</h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/time_schedule.php?user_id=<?php echo $_REQUEST['user_id'];?>&act_id=<?php echo $_REQUEST['act_id'];?>" title="Go back"><img src="<?php echo AbstractDB::SITE_PATH;?>admin/images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							 <label for="time_hour">Select Hour<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
								 <input type="hidden" name="act_id" id="act_id" value="<?php echo $_REQUEST['act_id'] ?>" />
								<input type="hidden" name="user_id" id="user_id" value="<?php echo $_REQUEST['user_id'] ?>" />
								<select name="time_hour" id="time_hour" class="validate[required] text-input">
									<option value="">--Select Hour--</option>
									<?php 
									
									for($hour=1;$hour<=12;$hour++)
									{
									?>
									<option value="<?php if(strlen($hour)==1){ echo "0".$hour;} else {echo $hour;}?>"><?php if(strlen($hour)==1){echo "0".$hour;} else { echo $hour;}?></option>
									<?php
									}
								?>	
								</select>   
						</fieldset>
						<div class="clear"></div>	
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							  <label for="day_type">Select Minute<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
									<select name="time_minute" id="time_minute" class="validate[required] text-input">
										<option value="">--Select Minute--</option>
										<?php for($minute=0;$minute<=59; $minute++) 
										{
										?>
										<option value="<?php if(strlen($minute)==1){echo "0".$minute;} else { echo $minute;}?>"><?php if(strlen($minute)==1){echo "0".$minute;} else { echo $minute;}?></option>
										<?php 
										}
										?>
									</select>   
						</fieldset><div class="clear"></div>
						<fieldset style="width:48%; float:left;">
							<label for="time_minute">Select Schedule At<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
									<select name="schedule_at" id="schedule_at">
												<option value="am">am</option>						
												<option value="pm">pm</option>
									</select>  
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