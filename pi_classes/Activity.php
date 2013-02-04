<?php
require_once dirname(__FILE__) . '/AbstractDB.php';
include_once dirname(__FILE__) . '/mail_class.php';
class Activity extends AbstractDB
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
	public function getRow()
	{
		if($this->row = mysql_fetch_assoc($this->result))
		   {
				return true;
	       }	
		return false;
	}
	
	public function getRow1($allFields='')
	{ 
	 	while($this->row = mysql_fetch_assoc($this->result))
		{	if($allFields)
			{
				return $this->row;
			}	
			else
			{
			 	return true;
			}
		}
		 return false;   
	}
	
	public function getAllRow()
	{
		if($this->row = mysql_fetch_assoc($this->result))
		   {
		   		//print_r($this->row);
		   		return $this->row;
	       }	
		return false;
	}
	public function numrows()
	{
		return mysql_num_rows($this->result);
	}
	public function numofrows()
	{
		$num=mysql_num_rows($this->result);
		return $num;
	}

	public function getActivityById($activity_id){
		$sql="select act.*,act.description as act_description,cnt.country_id,cnt.iso,cnt.country_name,cnt.currency_name,cnt.currency_symbol as curr_symbol,cnt.currency_rate,city.city_name,sat.*, sat.id as option_id,sad.*,cal.*,cnt1.currency_symbol from ".parent::SUFFIX."booker_activities act left join ".parent::SUFFIX."country cnt on act.country_id=cnt.country_id left join ".parent::SUFFIX."city city on act.city_id=city.city_id left join ".parent::SUFFIX."sub_activity_type sat on (act.activity_id=sat.activity_id) left join  ".parent::SUFFIX."sub_activity_detail sad on (sat.id=sad.sub_activity_type_id) left join ".parent::SUFFIX."calender cal on (sad.sub_activity_id=cal.sub_activity_id) left join ".parent::SUFFIX."country cnt1 on sad.currency_code=cnt1.currency_code where act.activity_id='".$activity_id."' and cal.cal_date>='".date("Y-m-d")."' order by cal.other_price, cal.cal_date limit 1";
		
		$this->result=$this->query($sql);
	}
	
	/* function to sort the array on the discounted price */
	private static function discounted_price_compare($a, $b)
	{
		$t1 = strtotime($a['discounted_price']);
		$t2 = strtotime($b['discounted_price']);
		return $t1 - $t2;
	} 
	
	/* function to sort the array on the price */
	private static function price_compare($a, $b)
	{
		$t1 = $a['price'];
		$t2 = $b['price'];
		return $t1 - $t2;
	} 
	
	
	public function getActByIdDtlPage($activity_id){
		
		$arrSubActDtl=array();
		$arrSubActDtl=$this->getSubTypeId($activity_id);
		
		$theTypeId=$arrSubActDtl[0];
		$theTimeId=$arrSubActDtl[1];    
		
		/*$sql="select distinct(sat.`id`) from `".parent::SUFFIX."sub_activity_type` sat left join `".parent::SUFFIX."calender` cal on cal.`sub_activity_type_id`=sat.`id` where sat.`activity_id`='".$activity_id."' and cal.`cal_date`=curDate() order by sat.`id`";
		$this->result=$this->query($sql);
		$typeid=array();
		while($temp=$this->getAllRow())
		{
			$typeid[]=$temp;
		}
		$discouted='No';
		$i=0;
		# Getting the sub activity type id and time id which has minimum adult discounted price or only price.
		foreach($typeid as $arrTypeId)
		{
		//$subActivityTypeId=$typeid[0]['id'];
		$getLatestTimeScheduel_id="select schedule_time from `".parent::SUFFIX."sub_activity_type` where `id`='".$arrTypeId['id']."'";
		$this->result=$this->query($getLatestTimeScheduel_id);
		$this->getRow();
		$timescheduel=$this->getField('schedule_time');
		// get time scedule by activity id for latest time
		$sqlTime="SELECT time_schedule_id,(case 
			when (schedule_at='pm' and hour<12) then
				 `hour`+12 
			else
				( 
				case 
					when (schedule_at='am' and hour=12) then
				 		  `hour`-12 
					else
				 		  `hour` 
				end
				)
		    end) as theTime FROM ".parent::SUFFIX."activity_time_schedule where activity_id = '".$activity_id."' and time_schedule_id in(".$timescheduel.")  order by theTime limit 1";
		$this->result=$this->query($sqlTime);
		$this->getRow();
		$theTimeIdOfType=$this->getField('time_schedule_id');
		
				
				$sql="select cal.*,cal.discounted as act_discounted,otpr.* from ".parent::SUFFIX."calender cal left join ".parent::SUFFIX."other_price_details otpr on otpr.id=cal.other_price where cal.activity_id='".$activity_id."' and cal.sub_activity_type_id='".$typeId."' and cal.cal_date>='".date("Y-m-d")."' and cal.activity_time='".$theTimeIdOfType."' and otpr.price_type_name='Adult Price' order by cal.other_price, cal.cal_date limit 1";
				$this->result=$this->query($sql);
				$this->getAllRow();
				//echo "<br><br>Sub Act Type Id : ".$arrTypeId['id']." Time Id : ".$theTimeIdOfType;
				//echo "<br>"."Price : ".$this->getfield('price')." Is Discounted : ".$this->getfield('act_discounted')." Discounted Price :".$this->getfield('discounted_price');
				if($this->getfield('act_discounted')=='yes')
				{
						$discouted='yes';
				}
			
				# Getting all the sub activity prices in  array
				$arrPriceDtl[$i]['price']=$this->getfield('price');
				$arrPriceDtl[$i]['discounted_price']=$this->getfield('discounted_price');
				$arrPriceDtl[$i]['thetimeid']=$theTimeIdOfType;
				$arrPriceDtl[$i]['thetypeid']=$arrTypeId['id'];
		$i++;			
		}
		if($discouted=='yes')
		{
			usort($arrPriceDtl, array('Activity','discounted_price_compare')); //sorting the array on the discounted price
			foreach($arrPriceDtl as $priceDtl)
			{
					if($priceDtl['discounted_price']>0)
					{
							#Getting the the time id and type id from array which has discounted price greater than zero as undiscounted activity has discounted price 0
							$theTimeId=$priceDtl['thetimeid'];
							$theTypeId=$priceDtl['thetypeid'];
							break; # exiting the looop as first when first discounted price found which is greater than 0 
					}
			}
		}
		else
		{
			usort($arrPriceDtl, array('Activity','price_compare'));//sorting the array on the price
			#getting the timeid and typeid of first array eleement from sorted array
			$theTimeId=$arrPriceDtl[0]['thetimeid'];
			$theTypeId=$arrPriceDtl[0]['thetypeid'];
		}*/
		//echo "<br> Price : ".$price." The time Id  : ".$theTimeId." The Sub type id :".$theTypeId;
		
		$sql="select act.*,act.description as act_description,cnt.country_id,cnt.iso,cnt.country_name,cnt.currency_name,cnt.currency_rate,city.city_name,sat.*, sat.id as option_id,sad.*,cal.*,cal.discounted as act_discounted,shed_time.*,otpr.*,cntry.currency_symbol as curr_symb from ".parent::SUFFIX."booker_activities act left join ".parent::SUFFIX."country cnt on act.country_id=cnt.country_id left join ".parent::SUFFIX."city city on act.city_id=city.city_id left join ".parent::SUFFIX."sub_activity_type sat on (act.activity_id=sat.activity_id) left join  ".parent::SUFFIX."sub_activity_detail sad on (sat.id=sad.sub_activity_type_id) left join ".parent::SUFFIX."calender cal on (sad.sub_activity_id=cal.sub_activity_id) left join ".parent::SUFFIX."activity_time_schedule shed_time on shed_time.time_schedule_id=cal.activity_time left join ".parent::SUFFIX."other_price_details otpr on otpr.id=cal.other_price left join ".parent::SUFFIX."country cntry on cntry.currency_code=sad.currency_code    where act.activity_id='".$activity_id."' and cal.sub_activity_type_id='".$theTypeId."' and cal.cal_date>='".date("Y-m-d")."' and cal.activity_time='".$theTimeId."' and otpr.price_type_name='Adult Price' order by cal.other_price, cal.cal_date limit 1";
		$this->result=$this->query($sql);
	}
	
	
	public function getActByIdDtlPageByDate($activity_id,$search_date){
	
		$arrSubActDtl=array();
		$arrSubActDtl=$this->getSubTypeId($activity_id);
		
		$theTypeId=$arrSubActDtl[0];
		$theTimeId=$arrSubActDtl[1];
		
	
		/*$sql="select distinct(sat.`id`) from `".parent::SUFFIX."sub_activity_type` sat left join `".parent::SUFFIX."calender` cal on cal.`sub_activity_type_id`=sat.`id` where sat.`activity_id`='".$activity_id."' and cal.`cal_date`='".$search_date." order by sat.`id`";
		$this->result=$this->query($sql);
		
		$typeid=array();
		while($temp=$this->getAllRow())
		{
			$typeid[]=$temp;
		}
		$subActivityTypeId=$typeid[0]['id'];
	
		$getLatestTimeScheduel_id="select schedule_time from `".parent::SUFFIX."sub_activity_type` where `id`='".$subActivityTypeId."'";
		$this->result=$this->query($getLatestTimeScheduel_id);
		$this->getRow();
		$timescheduel=$this->getField('schedule_time');
		// get time scedule by activity id for latest time
		$sqlTime="SELECT time_schedule_id,(case 
			when (schedule_at='pm' and hour<12) then
				 `hour`+12 
			else
				( 
				case 
					when (schedule_at='am' and hour=12) then
				 		  `hour`-12 
					else
				 		  `hour` 
				end
				)
		    end) as theTime FROM ".parent::SUFFIX."activity_time_schedule where activity_id = '".$activity_id."' and time_schedule_id in(".$timescheduel.")  order by theTime limit 1";
		$this->result=$this->query($sqlTime);
		$this->getRow();
		$theTimeId=$this->getField('time_schedule_id');*/
	
		$sql="select act.*,act.description as act_description,cnt.country_id,cnt.iso,cnt.country_name,cnt.currency_name,cnt.currency_symbol,cnt.currency_rate,city.city_name,sat.*, sat.id as option_id,sad.*,cal.*,cal.discounted as act_discounted,shed_time.*,otpr.*,cntry.currency_symbol as curr_symb from ".parent::SUFFIX."booker_activities act left join ".parent::SUFFIX."country cnt on act.country_id=cnt.country_id left join ".parent::SUFFIX."city city on act.city_id=city.city_id left join ".parent::SUFFIX."sub_activity_type sat on (act.activity_id=sat.activity_id) left join  ".parent::SUFFIX."sub_activity_detail sad on (sat.id=sad.sub_activity_type_id) left join ".parent::SUFFIX."calender cal on (sad.sub_activity_id=cal.sub_activity_id) left join ".parent::SUFFIX."activity_time_schedule shed_time on shed_time.time_schedule_id=cal.activity_time left join ".parent::SUFFIX."other_price_details otpr on otpr.id=cal.other_price left join ".parent::SUFFIX."country cntry on cntry.currency_code=sad.currency_code  where act.activity_id='".$activity_id."' and cal.sub_activity_type_id='".$theTypeId."' and cal.cal_date='".$search_date."' and cal.activity_time='".$theTimeId."' otpr.price_type_name='Adult Price' order by cal.other_price, cal.cal_date limit 1";
		$this->result=$this->query($sql);
	}
	
	public function getDiscountedActivityById($activity_id){
		$arrSubActDtl=array();
		$arrSubActDtl=$this->getSubTypeId($activity_id);
		
		$theTypeId=$arrSubActDtl[0];
		$theTimeId=$arrSubActDtl[1];
		
/*		$sql="select distinct(sat.`id`) from `".parent::SUFFIX."sub_activity_type` sat left join `".parent::SUFFIX."calender` cal on cal.`sub_activity_type_id`=sat.`id` where sat.`activity_id`='".$activity_id."' and cal.`cal_date`=curDate() order by sat.`id`";
		
		$this->result=$this->query($sql);
		$typeid=array();
		while($temp=$this->getAllRow())
		{
			$typeid[]=$temp;
		}
		$subActivityTypeId=$typeid[0]['id'];
	
		$getLatestTimeScheduel_id="select schedule_time from `".parent::SUFFIX."sub_activity_type` where `id`='".$subActivityTypeId."'";
		$this->result=$this->query($getLatestTimeScheduel_id);
		$this->getRow();
		$timescheduel=$this->getField('schedule_time');
		// get time scedule by activity id for latest time
		$sqlTime="SELECT time_schedule_id,(case 
			when (schedule_at='pm' and hour<12) then
				 `hour`+12 
			else
				( 
				case 
					when (schedule_at='am' and hour=12) then
				 		  `hour`-12 
					else
				 		  `hour` 
				end
				)
		    end) as theTime FROM ".parent::SUFFIX."activity_time_schedule where activity_id = '".$activity_id."' and time_schedule_id in(".$timescheduel.")  order by theTime limit 1";
		$this->result=$this->query($sqlTime);
		$this->getRow();
		$theTimeId=$this->getField('time_schedule_id');*/    
	
		$sql="select act.*,cnt.country_id,cnt.iso,cnt.country_name,cnt.currency_name,cnt.currency_symbol,cnt.currency_rate,city.city_name,sat.*, sat.id as option_id,sad.*,cal.*,min(cal.price) price,shed_time.*,otpr.*,cntry.currency_symbol as curr_symb from ".parent::SUFFIX."booker_activities act left join ".parent::SUFFIX."country cnt on act.country_id=cnt.country_id left join ".parent::SUFFIX."city city on act.city_id=city.city_id left join ".parent::SUFFIX."sub_activity_type sat on (act.activity_id=sat.activity_id) left join  ".parent::SUFFIX."sub_activity_detail sad on (sat.id=sad.sub_activity_type_id) left join ".parent::SUFFIX."calender cal on (sad.sub_activity_id=cal.sub_activity_id) left join ".parent::SUFFIX."activity_time_schedule shed_time on shed_time.time_schedule_id=cal.activity_time left join ".parent::SUFFIX."other_price_details otpr on otpr.id=cal.other_price left join ".parent::SUFFIX."country cntry on cntry.currency_code=sad.currency_code where act.activity_id='".$activity_id."' and cal.sub_activity_type_id='".$theTypeId."' and cal.cal_date>='".date("Y-m-d")."' and cal.discounted='yes' and otpr.price_type_name='Adult Price' and  cal.activity_time='".$theTimeId."' order by cal.other_price, cal.cal_date limit 1";
		
		$this->result=$this->query($sql);
	}
	
	public function getDiscountedActivityByIdByDate($activity_id,$search_date){
		
		$arrSubActDtl=array();
		$arrSubActDtl=$this->getSubTypeId($activity_id);
		
		$theTypeId=$arrSubActDtl[0];
		$theTimeId=$arrSubActDtl[1];
		 
		
		/*$sql="select distinct(sat.`id`) from `".parent::SUFFIX."sub_activity_type` sat left join `".parent::SUFFIX."calender` cal on cal.`sub_activity_type_id`=sat.`id` where sat.`activity_id`='".$activity_id."' and cal.`cal_date`='".$search_date."' order by sat.`id`";
		$this->result=$this->query($sql);
		$typeid=array();
		while($temp=$this->getAllRow())
		{
			$typeid[]=$temp;
		}
		$subActivityTypeId=$typeid[0]['id'];
	
		$getLatestTimeScheduel_id="select schedule_time from `".parent::SUFFIX."sub_activity_type` where `id`='".$subActivityTypeId."'";
		$this->result=$this->query($getLatestTimeScheduel_id);
		$this->getRow();
		$timescheduel=$this->getField('schedule_time');
		// get time scedule by activity id for latest time
		$sqlTime="SELECT time_schedule_id,(case 
			when (schedule_at='pm' and hour<12) then
				 `hour`+12 
			else
				( 
				case 
					when (schedule_at='am' and hour=12) then
				 		  `hour`-12 
					else
				 		  `hour` 
				end
				)
		    end) as theTime FROM ".parent::SUFFIX."activity_time_schedule where activity_id = '".$activity_id."' and time_schedule_id in(".$timescheduel.")  order by theTime limit 1";
		$this->result=$this->query($sqlTime);
		$this->getRow();
		$theTimeId=$this->getField('time_schedule_id');*/  
		
		$sql="select act.*,cnt.country_id,cnt.iso,cnt.country_name,cnt.currency_name,cnt.currency_symbol,cnt.currency_rate,city.city_name,sat.*, sat.id as option_id,sad.*,cal.*,min(cal.price) price,shed_time.*,otpr.*,cntry.currency_symbol as curr_symb  from ".parent::SUFFIX."booker_activities act left join ".parent::SUFFIX."country cnt on act.country_id=cnt.country_id left join ".parent::SUFFIX."city city on act.city_id=city.city_id left join ".parent::SUFFIX."sub_activity_type sat on (act.activity_id=sat.activity_id) left join  ".parent::SUFFIX."sub_activity_detail sad on (sat.id=sad.sub_activity_type_id) left join ".parent::SUFFIX."calender cal on (sad.sub_activity_id=cal.sub_activity_id) left join ".parent::SUFFIX."activity_time_schedule shed_time on shed_time.time_schedule_id=cal.activity_time left join ".parent::SUFFIX."other_price_details otpr on otpr.id=cal.other_price left join ".parent::SUFFIX."country cntry on cntry.currency_code=sad.currency_code where act.activity_id='".$activity_id."' and cal.sub_activity_type_id='".$theTypeId."' and cal.cal_date='".$search_date."' and cal.discounted='yes' and otpr.price_type_name='Adult Price' and cal.activity_time='".$theTimeId."' order by cal.other_price, cal.cal_date limit 1";
		
		$this->result=$this->query($sql);
	}
	
	public function getActivityByCityId($city_id)
	{

		// fetch all activities matching city id from calender for now and next days
		$sqlActsFromCalender="SELECT distinct(".parent::SUFFIX."calender.sub_activity_id),".parent::SUFFIX."booker_activities.activity_id,".parent::SUFFIX."other_price_details.id,".parent::SUFFIX."sub_activity_detail.currency_code FROM ".parent::SUFFIX."calender 
							  inner join ".parent::SUFFIX."sub_activity_detail on ".parent::SUFFIX."calender.sub_activity_id = ".parent::SUFFIX."sub_activity_detail.sub_activity_id
							  inner join ".parent::SUFFIX."booker_activities on ".parent::SUFFIX."sub_activity_detail.activity_id =  ".parent::SUFFIX."booker_activities.activity_id
							  inner join ".parent::SUFFIX."other_price_details on ".parent::SUFFIX."calender.other_price=".parent::SUFFIX."other_price_details.id
							  where cal_date >= curdate() and ".parent::SUFFIX."booker_activities.city_id='".$city_id."' and ".parent::SUFFIX."other_price_details.price_type_name='Adult Price' group by ".parent::SUFFIX."booker_activities.activity_id";
							  
		$this->result=$this->query($sqlActsFromCalender);
		$arrActivities=array();
		while($this->getRow())
		{
				$arrActivities[]=array($this->getField("sub_activity_id"),$this->getField("activity_id"),$this->getField("id"),$this->getField("currency_code"));
		}
		
		$arrReturnInfo=array();
		// ok now you get all the sub activities from calender. Now fetch the lastest price info and other related information for this sub activity
		foreach($arrActivities as $key=>$theSubActivity)
		{
			$activity_id=$theSubActivity[1];
			$subTypeInfo=array();
			$subTypeInfo=$this->getSubTypeId($activity_id);	
			$arrReturnInfo[]=$this->getActivityDetailsTimeWise($subTypeInfo[0],$theSubActivity[1],$subTypeInfo[2],$theSubActivity[3],$subTypeInfo[1]);
		}
		/*foreach($arrActivities as $theSubActivity)
		{
			$arrReturnInfo[]=$this->getActivityDetailsTimeWise($theSubActivity[0],$theSubActivity[1],$theSubActivity[2],$theSubActivity[3]);
		}*/
		return $arrReturnInfo;
	}
	
		
	public function getActivityDetailsTimeWise($subActivityId,$activity_id,$priceId,$currency_code,$theTimeId)
	{
		//Getting the time_schedule_ids for sub_activity_type_id
		/*$sqlTimeIDs="select schedule_time from ".parent::SUFFIX."sub_activity_type where id='".$subActivityId."' and admin_deleted='No' and supplier_deleted='No'";
		$this->result=$this->query($sqlTimeIDs);
		$this->getRow();
		$timeIDs=$this->getField('schedule_time');*/
	
		// get time scedule by activity id for latest time
		/*$sqlTime="SELECT time_schedule_id,(case when (schedule_at='pm') then `hour`+12 else `hour` end) as theTime FROM ".parent::SUFFIX."activity_time_schedule where activity_id = '".$activity_id."' and time_schedule_id in(".$timeIDs.") order by theTime limit 1";
		$this->result=$this->query($sqlTime);
		$this->getRow();
		$theTimeId=$this->getField('time_schedule_id');*/
		
		
		/*$getLatestTimeScheduel_id="select sub_activity_name,schedule_time from `".parent::SUFFIX."sub_activity_type` where `id`='".$subActivityId."'";
		$this->result=$this->query($getLatestTimeScheduel_id);
		$this->getRow();
		$timescheduel=$this->getField('schedule_time');
		$sub_activity_name=$this->getField('sub_activity_name');
		// get time scedule by activity id for latest time
		$sqlTime="SELECT time_schedule_id,(case 
			when (schedule_at='pm' and hour<12) then
				 `hour`+12 
			else
				( 
				case 
					when (schedule_at='am' and hour=12) then
				 		  `hour`-12 
					else
				 		  `hour` 
				end
				)
		    end) as theTime FROM ".parent::SUFFIX."activity_time_schedule where activity_id = '".$activity_id."' and time_schedule_id in(".$timescheduel.")  order by theTime limit 1";
		$this->result=$this->query($sqlTime);
		$this->getRow();
		$theTimeId=$this->getField('time_schedule_id');*/
		
		// now fetch price from calendar....
		
		$sqlPrice="select price,discounted,discounted_price from  ".parent::SUFFIX."calender where sub_activity_id='".$subActivityId."' and activity_time='".$theTimeId."' and other_price='".$priceId."' limit 1";
		$this->result=$this->query($sqlPrice);
		$this->getRow();
		$arrActPriceInfo=array($this->getField('price'),$this->getField('discounted'),$this->getField('discounted_price'));
		
		$sql="select currency_symbol from ".parent::SUFFIX."country where currency_code='".$currency_code."'";
		$this->result=$this->query($sql);
		$this->getRow();
		$currency_symbol=$this->getField('currency_symbol');
		
		#Getting the activity overall rating and coun of rating.
		$sql="select count(rating_id) as count,avg(average_rating) as rating from `".parent::SUFFIX."rating` where activity_id='".$activity_id."'";
		$this->result=$this->query($sql);
		$this->getRow();
		$rating_count=$this->getField('count');
		$rating=number_format($this->getField('rating'),2);
		
		// now fetch necessary elements from sub activity like name and all		
		$sql="select act.activity_booker_name, act.description,city.city_name, img.image_path from ".parent::SUFFIX."booker_activities act inner join ".parent::SUFFIX."activity_photo img on act.activity_id = img.activity_id inner join ".parent::SUFFIX."city city on act.city_id=city.city_id where act.activity_id='".$activity_id."'";
		
		$this->result=$this->query($sql);
		$this->getRow();
		
		$arrAct=array('id'=>$subActivityId,'sub_activity_name'=>$sub_activity_name,'activity_id'=>$activity_id,'whole_amt'=>$arrActPriceInfo[0] ,'price'=>$arrActPriceInfo[0],'act_discounted'=>$arrActPriceInfo[1],'dis_price'=>$arrActPriceInfo[2],'act_image_path'=>$this->getField('image_path'),'activity_desc'=>$this->getField('description'),'activity_booker_name'=>$this->getField('activity_booker_name'),'city_name'=>$this->getField('city_name'),'currency_symbol'=>$currency_symbol,'currency_code'=>$currency_code,'rating_count'=>$rating_count,'rating'=>$rating);
		return $arrAct;
	}
	
	
	public function getActivityDetailsTimeWiseForDiscounted($subActivityId,$activity_id,$priceId,$currency_code,$theTimeId)
	{
		//Getting the time_schedule_ids for sub_activity_type_id
		/*$getLatestTimeScheduel_id="select schedule_time from `".parent::SUFFIX."sub_activity_type` where `id`='".$subActivityId."'";
		$this->result=$this->query($getLatestTimeScheduel_id);
		$this->getRow();
		$timescheduel=$this->getField('schedule_time');
		// get time scedule by activity id for latest time
		$sqlTime="SELECT time_schedule_id,(case 
			when (schedule_at='pm' and hour<12) then
				 `hour`+12 
			else
				( 
				case 
					when (schedule_at='am' and hour=12) then
				 		  `hour`-12 
					else
				 		  `hour` 
				end
				)
		    end) as theTime FROM ".parent::SUFFIX."activity_time_schedule where activity_id = '".$activity_id."' and time_schedule_id in(".$timescheduel.")  order by theTime limit 1";
		$this->result=$this->query($sqlTime);
		$this->getRow();
		$theTimeId=$this->getField('time_schedule_id');*/
	
		
		/*$sqlTimeIDs="select schedule_time from ".parent::SUFFIX."sub_activity_type where id='".$subActivityId."' and admin_deleted='No' and supplier_deleted='No'";
		$this->result=$this->query($sqlTimeIDs);
		$this->getRow();
		$timeIDs=$this->getField('schedule_time');
		
		// get time scedule by activity id for latest time
		$sqlTime="SELECT time_schedule_id,(case when (schedule_at='pm') then `hour`+12 else `hour` end) as theTime FROM ".parent::SUFFIX."activity_time_schedule where activity_id = '".$activity_id."' and time_schedule_id in(".$timeIDs.") order by theTime limit 1";
		$this->result=$this->query($sqlTime);
		$this->getRow();
		$theTimeId=$this->getField('time_schedule_id');*/
		
		// now fetch price from calendar....
		
		$sqlPrice="select price,discounted,discounted_price from  ".parent::SUFFIX."calender where sub_activity_type_id='".$subActivityId."' and activity_time='".$theTimeId."' and cal_date=curdate() and other_price='".$priceId."' limit 1";
		$this->result=$this->query($sqlPrice);
		$this->getRow();
		$arrActPriceInfo=array($this->getField('price'),$this->getField('discounted'),$this->getField('discounted_price'));
		
		$sql="select currency_symbol from ".parent::SUFFIX."country where currency_code='".$currency_code."'";
		$this->result=$this->query($sql);
		$this->getRow();
		$currency_symbol=$this->getField('currency_symbol');
		
		#Getting the activity overall rating and coun of rating.
		$sql="select count(rating_id) as count,avg(average_rating) as rating from `".parent::SUFFIX."rating` where activity_id='".$activity_id."'";
		$this->result=$this->query($sql);
		$this->getRow();
		$rating_count=$this->getField('count');
		$rating=number_format($this->getField('rating'),2);

		// now fetch necessary elements from sub activity like name and all		
		$sql="select act.activity_booker_name, act.description,city.city_name,cntry.country_name,img.image_path from ".parent::SUFFIX."booker_activities act inner join ".parent::SUFFIX."activity_photo img on act.activity_id = img.activity_id inner join ".parent::SUFFIX."city city on act.city_id=city.city_id inner join  ".parent::SUFFIX."country cntry on cntry.country_id=act.country_id  where act.activity_id='".$activity_id."'";
		
		$this->result=$this->query($sql);
		$this->getRow();
		
		$arrAct=array('id'=>$subActivityId,'activity_id'=>$activity_id,'whole_amt'=>$arrActPriceInfo[0] ,'price'=>$arrActPriceInfo[0],'act_discounted'=>$arrActPriceInfo[1],'dis_price'=>$arrActPriceInfo[2],'act_image_path'=>$this->getField('image_path'),'activity_desc'=>$this->getField('description'),'activity_booker_name'=>$this->getField('activity_booker_name'),'city_name'=>$this->getField('city_name'),'country_name'=>$this->getField('country_name'),'currency_symbol'=>$currency_symbol,'currency_code'=>$currency_code,'rating_count'=>$rating_count,'rating'=>$rating);
		
		return $arrAct;
		
	}
	
	public function getActivityByCityIdOld($city_id){
			
		$sql="select distinct(A.activity_id), A.description as activity_desc,A.*,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted,C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnTry.*,City.* 
		from ".parent::SUFFIX."booker_activities as A 
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnTry 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON A.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (A.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and A.country_id=cnTry.country_id 
		and A.City_id=City.city_id   
		where A.city_id = '".$city_id."' 
		and A.active='yes' 
		and C.cal_date>=curdate() group by A.activity_id order by C.other_price asc , C.cal_date ,whole_amt ";
		$this->result=$this->query($sql);
	}
	
	public function getActivityByCityIdPage($city_id,$limit,$offset){
		$sql="select A.description as activity_desc,A.*,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted,C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnTry.*,City.* 
		from ".parent::SUFFIX."booker_activities as A 
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnTry 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON A.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (A.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and A.country_id=cnTry.country_id 
		and A.City_id=City.city_id   
		where A.city_id = '".$city_id."'  
		and A.active='yes' 
		and C.cal_date>=curdate() group by A.activity_id order by C.other_price asc , C.cal_date,  whole_amt limit $offset, $limit";
		$this->result=$this->query($sql);
	}
	public function getActivityByCityandCatId($city_id,$cat_id){
		$sql="select A.description as activity_desc,A.*,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted,C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnTry.*,City.*,shed_time.*,otpr.*
		from ".parent::SUFFIX."booker_activities A 
		LEFT JOIN ".parent::SUFFIX."sub_activity_type subActTpy on A.activity_id= subActTpy.activity_id
		LEFT JOIN ".parent::SUFFIX."calender C on C.sub_activity_id=subActTpy.id
		LEFT JOIN ".parent::SUFFIX."sub_activity_detail subActDtl on subActTpy.id=subActDtl.sub_activity_id
		LEFT JOIN ".parent::SUFFIX."activity_photo  actPhoto on actPhoto.activity_id=A.activity_id
		LEFT JOIN ".parent::SUFFIX."country cnTry on A.country_id=cnTry.country_id
		LEFT JOIN ".parent::SUFFIX."city City on A.city_id=City.city_id  
		LEFT JOIN ".parent::SUFFIX."activity_time_schedule shed_time on shed_time.time_schedule_id=C.activity_time
		LEFT JOIN ".parent::SUFFIX."other_price_details otpr on otpr.id=C.other_price
		where A.city_id = '".$city_id."' 
		and A.cat_id in(".$cat_id.") 
		and C.cal_date>=curdate()
		and otpr.price_type_name='Adult Price' order by subActTpy.id,shed_time.schedule_at,shed_time.hour,C.other_price,C.cal_date"; 
		$this->result=$this->query($sql);
	}
	

	public function getActivityByCityandCatIdPage($city_id,$cat_id,$limit,$offset){
		$sql="select A.description as activity_desc,A.*,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted,C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnTry.*,City.*,shed_time.*,otpr.*
		from ".parent::SUFFIX."booker_activities A 
		LEFT JOIN ".parent::SUFFIX."sub_activity_type subActTpy on A.activity_id= subActTpy.activity_id
		LEFT JOIN ".parent::SUFFIX."calender C on C.sub_activity_id=subActTpy.id
		LEFT JOIN ".parent::SUFFIX."sub_activity_detail subActDtl on subActTpy.id=subActDtl.sub_activity_id
		LEFT JOIN ".parent::SUFFIX."activity_photo  actPhoto on actPhoto.activity_id=A.activity_id
		LEFT JOIN ".parent::SUFFIX."country cnTry on A.country_id=cnTry.country_id
		LEFT JOIN ".parent::SUFFIX."city City on A.city_id=City.city_id  
		LEFT JOIN ".parent::SUFFIX."activity_time_schedule shed_time on shed_time.time_schedule_id=C.activity_time
		LEFT JOIN ".parent::SUFFIX."other_price_details otpr on otpr.id=C.other_price
		where A.city_id = '".$city_id."' 
		and A.cat_id in(".$cat_id.") 
		and C.cal_date>=curdate()
		and otpr.price_type_name='Adult Price' order by subActTpy.id,shed_time.schedule_at,shed_time.hour,C.other_price,C.cal_date limit $offset, $limit";		
		$this->result=$this->query($sql);
	}
	
	
	public function getActivityByCityWithDate($city_id,$search_date){
		$sql="select A.description as activity_desc,A.*,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted,C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnTry.*,City.* 
		from ".parent::SUFFIX."booker_activities as A 
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnTry 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON A.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (A.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and A.country_id=cnTry.country_id 
		and A.City_id=City.city_id   
		where A.city_id = '".$city_id."' 
		and A.active='yes' 
		and C.cal_date='".date("Y-m-d",strtotime($search_date))."' group by A.activity_id order by C.other_price,C.cal_date, whole_amt";
		$this->result=$this->query($sql);
	}
	

	public function getActivityByCityWithDatePage($city_id,$search_date,$limit,$offset){
		$sql="select A.description as activity_desc,A.*,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted,C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnTry.*,City.* 
		from ".parent::SUFFIX."booker_activities as A 
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnTry 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON A.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (A.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and A.country_id=cnTry.country_id 
		and A.City_id=City.city_id   
		where A.city_id = '".$city_id."' 
		and A.active='yes' 
		and C.cal_date='".date("Y-m-d",strtotime($search_date))."' group by A.activity_id order by C.other_price,C.cal_date, whole_amt limit $offset, $limit";		
		$this->result=$this->query($sql);
	}
	
	public function getActivityByCountryId($country_id){
		$sql="select a.*,b.image_path,c.country_name,d.city_name, d.city_id from ".parent::SUFFIX."booker_activities a left join ".parent::SUFFIX."activity_photo b on (a.activity_id = b.activity_id and b.`default`=1) left join ".parent::SUFFIX."country c on a.country_id = c.country_id left join ".parent::SUFFIX."city d on a.city_id = d.city_id where a.country_id ='".$country_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getCountryPageDetailsById($country_id){
		$sql="select * from ".parent::SUFFIX."country where country_id='".$country_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getAllActivityCat(){
		$sql="select * from ".parent::SUFFIX."category where parent_id='0'";
		$this->result=$this->query($sql);
	}
	
	public function getCityCountForActivity($city_id){
		 $sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code FROM ".parent::SUFFIX."calender cal 
				  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
				  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
				  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
				  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
				  where cal.cal_date>=curDate() and act.city_id='".$city_id."' and opd.price_type_name='Adult Price' and act.active='yes' and cal.is_price='yes' group by act.activity_id ";
$this->result=$this->query($sqlActsFromCalender);
	}
	
	public function getActivityDtlForCompareById($activity_id){
		
		$arrSubActDtl=array();
		$arrSubActDtl=$this->getSubTypeId($activity_id);
		
		$theTypeId=$arrSubActDtl[0];
		$theTimeId=$arrSubActDtl[1];    
		
		$sql="select act.*,act.description as act_description,cnt.country_id,cnt.iso,cnt.country_name,cnt.currency_name,cnt.currency_rate,city.city_name,sat.*, sat.id as option_id,sad.*,cal.*,cal.discounted as act_discounted,shed_time.*,otpr.*,cntry.currency_symbol as curr_symb from ".parent::SUFFIX."booker_activities act left join ".parent::SUFFIX."country cnt on act.country_id=cnt.country_id left join ".parent::SUFFIX."city city on act.city_id=city.city_id left join ".parent::SUFFIX."sub_activity_type sat on (act.activity_id=sat.activity_id) left join  ".parent::SUFFIX."sub_activity_detail sad on (sat.id=sad.sub_activity_type_id) left join ".parent::SUFFIX."calender cal on (sad.sub_activity_id=cal.sub_activity_id) left join ".parent::SUFFIX."activity_time_schedule shed_time on shed_time.time_schedule_id=cal.activity_time left join ".parent::SUFFIX."other_price_details otpr on otpr.id=cal.other_price left join ".parent::SUFFIX."country cntry on cntry.currency_code=sad.currency_code    where act.activity_id='".$activity_id."' and cal.sub_activity_type_id='".$theTypeId."' and cal.cal_date>='".date("Y-m-d")."' and cal.activity_time='".$theTimeId."' and otpr.price_type_name='Adult Price' order by cal.other_price, cal.cal_date limit 1";
		$this->result=$this->query($sql);
		
		
	
		/*$sql="select act.*,act.description as activity_desc,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,actPhoto.*,actPhoto.image_path as act_image_path,cnt.*,City.* 
		from ".parent::SUFFIX."booker_activities as act
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnt 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON act.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (act.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and act.country_id=cnt.country_id 
		and act.City_id=City.city_id   
		where act.activity_id = '".$activity_id."' 
		and C.cal_date>=curdate() group by C.cal_date,C.other_price,act.activity_id";*/
		
		
		/*$sql="select act.*,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,actPhoto.*,actPhoto.image_path as act_image_path,cnt.*,City.*
		from ".parent::SUFFIX."booker_activities as act
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnt 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON act.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (act.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and act.country_id=cnt.country_id 
		and act.City_id=City.city_id
		where act.activity_id='".$activity_id."' 
		and C.cal_date>=curdate() group by act.activity_id";		
		$this->result=$this->query($sql);*/
	}
	
	public function getCategoryNameById($cat_id)
	{
		$sql="select cat_name from ".parent::SUFFIX."category where cat_id='".$cat_id."'";
		$this->result=$this->query($sql);
		$this->getAllRow();
		return $this->getField('cat_name');
	}
	
	public function getCountryNameById($country_id)
	{
		$sql="select country_name from ".parent::SUFFIX."country where country_id='".$country_id."'";
		$this->result=$this->query($sql);
		$this->getAllRow();
		return $this->getField('country_name');
	}
	
	public function getActivityByCountryIdAndCityId($where_cond){
		$sql="select act.*,act.description as activity_desc,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted, C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnt.*,City.* 
		from ".parent::SUFFIX."booker_activities as act
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnt 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON act.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (act.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and act.country_id=cnt.country_id 
		and act.City_id=City.city_id   
		where 1 ".$where_cond."
		and act.active='yes' 
		and C.cal_date>=curdate() group by act.activity_id order by C.other_price,C.cal_date";
		
		$this->result=$this->query($sql);
	}
	
	public function getActivityByCountryIdAndCityIdPage($where_cond,$limit,$offset){	
		$sql="select act.*,act.description as activity_desc,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted, C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnt.*,City.* 
		from ".parent::SUFFIX."booker_activities as act
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnt 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON act.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (act.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and act.country_id=cnt.country_id 
		and act.City_id=City.city_id   
		where 1 ".$where_cond."
		and act.active='yes' 
		and C.cal_date>=curdate() group by act.activity_id order by C.other_price,C.cal_date limit $offset, $limit";
		
	$this->result=$this->query($sql);
	}
	public function getActivityByCountryOrCity($where_cond){	
		$sql="select act.*,act.description as activity_desc,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted, C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnt.*,City.* 
		from ".parent::SUFFIX."booker_activities as act
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnt 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON act.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (act.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and act.country_id=cnt.country_id 
		and act.City_id=City.city_id   
		where 1 ".$where_cond."
		and act.active='yes' 
		 group by act.activity_id order by C.other_price,C.cal_date";
	
		$this->result=$this->query($sql);
	}
	public function getActivityByCountryOrCityPage($where_cond,$limit,$offset){
		$sql="select act.*,act.description as activity_desc,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted, C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnt.*,City.* 
		from ".parent::SUFFIX."booker_activities as act
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnt 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON act.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (act.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and act.country_id=cnt.country_id 
		and act.City_id=City.city_id   
		where 1 ".$where_cond."
		and act.active='yes' 
		and C.cal_date>=curdate() group by act.activity_id order by C.other_price,C.cal_date limit $offset, $limit";
		$this->result=$this->query($sql);
	}
	
	public function getCountryName1($country_id)
	{
		$sql="select country_name from ".parent::SUFFIX."country where country_name='".$country_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getActivityByCityAjaxSearch($arr){
		$str_cat='';
		$arrCount=count($arr['search_category']);
		$kk=1;
		if($arrCount>0){
			foreach($arr['search_category'] as $arrSearchCategory){
				if($kk<$arrCount && $kk>0){
					$str_cat.=$arrSearchCategory." ,";
				}
				if($kk==$arrCount){
					$str_cat.=$arrSearchCategory;
				}
				$kk++;
			}
			$str_cat=" and A.cat_id in(".$str_cat.")";
		}
		// order by
		if($arr['orderBySearch']=='activity_booker_name'){
			$orderby=" order by C.other_price,C.cal_date, A.activity_booker_name ";
		}elseif($arr['orderBySearch']=='whole_amt'){
			$orderby=" order by C.other_price,C.cal_date, C.price ";
		}elseif($arr['orderBySearch']=='rating'){
			$orderby=" ";
		}else{
			$orderby=" order by C.other_price,C.cal_date, A.activity_id DESC";
		}
		// Limit
		if($arr['perPage']=='all'){
			$perPage=" ";
		}elseif($arr['perPage']!=''){
			$perPage=" limit 0, ".$arr['perPage']."";
		}else{
			$perPage=" ";
		}
		
		if($arr['is_discounted']=='yes'){
			$price_range=" and C.discounted_price between '".$arr['price_from']."' and '".$arr['price_to']."' ";
		}else{
			$price_range=" and C.price between '".$arr['price_from']."' and '".$arr['price_to']."' ";
		}
		
		$sql="select A.*,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted,C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnTry.*,City.* 
		from ".parent::SUFFIX."booker_activities as A 
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnTry 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON A.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (A.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and A.country_id=cnTry.country_id 
		and A.City_id=City.city_id   
		where A.city_id = '".$arr['city_id']."' 
		and A.active='yes' 
		and C.cal_date>=curdate() ".$price_range." ".$str_cat." group by A.activity_id ".$orderby."";
		$this->result=$this->query($sql);
	}
	
	public function getActivityByCityAjaxSearchPage($arr,$limit,$offset){
		$str_cat='';
		$arrCount=count($arr['search_category']);
		$kk=1;
		if($arrCount>0){
			foreach($arr['search_category'] as $arrSearchCategory){
				if($kk<$arrCount && $kk>0){
					$str_cat.=$arrSearchCategory." ,";
				}
				if($kk==$arrCount){
					$str_cat.=$arrSearchCategory;
				}
				$kk++;
			}
			$str_cat=" and A.cat_id in(".$str_cat.")";
		}
		// order by
		if($arr['orderBySearch']=='most_popular'){
			$orderby=" ";
		}elseif($arr['orderBySearch']=='whole_amt'){
			$orderby=" order by C.other_price,C.cal_date,C.price ";
		}elseif($arr['orderBySearch']=='most_discount'){
			$orderby=" ";
		}else{
			$orderby=" order by C.other_price, C.cal_date,A.activity_id DESC";
		}
		// Limit
		if($arr['perPage']=='all'){
			$perPage=" ";
		}elseif($arr['perPage']!=''){
			$perPage=" limit ".$offset.", ".$arr['perPage']."";
		}else{
			$perPage=" ";
		}
		
		if($arr['is_discounted']=='yes'){
			$price_range=" and C.discounted_price between '".$arr['price_from']."' and '".$arr['price_to']."' ";
		}else{
			$price_range=" and C.price between '".$arr['price_from']."' and '".$arr['price_to']."' ";
		}
		
		$sql="select A.*,A.description as activity_desc, C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted,C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnTry.*,City.* 
		from ".parent::SUFFIX."booker_activities as A 
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnTry 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON A.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (A.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and A.country_id=cnTry.country_id 
		and A.City_id=City.city_id   
		where A.city_id = '".$arr['city_id']."'  
		and A.active='yes' 
		and C.cal_date>=curdate() ".$price_range." ".$str_cat." group by A.activity_id ".$orderby." ".$perPage;
		
		$this->result=$this->query($sql);
	}
	
	public function getActivityByCityandCatIdAjaxSearch($arr){
		$str_cat='';
		$arrCount=count($arr['search_category']);
		$kk=1;
		if($arrCount>0){
			foreach($arr['search_category'] as $arrSearchCategory){
				if($kk<$arrCount && $kk>0){
					$str_cat.=$arrSearchCategory." ,";
				}
				if($kk==$arrCount){
					$str_cat.=$arrSearchCategory;
				}
				$kk++;
			}
			$str_cat=" and A.cat_id in(".$str_cat.")";
		}
		// order by
		if($arr['orderBySearch']=='activity_booker_name'){
			$orderby=" order by C.other_price,C.cal_date, A.activity_booker_name ";
		}elseif($arr['orderBySearch']=='whole_amt'){
			$orderby=" order by C.other_price,  C.cal_date,C.price ";
		}elseif($arr['orderBySearch']=='rating'){
			$orderby=" ";
		}else{
			$orderby=" order by C.other_price,C.cal_date, A.activity_id DESC";
		}
		// Limit
		if($arr['perPage']=='all'){
			$perPage=" ";
		}elseif($arr['perPage']!=''){
			$perPage=" limit 0, ".$arr['perPage']."";
		}else{
			$perPage=" ";
		}		
		if($arr['is_discounted']=='yes'){
			$price_range=" and C.discounted_price between '".$arr['price_from']."' and '".$arr['price_to']."' ";
		}else{
			$price_range=" and C.price between '".$arr['price_from']."' and '".$arr['price_to']."' ";
		}
		$sql="select A.*,A.description as activity_desc,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted, C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnTry.*,City.* 
		from ".parent::SUFFIX."booker_activities as A 
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnTry 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON A.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (A.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and A.country_id=cnTry.country_id 
		and A.City_id=City.city_id   
		where A.city_id = '".$arr['city_id']."' 
		and A.active='yes' 
		and C.cal_date>=curdate() ".$price_range." ".$str_cat." group by A.activity_id ".$orderby." ".$perPage;
		$this->result=$this->query($sql);
	}
	
	public function getActivityByCityandCatIdAjaxSearchPage($arr,$limit,$offset){
		$str_cat='';
		$arrCount=count($arr['search_category']);
		$kk=1;
		if($arrCount>0){
			foreach($arr['search_category'] as $arrSearchCategory){
				if($kk<$arrCount && $kk>0){
					$str_cat.=$arrSearchCategory." ,";
				}
				if($kk==$arrCount){
					$str_cat.=$arrSearchCategory;
				}
				$kk++;
			}
			$str_cat=" and A.cat_id in(".$str_cat.")";
		}
		// order by
		if($arr['orderBySearch']=='activity_booker_name'){
			$orderby=" order by C.other_price,C.cal_date, A.activity_booker_name ";
		}elseif($arr['orderBySearch']=='whole_amt'){
			$orderby=" order by C.other_price,C.cal_date, C.price ";
		}elseif($arr['orderBySearch']=='rating'){
			$orderby=" ";
		}else{
			$orderby=" order by C.other_price,C.cal_date, A.activity_id DESC";
		}
		// Limit
		if($arr['perPage']=='all'){
			$perPage=" ";
		}elseif($arr['perPage']!=''){
			$perPage=" limit 0, ".$arr['perPage']."";
		}else{
			$perPage=" ";
		}	
		
		if($arr['is_discounted']=='yes'){
			$price_range=" and C.discounted_price between '".$arr['price_from']."' and '".$arr['price_to']."' ";
		}else{
			$price_range=" and C.price between '".$arr['price_from']."' and '".$arr['price_to']."' ";
		}
			
		$sql="select A.*,A.description as activity_desc,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted, C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnTry.*,City.* 
		from ".parent::SUFFIX."booker_activities as A 
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnTry 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON A.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (A.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and A.country_id=cnTry.country_id 
		and A.City_id=City.city_id   
		where A.city_id = '".$arr['city_id']."'
		and A.active='yes'  
		and C.cal_date>=curdate() ".$price_range." ".$str_cat." group by A.activity_id ".$orderby." ".$perPage;
	
		$this->result=$this->query($sql);
	}
	
	public function getActivityByCityandDateAjaxSearch($arr){
		
		// order by
		if($arr['orderBySearch']=='activity_booker_name'){
			$orderby=" order by C.other_price,C.cal_date, A.activity_booker_name ";
		}elseif($arr['orderBySearch']=='whole_amt'){
			$orderby=" order by C.other_price,  C.cal_date,C.price ";
		}elseif($arr['orderBySearch']=='rating'){
			$orderby=" ";
		}else{
			$orderby=" order by C.other_price,C.cal_date, A.activity_id DESC";
		}
		// Limit
		if($arr['perPage']=='all'){
			$perPage=" ";
		}elseif($arr['perPage']!=''){
			$perPage=" limit 0, ".$arr['perPage']."";
		}else{
			$perPage=" ";
		}		
		if($arr['is_discounted']=='yes'){
			$price_range=" and C.discounted_price between '".$arr['price_from']."' and '".$arr['price_to']."' ";
		}else{
			$price_range=" and C.price between '".$arr['price_from']."' and '".$arr['price_to']."' ";
		}
		$sql="select A.*,A.description as activity_desc,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted, C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnTry.*,City.* 
		from ".parent::SUFFIX."booker_activities as A 
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnTry 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON A.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (A.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and A.country_id=cnTry.country_id 
		and A.City_id=City.city_id   
		where A.city_id = '".$arr['city_id']."' 
		and A.active='yes' 
		and C.cal_date='".date("Y-m-d",strtotime($arr['search_date']))."' ".$price_range."  group by A.activity_id ".$orderby." ".$perPage;
		$this->result=$this->query($sql);
	}
	
	public function getActivityByCityandDateAjaxSearchPage($arr,$limit,$offset){
		
		// order by
		if($arr['orderBySearch']=='activity_booker_name'){
			$orderby=" order by C.other_price,C.cal_date, A.activity_booker_name ";
		}elseif($arr['orderBySearch']=='whole_amt'){
			$orderby=" order by C.other_price,C.cal_date, C.price ";
		}elseif($arr['orderBySearch']=='rating'){
			$orderby=" ";
		}else{
			$orderby=" order by C.other_price,C.cal_date, A.activity_id DESC";
		}
		// Limit
		if($arr['perPage']=='all'){
			$perPage=" ";
		}elseif($arr['perPage']!=''){
			$perPage=" limit 0, ".$arr['perPage']."";
		}else{
			$perPage=" ";
		}	
		
		if($arr['is_discounted']=='yes'){
			$price_range=" and C.discounted_price between '".$arr['price_from']."' and '".$arr['price_to']."' ";
		}else{
			$price_range=" and C.price between '".$arr['price_from']."' and '".$arr['price_to']."' ";
		}
			
		$sql="select A.*,A.description as activity_desc,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted, C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnTry.*,City.* 
		from ".parent::SUFFIX."booker_activities as A 
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnTry 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON A.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (A.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and A.country_id=cnTry.country_id 
		and A.City_id=City.city_id   
		where A.city_id = '".$arr['city_id']."' 
		and A.active='yes' 
		and C.cal_date='".date("Y-m-d",strtotime($arr['search_date']))."' ".$price_range."  group by A.activity_id ".$orderby." ".$perPage;
	
		$this->result=$this->query($sql);
	}
	
	public function getActivityByCountryIdAndCityIdAjaxSearch($arr){
		$where_cond=$arr['where_cond'];	
		if($arr['orderBySearch']=='activity_booker_name'){
			$orderby=" order by  C.other_price,C.cal_date,  act.activity_booker_name ";
		}elseif($arr['orderBySearch']=='whole_amt'){
			$orderby=" order by C.other_price,C.cal_date, C.price ";
		}elseif($arr['orderBySearch']=='rating'){
			$orderby=" ";
		}else{
			$orderby=" order by  C.other_price,C.cal_date, act.activity_id DESC";
		}
		// Limit
		if($arr['perPage']=='all'){
			$perPage=" ";
		}elseif($arr['perPage']!=''){
			$perPage=" limit 0, ".$arr['perPage']."";
		}else{
			$perPage=" ";
		}
			
		$sql="select act.*,act.description as activity_desc,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted, C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnt.*,City.* 
		from ".parent::SUFFIX."booker_activities as act
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnt 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON act.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (act.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and act.country_id=cnt.country_id 
		and act.City_id=City.city_id   
		where 1 ".$where_cond."
		and act.active='yes' 
		and C.cal_date>=curdate() group by act.activity_id ".$orderby;
		
		$this->result=$this->query($sql);
	}
	
	public function getActivityByCountryIdAndCityIdAjaxSearchPage($arr,$limit,$offset){
		// order by
			$where_cond=$arr['where_cond'];
		if($arr['orderBySearch']=='most_popular'){
			$orderby=" ";
		}elseif($arr['orderBySearch']=='whole_amt'){
			$orderby=" order by  C.other_price,C.cal_date, C.price ";
		}elseif($arr['orderBySearch']=='most_discount'){
			$orderby=" ";
		}else{
			$orderby=" order by C.other_price,  C.cal_date,act.activity_id DESC";
		}
		// Limit
		if($arr['perPage']=='all'){
			$perPage=" ";
		}elseif($arr['perPage']!=''){
			$perPage=" limit ".$offset.", ".$arr['perPage']."";
		}else{
			$perPage=" ";
		}
				
		$sql="select act.*,act.description as activity_desc,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted, C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnt.*,City.* 
		from ".parent::SUFFIX."booker_activities as act
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnt 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON act.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (act.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and act.country_id=cnt.country_id 
		and act.City_id=City.city_id   
		where 1 ".$where_cond."
		and act.active='yes' 
		and C.cal_date>=curdate() group by act.activity_id ".$orderby." limit $offset, $limit";
		
		$this->result=$this->query($sql);
	}


	public function getActivityByCityOrCountryAjaxSearch($arr){
		// order by 
		//echo $arr['where_cond'];die();
		if($arr['orderBySearch']=='activity_booker_name'){
			$orderby=" order by  C.other_price,C.cal_date, act.activity_booker_name ";
		}elseif($arr['orderBySearch']=='whole_amt'){
			$orderby=" order by C.other_price, C.cal_date, C.price ";
		}elseif($arr['orderBySearch']=='rating'){
			$orderby=" ";
		}else{
			$orderby=" order by  C.other_price,C.cal_date, A.activity_id DESC";
		}
		// Limit
		if($arr['perPage']=='all'){
			$perPage=" ";
		}elseif($arr['perPage']!=''){
			$perPage=" limit 0, ".$arr['perPage']."";
		}else{
			$perPage=" ";
		}		
		$sql="select act.*,act.description as activity_desc,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted, C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnt.*,City.* 
		from ".parent::SUFFIX."booker_activities as act
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnt 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON act.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (act.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and act.country_id=cnt.country_id 
		and act.City_id=City.city_id   
		where 1 ".$arr['where_cond']."
		and act.active='yes' 
		and C.cal_date>=curdate() group by act.activity_id ".$orderby;		
		$this->result=$this->query($sql);
	}
	
	public function getActivityByCityOrCountryAjaxSearchPage($arr,$limit,$offset){
		// order by
		if($arr['orderBySearch']=='most_popular'){
			$orderby=" ";
		}elseif($arr['orderBySearch']=='whole_amt'){
			$orderby=" order by  C.other_price,C.cal_date, C.price ";
		}elseif($arr['orderBySearch']=='most_discount'){
			$orderby=" ";
		}else{
			$orderby=" order by  C.other_price,C.cal_date, A.activity_id DESC";
		}
		// Limit
		if($arr['perPage']=='all'){
			$perPage=" ";
		}elseif($arr['perPage']!=''){
			$perPage=" limit ".$offset.", ".$arr['perPage']."";
		}else{
			$perPage=" ";
		}
		
		$sql="select act.*,act.description as activity_desc,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,C.discounted as act_discounted, C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnt.*,City.* 
		from ".parent::SUFFIX."booker_activities as act
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnt 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON act.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (act.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and act.country_id=cnt.country_id 
		and act.City_id=City.city_id   
		where 1 ".$arr['where_cond']."
		and act.active='yes' 
		and C.cal_date>=curdate() group by act.activity_id ".$orderby." ".$perPage;
		$this->result=$this->query($sql);
	}
	
	
	public function getAllCompareActivityDtl($activity_id){		
	
		$arrSubActDtl=array();
		$arrSubActDtl=$this->getSubTypeId($activity_id);
		
		$theTypeId=$arrSubActDtl[0];
		$theTimeId=$arrSubActDtl[1];   
	
		$sql="select act.*,C.*,subActTpy.*,subActDtl.*,C.price as whole_amt,actPhoto.*,actPhoto.image_path as act_image_path,cnt.*,City.*
		from ".parent::SUFFIX."booker_activities as act
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnt 
		INNER JOIN ".parent::SUFFIX."city as City 
		ON act.activity_id = subActTpy.activity_id
		and subActTpy.id=subActDtl.sub_activity_type_id 
		and (act.activity_id = actPhoto.activity_id and actPhoto.`default`=1) 
		and subActTpy.activity_id=subActDtl.activity_id 
		and C.sub_activity_id =subActDtl.sub_activity_id 
		and act.country_id=cnt.country_id 
		and act.City_id=City.city_id
		where act.activity_id='".$activity_id."' and C.sub_activity_type_id='".$theTypeId."' and  C.activity_time='".$theTimeId."' 
		and C.cal_date>=curdate() group by act.activity_id";		
		$this->result=$this->query($sql);
	}
	
	public function getTopDisActivityDtl(){		
		/*$sql="select A.activity_id,A.activity_booker_name,A.country_id,A.city_id,C.*,C.price as whole_amt,actPhoto.*,actPhoto.image_path as act_image_path,cnTry.country_name,cnTry.currency_code,cnTry.currency_symbol,city.city_name 
		from ".parent::SUFFIX."booker_activities as A 
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnTry
		INNER JOIN ".parent::SUFFIX."city as city 
		on A.activity_id = subActTpy.activity_id  and subActTpy.id=subActDtl.sub_activity_type_id and (A.activity_id = actPhoto.activity_id and actPhoto.`default`=1)
		and subActTpy.activity_id=subActDtl.activity_id and C.sub_activity_id = subActDtl.sub_activity_id and A.country_id=cnTry.country_id and A.city_id=city.city_id 
		where C.discounted='yes' and A.active='yes' 
		and C.cal_date=curdate() group by A.activity_id order by  C.cal_date,C.other_price, whole_amt";		
		$this->result=$this->query($sql);
		return $this->result;
		*/
		
		// fetch all activities matching city id from calender for now and next days
		 $sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code FROM ".parent::SUFFIX."calender cal 
					  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
					  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
					  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
					  inner join ".parent::SUFFIX."country cnt on act.country_id = cnt.country_id
					  inner join ".parent::SUFFIX."city City on act.city_id=City.city_id
					  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
					  where opd.price_type_name='Adult Price' and act.active='yes' and cal.cal_date=curdate() and cal.discounted='yes' and cal.is_price='yes' group by act.activity_id";
		$this->result=$this->query($sqlActsFromCalender);
		$arrActivities=array();
		while($this->getRow())
		{
				$arrActivities[]=array($this->getField("sub_activity_type_id"),$this->getField("activity_id"),$this->getField("id"),$this->getField("currency_code"));
		}
		/*echo "<pre>";
		print_r($arrActivities);
		echo "</pre>";*/
		$arrReturnInfo=array();
		// ok now you get all the sub activities from calender. Now fetch the lastest price info and other related information for this sub activity
		foreach($arrActivities as $key=>$theSubActivity)
		{
			$activity_id=$theSubActivity[1];
			$subTypeInfo=array();
			$subTypeInfo=$this->getSubTypeId($activity_id);	
			$arrReturnInfo[]=$this->getActivityDetailsTimeWiseForDiscounted($subTypeInfo[0],$theSubActivity[1],$subTypeInfo[2],$theSubActivity[3],$subTypeInfo[1]);
		}
		/*foreach($arrActivities as $theSubActivity)
		{
			$arrReturnInfo[]=$this->getActivityDetailsTimeWiseForDiscounted($theSubActivity[0],$theSubActivity[1],$theSubActivity[2],$theSubActivity[3]);
		}*/
		
	/*	echo "<br>";
			echo "<pre>";
		print_r($arrReturnInfo);
			echo "</pre>";*/
		return $arrReturnInfo;
	}
	
	public function getAllActivtyByCatID($category_id,$activity_id){
	$sql="select a.*,b.image_path as act_image,c.*,cnt.country_id,cnt.iso,cnt.country_name,cnt.currency_name,cnt.currency_symbol,cnt.currency_rate,sat.*,sad.*,cal.* from `".parent::SUFFIX."booker_activities` a left join `".parent::SUFFIX."activity_photo` b on (a.`activity_id`=b.`activity_id` and b.`default`=1) left join `".parent::SUFFIX."city` c on (a.`city_id`=c.`city_id`) left join `".parent::SUFFIX."country` cnt on (a.`country_id`=cnt.`country_id`) left join ".parent::SUFFIX."sub_activity_type sat on (a.activity_id=sat.activity_id) left join  ".parent::SUFFIX."sub_activity_detail sad on (sat.id=sad.sub_activity_type_id) left join ".parent::SUFFIX."calender cal on (sad.sub_activity_id=cal.sub_activity_id) where ((SUBSTRING_INDEX(a.`cat_id`, ',', 1) in(".$category_id.")) or (SUBSTRING_INDEX(SUBSTRING_INDEX(a.`cat_id`, ',', 2), ',', -1) in(".$category_id.")) or (SUBSTRING_INDEX(a.`cat_id`, ',', -1) in (".$category_id."))) and a.`active`='yes' and a.is_free='No' and a.activity_id NOT IN(".$activity_id.") and cal.cal_date>=curdate() group by sat.activity_id";
		$this->result=$this->query($sql);
		return $this->result;
	}
		public function getAllFreeActivity($activity_id){
	 $sql="select a.*,b.image_path as act_image,c.*,cnt.country_id,cnt.iso,cnt.country_name,cnt.currency_name,cnt.currency_symbol,cnt.currency_rate,sat.*,sad.*,cal.* from `".parent::SUFFIX."booker_activities` a left join `".parent::SUFFIX."activity_photo` b on (a.`activity_id`=b.`activity_id` and b.`default`=1) left join `".parent::SUFFIX."city` c on (a.`city_id`=c.`city_id`) left join `".parent::SUFFIX."country` cnt on (a.`country_id`=cnt.`country_id`) left join ".parent::SUFFIX."sub_activity_type sat on (a.activity_id=sat.activity_id) left join  ".parent::SUFFIX."sub_activity_detail sad on (sat.id=sad.sub_activity_type_id) left join ".parent::SUFFIX."calender cal on (sad.sub_activity_id=cal.sub_activity_id) where a.is_free='Yes' and a.`active`='yes' and a.activity_id NOT IN(".$activity_id.") and cal.cal_date>=curdate() group by sat.activity_id";
		$this->result=$this->query($sql);
		return $this->result;
	}
	
	
	
	/*
	((SUBSTRING_INDEX( act.cat_id, ',', 1 )  in(".$cat_id.")) or (SUBSTRING_INDEX(SUBSTRING_INDEX( act.cat_id, ',', 2 ) , ',', -1) in(".$cat_id.")) or (SUBSTRING_INDEX( act.cat_id, ',', -1 ) in(".$cat_id.")))
	 */
	
	public function getAllSimilarActByCatId($category_id,$activity_id){
	
	$strcat="and ((SUBSTRING_INDEX( act.cat_id, ',', 1 )  in(".$category_id.")) or (SUBSTRING_INDEX(SUBSTRING_INDEX( act.cat_id, ',', 2 ) , ',', -1) in(".$category_id.")) or (SUBSTRING_INDEX( act.cat_id, ',', -1 ) in(".$category_id.")))";
	
		// fetch all activities matching city id from calender for now and next days
		 $sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code FROM ".parent::SUFFIX."calender cal 
							  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
							  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
							  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
							  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
							  where cal_date >= curdate() ".$strcat." and opd.price_type_name='Adult Price' and act.active='yes' and cal.is_price='yes' group by act.activity_id ";
		$this->result=$this->query($sqlActsFromCalender);
		$arrActivities=array();
		while($this->getRow())
		{
				$arrActivities[]=array($this->getField("sub_activity_type_id"),$this->getField("activity_id"),$this->getField("id"),$this->getField("currency_code"));
		}
		
		$arrReturnInfo=array();
		// ok now you get all the sub activities from calender. Now fetch the lastest price info and other related information for this sub activity
		foreach($arrActivities as $key=>$theSubActivity)
		{
			$activity_id=$theSubActivity[1];
			$subTypeInfo=array();
			$subTypeInfo=$this->getSubTypeId($activity_id);	
			$arrReturnInfo[]=$this->getActivityDetailsTimeWise($subTypeInfo[0],$theSubActivity[1],$subTypeInfo[2],$theSubActivity[3],$subTypeInfo[1]);
		}
		
		/*foreach($arrActivities as $theSubActivity)
		{
			$arrReturnInfo[]=$this->getActivityDetailsTimeWise($theSubActivity[0],$theSubActivity[1],$theSubActivity[2],$theSubActivity[3]);
		}*/
		return $arrReturnInfo;
	
		/*$sql="select a.activity_booker_name,a.activity_id,c.city_name,sat.* from `".parent::SUFFIX."booker_activities` a left join `".parent::SUFFIX."city` c on (a.`city_id`=c.`city_id`) left join ".parent::SUFFIX."sub_activity_type sat on (a.activity_id=sat.activity_id) where a.`cat_id` in(".$category_id.") and a.`active`='yes' and a.activity_id NOT IN(".$activity_id.") group by sat.activity_id";
		$this->result=$this->query($sql);
		return $this->result;*/
	}
	
	public function getBucketListDtlByUser($user_id){
		$sql="select A.activity_id,A.activity_booker_name,A.country_id,A.city_id,C.*,C.price as whole_amt,C.discounted as act_discounted,C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnTry.country_name,cnTry.currency_code,cnTry.currency_symbol,city.city_name 
		from ".parent::SUFFIX."wish_list_details bucket 
		INNER JOIN ".parent::SUFFIX."booker_activities as A 
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnTry
		INNER JOIN ".parent::SUFFIX."city as city 
		on bucket.activity_id=A.activity_id and A.activity_id = subActTpy.activity_id  and subActTpy.id=subActDtl.sub_activity_type_id and (A.activity_id = actPhoto.activity_id and actPhoto.`default`=1)
		and subActTpy.activity_id=subActDtl.activity_id and C.sub_activity_id = subActDtl.sub_activity_id and A.country_id=cnTry.country_id and A.city_id=city.city_id where bucket.user_id='".$user_id."' and A.active='yes' 
		and C.cal_date>=curdate() group by A.activity_id order by  C.cal_date,C.other_price, whole_amt";
		$this->result=$this->query($sql);
	}
	
	public function getBucketListDtlByUserPage($user_id,$limit,$offset){
		$sql="select A.activity_id,A.activity_booker_name,A.country_id,A.city_id,C.*,C.price as whole_amt,C.discounted as act_discounted,C.discounted_price as dis_price,actPhoto.*,actPhoto.image_path as act_image_path,cnTry.country_name,cnTry.currency_code,cnTry.currency_symbol,city.city_name 
		from ".parent::SUFFIX."wish_list_details bucket 
		INNER JOIN ".parent::SUFFIX."booker_activities as A 
		INNER JOIN ".parent::SUFFIX."calender as C 
		INNER JOIN ".parent::SUFFIX."sub_activity_type as subActTpy 
		INNER JOIN ".parent::SUFFIX."sub_activity_detail as subActDtl 
		INNER JOIN ".parent::SUFFIX."activity_photo as actPhoto 
		INNER JOIN ".parent::SUFFIX."country as cnTry
		INNER JOIN ".parent::SUFFIX."city as city 
		on bucket.activity_id=A.activity_id and A.activity_id = subActTpy.activity_id  and subActTpy.id=subActDtl.sub_activity_type_id and (A.activity_id = actPhoto.activity_id and actPhoto.`default`=1)
		and subActTpy.activity_id=subActDtl.activity_id and C.sub_activity_id = subActDtl.sub_activity_id and A.country_id=cnTry.country_id and A.city_id=city.city_id where bucket.user_id='".$user_id."' and A.active='yes' 
		and C.cal_date>=curdate() group by A.activity_id order by  C.cal_date,C.other_price, whole_amt limit $offset, $limit";
		$this->result=$this->query($sql);
	}
	
	
	public function getActivityNameById($act_id)
	{
	$sql="select activity_booker_name from `".parent::SUFFIX."booker_activities` where `activity_id`='".$act_id."' and `user_id`='".$_SESSION['user_id']."'";
		$this->result=$this->query($sql);
	}
	
	public function addSchedule($arr)
	{
	$sql="insert into `".parent::SUFFIX."activity_time_schedule` (`time_Schedule_id`,`activity_id`,`hour`,`minute`,`schedule_at`) values('','".$arr['activity_id']."','".$arr['time_hour']."','".$arr['time_minute']."','".$arr['schedule_at']."')";
	$this->result=$this->query($sql);
	
				$sql="update `".parent::SUFFIX."activity_entry` SET `times`='yes'  where activity_id='".$arr['activity_id']."'";
				$this->result=$this->query($sql);
	}
	
	public function getActivityTimeSchedule($activity_id)
	{
		$sql="SELECT a.time_schedule_id,a.activity_id,a.hour,a.minute,a.schedule_at,a.supplier_deleted,a.admin_deleted,
		(
		case 
			when (a.schedule_at='pm' and a.hour<12) then
				 a.`hour`+12 
			else
				( 
				case 
					when (a.schedule_at='am' and a.hour=12) then
				 		  a.`hour`-12 
					else
				 		  a.`hour` 
				end
				)
		    end
		) as theTime,b.activity_booker_name FROM ".parent::SUFFIX."activity_time_schedule a left join `".parent::SUFFIX."booker_activities` b on a.`activity_id`=b.`activity_id` where a.activity_id = '".$activity_id."' and a.admin_deleted='No' and a.supplier_deleted='No' order by theTime";
		
		$this->result=$this->query($sql);
	}
	public function getActivityTimeSchById($id)
	{
		$sql="select * from `".parent::SUFFIX."activity_time_schedule` where `time_schedule_id` ='".$id."'";
		$this->result=$this->query($sql);
	}
	
	public function editActivityTimeSchedule($arr){
		$sql="update `".parent::SUFFIX."activity_time_schedule` set `hour`='".$arr['time_hour']."', `minute`='".$arr['time_minute']."', `schedule_at`='".$arr['schedule_at']."' where `time_schedule_id`='".$arr['time_schedule_id']."' and `activity_id`='".$arr['activity_id']."'"; 
		$this->result=$this->query($sql);
	}

	public function getActivityBySupplierID($supplier_id)
	{
		$sql="select activity_id,activity_booker_name from `".parent::SUFFIX."booker_activities` where `user_id`='".$supplier_id."' and supplier_deleted='No'";
		$this->result=$this->query($sql);
	}
	
	public function insertSubActivityDetail($dFields,$dValues)
	{
		$sql="insert into `".parent::SUFFIX."sub_activity_detail` (".$dFields.") values (".$dValues.")";
		$this->result=$this->query($sql);
	}
	
	public function getSubActviityDetail($act_id)
	{
			$sql="select * from `".parent::SUFFIX."sub_activity_detail` where `activity_id`='".$act_id."'and `supplier_deleted`='No'";
			$this->result=$this->query($sql);
	}
	public function getSubActTimeSchedule($time_schedule)
	{
		$sql="select * from `".parent::SUFFIX."activity_time_schedule` where `time_schedule_id` in(".$time_schedule.")";
		$this->result=$this->query($sql);
	}
	public function getSubActivityDetail($sub_act_id)
	{
		$sql="select * from `".parent::SUFFIX."sub_activity_detail` where `sub_activity_id`='".$sub_act_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getSubActDtlWithPreference($sub_act_id)
	{
		$sql="select sad.*,pref.* from `".parent::SUFFIX."sub_activity_detail` as sad left join `".parent::SUFFIX."preferences` as pref on sad.user_id=pref.user_id where sad.`sub_activity_id`='".$sub_act_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getSubActPreferenceForCalenderCart($sub_act_id)
	{
		$sql="select sat.*,pref.* from `".parent::SUFFIX."sub_activity_type` as sat left join `".parent::SUFFIX."preferences` as pref on sat.user_id=pref.user_id where sat.`id`='".$sub_act_id."'";
		$this->result=$this->query($sql);
	}
	
	public function updateSubActivity($setFields,$sub_act_id)
	{
		$sql="update `".parent::SUFFIX."sub_activity_detail` ".$setFields." where `sub_activity_id`='".$sub_act_id."'";
		$this->result=$this->query($sql);
	}
	
	public function insertActivityDetail($dfields,$dvalues)
	{
		$sql="insert into `".parent::SUFFIX."booker_activities` (".$dfields.") values (".$dvalues.")";
		$this->result=$this->query($sql);
		
		$activity_id=$this->getLastID();
		
		$sql="insert into `".parent::SUFFIX."activity_entry` (`activity_id`,`details`) values ('".$activity_id."','yes')";
		$this->result=$this->query($sql);
		
		
		/**************************Email Templets**************************/
		if($_SESSION['act_details']['category_suggesion']!=''){
			$obj_mail=new mail_class();
    	    $obj_mail->suggested_category_template($_SESSION['user_id'],$_SESSION['act_details']['category_suggesion']);
		}
		/**************************Email Templets**************************/
		
		/*$activity_id=$this->getLastID();
		$sql1="insert into `".parent::SUFFIX."sub_activity_type` (`id`,`activity_id`,`user_id`,`sub_activity_name`,`supplier_deleted`,`admin_deleted`) values ('','".$activity_id."','".$_SESSION['user_id']."','Options','No','No')";
		$this->result=$this->query($sql1);*/
	}
	
	public function insertSubActivityType($dFields,$dValues,$actid)
	{
		$sql="insert into `".parent::SUFFIX."sub_activity_type` (".$dFields.") values (".$dValues.")";
		$this->result=$this->query($sql);
		
		$sql="update `".parent::SUFFIX."activity_entry` SET `subs`='yes'  where activity_id='".$actid."'";
		$this->result=$this->query($sql);
	}
	public function getActivityDetail($whereCond)
	{
		$sql="select * from `".parent::SUFFIX."booker_activities` where ".$whereCond;
		$this->result=$this->query($sql);
	}
	
	function updateActivityDetail($setFields,$whereCond)
	{
		$sql="update `".parent::SUFFIX."booker_activities` ".$setFields." ".$whereCond;
		$this->result=$this->query($sql);
		
		/**************************Email Templets**************************/
		/*if($_SESSION['act_details']['category_suggesion']!=''){
			$obj_mail=new mail_class();
    	    $obj_mail->suggested_category_template($_SESSION['user_id'],$_SESSION['act_details']['category_suggesion']);
		}*/
		/**************************Email Templets**************************/
	}
	public function updateSubActivityType($arr)
	{

		$oldTimeScheduleStr=unserialize($arr['oldTimeScheduleStr']);
		if(count($oldTimeScheduleStr)>count($arr['time_schedule_id'])){
			$arrDiff = array_diff($oldTimeScheduleStr, $arr['time_schedule_id']);
		}else{
			$arrDiff = array_diff($arr['time_schedule_id'],$oldTimeScheduleStr);
		}

		foreach($arrDiff as $diffVal){
			$arrKeyVal[]=$diffVal;
			if(in_array($diffVal,$oldTimeScheduleStr)){
				$delete_key_val.=$diffVal.",";
			}else{
				$insert_key_val.=$diffVal.",";
			}
		}
		$delete_key=rtrim($delete_key_val,',');
		$insert_key=rtrim($insert_key_val,',');
		
		if($delete_key!=''){
			$sql33="delete from ".parent::SUFFIX."calender where  sub_activity_id='".$arr['sub_activity_id']."' and activity_time in(".$delete_key.")";	
			$this->result=$this->query($sql33);
		}
		
		if($insert_key!=''){
			$sql22="select * from ".parent::SUFFIX."calender where sub_activity_id='".$arr['sub_activity_id']."' and cal_date>=curdate()";	
			$this->result=$this->query($sql22);
			$arrCalPriceDtl=array();
			while($row=$this->getAllRow()){
				$arrCalPriceDtl[]=$row;
			}
			foreach($arrCalPriceDtl  as $CalPriceDtl){
				$sql44="select * from ".parent::SUFFIX."calender where sub_activity_id='".$arr['sub_activity_id']."' and cal_date='".$CalPriceDtl['cal_date']."' limit 1";	
				$this->result=$this->query($sql44);
				$this->getAllRow();
				foreach($arrKeyVal as $keyVal){
					$sql55="insert into ".parent::SUFFIX."calender(`cal_id`,`cal_date`,`sub_activity_id`,`price`,`discounted`,`discounted_price`,`capacity`,`avl_capacity`,`activity_time`,`other_price`)VALUES('','".$this->getField('cal_date')."','".$arr['sub_activity_id']."','".$this->getField('price')."','".$this->getField('discounted')."','".$this->getField('discounted_price')."','".$this->getField('capacity')."','".$this->getField('capacity')."','".$keyVal."','".$this->getField('other_price')."')";
					$this->result=$this->query($sql55);
				}
			}
			
		}
		
		$time_schedule_ids=implode(",",$arr['time_schedule_id']);
		$sql="update `".parent::SUFFIX."sub_activity_type` set `activity_id`='".$arr['activity_id']."', `sub_activity_name`='".addslashes($arr['sub_activity_name'])."',  	schedule_time='".$time_schedule_ids."',description='".addslashes($arr['sub_activity_descr'])."' where id='".$arr['id']."'";
		$this->result=$this->query($sql);
	}
	public function getSubActivityTypeDtl($sub_act_type_id){
		$sql="select * from `".parent::SUFFIX."sub_activity_type` where id='".$sub_act_type_id."'";	
		$this->result=$this->query($sql);
	}
	
	public function getAllWholeActivityDtl($supplier_id){
	
		$sql="select a.*,b.image_path,st.details,st.photos,st.times,st.subs,st.pricing,st.request_status  from `".parent::SUFFIX."booker_activities` a left join `".parent::SUFFIX."activity_photo` b on (a.activity_id = b.activity_id and b.`default`=1) left join `".parent::SUFFIX."activity_entry` as st on a.activity_id = st.activity_id  where a.user_id='".$supplier_id."' and a.supplier_deleted='No' and a.admin_deleted='No'" ;

		$this->result=$this->query($sql);
	}
	
	function getactlast($id)
	{
		$sql="select cal.cal_date from `".parent::SUFFIX."sub_activity_detail` as sub join `".parent::SUFFIX."calender` as cal on sub.sub_activity_id = cal.sub_activity_id where sub.activity_id ='".$id."' order by cal.cal_id DESC";	
		$this->result=$this->query($sql);
	}
	
	function getActLastDateForBookCal($id)
	{
		$sql="select cal.cal_date from `".parent::SUFFIX."sub_activity_detail` as sub left join `".parent::SUFFIX."calender` as cal on sub.sub_activity_id = cal.sub_activity_id left join `".parent::SUFFIX."other_price_details` as opd on sub.sub_activity_id =opd.sub_activity_id  where sub.activity_id ='".$id."' and opd.price_type_name='Adult Price' order by cal.cal_id DESC limit 1";	
		$this->result=$this->query($sql);
	}
	
	
	function getcutoff($post)
	{
		$sql="select p.cut_off,p.cut_off_value from `".parent::SUFFIX."preferences` as p left join `".parent::SUFFIX."booker_activities` as b on b.user_id = p.user_id
		 where b.activity_id ='".$post['id']."'";
		$this->result=$this->query($sql);	
	}
	
/* ############################################################ Diwakar1.0 ################################################################### */

	
	function getSubactivitybyid($post)
	{
		$sql="select subt.id,subt.sub_activity_name from `".parent::SUFFIX."sub_activity_type` as subt left join `".parent::SUFFIX."sub_activity_detail` as sub on subt.id = sub.sub_activity_type_id left join `".parent::SUFFIX."calender` as cal on cal.sub_activity_id = sub.sub_activity_id where sub.activity_id ='".$post['id']."' and cal.cal_date = '".date("Y-m-d",strtotime($post['act_date']))."' group by subt.id";
		$this->result=$this->query($sql);
	}
	
	function getSubactivitybyid1($post)
	{	
		$sql="select subt.id,subt.sub_activity_name from `".parent::SUFFIX."sub_activity_type` as subt left join `".parent::SUFFIX."sub_activity_detail` as sub on subt.id = sub.sub_activity_type_id left join `".parent::SUFFIX."calender` as cal on cal.sub_activity_id = sub.sub_activity_id where sub.activity_id ='".$post['act_id']."' and cal.cal_date = '".date("Y-m-d",strtotime($post['act_date']))."' group by subt.id";
		$this->result=$this->query($sql);
	}
	
	public function getPriceType($id,$cal_date)
	{
		$dt=date("Y-m-d",strtotime($cal_date));
		$sql="select distinct(other_price) as other_price from `".parent::SUFFIX."calender` where `sub_activity_type_id`='".$id."' and `cal_date`='".$dt."'";
		$this->result=$this->query($sql);
	}
	
/*	function getRecordforbook($post,$id)
	{
$sql="select sub.sub_activity_id,sub.sub_activity_name,cal.discounted,cal.discounted_price,cal.activity_time,sub.currency_code,subt.schedule_time,cal.price,cal.other_price from `".parent::SUFFIX."sub_activity_type` as subt left join `".parent::SUFFIX."sub_activity_detail` as sub on subt.id = sub.sub_activity_type_id left join `".parent::SUFFIX."calender` as cal on cal.sub_activity_id = sub.sub_activity_id where sub.activity_id ='".$post['id']."' and cal.cal_date = '".$post['act_date']."' and subt.id = '".$id."' group by sub.sub_activity_id";
		$this->result=$this->query($sql);
	}*/
	
	function getoldprice($tp,$sub)
	{
		$sql="select * from `".parent::SUFFIX."calender` where `sub_activity_id`='".$sub."' and activity_time='".$tp."' order by cal_id DESC limit 1";
		return $this->result=$this->query($sql);		
	}
	
	function getoldpriceother($sub)
	{
		$sql="select DISTINCT(other_price) from `".parent::SUFFIX."calender`  where `sub_activity_id`='".$sub."'";
		$this->result=$this->query($sql);
		while($this->getRow())
		{
		$id[] =	$this->getField('other_price');
		}
		$tid=implode(",",$id);
		 $sql="select * from `".parent::SUFFIX."other_price_details` where id IN (".$tid.")";
		return $this->result=$this->query($sql);			
	}
	
		
	function getoldother($tp,$sub,$tid)
	{
		$sql="select cal.price,cal.discounted,cal.discounted_price,ot.* from `".parent::SUFFIX."other_price_details` as ot LEFT JOIN  `".parent::SUFFIX."calender` as cal on ot.id=cal.other_price where ot.price_type_name='".$tid."' and cal.sub_activity_type_id='".$sub."' and cal.activity_time = '".$tp."' order by cal.cal_id DESC limit 1";
		return $this->result=$this->query($sql);			
	}

	
	function getCalender($sub_activity_id)
	{
		$sql="select * from `".parent::SUFFIX."calender` where `sub_activity_id`='".$sub_activity_id."' order by cal_id DESC limit 1";
		return $this->result=$this->query($sql);
	}
	
	function getRecordforbook($post,$id)
	{
	 	$sql="select sub.sub_activity_id,cal.activity_time,sub.currency_code,subt.schedule_time,cal.other_price from `".parent::SUFFIX."sub_activity_type` as subt left join `".parent::SUFFIX."sub_activity_detail` as sub on subt.id = sub.sub_activity_type_id left join `".parent::SUFFIX."calender` as cal on cal.sub_activity_id = sub.sub_activity_id where sub.activity_id ='".$post['id']."' and cal.cal_date = '".date("Y-m-d",strtotime($post['act_date']))."' and subt.id = '".$id."' GROUP BY cal.other_price";
		$this->result=$this->query($sql);
	}
	
	function getRecordforbook1($post,$id,$numPriceType,$otherPriceStr)
	{
		$sql="select act.activity_id as act_id,sub.sub_activity_id,cal.activity_time,sub.currency_code,subt.schedule_time,cal.*,ats.*,otpr.* from `".parent::SUFFIX."booker_activities` as act left join `".parent::SUFFIX."sub_activity_type` as subt on act.activity_id=subt.activity_id left join `".parent::SUFFIX."sub_activity_detail` as sub on subt.id = sub.sub_activity_type_id left join `".parent::SUFFIX."calender` as cal on cal.sub_activity_id = sub.sub_activity_id left join `".parent::SUFFIX."activity_time_schedule` as ats on ats.time_schedule_id = cal.activity_time left join `".parent::SUFFIX."other_price_details` as otpr on otpr.id = cal.other_price where sub.activity_id ='".$post['act_id']."' and cal.cal_date = '".date("Y-m-d",strtotime($post['act_date']))."' and subt.id = '".$id."' and cal.other_price in (".$otherPriceStr.") order by cal.cal_id,ats.schedule_at,ats.hour,ats.minute limit ".$numPriceType;
		$this->result=$this->query($sql);
	}
		
	function getOtherprice($otr,$post)
	{
		//$sql="select ot.*,cal.price,cal.discounted,cal.discounted_price,cal.activity_time from  `".parent::SUFFIX."other_price_details` as ot left join `".parent::SUFFIX."calender` as cal on cal.other_price = ot.id where ot.id = '".$otr."' and cal.cal_date = '".date("Y-m-d",strtotime($post['act_date']))."' GROUP BY cal.other_price order by cal.activity_time";
		$sql="select ot.*,cal.price,cal.discounted,cal.discounted_price,cal.activity_time,ats.* from  `".parent::SUFFIX."other_price_details` as ot left join `".parent::SUFFIX."calender` as cal on cal.other_price = ot.id left join `".parent::SUFFIX."activity_time_schedule` as ats on cal.activity_time = ats.time_schedule_id where ot.id = '".$otr."' and cal.cal_date = '".date("Y-m-d",strtotime($post['act_date']))."' order by ats.schedule_at,ats.hour,ats.minute limit 1";
		$this->result=$this->query($sql);
	}
	
	function getTimescd($tmSchdlId)
	{ 
		$sql = "select * from `".parent::SUFFIX."activity_time_schedule` where supplier_deleted='No' and admin_deleted='No' and time_schedule_id IN (".$tmSchdlId.") order by schedule_at,hour,minute";
		$this->result=$this->query($sql);
	} 	
	
	function getTimeprice($post)
	{
		$pos = explode("#",$post['tt']);
		$tsi = $pos[1];
		$sai = $pos[3];
		$sql = "select cal.* from `".parent::SUFFIX."calender` as cal join `".parent::SUFFIX."activity_time_schedule` as ats on cal.activity_time = ats.time_schedule_id where ats.supplier_deleted='No' and ats.admin_deleted='No' and ats.time_schedule_id = '".$tsi."' and cal.cal_date='".date("Y-m-d",strtotime($post['act_date']))."' and cal.sub_activity_id = '".$sai."'" ;

		$this->result=$this->query($sql);
	}
	function getTimeprice1($post)
	{
		$pos = explode("_",$post['tt']);
		$sai = $pos[1];
		$opi = $pos[2];
		$tsi = $pos[3];
		$sql = "select cal.* from `".parent::SUFFIX."calender` as cal join `".parent::SUFFIX."activity_time_schedule` as ats on cal.activity_time = ats.time_schedule_id where ats.supplier_deleted='No' and ats.admin_deleted='No' and ats.time_schedule_id = '".$tsi."' and cal.cal_date= '".date("Y-m-d",strtotime($post['act_date']))."' and cal.sub_activity_type_id = '".$sai."' and cal.other_price='".$opi."'";
		$this->result=$this->query($sql);
	}
	
	function getPriceByTime($post)
	{
		$pos = explode("#",$post['tt']);
		$sai = $pos[3];
		$opi = $pos[2];
		$tsi = $pos[1];
		$other_price_id=$pos[4];
		$sql = "select cal.*,cal.discounted as act_discounted, cal.discounted_price as dis_price from `".parent::SUFFIX."calender` as cal join `".parent::SUFFIX."activity_time_schedule` as ats on cal.activity_time = ats.time_schedule_id where ats.supplier_deleted='No' and ats.admin_deleted='No' and ats.time_schedule_id = '".$tsi."' and cal.cal_date= '".date("Y-m-d",strtotime($post['act_date']))."' and cal.sub_activity_id = '".$sai."' and cal.other_price='".$other_price_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getActivityOptions($act_id){
		$sql="select * from ".parent::SUFFIX."sub_activity_type where `activity_id`='".$act_id."' and (supplier_deleted='No' or supplier_deleted='Yes') and admin_deleted='No'";	
		$this->result=$this->query($sql);
	}
	public function getActivityPriceDtl($act_id){		
		$sql="select sat.* from ".parent::SUFFIX."sub_activity_detail as sad left join ".parent::SUFFIX."sub_activity_type as sat on sad.sub_activity_type_id=sat.id where sat.activity_id='".$act_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getPriceLastDateBySatId($sat_id){
		$sql="select max(cal.cal_date) as max_cal_date, cal.sub_activity_id from ".parent::SUFFIX."sub_activity_type as sat inner join ".parent::SUFFIX."sub_activity_detail as sad inner join ".parent::SUFFIX."calender  as cal on sat.id=sad.sub_activity_type_id and sad.sub_activity_id=cal.sub_activity_id and sat.id='".$sat_id."'";	
		$this->result=$this->query($sql);
	}
	
	public function otherPriceDtlBySubActId($sub_activity_id){
		$sql="select * from ".parent::SUFFIX."other_price_details where sub_activity_id='".$sub_activity_id."'";
		$this->result=$this->query($sql);	
	}
	
	public function getPriceDrlById($id){
		$sql="select * from ".parent::SUFFIX."other_price_details where id='".$id."'";
		$this->result=$this->query($sql);	
	}
	
	public function getSupplierPrefer($activity_id){
		$sql="select act.`activity_id`,supp.`user_id`,pref.* from `".parent::SUFFIX."booker_activities` act left join  `".parent::SUFFIX."supplier_details` supp on supp.`user_id`=act.`user_id` left join `".parent::SUFFIX."preferences` pref  on supp.`user_id`=pref.`user_id` where act.activity_id='".$activity_id."'";
		$this->result=$this->query($sql);
	}

	public function getSupplieFbCat($activity_id)
	{
		$sql="select act.user_id,fb.* from `".parent::SUFFIX."booker_activities` act left join `".parent::SUFFIX."supplier_feedback_category` fb on act.user_id=fb.supplier_id where act.`activity_id`='".$activity_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getSupplieFbCatDtl($suppFbCat)
	{
		$sql="select * from `".parent::SUFFIX."feedback_category` where fb_cat_id in(".$suppFbCat.")";
		$this->result=$this->query($sql); 
	}
	
	public function getFbCatAvg($activity_id,$fb_cat_id)
	{
		$sql="select avg(rating_value) as fb_cat_avg_rate from `".parent::SUFFIX."rating_detail` where `activity_id`='".$activity_id."' and `feeback_cat_id`='".$fb_cat_id."'";
		$this->result=$this->query($sql);
	}
	
	
	public function getBookingdtl()
	{
		$sql="select act.`activity_booker_name`,cntry.`country_name`,city.`city_name`,bkdtl.*,bk.`refence_id` from `".parent::SUFFIX."booker_activities` act left join `".parent::SUFFIX."country` cntry on act.`country_id`=cntry.`country_id` left join `".parent::SUFFIX."city` city on act.`city_id`=city.`city_id` left join `".parent::SUFFIX."booking_details` bkdtl on bkdtl.`activity_id`=act.`activity_id` left join `".parent::SUFFIX."booking` bk on bk.`booking_id`=bkdtl.`booking_id` where bkdtl.`user_id`='".$_SESSION['user_id']."' and bkdtl.`activity_conducted_status`='Yes' and bkdtl.schedule_date<='".date("Y-m-d")."'";
		$this->result=$this->query($sql);
	}
	
	public function getFeedbackDtl($booking_id,$activity_id)
	{
		$sql="select * from `".parent::SUFFIX."rating` where `booking_id`='".$booking_id."' and `activity_id`='".$activity_id."'";
		$this->result=$this->query($sql);
	}
	public function getCityName($searchtext)
	{
		$sql="select * from `".parent::SUFFIX."city` where `city_name` like '%".$searchtext."%'";
		$this->result=$this->query($sql);
	}
	public function getCountryNameId($country_id)
	{
		$sql="select * from `".parent::SUFFIX."country` where `country_id`='".$country_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getCountryNameSearchText($searchtext)
	{
		$sql="select * from `".parent::SUFFIX."country` where `country_name` like '%".$searchtext."%'";
		$this->result=$this->query($sql);
	}
	public function	getCountryCity($seatchtext)
	{
		$sql="select country_id,city_id from `".parent::SUFFIX."booker_activities` where `activity_booker_name` like '%".$searchtext."%'";
		$this->result=$this->query($sql);
	}
	
	public function getCountryForActivity()
	{
		$sql="select * from `".parent::SUFFIX."country` where country_for='activity'";
		$this->result=$this->query($sql);
	}
	public function getActAvgRating($activity_id)
	{
		$sql="select avg(average_rating) as overAllRating from ".parent::SUFFIX."rating where activity_id='".$activity_id."'";
		$this->result=$this->query($sql);
	}
	
	public function getTopTenActivities()
	{
		
		// fetch all activities matching city id from calender for now and next days
	 $sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code,avg(rt.average_rating) as rating FROM ".parent::SUFFIX."calender cal 
							  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
							  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
							  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
							  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
							  inner join ".parent::SUFFIX."rating rt on act.activity_id=rt.activity_id
							  where cal_date >= curdate() and opd.price_type_name='Adult Price' and act.active='yes' and cal.is_price='yes' group by rt.activity_id order by rating ASC ";
		$this->result=$this->query($sqlActsFromCalender);
		$arrActivities=array();
		while($this->getRow())
		{
				$arrActivities[]=array($this->getField("sub_activity_type_id"),$this->getField("activity_id"),$this->getField("id"),$this->getField("currency_code"));
		}
		
		$arrReturnInfo=array();
		// ok now you get all the sub activities from calender. Now fetch the lastest price info and other related information for this sub activity
			foreach($arrActivities as $key=>$theSubActivity)
			{
				$activity_id=$theSubActivity[1];
				$subTypeInfo=array();
				$subTypeInfo=$this->getSubTypeId($activity_id);	
				$arrReturnInfo[]=$this->getActivityDetailsForTopTen($subTypeInfo[0],$theSubActivity[1],$subTypeInfo[2],$theSubActivity[3],$subTypeInfo[1]);
			}
		/*foreach($arrActivities as $theSubActivity)
		{
			$arrReturnInfo[]=$this->getActivityDetailsForTopTen($theSubActivity[0],$theSubActivity[1],$theSubActivity[2],$theSubActivity[3]);
		}*/
		return $arrReturnInfo;
	
	}
	
	public function getActivityDetailsForTopTen($subActivityTypeId,$activity_id,$priceId,$currency_code,$theTimeId)
	{
		/*$getLatestTimeScheduel_id="select schedule_time from `".parent::SUFFIX."sub_activity_type` where `id`='".$subActivityTypeId."'";
		$this->result=$this->query($getLatestTimeScheduel_id);
		$this->getRow();
		$timescheduel=$this->getField('schedule_time');
		// get time scedule by activity id for latest time
		$sqlTime="SELECT time_schedule_id,(case 
			when (schedule_at='pm' and hour<12) then
				 `hour`+12 
			else
				( 
				case 
					when (schedule_at='am' and hour=12) then
				 		  `hour`-12 
					else
				 		  `hour` 
				end
				)
		    end) as theTime FROM ".parent::SUFFIX."activity_time_schedule where activity_id = '".$activity_id."' and time_schedule_id in(".$timescheduel.")  order by theTime limit 1";
		$this->result=$this->query($sqlTime);
		$this->getRow();
		$theTimeId=$this->getField('time_schedule_id');*/
	
		// now fetch price from calendar....
		
		$sqlPrice="select price,discounted,discounted_price from  ".parent::SUFFIX."calender where sub_activity_type_id='".$subActivityTypeId."' and activity_time='".$theTimeId."' and other_price='".$priceId."' and cal_date>=curdate() and is_price='yes' limit 1";
		$this->result=$this->query($sqlPrice);
		$this->getRow();
		$arrActPriceInfo=array($this->getField('price'),$this->getField('discounted'),$this->getField('discounted_price'));
		
		$sql="select currency_symbol from ".parent::SUFFIX."country where currency_code='".$currency_code."'";
		$this->result=$this->query($sql);
		$this->getRow();
		$currency_symbol=$this->getField('currency_symbol');
		
		#Getting the activity overall rating and coun of rating.
		$sql="select count(rating_id) as count,avg(average_rating) as rating from `".parent::SUFFIX."rating` where activity_id='".$activity_id."'";
		$this->result=$this->query($sql);
		$this->getRow();
		$rating_count=$this->getField('count');
		$rating=number_format($this->getField('rating'),2);
		
		// now fetch necessary elements from sub activity like name and all		
		$sql="select act.activity_booker_name, act.description, city.city_name,cntry.country_name from ".parent::SUFFIX."booker_activities act  inner join ".parent::SUFFIX."city city on act.city_id=city.city_id inner join ".parent::SUFFIX."country cntry on act.country_id=cntry.country_id where act.activity_id='".$activity_id."'";
		
		$this->result=$this->query($sql);
		$this->getRow();		
		
		$arrAct=array('id'=>$subActivityTypeId,'activity_id'=>$activity_id,'whole_amt'=>$arrActPriceInfo[0] ,'price'=>$arrActPriceInfo[0],'act_discounted'=>$arrActPriceInfo[1],'dis_price'=>$arrActPriceInfo[2],'activity_desc'=>$this->getField('description'),'activity_booker_name'=>$this->getField('activity_booker_name'),'city_name'=>$this->getField('city_name'),'country_name'=>$this->getField('country_name'),'currency_symbol'=>$currency_symbol,'currency_code'=>$currency_code,'rating_count'=>$rating_count,'rating'=>$rating);
		return $arrAct;
	}
	
	
	public function getLatestBookedActivity()
	{
		$sql="select act.`activity_booker_name`,cntry.`country_name`,ct.`city_name`,bkdtl.*,img.`image_path` from `".parent::SUFFIX."booking_details` bkdtl left join `".parent::SUFFIX."activity_photo` img on bkdtl.`activity_id`=img.`activity_id` left join `".parent::SUFFIX."booker_activities` act on act.`activity_id`=bkdtl.`activity_id` left join `".parent::SUFFIX."country` cntry on act.`country_id`=cntry.`country_id` left join `".parent::SUFFIX."city` ct on act.`city_id`=ct.`city_id` where img.`default`='1' and bkdtl.`user_id`='".$_SESSION['user_id']."' and bkdtl.`schedule_date`>=curDate() and bkdtl.`booking_status`='Confirmed' and bkdtl.`user_deleted`='No' and bkdtl.`supplier_deleted`='No' and bkdtl.`admin_deleted`='No' order by bkdtl.`schedule_date` ASC" ;
		$this->result=$this->query($sql);
	}
	
	
	/* gettting activiteis for gift  */
	
	public function getGiftActivity($where_cond)
	{
		// fetch all activities matching city id from calender for now and next days
		$sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code FROM ".parent::SUFFIX."calender cal 
						  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
						  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
						  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
						  inner join ".parent::SUFFIX."country cnt on act.country_id = cnt.country_id
						  inner join ".parent::SUFFIX."city City on act.city_id=City.city_id
						  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
						  where 1 ".$where_cond." and cal.cal_date>=curdate() and opd.price_type_name='Adult Price' and cal.is_price='yes' and act.active='yes' group by act.activity_id ";
							  
		$this->result=$this->query($sqlActsFromCalender);
		$arrActivities=array();
		while($this->getRow())
		{
				$arrActivities[]=array($this->getField("sub_activity_type_id"),$this->getField("activity_id"),$this->getField("id"),$this->getField("currency_code"));
		}
		/*echo "<pre>";
		print_r($arrActivities);
		echo "</pre>";*/
		$arrReturnInfo=array();
		// ok now you get all the sub activities from calender. Now fetch the lastest price info and other related information for this sub activity
		foreach($arrActivities as $key=>$theSubActivity)
		{
			$activity_id=$theSubActivity[1];
			$subTypeInfo=array();
			$subTypeInfo=$this->getSubTypeId($activity_id);	
			$arrReturnInfo[]=$this->getActivityDetailsBySearch($subTypeInfo[0],$theSubActivity[1],$subTypeInfo[2],$theSubActivity[3],$subTypeInfo[1]);
		}
		
		/*foreach($arrActivities as $theSubActivity)
		{
			$arrReturnInfo[]=$this->getActivityDetailsBySearch($theSubActivity[0],$theSubActivity[1],$theSubActivity[2],$theSubActivity[3]);
		}*/
		/*echo "<br>";
			echo "<pre>";
		print_r($arrReturnInfo);
			echo "</pre>";*/
		return $arrReturnInfo;
	}
	
	public function getActivityDetailsBySearch($subActivityTypeId,$activity_id,$priceId,$currency_code,$theTimeId)
	{
		/*$getLatestTimeScheduel_id="select schedule_time from `".parent::SUFFIX."sub_activity_type` where `id`='".$subActivityTypeId."'";
		$this->result=$this->query($getLatestTimeScheduel_id);
		$this->getRow();
		$timescheduel=$this->getField('schedule_time');
		// get time scedule by activity id for latest time
		$sqlTime="SELECT time_schedule_id,(case 
			when (schedule_at='pm' and hour<12) then
				 `hour`+12 
			else
				( 
				case 
					when (schedule_at='am' and hour=12) then
				 		  `hour`-12 
					else
				 		  `hour` 
				end
				)
		    end) as theTime FROM ".parent::SUFFIX."activity_time_schedule where activity_id = '".$activity_id."' and time_schedule_id in(".$timescheduel.")  order by theTime limit 1";
		$this->result=$this->query($sqlTime);
		$this->getRow();
		$theTimeId=$this->getField('time_schedule_id');*/
		
		
		// now fetch price from calendar....
		$search_date=date("Y-m-d");
		$sqlPrice="select price,discounted,discounted_price from  ".parent::SUFFIX."calender where sub_activity_type_id='".$subActivityTypeId."' and activity_time='".$theTimeId."' and other_price='".$priceId."' and cal_date='".$search_date."' and is_price='yes' limit 1";
		$this->result=$this->query($sqlPrice);
		$this->getRow();
		$arrActPriceInfo=array($this->getField('price'),$this->getField('discounted'),$this->getField('discounted_price'));
		
		$sql="select currency_symbol from ".parent::SUFFIX."country where currency_code='".$currency_code."'";
		$this->result=$this->query($sql);
		$this->getRow();
		$currency_symbol=$this->getField('currency_symbol');
		
		#Getting the activity overall rating and coun of rating.
		$sql="select count(rating_id) as count,avg(average_rating) as rating from `".parent::SUFFIX."rating` where activity_id='".$activity_id."'";
		$this->result=$this->query($sql);
		$this->getRow();
		$rating_count=$this->getField('count');
		$rating=number_format($this->getField('rating'),2);
		
		// now fetch necessary elements from sub activity like name and all		
		 $sql="select act.activity_booker_name, cntry.country_name, act.description, city.city_name, img.image_path from ".parent::SUFFIX."booker_activities act inner join ".parent::SUFFIX."activity_photo img on act.activity_id = img.activity_id inner join ".parent::SUFFIX."country cntry on act.country_id=cntry.country_id inner join ".parent::SUFFIX."city city on act.city_id=city.city_id where act.activity_id='".$activity_id."'";
		
		$this->result=$this->query($sql);
		$this->getRow();		
		
		$arrAct=array('id'=>$subActivityTypeId,'activity_id'=>$activity_id,'whole_amt'=>$arrActPriceInfo[0] ,'price'=>$arrActPriceInfo[0],'act_discounted'=>$arrActPriceInfo[1],'dis_price'=>$arrActPriceInfo[2],'act_image_path'=>$this->getField('image_path'),'activity_desc'=>$this->getField('description'),'activity_booker_name'=>$this->getField('activity_booker_name'),'country_name'=>$this->getField('country_name'),'city_name'=>$this->getField('city_name'),'currency_symbol'=>$currency_symbol,'currency_code'=>$currency_code,'rating_count'=>$rating_count,'rating'=>$rating);
		return $arrAct;
	}
	
	public function getGiftActivityAjax($arr)
	{
		// fetch all activities matching city id from calender for now and next days
		 $sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code FROM ".parent::SUFFIX."calender cal 
						  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
						  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
						  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
						  inner join ".parent::SUFFIX."country cnt on act.country_id = cnt.country_id
						  inner join ".parent::SUFFIX."city City on act.city_id=City.city_id
						  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
						  where 1 ".$arr['where_cond']." and cal.cal_date>=curdate() and opd.price_type_name='Adult Price' and act.active='yes' and cal.is_price='yes' group by act.activity_id ";
		$this->result=$this->query($sqlActsFromCalender);
		$arrActivities=array();
		while($this->getRow())
		{
				$arrActivities[]=array($this->getField("sub_activity_type_id"),$this->getField("activity_id"),$this->getField("id"),$this->getField("currency_code"));
		}
		/*echo "<pre>";
		print_r($arrActivities);
		echo "</pre>";*/
		$arrReturnInfo=array();
		// ok now you get all the sub activities from calender. Now fetch the lastest price info and other related information for this sub activity
			foreach($arrActivities as $key=>$theSubActivity)
			{
				$activity_id=$theSubActivity[1];
				$subTypeInfo=array();
				$subTypeInfo=$this->getSubTypeId($activity_id);	
				$arrReturnInfo[]=$this->getActivityDetailsBySearch($subTypeInfo[0],$theSubActivity[1],$subTypeInfo[2],$theSubActivity[3],$subTypeInfo[1]);
			}
		
		/*foreach($arrActivities as $theSubActivity)
		{
			$arrReturnInfo[]=$this->getActivityDetailsBySearch($theSubActivity[0],$theSubActivity[1],$theSubActivity[2],$theSubActivity[3]);
		}*/
		
	/*	echo "<br>";
			echo "<pre>";
		print_r($arrReturnInfo);
			echo "</pre>";*/
		return $arrReturnInfo;
	}
	
	/* getting activities for gift end here */ 
	
	public function getAllAdds()
	{
		$sql="select * from `".parent::SUFFIX."advertisement` where status='Active' ";
		$this->result=$this->query($sql);
	}
	
	public function getSubTypeId($activity_id)
	{
		$sql="select distinct(sat.`id`) from `".parent::SUFFIX."sub_activity_type` sat left join `".parent::SUFFIX."calender` cal on cal.`sub_activity_type_id`=sat.`id` where sat.`activity_id`='".$activity_id."' and cal.`cal_date`=curDate() order by sat.`id`";
		$this->result=$this->query($sql);
		$typeid=array();
		while($temp=$this->getAllRow())
		{
			$typeid[]=$temp;
		}
	
		$discouted='No';
		$i=0;
		/* Getting the sub activity type id and time id which has minimum adult discounted price or only price.*/
		foreach($typeid as $arrTypeId)
		{
		//$subActivityTypeId=$typeid[0]['id'];
		$getLatestTimeScheduel_id="select schedule_time from `".parent::SUFFIX."sub_activity_type` where `id`='".$arrTypeId['id']."'";
		$this->result=$this->query($getLatestTimeScheduel_id);
		$this->getRow();
		$timescheduel=$this->getField('schedule_time');
		// get time scedule by activity id for latest time
		$sqlTime="SELECT time_schedule_id,(case 
			when (schedule_at='pm' and hour<12) then
				 `hour`+12 
			else
				( 
				case 
					when (schedule_at='am' and hour=12) then
				 		  `hour`-12 
					else
				 		  `hour` 
				end
				)
		    end) as theTime FROM ".parent::SUFFIX."activity_time_schedule where activity_id = '".$activity_id."' and time_schedule_id in(".$timescheduel.")  order by theTime limit 1";
		$this->result=$this->query($sqlTime);
		$this->getRow();
		$theTimeIdOfType=$this->getField('time_schedule_id');
		
				
				$sql="select cal.*,cal.discounted as act_discounted,otpr.* from ".parent::SUFFIX."calender cal left join ".parent::SUFFIX."other_price_details otpr on otpr.id=cal.other_price where cal.activity_id='".$activity_id."' and cal.sub_activity_type_id='".$arrTypeId['id']."' and cal.cal_date>='".date("Y-m-d")."' and cal.activity_time='".$theTimeIdOfType."' and otpr.price_type_name='Adult Price' order by cal.other_price, cal.cal_date limit 1";
				$this->result=$this->query($sql);
				$this->getAllRow();
				//echo "<br><br>Sub Act Type Id : ".$arrTypeId['id']." Time Id : ".$theTimeIdOfType;
				//echo "<br>"."Price : ".$this->getfield('price')." Is Discounted : ".$this->getfield('act_discounted')." Discounted Price :".$this->getfield('discounted_price');
				if($this->getfield('act_discounted')=='yes')
				{
						$discouted='yes';
				}
			
				# Getting all the sub activity prices in  array
				$arrPriceDtl[$i]['price']=$this->getfield('price');
				$arrPriceDtl[$i]['discounted_price']=$this->getfield('discounted_price');
				$arrPriceDtl[$i]['priceid']=$this->getfield('other_price');
				$arrPriceDtl[$i]['thetimeid']=$theTimeIdOfType;
				$arrPriceDtl[$i]['thetypeid']=$arrTypeId['id'];
				
				
		$i++;			
		}
		
		
		if($discouted=='yes')
		{
			usort($arrPriceDtl, array('Activity','discounted_price_compare')); //sorting the array on the discounted price
			foreach($arrPriceDtl as $priceDtl)
			{
					if($priceDtl['discounted_price']>0)
					{
							#Getting the the time id and type id from array which has discounted price greater than zero as undiscounted activity has discounted price 0
							$theTimeId=$priceDtl['thetimeid'];
							$theTypeId=$priceDtl['thetypeid'];
							$thePriceId=$priceDtl['priceid'];
							break; # exiting the looop as first when first discounted price found which is greater than 0 
					}
			}
		}
		else
		{
			usort($arrPriceDtl, array('Activity','price_compare'));//sorting the array on the price
			#getting the timeid and typeid of first array eleement from sorted array
			$theTimeId=$arrPriceDtl[0]['thetimeid'];
			$theTypeId=$arrPriceDtl[0]['thetypeid'];
			$thePriceId=$arrPriceDtl[0]['priceid'];
	}
	
	$arrRetInfo=array();
	$arrRetInfo[0]=$theTypeId;
	$arrRetInfo[1]=$theTimeId;
	$arrRetInfo[2]=$thePriceId;
			return $arrRetInfo;
			
	}
	
}
?>