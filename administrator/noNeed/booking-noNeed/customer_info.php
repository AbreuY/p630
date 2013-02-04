<?php
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/AdminBooking.php");
chkAdminLogin();
$objActivity=new AdminBooking();
$SubObj=clone  $objActivity;
$id = $_POST['act_id'];
$objActivity->getActivityById1($id);
$bdata=$objActivity->getAllRow();

/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
/*$act_id=$_POST['act_id'];
$objActivity->getSubactivitybyid1($_POST);
while($res = $objActivity->getRow())
$objActSession=clone $objActivity;
*/
if(isset($_POST['btnSubmit']))
{
	$_SESSION['act_id']=$_POST['act_id'];
	if(isset($_SESSION["activity".$_POST['act_id']]))
	{	
		unset($_SESSION["activity".$_POST['act_id']]);
	}
foreach($_POST[$_POST['act_id']] as $sub_act_id=>$pricing)
{
	foreach($pricing as $priceTypeID=>$priceTypeDtl)
	{
		//echo $priceTypeID;
		/*echo "<pre>";
		print_r($priceTypeDtl);
		echo "</pre>";*/
		if($priceTypeDtl['qty']==0)
		{
		}
		else
		{
			$_SESSION["activity".$_POST['act_id']][$sub_act_id][$priceTypeID]['qty']=$priceTypeDtl['qty'];
			$_SESSION["activity".$_POST['act_id']][$sub_act_id][$priceTypeID]['price']=$priceTypeDtl['price'];
			$_SESSION["activity".$_POST['act_id']][$sub_act_id][$priceTypeID]['ct']=$priceTypeDtl['ct'];
			$timearr = explode("_",$priceTypeDtl['time']);
			$time_id=$timearr[3];//Getting the time id
			$_SESSION["activity".$_POST['act_id']][$sub_act_id][$priceTypeID]['time']=$time_id;
		}
	}	
}
			$_SESSION['date']=$_POST['date1'];
			$_SESSION['youNeedTellUs']=$_POST['youNeedTellUs'];
			/*echo "<pre>";
			print_r($_SESSION);
			echo "</pre>";*/
}		
elseif(isset($_POST['btnSubmitBooking']))
{	
	$objActivity->Booking($_POST);
	$_SESSION['msg']["booking_success"]="Activity booking successful.";
	header("location:manage_booking.php");
}
/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

