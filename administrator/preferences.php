<?php
require_once("../pi_classes/commonSetting.php");
chkAdminLogin($_SESSION['adminID']);
require_once("../pi_classes/Supplier.php");
$objPref=new Supplier;	
$user_id=base64_decode($_REQUEST['user_id']);

if(isset($_POST['btnAddPreferenceDtl']))
{
	$objPref->addAdminPrefer($_POST);
	header("location:preferences.php?user_id=".base64_encode($_REQUEST['user_id']));
}
if(isset($_POST['btnEditPreferenceDtl']))
{
	$objPref->updateAdminPrefer($_POST);
	header("location:preferences.php?user_id=".base64_encode($_REQUEST['user_id']));
}
$objPref->getAdminPrefer($user_id);	
$objPref->getAllRow();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.validate.js" language="javascript" type="text/javascript"></script>

<script type="text/javascript">
jQuery(document).ready(function(){	

		jQuery("#frmPreferences").validate({		
		errorElement:'div',
		rules: { 		
			contact_prefer:{
				required: true 
			},
			book:{
				required: true 
			},
			cut_off:{
				required: true 
			},
			more_48_val:{
				required: ( $("input:radio[name='cut_off']").val() == 'more_48' )?true:false,
				integer:true,
				min:3,
				max:10
			},
			newbook:{
				required: true 
			},
			require:{
				required: true 
			},
			cancel:{
				required: true 
			}
	    },
		messages: { 		
			contact_prefer:{
				required: "Please choose option" 
			},
			book:{
				required: "Please select option" 
			},
			cut_off:{
				required: "Please select option" 
			},
			more_48_val:{
				required: "Please enter day",
				integer:"Please enter numeric value",
				min:"Minimum value is 3",
				max:"Maximum value is 10"
			},
			newbook:{
				required: "Please select option" 
			},
			require:{
				required: "Please select option" 
			},
			cancel:{
				required: "Please select option" 
			}
	   }	
	});
	
	$.validator.addMethod('integer', function(value, element, param) {
            return (value != 0) && (value == parseInt(value, 10));
       }, 'Please enter a non zero integer value!');
	
	var discval =$("input:radio[name='cancel']:checked").val();
	if(discval != '48' && discval != '24')
	{
		$('#show2').show();
		$('#show3').show();
		$("#show1").hide();
	}
	else
	{
		$('#show2').hide();
		$('#show3').hide();
		$("#show1").show();
	}
	
	if($('input[name=cut_off][value=more_48]:checked').length){
		jQuery('#more_48_val_txt_div').css('display','block');
	}else{
		jQuery('#more_48_val_txt_div').css('display','none');
	}
		
	$('input:radio[name=cut_off]').click(function(){
		if($('input[name=cut_off][value=more_48]:checked').length){
			jQuery('#more_48_val_txt_div').css('display','block');
		}else{
			jQuery('#more_48_val_txt_div').css('display','none');
		}
	});	
	
});
	
function showother()
{
	$("#show1").hide();
	$("#show2").show();
	$("#show3").show();
}
function noshowother()
{
	$("#show1").show();
	$("#show2").hide();
	$("#show3").hide();

}	

</script>
<script type="text/javascript">
 function CountLeft(field, count, max)
 {
 	if (field.value.length > max)
 	field.value = field.value.substring(0, max);
 	else
 	count.value = max - field.value.length;
 }
 </script> 
