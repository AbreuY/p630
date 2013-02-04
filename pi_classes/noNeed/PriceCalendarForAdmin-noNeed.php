<?php
require_once dirname(__FILE__) . '/AbstractDB.php';
class PriceCalendarForAdmin extends AbstractDB
{
	private
		$result;		
	public
		$qry_result;
		
	public function __construct()
	{
		parent::__construct();
		$this->result = NULL;
		return true;
	}
	public function getAllRow()
	{
		if($this->row = mysql_fetch_assoc($this->result))
		   {
				return $this->row;
	       }	
		return false;
	}
	public function numofrows()
	{
		$num=mysql_num_rows($this->result);
		return $num;
	}
	
	public function getActSubTypeDtl($activity_id){
		//$sql="select sat.*,act.activity_booker_name from ".parent::SUFFIX."sub_activity_type sat left join ".parent::SUFFIX."booker_activities  act on sat.activity_id=act.activity_id  where sat.activity_id='".$activity_id."'";	
		
		$sql="select sat.*,act.activity_booker_name from ".parent::SUFFIX."sub_activity_detail as sad left join ".parent::SUFFIX."sub_activity_type sat on sad.sub_activity_type_id=sat.id left join ".parent::SUFFIX."booker_activities  act on sat.activity_id=act.activity_id  where sat.activity_id='".$activity_id."'";	
		$this->result=$this->query($sql);
	}
	
	
	public function getActSubRecordDtl($sub_activity_type_id){
		$sql="select * from ".parent::SUFFIX."sub_activity_detail where sub_activity_type_id='".$sub_activity_type_id."'";	
		$this->result=$this->query($sql);
	}

	public function getActPriceDtlForCalendar($activity_id,$record_id,$time_id,$start_date){		
		$sql="select cal.*,subActDtl.*
		from ".parent::SUFFIX."sub_activity_detail as subActDtl 
		left join ".parent::SUFFIX."calender as cal
		on subActDtl.sub_activity_id=cal.sub_activity_id
		where subActDtl.activity_id='".$activity_id."' and cal.sub_activity_id='".$record_id."' and cal.activity_time='".$time_id."' and cal.cal_date>='".$start_date."' limit 0,42";		
		$this->result=$this->query($sql);
	}
	
	public function getActDetails($activity_id,$option_id,$record_id){
		$sql="select sat.sub_activity_name as option_name,act.activity_booker_name,sad.sub_activity_name from ".parent::SUFFIX."sub_activity_type sat left join ".parent::SUFFIX."booker_activities  act on sat.activity_id=act.activity_id left join ".parent::SUFFIX."sub_activity_detail  sad on sat.id=sad.sub_activity_type_id where sat.id='".$option_id."' and act.activity_id='".$activity_id."' and sad.sub_activity_id='".$record_id."'";	
		$this->result=$this->query($sql);		
	}
	
	public function getScheduleTime($time_id){
		$sql="select * from ".parent::SUFFIX."activity_time_schedule where time_schedule_id='".$time_id."'";	
		$this->result=$this->query($sql);
	}
	
	public function getDailyPriceByDate($record_id,$start_date,$end_date){
		$sql="select cal.*,sad.sub_activity_name,sad.currency_code from ".parent::SUFFIX."calender as cal left join ".parent::SUFFIX."sub_activity_detail as sad on cal.sub_activity_id=sad.sub_activity_id where cal.sub_activity_id='".$record_id."' and cal.cal_date between '".$start_date."' and '".$end_date."' group by cal.cal_date";
		$this->result=$this->query($sql);
	}
	
	public function updateDailyPriceByDate($arr){
		/************* Update Capacity ******************/
		foreach($arr['capacity'] as $key=>$capacity){
			$arrData=explode("_",$key);
			$sql="UPDATE ".parent::SUFFIX."calender set `avl_capacity`='".$capacity."' where `cal_id`='".$arrData[1]."'";
			$this->result=$this->query($sql);
		}
		
		/************* Update Price ******************/
		foreach($arr['price'] as $key=>$price){
			$arrData=explode("_",$key);
			$sql="UPDATE ".parent::SUFFIX."calender set `price`='".$price."' where `cal_id`='".$arrData[1]."'";
			$this->result=$this->query($sql);
		}
			
		/************* Update Discount Price ******************/
		$arrIsDiscounted=array();
		foreach($arr['is_discount'] as $key=>$is_discount){
			$arrIsDiscounted[]=$key;
		}
		foreach($arr['discount_val'] as $key=>$discount_val){
			$arrData=explode("_",$key);
			if(in_array($key,$arrIsDiscounted)){
				$sql="UPDATE ".parent::SUFFIX."calender set `discounted`='yes',  `discounted_price`='".$discount_val."' where `cal_id`='".$arrData[1]."'";
				$this->result=$this->query($sql);
			}else{
				$sql="UPDATE ".parent::SUFFIX."calender set `discounted`='no',  `discounted_price`='0' where `cal_id`='".$arrData[1]."'";
				$this->result=$this->query($sql);
			}
		}
	}
	
	public function getPriceDateRange($record_id){
		$sql="SELECT min(cal_date) as min_cal_date, max(cal_date) as max_cal_date FROM `".parent::SUFFIX."calender` where `sub_activity_type_id`='".$record_id."' and cal_date>=curdate()";
		$this->result=$this->query($sql);	
	}
	
	public function getPriceTypeDltBySubActId($sub_act_id){
		$sql="select * from ".AbstractDB::SUFFIX."other_price_details where sub_activity_type_id='".$sub_act_id."'";
		$this->result=$this->query($sql);	
	}
	
	public function getPriceTypeDltBySubActId1($sub_act_id,$start_date,$end_date)
	{
		$sql="select distinct(cal.other_price) as id,ot.id as ot_id,ot.user_id,ot.activity_id,ot.sub_activity_type_id,ot.sub_activity_id,ot.price_type_name,ot.description from ".parent::SUFFIX."calender as cal left join ".AbstractDB::SUFFIX."other_price_details as ot on ot.id=cal.other_price where cal.sub_activity_type_id='".$sub_act_id."' and cal.cal_date>='".$start_date."' and  cal.cal_date<='".$end_date."'";
		$this->result=$this->query($sql);
	}
	
	public function getNoofTimeId($sub_act_id,$start_date,$end_date)
	{
		$sql="select count(distinct(activity_time)) as cnt from ".parent::SUFFIX."calender where sub_activity_type_id='".$sub_act_id."' and cal_date>='".$start_date."' and  cal_date<='".$end_date."'";
		$this->result=$this->query($sql);
	}
	
}
?>