<?php
require_once dirname(__FILE__) . '/AbstractDB.php';
class UserBooking extends AbstractDB
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
	
	###################   User Booking Function ######################################
	public function getUserBooking($type)
	{
		$today = date("Y-m-d");
		if($type=="future"){
			$selectfiled=",bkrcdtl.*";
			$querysubstr="left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id`";
			$condition="(bkdtl.`schedule_date`>='".$today."' or bkdtl.`booking_condition`='Gift') and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
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
		 $sql="select bk.*,bkdtl.*".$selectfiled.",act.`activity_booker_name`,cntry.`country_name`,ct.`city_name` from  `".parent::SUFFIX."booking` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` ".$querysubstr." left join `".parent::SUFFIX."booker_activities` act on bkdtl.`activity_id`=act.`activity_id` left join `".parent::SUFFIX."country` cntry on act.`country_id`=cntry.`country_id` left join `".parent::SUFFIX."city` ct on act.`city_id`=ct.`city_id` where bk.`user_id`='".$_SESSION['user_id']."' and ".$condition." and bk.`user_deleted`='No' and	bk.`supplier_deleted`='No' and bk.`admin_deleted`='No' ".$condition2."";  
		
		$this->result=$this->query($sql);
	}
	
	public function getBookingDetailById($booking_id)
	{
		/*$sql="select bk.*,bkdtl.*,act.`activity_booker_name`,cntry.`country_name`,ct.`city_name` from  `".parent::SUFFIX."booking` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` left join `".parent::SUFFIX."booker_activities` act on bkdtl.`activity_id`=act.`activity_id` left join `".parent::SUFFIX."country` cntry on act.`country_id`=cntry.`country_id` left join `".parent::SUFFIX."city` ct on act.`city_id`=ct.`city_id` where bk.`user_id`='".$_SESSION['user_id']."' and bk.`booking_id`='".$booking_id."'";*/
		
		$sql="select * from `".parent::SUFFIX."booking` where `booking_id`='".$booking_id."' and `user_id`='".$_SESSION['user_id']."'" ;
		$this->result=$this->query($sql);
	}
	public function getSubActDtl($type,$booking_id,$sub_act_id,$booking_dtl_id)
	{
		$today = date("Y-m-d");
		if($type=='future')
		{
			$condition="bkdtl.`schedule_date`>='".$today."' and  bkrcdtl.`is_cancel`='No'";
		}
		elseif($type=='future')
		{
			$condition="bkdtl.`schedule_date`<'".$today."'";	
		}
		elseif($type=="cancel")
		{	
			$condition="bkdtl.`schedule_date`>='".$today."' and bkrcdtl.`is_cancel`='yes'";
		}
	$sql="select bk.booking_id,bkdtl.*,bkrcdtl.*,tsi.*,otpr.* from `".parent::SUFFIX."booking` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id` left join `".parent::SUFFIX."activity_time_schedule` tsi on tsi.`time_schedule_id`=bkrcdtl.`departure_time` left join `".parent::SUFFIX."other_price_details` otpr on bkrcdtl.`price_type`=otpr.`id` where bk.`booking_id`='".$booking_id."' and ".$condition." and bkdtl.`booking_details_id`='".$booking_dtl_id."'  and bkrcdtl.`sub_activity_id`='".$sub_act_id."'";
			$this->result=$this->query($sql);
	}
	
	public function getSubActDtl1($type,$booking_id,$sub_act_id,$booking_dtl_id,$schedule_date)
	{
		$today = date("Y-m-d");
		if($type=='future')
		{
			$condition="(bkdtl.`schedule_date`='".$schedule_date."' or bkdtl.`booking_condition`='Gift') and  bkrcdtl.`is_cancel`='No'";
		}
		elseif($type=='past')
		{
			$condition="bkdtl.`schedule_date`='".$schedule_date."'";	
		}
		elseif($type=="cancel")
		{	
			$condition="bkdtl.`schedule_date`='".$schedule_date."' and bkrcdtl.`is_cancel`='Yes'";
		}
	 $sql="select bk.booking_id,bkdtl.*,bkrcdtl.*,bkrcdtl.id as booking_record_id,tsi.*,otpr.* from `".parent::SUFFIX."booking` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id` left join `".parent::SUFFIX."activity_time_schedule` tsi on tsi.`time_schedule_id`=bkrcdtl.`departure_time` left join `".parent::SUFFIX."other_price_details` otpr on bkrcdtl.`price_type`=otpr.`id` where bk.`booking_id`='".$booking_id."' and ".$condition." and bkdtl.`booking_details_id`='".$booking_dtl_id."'  and bkrcdtl.`sub_activity_id`='".$sub_act_id."'";
			$this->result=$this->query($sql);
	}
	
	public function getBookingPersonDtl($activity_id,$sub_act_id,$booking_record_detail_id)
	{
		$sql="select bkrcprdtl.*,otr.`price_type_name`,cntry.`country_name` from `".parent::SUFFIX."booking_record_person_detail` bkrcprdtl left join `".parent::SUFFIX."other_price_details` otr on bkrcprdtl.`price_type_id`=otr.`id` left join `".parent::SUFFIX."country` cntry on bkrcprdtl.`country_id`=cntry.`country_id` where bkrcprdtl.`activity_id`='".$activity_id."' and  bkrcprdtl.`sub_activity_id`='".$sub_act_id."' and bkrcprdtl.`booking_record_detail_id`='".$booking_record_detail_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getGiftVoucherDetail($booking_id)
	{
		$sql="select * from `".parent::SUFFIX."gift_voucher` where `booking_id`='".$booking_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getRedeemedVoucher($booking_id)
	{
		$sql="select * from `".parent::SUFFIX."gift_voucher_redeemed` where `booking_id`='".$booking_id."'";
		$this->result=$this->query($sql);
	}
	
	public function bookingActivityDetail($type,$booking_id)
	{
		$today = date("Y-m-d");
		if($type=='future')
		{
			$condition="(bkdtl.`schedule_date`>='".$today."' or bkdtl.`booking_condition`='Gift') and  bkrcdtl.`is_cancel`='No'";
		}
		elseif($type=='past')
		{
			$condition="bkdtl.`schedule_date`<'".$today."'";	
		}
		elseif($type=="cancel")
		{	
			$condition="bkdtl.`schedule_date`>='".$today."' and bkrcdtl.`is_cancel`='Yes'";
		}
		$sql="select bk.*,bkdtl.*,bkrcdtl.*,act.activity_booker_name,cntry.country_name,ct.city_name from `".parent::SUFFIX."booking_details` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id` left join `".parent::SUFFIX."booker_activities` act on bk.`activity_id`=act.`activity_id` left join `".parent::SUFFIX."country` cntry on act.`country_id`=cntry.`country_id` left join `".parent::SUFFIX."city` ct on act.`city_id`=ct.`city_id`  where bk.`booking_id`='".$booking_id."' and ".$condition." group by bkdtl.`schedule_date`,bkdtl.`activity_id`";
		$this->result=$this->query($sql);
	}
	
	public function getBookingDetailByActId($act_id)
	{
		$sql="select * from `".parent::SUFFIX."booking_details` where `activity_id`='".$act_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getSubactivity_ids($act_id,$booking_id,$schedule_date)
	{
		$sql="select `sub_activity_id`,`sub_activity_name`,`booking_details_id` from `".parent::SUFFIX."booking_details` where `activity_id`='".$act_id."' and `booking_id`='".$booking_id."' and `user_id`='".$_SESSION['user_id']."' and `schedule_date`='".$schedule_date."'";
		$this->result=$this->query($sql);
	}
	#activity_total_price 	activity_total_paid 	activity_total_due 	paid_currency 	activity_currency 	
	public function getSumOfPrices($act_id,$booking_id,$schedule_date)
	{
		 $sql="select bk.booking_id,sum(bkdtl.discount_amount) as total_discount,sum(bkdtl.total_price) as total_price,sum(bkdtl.total_paid) as total_paid,sum(bkdtl.total_due) as total_due,sum(bkdtl.activity_discount_amount) as activity_total_discount,sum(bkdtl.activity_total_price) as activity_total_price,sum(bkdtl.activity_total_paid) as activity_total_paid,sum(bkdtl.activity_total_due) as activity_total_due,bkdtl.paid_currency,bkdtl.activity_currency from ".parent::SUFFIX."booking bk left join ".parent::SUFFIX."booking_details bkdtl on bk.booking_id=bkdtl.booking_id where bk.booking_id='".$booking_id."' and bkdtl.activity_id='".$act_id."' and bkdtl.schedule_date='".$schedule_date."' and bkdtl.user_id='".$_SESSION['user_id']."'";
		$this->result=$this->query($sql);
	}
	public function getPaidCurrancy($act_id,$booking_id)
	{
		 $sql="select bk.booking_id,bkdtl.paid_currency,cntry.currency_symbol as activity_symbol,cntry1.currency_symbol as paid_symbol from ".parent::SUFFIX."booking bk left join ".parent::SUFFIX."booking_details bkdtl on bk.booking_id=bkdtl.booking_id left join ".parent::SUFFIX."country cntry on bkdtl.activity_currency=cntry.currency_code left join ".parent::SUFFIX."country cntry1 on bkdtl.paid_currency=cntry1.currency_code where bk.booking_id='".$booking_id."' and bkdtl.activity_id='".$act_id."' and bkdtl.`user_id`='".$_SESSION['user_id']."' limit 1";

	/* $sql="select bk.booking_id,bkdtl.paid_currency,cntry.currency_symbol as paid_symbol,cntry1.currency_symbol as activity_symbol from ".parent::SUFFIX."booking bk left join ".parent::SUFFIX."booking_details bkdtl on bk.booking_id=bkdtl.booking_id left join ".parent::SUFFIX."country cntry on bkdtl.activity_currency=cntry.currency_code left join ".parent::SUFFIX."country cntry1 on bkdtl.paid_currency=cntry1.currency_code where bk.booking_id='".$booking_id."' and bkdtl.sub_activity_id='".$act_id."' and bkdtl.`user_id`='".$_SESSION['user_id']."' limit 1"; */

		$this->result=$this->query($sql);
	}
	###################   User Booking Function end here ################################
	
	###################   Supplier Booking Function start here #############################

	public function getSupplierBooking($type)
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
			$condition="(bkdtl.`schedule_date`>'".$today."' or bkdtl.`booking_condition`='Gift' ) and  bkdtl.`activity_conducted_status`='No' and bkdtl.`cancel_status`!='Cancel' and  bkrcdtl.`is_cancel`='No'";
		}elseif($type=="past")
		{
			$condition="bkdtl.`schedule_date`<'".$today."' and bkdtl.`schedule_date`!='00000-00-00'";
		}elseif($type=="cancel")
		{
			$condition="bkdtl.`cancel_status`='Cancel' and  bkrcdtl.`is_cancel`='Yes'";
		}
		$sql="select bk.*,bkdtl.*,bkrcdtl.*,act.`activity_booker_name`,cntry.`country_name`,ct.`city_name`,usr.`email`,usr.`first_name`,usr.`last_name` from  `".parent::SUFFIX."booking` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id` left join `".parent::SUFFIX."booker_activities` act on bkdtl.`activity_id`=act.`activity_id` left join `".parent::SUFFIX."country` cntry on act.`country_id`=cntry.`country_id` left join `".parent::SUFFIX."city` ct on act.`city_id`=ct.`city_id` left join `".parent::SUFFIX."user_details` usr on bk.`user_id`=usr.`user_id` where ".$condition." and bk.`user_deleted`='No' and	bk.`supplier_deleted`='No' and bk.`admin_deleted`='No' and bkdtl.supplier_id='".$_SESSION['user_id']."' group by bkdtl.`schedule_date`,bkdtl.`booking_id`,bkdtl.`activity_id`";
		$this->result=$this->query($sql);
	}
	
	public function getBookingDetailByIdForSupp($booking_id)
	{
		$sql="select usr.first_name,usr.last_name,usr.email,bk.* from `".parent::SUFFIX."booking` bk left join `".parent::SUFFIX."user_details` usr on usr.`user_id`=bk.`user_id` where `booking_id`='".$booking_id."'";
		$this->result=$this->query($sql);
	}
	
	public function bookingActivityDetailForSupp($type,$booking_id)
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
		$sql="select bk.*,bkdtl.*,bkrcdtl.*,act.activity_booker_name,cntry.country_name,ct.city_name from `".parent::SUFFIX."booking_details` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id` left join `".parent::SUFFIX."booker_activities` act on bk.`activity_id`=act.`activity_id` left join `".parent::SUFFIX."country` cntry on act.`country_id`=cntry.`country_id` left join `".parent::SUFFIX."city` ct on act.`city_id`=ct.`city_id`  where bk.`booking_id`='".$booking_id."' and bkdtl.`supplier_id`='".$_SESSION['user_id']."' and ".$condition." group by bkdtl.`activity_id`";
		$this->result=$this->query($sql);
	}
	
	public function bookingActivityDetailForSupp1($type,$booking_id,$schedule_date)
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
			$condition="bkdtl.`cancel_status`='Cancel' and bkdtl.`schedule_date`='".$schedule_date."' and  bkrcdtl.`is_cancel`='Yes'";
		}
		 $sql="select bk.*,bkdtl.*,bkrcdtl.*,act.activity_booker_name,cntry.country_name,ct.city_name from `".parent::SUFFIX."booking_details` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id` left join `".parent::SUFFIX."booker_activities` act on bk.`activity_id`=act.`activity_id` left join `".parent::SUFFIX."country` cntry on act.`country_id`=cntry.`country_id` left join `".parent::SUFFIX."city` ct on act.`city_id`=ct.`city_id`  where bk.`booking_id`='".$booking_id."' and bkdtl.`supplier_id`='".$_SESSION['user_id']."' and ".$condition." group by bkdtl.`activity_id`";
		$this->result=$this->query($sql);
	}
	
	public function getSubactivity_idsForSupp($act_id,$booking_id,$schedule_date)
	{
		$sql="select `sub_activity_id`,`sub_activity_name`,`booking_details_id` from `".parent::SUFFIX."booking_details` where `activity_id`='".$act_id."' and `booking_id`='".$booking_id."' and `schedule_date`='".$schedule_date."'";
		$this->result=$this->query($sql);
	}
	
	public function getSumOfPricesForSupp($act_id,$booking_id,$schedule_date)
	{//left join ".parent::SUFFIX."country cntry on bkdtl.activity_currency=cntry.currency_code
		$sql="select bk.booking_id,sum(bkdtl.discount_amount) as total_discount,sum(bkdtl.total_price) as total_price,sum(bkdtl.total_paid) as total_paid,sum(bkdtl.total_due) as total_due,sum(bkdtl.activity_discount_amount) as activity_total_discount,sum(bkdtl.activity_total_price) as activity_total_price,sum(bkdtl.activity_total_paid) as activity_total_paid,sum(bkdtl.activity_total_due) as activity_total_due,bkdtl.paid_currency,bkdtl.activity_currency from ".parent::SUFFIX."booking bk left join ".parent::SUFFIX."booking_details bkdtl on bk.booking_id=bkdtl.booking_id  where bk.booking_id='".$booking_id."' and bkdtl.activity_id='".$act_id."' and bkdtl.`supplier_id`='".$_SESSION['user_id']."' and (bkdtl.`schedule_date`='".$schedule_date."' or bkdtl.`booking_condition`='Gift')";
		$this->result=$this->query($sql);
	}
	
	public function getPaidCurrancyForSupp($act_id,$booking_id)
	{
		$sql="select bk.booking_id,bkdtl.paid_currency,cntry.currency_symbol as activity_symbol,cntry1.currency_symbol as paid_symbol from ".parent::SUFFIX."booking bk left join ".parent::SUFFIX."booking_details bkdtl on bk.booking_id=bkdtl.booking_id left join ".parent::SUFFIX."country cntry on bkdtl.activity_currency=cntry.currency_code left join ".parent::SUFFIX."country cntry1 on bkdtl.paid_currency=cntry1.currency_code where bk.booking_id='".$booking_id."' and bkdtl.activity_id='".$act_id."' and bkdtl.`supplier_id`='".$_SESSION['user_id']."' limit 1";
		$this->result=$this->query($sql);
	}
	
	public function getSubActDtlForSupp($type,$booking_id,$sub_act_id)
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
		$sql="select bk.booking_id,bkdtl.*,bkrcdtl.*,tsi.*,otpr.* from `".parent::SUFFIX."booking` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id` left join `".parent::SUFFIX."activity_time_schedule` tsi on tsi.`time_schedule_id`=bkrcdtl.`departure_time` left join `".parent::SUFFIX."other_price_details` otpr on bkrcdtl.`price_type`=otpr.`id`  where bk.`booking_id`='".$booking_id."' and ".$condition." and bkdtl.`supplier_id`='".$_SESSION['user_id']."' and bkdtl.`schedule_date`='".$schedule_date."' and bkrcdtl.`sub_activity_id`='".$sub_act_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getSubActDtlForSupp1($type,$booking_id,$sub_act_id,$schedule_date)
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
			$condition="bkdtl.`cancel_status`='Cancel' and  bkrcdtl.`is_cancel`='Yes'";
		}
		
		//left join `".parent::SUFFIX."country` cntry on bkdtl.`activity_currency`=cntry.`currency_code`  
		$sql="select bk.booking_id,bkdtl.*,bkrcdtl.*,bkrcdtl.id as booking_record_id,tsi.*,otpr.* from `".parent::SUFFIX."booking` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id` left join `".parent::SUFFIX."activity_time_schedule` tsi on tsi.`time_schedule_id`=bkrcdtl.`departure_time` left join `".parent::SUFFIX."other_price_details` otpr on bkrcdtl.`price_type`=otpr.`id`  where bk.`booking_id`='".$booking_id."' and ".$condition." and  bkdtl.`supplier_id`='".$_SESSION['user_id']."' and bkrcdtl.`sub_activity_id`='".$sub_act_id."'";
		$this->result=$this->query($sql);
	}
	
	
	public function getSubActDtl2($booking_id,$sub_act_id,$booking_dtl_id,$schedule_date)
	{
		$condition="(bkdtl.`schedule_date`='".$schedule_date."' or bkdtl.`booking_condition`='Gift') and  bkrcdtl.`is_cancel`='No'";
	$sql="select bk.booking_id,bkdtl.*,bkrcdtl.*,tsi.*,otpr.* from `".parent::SUFFIX."booking` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id` left join `".parent::SUFFIX."activity_time_schedule` tsi on tsi.`time_schedule_id`=bkrcdtl.`departure_time` left join `".parent::SUFFIX."other_price_details` otpr on bkrcdtl.`price_type`=otpr.`id` where bk.`booking_id`='".$booking_id."' and ".$condition." and bkdtl.`booking_details_id`='".$booking_dtl_id."'  and bkrcdtl.`sub_activity_id`='".$sub_act_id."'";
			$this->result=$this->query($sql);
	}
	
	public function getBookingPersonDtlForSupplier($activity_id,$sub_act_id,$booking_record_detail_id)
	{
		$sql="select bkrcprdtl.*,otr.`price_type_name`,cntry.`country_name` from `".parent::SUFFIX."booking_record_person_detail` bkrcprdtl left join `".parent::SUFFIX."other_price_details` otr on bkrcprdtl.`price_type_id`=otr.`id` left join `".parent::SUFFIX."country` cntry on bkrcprdtl.`country_id`=cntry.`country_id` where bkrcprdtl.`activity_id`='".$activity_id."' and  bkrcprdtl.`sub_activity_id`='".$sub_act_id."' and bkrcprdtl.`booking_record_detail_id`='".$booking_record_detail_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getBookingBySearch($arr)
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
		
		$sql="select bk.*,bkdtl.*,bkrcdtl.*,act.`activity_booker_name`,cntry.`country_name`,ct.`city_name`,usr.`email`,usr.`first_name`,usr.`last_name` from  `".parent::SUFFIX."booking` bk left join `".parent::SUFFIX."booking_details` bkdtl on bk.`booking_id`=bkdtl.`booking_id` left join `".parent::SUFFIX."booking_record_details` bkrcdtl on bkdtl.`booking_details_id`=bkrcdtl.`booking_detail_id` left join `".parent::SUFFIX."booker_activities` act on bkdtl.`activity_id`=act.`activity_id` left join `".parent::SUFFIX."country` cntry on act.`country_id`=cntry.`country_id` left join `".parent::SUFFIX."city` ct on act.`city_id`=ct.`city_id` left join `".parent::SUFFIX."user_details` usr on bk.`user_id`=usr.`user_id` where ".$condition." and bk.`user_deleted`='No' and	bk.`supplier_deleted`='No' and bk.`admin_deleted`='No' and bkdtl.supplier_id='".$_SESSION['user_id']."' group by bkdtl.`schedule_date`,bkdtl.`booking_id`,bkdtl.`activity_id`";
		$this->result=$this->query($sql);
	}
	
	###################   Supplier Booking Function start here #############################	
	
						
	
}
?>
