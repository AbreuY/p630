<?php
	require_once ('../../pi_classes/AdminBooking.php');
	require_once ('../../pi_classes/Admin.php');
	ob_start();
	session_start();
	if(empty($_SESSION['admin_id'])){
		header("location:../login.php");
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
<!--<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.tablesorter.min.js" language="javascript" type="text/javascript"></script>-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.equalHeight.js"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){ 
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
	jQuery('.alert_info').slideDown('slow').delay(3000).slideUp('slow');
	
	jQuery('.alert_success').mouseover(function(){
		jQuery(this).css('cursor','pointer').click(function(){
			jQuery(this).hide();
		});
	});	
	jQuery('.alert_success').slideDown('slow').delay(3000).slideUp('slow');
	// display error/success/alert messgae
	
	
	
});


//Display Loading Image
function Display_Load()
{
	$("#loading").fadeIn(900,0);
	$("#loading").html("<img src='images/bigLoader.gif' />");
}
//Hide Loading Image
function Hide_Load()
{
	$("#loading").fadeOut('slow');
};

</script>
<script type="text/javascript">
	//Funtion  to change the change the booking status
function fn_change_status(status,activity_id,supplier_id,booking_detail_id,booking_id)
{
		var chk=confirm("Are you sure you want to "+status+" this Booking?");
			if(chk)
			{
					Display_Load();	
					jQuery.ajax({
						url: "<?php echo AbstractDB::SITE_PATH;?>admin/ajax/ajax_request.php",
						type: "post",
						data:"status="+status+"&booking_detail_id="+booking_detail_id+"&booking_id="+booking_id+"&activity_id="+activity_id+"&supplier_id="+supplier_id+"&action=change_booking_status",
						success:function(msg){
												Hide_Load();
												jQuery('#delete_comp_div').show();
												jQuery('#delete_comp_div').show();
												jQuery('#delete_comp_div').append(msg);		
												location.reload();	
											 }
							   });
		}
	else
	{
		return false;
	}
}


