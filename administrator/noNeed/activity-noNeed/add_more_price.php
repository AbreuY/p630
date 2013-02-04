<?php

/* ############################################################ Diwakar1.0 updated by pradip 1.0 ################################################################### */

	require_once('../../pi_classes/Admin.php');
	ob_start();
	session_start();
	$objAdd=new Admin();
	if(empty($_SESSION['admin_id'])){
		header("location:".AbstractDB::SITE_PATH."admin/login.php");
	}
	$objAddHoliday=new Admin();
	
if(isset($_POST['btnSubmit']))
{
	$objAdd->pricing_more($_POST);
	header("location:".AbstractDB::SITE_PATH."admin/activity/availabilty_list.php?user_id='".$_REQUEST['user_id']."'");
	
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
});

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
		retrive_time_schedule_future();
}
function nofuture()
{
	$("#future_price").hide();
}
function child_show()
{
	$("#cp").toggle();
	retrive_time_schedule_child();
}
function spec_show()
{
	$("#sp").toggle();
	retrive_time_schedule_spec();
}
function family_show()
{
	$("#fp").toggle();
	retrive_time_schedule_family();
}
function combo_show()
{
	$("#cdp").toggle();
	retrive_time_schedule_combo();
}
function yesupgrade()
{
	$("#upgrd").show();
}
function noupgrade()
{
	$("#upgrd").hide();
}
function yesdisc(id)
{
	$("#discount_"+id).toggle();
}


function fn_addclasstoadultdiscount(id)
{
		$('#discount_'+id).removeClass();
		$('#discount_'+id).addClass("validate[required,max["+($('#adult_price1_'+id).val()-1)+"],min[1], custom[number]] text-input");
}

function yesdisc_future(id)
{
	$("#discount_"+id+"_future").toggle();
}

function fn_addclasstofuturediscount(id)
{
	$('#discount_'+id+'_future').removeClass();
	$('#discount_'+id+'_future').addClass("validate[required,max["+($('#adult_price1_'+id+'_future').val()-1)+"],min[1], custom[number]] text-input");
}	

function yesdisc_child(id)
{
	$("#discount_"+id+"_child").toggle();
}
function fn_addclasstochilddiscount(id)
{
	$('#discount_'+id+'_child').removeClass();
	$('#discount_'+id+'_child').addClass("validate[required,max["+($('#adult_price1_'+id+'_child').val()-1)+"],min[1], custom[number]] text-input");
}

function yesdisc_spec(id)
{
	$("#discount_"+id+"_spec").toggle();
}
function fn_addclasstospecdiscount(id)
{
	$('#discount_'+id+'_spec').removeClass();	
	$('#discount_'+id+'_spec').addClass("validate[required,max["+($('#adult_price1_'+id+'_spec').val()-1)+"],min[1], custom[number]] text-input");

}
function yesdisc_family(id)
{
	$("#discount_"+id+"_family").toggle();
}
function fn_addclasstofamilydiscount(id)
{
		$('#discount_'+id+'_family').removeClass();
		$('#discount_'+id+'_family').addClass("validate[required,max["+($('#adult_price1_'+id+'_family').val()-1)+"],min[1], custom[number]] text-input");
}
function yesdisc_combo(id)
{
	$("#discount_"+id+"_combo").toggle();
}	
function fn_addclasstocombodiscount(id)
{
		$('#discount_'+id+'_combo').removeClass();
		$('#discount_'+id+'_combo').addClass("validate[required,max["+($('#adult_price1_'+id+'_combo').val()-1)+"],min[1], custom[number]] text-input");
}
function yesdisc_extra(id,id2)
{
	$("#discount_"+id+"_extra"+id2).toggle();

}
function fn_addclasstoextradiscount(id,id2)
{
		$('#discount_'+id+'_extra'+id2).removeClass();
		$('#discount_'+id+'_extra'+id2).addClass("validate[required,max["+($('#adult_price1_'+id+'_extra'+id2).val()-1)+"],min[1], custom[number]] text-input");
}


