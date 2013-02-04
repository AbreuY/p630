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
	$insertPrice=new Admin();
	$insertPrice->activity_pricing($_POST);
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
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>



<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.core.js"></script> 
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.datepicker.js"></script>	
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.all.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.theme.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.core.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.datepicker.css" rel="stylesheet" /> 


<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>css/validationEngine.jquery.css" type="text/css"/>
<script src="<?php echo AbstractDB::SITE_PATH;?>js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
jQuery(document).ready(function() {
		jQuery("#frm_pricing").validationEngine();
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
	jQuery('#btnCancel').click(function(){
		location.href="list.php?user_id="+jQuery('#user_id').val();
	});
	
	var act_id=jQuery("#act_id").val();
		getsubs(act_id);
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
			maxDate: '+6M',
			onSelect: function(dateText, inst){ 
				/*var date =$.datepicker.parseDate('d-mm-yy', dateText); 
				//var new_min_date = $.datepicker.parseDate('d-mm-yy', dateText); 
				date.setDate(date.getDate()+1);
				var $ret_date = $("#date2");
				//$ret_date.datepicker("setDate",	date); 
				$ret_date.datepicker("option","minDate", date);
				date.setDate(date.getDate()-1);
				var $disc_date = $("#discount_till");
				$disc_date.datepicker("option","maxDate", date);
				var $disc_date = $("#discount_from");
				$disc_date.datepicker("option","maxDate", date);
				$(this).datepicker("hide");*/
				
				var date =$.datepicker.parseDate('d-mm-yy', dateText); 
				//var new_min_date = $.datepicker.parseDate('yy-mm-d', dateText); 
				date.setDate(date.getDate()+2); 
				var $ret_date = $("#date2");
				$ret_date.datepicker("option","minDate", date);
				
				date.setDate(date.getDate()-1);
				var $disc_date = $("#discount_till");
				$disc_date.datepicker("option","maxDate", date);
				
				var $disc_date = $("#discount_from");
				$disc_date.datepicker("option","maxDate", date);
				
				$ret_date.datepicker("setDate", date); 
				$(this).datepicker("hide");
			}
			}
		);
		
		$( "#date2" ).datepicker({
			dateFormat: 'd-mm-yy', 
			minDate:0, 
			numberOfMonths: 1,
			maxDate: '+6M',
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
			maxDate: '+6M'
		});
		
		$( "#discount_from" ).datepicker({
			dateFormat: 'd-mm-yy', 
			minDate:0, 
			numberOfMonths: 1,
			maxDate: '+6M'
		});
});

function fn_toggle_discount_date_range()
{
	var chk=$("#discountchkbox");
	if(chk.is(":checked"))
	{
		jQuery("#discountfromto").css('display','block');
	}
	else
	{
		jQuery("#discountfromto").css('display','none');
	}
}
function fn_toggle(id)
{
jQuery("#adult_discountedPrice"+id).toggle();
}

function fn_addclasstoadultdiscount(id)
{
	jQuery("#adult_discountedPrice"+id).removeClass();
	jQuery("#adult_discountedPrice"+id).addClass("validate[required,max["+(parseFloat(jQuery('#adult_retailprice'+id).val())-1)+"],min[1],custom[number]] text-input");
}

function fn_toggle_for_future(id)
{
jQuery("#future_discountedPrice"+id).toggle();
}

function fn_addclasstofuturediscount(id)
{
	jQuery("#future_discountedPrice"+id).removeClass();
	jQuery("#future_discountedPrice"+id).addClass("validate[required,max["+(parseFloat(jQuery('#future_retailprice'+id).val())-1)+"],min[1],custom[number]] text-input");
}

function fn_toggle_for_child(id)
{
jQuery("#child_discountedPrice"+id).toggle();
}

function fn_addclasstochilddiscount(id)
{
	jQuery("#child_discountedPrice"+id).removeClass();
	jQuery("#child_discountedPrice"+id).addClass("validate[required,max["+(parseFloat(jQuery('#child_retailprice'+id).val())-1)+"],min[1],custom[number]] text-input");
}


function fn_toggle_for_spectator(id)
{
jQuery("#spectator_discountedPrice"+id).toggle();
}

function fn_addclasstospectatordiscount(id)
{
	jQuery("#spectator_discountedPrice"+id).removeClass();
	jQuery("#spectator_discountedPrice"+id).addClass("validate[required,max["+(parseFloat(jQuery('#spectator_retailprice'+id).val())-1)+"],min[1],custom[number]] text-input");
}

function fn_toggle_for_family(id)
{
jQuery("#family_discountedPrice"+id).toggle();
}

function fn_addclasstofamilydiscount(id)
{
	jQuery("#family_discountedPrice"+id).removeClass();
	jQuery("#family_discountedPrice"+id).addClass("validate[required,max["+(parseFloat(jQuery('#family_retailprice'+id).val())-1)+"],min[1],custom[number]] text-input");
}