function fn_change_conducted_status(status,booking_id,booking_detail_id,activity_id)	
{
	var s="";
	
	if(status=="Yes")
	{
		s="conducted";
	}
	else
	{
		s="not conducted";		
	}
	var chk=confirm("Are you sure you want to make this activity as "+s);
	if(chk)
	{
			jQuery.ajax({
				url: "<?php echo AbstractDB::SITE_PATH;?>admin/ajax/ajax_request.php",
				type: "post",
				data:"status="+status+"&activity_id="+activity_id+"&booking_id="+booking_id+"&booking_detail_id="+booking_detail_id+"&action=change_activity_conducted_status",
				success:function(msg){
									alert(msg);
									location.reload();	
									}
							});
	}
	else
	{
		return false;
	}
}
</script>
<style>
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
		<?php if(isset($_SESSION['msg']['updated'])){ ?>
			<h4 class="alert_success">Record updated successfully!</h4>
		<?php 
			unset($_SESSION['msg']['updated']);
		} ?>	
		
		<article class="module width_full">
		<div id="loading"></div>
		<form name="frmContinent" id="frmContinent" method="post" action="">
		<input type="hidden" name="booking_id" id="booking_id" value="<?php echo base64_decode($_REQUEST['booking_id']);?>" />
		<header>
			<h3 class="tabs_involved">Booking Management </h3>
		</header>
		
		
			<?php include("../booking_menu.php");?>	
		<header>
							<div style="float:left; margin-left:10px; margin-right:10px;" class="go">
								  <?php 
								 
								  	if($_REQUEST['type']=='today')
									{
										?>Today's Booking<?php 
									}
									elseif($_REQUEST['type']=='tomorrow')
									{
									
										?>Tomorrow's Booking<?php 
									}
									elseif($_REQUEST['booking_day']=='future')
									{
										?>Future Booking<?php
									}
									elseif($_REQUEST['booking_day']=='cancel')
									{
										?>Cancelled Booking<?php
									}
									elseif($_REQUEST['booking_day']=='past')
									{
										?>Past Booking<?php
									}
								   ?>
							 </div>
		</header>
		<div class="module_content">
		
			<?php 
				$objAdminBooking=new AdminBooking();
				$objAdminBooking->getBookingDetailById(base64_decode($_REQUEST['booking_id']));
				$bookingDtl=array();
				while($temp=$objAdminBooking->getRow())
				{
					$bookingDtl[]=$temp;  //Getting Booking Detail
				}
					/*echo "<pre>";
						print_r($bookingDtl);
					echo "</pre>";*/
			?>
		
							<fieldset style="width:98% float:left; margin-right: 3%;">
									<div class="pricetable">
										<div class="pricetablerow" >
											<div class="pricetablecol" style="width:20%;margin-left:10px;">Booking Reference id :</div>
											<div class="pricetablecol" style="width:20%;margin-left:10px;"><?php echo $bookingDtl[0]['refence_id'];?></div>
										</div>
										
										<div class="pricetablerow" >
											<div class="pricetablecol" style="width:20%;margin-left:10px;">Supplier Company:</div>
											<div class="pricetablecol" style="width:20%;margin-left:10px;"><?php echo $bookingDtl[0]['company_name'];?></div>
										</div>
										
										<div class="pricetablerow" >
											<div class="pricetablecol" style="width:20%;margin-left:10px;">Customer Name:</div>
											<div class="pricetablecol" style="width:20%;margin-left:10px;"><?php echo $bookingDtl[0]['first_name']." ".$bookingDtl[0]['last_name'] ;?></div>
										</div>
										
										<div class="pricetablerow" >
											<div class="pricetablecol" style="width:20%;margin-left:10px;">Customer Email:</div>
											<div class="pricetablecol" style="width:20%;margin-left:10px;"><a href="mailto:<?php echo $bookingDtl[0]['email'];?>"> <?php echo $bookingDtl[0]['email'];?></a></div>
										</div>
										
										<div class="pricetablerow" >
											<div class="pricetablecol" style="width:20%;margin-left:10px;">Voucher Code:</div>
											<div class="pricetablecol" style="width:20%;margin-left:10px;"><?php if($bookingDtl[0]['voucher_code']==''){ echo "Not Specified";} else { echo $bookingDtl[0]['voucher_code'];}?></div>
										</div>
										
										<div class="pricetablerow" >
											<div class="pricetablecol" style="width:20%;margin-left:10px;">Promo Code:</div>
											<div class="pricetablecol" style="width:20%;margin-left:10px;"><?php if($bookingDtl[0]['promo_code']==''){ echo "Not Specified";}  else { echo $bookingDtl[0]['promo_code'];}?></div>
										</div>
										
										<div class="pricetablerow" >
											<div class="pricetablecol" style="width:20%;margin-left:10px;">Date:</div>
											<div class="pricetablecol" style="width:20%;margin-left:10px;"><?php echo $bookingDtl[0]['booking_date'];?></div>
										</div>
										
										<div class="pricetablerow" >
											<div class="pricetablecol" style="width:20%;margin-left:10px;">Status:</div>
											<div class="pricetablecol" style="width:20%;margin-left:10px;"><?php echo $bookingDtl[0]['booking_status'];?></div>
										</div>
										
									</div>
												
							</fieldset>
			<?php
				$objAdminBooking1=clone $objAdminBooking;
				$objAdminBooking1->bookingActivityDetail($_REQUEST['type'],base64_decode($_REQUEST['booking_id']));
				$activityids=array();	
				$activityDetail=array();
				$i=0;
				while($temp=$objAdminBooking1->getRow())
				{
					$activityDetail[]=$temp;
					       //Getting the booking activity_detail
					$activityids[$i]['activity_id']=$temp['activity_id'];    
					$activityids[$i]['schedule_date']=$temp['schedule_date'];
					$activityids[$i]['booking_detail_id']=$temp['booking_detail_id'];		
					$i++;
				}
			
			?>
							<fieldset style="width:98% float:left; margin-right: 3%;">
								<label >Booking Summary</label>
								<?php 
								
	
												
								foreach($activityDetail as $arrActivityDetail)
								{
							/*	echo "<pre>";
									print_r($arrActivityDetail);
								echo "</pre>";*/
								?>
								<div> 
									<div style="float:left;padding-left:10px;font-size:16px;font-weight:bold">
									<?php echo $arrActivityDetail['activity_name'].", ".$arrActivityDetail['country_name'].", ".$arrActivityDetail['city_name']."-";?>
									</div>
									<div style="float:right;padding-right:20px">
									<?php if($arrActivityDetail['schedule_date']=='0000-00-00')
									{
									?> 
										<font color="#FF0000">Gift</font>
									<?php 
									}
									else
									{
										echo $arrActivityDetail['schedule_date'];
									}
									?>
									</div>
								</div> 
		<?php							
		$arrSubActivityIds=array();
		$objGetSubActivity=clone $objAdminBooking; 
		
		$objGetSubActivity->getSubactivity_ids($arrActivityDetail['activity_id'],base64_decode($_REQUEST['booking_id']),$arrActivityDetail['schedule_date']);
		while($temp1=$objGetSubActivity->getRow())
		{
			$arrSubActivityIds[]=$temp1;           //Gettiong booking activity sub activity detail
		}
		
		$arrActTotPrice=array();
		$objGetSum=clone $objAdminBooking; 
		$objGetSum->getSumOfPrices($arrActivityDetail['activity_id'],base64_decode($_REQUEST['booking_id']),$arrActivityDetail['schedule_date']);
		while($temp3=$objGetSum->getRow())
		{
				$arrActTotPrice[]=$temp3;
		}
		/*echo "<pre>";
			print_r($arrActTotPrice);
		echo "</pre>";*/
		$objPaidCurrancy=clone $objAdminBooking; 
		$objPaidCurrancy->getPaidCurrancy($arrActivityDetail['activity_id'],base64_decode($_REQUEST['booking_id']));
		$arrPaidSymbol=array();
		while($temp4=$objPaidCurrancy->getRow())
		{
			$arrPaidSymbol[]=$temp4;  //Geeting activity currancy symbol and paid currency symbol
		}
		
		/*echo "<pre>";
			print_r($arrSubActivityIds);
		echo "</pre>";*/
					
										foreach($arrSubActivityIds as $sub_act_id)
										{
											$arrSubActivityDetail=array();
											$objGetSubActivityDetail=clone $objAdminBooking; 
											$objGetSubActivityDetail->getSubActDtl2($_REQUEST['type'],base64_decode($_REQUEST['booking_id']),$sub_act_id['sub_activity_id'],$arrActivityDetail['schedule_date']);
											$arrBookingPersonDtl=array();
											while($temp2=$objGetSubActivityDetail->getRow())
											{
												$arrSubActivityDetail[]=$temp2;     // Getting sub activity total detail
												
													/* Getting Booking Persons detail information */ 
														$objBookingPersonDtl=clone $objAdminBooking;
															
														$objBookingPersonDtl->getBookingPersonDtl($temp2['activity_id'],$temp2['sub_activity_id'],$temp2['booking_record_id']);
														while($temp3=$objBookingPersonDtl->getRow())
														{
															$arrBookingPersonDtl[]=$temp3;
														}
											}
														/*echo "<pre>";
															print_r($arrBookingPersonDtl);
														echo "</pre>";*/
														/*echo "<pre>";
															print_r($arrSubActivityDetail);
														echo "</pre>";*/
											
											?> <div style="padding-left:10px;font-size:14px;font-weight:bold"> 
											<br /><br />
											&nbsp; <?php echo $sub_act_id['sub_activity_name'];?> </div> 
											<div class="pricetable">
												<div class="pricetablerow" >
													<div class="pricetablecol" style="width:15%; padding-left:25px">Quantity</div>
													<div class="pricetablecol" style="width:20%;">Price Type</div>
													<div class="pricetablecol" style="width:20%;">Departure Time</div>
													<div class="pricetablecol" style="width:20%;">Unit Price</div>
													<div class="pricetablecol" style="width:20%;">Total</div>
													
												</div>
											<?php 
												/*echo "<pre>";
													print_r($arrSubActivityDetail);
												echo "</pre>";*/
											foreach($arrSubActivityDetail as $SubActDtl)
											{
											?>
												<div class="pricetablerow" >
													<div class="pricetablecol" style="width:15%;padding-left:25px"><?php echo $SubActDtl['booking_quantity'];?></div>
													<div class="pricetablecol" style="width:20%;"><?php echo $SubActDtl['price_type_name'];?></div>
													<div class="pricetablecol" style="width:20%;"><?php echo $SubActDtl['hour'];?>:<?php echo $SubActDtl['minute'];?> <?php echo $SubActDtl['schedule_at'];?></div>
													<div class="pricetablecol" style="width:20%;">
													<?php echo $SubActDtl['activity_currency']." ".$arrPaidSymbol[0]['activity_symbol'];  
													 echo $SubActDtl['activity_unit_price'];?>
													  </div>
													<div class="pricetablecol" style="width:20%;">
													<?php echo $SubActDtl['activity_currency']." ".$arrPaidSymbol[0]['activity_symbol'];  
													 echo $SubActDtl['activity_total_price'];?></div>
												</div>
											<?php	
											}
											?>
											</div>
											
											<div style="padding-left:10px;font-size:14px;font-weight:bold"> 
											<br />
											&nbsp; Activity Participant </div> 
											<div class="pricetable">
												<div class="pricetablerow" >
													<div class="pricetablecol" style="width:10%; padding-left:25px">Price Type</div>
													<div class="pricetablecol" style="width:30%;">Name</div>
													<div class="pricetablecol" style="width:30%;">Country</div>
												</div>
											<?php 
												/*echo "<pre>";
													print_r($arrSubActivityDetail);
												echo "</pre>";*/
											foreach($arrBookingPersonDtl as $personDtl)
											{
											?>
											<div class="pricetablerow" >
												<div class="pricetablecol" style="width:10%;padding-left:25px"><?php echo $personDtl['price_type_name'];?></div>
												<div class="pricetablecol" style="width:30%;"><?php echo $personDtl['fname']." ".$personDtl['lname'];?></div>
												<div class="pricetablecol" style="width:30%;"><?php echo $personDtl['country_name'];?></div>
											</div>
											<?php	
											}
											?>
											</div>
											
											
											<?php
										}	
											?>
										<div class="pricetable">
											<div class="pricetablerow" >
												<div class="pricetablecol" style="width:60%;"></div>
												<div class="pricetablecol" style="width:40%;">Total :
												<?php   
												echo $arrActTotPrice[0]['activity_currency']." ".$arrPaidSymbol[0]['activity_symbol'];
												echo $arrActTotPrice[0]['activity_total_price'];
												echo "(".$arrPaidSymbol[0]['paid_currency']." ".$arrPaidSymbol[0]['paid_symbol']." ".number_format($arrActTotPrice[0]['total_price'],2).")";
												?>
												
												 </div>
											</div>
											<div class="pricetablerow" >
												<div class="pricetablecol" style="width:60%;"></div>
												<div class="pricetablecol" style="width:40%;">Total Paid :
												<?php   
												echo $arrActTotPrice[0]['activity_currency']." ".$arrPaidSymbol[0]['activity_symbol'];
												echo $arrActTotPrice[0]['activity_total_paid'];
												echo "(".$arrPaidSymbol[0]['paid_currency']." ".$arrPaidSymbol[0]['paid_symbol']." ".number_format($arrActTotPrice[0]['total_paid'],2).")";
												?>
												 </div>
											</div>
												
											<div class="pricetablerow">
												<div class="pricetablecol" style="width:60%;"></div>
												<div class="pricetablecol" style="width:40%;">Total due :
												<?php   
												echo $arrActTotPrice[0]['activity_currency']." ".$arrPaidSymbol[0]['activity_symbol'];
												echo $arrActTotPrice[0]['activity_total_due'];
												echo "(".$arrPaidSymbol[0]['paid_currency']." ".$arrPaidSymbol[0]['paid_symbol']." ".number_format($arrActTotPrice[0]['total_due'],2).")";
												?>
												
												 </div>
											</div>
												<?php /*echo "<pre>";
														print_r($arrActivityDetail);
														echo "</pre>";*/
												if($_REQUEST['type']=='future')	
												{	
														?>
												<div class="pricetablerow">
													<div class="pricetablecol" style="width:38%;padding-left:10px;">
													Booking Status : <?php echo $arrActivityDetail['booking_status'];?>
													</div>
													<div class="pricetablecol" style="width:20%">
														 <a href="javascript:void(0);" onClick="fn_change_status('confirm',<?php echo $arrActivityDetail['activity_id'];?>,<?php echo $arrActivityDetail['supplier_id'];?>,<?php echo $arrActivityDetail['booking_details_id'];?>,<?php echo $arrActivityDetail['booking_id'];?>)">Confirm Booking</a>
													</div>
													
													<div class="pricetablecol" style="width:20%">
														<a href="javascript:void(0);" onClick="fn_change_status('decline',<?php echo $arrActivityDetail['activity_id'];?>,<?php echo $arrActivityDetail['supplier_id'];?>,<?php echo $arrActivityDetail['booking_details_id'];?>,<?php echo $arrActivityDetail['booking_id'];?>)">Decline Booking</a>
													</div>
													
													<div class="pricetablecol" style="width:20%">
														<a href="javascript:void(0);" onClick="fn_change_status('cancel',<?php echo $arrActivityDetail['activity_id'];?>,<?php echo $arrActivityDetail['supplier_id'];?>,<?php echo $arrActivityDetail['booking_details_id'];?>,<?php echo $arrActivityDetail['booking_id'];?>)">Cancel Booking</a>
													</div>
												</div>
												<?php
												}
												elseif($_REQUEST['type']=='past')
												{
												
												?>
												<div class="pricetablerow">
													<div class="pricetablecol" style="width:60%;padding-left:10px;">
													Activity Conducted Status:	<?php echo $arrActivityDetail['activity_conducted_status'];?>
													</div>
													<?php 
														if($arrActivityDetail['activity_conducted_status']=='Yes')
														{
													?>
													<div class="pricetablecol" style="width:20%">
														<a href="javascript:void(0);" onClick="fn_change_conducted_status('No',<?php echo $arrActivityDetail['booking_id'];?>,<?php echo $arrActivityDetail['booking_details_id'];?>,<?php echo $arrActivityDetail['activity_id'];?>)">Make Not Conducted</a>
													</div>
													<?php
													    }
														else
														{
													?>
													<div class="pricetablecol" style="width:20%">
														<a  href="javascript:void(0);" onClick="fn_change_conducted_status('Yes',<?php echo $arrActivityDetail['booking_id'];?>,<?php echo $arrActivityDetail['booking_details_id'];?>,<?php echo $arrActivityDetail['activity_id'];?>)">Make Conducted</a>
													</div>
														<?php 
														}
														?>
													
												</div>
												<?php 
												}
												?>
											</div>
											
											
									
								 
								<?	
								}
								?>
								<?php
									/* Getting the gift voucher detail if any exist in the booking */
										$objBookingGiftVoucher=clone $objAdminBooking;
										$objBookingGiftVoucher->getGiftVoucherDetail(base64_decode($_REQUEST['booking_id']));
										
										$arrBookingGiftVoucher=array();
										while($temp=$objBookingGiftVoucher->getRow())
										{
											$arrBookingGiftVoucher[]=$temp;
										}
									/* Getting the gift voucher detail if any exist in the booking */
								if(count($arrBookingGiftVoucher )>0)
								
								{	
								foreach($arrBookingGiftVoucher as $bookingGiftVoucher)
								{	
								?>
									<div style="padding-left:10px;font-size:14px;font-weight:bold"> 
										<br />&nbsp; Gift Voucher Detail 
									</div>
								<div class="pricetable">
										<div class="pricetablerow" >
										<div class="pricetablecol" style="width:40%;margin-left:25px">Gift From : 
										<?php   
										echo $bookingGiftVoucher['gift_from'];
										?>
										 </div>
									</div>
									
									<div class="pricetablerow" >
										<div class="pricetablecol" style="width:40%;margin-left:25px">Gift To : 
										<?php   
										echo $bookingGiftVoucher['gift_to'];
										?>
										 </div>
									</div>
									
									<div class="pricetablerow" >
										<div class="pricetablecol" style="width:40%;margin-left:25px">Message On Voucher : 
										<?php   
										echo $bookingGiftVoucher['message_on_voucher'];
										?>
										 </div>
									</div>
									
									<div class="pricetablerow" >
										<div class="pricetablecol" style="width:40%;margin-left:25px">Expiry Date : 
										<?php   
										echo $bookingGiftVoucher['expiry_date'];
										?>
										 </div>
									</div>
									
									<div class="pricetablerow" >
										<div class="pricetablecol" style="width:40%;margin-left:25px">Status : 
										<?php   
										echo $bookingGiftVoucher['status'];
										?>
										 </div>
									</div>
									
									<div class="pricetablerow" >
										<div class="pricetablecol" style="width:40%;margin-left:25px">Price :
										<?php   
										echo "NZD $ ".$bookingGiftVoucher['total_price'];
										echo "(".$arrPaidSymbol[0]['paid_currency']." ".$arrPaidSymbol[0]['paid_symbol']." ".$bookingGiftVoucher['total_price_in_paid_curr'].")";
										?>
										 </div>
									</div>
								</div>
								<?php 
									} //end foreach loop
								}//End if condition	
								 ?>
								<div style="padding-left:10px;font-size:14px;font-weight:bold"> 
										<br />&nbsp; Toal : 
									</div>
								
								<div class="pricetable">
									<div class="pricetablerow" >
										<div class="pricetablecol" style="width:40%;padding-left:25px;">Discount Amount : NZD $
										<?php   
										echo $total_discount=$bookingDtl[0]['activity_tot_discount'];
										echo "(".$arrPaidSymbol[0]['paid_currency']." ".$arrPaidSymbol[0]['paid_symbol']." ".$bookingDtl[0]['total_discount'].")";
										?>
										
										 </div>
									</div>
									<div class="pricetablerow" >
										<div class="pricetablecol" style="width:40%;padding-left:25px;">Total Amount : NZD $
											<?php   
										echo $total_price=$bookingDtl[0]['activity_tot_price'];
										echo "(".$arrPaidSymbol[0]['paid_currency']." ".$arrPaidSymbol[0]['paid_symbol']." ".$bookingDtl[0]['total_price'].")";
										?>
										
										 </div>
									</div>
									
									<div class="pricetablerow" >
										<div class="pricetablecol" style="width:40%;padding-left:25px;">Net Amount : NZD $
										<?php   
										echo $netAmount=$total_price - $total_discount;
										//echo convert_currency($arrPaidSymbol[0]['paid_currency'],$arrActTotPrice[0]['activity_currency'],($total_price - $total_discount));
										echo "(".$arrPaidSymbol[0]['paid_currency']." ".$arrPaidSymbol[0]['paid_symbol']." ".($bookingDtl[0]['total_price'] - $bookingDtl[0]['total_discount']).")";
										?>
										 </div>
									</div>
									
									<div class="pricetablerow" >
										<div class="pricetablecol" style="width:40%;padding-left:25px;">Total Paid : NZD $
										<?php   
										echo $total_paid=$bookingDtl[0]['activity_tot_paid'];
										echo "(".$arrPaidSymbol[0]['paid_currency']." ".$arrPaidSymbol[0]['paid_symbol']." ".$bookingDtl[0]['total_paid'].")";
										?>
										 </div>
									</div>
									
									<div class="pricetablerow" >
										<div class="pricetablecol" style="width:40%;padding-left:25px;">Total Due : NZD $
										<?php   
										echo $netAmount - $total_paid;
										//echo convert_currency($arrPaidSymbol[0]['paid_currency'],$arrActTotPrice[0]['activity_currency'],($total_price - $total_discount));
										echo "(".$arrPaidSymbol[0]['paid_currency']." ".$arrPaidSymbol[0]['paid_symbol']." ".($bookingDtl[0]['total_price'] - $bookingDtl[0]['total_discount']-$bookingDtl[0]['total_paid']).")";
										?>
										 </div>
									</div>
								</div>
							</fieldset>
	   </div>
		<!-- end of .tab_container -->		
		</form>
		</article><!-- end of content manager article -->		
		<div class="spacer"></div>
	</section>
</body>
</html>