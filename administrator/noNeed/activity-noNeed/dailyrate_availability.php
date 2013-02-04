<?php
require_once("../../pi_classes/commonSetting.php");
chkAdminLogin($_SESSION['adminID']);
require_once("../../pi_classes/PriceCalendarForAdmin.php"); 
$user_id=base64_decode($_REQUEST['user_id']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IN ADMIN PANEL | Powered by <?php echo AbstractDB::SITE_TITLE;?></title>

<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/layout.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>css/style.css" type="text/css" media="screen" />

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
	jQuery('#frm_daily_price').validationEngine();	
	jQuery('#btnCancel').click(function(){
		document.location.href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/availabilty_list.php?user_id="+jQuery('#user_id').val();
	});
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();
	if(dd<10){dd='0'+dd;}
	if(mm<10){mm='0'+mm;} 
	var today = yyyy+'-'+mm+'-'+dd;
	//jQuery('#start_date').val(today);		
	jQuery("#start_date").datepicker({
		minDate:0,
		maxDate: jQuery('#numberDays').val(),
		changeMonth: true,
		changeYear: true,
		onSelect: function(dateText, inst){ 
				var minDate =$.datepicker.parseDate('yy-mm-d', dateText); 
				minDate.setDate(minDate.getDate()+1); 
				var maxDate =$.datepicker.parseDate('yy-mm-d', dateText); 
				maxDate.setDate(maxDate.getDate()+5); 
				var end_date=$("#max_cal_date").val();
				if(Date.parse(maxDate)>Date.parse(end_date))
				{
					maxDate=new Date(Date.parse(end_date));
				}				
				var $ret_date = $("#end_date");
				$ret_date.datepicker("option","minDate", minDate);	
				$ret_date.datepicker("option",'maxDate',maxDate);			
				//$ret_date.datepicker("setDate", date); 
				$(this).datepicker("hide");
			}
		});	
	jQuery("#end_date").datepicker({minDate:0,maxDate:'+1Y',changeMonth: true,changeYear: true});	
});
function goByDateRange(){
	document.location.href="<?Php echo AbstractDB::SITE_PATH;?>admin/activity/dailyrate_availability.php?user_id="+jQuery('#user_id').val()+"&sub_act_type_id="+jQuery('#sub_act_type_id').val()+"&start_date="+jQuery('#start_date').val()+"&end_date="+jQuery('#end_date').val();
}
function check_validation(id){
	jQuery('#discount_val'+id).removeClass().addClass("td_activity_N");
	if(jQuery('#is_discount'+id).is(':checked')){
		jQuery('#discount_val'+id).addClass("validate[required,max["+jQuery('#price'+id).val()+"],min[1], custom[number]] text-input");
	}else{
		jQuery('#discount_val'+id).removeClass("validate[required,max["+jQuery('#price'+id).val()+"],min[1], custom[number]] text-input");
		jQuery('#discount_val'+id).val(0);
	}
}
</script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>
	<?php
			$objDailyPrice=new PriceCalendarForAdmin();
			$objPriceDateRange=clone $objDailyPrice;
			if($_REQUEST['start_date']!=''){
				$start_date=$_REQUEST['start_date'];
				$e_date=date("Y-m-d",strtotime($start_date."+4 day"));
				if($_REQUEST['end_date']>$e_date)
				{
					//echo "hi";
					$end_date=date("Y-m-d",strtotime($start_date."+4 day"));
				}
				else
				{
					$end_date=$_REQUEST['end_date'];
				}
				
			}else{
				$start_date=date("Y-m-d");
				$end_date=date("Y-m-d",strtotime($start_date."+4 day"));
			}
			/*echo "<br>".$start_date;
			echo "<br>".$end_date;*/
			
			/************* get Date range *****************/
			$objPriceDateRange->getPriceDateRange(base64_decode($_REQUEST['sub_act_type_id']));
			$objPriceDateRange->getAllRow();
			$min_cal_date=$objPriceDateRange->getField('min_cal_date');
			$max_cal_date=$objPriceDateRange->getField('max_cal_date');
			$timeDiff = abs(strtotime($max_cal_date) - strtotime($min_cal_date));
			$numberDays = $timeDiff/86400;  // 86400 seconds in one day
			// and you might want to convert to integer
			//$numberDays = intval($numberDays-5);
			$arrDailyPrice=array();
			$arrActDtl=array();
			$arrActCalDate=array();
			$totalTimeCount=0;
			$sub_type_id_val='';
			$count=0;
			
			//Getting no of time schedule
			$objGetCount=clone $objDailyPrice;
			$objGetCount->getNoofTimeId(base64_decode($_REQUEST['sub_act_type_id']),$start_date,$end_date);
			$objGetCount->getAllRow();
			$TimeCount=$objGetCount->getField('cnt');
			//$objDailyPrice->getPriceTypeDltBySubActId(base64_decode($_REQUEST['sub_act_type_id']));
			$objDailyPrice->getPriceTypeDltBySubActId1(base64_decode($_REQUEST['sub_act_type_id']),$start_date,$end_date);
			while($row=$objDailyPrice->getAllRow()){
				$arrDailyPrice[$row['id']]=$row;
				$sql11="select cal.*,sad.sub_activity_name,sad.currency_code from ".AbstractDB::SUFFIX."calender as cal left join ".AbstractDB::SUFFIX."sub_activity_detail as sad on cal.sub_activity_id=sad.sub_activity_id where cal.sub_activity_type_id='".base64_decode($_REQUEST['sub_act_type_id'])."' and cal.cal_date between '".$start_date."' and '".$end_date."' group by cal.cal_date";
				$rs11=mysql_query($sql11);
				while($row11=mysql_fetch_assoc($rs11)){	
					$arrActDtl['activity']=$row11;			
					$arrActCalDate['cal_date'][$row11['cal_date']]=$row11;
					 $sql="select cal.*,time.hour,time.minute,time.schedule_at,opd.* from ".AbstractDB::SUFFIX."calender cal left join ".AbstractDB::SUFFIX."other_price_details  opd on cal.other_price=opd.id left join ".AbstractDB::SUFFIX."activity_time_schedule time on cal.activity_time=time.time_schedule_id where cal.cal_date='".$row11['cal_date']."' and cal.sub_activity_id='".$row['sub_activity_id']."' and cal.other_price='".$row['id']."' group by time.hour , time.minute , time.schedule_at  order by time.schedule_at, time.hour , time.minute ";		
						$flag=0;	
						$rs=mysql_query($sql);
							while($row2=mysql_fetch_assoc($rs)){
								$flag=1;		
								$arrDailyPrice[$row['id']]['date'][$row11['cal_date']][]=$row2;
								$totalTimeCount++;
							}
							if($flag==0)
							{
									for($i=0;$i<$TimeCount;$i++)	
									{
										$arrDailyPrice[$row['id']]['date'][$row11['cal_date']][]=array();
									}
							}		
			}
			if(count($arrDailyPrice[$row['id']]['date'])>$count)
			{	$sub_type_id_val=$row['id'];
				$count=count($arrDailyPrice[$row['id']]['date']);
			}
}
	/*echo "<pre>";
		print_r($arrDailyPrice);
	echo "</pre>";	*/
			#*important :
			for($ich=1;$ich<=count($arrDailyPrice);$ich++){
				$index_cnt   = count($arrDailyPrice[$ich]['date']);
				$arr_arvind[]= $index_cnt.".".$ich;
			}
			arsort($arr_arvind);
			$zzz = explode('.',$arr_arvind[0]);
			$store_count = $zzz[0];
			//$store_index = $zzz[1];
			$store_index=$sub_type_id_val;
	?>
		<?php include("..\supplier_menu.php");?>
		<section id="main" class="column">

   		<form name="frm_daily_price" id="frm_daily_price" method="post" action="<?php echo AbstractDB::SITE_PATH;?>admin/activity/dailyrate_availability_action.php">
		<article class="module width_full" style="width:95%">
							<header><h3 class="tabs_involved">Activity Availability</h3></header>
							<div class="module_content">
								<div class="supl_nav">
									<input type="hidden" name="user_id" id="user_id" value="<?php echo base64_encode($user_id);?>" />
                                    <input type="hidden" name="sub_act_type_id" id="sub_act_type_id" value="<?php echo $_REQUEST['sub_act_type_id'];?>" />
									<input type="hidden" name="max_cal_date" id="max_cal_date" value="<?php echo date("Y-m-d",strtotime($max_cal_date));?>"  />
                                    <input type="hidden" name="numberDays" id="numberDays" value="<?php echo $numberDays; ?>" />
									</div>
									<div class="suplier_nav">      
											<div id="content" class="add_details" style="background:url('');">
														 <div class="go" style="margin-right:300px;">
															  <a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/add_more_price.php?user_id=<?php echo $_REQUEST['user_id']?>&activity_id=<?php echo $_REQUEST['activity_id'];?>&sub_act_type_id=<?php echo $_REQUEST['sub_act_type_id'];?>" class="genericButtonWhite">Add More Online</a>
														</div>  
															                                  
												<div class="left"></div>
														<div class="mid">
													
													<div id="tableHeader">
															<div class="go" style="margin-left:10px; margin-top:7px; float:right;"><a href="javascript:void(0);" onclick="goByDateRange()">Go!</a></div>
																<div class="for_da" style="height:50px;width:285px;">
																<strong class="Ftext">From&nbsp;</strong>
																	&nbsp;
																	<input type="text" name="start_date" id="start_date" readonly="readonly" value="<?php echo $start_date; ?>" style="float:left;width:70px;margin:10px 5px;" />                                                                
																	&nbsp;&nbsp;
																	<strong class="Ftext">to</strong>
																	<input type="text" name="end_date" id="end_date" readonly="readonly" value="<?php echo $end_date; ?>" style="float:left;width:70px;margin:10px 0;" />&nbsp;
																</div>
															</div>
													</div>
										
												<div class="right"></div>
											</div>
										</div>		
                                    <div class="datedatatable">
                                        <div style="padding:5px 0; font-size:14px;width:100%; float:left;">
                                            <div style="float:left;">Allocation per day / Daily Rates in <b><?php echo $arrActDtl['activity']['currency_code'];?></b> of <b> <?php echo $arrActDtl['activity']['sub_activity_name'];?></b></div>
                                            <div style="float:right;text-align:right;"><b><?php echo date("M d, Y",strtotime($max_cal_date));?></b> is last online availabilty date</div>
                                        </div>
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr class="tr_header">
                                                    <td>Date</td>
													<?php 
													foreach($arrDailyPrice[$store_index]['date'] as $datekey=>$value) { 
													?>
                                                    <td colspan="<?php echo count($value);?>" class="td_day_N" style="background-color:#999999;color:#FFFFFF;font-weight:bold;"><strong><?php echo $datekey;?></strong></td>
                                                  <?php }?>
                                                </tr>                                                        
                                                <tr>
                                                    <td>Departure Time</td>
                                                            
													<?php 
													foreach($arrDailyPrice[$store_index]['date'] as $arrDateVal) 
													{ 
														foreach($arrDateVal as $key=>$arrDailyPriceTimeDtl)
														{?>
														  <td class="tableCellDarker" style="background-color:#777777;color:#FFFFFF;"><?php echo $arrDailyPriceTimeDtl['hour'].":".$arrDailyPriceTimeDtl['minute']. ":".$arrDailyPriceTimeDtl['schedule_at'];?>
														  </td>
													 <?php 
													 	}
													 }?>
                                                </tr>                                                        
                                                 <tr>
                                                  <td>Capactiy</td>
                                                     <?php 
													 	foreach($arrDailyPrice[$store_index]['date'] as $arrDateValDtl2)
														{
															foreach($arrDateValDtl2 as $key=>$arrDailyPriceTimeDtl)
															{
															?>
															<td><input class="validate[required] td_activity_N" type="text" name="capacity[<?php echo $key."_".$arrDailyPriceTimeDtl['cal_id'];?>]" id="capacity[<?php echo $key."_".$arrDailyPriceTimeDtl['cal_id'];?>]" readonly="readonly" value="<?php echo $arrDailyPriceTimeDtl['capacity'];?>" /></td>
															<?php 
															}
														}
													 ?>
                                                </tr>
                                                <tr>
                                                    <td>Available Capactiy</td>
													<?php 
													foreach($arrDailyPrice[$store_index]['date'] as $arrDateValDtl2)
													{
														foreach($arrDateValDtl2 as $key=>$arrDailyPriceTimeDtl)
														{?>
														<td><input class="validate[required] td_activity_N" type="text" name="capacity[<?php echo $key."_".$arrDailyPriceTimeDtl['cal_id'];?>]" id="capacity[<?php echo $key."_".$arrDailyPriceTimeDtl['cal_id'];?>]" value="<?php echo $arrDailyPriceTimeDtl['avl_capacity'];?>" />
														</td>
														<?php 
														}
													}?>
                                                </tr>
                                             <?php 
												foreach($arrDailyPrice as $arrDateVal)
												{?>
												<tr id="<?php echo $arrDateVal['id'];?>">
													<td><?php echo $arrDateVal['price_type_name'];?></td>
													<?php 
														foreach($arrDateVal['date'] as $arrDateVal2)
														{
															foreach($arrDateVal2 as $key=>$arrDailyPriceTimeDtl)
															{
															?>
															<td>
															<?php 
																if(count($arrDailyPriceTimeDtl)>0){
															?>
															<div style="float:left; width:100%;">
                                                            	<div style="float:left;width:100%">
                                                            	<span style="width:100%;float:left;">Is Dicount:</span> 
                                                                <span style="width:100%;float:right;"><input type="checkbox" name="is_discount[<?php echo $key."_".$arrDailyPriceTimeDtl['cal_id'];?>]" id="<?php echo "is_discount".$key."_".$arrDailyPriceTimeDtl['cal_id'];?>" <?php if($arrDailyPriceTimeDtl['discounted']=='yes'){?> checked="checked" <?php }?> onclick="check_validation('<?php echo $key."_".$arrDailyPriceTimeDtl['cal_id'];?>')" /></span>
                                                                </div>
                                                                <div style="float:left;width:100%">
                                                                <span style="width:100%;float:left;">Dis. Price:</span> 
                                                                <span style="width:100%;float:right;"><input type="text" name="discount_val[<?php echo $key."_".$arrDailyPriceTimeDtl['cal_id'];?>]" id="<?php echo "discount_val".$key."_".$arrDailyPriceTimeDtl['cal_id'];?>" value="<?php echo $arrDailyPriceTimeDtl['discounted_price'];?>" class="td_activity_N" /></span>
                                                                </div>
                                                                <div style="float:left;width:100%;">
                                                                <span  style="width:100%;float:left;">Main Price:</span>
                                                                <span style="width:100%;float:right;"><input class="validate[required] td_activity_N" type="text" name="price[<?php echo $key."_".$arrDailyPriceTimeDtl['cal_id']?>]" id="<?php echo "price".$key."_".$arrDailyPriceTimeDtl['cal_id'];?>" value="<?php echo $arrDailyPriceTimeDtl['price'];?>" onblur="check_validation('<?php echo $key."_".$arrDailyPriceTimeDtl['cal_id'];?>')" /></span>
                                                                </div>
                                                                </div>	
															<?php 
															}
															else
															{
															?><font color="#FF0000">Not Available.</font><?php
															}
															?>	
                                                            </td>  	
														<?php }
															}
													?>
												</tr>
												<?php 
												}?>
                                                <tr>
                                                    <td>&nbsp;
                                                   
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
								</div>
								<div class="clear"></div> 
				</div><div class="clear"></div>                                            
		<footer>
            <div class="submit_link">
					<input type="submit" name="btnSubmit" id="btnSubmit" value="Update" class="alt_btn">
				<input type="button" name="btnCancel" id="btnCancel" value="Cancel" class="btn_cancel">
            </div>
		</footer>
		
</article><!-- end of post new article -->
</form>
	<div class="spacer"></div>
</section>
</body>
</html>