function fn_toggle_for_combo(id)
{
jQuery("#combo_discountedPrice"+id).toggle();
}
function fn_addclasstocombodiscount(id)
{
	jQuery("#combo_discountedPrice"+id).removeClass();
	jQuery("#combo_discountedPrice"+id).addClass("validate[required,max["+(parseFloat(jQuery('#combo_retailprice'+id).val())-1)+"],min[1],custom[number]] text-input");
}fn_addclasstootherdiscount


function fn_toggle_for_other(cnt,id)
{
jQuery("#other"+cnt+"_discountedPrice"+id).toggle();
}

function fn_addclasstootherdiscount(cnt,id)
{
	jQuery("#other"+cnt+"_discountedPrice"+id).removeClass();
	jQuery("#other"+cnt+"_discountedPrice"+id).addClass("validate[required,max["+(parseFloat(jQuery('#other'+cnt+'_retailprice'+id).val())-1)+"],min[1],custom[number]] text-input");
}

function  fn_retrive_above_value(id)
{
		var chk=$("#chk"+id);
		if(chk.is(":checked")){
				jQuery("#adult_retailprice"+id).val(jQuery('#adult_retailprice1').val());
				var chkdiscount=$("#adult_discountchk1");
				if(chkdiscount.is(":checked"))
				{
					jQuery("#adult_discountedPrice"+id).val(jQuery('#adult_discountedPrice1').val());
					jQuery("#adult_discountchk"+id).attr('checked', true);
					jQuery("#adult_discountedPrice"+id).css('display','block');
				}
			}
			else
			{
				jQuery("#adult_retailprice"+id).val("");
				jQuery("#adult_discountedPrice"+id).val("");
				jQuery("#adult_discountchk"+id).attr('checked', false);
				jQuery("#adult_discountedPrice"+id).css('display','none');
				
			}
}
function  fn_retrive_above_value_for_future(id)
{
		var chk=$("#future_chk"+id);
		if(chk.is(":checked")){
				jQuery("#future_retailprice"+id).val(jQuery('#future_retailprice1').val());
				var chkdiscount=$("#future_discountchk1");
				if(chkdiscount.is(":checked"))
				{
					jQuery("#future_discountedPrice"+id).val(jQuery('#future_discountedPrice1').val());
					jQuery("#future_discountchk"+id).attr('checked', true);
					jQuery("#future_discountedPrice"+id).css('display','block');
				}
			}
			else
			{
				jQuery("#future_retailprice"+id).val("");
				jQuery("#future_discountedPrice"+id).val("");
				jQuery("#future_discountchk"+id).attr('checked', false);
				jQuery("#future_discountedPrice"+id).css('display','none');
				
			}
}

function  fn_retrive_above_value_for_child(id)
{
		var chk=$("#child_chk"+id);
		if(chk.is(":checked")){
				jQuery("#child_retailprice"+id).val(jQuery('#child_retailprice1').val());
				var chkdiscount=$("#child_discountchk1");
				
				if(chkdiscount.is(":checked"))
				{
					jQuery("#child_discountedPrice"+id).val(jQuery('#child_discountedPrice1').val());
					jQuery("#child_discountchk"+id).attr('checked', true);
					jQuery("#child_discountedPrice"+id).css('display','block');
				}
			}
			else
			{
				jQuery("#child_retailprice"+id).val("");
				jQuery("#child_discountedPrice"+id).val("");
				jQuery("#child_discountchk"+id).attr('checked', false);
				jQuery("#child_discountedPrice"+id).css('display','none');
				
			}
}

function  fn_retrive_above_value_for_spectator(id)
{
		var chk=$("#spectator_chk"+id);
		if(chk.is(":checked")){
				jQuery("#spectator_retailprice"+id).val(jQuery('#spectator_retailprice1').val());
				var chkdiscount=$("#spectator_discountchk1");
				
				if(chkdiscount.is(":checked"))
				{
					jQuery("#spectator_discountedPrice"+id).val(jQuery('#spectator_discountedPrice1').val());
					jQuery("#spectator_discountchk"+id).attr('checked', true);
					jQuery("#spectator_discountedPrice"+id).css('display','block');
				}
			}
			else
			{
				jQuery("#spectator_retailprice"+id).val("");
				jQuery("#spectator_discountedPrice"+id).val("");
				jQuery("#spectator_discountchk"+id).attr('checked', false);
				jQuery("#spectator_discountedPrice"+id).css('display','none');
				
			}
}

function  fn_retrive_above_value_for_family(id)
{
		var chk=$("#family_chk"+id);
		if(chk.is(":checked")){
				jQuery("#family_retailprice"+id).val(jQuery('#family_retailprice1').val());
				var chkdiscount=$("#family_discountchk1");
				
				if(chkdiscount.is(":checked"))
				{
					jQuery("#family_discountedPrice"+id).val(jQuery('#family_discountedPrice1').val());
					jQuery("#family_discountchk"+id).attr('checked', true);
					jQuery("#family_discountedPrice"+id).css('display','block');
				}
			}
			else
			{
				jQuery("#family_retailprice"+id).val("");
				jQuery("#family_discountedPrice"+id).val("");
				jQuery("#family_discountchk"+id).attr('checked', false);
				jQuery("#family_discountedPrice"+id).css('display','none');
				
			}
}

