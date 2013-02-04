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
	$insertPrice=new Admin();
	$insertPrice->update_pricing($_POST);
	$_SESSION['msg']['added']='added';
	header("location:activity_pricing_list.php?user_id=".$_POST['user_id']);
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
				
		jQuery('#info_div').hide();
	// display error/success/alert messgae
	jQuery('.alert_error').hide();
	jQuery('.alert_error').mouseover(function(){
		jQuery(this).css('cursor','pointer').click(function(){
			jQuery(this).hide();
		});
	});	
	jQuery('.alert_error').slideDown('slow').delay(3000).slideUp('slow');
	
	jQuery('.alert_info').mouseover(function(){
		jQuery(this).css('cursor','pointer').click(function(){
			jQuery(this).hide();
		});
	});	
	jQuery("#frm_pricing").validate({
		errorElement:'div',
		rules: {
			 act_id : {
				required: true
			},
			sub_act_id : {
				required: true
			},
			record_name : {
				required: true
			},
			capacity : {
				required : true,
				number : true
			},
			adult_price1 : {
				required: true,
				number : true,
			},
			cur_type : {
				required: true
			},
			adult_comm : {
				required: true
			},
			adult_date1 : {
				required: true
			},
			"other[0][name]" : {
				required : true
			},
			"other[0][desc]" : {
				required : true
			},
			"other[0][price]" : {
				required : true,
				number : true
			},
			"other[1][name]" : {
				required : true
			},
			"other[1][desc]" : {	
				required : true
			},
			"other[1][price]" : {	
				required : true,
				number : true
			},
			"other[2][name]" : {
				required : true
			},
			"other[2][desc]" : {
				required : true				
			},
			"other[2][price]" : {
				required : true,
				number : true
			},
			"other[3][name]" : {
				required : true
			},
			"other[3][desc]" : {
				required : true
			},
			"other[3][price]" : {
				required : true,
				number : true
			},
			upgrade : {
				required : true
			},
			discount : {
				required : true,
				number : true
			},
			discount_from : {
				required : true
			},
			discount_till : {
				required : true
			},
			"time_schedule[]" : {
				required : true
			}
		},	
		messages: {
			act_id :{
				required: "Please select the activity id."
			},
			sub_act_id:{
				required: "Please select the sub activity id."
			},
			record_name:{
				required: "Please enter description."
			},
			capacity : {
				required : "Please enter capacity.",
				number : "Please enter number."
			},
			adult_price1 : {
				required: "Please enter adult price.",
				number: "Please enter valid adult price"
			},
			cur_type : {
				required: "Please select the currancy."
			},
			adult_comm : {
				required: "Please enter the commision amount."
			},
			adult_date1 : {
				required: "Please select the date."
			},
			"other[0][name]" : {
				required : "Please enter the name."
			},
			"other[0][desc]" : {
				required : "Please enter the description."
			},
			"other[0][price]" : {
				required : "Please enter the price.",
				number : "Please enter the valid price."
			},
			"other[1][name]" : {
				required : "Please enter the name."
			},
			"other[1][desc]" : {	
				required : "Please enter the discription."
			},
			"other[1][price]" : {	
				required : "Please enter the price.",
				number : "Please enter the valid price."
			},
			"other[2][name]" : {
				required : "Please enter the name."
			},
			"other[2][desc]" : {
				required : "Please enter the discription."
			},
			"other[2][price]" : {
				required : "Please enter the price.",
				number : "Please enter the valid price."
			},
			"other[3][name]" : {
				required : "Please enter the name."
			},
			"other[3][desc]" : {
				required : "Please enter the discription."
			},
			"other[3][price]" : {
				required : "Please enter the price.",
				number : "Please enter the valid price."
			},
			upgrade :{
				required : "Please enter upgrade discription."
			},
			discount : {
				required : "Please enter discount.",
				number : "Please enter valid discount."
			},
			discount_from : {
				required : "Please enter discount from date."
			},
			discount_till : {
				required : "Please enter discount till date."
			},
			"time_schedule[]" : {
				required : "Please select one of the time shcedule."
			}
			
		}
	});
	
	jQuery('#btnCancel').click(function(){
		location.href="list.php?user_id="+jQuery('#user_id').val();
	});
});
</script>
<script type="text/javascript">
function getsubs(act_id)
{
	
	jQuery.ajax({
		url: "../ajax/ajax_request.php",
		type: "post",
		data:"action=get_sub_activity&act_id="+act_id,
		success:function(msg)
		{
			$('#subact').html(msg);
		}
	});
}