*//*echo "<pre>";
print_r($_SESSION[$_POST['act_id']]);
echo "</pre>";
extract($_POST);
#~@~Variables:
		$activity_id   = $act_id;
		$activity_img  = $activity_img; 
		$myWeightUnder = $myWeightUnder;
		$youNeedTellUs = $youNeedTellUs;
		$activity_date = $date1;			 
		
		$openDateGiftVoucher = $openDateGiftVoucher;
	#~@~Activity Infomation:
		#clone:
		$objActInfo = clone $objActivity;
		$objActInfo->getActivityById($activity_id);
		$actData    = $objActInfo->getAllRow();
		
	#~*~Check whether response already added to cart or not 
		foreach($_SESSION['cart'] as $key => $value)
		{
			$cart_res_id_array[]=$value['cart_act_id'];
		} 
	#~If start:
			
	#~Keep-Basket-Count:
	if(isset($_SESSION['cart_cnt']))
	{	
			$_SESSION['cart_cnt'] = $_SESSION['cart_cnt']+1;			
			$index_no			  = $_SESSION['cart_cnt'];
			$_SESSION['countItem']+=1;
	}
	else
	{					
		$_SESSION['cart_cnt'] = 0;
		$index_no= $_SESSION['cart_cnt'];	
		$_SESSION['countItem']= 1;
	}			
	#~Keep-Activity-Info_In-Basket:
	$is = $_POST['subcount'];

	for($i=0;$i<$is;$i++)
	{
		$isd = $_POST['subi_'.$i];
		$SubObj->getSubActivityTypeDtl($isd);
		$SubObj->getAllRow();
		$subname = $SubObj->getField('sub_activity_name');	
		foreach($_POST[$isd] as $subn=>$sub)
		{
			$SubObj->getSubActivityDetail($subn);
			$SubObj->getAllRow();
			$subna = $SubObj->getField('sub_activity_name');
			$j=0;							
			foreach($sub as $recn=>$rec)
			{
				$pos = explode("_",$rec['time']);
				$tie = $pos[0];
				$price = $rec['qty']*$rec['price'];											
				if($rec['qty'] > 0)
				{
					$_SESSION['cart'][$index_no]['cart_elements'][$isd][$subn][$recn]['unit_price'] = $rec['price'];
					$_SESSION['cart'][$index_no]['cart_elements'][$isd][$subn][$recn]['price'] = $price;
					$_SESSION['cart'][$index_no]['cart_elements'][$isd][$subn][$recn]['qty'] = $rec['qty'];
					$_SESSION['cart'][$index_no]['cart_elements'][$isd][$subn][$recn]['ct'] = $rec['ct'];
					$_SESSION['cart'][$index_no]['cart_elements'][$isd][$subn][$recn]['time'] = $tie;
					$_SESSION['cart'][$index_no]['cart_elements'][$isd][$subn][$recn]['desc'] = $subna;
					$_SESSION['cart'][$index_no]['cart_elements'][$isd][$subn][$recn]['subname'] = $subname;
					$_SESSION['cart'][$index_no]['cart_elements'][$isd][$subn][$recn]['otrid'] = $j;
					
					$_SESSION['cart'][$index_no]['cart_act_id']	   = $actData['activity_id'];
					$_SESSION['cart'][$index_no]['cart_act_id_enc']	= base64_encode($actData['activity_id']);
					$_SESSION['cart'][$index_no]['cart_act_title'] = $actData['activity_booker_name'];
					$_SESSION['cart'][$index_no]['cart_act_img']   = $activity_img;
					$_SESSION['cart'][$index_no]['cart_act_bkdate']   	   = $activity_date;
					$_SESSION['cart'][$index_no]['cart_act_myWeightUnder'] = $myWeightUnder;
					$_SESSION['cart'][$index_no]['cart_act_youNeedTellUs'] = $youNeedTellUs;
					$_SESSION['cart'][$index_no]['cart_act_openDateGiftVoucher'] = $openDateGiftVoucher;
					$j++;
				}
			}
		}
	}

	#~Terminate The Page:			
	/*$_SESSION['cart'] = array_values($_SESSION['cart']);
	echo 'Last <pre>';
	print_r($_SESSION['cart']);
	echo '</pre>';*/
/*	
	echo "<hr>";
	echo "<pre>";
		print_r($_POST);
	echo "</pre>";
*/	
	
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
jQuery(document).ready(function() {
	jQuery("#frmCustomerInfo").validate({
		errorElement:'div',
		rules: {
			cusroemt: {
				required: true
			},
			currancy_type: {
				required:true
			}
			
		},
		messages: {
			cusroemt:{
				required:"Please select user"
			},
			currancy_type: {
				required:"Please select user"
			}
		}
	});
	
	jQuery('#btnCancel').click(function(){
		location.href="manage_booking.php";
	});
});

function get_customer_card_dtl(cust_id){
	jQuery.ajax({
		type:'post',
		url:'../ajax/ajax_request.php',
		data:'cust_id='+cust_id+'&action=get_customer_card',
		success:function(data){
			jQuery('#customer_card_div').html(data);	
		}
	});
}