jQuery(document).ready(function(){
jQuery('.subActPriceTable').css('display','block');
					jQuery('#subActPriceTableShow').html('');
					jQuery.ajax({
						url: "../../ajax/ajax_request.php",
						type: "post",
						data:"sub_activity_id="+jQuery('#sub_act_type_id').val()+"&activity_id="+jQuery('#act_id').val()+"&action=get_time_schedule_by_activity_id_with_checkbox_more",
						success:function(msg){
							//alert(msg);
							jQuery('#time_schedule').html(msg);
						}
					});
				//retrive_time_schedule_future(sub_activity_id);
});
function retrive_time_schedule_future()
{
	jQuery.ajax({
		url: "../../ajax/ajax_request.php",
		type: "post",
		data:"sub_activity_id="+jQuery('#sub_act_type_id').val()+"&activity_id="+jQuery('#act_id').val()+"&action=get_time_schedule_by_activity_id_with_checkbox_future",
		success:function(msg){
			jQuery('#time_schedule_future').html(msg);
		}
	});
}
function retrive_time_schedule_child()
{
	jQuery.ajax({
		url: "../../ajax/ajax_request.php",
		type: "post",
		data:"sub_activity_id="+jQuery('#sub_act_type_id').val()+"&activity_id="+jQuery('#act_id').val()+"&action=get_time_schedule_by_activity_id_with_checkbox_child_more",
		success:function(msg){
			//$('#cp').show();
			jQuery('#time_schedule_child').html(msg);
		}
	});
	
}

function retrive_time_schedule_spec()
{
	jQuery.ajax({
		url: "../../ajax/ajax_request.php",
		type: "post",
		data:"sub_activity_id="+jQuery('#sub_act_type_id').val()+"&activity_id="+jQuery('#act_id').val()+"&action=get_time_schedule_by_activity_id_with_checkbox_spec_more",
		success:function(msg){
			//$('#sp').show();
			jQuery('#time_schedule_spec').html(msg);
		}
	});
	
}

function retrive_time_schedule_family()
{
	jQuery.ajax({
		url: "../../ajax/ajax_request.php",
		type: "post",
		data:"sub_activity_id="+jQuery('#sub_act_type_id').val()+"&activity_id="+jQuery('#act_id').val()+"&action=get_time_schedule_by_activity_id_with_checkbox_family_more",
		success:function(msg){
			//$('#fp').show();
			jQuery('#time_schedule_family').html(msg);
		}
	});
	
}


function retrive_time_schedule_combo()
{
	jQuery.ajax({
		url: "../../ajax/ajax_request.php",
		type: "post",
		data:"sub_activity_id="+jQuery('#sub_act_type_id').val()+"&activity_id="+jQuery('#act_id').val()+"&action=get_time_schedule_by_activity_id_with_checkbox_combo_more",
		success:function(msg){
			//$('#cdp').show();
			jQuery('#time_schedule_combo').html(msg);
		}
	});
	
}

/*jQuery(document).ready(function(){
    test = $('#lastdate').datepicker('getDate');
	alert(test);
    testm = new Date(test.getTime());
    testm.setDate(testm.getDate() + 1);

    $("#date1").datepicker("option", "minDate", testm);
});*/