jQuery(function()
{				
		
	$("#date1").datepicker({
			dateFormat: 'd-mm-yy', 
			numberOfMonths:1, 
			minDate:0,
			maxDate: '+1Y',
			onSelect: function(dateText, inst){ 
				var date =$.datepicker.parseDate('d-mm-yy', dateText); 
				/*var new_min_date = $.datepicker.parseDate('d-mm-yy', dateText); */
				date.setDate(date.getDate()+1);
				var $ret_date = $("#date2");
				//$ret_date.datepicker("setDate",	date); 
				$ret_date.datepicker("option","minDate", date);
				date.setDate(date.getDate()-1);
				var $disc_date = $("#discount_till");
				$disc_date.datepicker("option","maxDate", date);
				var $disc_date = $("#discount_from");
				$disc_date.datepicker("option","maxDate", date);
				$(this).datepicker("hide");
			}
			}
		);
		
		$( "#date2" ).datepicker({
			dateFormat: 'd-mm-yy', 
			minDate:0, 
			numberOfMonths: 1,
			maxDate: '+1Y',
			onSelect: function(dateText, inst){ 
				var date =$.datepicker.parseDate('d-mm-yy', dateText); 
				//var new_min_date = $.datepicker.parseDate('d-mm-yy', dateText); 
				date.setDate(date.getDate()); 
				var $ret_date = $("#discount_till");
				$ret_date.datepicker("option","maxDate", date);
				
				var $ret_date = $("#discount_from");
				$ret_date.datepicker("option","maxDate", date);
	
				//$ret_date.datepicker("setDate", date); 
				$(this).datepicker("hide");
		}
		});
		
				
		
		$( "#discount_till" ).datepicker({
			dateFormat: 'd-mm-yy', 
			minDate:0, 
			numberOfMonths: 1,
			maxDate: '+1Y'
		});
		
		$( "#discount_from" ).datepicker({
			dateFormat: 'd-mm-yy', 
			minDate:0, 
			numberOfMonths: 1,
			maxDate: '+1Y'
		});
});
function yessure()
{
	$("#sure").show();
}
function nothanks()
{
	$("#sure").hide();
}

function child_show()
{
	$("#cp").toggle();
}
function spec_show()
{
	$("#sp").toggle();
}
function family_show()
{
	$("#fp").toggle();
}
function combo_show()
{
	$("#cdp").toggle();
}
function yesupgrade()
{
	$("#upgrd").show();
}
function noupgrade()
{
	$("#upgrd").hide();
}
function yesdisc()
{
	$("#discid").show();
}
function nodisc()
{
	$("#discid").hide();
}
function apply_dicount_time(val){
	if(val=='yes'){
		$('#time_div').css('display','none');
					jQuery('.case').each(function(){	
						this.checked=true;
					});
	}else{
		$('#time_div').css('display','block');
	}
}
//Display Loading Image
function Display_Load()
{
	jQuery("#loading").fadeIn(1500,0);
	jQuery("#loading").html("<img src='<?php echo AbstractDB::SITE_PATH;?>admin/images/bigLoader.gif' />");
}
//Hide Loading Image
function Hide_Load()
{
	jQuery("#loading").fadeOut('slow');
}
</script>
<script type="text/javascript">

$(function() {
	var i = $('#more_price').size() + 1;
		$('a.add').click(function() {
			$('<div id="more_price" style="padding-left:10px;width:100%;float:left;"><div class="col_row" style="width=100%;height:auto;"><div class="col_1" style="width:auto;height:auto;"><span class="maintext" style="float:left;margin-top:10px"><strong>Name :</strong></span></div><div class="col_2" style="width:auto;height:auto;"><span class="maintext"><input type="text" name="other[extra'+i+'][name]" style="margin-top:10px;  width:207px;"></span></div><div class="col_1" style="width:auto;height:auto;"><span class="maintext"  style="float:left;margin-top:10px;"><strong>Description :</strong></span></div><div class="col_2" style="width:auto;height:auto;"><span class="maintext"><textarea name="other[extra'+i+'][desc]" style="margin-top:10px;  width:270px;"></textarea></span></div><div class="col_1" style="width:auto;height:auto;"><span class="maintext"  style="float:left;margin-top:10px"><strong>Price :</strong></span></div><div class="col_2" style="width:auto;height:auto;"><span class="maintext"><input type="text" name="other[extra'+i+'][price]" style="margin-top:10px; width:207px;"></span></div></div></div>').appendTo('#sure');
			i++;
		});

	$('a.remove').click(function()
	{
		if(i > 1)
		{
			$('#more_price:last').animate({opacity:"hide"}, "slow").remove();
			i--;
		}
	});
	
	$('a.reset').click(function()
	{
		while(i > 1) {
		$('#more_price:last').remove();
		i--;
	}

	});
	
});

