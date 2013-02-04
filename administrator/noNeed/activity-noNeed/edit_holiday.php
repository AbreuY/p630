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
	if($_POST['btnSubmit']=='Update'){
		
		$objAddHoliday->update_activity_holiday($_POST);
		$_SESSION['msg']['updated']='Updated.';
		header("location:viewholiday.php?user_id=".$_POST['user_id']."&act_id=".$_POST['act_id']);
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
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery("#holiday").datepicker({minDate: '0', changeMonth: true, changeYear: true, dateFormat: 'yy-mm-d'});
	jQuery("#frm_activity_holiday").validate({
		errorElement:'div',
		rules: {
			
			holiday:{
				required: true
			},
			day_type:{
				required: true
			},
			reccursive:{
				required: true
			}
		},
		messages: {
			holiday:{
				required: "Please select holiday"
			},
			day_type:{
				required: "Please select holiday day type"
			},
			reccursive:{
				required: "Please select holiday reccursive or not"
			}
		}
	});
	//BASIC pass srtength
	$(".password_test").passStrength({
		userid: "#first_name"
	});	
	
	jQuery('#btnCancel').click(function(){
		location.href="viewholiday.php?user_id="+jQuery('#user_id').val()+"&act_id="+jQuery('#act_id').val();
	});
});
</script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">		
		<form name="frm_activity_holiday" id="frm_activity_holiday" method="post">
		<article class="module width_full">
		<?php include("../supplier_menu.php");?>
		<?php include("../activity_menu.php")?>
			<?php
				$objActivityHoliday=new Admin();
					$objActivityHoliday->getActivityHolidayById($_REQUEST['holiday_id']);
					$objActivityHoliday->getAllRow();
				?>
			
			<header><h3>Edit Activity Holiday For 
			<font color="#0000FF">
			<?php echo $objActivityHoliday->getField('activity_booker_name');?>
			</font>
			</h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/manage_employee_details.php" title="Go back"><img src="images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label for="holiday">Holiday<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
								<input type="hidden" name="act_id" id="act_id" value="<?php echo $_REQUEST['act_id'] ?>" />
								<input type="hidden" name="user_id" id="user_id" value="<?php echo $_REQUEST['user_id'] ?>" />
								<input type="hidden" name="holiday_id" id="holiday_id" value="<?php echo $_REQUEST['holiday_id'];?>"  />
								<input type="text" name="holiday" id="holiday" value="<?php echo $objActivityHoliday->getField('holiday');?>" />
						</fieldset>
						<div class="clear"></div>	
						
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							 <label for="day_type">Type<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
									<select name="day_type" id="day_type">
										<option value="">--Select type--</option>
										<option value="D" <?php if($objActivityHoliday->getField('day_recur')=='D'){?> selected="selected" <?php } ?>>Day</option>
										<option value="W" <?php if($objActivityHoliday->getField('day_recur')=='W'){?> selected="selected" <?php } ?>>Weekly</option>
										<option value="M" <?php if($objActivityHoliday->getField('day_recur')=='M'){?> selected="selected" <?php } ?>>Monthly</option>
										<option value="Y" <?php if($objActivityHoliday->getField('day_recur')=='Y'){?> selected="selected" <?php } ?>>Yearly</option>														
									</select>  
						</fieldset><div class="clear"></div>
						<fieldset style="width:48%; float:left;">
							<label for="reccursive">Reccursive<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
									 <select name="reccursive" id="reccursive">
										<option value="N" <?php if($objActivityHoliday->getField('reccursive')=='N'){?> selected="selected" <?php } ?>>NO</option>
										<option value="Y" <?php if($objActivityHoliday->getField('reccursive')=='Y'){?> selected="selected" <?php } ?>>YES</option>
									</select> 
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