jQuery(function()
{
	var ld = $('#lastdate').val();
	var nd = new Date(ld);
	var today = new Date();
	if (nd.getTime() < today.getTime())
	{
			$("#date1").datepicker({
			dateFormat: 'd-mm-yy', 
			numberOfMonths:1, 
			minDate:0,
			maxDate: '+6M',
			onSelect: function(dateText, inst){ 
							
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
	}
	else
	{
	nd.setDate(nd.getDate() + 1);
	$("#date1").datepicker({
			dateFormat: 'd-mm-yy', 
			numberOfMonths:1, 
			minDate:nd,
			maxDate: '+6M',
			onSelect: function(dateText, inst){ 
							
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
	}
		
		$( "#date2" ).datepicker({
			dateFormat: 'd-mm-yy', 
			minDate:0, 
			numberOfMonths: 1,
			maxDate: '+6M',
			onSelect: function(dateText, inst){ 
				var date =$.datepicker.parseDate('d-mm-yy', dateText); 
				//var new_min_date = $.datepicker.parseDate('yy-mm-d', dateText); 
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
			minDate:nd, 
			numberOfMonths: 1,
			maxDate: '+6M'
		});
		
		$( "#discount_from" ).datepicker({
			dateFormat: 'd-mm-yy', 
			minDate:nd, 
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

function same_as_above_future(id)
{

	var d = $('#same_as_'+id+'_future');
	if (d.is(':checked',true))
	{
		var mainpr = $('#adult_price1_0_future').val();
		$('#adult_price1_'+id+'_future').val(mainpr);
		
		var c = $('#disc_0_future');
		if (c.is(':checked',true))
		{
			var discpr = $('#discount_0_future').val();
			$('#disc_'+id+'_future').attr('checked', true);
			$('#discount_'+id+'_future').show();
			$('#discount_'+id+'_future').val(discpr);
		}
	}
	else
	{
		$('#adult_price1_'+id+'_future').val('');
		$('#disc_'+id+'_future').attr('checked', false);
		$('#discount_'+id+'_future').val('');
		$('#discount_'+id+'_future').hide();
	}
}

function same_as_above_child(id)
{

	var d = $('#same_as_'+id+'_child');
	if (d.is(':checked',true))
	{
		var mainpr = $('#adult_price1_0_child').val();
		$('#adult_price1_'+id+'_child').val(mainpr);
		
		var c = $('#disc_0_child');
		if (c.is(':checked',true))
		{
	
			var discpr = $('#discount_0_child').val();
			$('#disc_'+id+'_child').attr('checked', true);
			$('#discount_'+id+'_child').show();
			$('#discount_'+id+'_child').val(discpr);
		}

	}
	else
	{
		$('#adult_price1_'+id+'_child').val('');
		$('#disc_'+id+'_child').attr('checked', false);
		$('#discount_'+id+'_child').val('');
		$('#discount_'+id+'_child').hide();
	}
}


function same_as_above_spec(id)
{

	var d = $('#same_as_'+id+'_spec');
	if (d.is(':checked',true))
	{
		var mainpr = $('#adult_price1_0_spec').val();
		$('#adult_price1_'+id+'_spec').val(mainpr);
		
		var c = $('#disc_0_spec');
		if (c.is(':checked',true))
		{
	
			var discpr = $('#discount_0_spec').val();
			$('#disc_'+id+'_spec').attr('checked', true);
			$('#discount_'+id+'_spec').show();
			$('#discount_'+id+'_spec').val(discpr);
		}

	}
	else
	{
		$('#adult_price1_'+id+'_spec').val('');
		$('#disc_'+id+'_spec').attr('checked', false);
		$('#discount_'+id+'_spec').val('');
		$('#discount_'+id+'_spec').hide();
	}
}


function same_as_above_family(id)
{

	var d = $('#same_as_'+id+'_family');
	if (d.is(':checked',true))
	{
		var mainpr = $('#adult_price1_0_family').val();
		$('#adult_price1_'+id+'_family').val(mainpr);
		
		var c = $('#disc_0_family');
		if (c.is(':checked',true))
		{
	
			var discpr = $('#discount_0_family').val();
			$('#disc_'+id+'_family').attr('checked', true);
			$('#discount_'+id+'_family').show();
			$('#discount_'+id+'_family').val(discpr);
		}

	}
	else
	{
		$('#adult_price1_'+id+'_family').val('');
		$('#disc_'+id+'_family').attr('checked', false);
		$('#discount_'+id+'_family').val('');
		$('#discount_'+id+'_family').hide();
	}
}


function same_as_above_combo(id)
{

	var d = $('#same_as_'+id+'_combo');
	if (d.is(':checked',true))
	{
		var mainpr = $('#adult_price1_0_combo').val();
		$('#adult_price1_'+id+'_combo').val(mainpr);
		
		var c = $('#disc_0_combo');
		if (c.is(':checked',true))
		{
	
			var discpr = $('#discount_0_combo').val();
			$('#disc_'+id+'_combo').attr('checked', true);
			$('#discount_'+id+'_combo').show();
			$('#discount_'+id+'_combo').val(discpr);
		}

	}
	else
	{
		$('#adult_price1_'+id+'_combo').val('');
		$('#disc_'+id+'_combo').attr('checked', false);
		$('#discount_'+id+'_combo').val('');
		$('#discount_'+id+'_combo').hide();
	}
}



function same_as_above_extra(id,id2)
{

	var d = $('#same_as_'+id+'_extra'+id2);
	if (d.is(':checked',true))
	{
		var mainpr = $('#adult_price1_0_extra'+id2).val();
		$('#adult_price1_'+id+'_extra'+id2).val(mainpr);
		
		var c = $('#disc_0_extra'+id2);
		if (c.is(':checked',true))
		{
	
			var discpr = $('#discount_0_extra'+id2).val();
			$('#disc_'+id+'_extra'+id2).attr('checked', true);
			$('#discount_'+id+'_extra'+id2).show();
			$('#discount_'+id+'_extra'+id2).val(discpr);
		}

	}
	else
	{
		$('#adult_price1_'+id+'_extra'+id2).val('');
		$('#disc_'+id+'_extra'+id2).attr('checked', false);
		$('#discount_'+id+'_extra'+id2).val('');
		$('#discount_'+id+'_extra'+id2).hide();
	}
}




function same_as_above(id)
{
	var mainpr = $('#adult_price1_0').val();
	$('#adult_price1_'+id).val(mainpr);
	
	var c = $('#disc_0');
	if (c.is(':checked',true))
	{

		var discpr = $('#discount_0').val();
		var tg = $('#disc_'+id);
		if(tg.is(':checked',true))
		{
			$('#disc_'+id).attr('checked', false);
		}
		else
		{
			$('#disc_'+id).attr('checked', true);	
		}
		yesdisc(id);
		$('#discount_'+id).val(discpr);
	}
	else
	{
		$('#discount_'+id).val('');
		$('#disc_'+id).attr('checked', false);
	}
}



$(function() {
	var i;
		var sub_activity_id = $('#sub_act_type_id').val();
	//var i = $('#more_price').size() + 1;
	
	/* <div class="col_1" style="width:75%;height:auto;"><span class="maintext"  style="float:right;"><strong>Description :</strong></span></div><div class="col_2" style="width:25%;height:auto;"><span class="maintext"><textarea name="other[extra'+i+'][desc]" style="margin-top:5px;  width:207px;" class="validate[required]"></textarea></span></div> */
	
		$('a.add').click(function() {
		i=parseInt(jQuery("#noofotherprice").val())+1;
			$('<div id="more_price'+i+'"><div class="col_row" style="height:auto;"><div class="col_1" style="width:75%;height:auto;"><span class="maintext" style="float:right;"><strong>Name :</strong></span></div><div class="col_2" style="width:25%;height:auto;"><span class="maintext"><input type="text" name="other[extra'+i+'][name]" style="margin-top:5px;  width:207px;" class="validate[required]"></span></div><div class="col_row" style="margin-top:10px; height:auto;"><div class="pricetable" style=" border-top:none; border-bottom: 1px solid #E6E3D7;width: 98%;"><div id="time_schedule_extra'+i+'" style=" width:900px;"></div></div></div></div></div></div>').appendTo('#sure');
			
		
	jQuery.ajax({
		url: "../../ajax/ajax_request.php",
		type: "post",
		data:"id="+i+"&sub_activity_id="+sub_activity_id+"&activity_id="+jQuery('#act_id').val()+"&action=get_time_schedule_by_activity_id_with_checkbox_extra",
		success:function(msg){
	
			jQuery('#time_schedule_extra'+(i-1)).html(msg);
		}
	});
			
			i++;
			jQuery("#noofotherprice").val(i-1);
		});		

	$('a.remove').click(function()
	{
		i=parseInt(jQuery("#noofotherprice").val());
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
			<header><h3>Add More Pricing
			<font color="#0000FF"><?php 
					$objSubActDtl=clone $objAdd;
					$objSubActDtl->getSubActDtlByID($_REQUEST['sub_act_type_id']);				
					$objSubActDtl->getAllRow();
					echo $objSubActDtl->getField('activity_booker_name');
					$time_schedule_ids=explode(',',$objSubActDtl->getField('schedule_time'));
					
					$objSubac=clone $objSubActDtl;
					$objSubac->getCalender($objSubActDtl->getField('sub_activity_id'));
					$objSubac->getAllRow();
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
							<label style="font-size:24px">Pricing<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label for="time_schedule_id">Activity<sup style="color:#FF0000;font-weight:bold;">*</sup></label>				
									<input type="hidden" name="user_id" id="user_id" value="<?php echo $_REQUEST['user_id'];?>" />
									<input type="hidden"name="act_id" id="act_id" value="<?php echo $objSubActDtl->getField('activity_id'); ?> " />
                                    <input type="hidden" name="sub_act_type_id" id="sub_act_type_id" value="<?php echo $objSubActDtl->getField('id'); ?>"  />
									<input type="hidden" name="sub_act_id" id="sub_act_id" value="<?php echo $objSubActDtl->getField('sub_activity_id'); ?>"  />
									<input type="hidden" name="noofotherprice" id="noofotherprice" value="0" />
                                    <input type="hidden" name="act_type_id" id="act_type_id" value="<?php echo base64_decode($_REQUEST['sub_act_type_id']); ?>"  />
                                    <input type="hidden" name="lastdate" id="lastdate" value="<?php echo $objSubac->getField('cal_date'); ?>" />
                                    <input type="hidden" name="other[adult_price1][desc]" value="<?php echo $objSubActDtl->getField('rec_name'); ?>"  />
									<input type="text" id="activity_name" name="activity_name" readonly="readonly"
                                     value="<?php echo $objSubActDtl->getField('activity_booker_name'); ?>"/>  
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label for="time_schedule_id">Sub-Activity<sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
								 <div id="subact">
							<input type="text" readonly="readonly" id="sub_activity_name" name="sub_activity_name" 
                            value="<?php echo $objSubActDtl->getField('sub_activity_name'); ?> " /> 	
								</div>
						</fieldset><div class="clear" ></div>
						
						<fieldset style="width:48%; float:left;">
							<label for="capacity">Capacity<sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
								<input type="text" id="capacity" class="validate[required,custom[number]] text-input" name="capacity" 
                                style="width:350px;" value="<?php echo $objSubac->getField('capacity'); ?>" />
								
 						</fieldset><div class="clear"></div>
						
<fieldset style="width:98% float:left; margin-right: 3%;">
<label for="time_schedule_id">What is your adult retail price ?<sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
<div id="time_schedule" style=" width:945px;">
</div>
</fieldset>
						
						<fieldset style="width:48%; float:left;margin-right: 3%;">
							<label for="time_schedule_id">What date is your price above valid until?<sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
							 	<input type="text" id="date1" name="adult_date1" class="validate[required] text-input" readonly="readonly" style=" width:207px;">
						</fieldset><div class="clear"></div>
						
						<fieldset style="width:98% float:left; margin-right: 3%;">
						<label for="time_schedule_id" style="width:940px;">Do you have your retail prices after the date specified above? If so, please populate below, if not, leave blank.Future Adult Retail Price <sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
						<input type="radio" name="yesfuture1" value="yes" onclick="yesfuture();" style="margin-top:10px;" /> Yes.
						<input type="radio" name="yesfuture1" checked="checked" value="no" onclick="nofuture();" style="margin-top:10px;" /> No.	
						</fieldset>
						
						<div id="future_price" style="display:none">
							<fieldset style="width:98% float:left; margin-right: 3%;">
													<div class="pricetable" style=" border-top:none; border-bottom: 1px solid #E6E3D7;width: 98%;">
														<div id="time_schedule_future" style=" width:950px;"></div>
													</div>
							
							</fieldset>
									
									
							<fieldset style="width:48%; float:left;">
								<label for="time_schedule_id">What date is the price valid until?</label>	
									<input type="text" name="adult_date2" id="date2" readonly="readonly" class="validate[required] text-input" />
							</fieldset><div class="clear"></div>
						
						</div>
					
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label for="time_schedule_id"   style="width:940px;">Cheak here to add discounted date range <input type="checkbox" id="discountchkbox" name="discountchkbox" onclick="fn_toggle_discount_date_range();" /></label>
						</fieldset><div class="clear"></div>
                        
						<div id="discountfromto" style="display:none;">
							<fieldset style="width:48%; float:left; margin-right: 3%;">
								<label for="time_schedule_id">Discounted Price Valid Form</label>
								<div class="pricetablecol"><input type="text" name="discount_from" id="discount_from" readonly="readonly" class="validate[required] text-input" />
                                </div>
							</fieldset>
							<fieldset  style="width:48%; float:right;">
									<label for="time_schedule_id">Discount Price Valid Until</label>
									<div class="pricetablecol">
									<input type="text" name="discount_till" id="discount_till" readonly="readonly" class="validate[required] text-input" />
									</div>
							</fieldset>
						
						</div>
						
			<fieldset style="width:99%; float:left; margin-right: 3%;">
				<label style="font-size:24px; width:940px;">Other Pricing<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
			</fieldset><div class="clear"></div>
			<fieldset style="width:99%; float:left; margin-right: 3%;">
				<label style="height:50px; width:940px;">Apart from the standard Adult Price, do you have any other pricing such as child pricing, spectactor pricing, family pricing, combo deal pricing etc?<sup style="color:#FF0000;font-weight:bold;">*</sup> </label>
				<input type="radio" name="noreq" value="yes" onclick="yessure();" style="margin-top:10px;" /> Yes.
				<input type="radio" name="noreq" checked="checked" value="no" onclick="nothanks();" style="margin-top:10px;" /> No.	
						<div id="sure" style="display:none;height:auto;">
											<div class="col_row" style="height:auto;">
												<div class="col_1" style="width:auto;height:auto;">
													<span class="maintext"><strong>
														<input type="checkbox" name="child" id="child" style="margin-top:10px;" onclick="child_show();" />&nbsp;&nbsp; Child Pricing
													</strong></span>
												</div>
												 
												<div id="cp" style="display:none;width:100%;padding-left:10px">
													<div class="col_1" style="width:auto;height:auto;margin-top:5px">
														<span class="maintext" style="float:left;margin-top:10px;"><strong>Name :</strong></span>
													</div>
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
													<input type="text" name="other[child][name]" value="Child Price" readonly="readonly" style="margin-top:10px; width:207px;">
														</span>
													</div>
													
													<!--<div class="col_1" style="width:auto;height:auto;">
														<span class="maintext" style="float:left;margin-top:10px;"><strong>Description :</strong></span>
													</div>
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
															<textarea  name="other[child][desc]" class="validate[required] text-input" style="margin-top:5px;  width:270px;"></textarea>
														</span>
													</div>-->
													
													<div class="pricetable" style=" border-top:none; border-bottom: 1px solid #E6E3D7;width: 98%;">
														<div id="time_schedule_child" style=" width:900px;"></div>
													</div>
													
												</div>
											</div>
	
	
											<div class="col_row" style="height:auto;width:100%;float:left">
												<div class="col_1" style="width:100%">
													<span class="maintext"><strong>
														<input type="checkbox" name="spec" style="margin-top:10px;" onclick="spec_show();" />&nbsp;&nbsp; Spectator Pricing
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
													<input type="text"  name="other[spec][name]"  value="Spectator Price" readonly="readonly" style="margin-top:5px;  width:207px;" />
														</span>
													</div>
													
													<!--<div class="col_1" style="width:auto;height:auto;">
														<span class="maintext"  style="float:left;margin-top:10px;"><strong>Description :</strong></span>
													</div>
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
															<textarea name="other[spec][desc]" class="validate[required] text-input" style="margin-top:10px;  width:270px;"></textarea>
														</span>
													</div>-->
													
													<div class="pricetable" style=" border-top:none; border-bottom: 1px solid #E6E3D7;width: 98%;">
														<div id="time_schedule_spec" style=" width:900px;"></div>
													</div>

												</div>
											</div>
	
											<div class="col_row" style="height:auto;width:100%;float:left">
												<div class="col_1" style="width:75%">
													<span class="maintext"><strong>
														<input type="checkbox"  name="family" id="familycheck" style="margin-top:10px;" onclick="family_show();"/>&nbsp;&nbsp; Family Pricing
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
														<input type="text" name="other[family][name]" value="Family Price" readonly="readonly" style="margin-top:10px;  width:207px;" class="validate[required]">
														</span>
													</div>
													
													<!--<div class="col_1" style="width:auto;height:auto;">
														<span class="maintext"  style="float:left;margin-top:10px;"><strong>Description :</strong></span>
													</div>
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
															<textarea name="other[family][desc]" class="validate[required] text-input" style="margin-top:10px;  width:270px;"></textarea>
														</span>
													</div>-->
													
													<div class="pricetable" style=" border-top:none; border-bottom: 1px solid #E6E3D7;width: 98%;">
														<div id="time_schedule_family" style=" width:900px;"></div>
													</div>
												</div>
											</div>
	
	
											<div class="col_row" style="height:auto;width:100%;float:left">
												<div class="col_1" style="width:75%">
													<span class="maintext"><strong>
														<input type="checkbox" name="combo" style="margin-top:10px;" onclick="combo_show();" name="combochk"/>&nbsp;&nbsp; Combo Pricing
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
														<input type="text" name="other[combo][name]" value="Combo Price" readonly="readonly" style="margin-top:10px;  width:207px;">
														</span>
													</div>
													
													<!--<div class="col_1" style="width:auto;height:auto;">
														<span class="maintext"  style="float:left;margin-top:10px;"><strong>Description :</strong></span>
													</div>
													<div class="col_2" style="width:auto;height:auto;">
														<span class="maintext">
															<textarea name="other[combo][desc]" class="validate[required] text-input" style="margin-top:10px;  width:270px;"></textarea>
														</span>
													</div>-->
													
													<div class="pricetable" style=" border-top:none; border-bottom: 1px solid #E6E3D7;width: 98%;">
														<div id="time_schedule_combo" style=" width:900px;"></div>
													</div>
														
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