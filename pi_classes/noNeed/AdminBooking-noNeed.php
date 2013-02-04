<?php
require_once dirname(__FILE__) . '/AbstractDB.php';
require_once dirname(__FILE__)."/commonSetting.php";

class AdminBooking extends AbstractDB
{
	// Definitions
	private
		$result;
	// Constructor
	
	public function __construct()
	{
		parent::__construct();
		$this->result = NULL;
		return true;
	}

	public function numofrows()
	{
		return mysql_num_rows($this->result);		
	}	

    public function getAllRow()
    { 
	    while($this->row=mysql_fetch_assoc($this->result))
		{
		    return $this->row;
		}
	}	
	public function getRow()
	{
		if($this->row = mysql_fetch_assoc($this->result))
		   {
			return $this->row;
	       }	
		return false;
	}		
	
	public function getAllActivityDtl($activity_string){
		$sql="select act.activity_id,act.activity_booker_name,act.description,act.active,sup.company_name,cnt.country_name,city.city_name from `".parent::SUFFIX."booker_activities` as act inner join `".parent::SUFFIX."supplier_details` as sup on act.user_id=sup.user_id inner join `".parent::SUFFIX."country` as cnt on act.country_id=cnt.country_id inner join `".parent::SUFFIX."city` as city on act.city_id=city.city_id where act.`active`='yes' and act.`activity_id` in (".$activity_string.")";
		$this->result=$this->query($sql);
	}
	
	public function getAllActivity_ids()
	{
		// fetch all activities matching city id from calender for now and next days
		 $sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code FROM ".parent::SUFFIX."calender cal 
							  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
							  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
							  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
							  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
							  where cal_date >= curdate() and opd.price_type_name='Adult Price' and act.active='yes' and cal.is_price='yes' group by act.activity_id ";
		$this->result=$this->query($sqlActsFromCalender);
		$arrActivities=array();
		while($this->getRow())
		{
				$arrActivities[]=array('activity_id'=>$this->getField("activity_id"));
		}
		return $arrActivities;
}
	
	public function getAllActivityDtlPage($start,$limit,$sort,$type,$activity_string){
		if($type==''){
			$type="DESC";
		}
		if($sort==''){
			$sort='activity_id ';
		}		
		$sql="select act.activity_id,act.activity_booker_name,act.description,act.active,sup.company_name,cnt.country_name,city.city_name from `".parent::SUFFIX."booker_activities` as act inner join `".parent::SUFFIX."supplier_details` as sup on act.user_id=sup.user_id inner join `".parent::SUFFIX."country` as cnt on act.country_id=cnt.country_id inner join `".parent::SUFFIX."city` as city on act.city_id=city.city_id where act.`active`='yes' and act.`activity_id` in (".$activity_string.") order by ". $sort ." ".$type." LIMIT $start, $limit";
		$this->result=$this->query($sql);
	}
	
	public function getAllSearchActivityDtl($act_name,$cmp_name,$cnt_name,$city_name,$date,$activity_string){
		if($act_name!=''){
			$act_name=" and act.activity_booker_name like '%".$act_name."%'";	
		}else{
			$act_name='';	
		}
		if($cmp_name!=''){
			$cmp_name=" and sup.company_name like '%".$cmp_name."%'";	
		}else{
			$cmp_name='';	
		}
		if($cnt_name!=''){
			$cnt_name=" and cnt.country_name like '%".$cnt_name."%'";	
		}else{
			$cnt_name='';	
		}
		if($city_name!=''){
			$city_name=" and city.city_name like '%".$city_name."%'";	
		}else{
			$city_name='';	
		}
		
		if($date!=''){
			$act_date=" and cal.cal_date='".date("Y-m-d",strtotime($date))."'";	
		}else{
			$date='';	
		}
		
		$sql="select distinct(act.activity_id),act.activity_booker_name,act.description,act.active,sup.company_name,cnt.country_name,city.city_name,cal.cal_date from `".parent::SUFFIX."booker_activities` as act inner join `".parent::SUFFIX."supplier_details` as sup on act.user_id=sup.user_id inner join `".parent::SUFFIX."country` as cnt on act.country_id=cnt.country_id inner join `".parent::SUFFIX."city` as city on act.city_id=city.city_id inner join `".parent::SUFFIX."calender` as cal on act.activity_id=cal.activity_id where act.`active`='yes' and act.`activity_id` in (".$activity_string.") ".$act_name." ".$cmp_name."  ".$cnt_name." ".$city_name." ".$act_date." group by act.activity_id ";
		$this->result=$this->query($sql);
	}
	
	public function getAllSearchActivityDtlPage($start,$limit,$sort,$type,$act_name,$cmp_name,$cnt_name,$city_name,$date,$activity_string){
		if($act_name!=''){
			$act_name=" and act.activity_booker_name like '%".$act_name."%'";	
		}else{
			$act_name='';	
		}
		if($cmp_name!=''){
			$cmp_name=" and sup.company_name like '%".$cmp_name."%'";	
		}else{
			$cmp_name='';	
		}
		if($cnt_name!=''){
			$cnt_name=" and cnt.country_name like '%".$cnt_name."%'";	
		}else{
			$cnt_name='';	
		}
		if($city_name!=''){
			$city_name=" and city.city_name like '%".$city_name."%'";	
		}else{
			$city_name='';	
		}
		if($date!=''){
			$act_date=" and cal.cal_date='".$date."'";	
		}else{
			$date='';	
		}
		if($type==''){
			$type="DESC";
		}
		if($sort==''){
			$sort='activity_id ';
		}		
		 $sql="select distinct(act.activity_id),act.activity_booker_name,act.description,act.active,sup.company_name,cnt.country_name,city.city_name from `".parent::SUFFIX."booker_activities` as act inner join `".parent::SUFFIX."supplier_details` as sup on act.user_id=sup.user_id inner join `".parent::SUFFIX."country` as cnt on act.country_id=cnt.country_id inner join `".parent::SUFFIX."city` as city on act.city_id=city.city_id inner join `".parent::SUFFIX."calender` as cal on act.activity_id=cal.activity_id where act.`active`='yes' and act.`activity_id` in(".$activity_string.") ".$act_name." ".$cmp_name."  ".$cnt_name." ".$city_name." group by act.activity_id order by ". $sort ." ".$type." ".$act_date." LIMIT $start, $limit";
		$this->result=$this->query($sql);
	}
	public function getDefaultImg($id){
		$sql3="select * from ".parent::SUFFIX."activity_photo where activity_id='".$id."' and `default`='1'";
		$this->result=$this->query($sql3);
	}
	
