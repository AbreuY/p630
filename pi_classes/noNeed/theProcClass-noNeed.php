<?php
require_once dirname(__FILE__) . '/AbstractDB.php';
class theProcClass extends AbstractDB
{
	public function getRow()
    { 
	    while($this->row=mysql_fetch_assoc($this->result))
		{
			return true;
		}
		return false;   
	}
	
	public function getAllRow()
    { 
	    while($this->row=mysql_fetch_assoc($this->result))
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
	
	public function getAllCountry()
	{
		$mysql=new mysqli(AbstractDB::HOST,AbstractDB::USER,AbstractDB::PASS,AbstractDB::DB);
		$mysql->multi_query("call spAllCountry()");		
		$arrToReturn=array();
		 do {
			/* store first result set */
			if ($result = $mysql->use_result()) {
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				 $arrToReturn[]=$row;
				}
				$result->free();
			}
    	} while ($mysql->next_result());
		return $arrToReturn;
		$mysql->close();		
	}
	public function getAllCountryForActivity()
	{
		$mysql=new mysqli(AbstractDB::HOST,AbstractDB::USER,AbstractDB::PASS,AbstractDB::DB);
		$mysql->multi_query("call spAllCountryForActivity()");		
		$arrToReturn=array();
		 do {
			/* store first result set */
			if ($result = $mysql->use_result()) {
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				 $arrToReturn[]=$row;
				}
				$result->free();
			}
    	} while ($mysql->next_result());
		return $arrToReturn;
		$mysql->close();		
	}
	
	public function getHomePageActivtyDtl($countries)
	{
		$mysql=new mysqli(AbstractDB::HOST,AbstractDB::USER,AbstractDB::PASS,AbstractDB::DB);
		$mysql->multi_query("call spGetHomePageActivity($countries)");		
		$arrToReturn=array();
		 do {
			/* store first result set */
			if ($result = $mysql->use_result()) {
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				 $arrToReturn[$row['country_id']][]=$row;
				}
				$result->free();
			}
    	} while ($mysql->next_result());
		return $arrToReturn;
		$mysql->close();		
	}
	
	public function getAllActivtyDtl($country_id)
	{
		$mysql=new mysqli(AbstractDB::HOST,AbstractDB::USER,AbstractDB::PASS,AbstractDB::DB);
		$mysql->multi_query("call spGetAllActivity()");		
		$arrToReturn=array();
		 do {
			/* store first result set */
			if ($result = $mysql->use_result()) {
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				 $arrToReturn[$row['country_id']][]=$row;
				}
				$result->free();
			}
    	} while ($mysql->next_result());
		return $arrToReturn;
		$mysql->close();		
	}
	
	/*public function getActivtyDtlByCountry($country_id)
	{
		$mysql=new mysqli(AbstractDB::HOST,AbstractDB::USER,AbstractDB::PASS,AbstractDB::DB);
		$mysql->multi_query("call spGetActivityDtlByCountry($country_id)");		
		$arrToReturn=array();
		 do {
			/* store first result set */
		/*	if ($result = $mysql->use_result()) {
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				 $arrToReturn[$row['city_id']][]=$row;
				}
				$result->free();
			}
    	} while ($mysql->next_result());
		/*echo "<pre>";
		print_r($arrToReturn);
		echo "</pre>";*/
	/*	return $arrToReturn;
		$mysql->close();		
	}*/
	
	public function getActivtyDtlByCountryandCategory($country_id,$cat_id)
	{
		$mysql=new mysqli(AbstractDB::HOST,AbstractDB::USER,AbstractDB::PASS,AbstractDB::DB);
		$cat_id="'".$cat_id."'";
		//$cat_id="10,11,12";		
		$mysql->multi_query("call spGetActivityDtlByCountryandCategory($country_id,$cat_id)");		
		$arrToReturn=array();
		 do {
			/* store first result set */
			if ($result = $mysql->use_result()) {
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
					print_r($row);
				 $arrToReturn[$row['city_id']][]=$row;
				}
				$result->free();
			}
    	} while ($mysql->next_result());
		
		return $arrToReturn;
		
		$mysql->close();		
	}
	
	public function getActivtyDtlByCountryandCategory1($country_id,$cat_ids,$search_date)
	{
		$search_date=date("Y-m-d",strtotime($search_date));
		$this->getCityDetail($country_id);
		$cityDetail=array();
		while($temp=$this->getAllRow())
		{
			$cityDetail[]=$temp;
		}
		if(count($cityDetail)>0)
		{
			$flagCity=1;
			$countryActivities=array();
			foreach($cityDetail as $city)
			{
				$this->getActivityCountWithCat($city['city_id'],$cat_ids);
				$theActivityCount=$this->numofrows();
					if($theActivityCount>0)
					{
						$countryActivities[$city['city_id']]=$this->getActivityDetailWithCat($city['city_id'],$cat_ids,$theActivityCount,$search_date,$flagCity);
					}
			}
		}
		else
		{
			$flagCity=0;
			$this->getActivityCountWithCat($city['city_id'],$cat_ids);
				$theActivityCount=$this->numofrows();
					if($theActivityCount>0)
					{
						$countryActivities[$city['city_id']]=$this->getActivityDetailWithCat($city['city_id'],$cat_ids,$theActivityCount,$search_date,$flagCity);
					}
		}
			
		return $countryActivities;
	}
	
	public function getActivtyDtlByCountryByDate($country_id,$search_date)
	{
		$search_date=date("Y-m-d",strtotime($search_date));
		$this->getCityDetail($country_id);
		$cityDetail=array();
		while($temp=$this->getAllRow())
		{
			$cityDetail[]=$temp;
		}
		$countryActivities=array();
		if(count($cityDetail)>0)
		{
			$flagCity=1;
				foreach($cityDetail as $city)
				{
					$this->getActivityCount($city['city_id']);
					$theActivityCount=$this->numofrows();
						if($theActivityCount>0)
						{
							$countryActivities[$city['city_id']]=$this->getActivityDetail($city['city_id'],$theActivityCount,$search_date,$flagCity);
						}
				}
		}
		else
		{
			$flagCity=0;
			$this->getActivityCountForCountry1($country_id);
					$theActivityCount=$this->numofrows();
					if($theActivityCount>0)
					{
						$countryActivities[$city['city_id']]=$this->getActivityDetail($country_id,$theActivityCount,$search_date,$flagCity);
					}
		}
			
		return $countryActivities;
	}
	
	public function getActivtyDtlByCountry($country_id)
	{
		$search_date=date("Y-m-d",strtotime($search_date));
		$this->getCityDetail($country_id);
		$cityDetail=array();
		while($temp=$this->getAllRow())
		{
			$cityDetail[]=$temp;
		}
		
		if(count($cityDetail)>0)
		{
			$flagCity=1;
			$countryActivities=array();
			foreach($cityDetail as $city)
			{
				$this->getActivityCountForCountry($city['city_id']);
				$theActivityCount=$this->numofrows();
					if($theActivityCount>0)
					{
						$countryActivities[$city['city_id']]=$this->getActivityDetailForCountry($city['city_id'],$theActivityCount,$flagCity);
					}
			}
		}
		else
		{
			$flagCity=0;
			$countryActivities=array();
			$this->getActivityCountForCountry1($country_id);
					$theActivityCount=$this->numofrows();
					if($theActivityCount>0)
					{
						$countryActivities[$country_id]=$this->getActivityDetailForCountry($country_id,$theActivityCount,$flagCity);
					}
		}	
		return $countryActivities;
	}
	
	public function getCityDetail($country_id)
	{
		 $sql="select city_id,city_name from `".parent::SUFFIX."city` where `country_id`='".$country_id."'";
		 $this->result=$this->query($sql);
	}
	
	public function getActivityCountForCountry($city_id)
	{
		 $sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code FROM ".parent::SUFFIX."calender cal 
				  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
				  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
				  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
				  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
				  where cal.cal_date>=curDate() and act.city_id='".$city_id."' and opd.price_type_name='Adult Price' and act.active='yes' and cal.is_price='yes' group by act.activity_id ";
$this->result=$this->query($sqlActsFromCalender);
	}
	
	public function getActivityCountForCountry1($country_id)
	{
		 $sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code FROM ".parent::SUFFIX."calender cal 
				  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
				  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
				  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
				  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
				  where cal.cal_date>=curDate() and act.country_id='".$country_id."' and opd.price_type_name='Adult Price' and act.active='yes' and cal.is_price='yes' group by act.activity_id ";
$this->result=$this->query($sqlActsFromCalender);
	}
	
	public function getActivityDetailForCountry($city_id,$count,$flagCity)
	{
		if($flagCity==1)
		{
			$condition="act.city_id='".$city_id."'";
		}
		else
		{
			$condition="act.country_id='".$city_id."'";
		}
		
		  $sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code,cal.* FROM ".parent::SUFFIX."calender cal 
							  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
							  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
							  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
							  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
							  where cal_date=curDate() and ".$condition." and opd.price_type_name='Adult Price' and act.active='yes' and cal.is_price='yes' group by act.activity_id ";
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
			$arrReturnInfo[]=$this->getActivityDetailsTimeWiseForCountry($subTypeInfo[0],$theSubActivity[1],$subTypeInfo[2],$theSubActivity[3],$subTypeInfo[1],$count,$flagCity);
		}
		
		/*foreach($arrActivities as $theSubActivity)
		{
			$arrReturnInfo[]=$this->getActivityDetailsTimeWiseForCountry($theSubActivity[0],$theSubActivity[1],$theSubActivity[2],$theSubActivity[3],$count,$flagCity);
		}*/
		return $arrReturnInfo;
		
	}
	
	public function getActivityDetailForCountry1($country_id,$count)
	{
		
		$sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code,cal.* FROM ".parent::SUFFIX."calender cal 
							  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
							  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
							  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
							  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
							  where cal_date=curDate() and act.country_id='".$country_id."' and opd.price_type_name='Adult Price' and act.active='yes' and cal.is_price='yes' group by act.activity_id ";
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
			$arrReturnInfo[]=$this->getActivityDetailsTimeWiseForCountry($subTypeInfo[0],$theSubActivity[1],$subTypeInfo[2],$theSubActivity[3],$subTypeInfo[1],$count);
		}
		
		/*foreach($arrActivities as $theSubActivity)
		{
			$arrReturnInfo[]=$this->getActivityDetailsTimeWiseForCountry($theSubActivity[0],$theSubActivity[1],$theSubActivity[2],$theSubActivity[3],$count);
		}*/
		/*echo "<pre>";
		print_r($arrReturnInfo);
		echo "</pre>";*/
		
		return $arrReturnInfo;
		
	}
	
	
	public function getActivityCountWithCat($city_id,$cat_ids)
	{
		$str_cat=" and ((SUBSTRING_INDEX( act.cat_id, ',', 1 )  in(".$cat_ids.")) or (SUBSTRING_INDEX(SUBSTRING_INDEX( act.cat_id, ',', 2 ) , ',', -1) in(".$cat_ids.")) or (SUBSTRING_INDEX( act.cat_id, ',', -1 ) in(".$cat_ids.")))";	
		$sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code FROM ".parent::SUFFIX."calender cal 
					  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
					  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
					  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
					  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
					  where cal.cal_date>='".$search_date."' and act.city_id='".$city_id."' ".$str_cat." and opd.price_type_name='Adult Price' and act.active='yes' and cal.is_price='yes' group by act.activity_id ";
					  
					  
			$this->result=$this->query($sqlActsFromCalender);
	}
	public function getActivityCount($city_id)
	{
		 $sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code FROM ".parent::SUFFIX."calender cal 
				  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
				  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
				  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
				  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
				  where cal.cal_date>='".$search_date."' and act.city_id='".$city_id."' and opd.price_type_name='Adult Price' and act.active='yes' and cal.is_price='yes' group by act.activity_id ";
$this->result=$this->query($sqlActsFromCalender);
	}
	
	public function getActivityDetail($city_id,$count,$search_date,$flagCity)
	{
		if($flagCity==1)
		{
			$condition="act.city_id='".$city_id."'";
		}
		else
		{
			$condition="act.country_id='".$city_id."'";
		}
		  $sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code,cal.* FROM ".parent::SUFFIX."calender cal 
							  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
							  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
							  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
							  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
							  where cal_date='".$search_date."' and ".$condition." and opd.price_type_name='Adult Price' and act.active='yes' and cal.is_price='yes' group by act.activity_id ";
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
		$arrReturnInfo[]=$this->getActivityDetailsTimeWiseForCountry($subTypeInfo[0],$theSubActivity[1],$subTypeInfo[2],$theSubActivity[3],$subTypeInfo[1],$count,$flagCity);
	}
		
		/*foreach($arrActivities as $theSubActivity)
		{
			$arrReturnInfo[]=$this->getActivityDetailsTimeWiseForCountry($theSubActivity[0],$theSubActivity[1],$theSubActivity[2],$theSubActivity[3],$count,$flagCity);
		}*/
		return $arrReturnInfo;
		
	}
	
	
	public function getActivityDetailWithCat($city_id,$cat_ids,$count,$search_date,$flagCity)
	{
	
		if($flagCity==1)
		{
			$condition="act.city_id='".$city_id."'";
		}
		else
		{
			$condition="act.country_id='".$city_id."'";
		}
	
		// fetch all activities matching city id from calender for now and next days
	$str_cat=" and ((SUBSTRING_INDEX( act.cat_id, ',', 1 )  in(".$cat_ids.")) or (SUBSTRING_INDEX(SUBSTRING_INDEX( act.cat_id, ',', 2 ) , ',', -1) in(".$cat_ids.")) or (SUBSTRING_INDEX( act.cat_id, ',', -1 ) in(".$cat_ids.")))";	
	
		
	$sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code,cal.* FROM ".parent::SUFFIX."calender cal 
							  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
							  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
							  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
							  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
							  where cal_date>='".$search_date."' and ".$condition." ".$str_cat." and opd.price_type_name='Adult Price' and act.active='yes' and cal.is_price='yes' group by act.activity_id ";
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
			$arrReturnInfo[]=$this->getActivityDetailsTimeWiseForCountry($subTypeInfo[0],$theSubActivity[1],$subTypeInfo[2],$theSubActivity[3],$subTypeInfo[1],$count);
		}
		
		/*
		foreach($arrActivities as $theSubActivity)
		{
			$arrReturnInfo[]=$this->getActivityDetailsTimeWiseForCountry($theSubActivity[0],$theSubActivity[1],$theSubActivity[2],$theSubActivity[3],$count);
		}
		*/
		return $arrReturnInfo;
		
	}
	
	/**************** -------------- Activity records for home page ------------ ***********************************/
	public function getHomePageActivityByCountryId($country_id)
	{
		// fetch all activities matching city id from calender for now and next days
		$sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),cnt.country_name as cnt_name,act.activity_id,opd.id,sad.currency_code FROM ".parent::SUFFIX."calender cal 
							  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
							  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
							  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
							  inner join ".parent::SUFFIX."country cnt on act.country_id =  cnt.country_id
							  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
							  where cal_date >= curdate() and act.country_id in(".$country_id.") and opd.price_type_name='Adult Price' and act.active='yes' and cal.price>0 and cal.is_price='yes' group by act.activity_id order by cnt_name  limit 3";
		$this->result=$this->query($sqlActsFromCalender);
		$arrActivities=array();
		while($this->getRow())
		{
				$arrActivities[]=array($this->getField("sub_activity_type_id"),$this->getField("activity_id"),$this->getField("id"),$this->getField("currency_code"),$this->getField("cnt_name"));
		}
		$arrReturnInfo=array();
		// ok now you get all the sub activities from calender. Now fetch the lastest price info and other related information for this sub activity
		foreach($arrActivities as $key=>$theSubActivity)
		{
			$activity_id=$theSubActivity[1];
			$subTypeInfo=array();
			$subTypeInfo=$this->getSubTypeId($activity_id);	
			$arrReturnInfo[$theSubActivity[4]][]=$this->getActivityDetailsTimeWise($subTypeInfo[0],$theSubActivity[1],$subTypeInfo[2],$theSubActivity[3],$subTypeInfo[1]);
		}
		
		
		/*foreach($arrActivities as $theSubActivity)
		{
			$arrReturnInfo[$theSubActivity[4]][]=$this->getActivityDetailsTimeWise($theSubActivity[0],$theSubActivity[1],$theSubActivity[2],$theSubActivity[3]);
		}*/
		return $arrReturnInfo;
	}
	
	public function getActivityDetailsTimeWise($subActivityTypeId,$activity_id,$priceId,$currency_code,$theTimeId)
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
		
		//Getting activity rating detail	
		 $sql="select avg(average_rating) as avg_rating from ".parent::SUFFIX."rating  where activity_id='".$activity_id."'";
		$this->result=$this->query($sql);
		$this->getRow();
		$rating=$this->getField('avg_rating');
		
		// now fetch necessary elements from sub activity like name and all		
		$sql="select act.activity_booker_name,act.physical_address, act.description,city.city_name, img.image_path,cnt.country_name from ".parent::SUFFIX."booker_activities act inner join ".parent::SUFFIX."activity_photo img on act.activity_id = img.activity_id inner join ".parent::SUFFIX."city city on act.city_id=city.city_id inner join ".parent::SUFFIX."country cnt on act.country_id=cnt.country_id where act.activity_id='".$activity_id."'";
		
		$this->result=$this->query($sql);
		$this->getRow();		
		
		
		$arrAct=array('id'=>$subActivityTypeId,'activity_id'=>$activity_id,'whole_amt'=>$arrActPriceInfo[0] ,'price'=>$arrActPriceInfo[0],'act_discounted'=>$arrActPriceInfo[1],'dis_price'=>$arrActPriceInfo[2],'act_image_path'=>$this->getField('image_path'),'activity_desc'=>$this->getField('description'),'activity_booker_name'=>$this->getField('activity_booker_name'),'city_name'=>$this->getField('city_name'),'currency_symbol'=>$currency_symbol,'currency_code'=>$currency_code,'physical_address'=>$this->getField('physical_address'),'country_name'=>$this->getField('country_name'),'activity_rating'=>$rating);
		return $arrAct;
	}
	/**************** -------------- Activity records for home page ------------ ***********************************/
	
	
	public function getActivityDetailsTimeWiseForCountry($subActivityTypeId,$activity_id,$priceId,$currency_code,$theTimeId,$count,$flagCity)
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
		
		// now fetch necessary elements from sub activity like name and all		
		
		if($flagCity==1)
		{
			$cond1="city.city_name, cnt.country_name";
			$cond2="inner join ".parent::SUFFIX."city city on act.city_id=city.city_id inner join ".parent::SUFFIX."country cnt on act.country_id=cnt.country_id";
		}
		else
		{
			$cond1="cnt.country_name";
			$cond2="inner join ".parent::SUFFIX."country cnt on act.country_id=cnt.country_id";
		}
		
		$sql="select act.activity_booker_name,act.physical_address, act.description,img.image_path,".$cond1." from ".parent::SUFFIX."booker_activities act inner join ".parent::SUFFIX."activity_photo img on act.activity_id = img.activity_id ".$cond2."  where act.activity_id='".$activity_id."'";
		
		$this->result=$this->query($sql);
		$this->getRow();
		
		$arrAct=array('id'=>$subActivityTypeId,'activity_id'=>$activity_id,'whole_amt'=>$arrActPriceInfo[0] ,'price'=>$arrActPriceInfo[0],'act_discounted'=>$arrActPriceInfo[1],'dis_price'=>$arrActPriceInfo[2],'act_image_path'=>$this->getField('image_path'),'activity_desc'=>$this->getField('description'),'activity_booker_name'=>$this->getField('activity_booker_name'),'city_name'=>$this->getField('city_name'),'currency_symbol'=>$currency_symbol,'currency_code'=>$currency_code,'physical_address'=>$this->getField('physical_address'),'country_name'=>$this->getField('country_name'),'total_activity'=>$count,'flagCity'=>$flagCity);
		return $arrAct;
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
			usort($arrPriceDtl, array('theProcClass','discounted_price_compare')); //sorting the array on the discounted price
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
			usort($arrPriceDtl, array('theProcClass','price_compare'));//sorting the array on the price
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