function  fn_retrive_above_value_for_combo(id)
{
		var chk=$("#combo_chk"+id);
		if(chk.is(":checked")){
				jQuery("#combo_retailprice"+id).val(jQuery('#combo_retailprice1').val());
				var chkdiscount=$("#combo_discountchk1");
				
				if(chkdiscount.is(":checked"))
				{
					jQuery("#combo_discountedPrice"+id).val(jQuery('#combo_discountedPrice1').val());
					jQuery("#combo_discountchk"+id).attr('checked', true);
					jQuery("#combo_discountedPrice"+id).css('display','block');
				}
			}
			else
			{
				jQuery("#combo_retailprice"+id).val("");
				jQuery("#combo_discountedPrice"+id).val("");
				jQuery("#combo_discountchk"+id).attr('checked', false);
				jQuery("#combo_discountedPrice"+id).css('display','none');
				
			}
}

function  fn_retrive_above_value_for_other(cnt,id)
{
		var chk=$("#other_chk"+cnt+id);
		if(chk.is(":checked")){
				jQuery("#other"+cnt+"_retailprice"+id).val(jQuery('#other'+cnt+'_retailprice1').val());
				var chkdiscount=$("#other"+cnt+"_discountchk"+"1");
				if(chkdiscount.is(":checked"))
				{
					jQuery("#other"+cnt+"_discountedPrice"+id).val(jQuery('#other'+cnt+'_discountedPrice1').val());
					jQuery("#other"+cnt+"_discountchk"+id).attr('checked', true);
					jQuery("#other"+cnt+"_discountedPrice"+id).css('display','block');
				}
			}
			else
			{
				jQuery("#other"+cnt+"_retailprice"+id).val("");
				jQuery("#other"+cnt+"_discountedPrice"+id).val("");
				jQuery("#other"+cnt+"_discountchk"+id).attr('checked', false);
				jQuery("#other"+cnt+"_discountedPrice"+id).css('display','none');
			}
}
function yessure()
{
	$("#sure").show();
}
function nothanks()
{
	$("#sure").hide();
}
function yesfuture()
{
		$("#future_price").show();
}
function nofuture()
{
	$("#future_price").hide();
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
	var i;
	
		/*<div class="col_1" style="width:auto;height:auto;"><span class="maintext"  style="float:left;margin-top:10px;"><strong>Description :</strong></span></div><div class="col_2" style="width:auto;height:auto;"><span class="maintext"><textarea name="other'+i+'_desc" class="validate[required] text-input" style="margin-top:10px;  width:270px;"></textarea></span> */
	
		$('a.add').click(function() {
		 i=parseInt(jQuery("#noofotherprice").val())+1;
			$('<div id="more_price'+i+'" style="padding-left:10px;width:100%;float:left;"><div class="col_row" style="width=100%;height:auto;"><div class="col_1" style="width:auto;height:auto;"><span class="maintext" style="float:left;margin-top:10px"><strong>Name :</strong></span></div><div class="col_2" style="width:auto;height:auto;"><span class="maintext"><input type="text" name="other'+i+'_price_name" class="validate[required] text-input" style="margin-top:10px;  width:207px;"></span></div><div class="pricetable"><div class="pricetablerow"><div class="pricetablecol" style="width:20%"></div><div class="pricetablecol" style="width:10%">Time</div><div class="pricetablecol" style="width:20%">Retail Price</div><div class="pricetablecol" style="width:20%">Is Discounted</div><div class="pricetablecol" style="width:20%">Discounted Price</div></div><div id="subActPriceTableForOther'+i+'" name="subActPriceTableForOther'+i+'"></div></div></div>').appendTo('#sure');
					var activity_id = jQuery('#activity_id').val();
					jQuery.ajax({
					url: "../ajax/ajax_request.php",
					type: "post",
					data:"activity_id="+activity_id+"&count="+i+"&action=get_price_table_for_other",
						success:function(msg){
							jQuery("#subActPriceTableForOther"+(i-1)).html(msg);
						}
					});	

					jQuery.ajax({
					url: "../ajax/ajax_request.php",
					type: "post",
					data:"activity_id="+activity_id+"&action=check_act_sub_type_exist",
						success:function(msg){
						var m=parseInt(msg);
							if(m)
							{		
										var msg1='<div class="pricetablerow" align="center">Select Activity and sub activity first</div>';
										jQuery("#subActPriceTableForOther"+(i-1)).html(msg1);
							}
						}
		});
					
			i++;
			jQuery("#noofotherprice").val(i-1);
		});

	$('a.remove').click(function()
	{	i=parseInt(jQuery("#noofotherprice").val());
				if(i >= 1)
				{
					$('#more_price'+i).animate({opacity:"hide"}, "slow").detach();
					jQuery("#noofotherprice").val(i-1);
				}
	});
	$('a.reset').click(function()
	{
		i=parseInt(jQuery("#noofotherprice").val());
		while(i > 0) {
			$('#more_price'+i).remove();
			i--
		}
		jQuery("#noofotherprice").val(0);
	});
});