<title>Supplier Prefeneces</title>
</head>
<body>
	<?php include("header.php");?>	
	<?php include("menu.php");?>
		<section id="main" class="column">		
		<form name="frmPreferences" id="frmPreferences" method="post">
        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" />
		<article class="module width_full" style="width:95%">	
			<?php include("supplier_menu.php");?>
		<header><h3 class="tabs_involved">Preference</h3>
		</header>
		<div class="module_content">
							<!--<fieldset style="width:100%; float:left;">
								<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
							</fieldset><div class="clear"></div>-->
							
                            <fieldset style="width:100%; float:left;">
								<p class="paragraph">Our preference is for all suppliers to be contacted of new bookings via e-mail. If your e-mails are not regulary checked at least once per day, we would therefore look to contact you by skype or phone. How do you want to be notified of new bookings?</p>
                                <div class="preference_page_list">
                                	<div class="preference_page_col1">
										<input type="checkbox" name="contact_prefer[]" <?php if($objPref->getField('email')){ echo "checked=checked";}?> value="email" />
                                     </div>
                                     <div class="preference_page_col2">
                                     	<strong> E-mail. If selected, please confirm e-mail</strong>
                                     </div>
                                </div>
                                <div class="preference_page_list">
                                	<div class="preference_page_col1">
                                    	<input type="checkbox" name="contact_prefer[]" <?php if($objPref->getField('phone')){ echo "checked=checked";}?> value="phone" />
                                    </div>
                                    <div class="preference_page_col2">
                                    	<strong>Phone If selected, please confirm phone</strong>
                                    </div>
                                </div>
    							<div class="preference_page_list">
                                	<div class="preference_page_col1">
    									<input type="checkbox"  name="contact_prefer[]" <?php if($objPref->getField('skype')){ echo "checked=checked";}?>  value="skype" />
                                    </div>
                                    <div class="preference_page_col2">
                                    	<strong>Skype If selected, please confirm skype</strong>
                                    </div>
                                </div>
							</fieldset><div class="clear"></div>
                            
                            <fieldset style="width:100%; float:left;">
								<p class="paragraph">When a customer books through Activity Booker, is your preference for: (mark with an x in left hand box)</p>
                                <div class="preference_page_list">
                                	<div class="preference_page_col1">
										<input type="radio" name="book" value="deposit" <?php if($objPref->getField('book')=='deposit'){ echo "checked=checked";}?> />
                                    </div>
                                    <div class="preference_page_col2"><strong>The customer to book with a deposit equivalent to the commission we receive and
		the remainder paid by the customer on the day. We store customer card details to enable the balance to be processed in
		the event of a no show or cancellation within the Terms and Conditions.</strong>
        </div>
                                </div>
                                <div class="preference_page_list">
                                	<div class="preference_page_col1">
                                    	<input type="radio" name="book" value="full_balance" <?php if($objPref->getField('book')=='full_balance'){ echo "checked=checked";}?> /> 
                                    </div>
                                    <div class="preference_page_col2">
	                                    <strong>Full Balance taken by Activity Booker and the balance minus the commission paid at the months end.</strong>
                                    </div>
                                </div>
							</fieldset><div class="clear"></div>
							
							<fieldset style="width:100%; float:left;">
							
							<p class="paragraph"> We can also market your activity as a gift purchase for those seeking a gift for someone special. Do you accept open ended gift vouchers valid for a period of up to 12 months from date of issue?</p>
							
							 <div class="preference_page_list">
                                	<div class="preference_page_col1">
										<input type="radio" name="asgift" value="yes"  style="margin-top:10px;"   <?php if($objPref->getField('asgift')=='Yes'){ echo "checked=checked";}?> /> <strong>Yes</strong>
                                    </div><br /><br />
									<div class="preference_page_col1">
										<input type="radio" name="asgift" value="no"  style="margin-top:10px;" <?php if($objPref->getField('asgift')=='No'){ echo "checked=checked";}?> /><strong>No</strong>
                                    </div>
								</div>
									
							
							
							</fieldset><div class="clear"></div>
                            
                            <fieldset style="width:100%; float:left;">
								<p class="paragraph">What is your cut off for receiving new bookings?</p>
                                <div class="preference_page_list">
                                	<div class="preference_page_col1">
										<input type="radio" name="cut_off" value="more_48" <?php if($objPref->getField('cut_off')=='more_48'){ echo "checked=checked";}?> />
                                    </div>
                                    <div class="preference_page_col2">
                                    	<span style="float:left;"><b>More than 48 hours notice required - please enter number of days here:</b><span id="more_48_val_txt_div" style="display:none;float: right; padding: 0 5px; width: 85px;"><input type="text" name="more_48_val" id="more_48_val" value="<?php echo ($objPref->getField('cut_off_value')/24);?>" style="width:50px;" /></span>
                                    	</span>
       								</div>
                                </div>
                                <div class="preference_page_list">
                                	<div class="preference_page_col1">
                                    	<input type="radio" name="cut_off" value="48" <?php if($objPref->getField('cut_off')=='48'){ echo "checked=checked";}?> />
                                    </div>
                                    <div class="preference_page_col2">
	                                    <strong>48 hours.</strong>
                                    </div>
                                </div>
                                <div class="preference_page_list">
                                	<div class="preference_page_col1">
                                    	<input type="radio" name="cut_off" value="24" <?php if($objPref->getField('cut_off')=='24'){ echo "checked=checked";}?> />
                                    </div>
                                    <div class="preference_page_col2">
	                                    <strong>24 hours.</strong>
                                    </div>
                                </div>
                                <div class="preference_page_list">
                                	<div class="preference_page_col1">
                                    	<input type="radio" name="cut_off" value="1" <?php if($objPref->getField('cut_off')=='1'){ echo "checked=checked";}?> />
                                    </div>
                                    <div class="preference_page_col2">
	                                    <strong>We will take bookings right up until the time of departure</strong>
                                    </div>
                                </div>
							</fieldset><div class="clear"></div>
                            
                            
                            <fieldset style="width:100%; float:left;">
								<p class="paragraph">When receiving a new booking from us, do you prefer to:</p>
                                <div class="preference_page_list">
                                	<div class="preference_page_col1">
										<input type="radio" name="newbook" value="accept_decline" <?php if($objPref->getField('newbook')=='accept_decline'){ echo "checked=checked";}?> />
                                    </div>
                                    <div class="preference_page_col2"><strong>Check your availability and "accept" or "decline" the booking</strong>
        </div>
                                </div>
                                <div class="preference_page_list">
                                	<div class="preference_page_col1">
                                    	<input type="radio" name="newbook" value="free_sell" <?php if($objPref->getField('newbook')=='free_sell'){ echo "checked=checked";}?> />
                                    </div>
                                    <div class="preference_page_col2">
	                                    <strong>Free-sell: Treat all bookings from Activity Booker as confirmed.</strong>
                                    </div>
                                </div>
							</fieldset><div class="clear"></div>
                            
                            
                            <fieldset style="width:100%; float:left;">
								<p class="paragraph">When customers arrive to conduct your activity, do they require:</p>
                                <div class="preference_page_list">
                                	<div class="preference_page_col1">
										<input type="radio" name="require" value="voucher" <?php if($objPref->getField('require')=='voucher'){ echo "checked=checked";}?> />
                                    </div>
                                    <div class="preference_page_col2"><strong>A printed voucher. An auto-generated voucher can be included in the confirmation e-mail to the customer from Activity when 	a new booking is made. See Appendix 1 for voucher template</strong>
        </div>
                                </div>
                                <div class="preference_page_list">
                                	<div class="preference_page_col1">
                                    	<input type="radio" name="require" value="verbally" <?php if($objPref->getField('require')=='verbally'){ echo "checked=checked";}?> />
                                    </div>
                                    <div class="preference_page_col2">
	                                    <strong>To be able to verbally quote a booking number</strong>
                                    </div>
                                </div>
                                <div class="preference_page_list">
                                	<div class="preference_page_col1">
                                    	<input type="radio" name="require" value="nothing" <?php if($objPref->getField('require')=='nothing'){ echo "checked=checked";}?> />
                                    </div>
                                    <div class="preference_page_col2">
	                                    <strong>Nothing - just bring themselves!</strong>
                                    </div>
                                </div>
							</fieldset><div class="clear"></div>
                            
                            
                            <fieldset style="width:100%; float:left;">
								<p class="paragraph">What is your cancellation policy? (this must reflect the cancellation policy on your website)</p>
                                <div class="preference_page_list">
                                	<div class="preference_page_col1">
										<input type="radio" name="cancel" value="24" <?php if($objPref->getField('cancel')=='24'){ echo "checked=checked";}?> onclick="noshowother();"  />
                                    </div>
                                    <div class="preference_page_col2"><strong>No refund for cancellations within 24 hours</strong>
        </div>
                                </div>
                                <div class="preference_page_list">
                                	<div class="preference_page_col1">
                                    	<input type="radio" name="cancel" value="48" <?php if($objPref->getField('cancel')=='48'){ echo "checked=checked";}?> onclick="noshowother();" />
                                    </div>
                                    <div class="preference_page_col2">
	                                    <strong>No refund for cancellation within 48 hours</strong>
                                    </div>
                                </div>
                                <div class="preference_page_list">
                                	<div class="preference_page_col1">
                                    	<input type="radio" id="cancel_other" name="cancel" value="other" <?php if($objPref->getField('cancel')!='48' and $objPref->getField('cancel')!='24'){ echo "checked=checked";}?> onclick="showother();" />
                                    </div>
                                    <div class="preference_page_col2">
	                                    <span id="show1"><strong>Other</strong></span>
                                        <span id="show2" style="display:none;"><strong>Other <br /><br />
										Enter the No days:&nbsp;&nbsp;<br /><input type="text" style="width:50px;" id="noofcancelday" name="noofcancelday" value="<?php echo ($objPref->getField('cancel')/24);?>" /></span>
										</strong></span><br />	
										<span id="show3" style="display:none;"><strong>		<br />	
										please document here:</strong> <br />
	                                    	<textarea name="othertext" style="width:400px; height:70px;" ><?php echo $objPref->getField('cancel_discription');?></textarea>
                                        </span>
                                    </div>
                                </div>
							</fieldset><div class="clear"></div>		
				</div><div class="clear"></div>
		<footer>
            <div class="submit_link">
                <?php if($objPref->numofrows()==0){ ?>
                <input type="submit" value="Submit" id="btnAddPreferenceDtl" name="btnAddPreferenceDtl" class="btn3 admin-btn1 admin-btn" style="padding-bottom: 3px;" />
                <?php }else{ ?>
                <input type="submit" value="Update" id="btnEditPreferenceDtl" name="btnEditPreferenceDtl" class="btn3 admin-btn1 admin-btn" style="padding-bottom: 3px;" />
                <?php } ?>
            </div>
		</footer>
		</div>
</article><!-- end of post new article -->
</form>
	<div class="spacer"></div>
</section>
</body>
</html>