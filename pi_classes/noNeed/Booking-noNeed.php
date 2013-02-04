<?php
require_once dirname(__FILE__) . '/AbstractDB.php';
require_once dirname(__FILE__) . '/commonSetting.php';
class Booking extends AbstractDB
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
	
	public function getAllActivityDtl(){
		$sql="select act.activity_id,act.activity_booker_name,act.description,act.active,sup.company_name,cnt.country_name,city.city_name from `".parent::SUFFIX."booker_activities` as act inner join `".parent::SUFFIX."supplier_details` as sup on act.user_id=sup.user_id inner join `".parent::SUFFIX."country` as cnt on act.country_id=cnt.country_id inner join `".parent::SUFFIX."city` as city on act.city_id=city.city_id where act.`active`='yes'";
		$this->result=$this->query($sql);
	}
	
	public function getAllActivityDtlPage($start,$limit,$sort,$type){
		if($type==''){
			$type="DESC";
		}
		if($sort==''){
			$sort='activity_id ';
		}		
		$sql="select act.activity_id,act.activity_booker_name,act.description,act.active,sup.company_name,cnt.country_name,city.city_name from `".parent::SUFFIX."booker_activities` as act inner join `".parent::SUFFIX."supplier_details` as sup on act.user_id=sup.user_id inner join `".parent::SUFFIX."country` as cnt on act.country_id=cnt.country_id inner join `".parent::SUFFIX."city` as city on act.city_id=city.city_id where act.`active`='yes' order by ". $sort ." ".$type." LIMIT $start, $limit";
		$this->result=$this->query($sql);
	}
	
	
	public function getAllSearchActivityDtl($act_name,$cmp_name,$cnt_name,$city_name){
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
		$sql="select act.activity_id,act.activity_booker_name,act.description,act.active,sup.company_name,cnt.country_name,city.city_name from `".parent::SUFFIX."booker_activities` as act inner join `".parent::SUFFIX."supplier_details` as sup on act.user_id=sup.user_id inner join `".parent::SUFFIX."country` as cnt on act.country_id=cnt.country_id inner join `".parent::SUFFIX."city` as city on act.city_id=city.city_id where act.`active`='yes'  ".$act_name." ".$cmp_name."  ".$cnt_name." ".$city_name." ";
		$this->result=$this->query($sql);
	}
	
	public function getAllSearchActivityDtlPage($start,$limit,$sort,$type,$act_name,$cmp_name,$cnt_name,$city_name){
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
		if($type==''){
			$type="DESC";
		}
		if($sort==''){
			$sort='activity_id ';
		}		
		$sql="select act.activity_id,act.activity_booker_name,act.description,act.active,sup.company_name,cnt.country_name,city.city_name from `".parent::SUFFIX."booker_activities` as act inner join `".parent::SUFFIX."supplier_details` as sup on act.user_id=sup.user_id inner join `".parent::SUFFIX."country` as cnt on act.country_id=cnt.country_id inner join `".parent::SUFFIX."city` as city on act.city_id=city.city_id where act.`active`='yes'  ".$act_name." ".$cmp_name."  ".$cnt_name." ".$city_name." order by ". $sort ." ".$type." LIMIT $start, $limit";
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
		print_r($_SESSION);//["activity".$_SESSION['act_id']]);
		echo "</pre>";*/
		$total_discount=0;
		$activity_total_price=0;
		$activity_total_paid=0;
		$activity_total_due=0;
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
				if($arrSupplierDtl['newbook']=='accept_decline')  
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
		foreach($_SESSION["activity".$_SESSION['act_id']] as $sub_act_id=>$pricing)
			{ ### Loop start for activity
				/* ------------ Getting the activity and sub actvity detail  ----------------*/
				$sql="select act.activity_booker_name as activity_name,sub.sub_activity_name as sub_act_name,subDtl.* from `".parent::SUFFIX."booker_activities` act left join `".parent::SUFFIX."sub_activity_type` sub on act.activity_id=sub.activity_id left join `".parent::SUFFIX."sub_activity_detail` subDtl on sub.id=subDtl.sub_activity_type_id where act.activity_id='".$_SESSION['act_id']."' and sub.id='".$sub_act_id."'";
				$this->result=$this->query($sql);
				$arrSubActDtl=array();
				while($temp=$this->getAllRow())
				{	
					$arrSubActDtl=$temp;
				}
				/*echo "<pre>";
				print_r($arrSubActDtl);
				echo  "</pre>";*/
				 $sql="insert into `".parent::SUFFIX."booking_details` (`booking_details_id`,`booking_id`,`user_id`,`supplier_id`,`activity_id`,`sub_activity_id`,`activity_name`,`sub_activity_name`,`booking_condition`,`paid_currency`,`activity_currency`,`activity_conducted_status`,`schedule_date`,`cancel_day`,`last_cancel_date`,`extra_note`,`booking_status`) values('','".$last_Booking_id."','".$customer_id."','".$supplier_id."','".$_SESSION['act_id']."','".$sub_act_id."','".$arrSubActDtl['activity_name']."','".$arrSubActDtl['sub_act_name']."','".$booking_condition."','".$post['currancy_type']."','".$arrSubActDtl['currency_code']."','No','".$schedule_date."','".$noofday."','".$last_cancel_date."','".$post['extra_note']."','".$status1."')";
				$this->result=$this->query($sql);
			
				$last_booking_detail_id=$this->getLastId();
				$sub_act_tot_price=0;
				$sub_act_tot_paid=0;					
				$sub_act_tot_due=0;

				foreach($pricing as $priceTypeID=>$priceTypeDtl)
				{ ### Loop start for subactivity
					if($priceTypeDtl['qty']==0)
					{
					}
					else
					{
						$qty=$_SESSION["activity".$_SESSION['act_id']][$sub_act_id][$priceTypeID]['qty']; 
						$price=$_SESSION["activity".$_SESSION['act_id']][$sub_act_id][$priceTypeID]['price'];
						$time=$_SESSION["activity".$_SESSION['act_id']][$sub_act_id][$priceTypeID]['time'];
						$totprice=floatval($qty)*floatval($price);
						$sub_act_tot_price=$sub_act_tot_price+$totprice;
						#id 	activity_id 	sub_activity_id 	booking_detail_id 	booking_quantity 	unit_price 	total_price 	price_type 	departure_time 	cancel_day 	last_cancel_date 	is_cancel 	cancel_date 	cancel_amount
						$sql="insert into `".parent::SUFFIX."booking_record_details` (`id`,`activity_id`,`sub_activity_id`,`booking_detail_id`,`booking_quantity`,`unit_price`,`total_price`,`price_type`,`departure_time`,`cancel_day`,`last_cancel_date`) values('','".$_SESSION['act_id']."','".$sub_act_id."','".$last_booking_detail_id."','".$qty."','".$price."','".$totprice."','".$priceTypeID."','".$time."','".$noofday."','".$last_cancel_date."')";
						$this->result=$this->query($sql);
					}
					
				}### Loop End for sub activity
				
				if($arrSupplierDtl['book']=="full_balance")
				{
						$sub_act_tot_paid=$sub_act_tot_price;					
				}
				elseif($arrSupplierDtl['book']=="Deposite")
				{
						$sub_act_tot_paid=(floatval($arrSubActDtl['commission_amt'])*$sub_act_tot_price)/100;
				}
				
				$sub_act_tot_due=floatval($sub_act_tot_price)-floatval($sub_act_tot_paid);
								
				$activity_total_price=$activity_total_price+$sub_act_tot_price;
				$activity_total_paid=$activity_total_paid+$sub_act_tot_paid;
				$activity_total_due=$activity_total_due+$sub_act_tot_due;

				/*--------------  Uddating the price for each sub activity   ----------------*/
				$sql="update `".parent::SUFFIX."booking_details` set `activity_total_price`='".$sub_act_tot_price."',`activity_total_paid`='".$sub_act_tot_paid."',`activity_total_due`='".$activity_total_due."' where booking_details_id='".$last_booking_detail_id."'";
				$this->result=$this->query($sql);
			}### Loop End for activity
			
				/*--------------  Uddating the price for activity   ----------------*/
			$sql="update `".parent::SUFFIX."booking` set `total_paid`='".$activity_total_price."',`total_paid_real`='".$activity_total_paid."' where booking_id='".$last_Booking_id."'";
			$this->result=$this->query($sql);
	}
	/* -------------- function for book activity by admin end here ------------------------- */ 
	
	
	/* -------------- function for book activity by customer ------------------------- */ 
	public function customer_booking($arrSession,$arrPost){
					
		$customer_id=$_SESSION['user_id'];
		/* creating the reference id by country for activity,current date, activity id , customer id */
		$refid=strtotime(date("Y-m-d H:i:s"))."-".$customer_id;
		/*------------------ Inserting the record for booking   -----------------------*/
		$sql2="insert into `".parent::SUFFIX."booking`(`booking_id`,`refence_id`,`user_id`,`booking_date`,`booked_by`) values('','".$refid."','".$customer_id."','".date("Y-m-d")."','Customer')";
		$this->result=$this->query($sql2);	
		$last_Booking_id=$this->getLastId();
		$arrSupplierDtl=array();
		foreach($arrSession as $key=>$arrSessionDtl){
			
			/* ------------------ Get Supplier email,phone,skype --------------- */
				$sql="SELECT ud.email,ud.user_id,ud.user_id as supplier_id,ud.country,sd.company_name,sd.mn_contact_name,sd.mn_country_code,sd.mn_area_code,sd.mn_phone_no,sd.mn_mobile_no,sd.mn_email,sd.mn_skype FROM  ".parent::SUFFIX."booker_activities act LEFT JOIN ".parent::SUFFIX."supplier_details sd ON act.user_id=sd.user_id  LEFT JOIN ".parent::SUFFIX."user_details ud ON act.user_id=ud.user_id WHERE act.activity_id='".$arrSessionDtl['cart_act_id']."'";
				$this->result=$this->query($sql);
				$arrSupplierDtl[]=$this->getAllRow();				
			/* ------------------ Get Supplier email,phone,skype end --------------- */			
			
			
			/* setting the status of booking from supplier preference  */ 
			if($arrSessionDtl['cart_act_booking_status']=='need_verify')  
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
			$schedule_date=date("Y-m-d",strtotime($arrSessionDtl['cart_act_bkdate']));
			$noofday=(intval($arrSessionDtl['cart_act_booking_cancel'])/24);
			$cancel_day_str="-".$noofday." day";
			$last_cancel_date=date("Y-m-d",strtotime($cancel_day_str,strtotime($schedule_date)));
					
			/* Setting booking condition */
			if($arrSessionDtl['cart_act_booking_condition']=="full_balance")
			{
				$booking_condition="Full";
			}					
			elseif($arrSessionDtl['cart_act_booking_condition']=="deposit")
			{
				$booking_condition="Deposit";					
			}
			else
			{
				$booking_condition="Gift";		
			}	
			
			$sql3="insert into `".parent::SUFFIX."booking_details` (`booking_details_id`,`booking_id`,`user_id`,`supplier_id`,`activity_id`,`sub_activity_id`,`activity_name`,`sub_activity_name`,`booking_condition`,`paid_currency`,`activity_currency`,`activity_conducted_status`,`schedule_date`,`cancel_day`,`last_cancel_date`,`extra_note`,`booking_status`) values('','".$last_Booking_id."','".$customer_id."','".$arrSupplierDtl[$key]['supplier_id']."','".$arrSessionDtl['cart_act_id']."','".$arrSessionDtl['cart_sub_act_id']."','".$arrSessionDtl['cart_act_title']."','".$arrSessionDtl['cart_sub_act_name']."','".$booking_condition."','".$arrPost['pay_in_currency']."','".$arrSessionDtl['cart_act_currency_code']."','No','".$schedule_date."','".$noofday."','".$last_cancel_date."','".$arrSessionDtl['cart_act_youNeedTellUs']."','".$status1."')";
			$this->result=$this->query($sql3);			
			$last_booking_detail_id=$this->getLastId();		
			
			$sub_act_tot_price=0;					
			$act_total_converted_paid=0;
			$act_total_converted_due=0;
			$main_activity_total_paid=0;
			$act_total_converted_price=0;
			$total_paid_real=0;
			foreach($arrSessionDtl['cart_elements'][$arrSessionDtl['cart_sub_act_type_id']][$arrSessionDtl['cart_sub_act_id']] as $key=>$arrSessionPriceDtl){
				$qty=$arrSessionPriceDtl['qty']; 
				$converted_unit_price=$arrSessionPriceDtl['converted_unit_price']; 
				$converted_price=$arrSessionPriceDtl['converted_price'];
				$time=$arrSessionPriceDtl['time'];
				$priceTypeID=$key;
				$total_converted_price=round($qty*floatval($converted_unit_price));
				
				$act_total_converted_price+=$total_converted_price;
				
				$act_total_converted_paid+=$arrSessionPriceDtl['deposite_amount']; 
				
				$sql4="insert into `".parent::SUFFIX."booking_record_details` (`id`,`activity_id`,`sub_activity_id`,`booking_detail_id`,`booking_quantity`,`unit_price`,`total_price`,`price_type`,`departure_time`,`cancel_day`,`last_cancel_date`) values('','".$arrSessionDtl['cart_act_id']."','".$arrSessionDtl['cart_sub_act_id']."','".$last_booking_detail_id."','".$qty."','".$converted_unit_price."','".$total_converted_price."','".$priceTypeID."','".$time."','".$noofday."','".$last_cancel_date."')";
				$this->result=$this->query($sql4);
			}
			
			$act_tot_due=round(($act_total_converted_price-$act_total_converted_paid));				

			/*--------------  Uddating the price for each sub activity   ----------------*/
			$sql="update `".parent::SUFFIX."booking_details` set `activity_total_price`='".$act_total_converted_price."',`activity_total_paid`='".$act_total_converted_paid."',`activity_total_due`='".$act_tot_due."' where booking_details_id='".$last_booking_detail_id."'";
			$this->result=$this->query($sql);
			
			$main_activity_total_paid+=$act_total_converted_paid;
			$total_paid_real=$main_activity_total_paid-$dicount_amount;
		}
		/*--------------  Uddating the price for activity   ----------------*/
		$sql="update `".parent::SUFFIX."booking` set `total_paid`='".$main_activity_total_paid."',`total_paid_real`='".$total_paid_real."' where booking_id='".$last_Booking_id."'";
		$this->result=$this->query($sql);

		//Set 0 to top header page
		$_SESSION['countItem']=0;
		if(isset($_SESSION['cart'])){
			unset($_SESSION['cart']);	
		}
		$_SESSION['msg']['booking']='Your activity booked successfully.';
	}	
	/* -------------- function for book activity by customer ------------------------- */ 
}
?>