function retrive_time_schedule(activity_id)
{	
		jQuery.ajax({
		url: "../ajax/ajax_request.php",
		type: "post",
		data:"activity_id="+activity_id+"&action=check_act_sub_type_exist",
			success:function(msg){
			var m=parseInt(msg);
				if(m)
				{		alert("Pricing is already added for this sub activity.");
						location.reload();		
				}
			}
		});
	jQuery.ajax({
		url: "../ajax/ajax_request.php",
		type: "post",
		data:"activity_id="+activity_id+"&action=get_time_schedule_by_activity_id_with_checkbox",
		success:function(msg){
			jQuery('#time_schedule').html(msg);
		}
	});
	
	
		
	
}
</script>
<style type="text/stylesheet">
#loading { 
width: 70%; 
text-align:center;
padding-top:40px;
position: absolute;
}
</style>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">		
		<form name="frm_pricing" id="frm_pricing" method="post">
		<article class="module width_full">
		<?php include("../supplier_menu.php");?>
		<?php include("../activity_menu.php")?>
		<div id="loading"></div>	
		<h4 class="alert_success" id="info_div" style="display:none;"></h4> 
			<header><h3>add Pricing
			<font color="#0000FF"><?php 
					$objSubActDtl=new Admin();
					$objSubActDtl->getSubActDtlByID($_REQUEST['sub_activity_id']);				
					$objSubActDtl->getAllRow();
					echo $objSubActDtl->getField('activity_booker_name');
					$time_schedule_ids=explode(',',$objSubActDtl->getField('schedule_time'));
					 ?>
			</font>
			</h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/list.php?user_id=<?php echo $_REQUEST['user_id'];?>" title="Go back"><img src="<?php echo AbstractDB::SITE_PATH;?>admin/images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						
						</fieldset>
						<fieldset>
							
							<span>Activity Booker operates a price match guarantee which ensures that we sell your product at the same retail price as you do.</span>
						</fieldset>
						<fieldset style="width:99%; float:left; margin-right: 3%;">
							<label style="font-size:24px">Edit Pricing<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
						</fieldset>
						<input type="hidden" name="user_id" id="user_id" value="<?php echo $_REQUEST['user_id'];?>" />
						<input type="hidden" name="act_id" id="act_id" value="<?php echo $_REQUEST['activity_id'];?>" />
						<!--
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label for="time_schedule_id">Select Activity<sup style="color:#FF0000;font-weight:bold;">*</sup></label>				
									
										<select name="act_id" id="act_id" onchange="getsubs(this.value);">
											<option value="">--select--</option>
												<?php 
												$objGetUserActivity=new Admin();
												$objGetUserActivity->getActivityDtlBySupp($_REQUEST['user_id']);
												while($objGetUserActivity->getAllRow())
												{
												?>
												<option value="<?php echo $objGetUserActivity->getField('activity_id');?>"><?php echo $objGetUserActivity->getField('activity_booker_name');?></option>
												<?php
												}
												?>
										</select>  
						</fieldset>
						
						<fieldset style="width:48%; float:left;">
							<label for="time_schedule_id">Select Sub-Activity<sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
								 <div id="subact">
										<select name="sub_act_id" id="sub_act_id" onchange="retrive_time_schedule(this.value);"> 
											<option value="">--select activity first--</option>
										</select> 	
								</div>
						</fieldset><div class="clear" ></div>-->
						
						<?php 
							$objSubActivityDtl=new Admin();
							$objSubActivityDtl->getSubact_byid($_REQUEST['sub_act_type_id']);
							$objSubActivityDtl->getAllRow();
							//echo base64_decode($_REQUEST['sub_act_type_id']);
							$sub_act_type_id=$objSubActivityDtl->getField('sub_activity_type_id');
							
						?>
						<input type="hidden" id="sub_activity_type_id" name="sub_activity_type_id" value="<?php echo$objSubActivityDtl->getField('sub_activity_type_id');?>" />
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label for="time_schedule_id">Description<sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
							<input type="hidden" name="sub_act_type_id" name="sub_act_type_id"  value="<?php echo $_REQUEST['sub_act_type_id'] ?>" /> 
								<textarea name="record_name" id="record_name" style="width:400px"><?php echo $objSubActivityDtl->getField('sub_activity_name');?></textarea>
						</fieldset>
						
						<fieldset style="width:48%; float:left;">
							<label for="capacity">Capacity<sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
								<input type="text" id="capacity" name="capacity" value="<?php echo $objSubActivityDtl->getField('capacity');?>" />
 						</fieldset><div class="clear"></div>
						
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label for="time_schedule_id">What is your adult retail price and currency code? <sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
								<input type="text" style="width:200px;" name="adult_price1" id="adult_price1" value="<?php echo $objSubActivityDtl->getField('price');?>" />
										<select style="background:none;border: 1px solid #999999;border-radius:0px;box-shadow:none;color:;float: none;font-size:14px;height:21px;line-height:32px;padding:0px;position:relative;width:62px;" name="cur_type">
											<option value="">Select Currancy</option>
											<option value="AUD" <?php if($objSubActivityDtl->getField('currency_code')=="AUD") {?> selected="selected" <?php } ?>>AUD</option>
											<option value="GBP" <?php if($objSubActivityDtl->getField('currency_code')=="GBP") {?> selected="selected" <?php } ?>>GBP</option>
											<option value="CAD" <?php if($objSubActivityDtl->getField('currency_code')=="CAD") {?> selected="selected" <?php } ?>>CAD</option>
											<option value="EUR" <?php if($objSubActivityDtl->getField('currency_code')=="EUR") {?> selected="selected" <?php } ?>>EUR</option>
											<option value="NZD" <?php if($objSubActivityDtl->getField('currency_code')=="NZD") {?> selected="selected" <?php } ?>>NZD</option>
											<option value="USD" <?php if($objSubActivityDtl->getField('currency_code')=="USD") {?> selected="selected" <?php } ?>>USD</option>
											<option value="FJD" <?php if($objSubActivityDtl->getField('currency_code')=="FJD") {?> selected="selected" <?php } ?>>FJD</option>
											<option value="WST" <?php if($objSubActivityDtl->getField('currency_code')=="WST") {?> selected="selected" <?php } ?>>WST</option>
											<option value="SBD" <?php if($objSubActivityDtl->getField('currency_code')=="SBD") {?> selected="selected" <?php } ?>>SBD</option>
											<option value="VUV" <?php if($objSubActivityDtl->getField('currency_code')=="VUV") {?> selected="selected" <?php } ?>>VUV</option>
											<option value="TOP" <?php if($objSubActivityDtl->getField('currency_code')=="TOP") {?> selected="selected" <?php } ?>>TOP</option>
											<option value="XPF" <?php if($objSubActivityDtl->getField('currency_code')=="XPF") {?> selected="selected" <?php } ?>>XPF</option>
											<option value="CLP" <?php if($objSubActivityDtl->getField('currency_code')=="CLP") {?> selected="selected" <?php } ?>>CLP</option>
									</select>
						</fieldset>
						
						<fieldset style="width:99%; float:left;">
							<label for="time_schedule_id">What percentage commissionable rate do you offer? Please note, activity operators with higher commissionable rates will be featured and used in additional promotional activity to maximize sales.<sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
							<br /><br />
						&nbsp;&nbsp;&nbsp;&nbsp;%<select name="adult_comm" id="adult_comm" style="width:300px">
													<option value=""></option>
														<?php for($i=1;$i<=100;$i++){?>
														<option value="<?php echo $i;?>"  <?php if($objSubActivityDtl->getField('commission_amt')==$i) {?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
														<?php } ?>
											</select> 
						</fieldset><div class="clear"></div>
						<fieldset style="width:48%; float:left;margin-right: 3%;">
							<label for="time_schedule_id">What date is your price above valid until?<sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
							 	<input type="text" id="date1" name="adult_date1" style=" width:207px;" value="<?php echo date("d-m-Y",strtotime($objSubActivityDtl->getField('price_valid_upto')));?>	">
						</fieldset><div class="clear"></div>
						<fieldset style="width:48%; float:left;margin-right: 3%;">
						<?php 
							$objFuturePrice=clone $objSubActivityDtl;
							$objFuturePrice->getfutureprice($_REQUEST['sub_act_type_id']);
							$objFuturePrice->getAllRow();
						?>
						
							<label for="time_schedule_id">Do you have your retail prices after the date specified above? If so, please populate below, if not, leave blank.Future Adult Retail Price</label>	<br /><br /><br />
							  <input type="text" name="adult_price2" id="adult_price2" value="<?php echo $objFuturePrice->getField("price");?>" />
						</fieldset>
						
						<fieldset style="width:48%; float:left;">
							<label for="time_schedule_id">What date is the price valid until?</label>	
								<input type="text" name="adult_date2" id="date2" value="<?php echo date("d-m-Y",strtotime($objFuturePrice->getField("cal_date")));?>" />
						</fieldset><div class="clear"></div>
						
			<fieldset style="width:99%; float:left; margin-right: 3%;">
				<label style="font-size:24px">Other Pricing<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
			</fieldset><div class="clear"></div>
			<fieldset style="width:99%; float:left; margin-right: 3%;">
				<label style="height:50px">Apart from the standard Adult Price, do you have any other pricing such as child pricing, spectactor pricing, family pricing, combo deal pricing etc?<sup style="color:#FF0000;font-weight:bold;">*</sup> </label>
				<input type="radio" name="noreq" value="yes" onclick="yessure();" style="margin-top:10px;" <?php if($objSubActivityDtl->getField('other_pricing')=="yes") {?> checked="checked" <?php } ?> /> Yes.
				<input type="radio" name="noreq" value="no" onclick="nothanks();" style="margin-top:10px;" <?php if($objSubActivityDtl->getField('other_pricing')=="no") {?> checked="checked" <?php } ?> /> No.
					 <?php 
					 	if($objSubActivityDtl->getField('other_pricing')=="yes")
						{?> <div id="sure" style="display:block;height:auto;">
	    		   <?php } 
				   		else { ?><div id="sure" style="display:none;height:auto;">
						
						 <?php } ?>
					
							<?php 
								$objActOtherPrice=clone $objSubActivityDtl;
								$objActOtherPrice->getOtherprices($_REQUEST['sub_act_type_id']);
								$count=0;
								while($objActOtherPrice->getAllRow())
								{

							?>
											<div class="col_row" style="height:auto;">
												<div class="col_1" style="width:100%;height:auto;padding-left:10px;margin-top:5px;float:left">
													<span class="maintext"><strong>
														<?php echo $objActOtherPrice->getField("price_type_name");?>
													</strong></span>
												</div>
												 
												<div id="cp" style="display:block;width:100%;padding-left:10px">
													<div class="col_1" style="width:auto;height:auto;margin-top:5px">
														<span class="maintext" style="float:left;margin-top:10px;"><strong>Name :</strong></span>
													</div>
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
													<input type="text" name="other[<?php echo $count;?>][name]" id="other[<?php echo $count;?>][name]" value="<?php echo $objActOtherPrice->getField("price_type_name");?>" style="margin-top:10px; width:207px;">
														</span>
													</div>
													
													<div class="col_1" style="width:auto;height:auto;">
														<span class="maintext" style="float:left;margin-top:10px;"><strong>Description :</strong></span>
													</div>
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
															<textarea name="other[<?php echo $count;?>][desc]" id="other[<?php echo $count;?>][desc]" style="margin-top:5px;  width:270px;"><?php echo $objActOtherPrice->getField("description");?></textarea>
														</span>
													</div>
													
													<div class="col_1" style="width:auto;height:auto;">
														<span class="maintext" style="float:left;margin-top:10px;"><strong>Price :</strong></span>
													</div>
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
														<input type="text" name="other[<?php echo $count;?>][price]" id="other[<?php echo $count;?>][price]" style="margin-top:10px; width:207px;" value="<?php echo $objActOtherPrice->getField("price_value");?>">
														</span>
													</div>
												</div>
											</div>
											
							<?php $count=$count+1;} ?>
								<div class="col_row" style="width:100%;height:auto;float:left">
									<div class="col_1" style="width:100%">
										<span class="maintext" style="float:left;padding-left:10px">
											<strong>
												More Price? 
												<a class="add"><img width="24" height="24" title="add input" alt="add" src="<?php echo AbstractDB::SITE_PATH;?>images/add.png"></a>
												<a class="remove"><img width="24" height="24" alt="remove input" src="<?php echo AbstractDB::SITE_PATH;?>images/remove.png"></a>
												<a class="reset"><img width="24" height="24" alt="reset" src="<?php echo AbstractDB::SITE_PATH;?>images/reset.png"></a>
											</strong>
										</span>
									</div>
									<div class="col_2" style="width:25%">
										<span class="maintext"><strong>
										</strong></span>
									</div>
								</div>
</div>
			</fieldset><div class="clear"></div>
			
			<fieldset style="width:99%; float:left">
							<label style="font-size:24px">Upgrade Options<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
			</fieldset><div class="clear"></div>
			
			<fieldset style="width:99%; float:left">
							<label>Do you offer upgrades such as photo packages, t-shirts etc? Let the customer know in advance so they can budget for these upgrades!<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							 <input type="radio" name="noupgrd" value="yes" onclick="yesupgrade();" <?php if($objSubActivityDtl->getField('upgrade')=='yes') { ?> checked="checked" <?php } ?> /> Yes.
							 <input type="radio" name="noupgrd" value="no" onclick="noupgrade();" <?php if($objSubActivityDtl->getField('upgrade')=='no') { ?> checked="checked" <?php } ?>  /> No.
							 	
								 <?php if($objSubActivityDtl->getField('upgrade')=='yes') { ?> 
								 <div id="upgrd" style="display:block;margin-top:15px">
								  <?php } else { ?>
								  <div id="upgrd" style="display:none;margin-top:15px">
								  <?php } ?>
								<div class="col_row" style="height:100px;">
									<div class="col_1" style="width:40%">
										<span class="maintext"><strong>Please document it here :</strong></span>
									</div>
									<div class="col_2" style="width:60%">
										<span class="maintext"><strong>
                                            <textarea style="height:80px; width:500px; margin-top:5px;" name="upgrade"><?php echo $objSubActivityDtl->getField('upgrade_options'); ?></textarea>
									   </strong></span>
									</div>
								</div>
							</div>
				</fieldset><div class="clear"></div>
			
						<fieldset style="width:99%; float:left;">
							<label style="font-size:24px;"> Discount Information <sup style="color:#FF0000;font-weight:bold;">*</sup></label>
						</fieldset><div class="clear"></div>
						
					
						<fieldset style="width:99%; float:left;">
							<label>	Do you have a discount that you would like to advertise through Activity Booker? <sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="radio" name="disc" value="yes" <?php if($objSubActivityDtl->getField('discounted')=='yes') { ?> checked="checked" <?php }?> onclick="yesdisc();"  style="margin-top:10px;" /> Yes. &nbsp; &nbsp; &nbsp;
													<input type="radio" name="disc" value="no" <?php if($objSubActivityDtl->getField('discounted')=='no') { ?> checked="checked" <?php }?> onclick="nodisc();" style="margin-top:10px;"  class="validate[required] radio"/> No.	
										 <?php if($objSubActivityDtl->getField('discounted')=='yes') { ?> 
								 <div id="discid" style="display:block;">
								  <?php } else { ?>
								<div id="discid" style="display:none;">
								  <?php } ?>
								  
								  	<?php
									
										$objDiscountInfoFrom=clone $objSubActivityDtl;
									
											
										$objDiscountInfoFrom->getDiscStart($_REQUEST['sub_act_type_id']);
										$objDiscountInfoFrom->getRow();
										$discstart =  $objDiscountInfoFrom->getField('cal_date');
										$discamt = $objDiscountInfoFrom->getField('discounted_price');
																			
									 ?>
								
                                                <div class="col_row" style="margin-top:10px;margin-left:10px;width:100%;height:100%;">
                                                    <div class="col_1"><span class="maintext" style="float:left;width:100%;margin-top:10px;"><strong>Discounted Price:</strong></span></div>
                                                    <div class="col_2">
                                                        <span class="maintext" style="float:left;width:30%;margin-top:10px;">
                                                            <input type="text" name="discount" id="discount" value="<?php echo $discamt; ?>" />
                                                        </span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col_row" style="margin-top:10px;margin-left:10px;width:100%;height:100%;">
                                                    <div class="col_1"><span class="maintext" style="float:left;width:100%;margin-top:10px;"><strong>Discounted Price Valid From:</strong></span></div>
                                                    <div class="col_2">
                                                        <span class="maintext" style="float:left;width:30%;margin-top:10px;">
                                                            <input type="text" name="discount_from" id="discount_from" value="<?php echo date("d-m-Y",strtotime($discstart)); ?>" />
                                                        </span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col_row" style="margin-top:10px;margin-left:10px;margin-top:10px;">
                                                    <div class="col_1"><span class="maintext" style="float:left;width:100%;margin-top:10px;"><strong>Discounted Price Valid Until:</strong></span></div>
													<?php
														$objDiscountInfoTill=clone $objSubActivityDtl;
															$objDiscountInfoTill->getDiscEnd($_REQUEST['sub_act_type_id']);
															$objDiscountInfoTill->getRow();
															$discend = $objDiscountInfoTill->getField('cal_date');								
													 ?>
                                                    <div class="col_2">
                                                        <span class="maintext" style="float:left;width:30%;margin-top:10px;">
                                                            <input type="text" name="discount_till" id="discount_till" value="<?php echo date("d-m-Y",strtotime($discend)); ?>" />
                                                        </span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col_row" style="margin-top:10px;">
                                                    <div class="col_1"><span class="maintext" style="float:left;width:100%;margin-left:10px;margin-top:10px;"><strong>Does this discount apply to all departure times?</strong></span></div>
                                                    <div class="col_2">
                                                        <span class="maintext" style="width:100%;float:left;">
														<?php 
														
														$objDiscountInfo=clone $objSubActivityDtl;
														$objDiscountInfo->getDiscInfo($_REQUEST['sub_act_type_id'],$discstart);
														//$objDiscountInfo->getRow();
														$cheacked=array();
														$chk=1;
														while($objDiscountInfo->getAllRow())
														{
															if($objDiscountInfo->getField('discounted')=='no')
															{
																$chk=0;
															}
															else
															{
															$cheacked[]=$objDiscountInfo->getField('activity_time');
															}
														}
														?>
														
													<input type="radio" name="disc_price_for_time" value="yes" <?php if($chk==1){?>checked="checked" <?php }?> onclick="apply_dicount_time(this.value);"  style="margin-top:10px;" /> Yes. &nbsp; &nbsp; &nbsp;
													<input type="radio" name="disc_price_for_time" value="no"  <?php if($chk==0){?>checked="checked" <?php }?> onclick="apply_dicount_time(this.value);" style="margin-top:10px;"  class="validate[required] radio"/> No.<br>
                                                            
                                                        </span>
                                                    </div>
                                                </div>
                                                
												<?php if($chk==1){?> <div id="time_div" style="display:none;"><?php } else {?>
												<div id="time_div" style="display:block;">
												<?php
												}?>
												
                                                <div id="time_div" style="display:block;">
                                                    <div class="col_row" style="margin-top:10px;height:auto;">
                                                        <div class="col_1" style="width:100%"><span class="maintext" style="float:left;padding-left:10px;padding-top:10px"><strong>Please ticks the appropriate times:</strong></span></div>
                                                        <div class="col_2" style="width:25%;height:auto;">
                                                            <span class="maintext" style="float:left;padding-left:10px;padding-top:10px">
                                                                <div id="time_schedule">
														<?php 
														$objGetTime=clone $objSubActivityDtl;
														$objGetTime->getTimeSceduleByActIDNew($sub_act_type_id);
														while($objGetTime->getAllRow())
														{
															$cheacktime=0;
															foreach($cheacked as $item)
															{
																if($item==$objGetTime->getField('time_schedule_id'))
																{
																	$cheacktime=1;
																}
															}
														?>
				<input type="checkbox"  name="time_schedule[]" class="case" id='<?Php echo "time_schedule".$objGetTime->getField('time_schedule_id');?>' value="<?php echo $objGetTime->getField('time_schedule_id')?>" <?php if($cheacktime==1) {?> checked="checked" <?php }?> >
				
					<span><?php echo $objGetTime->getField('hour').'.'.$objGetTime->getField('minute').' '.$objGetTime->getField('schedule_at')?><span><br>
														<?php 
														}	
														?>
																</div>                                                            
                                                            </span>
                                                        </div>
                                                    </div>	
                                                </div>
                                            </div>					
															
						</fieldset><div class="clear"></div>
						</div>	
			<footer>
				<div class="submit_link">
					<input type="submit" name="btnSubmit" id="btnSubmit" value="Update" class="alt_btn" onClick="return confirm('All the details in the calender will be reset, with these new details? Are you sure you want to do this?');">
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