	public function getUserDtl(){
		$sql="select email,first_name, last_name, user_id from ".parent::SUFFIX."user_details where `user_status`='Active' and `user_type`='C'";	
		$this->result=$this->query($sql);
	}
	
	public function getActLastPriceDate($id)
	{
		$sql="select cal.cal_date from `".parent::SUFFIX."sub_activity_detail` as sub join `".parent::SUFFIX."calender` as cal on sub.sub_activity_id = cal.sub_activity_id where sub.activity_id ='".$id."' order by cal.cal_id DESC";	
		$this->result=$this->query($sql);
	}	
	
	public function getActivityById($activity_id){
		$sql="select act.*,act.description as act_description,cnt.country_id,cnt.iso,cnt.country_name,cnt.currency_name,cnt.currency_symbol,cnt.currency_rate,city.city_name,sat.*, sat.id as option_id,sad.*,cal.* from ".parent::SUFFIX."booker_activities act left join ".parent::SUFFIX."country cnt on act.country_id=cnt.country_id left join ".parent::SUFFIX."city city on act.city_id=city.city_id left join ".parent::SUFFIX."sub_activity_type sat on (act.activity_id=sat.activity_id) left join  ".parent::SUFFIX."sub_activity_detail sad on (sat.id=sad.sub_activity_type_id) left join ".parent::SUFFIX."calender cal on (sad.sub_activity_id=cal.sub_activity_id) where act.activity_id='".$activity_id."' and cal.cal_date>='".date("Y-m-d")."' order by cal.price limit 1";
		
		$this->result=$this->query($sql);
	}
	
	public function getActivityById1($activity_id){
		$sql="select act.activity_booker_name,cnt.country_id,cnt.iso,cnt.country_name,cnt.currency_name,cnt.currency_symbol,cnt.currency_rate,city.city_name,photo.* from ".parent::SUFFIX."booker_activities act left join ".parent::SUFFIX."country cnt on act.country_id=cnt.country_id left join ".parent::SUFFIX."city city on act.city_id=city.city_id left join ".parent::SUFFIX."activity_photo photo on (act.activity_id=photo.activity_id) where act.activity_id='".$activity_id."' and photo.`default`='1'";
		
		$this->result=$this->query($sql);
	}
	
	
	public function getSubActivityTypeDtl($sub_act_type_id){
		$sql="select * from `".parent::SUFFIX."sub_activity_type` where id='".$sub_act_type_id."'";	
		$this->result=$this->query($sql);
	}
	
	public function getSubActivityDetail($sub_act_id)
	{
		$sql="select * from `".parent::SUFFIX."sub_activity_detail` where `sub_activity_id`='".$sub_act_id."'";
		$this->result=$this->query($sql);
	}
	
	function getOtherprice($otr)
	{
		$sql="select * from  `".parent::SUFFIX."other_price_details` where id IN (".$otr.")";
		$this->result=$this->query($sql);
	}
	
	/* -------------- function for book activity by admin ------------------------- */ 
	