function set_card_details(div_no){			
	if(jQuery('#use_card_dtl_'+div_no).is(":checked")){
		jQuery('#card_type').val(jQuery('#use_card_type_'+div_no).val());
		jQuery('#card_holder_name').val(jQuery('#use_card_holder_name_'+div_no).val());
		jQuery('#card_no').val(jQuery('#use_card_no_'+div_no).val());
		jQuery('#month').val(jQuery('#use_month_'+div_no).val());
		jQuery('#year').val(jQuery('#use_year_'+div_no).val());
	}
	else
	{
		jQuery('#card_type').val();
		jQuery('#card_holder_name').val();
		jQuery('#card_no').val();
		jQuery('#month').val();
		jQuery('#year').val();
	}	
}
</script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>
	<section id="main" class="column">
		<form name="frmCustomerInfo" id="frmCustomerInfo" method="post">
		<input type="hidden" id="edit_id" name="edit_id" value="<?php echo $_GET['sub_cat_id'];?>" />
		<input type="hidden" name="old_sub_cat_name" id="old_sub_cat_name" value="<?php echo $pk_name[0]['sub_cat_name'];?>" />
		<input type="hidden" name="action_type" id="action_type" value="<?php if($_GET['sub_cat_id']){ echo "edit"; }else{ echo "add"; };?>" />
		<article class="module width_full">
			<header><h3>Customer Information</h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/booking/manage_booking.php" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						
						<fieldset>
							<label>Booking Detail </label>
						<fieldset style="margin:0 10px 0px 10px;">
						<div>
							<div style="width: 84px;float: left;height: 60px;position: relative; padding-left:20px">
							 <img src="<?php echo AbstractDB::SITE_PATH.'phpThumbnail/phpThumb.php?src=../upload/activity/thumbnail/'.$bdata['image_path'].'&w=100&h=140'; ?>" border="0" /> 
								</div>
							<div style="float: left;font-size: 24px;color: #525252;margin-left:20px; padding: 0px 20px 5px 10px;width: 720px;"><?php echo $bdata['activity_booker_name'];?></div>
								
							<div style="float: left;font-size: 16px;color: #525252;margin-left:20px; padding: 0px 20px 10px 10px;width: 720px;"><?php echo $bdata['country_name'];?>,<?php echo $bdata['city_name'];?>
							</div>
						<?php
						
							
							
							
						
						$activity_total_price=0;
						foreach($_POST[$_POST['act_id']] as $sub_act_id=>$pricing)
						{
							$objSubActDtl=clone $objActivity; //Geeting the sub activity Name
							$objSubActDtl->getSubActDtl($sub_act_id);
							$subActDtl=$objSubActDtl->getAllRow();
						?>
							<div style="float: left;font-size: 16px;color: #525252;margin-left:20px; padding: 0px 20px 10px 10px;width: 790px;"><?php echo $subActDtl['sub_activity_name'];?>
							</div>
						<?php 
							$sub_act_tot_price=0;
							foreach($pricing as $priceTypeID=>$priceTypeDtl)
							{
							
								if($priceTypeDtl['qty']==0)
								{
								}
								else
									
								{
									$totprice=floatval($priceTypeDtl['qty'])*floatval($priceTypeDtl['price']);
									$sub_act_tot_price=$sub_act_tot_price+$totprice;
									
									$objPriceTypeDtl=clone $objActivity;
									$objPriceTypeDtl->getPriceTypeDtl($_POST['act_id'],$sub_act_id,$priceTypeID,$priceTypeDtl['time']);
									$arrPriceDtl=$objPriceTypeDtl->getAllRow();
						?>	
							<div style="float: left;font-size: 14px;margin-left:20px; padding: 0px 0px 5px 10px;width: 720px;"><?php echo $priceTypeDtl['qty'];?> x <?php echo $arrPriceDtl['price_type_name']; ?> @ <?php echo $arrPriceDtl['hour'].":".$arrPriceDtl['minute']." ".$arrPriceDtl['schedule_at'];?> <?php echo $priceTypeDtl['ct'];?> <?php echo $arrPriceDtl['currency_symbol'];?><?php echo $priceTypeDtl['price'];?> </div>
							
						<?php
								}
							}
							?>
								
							<div style="float: right;font-size: 14px;margin-left:100px; padding: 0px 0px 5px 10px;width: 720px;">SubTotal: <?php echo $priceTypeDtl['ct'];?> <?php echo $arrPriceDtl['currency_symbol'];?><?php  echo $sub_act_tot_price;?> </div>
							<?php 
							$activity_total_price=$activity_total_price+$sub_act_tot_price;
						}
						
						?>	
						
							<div style="float: left;font-size: 14px;margin-left:20px; padding: 0px 0px 5px 10px;width: 720px;"><b>Date: </b> <?php  echo 
							date("d M Y",strtotime($_POST['date1']));?> </div>
 							<div style="float: left;font-size: 14px;margin-left:20px; padding: 0px 0px 5px 10px;width: 720px;"><b>Total: </b><?php echo $priceTypeDtl['ct'];?> <?php echo $arrPriceDtl['currency_symbol'];?><?php  echo $activity_total_price;?></div>
												
						</div>
						</fieldset>
						</fieldset>
                        <fieldset style="width:100%; float:left;">
						<fieldset style="width:48%; float:left; margin-left:15px;">
							<label>Select User<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<?php
								$obUserDtl=new AdminBooking();
								$obUserDtl->getUserDtl();
							?>
							<select name="cusroemt" id="cusroemt" onchange="get_customer_card_dtl(this.value);">
								<option value="" selected="selected">--Select Customer--</option>
								<?php 
									while($obUserDtl->getAllRow()){ 
								?>
									<option value="<?php echo $obUserDtl->getField('user_id');?>"><?php echo $obUserDtl->getField('first_name')." ".$obUserDtl->getField('last_name')." (".$obUserDtl->getField('email').")";?></option>
								<?php } ?>
							</select>
						</fieldset>
                        </fieldset>
                        <fieldset style="width:100%; float:left;">
							<label>Customer Credit/Debit Card Details</label>
                            <div id="customer_card_div"><label>Please Select User First</label></div>
						</fieldset>
                        
                      <!--	                        
                        <fieldset style="width:100%; float:left;">
								<label for="activity_name">Payment Details<sup style="color:#FF0000;font-weight:bold;">*</sup></label><br />
							
                        <fieldset style="width:48%; float:left; margin-left: 15px;">
							<label>Select Card Type<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<select name="card_type" id="card_type">
								<option value="" selected="selected">--Select Customer--</option>
								<option value="Visa">Visa</option>
                                <option value="Electron">Electron</option>
                                <option value="JCB">JCB</option>
                                <option value="Laser">Laser</option>
                                <option value="Maestro">Maestro</option>
                                <option value="Mastercard">Mastercard</option>
							</select>
						</fieldset>
                        <fieldset style="width:48%; float:left;margin-left:5px;">
							<label>Name on Card<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="card_holder_name" id="card_holder_name" style="width:92%;" />
						</fieldset><div class="clear"></div>	
                        
                        
                        <fieldset style="width:48%; float:left; margin-left: 15px;">
							<label>Card Number<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="card_no" id="card_no" style="width:92%;" />
						</fieldset>
                        <fieldset style="width:48%; float:left;margin-left:5px;">
							<label>Expiry Date<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<select name="month" id="month" style="width:100px;">
                            	<option value="">(Month)</option>
                                <?php								
                                	$month=ltrim(date("m"),"0");
									if($month==12){
										$loop=1;
									}else{
										$loop=13-$month;
									}									
									for($i=1,$month;$i<=$loop;$i++,$month++){?>
										<option value="<?php echo $month;?>"><?php if($month<10){ echo "0".$month;}else{echo $month;}?></option>
									<?php }
								?>
                            </select>
                            
                            <select name="year" id="year" style="width:100px;">
                            	<option value="">(Year)</option>
                                <?php
									$year=date("Y");
									for($i=$year;$i<=$year+10;$i++){?>
										<option value="<?php echo $i;?>"><?php echo $i;?></option>
									<?php }
								?>
                            </select>
						</fieldset>
						</fieldset>
						-->
						<fieldset style="width:100%; float:left;">
									<fieldset style="width:48%; float:left; margin-left:15px;">
										<label>Select Currancy Type<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
										<select name="currancy_type" id="currancy_type" >
											<option value="" selected="selected">--Select Currancy--</option>
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
							<fieldset style="width:48%; float:left; margin-left:15px;">
								<label>Enter Extra Information</label>
								<textarea name="extra_note" id="extra_note" cols="50"></textarea>
							</fieldset>
                        </fieldset>
				</div>
                <div class="clear"></div>
			<footer>
				<div class="submit_link">
					<input type="submit" name="btnSubmitBooking" id="btnSubmitBooking" value="Submit" class="alt_btn">
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