function retrive_time_schedule(activity_id)
{	
		i=parseInt(jQuery("#noofotherprice").val());
		while(i > 0) {
			$('#more_price'+i).remove();
			i--
		}
		jQuery("#noofotherprice").val(0);
	
		jQuery("#activity_id").val(activity_id);
		
		jQuery.ajax({
		url: "../ajax/ajax_request.php",
		type: "post",
		data:"activity_id="+activity_id+"&action=check_act_sub_type_exist",
			success:function(msg){
			var m=parseInt(msg);
				if(m)
				{		alert("Pricing is already added for this sub activity.");
						document.getElementById("sub_act_id").value="";
						var msg1='<div class="pricetablerow" align="center">Select Activity and sub activity first</div>';
							jQuery('#subActPriceTable').html(msg1);
							jQuery('#subActPriceTableForFuture').html(msg1);
							jQuery('#subActPriceTableForChild').html(msg1);
							jQuery('#subActPriceTableForSpectator').html(msg1);
							jQuery('#subActPriceTableForFamily').html(msg1);
							jQuery('#subActPriceTableForCombo').html(msg1);
				}else{
					
					jQuery.ajax({
						url: "../ajax/ajax_request.php",
						type: "post",
						data:"activity_id="+activity_id+"&action=get_price_table",
							success:function(msg){
							//	alert(msg);
								jQuery('#subActPriceTable').html(msg);
							}
					});
					
					jQuery.ajax({
						url: "../ajax/ajax_request.php",
						type: "post",
						data:"activity_id="+activity_id+"&action=get_price_table_for_future",
							success:function(msg){
							//	alert(msg);
								jQuery('#subActPriceTableForFuture').html(msg);
							}
						});
						
						jQuery.ajax({
						url: "../ajax/ajax_request.php",
						type: "post",
						data:"activity_id="+activity_id+"&action=get_price_table_for_child",
							success:function(msg){
							//	alert(msg);
								jQuery('#subActPriceTableForChild').html(msg);
							}
						});
						
						jQuery.ajax({
						url: "../ajax/ajax_request.php",
						type: "post",
						data:"activity_id="+activity_id+"&action=get_price_table_for_spectator",
							success:function(msg){
							//	alert(msg);
								jQuery('#subActPriceTableForSpectator').html(msg);
							}
						});
						
						jQuery.ajax({
						url: "../ajax/ajax_request.php",
						type: "post",
						data:"activity_id="+activity_id+"&action=get_price_table_for_family",
							success:function(msg){
							//	alert(msg);
								jQuery('#subActPriceTableForFamily').html(msg);
							}
						});
						
						jQuery.ajax({
						url: "../ajax/ajax_request.php",
						type: "post",
						data:"activity_id="+activity_id+"&action=get_price_table_for_combo",
							success:function(msg){
							//	alert(msg);
								jQuery('#subActPriceTableForCombo').html(msg);
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
		<?php /* include("../activity_menu.php") */?>
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
						
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/photogallary.php?user_id=<?php echo $_REQUEST['user_id'];?>&act_id=<?php echo $_REQUEST['act_id'];?>" title="Add activity photo"><img src="<?php echo AbstractDB::SITE_PATH;?>images/add_photo.jpg" alt="Add activity photo" title="Add activity photo" />Next</a>
						
						
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
							<label style="font-size:24px">Pricing<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
									<input type="hidden" name="user_id" id="user_id" value="<?php echo $_REQUEST['user_id'];?>" />
									<input type="hidden" name="activity_id" id="activity_id" />
									<input type="hidden" name="noofotherprice" id="noofotherprice" value="0" />
									<input type="hidden" name="act_id" id="act_id" value="<?php echo base64_decode($_REQUEST['act_id']); ?>" />	
						</fieldset>
						<!--<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label for="time_schedule_id">Select Activity<sup style="color:#FF0000;font-weight:bold;">*</sup></label>				
									
										<select name="act_id" id="act_id" onchange="getsubs(this.value);" class="validate[required] text-input">
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
						</fieldset>-->
						<fieldset style="width:48%; float:left;">
							<label for="time_schedule_id">Select Sub-Activity<sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
								 <div id="subact">
										<select name="sub_act_id" id="sub_act_id" onchange="retrive_time_schedule(this.value);" class="validate[required] text-input" style="width:350px;" > 
											<option value="">--select activity first--</option>
										</select> 	
								</div>
						</fieldset><div class="clear" ></div>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label for="time_schedule_id">Description<sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
								<textarea name="record_name" id="record_name" class="validate[required] text-input" style="width:400px"></textarea>
						</fieldset>
						
						<fieldset style="width:48%; float:left;">
							<label for="capacity">Capacity<sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
								<input type="text" id="capacity" class="validate[required,custom[number]] text-input" name="capacity" style="width:350px;" />
								
 						</fieldset><div class="clear"></div>
						
						<fieldset style="width:98% float:left; margin-right: 3%;">
						<label for="time_schedule_id">What is your adult retail price and currency code? <sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
						<div class="pricetable">
							<div class="pricetablerow">
								<div class="pricetablecol" style="width:20%"></div>
								<div class="pricetablecol" style="width:10%">Time</div>
								<div class="pricetablecol" style="width:20%">Retail Price</div>
								<div class="pricetablecol" style="width:20%">Is Discounted</div>
								<div class="pricetablecol" style="width:20%">Discounted Price</div>
							</div>
							<div id="subActPriceTable">
								<div class="pricetablerow" align="center">Select Activity and sub activity first</div>
							</div>
						</div>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label for="time_schedule_id">What is your price currency code? <sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
								<!-- <input type="text" style="width:200px;" name="adult_price1" id="adult_price1" /> -->
                                                <select style="background:none;border: 1px solid #999999;border-radius:0px;box-shadow:none;color:;float: none;font-size:14px;height:21px;line-height:32px;padding:0px;position:relative;width:62px;" class="validate[required] text-input" name="cur_type">
                                                    <option value=""></option>
                                                    <option value="AUD">AUD</option>
                                                    <option value="GBP">GBP</option>
                                                    <option value="CAD">CAD</option>
                                                    <option value="EUR">EUR</option>
                                                    <option value="NZD">NZD</option>
                                                    <option value="USD">USD</option>
                                                    <option value="FJD">FJD</option>
                                                    <option value="WST">WST</option>
                                                    <option value="SBD">SBD</option>
                                                    <option value="VUV">VUV</option>
                                                    <option value="TOP">TOP</option>
                                                    <option value="XPF">XPF</option>
                                                    <option value="CLP">CLP</option>
                                                </select>
						</fieldset>
						
						
						
						<fieldset style="width:99%; float:left;">
							<label for="time_schedule_id">What percentage commissionable rate do you offer? Please note, activity operators with higher commissionable rates will be featured and used in additional promotional activity to maximize sales.<sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
							<br /><br />
						&nbsp;&nbsp;&nbsp;&nbsp;%<select name="adult_comm" id="adult_comm" style="width:300px" class="validate[required] text-input" >
													<option value=""></option>
														<?php for($i=1;$i<=100;$i++){?>
														<option value="<?php echo $i;?>"><?php echo $i; ?></option>
														<?php } ?>
											</select> 
						</fieldset><div class="clear"></div>
						
						<fieldset style="width:48%; float:left;margin-right: 3%;">
							<label for="time_schedule_id">What date is your price above valid until?<sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
							 	<input type="text" id="date1" name="adult_date1" class="validate[required] text-input" readonly="readonly" style=" width:207px;">
						</fieldset><div class="clear"></div>
						
						<fieldset style="width:98% float:left; margin-right: 3%;">
						<label for="time_schedule_id">Do you have your retail prices after the date specified above? If so, please populate below, if not, leave blank.Future Adult Retail Price <sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
						<input type="radio" name="yesfuture1" value="yes" onclick="yesfuture();" style="margin-top:10px;" /> Yes.
						<input type="radio" name="yesfuture1" checked="checked" value="no" onclick="nofuture();" style="margin-top:10px;" /> No.	
						</fieldset>
						
						<div id="future_price" style="display:none">
							<fieldset style="width:98% float:left; margin-right: 3%;">
									<div class="pricetable">
										<div class="pricetablerow">
											<div class="pricetablecol" style="width:20%"></div>
											<div class="pricetablecol" style="width:10%">Time</div>
											<div class="pricetablecol" style="width:20%">Future Retail Price</div>
											<div class="pricetablecol" style="width:20%">Is Discounted</div>
											<div class="pricetablecol" style="width:20%">Discounted Price</div>
										</div>
										<div id="subActPriceTableForFuture">Select Activity and sub activity first</div>
									</div>
							
							</fieldset>
									
									 <!-- <fieldset style="width:96%; float:left;margin-right: 3%;">
										<label for="time_schedule_id">Do you have your retail prices after the date specified above? If so, please populate below, if not, leave blank.Future Adult Retail Price</label>	<br /><br /><br />
										 <input type="text" name="adult_price2" id="adult_price2" /> 
									</fieldset> -->
									
							<fieldset style="width:48%; float:left;">
								<label for="time_schedule_id">What date is the price valid until?</label>	
									<input type="text" name="adult_date2" id="date2" readonly="readonly" class="validate[required] text-input" />
							</fieldset><div class="clear"></div>
						
						</div>
					
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label for="time_schedule_id">Cheak here to add discounted date range <input type="checkbox" id="discountchkbox" name="discountchkbox" onclick="fn_toggle_discount_date_range();" /></label>
						</fieldset><div class="clear"></div>
						<div id="discountfromto" style="display:none;">
							<fieldset style="width:48%; float:left; margin-right: 3%;">
								<label for="time_schedule_id">Discounted Price Valid Form</label>
								<div class="pricetablecol"><input type="text" name="discount_from" id="discount_from" readonly="readonly" class="validate[required] text-input" /></div>
							</fieldset>
							<fieldset>
									<label for="time_schedule_id">Discount Price Valid Until</label>
									<div class="pricetablecol">
									<input type="text" name="discount_till" id="discount_till" readonly="readonly" class="validate[required] text-input" />
									<div class="pricetablecol">
							</fieldset>
						
						</div>
						
			<fieldset style="width:99%; float:left; margin-right: 3%;">
				<label style="font-size:24px">Other Pricing<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
			</fieldset><div class="clear"></div>
			<fieldset style="width:99%; float:left; margin-right: 3%;">
				<label style="height:50px">Apart from the standard Adult Price, do you have any other pricing such as child pricing, spectactor pricing, family pricing, combo deal pricing etc?<sup style="color:#FF0000;font-weight:bold;">*</sup> </label>
				<input type="radio" name="noreq" value="yes" onclick="yessure();" style="margin-top:10px;" /> Yes.
				<input type="radio" name="noreq" checked="checked" value="no" onclick="nothanks();" style="margin-top:10px;" /> No.	
						<div id="sure" style="display:none;height:auto;">
											<div class="col_row" style="height:auto;">
												<div class="col_1" style="width:auto;height:auto;">
													<span class="maintext"><strong>
														<input type="checkbox" name="childshow" id="childshow" style="margin-top:10px;" onclick="child_show();" />&nbsp;&nbsp; Child Pricing
													</strong></span>
												</div>
												 
												<div id="cp" style="display:none;width:100%;padding-left:10px">
													<div class="col_1" style="width:auto;height:auto;margin-top:5px">
														<span class="maintext" style="float:left;margin-top:10px;"><strong>Name :</strong></span>
													</div>
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
													<input type="text" name="child_price_name" value="Child Price" readonly="readonly" style="margin-top:10px; width:207px;">
														</span>
													</div>
													
													<!--<div class="col_1" style="width:auto;height:auto;">
														<span class="maintext" style="float:left;margin-top:10px;"><strong>Description :</strong></span>
													</div>
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
															<textarea name="child_desc" class="validate[required] text-input" style="margin-top:5px;  width:270px;"></textarea>
														</span>
													</div>-->
													
													
													<div class="pricetable">
														<div class="pricetablerow">
															<div class="pricetablecol" style="width:20%"></div>
															<div class="pricetablecol" style="width:10%">Time</div>
															<div class="pricetablecol" style="width:20%">Child Price</div>
															<div class="pricetablecol" style="width:20%">Is Discounted</div>
															<div class="pricetablecol" style="width:20%">Discounted Price</div> 
														</div>
														<div id="subActPriceTableForChild" >Select Activity and sub activity first</div>
													</div>
													
													<!--
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
														<input type="text" name="other[child][price]" style="margin-top:10px;  width:207px;">
														</span>
													</div>
													-->
												</div>
											</div>
	
	
											<div class="col_row" style="height:auto;width:100%;float:left">
												<div class="col_1" style="width:100%">
													<span class="maintext"><strong>
														<input type="checkbox" name="spectactor" style="margin-top:10px;" onclick="spec_show();" />&nbsp;&nbsp; Spectator Pricing
													</strong></span>
												</div>
												<div class="col_2" style="width:25%">
												</div>
												
												<div id="sp" style="display:none;width:100%;padding-left:10px">
													<div class="col_1" style="width:auto;height:auto;">
														<span class="maintext" style="float:left;margin-top:10px;"><strong>Name :</strong></span>
													</div>
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
													<input type="text" name="spectator_price_name" value="Spectator Pricing" readonly="readonly" style="margin-top:5px;  width:207px;" />
														</span>
													</div>
													
												<!--	<div class="col_1" style="width:auto;height:auto;">
														<span class="maintext"  style="float:left;margin-top:10px;"><strong>Description :</strong></span>
													</div>
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
															<textarea name="spectator_desc" class="validate[required] text-input" style="margin-top:10px;  width:270px;"></textarea>
														</span>
													</div>
													-->
													<div class="pricetable">
														<div class="pricetablerow">
															<div class="pricetablecol" style="width:20%"></div>
															<div class="pricetablecol" style="width:10%">Time</div>
															<div class="pricetablecol" style="width:20%">Spectator Price</div>
															<div class="pricetablecol" style="width:20%">Is Discounted</div>
															<div class="pricetablecol" style="width:20%">Discounted Price</div> 
														</div>
														<div id="subActPriceTableForSpectator">Select Activity and sub activity first</div>
													</div>
													
													<!--	
														
													<div class="col_1" style="width:auto;height:auto;">
														<span class="maintext" style="float:left;margin-top:10px;"><strong>Price :</strong></span>
													</div>
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
														<input type="text" name="other[spec][price]" style="margin-top:10px; width:207px;" />
														</span>
													</div>
													-->
												</div>
											</div>
	
											<div class="col_row" style="height:auto;width:100%;float:left">
												<div class="col_1" style="width:75%">
													<span class="maintext"><strong>
														<input type="checkbox"  name="familycheck" id="familycheck" style="margin-top:10px;" onclick="family_show();"/>&nbsp;&nbsp; Family Pricing
													</strong></span>
												</div>
												<div class="col_2" style="width:25%">
												</div>
												<div id="fp" style="display:none;">
													<div class="col_1" style="width:auto;height:auto;padding-left:10px">
														<span class="maintext" style="float:left;margin-top:10px;"><strong>Name :</strong></span>
													</div>
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
														<input type="text" name="family_price_name" value="Family Price" readonly="readonly" style="margin-top:10px;  width:207px;" class="validate[required]">
														</span>
													</div>
													
												<!--	<div class="col_1" style="width:auto;height:auto;">
														<span class="maintext"  style="float:left;margin-top:10px;"><strong>Description :</strong></span>
													</div>
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
															<textarea name="family_desc" class="validate[required] text-input" style="margin-top:10px;  width:270px;"></textarea>
														</span>
													</div>-->
													
													<div class="pricetable">
														<div class="pricetablerow">
															<div class="pricetablecol" style="width:20%"></div>
															<div class="pricetablecol" style="width:10%">Time</div>
															<div class="pricetablecol" style="width:20%">Family Price</div>
															<!--
															<div class="pricetablecol" style="width:20%">Is Discounted</div>
															<div class="pricetablecol" style="width:20%">Discounted Price</div> -->
														</div>
														<div id="subActPriceTableForFamily">Select Activity and sub activity first</div>
													</div>
														<!--
													<div class="col_1" style="width:auto;height:auto;">
														<span class="maintext"  style="float:left;margin-top:10px;"><strong>Price :</strong></span>
													</div>
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
														<input type="text" name="other[family][price]"  style="margin-top:10px; width:207px;" />
														</span>
													</div>
													-->
												</div>
											</div>
	
	
											<div class="col_row" style="height:auto;width:100%;float:left">
												<div class="col_1" style="width:75%">
													<span class="maintext"><strong>
														<input type="checkbox" style="margin-top:10px;" onclick="combo_show();" name="combochk"/>&nbsp;&nbsp; Combo Pricing
													</strong></span>
												</div>
												<div class="col_2" style="width:25%">
												</div>
												<div id="cdp" style="display:none;width:100%;padding-left:10px">
													<div class="col_1" style="width:75%;height:auto;">
														<span class="maintext" style="float:left;margin-top:10px;"><strong>Name :</strong></span>
													</div>
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
														<input type="text" name="combo_price_name" value="Combo Price" readonly="readonly" style="margin-top:10px;  width:207px;">
														</span>
													</div>
													
													<!--<div class="col_1" style="width:auto;height:auto;">
														<span class="maintext"  style="float:left;margin-top:10px;"><strong>Description :</strong></span>
													</div>
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
															<textarea name="combo_desc" class="validate[required] text-input" style="margin-top:10px;  width:270px;"></textarea>
														</span>
													</div>-->
													
													<div class="pricetable">
														<div class="pricetablerow">
															<div class="pricetablecol" style="width:20%"></div>
															<div class="pricetablecol" style="width:10%">Time</div>
															<div class="pricetablecol" style="width:20%">Combo Price</div>
															<div class="pricetablecol" style="width:20%">Is Discounted</div>
															<div class="pricetablecol" style="width:20%">Discounted Price</div> 
														</div>
														<div id="subActPriceTableForCombo">Select Activity and sub activity first</div>
													</div>
														
													<!--<div class="col_1" style="width:auto;height:auto;">
														<span class="maintext"  style="float:left;margin-top:10px;"><strong>Price :</strong></span>
													</div>
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
														<input type="text" name="other[combo][price]" style="margin-top:10px; width:207px;">
														</span>
													</div>-->
												</div>
											</div>
								<div class="col_row" style="width:100%;height:auto;float:left">
									<div class="col_1" style="width:100%;margin-top:10px;">
										<span class="maintext" style="margin-top:5px;">
											<strong>
												<a class="add"><img width="24" height="24" title="add input" alt="add" src="<?php echo AbstractDB::SITE_PATH;?>images/add.png"></a>
												<a class="remove"><img width="24" height="24" alt="remove input" src="<?php echo AbstractDB::SITE_PATH;?>images/remove.png"></a>
												<a class="reset"><img width="24" height="24" alt="reset" src="<?php echo AbstractDB::SITE_PATH;?>images/reset.png"></a>
											</strong>
										</span>
										<span class="maintext"><strong style="padding-bottom:10px;">More Price? </strong>	</span>
									</div>
								</div>
</div>
			</fieldset><div class="clear"></div>
			
			<fieldset style="width:99%; float:left">
							<label style="font-size:24px">Upgrade Options<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
			</fieldset><div class="clear"></div>
			
			<fieldset style="width:99%; float:left">
							<label>Do you offer upgrades such as photo packages, t-shirts etc? Let the customer know in advance so they can budget for these upgrades!<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							 <input type="radio" name="noupgrd" value="yes" onclick="yesupgrade();" /> Yes.
							 <input type="radio" name="noupgrd" value="no" checked="checked" onclick="noupgrade();" /> No.
							 <div id="upgrd" style="display:none;margin-top:15px">
								<div class="col_row" style="height:100px;">
									<div class="col_1" style="width:40%">
										<span class="maintext"><strong>Please document it here :</strong></span>
									</div>
									<div class="col_2" style="width:60%">
										<span class="maintext"><strong>
                                            <textarea style="height:80px; width:500px; margin-top:5px;" class="validate[required] text-input" name="upgrade"></textarea>
									   </strong></span>
									</div>
								</div>
							</div>
				</fieldset><div class="clear"></div>
						
			
						<!--<fieldset style="width:99%; float:left;">
							<label style="font-size:24px;"> Discount Information <sup style="color:#FF0000;font-weight:bold;">*</sup></label>
						</fieldset><div class="clear"></div>
						-->
					
						<!--<fieldset style="width:99%; float:left;">
							<label>	Do you have a discount that you would like to advertise through Activity Booker? <sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="radio" name="disc" value="yes" onclick="yesdisc();"  style="margin-top:10px;"   class="validate[required] radio"/> Yes. &nbsp; &nbsp; &nbsp;
													<input type="radio" name="disc" value="no" checked="checked" onclick="nodisc();" style="margin-top:10px;"  class="validate[required] radio"/> No.	
										
								<div id="discid" style="display:none;">
                                                <div class="col_row" style="margin-top:10px;margin-left:10px;width:100%;height:100%;">
                                                    <div class="col_1"><span class="maintext" style="float:left;width:100%;margin-top:10px;"><strong>Discounted Price:</strong></span></div>
                                                    <div class="col_2">
                                                        <span class="maintext" style="float:left;width:30%;margin-top:10px;">
                                                            <input type="text" name="discount" id="discount" />
                                                        </span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col_row" style="margin-top:10px;margin-left:10px;width:100%;height:100%;">
                                                    <div class="col_1"><span class="maintext" style="float:left;width:100%;margin-top:10px;"><strong>Discounted Price Valid From:</strong></span></div>
                                                    <div class="col_2">
                                                        <span class="maintext" style="float:left;width:30%;margin-top:10px;">
                                                            <input type="text" name="discount_from" id="discount_from" />
                                                        </span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col_row" style="margin-top:10px;margin-left:10px;margin-top:10px;">
                                                    <div class="col_1"><span class="maintext" style="float:left;width:100%;margin-top:10px;"><strong>Discounted Price Valid Until:</strong></span></div>
                                                    <div class="col_2">
                                                        <span class="maintext" style="float:left;width:30%;margin-top:10px;">
                                                            <input type="text" name="discount_till" id="discount_till" />
                                                        </span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col_row" style="margin-top:10px;">
                                                    <div class="col_1"><span class="maintext" style="float:left;width:100%;margin-left:10px;margin-top:10px;"><strong>Does this discount apply to all departure times?</strong></span></div>
                                                    <div class="col_2">
                                                        <span class="maintext" style="width:100%;float:left;">
													<input type="radio" name="disc_price_for_time" value="yes" checked="checked" onclick="apply_dicount_time(this.value);"  style="margin-top:10px;" /> Yes. &nbsp; &nbsp; &nbsp;
													<input type="radio" name="disc_price_for_time" value="no" onclick="apply_dicount_time(this.value);" style="margin-top:10px;"  class="validate[required] radio"/> No.<br>
                                                            
                                                        </span>
                                                    </div>
                                                </div>
                                                
                                                <div id="time_div" style="display:none;">
                                                    <div class="col_row" style="margin-top:10px;height:auto;">
                                                        <div class="col_1" style="width:100%"><span class="maintext" style="float:left;padding-left:10px;padding-top:10px"><strong>Please ticks the appropriate times:</strong></span></div>
                                                        <div class="col_2" style="width:25%;height:auto;">
                                                            <span class="maintext" style="float:left;padding-left:10px;padding-top:10px">
                                                                <div id="time_schedule"></div>                                                            
                                                            </span>
                                                        </div>
                                                    </div>	
                                                </div>
                                            </div>					
															
						</fieldset>--><div class="clear"></div>
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