	public function Booking($post)
	{
		/*echo "<pre>";
		print_r($_SESSION);
		echo "</pre>";
			echo "<hr>";
		echo "<pre>";
			print_r($post);
		echo "</pre>";*/
		$converted_currency_code=$post['currancy_type'];
		$total_discount=0;
		$activity_total_price=0;
		$activity_total_paid=0;
		$activity_total_due=0;
		
		$total_price=0;
		$total_paid=0;
		$total_due=0;
		/*   --------------------- Getting the activity detail and suplier preeferences for calculation -----------------------*/
		$sql="select act.user_id,act.country_id,pre.* from `".parent::SUFFIX."booker_activities` act left join `".parent::SUFFIX."preferences` pre on act.`user_id`=pre.`user_id` where act.`activity_id`='".$_SESSION['act_id']."'";
		$this->result=$this->query($sql);
		$arrSupplierDtl=array();
		while($temp=$this->getAllRow())
		{	
			$arrSupplierDtl=$temp;
		}
 		/*echo "<pre>";
		print_r($arrSupplierDtl);
		echo "</pre>";*/
		$supplier_id=$arrSupplierDtl['user_id'];
		$customer_id=$post['cusroemt'];
		/* creating the reference id by country for activity,current date, activity id , customer id */
		 $refid=$arrSupplierDtl['country_id']."-".date("Y-m-d")."-".$_SESSION['act_id']."-".$customer_id;
		 
		/* setting the status of booking from supplier preference  */ 
				 if($arrSupplierDtl['newbook']='accept_decline')  
				{
					$status="Incomplete";
					$status1="No_Response";
				}
				else
				{
					$status1="Confirmed";
					$status="Completed";
				}
		/* calculating  the last cancel date for activity from supplier preferences for cancelaaation policy  */ 
					$schedule_date=date("Y-m-d",strtotime($_SESSION['date']));
					$noofday=(intval($arrSupplierDtl['cancel'])/24);
					$cancel_day_str="-".$noofday." day";
					$last_cancel_date=date("Y-m-d",strtotime($cancel_day_str,strtotime($schedule_date)));
					
		/* Setting booking condition */
					if($arrSupplierDtl['book']=="full_balance")
					{
						$booking_condition="Full";
					}					
					elseif($arrSupplierDtl['book']=="deposite")
					{
						$booking_condition="Deposit";					
					}
					else
					{
						$booking_condition="Gift";		
					}
		/*------------------ Inserting the record for booking   -----------------------*/

		$sql="insert into `".parent::SUFFIX."booking` (`booking_id`,`refence_id`,`user_id`,`booking_date`,`booking_status`,`booked_by`) values('','".$refid."','".$customer_id."','".date("Y-m-d")."','".$status."','admin')";
		$this->result=$this->query($sql);
	
		$last_Booking_id=$this->getLastId();
		
		$activity_total_price=0;
		$activity_total_paid=0;
		$activity_total_due=0;
		
		foreach($_SESSION["activity".$_SESSION['act_id']] as $sub_act_id=>$pricing)
			{ ### Loop start for activity
				/* ------------ Getting the activity and sub actvity detail  ----------------*/
				$sql="select act.activity_booker_name as activity_name,sub.sub_activity_name as sub_act_name,subDtl.* from `".parent::SUFFIX."booker_activities` act left join `".parent::SUFFIX."sub_activity_type` sub on act.activity_id=sub.activity_id left join `".parent::SUFFIX."sub_activity_detail` subDtl on sub.id=subDtl.sub_activity_type_id where act.activity_id='".$_SESSION['act_id']."' and subDtl.`sub_activity_type_id`='".$sub_act_id."'";
				$this->result=$this->query($sql);
					$arrSubActDtl=array();
					while($temp=$this->getAllRow())
					{	
						$arrSubActDtl=$temp;
					}
/*					echo "<pre>";
					print_r($arrSubActDtl);
					echo  "</pre>";
*/					  $sql="insert into `".parent::SUFFIX."booking_details` (`booking_details_id`,`booking_id`,`user_id`,`supplier_id`,`activity_id`,`sub_activity_id`,`activity_name`,`sub_activity_name`,`booking_condition`,`paid_currency`,`activity_currency`,`activity_conducted_status`,`schedule_date`,`cancel_day`,`last_cancel_date`,`extra_note`,`booking_status`) values('','".$last_Booking_id."','".$customer_id."','".$supplier_id."','".$_SESSION['act_id']."','".$sub_act_id."','".$arrSubActDtl['activity_name']."','".$arrSubActDtl['sub_act_name']."','".$booking_condition."','".$post['currancy_type']."','".$arrSubActDtl['currency_code']."','No','".$schedule_date."','".$noofday."','".$last_cancel_date."','".$post['extra_note']."','".$status1."')";
					$this->result=$this->query($sql);
					$activity_currency=$arrSubActDtl['currency_code'];
					$last_booking_detail_id=$this->getLastId();
					
					$sub_act_tot_price=0;
					$sub_act_tot_paid=0;					
					$sub_act_tot_due=0;
					
					$sub_act_tot_price_of_activity=0;
					$sub_act_tot_paid_of_activity=0;					
					$sub_act_tot_due_of_activity=0;
					
					$sub_act_tot_price_of_activity_in_NZD=0;
					$sub_act_tot_paid_of_activity_in_NZD=0;					
					$sub_act_tot_due_of_activity_in_NZD=0;

				foreach($pricing as $priceTypeID=>$priceTypeDtl)
				{ ### Loop start for subactivity
					if($priceTypeDtl['qty']==0)
					{
					}
					else
					{
						$qty=$_SESSION["activity".$_SESSION['act_id']][$sub_act_id][$priceTypeID]['qty']; 
						//$price=$_SESSION["activity".$_SESSION['act_id']][$sub_act_id][$priceTypeID]['price'];
						$activity_price=$_SESSION["activity".$_SESSION['act_id']][$sub_act_id][$priceTypeID]['price'];
						$total_price_of_activity=floatval($qty)*floatval($activity_price);
						$activity_currency;
						$total_price_in_NZD=convert_currency($activity_currency,"NZD",$total_price_of_activity);
						$sub_act_tot_price_of_activity+=$total_price_of_activity;
						$sub_act_tot_price_of_activity_in_NZD+=$total_price_in_NZD;
						
						$price=convert_currency($activity_currency,$converted_currency_code,$_SESSION["activity".$_SESSION['act_id']][$sub_act_id][$priceTypeID]['price']);
						
						$time=$_SESSION["activity".$_SESSION['act_id']][$sub_act_id][$priceTypeID]['time'];
						$totprice=floatval($qty)*floatval($price);
						$sub_act_tot_price=$sub_act_tot_price+$totprice;
						
						#id 	activity_id 	sub_activity_id 	booking_detail_id 	booking_quantity 	unit_price 	total_price 	price_type 	departure_time 	cancel_day 	last_cancel_date 	is_cancel 	cancel_date 	cancel_amount
						$sql="insert into `".parent::SUFFIX."booking_record_details` (`id`,`activity_id`,`sub_activity_id`,`booking_detail_id`,`booking_quantity`,`unit_price`,`total_price`,`activity_unit_price`,`activity_total_price`,`price_type`,`departure_time`,`cancel_day`,`last_cancel_date`) values('','".$_SESSION['act_id']."','".$sub_act_id."','".$last_booking_detail_id."','".$qty."','".$price."','".$totprice."','".$activity_price."','".$total_price_of_activity."','".$priceTypeID."','".$time."','".$noofday."','".$last_cancel_date."')";
						$this->result=$this->query($sql);
					}
					
				}### Loop End for sub activity
				if($arrSupplierDtl['book']=="full_balance")
				{
						$sub_act_tot_paid=$sub_act_tot_price;
						$sub_act_tot_paid_of_activity=$sub_act_tot_price_of_activity;
						$sub_act_tot_paid_of_activity_in_NZD=$sub_act_tot_price_of_activity_in_NZD;
						
					
				}
				elseif($arrSupplierDtl['book']=="deposit")
				{
						$sub_act_tot_paid=(floatval($arrSubActDtl['commission_amt'])*$sub_act_tot_price)/100;
						$sub_act_tot_paid_of_activity=(floatval($arrSubActDtl['commission_amt'])*$sub_act_tot_price_of_activity)/100;
						$sub_act_tot_paid_of_activity_in_NZD=convert_currency($activity_currency,"NZD",$sub_act_tot_paid_of_activity);
				}
				
				$sub_act_tot_due=floatval($sub_act_tot_price)-floatval($sub_act_tot_paid);
				$sub_act_tot_due_of_activity=floatval($sub_act_tot_price_of_activity)-floatval($sub_act_tot_paid_of_activity);
				$sub_act_tot_due_of_activity_in_NZD=floatval($sub_act_tot_price_of_activity_in_NZD)-floatval($sub_act_tot_paid_of_activity_in_NZD);
				
				$total_price=$total_price+$sub_act_tot_price;
				$total_paid=$total_paid+$sub_act_tot_paid;
				$total_due=$total_due+$sub_act_tot_due;
				
				$activity_total_price=$activity_total_price+$sub_act_tot_price_of_activity_in_NZD;
				$activity_total_paid=$activity_total_paid+$sub_act_tot_paid_of_activity_in_NZD;
				$activity_total_due=$activity_total_due+$sub_act_tot_due_of_activity_in_NZD;
				
				/*--------------  Uddating the price for each sub activity   ----------------*/
				 $sql="update `".parent::SUFFIX."booking_details` set `total_price`='".$sub_act_tot_price."',`total_paid`='".$sub_act_tot_paid."',`total_due`='".$sub_act_tot_due."',`activity_total_price`='".$sub_act_tot_price_of_activity."',`activity_total_paid`='".$sub_act_tot_paid_of_activity."',`activity_total_due`='".$sub_act_tot_due_of_activity."' where booking_details_id='".$last_booking_detail_id."'";
				$this->result=$this->query($sql);
			}### Loop End for activity
			
			$activity_total_real_paid=$activity_total_price-$discount_amout;
			$total_real_paid=$total_price-$discount_amout;
			
			
			
				/*--------------  Uddating the price for activity   ----------------*/
				// total_price 	total_paid 	total_paid_real 	activity_tot_discount
				//activity_tot_price 	activity_tot_paid 	activity_tot_paid_real
			$sql="update `".parent::SUFFIX."booking` set `total_price`='".$total_price."',`total_paid`='".$total_paid."',`total_paid_real`='".$total_real_paid."',`activity_tot_price`='".$activity_total_price."',`activity_tot_paid`='".$activity_total_paid."',`activity_tot_paid_real`='".$activity_total_real_paid."' where booking_id='".$last_Booking_id."'";
			
				$this->result=$this->query($sql);
	}
	
