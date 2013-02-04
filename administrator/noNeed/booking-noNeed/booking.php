<?php
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/AdminBooking.php");
require_once("../../pi_classes/Photo.php");
chkAdminLogin();
$objActivity=new AdminBooking();
$objActPhoto=new Photo();

$id = base64_decode($_GET['act_id']);
$objActivity->getActivityById($id);
$bdata=$objActivity->getAllRow();

$objActPhoto->getActivityPhotos($id);
$objActPhoto->getAllRow();
$Actphotoname=$objActPhoto->getField('photo_name');
$Actphoto=$objActPhoto->getField('image_path');

$objActivity->getActLastPriceDate($id);
$objActivity->getAllRow();
$cal = $objActivity->getField('cal_date');
$today = date("Y-m-d");
$calLastDay = (strtotime($cal) - strtotime($today)) / (60 * 60 * 24);

if(isset($_SESSION['cart'])){
	unset($_SESSION['cart']);	
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IN ADMIN PANEL | Powered by <?php echo AbstractDB::SITE_TITLE;?></title>

<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>/css/style.css" type="text/css" media="screen" />
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
		var ld = $('#calLastDay').val();
		jQuery("#date1").datepicker({minDate: 0, maxDate: '+'+ld+'D',changeMonth: true,changeYear: true,dateFormat: 'd-mm-yy',numberOfMonths:2});
		jQuery("#frm_booking").validationEngine();	
});

function restpage()
{
	var act_date = $('#date1').val();
	var id =  $('#act_id').val();
	if(act_date != '')
	{
		jQuery.ajax({
		url: "../../ajax/getAdminRecordByDate.php",
		type: "post",
		data:"act_date="+act_date+"&act_id="+id,
		success:function(response)
			{	
			$('#subs').html(response);
			}
		})
		jQuery("#frm_booking").validationEngine();	
		$('#restpage').show();
	}
	else
	{
		alert("Please enter the date");
	}
}
function timeprice(tt)
{
	var act_date = $('#date1').val();
	var ttSplitResult = tt.split("_");
	var ids=ttSplitResult[0]+"_"+ttSplitResult[1]+"_"+ttSplitResult[2];
	jQuery.ajax({
	url: "../../ajax/time_price1.php",
	type: "post",
	data:"act_date="+act_date+"&tt="+tt,
	success:function(response)
		{
			$('#timpri_'+ids).html(response);
		}
	})
}
function gotit(val)
{
	var a=0;
		$('.target').each(function() {
				  if($(this).val()>0)
				  {
					a=1;
				  }
			});
	if(a==1)
	{	
		$('select').removeClass('validate[required]');	
	}			
	else
	{
		$('select').addClass('validate[required]');
	}
}
</script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">		
		<form name="frm_booking" id="frm_booking" method="post" action="customer_info.php">
            <input type="hidden" name="act_id" id="act_id" value="<?php echo base64_decode($_REQUEST['act_id']);?>" />
            <input type="hidden" name="calLastDay" id="calLastDay" value="<?php echo $calLastDay;?>" />
            <article class="module width_full">
                <!-- <header><h3>Edit User</h3></header> -->
                <header>
                    <div style="float: left;padding: 5px 0 0 20px;">
                        <div style="font-size:16px;font-weight:bold"><?php echo stripslashes($bdata['activity_booker_name']);?>, <span><?php echo stripslashes($bdata['city_name']);?>, <?php echo stripslashes($bdata['country_name']);?></span></div>
                    </div>
                </header>
                <header>
                    <div style="float: left;padding: 5px 0 0 20px;">
                        <a href="<?php echo AbstractDB::SITE_PATH;?>admin/booking/manage_booking.php" title="Go back"><img src="<?php echo AbstractDB::SITE_PATH;?>admin/images/back_icon2.png" border="0" /></a>
                        <div style="float:right;font-size:12px;padding-left:600px">Booking Step 1 of two &nbsp;&nbsp;  1. Add to Cart  2. Checkout</div>
                    </div>
                </header>
                    <div class="module_content">
                            <fieldset style="width:96%; float:left;">
                                <span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
                            </fieldset>
                            
                            <!--<fieldset style="width:96%; float:left; margin-right: 3%;">						
                            <div style="display:inline; clear:both" >
                                <label for="chkGiftVoucher" style="width:600px;float:left"><img alt="Arvind" style="width:670px; height:390px;" src="http://192.168.2.99/p568/upload/activity/1344229891.JPG"> </label>	
                            </div>
                            </fieldset><div class="clear"></div>-->
                            
                            <fieldset style="width:96%; float:left;">
                                <label for="">Select Date of Activity<sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
                                <div class="select_box2">
                                <input type="text" name="date1" id="date1" style="float:left;padding-left:5px;background:url(../images/calender.jpg) 125px 8px no-repeat;border:0px none;width:150px;height:25px" onchange="restpage();"/>
                                    </div>
                                    <input type="button" class="choose_submit" style="background: url('../images/choose_submit.png') no-repeat scroll left top transparent;border:0 none;cursor: pointer;float: left;height:32px;width:34px;" onclick="restpage();"/>
                                    
                            </fieldset><div class="clear"></div>
                            
                        <div class="no_visable" style="display:block;" id="restpage">		
                                <fieldset style="width:96%; float:left;">
                                        <div id="subs" class="section_part"></div>
                                </fieldset><div class="clear"></div>
                                
                                <!--<fieldset style="width:96%; float:left;">
                                    <label for="">Extra Details<sup style="color:#FF0000;font-weight:bold;">*</sup></label>	
                                        <span class="sptext" style="padding-left:10px;padding-bottom:10px">My weight is under 100kgs:</span>
                                            <div class="section">
                                                <div class="option">
                                                <br />
                                                        <select class="quanty_select" name="myWeightUnder" id="myWeightUnder">
                                                        <option value="100kgs" >Select my weight is under 100kgs</option>
                                                        <option value="90kgs" >My weight is 90kgs</option>
                                                        <option value="80kgs" >My weight is 80kgs</option>
                                                        <option value="70kgs" >My weight is 70kgs</option>
                                                        </select>
                                                </div>
                                            </div>
                                </fieldset><div class="clear"></div>-->
                                <fieldset style="width:96%; float:left;">
                                    <label for="">Anything you need to tell us?</label>	
                                    <textarea rows="5" style="width:300px;" name="youNeedTellUs" id="youNeedTellUs">Additional information...</textarea>
                                </fieldset><div class="clear"></div>
                        </div>		
                    </div>
                    <div class="clear"></div>
                <footer>
                    <div class="submit_link">
                        <input type="submit" name="btnSubmit" id="btnSubmit" value="<?php if(isset($_GET['user_id'])) { ?>Update<?php }else{ ?>Submit<?php } ?>" class="alt_btn">
                        <input type="button" name="btnCancel" id="btnCancel" value="Cancel" class="btn_cancel">
                    </div>
                </footer>
            </article><!-- end of post new article -->
		</form>
		<div class="spacer"></div>
	</section>
</body>
</html>