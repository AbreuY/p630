<?php
	require_once('../../pi_classes/Admin.php');
	ob_start();
	session_start();
	if(empty($_SESSION['admin_id'])){
		header("location:login.php");
	}
	$objAddHoliday=new Admin();
	if(isset($_SESSION['msg'])){
		unset($_SESSION['msg']);
	}
	if($_POST['btnSubmit']=='Submit'){
		//print_r($_POST);die();
	$objAddHoliday->addSubActivityType($_POST);
		$_SESSION['msg']['added']='added';
		header("location:activity_sub_category.php?user_id=".$_POST['user_id']."&act_id=".$_POST['act_id']);
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
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.core.js"></script> 
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.datepicker.js"></script>	
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.all.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.theme.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.core.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.datepicker.css" rel="stylesheet" /> 
<link rel="stylesheet" type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>css/ui.dropdownchecklist.themeroller.css" />
<!-- jquery for dropdownlistbox -->
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>js/ui.dropdownchecklist-1.4-min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery("#holiday").datepicker({minDate: '0', changeMonth: true, changeYear: true, dateFormat: 'yy-mm-d'});
	jQuery("#time_schedule_id").dropdownchecklist({ emptyText: "--Select Time Schedule--"});
	jQuery('.ui-dropdownchecklist-text').css('float','none');
	jQuery('.ui-dropdownchecklist-selector').css('width','300px');
	jQuery('.ui-dropdownchecklist-text').css('width','310px');
	jQuery('#ddcl-time_schedule_id-ddw').css('width','310px');
	jQuery('.ui-dropdownchecklist-selector').css('background','#cccccc');
	jQuery('.ui-dropdownchecklist-selector').css('margin-left','10px');
	
	jQuery("#frm_activity_subactivity").validate({
		errorElement:'div',
		rules: {
			"time_schedule_id[]" : {
				required: true
			},
			sub_activity_name : {
				required: true
			},
			sub_activity_descr : {
				required: true
			}
		},
		messages: {
			"time_schedule_id[]" :{
				required: "Please select time schedule ids."
			},
			sub_activity_name:{
				required: "Please enter sub activity name."
			},
			sub_activity_descr:{
				required: "Please enter sub activity description."
			}
		}
	});
	//BASIC pass srtength
	$(".password_test").passStrength({
		userid: "#first_name"
	});	
	
	jQuery('#btnCancel').click(function(){
		location.href="activity_sub_category.php?user_id="+jQuery('#user_id').val()+"&act_id="+jQuery('#act_id').val();
	});
});
</script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">		
		<form name="frm_activity_subactivity" id="frm_activity_subactivity" method="post">
		<article class="module width_full">
		<?php include("../supplier_menu.php");?>
		<?php include("../activity_menu.php")?>
			<header><h3>Add Sub Activity
			<font color="#0000FF"><?php 
					$objActivityName=new Admin();
					$objActivityName->getActivityNameById($_REQUEST['act_id']);				
					$objActivityName->getRow();
					echo $objActivityName->getField('activity_booker_name'); ?>
			</font>
			</h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/activity_sub_category.php?user_id=<?php echo $_REQUEST['user_id'];?>&act_id=<?php echo $_REQUEST['act_id'];?>" title="Go back"><img src="<?php echo AbstractDB::SITE_PATH;?>admin/images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label for="time_schedule_id">Select Time Schedule<sup style="color:#FF0000;font-weight:bold;">*</sup></label>				
									<input type="hidden" name="act_id" id="act_id" value="<?php echo $_REQUEST['act_id'];?>" />
									<input type="hidden" name="user_id" id="user_id" value="<?php echo $_REQUEST['user_id'];?>" />
										<select name="time_schedule_id[]" id="time_schedule_id" multiple="multiple" style="padding-left:10px;">
										<?php  
										$objTimeSchedule=clone $objActivityName;
										$objTimeSchedule->getTimeSceduleByMainActID($_REQUEST['act_id']);
										while($objTimeSchedule->getAllRow())
										{	
										?>
											<option value="<?php echo $objTimeSchedule->getField('time_schedule_id');?>"><?php echo $objTimeSchedule->getField('hour').":".$objTimeSchedule->getField('minute')." ".$objTimeSchedule->getField('schedule_at');?></option>		
										<?php												
										}								
										?>
										 </select>
						</fieldset>
						<div class="clear"></div>	
						
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							 <label for="sub_activity_name">Sub Activity Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
										<input type="text" name="sub_activity_name" id="sub_activity_name" style="width:300px" />
						</fieldset><div class="clear"></div>
						<fieldset style="width:48%; float:left;">
							<label for="sub_activity_descr">Description<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
										<textarea name="sub_activity_descr" id="sub_activity_descr" rows="5" style="width:500px;"></textarea>
						</fieldset><div class="clear"></div>	
					</div>
			<footer>
				<div class="submit_link">
					<input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" class="alt_btn">
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