	/* -------------- function for book activity by admin end here ------------------------- */ 
	
	public function getSubActDtl($sub_act_id)
	{
		$sql="select `sub_activity_name` from `".parent::SUFFIX."sub_activity_type` where `id`='".$sub_act_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getPriceTypeDtl($act_id,$sub_act_id,$priceid,$timeid)
	{
			$time_id=explode("_",$timeid);
		 $sql="select act.activity_booker_name,sub.`currency_code`,cntry.*,otpr.`price_type_name`,ats.* from `".parent::SUFFIX."booker_activities` act left join `".parent::SUFFIX."sub_activity_detail` sub on act.activity_id=sub.activity_id left join `".parent::SUFFIX."country` cntry on sub.`currency_code`=cntry.`currency_code` left join `".parent::SUFFIX."other_price_details` otpr on sub.`sub_activity_id`=otpr.`sub_activity_id` left join `".parent::SUFFIX."activity_time_schedule` ats on act.activity_id=ats.activity_id where sub.`sub_activity_id`='".$sub_act_id."' and otpr.`id`='".$priceid."' and ats.`time_schedule_id`='".$time_id[3]."'";
		$this->result=$this->query($sql);
	}
	
	
	###################   Admin Booking Function start here #############################
		
	public function getAdminBooking($type)
	{
		/*$today = date("Y-m-d");
		if($type=="today"){
			$condition="bkdtl.`schedule_date`='".$today."' and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
		}elseif($type=="tomorrow"){
			$today=date("Y-m-d",strtotime("+1 day",strtotime($today)));
			$condition="bkdtl.`schedule_date`='".$today."' and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
			
		}elseif($type=="future")
		{
			$today=date("Y-m-d",strtotime("+1 day",strtotime($today)));
			$condition="( bkdtl.`schedule_date`>'".$today."' or bkdtl.`booking_condition`='Gift' ) and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
		}elseif($type=="past")
		{
			$condition="(bkdtl.`schedule_date`<'".$today."' and bkdtl.`schedule_date`!='0000-00-00' ";
		}elseif($type=="cancel")
		{
			$condition="bkdtl.`cancel_status`='Cancel' and  bkrcdtl.`is_cancel`='Yes'";
		}
		$sql="select bk.booking_id, bk.`refence_id`,bk.`booking_date`,bkdtl.*,bkrcdtl.*,act.`activity_booker_name`,cntry.`country_name`,ct.`city_name`,usr.`email`,usr.`first_name`,usr.`last_name`,suppdtl.`company_name` from  `".parent::SUFFIX."booking` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id` left join `".parent::SUFFIX."booker_activities` act on bkdtl.`activity_id`=act.`activity_id` left join `".parent::SUFFIX."country` cntry on act.`country_id`=cntry.`country_id` left join `".parent::SUFFIX."city` ct on act.`city_id`=ct.`city_id` left join `".parent::SUFFIX."user_details` usr on bk.`user_id`=usr.`user_id` left join `".parent::SUFFIX."supplier_details` suppdtl on bkdtl.`supplier_id`=suppdtl.`user_id` where ".$condition." and bk.`user_deleted`='No' and	bk.`supplier_deleted`='No' and bk.`admin_deleted`='No' group by bkdtl.`booking_id`";
		$this->result=$this->query($sql);*/
		
		$today = date("Y-m-d");
		if($type=="today"){
			$condition="bkdtl.`schedule_date`='".$today."' and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
			$selectfiled=",bkrcdtl.*";
			$querysubstr="left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id`";
			$condition2="group by bkdtl.`schedule_date`,bkdtl.`booking_id`,bkdtl.`activity_id`";
		}elseif($type=="tomorrow"){
			$today=date("Y-m-d",strtotime("+1 day",strtotime($today)));
			$condition="bkdtl.`schedule_date`='".$today."' and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
			$selectfiled=",bkrcdtl.*";
			$querysubstr="left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id`";
			$condition2="group by bkdtl.`schedule_date`,bkdtl.`booking_id`,bkdtl.`activity_id`";
		}elseif($type=="future"){
			$today=date("Y-m-d",strtotime("+1 day",strtotime($today)));
			$selectfiled=",bkrcdtl.*";
			$querysubstr="left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id`";
			$condition="(bkdtl.`schedule_date`>'".$today."' or bkdtl.`booking_condition`='Gift') and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
			$condition2="group by bkdtl.`schedule_date`,bkdtl.`booking_id`,bkdtl.`activity_id`";
		}elseif($type=="past"){
			$selectfiled="";
			$querysubstr="";
			$condition="bkdtl.`schedule_date`<'".$today."'";
			$condition2="";
		}elseif($type=="cancel")
		{
			$selectfiled="";
			$querysubstr="";
			//$querysubstr="left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id`"
			//$condition="bkdtl.`schedule_date`>'".$today."' and bkdtl.`cancel_status`='Cancel' and  bkrcdtl.`is_cancel`='yes'";
			$condition="bkdtl.`schedule_date`>'".$today."' and bkdtl.`cancel_status`='Cancel'";
			$condition2="";
		}
		$sql="select bk.*,bkdtl.*".$selectfiled.",act.`activity_booker_name`,cntry.`country_name`,ct.`city_name`,usr.`email`,usr.`first_name`,usr.`last_name`,suppdtl.`company_name` from  `".parent::SUFFIX."booking` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` ".$querysubstr." left join `".parent::SUFFIX."booker_activities` act on bkdtl.`activity_id`=act.`activity_id` left join `".parent::SUFFIX."country` cntry on act.`country_id`=cntry.`country_id` left join `".parent::SUFFIX."city` ct on act.`city_id`=ct.`city_id` left join `".parent::SUFFIX."user_details` usr on bk.`user_id`=usr.`user_id` left join `".parent::SUFFIX."supplier_details` suppdtl on bkdtl.`supplier_id`=suppdtl.`user_id` where ".$condition." and bk.`user_deleted`='No' and	bk.`supplier_deleted`='No' and bk.`admin_deleted`='No' ".$condition2."";  
		$this->result=$this->query($sql);
		
		
	}
	
	public function getAdminBookingPage($start, $limit,$sort, $sorttype, $type)
	{
		if($sorttype==''){
			$sorttype="ASC ";
		}
		if($sort==''){
			$sort='refence_id ';
		}		
	
		/*$today = date("Y-m-d");
		if($type=="today"){
			$condition="bkdtl.`schedule_date`='".$today."' and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
		}elseif($type=="tomorrow"){
			$today=date("Y-m-d",strtotime("+1 day",strtotime($today)));
			$condition="bkdtl.`schedule_date`='".$today."' and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
		}elseif($type=="future")
		{
			$today=date("Y-m-d",strtotime("+1 day",strtotime($today)));
			$condition="(bkdtl.`schedule_date`>'".$today."' or bkdtl.`booking_condition`='Gift') and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
		}elseif($type=="past")
		{
			$condition="(bkdtl.`schedule_date`<'".$today."' and bkdtl.`schedule_date`!='0000-00-00' ";
		}elseif($type=="cancel")
		{
			$condition="bkdtl.`cancel_status`='Cancel' and  bkrcdtl.`is_cancel`='Yes'";
		}
		$sql="select bk.booking_id, bk.`refence_id`,bk.`booking_date`,bkdtl.*,bkrcdtl.*,act.`activity_booker_name`,cntry.`country_name`,ct.`city_name`,usr.`email`,usr.`first_name`,usr.`last_name`,suppdtl.`company_name` from  `".parent::SUFFIX."booking` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id` left join `".parent::SUFFIX."booker_activities` act on bkdtl.`activity_id`=act.`activity_id` left join `".parent::SUFFIX."country` cntry on act.`country_id`=cntry.`country_id` left join `".parent::SUFFIX."city` ct on act.`city_id`=ct.`city_id` left join `".parent::SUFFIX."user_details` usr on bk.`user_id`=usr.`user_id` left join `".parent::SUFFIX."supplier_details` suppdtl on bkdtl.`supplier_id`=suppdtl.`user_id` where ".$condition." and bk.`user_deleted`='No' and	bk.`supplier_deleted`='No' and bk.`admin_deleted`='No' group by bkdtl.`booking_id` order by ". $sort ." ".$sorttype." LIMIT $start, $limit";
		$this->result=$this->query($sql);
		*/
		
		$today = date("Y-m-d");
		if($type=="today"){
			$condition="bkdtl.`schedule_date`='".$today."' and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
			$selectfiled=",bkrcdtl.*";
			$querysubstr="left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id`";
			$condition2="group by bkdtl.`schedule_date`,bkdtl.`booking_id`,bkdtl.`activity_id`";
		}elseif($type=="tomorrow"){
			$today=date("Y-m-d",strtotime("+1 day",strtotime($today)));
			$condition="bkdtl.`schedule_date`='".$today."' and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
			$querysubstr="left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id`";
			$condition2="group by bkdtl.`schedule_date`,bkdtl.`booking_id`,bkdtl.`activity_id`";
			$selectfiled=",bkrcdtl.*";
		}elseif($type=="future"){
			$today=date("Y-m-d",strtotime("+1 day",strtotime($today)));
			$selectfiled=",bkrcdtl.*";
			$querysubstr="left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id`";
			$condition="(bkdtl.`schedule_date`>'".$today."' or bkdtl.`booking_condition`='Gift') and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
			$condition2="group by bkdtl.`schedule_date`,bkdtl.`booking_id`,bkdtl.`activity_id`";
		}elseif($type=="past"){
			$selectfiled="";
			$querysubstr="";
			$condition="bkdtl.`schedule_date`<'".$today."'";
			$condition2="";
		}elseif($type=="cancel")
		{
			$selectfiled="";
			$querysubstr="";
			//$querysubstr="left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id`"
			//$condition="bkdtl.`schedule_date`>'".$today."' and bkdtl.`cancel_status`='Cancel' and  bkrcdtl.`is_cancel`='yes'";
			$condition="bkdtl.`schedule_date`>'".$today."' and bkdtl.`cancel_status`='Cancel'";
			$condition2="";
		}
		$sql="select bk.*,bkdtl.*".$selectfiled.",act.`activity_booker_name`,cntry.`country_name`,ct.`city_name` ,usr.`email`,usr.`first_name`,usr.`last_name`,suppdtl.`company_name` from  `".parent::SUFFIX."booking` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` ".$querysubstr." left join `".parent::SUFFIX."booker_activities` act on bkdtl.`activity_id`=act.`activity_id` left join `".parent::SUFFIX."country` cntry on act.`country_id`=cntry.`country_id` left join `".parent::SUFFIX."city` ct on act.`city_id`=ct.`city_id` left join `".parent::SUFFIX."user_details` usr on bk.`user_id`=usr.`user_id` left join `".parent::SUFFIX."supplier_details` suppdtl on bkdtl.`supplier_id`=suppdtl.`user_id` where ".$condition." and bk.`user_deleted`='No' and	bk.`supplier_deleted`='No' and bk.`admin_deleted`='No' ".$condition2." order by ". $sort ." ".$sorttype." LIMIT $start, $limit";
		$this->result=$this->query($sql);
		
	}
	
	
	public function getBookingDetailById($booking_id)
	{
		$sql="select usr.first_name,usr.last_name,usr.email,bkdtl.*,bk.*,supp.company_name from `".parent::SUFFIX."booking` bk left join `".parent::SUFFIX."user_details` usr on usr.`user_id`=bk.`user_id` left join `".parent::SUFFIX."booking_details` bkdtl on bkdtl.`booking_id`=bk.`booking_id` left join `".parent::SUFFIX."supplier_details` supp on supp.`user_id`=bkdtl.`supplier_id` where bk.`booking_id`='".$booking_id."' limit 1";
		$this->result=$this->query($sql);
	}
	
	public function bookingActivityDetail($type,$booking_id)
	{
		$today = date("Y-m-d");
		if($type=="today"){
			$condition="bkdtl.`schedule_date`='".$today."' and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
		}elseif($type=="tomorrow"){
			$today=date("Y-m-d",strtotime("+1 day",strtotime($today)));
			$condition="bkdtl.`schedule_date`='".$today."' and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
		}elseif($type=="future")
		{
			$today=date("Y-m-d",strtotime("+1 day",strtotime($today)));
			$condition="(bkdtl.`schedule_date`>'".$today."' or bkdtl.`booking_condition`='Gift') and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
		}elseif($type=="past")
		{
			$condition="bkdtl.`schedule_date`<'".$today."'";
		}elseif($type=="cancel")
		{
			$condition="bkdtl.`cancel_status`='Cancel' and  bkrcdtl.`is_cancel`='Yes'";
		}
		$sql="select bk.*,bkdtl.*,bkrcdtl.*,act.activity_booker_name,cntry.country_name,ct.city_name from `".parent::SUFFIX."booking_details` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id` left join `".parent::SUFFIX."booker_activities` act on bk.`activity_id`=act.`activity_id` left join `".parent::SUFFIX."country` cntry on act.`country_id`=cntry.`country_id` left join `".parent::SUFFIX."city` ct on act.`city_id`=ct.`city_id`  where bk.`booking_id`='".$booking_id."' and ".$condition." group by bkdtl.`schedule_date`,bkdtl.`activity_id`";
		$this->result=$this->query($sql);
	}
	
	public function getGiftVoucherDetail($booking_id)
	{
		$sql="select * from `".parent::SUFFIX."gift_voucher` where `booking_id`='".$booking_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getSubactivity_ids($act_id,$booking_id,$schedule_date)
	{
		$sql="select `sub_activity_id`,`sub_activity_name` from `".parent::SUFFIX."booking_details` where `activity_id`='".$act_id."' and `booking_id`='".$booking_id."' and `schedule_date`='".$schedule_date."'";
		$this->result=$this->query($sql);
	}
	
	public function getSumOfPrices($act_id,$booking_id,$schedule_date)
	{
		//left join ".parent::SUFFIX."country cntry on bkdtl.activity_currency=cntry.currency_code
		$sql="select bk.booking_id,sum(bkdtl.discount_amount) as total_discount,sum(bkdtl.total_price) as total_price,sum(bkdtl.total_paid) as total_paid,sum(bkdtl.total_due) as total_due,sum(bkdtl.activity_discount_amount) as activity_total_discount,sum(bkdtl.activity_total_price) as activity_total_price,sum(bkdtl.activity_total_paid) as activity_total_paid,sum(bkdtl.activity_total_due) as activity_total_due,bkdtl.paid_currency,bkdtl.activity_currency from ".parent::SUFFIX."booking bk left join ".parent::SUFFIX."booking_details bkdtl on bk.booking_id=bkdtl.booking_id  where bk.booking_id='".$booking_id."' and bkdtl.activity_id='".$act_id."' and bkdtl.schedule_date='".$schedule_date."'";
		$this->result=$this->query($sql);
	}
	
	public function getPaidCurrancy($act_id,$booking_id)
	{
		$sql="select bk.booking_id,bkdtl.paid_currency,cntry.currency_symbol as activity_symbol,cntry1.currency_symbol as paid_symbol from ".parent::SUFFIX."booking bk left join ".parent::SUFFIX."booking_details bkdtl on bk.booking_id=bkdtl.booking_id left join ".parent::SUFFIX."country cntry on bkdtl.activity_currency=cntry.currency_code left join ".parent::SUFFIX."country cntry1 on bkdtl.paid_currency=cntry1.currency_code where bk.booking_id='".$booking_id."' and bkdtl.activity_id='".$act_id."' limit 1";
		$this->result=$this->query($sql);
	}
	
	public function getSubActDtl1($type,$booking_id,$sub_act_id)
	{
		$today = date("Y-m-d");
		if($type=="today"){
			$condition="bkdtl.`schedule_date`='".$today."' and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
		}elseif($type=="tomorrow"){
			$today=date("Y-m-d",strtotime("+1 day",strtotime($today)));
			$condition="bkdtl.`schedule_date`='".$today."' and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
		}elseif($type=="future")
		{
			$today=date("Y-m-d",strtotime("+1 day",strtotime($today)));
			$condition="bkdtl.`schedule_date`>'".$today."' and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
		}elseif($type=="past")
		{
			$condition="bkdtl.`schedule_date`<'".$today."'";
		}elseif($type=="cancel")
		{
			$condition="bkdtl.`cancel_status`='Cancel' and  bkrcdtl.`is_cancel`='Yes'";
		}
		
		//left join `".parent::SUFFIX."country` cntry on bkdtl.`activity_currency`=cntry.`currency_code`  
		$sql="select bk.booking_id,bkdtl.*,bkrcdtl.*,tsi.*,otpr.* from `".parent::SUFFIX."booking` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id` left join `".parent::SUFFIX."activity_time_schedule` tsi on tsi.`time_schedule_id`=bkrcdtl.`departure_time` left join `".parent::SUFFIX."other_price_details` otpr on bkrcdtl.`price_type`=otpr.`id`  where bk.`booking_id`='".$booking_id."' and ".$condition." and bkrcdtl.`sub_activity_id`='".$sub_act_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getSubActDtl2($type,$booking_id,$sub_act_id,$schedule_date)
	{
		$today = date("Y-m-d");
		if($type=="today"){
			$condition="bkdtl.`schedule_date`='".$schedule_date."' and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
		}elseif($type=="tomorrow"){
			$today=date("Y-m-d",strtotime("+1 day",strtotime($today)));
			$condition="bkdtl.`schedule_date`='".$schedule_date."' and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
		}elseif($type=="future")
		{
			$today=date("Y-m-d",strtotime("+1 day",strtotime($today)));
			$condition="bkdtl.`schedule_date`='".$schedule_date."' and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
		}elseif($type=="past")
		{
			$condition="bkdtl.`schedule_date`='".$schedule_date."'";
		}elseif($type=="cancel")
		{
			$condition="bkdtl.`schedule_date`='".$schedule_date."' and bkdtl.`cancel_status`='Cancel' and  bkrcdtl.`is_cancel`='Yes'";
		}
		
			
		//left join `".parent::SUFFIX."country` cntry on bkdtl.`activity_currency`=cntry.`currency_code`  
		$sql="select bk.booking_id,bkdtl.*,bkrcdtl.*,bkrcdtl.id as booking_record_id,tsi.*,otpr.* from `".parent::SUFFIX."booking` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id` left join `".parent::SUFFIX."activity_time_schedule` tsi on tsi.`time_schedule_id`=bkrcdtl.`departure_time` left join `".parent::SUFFIX."other_price_details` otpr on bkrcdtl.`price_type`=otpr.`id`  where bk.`booking_id`='".$booking_id."' and ".$condition." and bkrcdtl.`sub_activity_id`='".$sub_act_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getBookingPersonDtl($activity_id,$sub_act_id,$booking_record_detail_id)
	{
		$sql="select bkrcprdtl.*,otr.`price_type_name`,cntry.`country_name` from `".parent::SUFFIX."booking_record_person_detail` bkrcprdtl left join `".parent::SUFFIX."other_price_details` otr on bkrcprdtl.`price_type_id`=otr.`id` left join `".parent::SUFFIX."country` cntry on bkrcprdtl.`country_id`=cntry.`country_id` where bkrcprdtl.`activity_id`='".$activity_id."' and  bkrcprdtl.`sub_activity_id`='".$sub_act_id."' and bkrcprdtl.`booking_record_detail_id`='".$booking_record_detail_id."'";
		$this->result=$this->query($sql);
	}
	
	###################   Supplier Booking Function start here #############################	
	
	public function getAdminBookingBySearch($arr)
	{
		$condition='1 ';
		if($arr['from_schedule_date']!=""){
			$condition.=" and bkdtl.`schedule_date`>='".$arr['from_schedule_date']."'";
		}
		if($arr['to_schedule_date']!=""){
			$condition.=" and bkdtl.`schedule_date`<='".$arr['to_schedule_date']."'";
		}
		if($arr['reference_id']!=""){
			$condition.=" and bk.`refence_id`  like '%".$arr['reference_id']."%'";
		}
		if($arr['activity_name']!=""){
			$condition.=" and act.`activity_booker_name`  like '%".$arr['activity_name']."%'";
		}
		if($arr['first_name']!=""){
			$condition.=" and usr.`first_name`  like '%".$arr['first_name']."%'";
		}
		if($arr['last_name']!=""){
			$condition.=" and usr.`last_name`  like '%".$arr['last_name']."%'";
		}
		if($arr['customer_email']!=""){
			$condition.=" and usr.`email`  like '%".$arr['customer_email']."%'";
		}
		
		if($type==''){
			$type="DESC";
		}
		if($sort==''){
			$sort='add_date ';
		}	
			
		
		
		$sql="select bk.*,bkdtl.*,bkrcdtl.*,act.`activity_booker_name`,cntry.`country_name`,ct.`city_name`,usr.`email`,usr.`first_name`,usr.`last_name` from  `".parent::SUFFIX."booking` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id` left join `".parent::SUFFIX."booker_activities` act on bkdtl.`activity_id`=act.`activity_id` left join `".parent::SUFFIX."country` cntry on act.`country_id`=cntry.`country_id` left join `".parent::SUFFIX."city` ct on act.`city_id`=ct.`city_id` left join `".parent::SUFFIX."user_details` usr on bk.`user_id`=usr.`user_id` where ".$condition." and bk.`user_deleted`='No' and	bk.`supplier_deleted`='No' and bk.`admin_deleted`='No' group by bkdtl.`schedule_date`,bkdtl.`booking_id`,bkdtl.`activity_id`";
		$this->result=$this->query($sql);
	}
	
	public function getAdminBookingBySearchPage($start, $limit,$sort, $type,$arr)
	{
		$condition='1 ';
		if($arr['from_schedule_date']!=""){
			$condition.=" and bkdtl.`schedule_date`>='".$arr['from_schedule_date']."'";
		}
		if($arr['to_schedule_date']!=""){
			$condition.=" and bkdtl.`schedule_date`<='".$arr['to_schedule_date']."'";
		}
		if($arr['reference_id']!=""){
			$condition.=" and bk.`refence_id`  like '%".$arr['reference_id']."%'";
		}
		if($arr['activity_name']!=""){
			$condition.=" and act.`activity_booker_name`  like '%".$arr['activity_name']."%'";
		}
		if($arr['first_name']!=""){
			$condition.=" and usr.`first_name`  like '%".$arr['first_name']."%'";
		}
		if($arr['last_name']!=""){
			$condition.=" and usr.`last_name`  like '%".$arr['last_name']."%'";
		}
		if($arr['customer_email']!=""){
			$condition.=" and usr.`email`  like '%".$arr['customer_email']."%'";
		}
		
		if($type==''){
			$type="DESC";
		}
		if($sort==''){
			$sort='refence_id';
		}	
		
		$sql="select bk.*,bkdtl.*,bkrcdtl.*,act.`activity_booker_name`,cntry.`country_name`,ct.`city_name`,usr.`email`,usr.`first_name`,usr.`last_name`,supp.`company_name` from  `".parent::SUFFIX."booking` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id` left join `".parent::SUFFIX."booker_activities` act on bkdtl.`activity_id`=act.`activity_id` left join `".parent::SUFFIX."country` cntry on act.`country_id`=cntry.`country_id` left join `".parent::SUFFIX."city` ct on act.`city_id`=ct.`city_id` left join `".parent::SUFFIX."user_details` usr on bk.`user_id`=usr.`user_id` left join `".parent::SUFFIX."supplier_details` supp on bkdtl.`supplier_id`=supp.`user_id` where ".$condition." and bk.`user_deleted`='No' and	bk.`supplier_deleted`='No' and bk.`admin_deleted`='No' group by bkdtl.`schedule_date`,bkdtl.`booking_id`,bkdtl.`activity_id` order by ".$sort." ".$type." LIMIT $start, $limit";
		$this->result=$this->query($sql);
		
		
	}
	
}

?>
