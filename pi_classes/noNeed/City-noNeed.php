<?php
require_once dirname(__FILE__) . '/AbstractDB.php';
class City extends AbstractDB
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
	
	public function getAllRow()
	{
		if($this->row = mysql_fetch_assoc($this->result))
		   {
				return $this->row;
	       }	
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
	
	public function getAllCityByCountryId($country_id){
		$sql="select * from ".parent::SUFFIX."city where country_id='".$country_id."'";
		$this->result=$this->query($sql);
	}
	public function getAllCity(){
		$sql="select * from ".parent::SUFFIX."city";
		$this->result=$this->query($sql);
	}
	
	public function getCountryIdByName($country_name){
		$sql="select * from ".parent::SUFFIX."country where country_name='".$country_name."'";
		$this->result=$this->query($sql);
		//$this->getAllRow();
		//return $this->getField('country_id');
	}
	public function getCityIdByName($city_name){
		$sql="select * from ".parent::SUFFIX."city where city_name='".$city_name."'";
		$this->result=$this->query($sql);
		//$this->getAllRow();
		//return $this->getField('city_id');
	}
	
	public function getCityNameById($city_id)
	{
		$sql="select city_name from ".parent::SUFFIX."city where city_id='".$city_id."'";
		$this->result=$this->query($sql);
		$this->getAllRow();
		return $this->getField('city_name');
	}
	
	public function getCityByCountry($country_id){
		$sql="select * from ".parent::SUFFIX."city where country_id='".$country_id."'";
		$this->result=$this->query($sql);
	}
	public function getCountryId($searchtext)
	{
		$sql="select * from ".parent::SUFFIX."city where city_name like '%".$searchtext."%'";
		$this->result=$this->query($sql);
	}
	
	public function getCountryName($searchtext)
	{
		 $sql="select country_name from ".parent::SUFFIX."country where country_name like '%".$searchtext."%' and country_for='activity'";
		$this->result=$this->query($sql);
	}
	
	public function getCountryCityTips($id,$type){
		$sql="select * from ".parent::SUFFIX."country_city_tips_details where country_city_id='".$id."' and tips_for='".$type."' and tips_status='Active'";
		$this->result=$this->query($sql);
	}
	
	public function getAllCityCntNameAutoSuggest(){
		$sql="select city.city_name,cnt.country_name,act.activity_booker_name from ".parent::SUFFIX."booker_activities act left join ".parent::SUFFIX."country cnt on act.country_id=cnt.country_id left join ".parent::SUFFIX."city city on act.city_id=city.city_id where act.active='yes' group by cnt.country_name, city.city_name order by act.activity_booker_name, city.city_name,cnt.country_name";	
		$this->result=$this->query($sql);
	}
	
	public function getActivityByCityId($city_id)
	{
		// fetch all activities matching city id from calender for now and next days
		$sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code FROM ".parent::SUFFIX."calender cal 
							  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
							  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
							  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
							  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
							  where cal_date >= curdate() and act.city_id='".$city_id."' and opd.price_type_name='Adult Price' and act.active='yes' and cal.is_price='yes' group by act.activity_id ";
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
		
		#Getting the activity overall rating and coun of rating.
		$sql="select count(rating_id) as count,avg(average_rating) as rating from `".parent::SUFFIX."rating` where activity_id='".$activity_id."'";
		$this->result=$this->query($sql);
		$this->getRow();
		$rating_count=$this->getField('count');
		$rating=number_format($this->getField('rating'),2);
		
		
		
		// now fetch necessary elements from sub activity like name and all		
		$sql="select act.activity_booker_name,act.physical_address, act.description,city.city_name, img.image_path,cnt.country_name from ".parent::SUFFIX."booker_activities act inner join ".parent::SUFFIX."activity_photo img on act.activity_id = img.activity_id inner join ".parent::SUFFIX."city city on act.city_id=city.city_id inner join ".parent::SUFFIX."country cnt on act.country_id=cnt.country_id where act.activity_id='".$activity_id."'";
		
		$this->result=$this->query($sql);
		$this->getRow();		
		
		$arrAct=array('id'=>$subActivityTypeId,'activity_id'=>$activity_id,'whole_amt'=>$arrActPriceInfo[0] ,'price'=>$arrActPriceInfo[0],'act_discounted'=>$arrActPriceInfo[1],'dis_price'=>$arrActPriceInfo[2],'act_image_path'=>$this->getField('image_path'),'activity_desc'=>$this->getField('description'),'activity_booker_name'=>$this->getField('activity_booker_name'),'city_name'=>$this->getField('city_name'),'currency_symbol'=>$currency_symbol,'currency_code'=>$currency_code,'physical_address'=>$this->getField('physical_address'),'country_name'=>$this->getField('country_name'),'rating_count'=>$rating_count,'rating'=>$rating);
		return $arrAct;
	}
	
	public function getActivityDetailsTimeWiseForActIds($subActivityTypeId,$activity_id,$priceId,$currency_code,$theTimeId)
	{
		/*$getLatestTimeScheduel_id="select schedule_time from `".parent::SUFFIX."sub_activity_type` where `id`='".$subActivityTypeId."'";
		$this->result=$this->query($getLatestTimeScheduel_id);
		$this->getRow();
		$timescheduel=$this->getField('schedule_time');
		
		$arrTimeIds=array();
		$arrTimeIds=explode(",",$timescheduel);	
		*/
		// get time scedule by activity id for latest time
		
		/*$sqlTime="SELECT time_schedule_id,(case when (schedule_at='pm') then `hour`+12 else `hour` end) as theTime FROM ".parent::SUFFIX."activity_time_schedule where activity_id = '".$activity_id."' order by theTime limit 1";
		$this->result=$this->query($sqlTime);
		$this->getRow();
		$theTimeId=$this->getField('time_schedule_id');
		$theTimeId=$arrTimeIds[0];*/
		
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
		
		/*selectting the city names*/ 
		$sql="select act.activity_booker_name,city.city_name from ".parent::SUFFIX."booker_activities act inner join ".parent::SUFFIX."city city on act.city_id= city.city_id where act.activity_id='".$activity_id."'";
		$this->result=$this->query($sql);
		$this->getRow();		
		$city_name=$this->getField('city_name');
		
		#Getting the activity overall rating and coun of rating.
		$sql="select count(rating_id) as count,avg(average_rating) as rating from `".parent::SUFFIX."rating` where activity_id='".$activity_id."'";
		$this->result=$this->query($sql);
		$this->getRow();
		$rating_count=$this->getField('count');
		$rating=number_format($this->getField('rating'),2);
		// now fetch necessary elements from sub activity like name and all		
		$sql="select act.activity_booker_name,act.physical_address, act.description, img.image_path,cnt.country_name from ".parent::SUFFIX."booker_activities act inner join ".parent::SUFFIX."activity_photo img on act.activity_id = img.activity_id inner join ".parent::SUFFIX."country cnt on act.country_id=cnt.country_id where act.activity_id='".$activity_id."'";
		
		$this->result=$this->query($sql);
		$this->getRow();		
		
		$arrAct=array('id'=>$subActivityTypeId,'activity_id'=>$activity_id,'whole_amt'=>$arrActPriceInfo[0] ,'price'=>$arrActPriceInfo[0],'act_discounted'=>$arrActPriceInfo[1],'dis_price'=>$arrActPriceInfo[2],'act_image_path'=>$this->getField('image_path'),'activity_desc'=>$this->getField('description'),'activity_booker_name'=>$this->getField('activity_booker_name'),'city_name'=>$city_name,'currency_symbol'=>$currency_symbol,'currency_code'=>$currency_code,'physical_address'=>$this->getField('physical_address'),'country_name'=>$this->getField('country_name'),'rating_count'=>$rating_count,'rating'=>$rating);
		return $arrAct;
	}
	
	
	public function getActivityByCityIdAjax($arr)
	{
		$condition="";
		if($arr['city_id']!="")
		{
			$condition.=" and act.city_id='".$arr['city_id']."'"; 
		}
		if($arr['cat_id']!='')
		{
			$cat_id=$arr['cat_id'];
		$strcat="((SUBSTRING_INDEX( act.cat_id, ',', 1 )  in(".$cat_id.")) or (SUBSTRING_INDEX(SUBSTRING_INDEX( act.cat_id, ',', 2 ) , ',', -1) in(".$cat_id.")) or (SUBSTRING_INDEX( act.cat_id, ',', -1 ) in(".$cat_id.")))";
		
			$condition.=" and ".$strcat;
		}
		
		if($arr['act_ids']!='')
		{
			$act_ids=$arr['act_ids'];	
			$condition.="and act.activity_id in(".$act_ids.")";
		}
		if($arr['search_date']!='')
		{
			$condition.=" and cal.cal_date='".date("Y-m-d",strtotime($arr['search_date']))."'";
		}
		else
		{	
			$condition.=" and cal.cal_date>=curdate()";
		}
		
		// fetch all activities matching city id from calender for now and next days
	/*	echo $sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code FROM ".parent::SUFFIX."calender cal 
							  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
							  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
							  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
							  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
							  where cal_date >= curdate() and act.city_id='".$city_id."' and opd.price_type_name='Adult Price' and act.active='yes' group by act.activity_id ";*/
						  
		/*if($arr['is_discounted']=='yes'){
			$price_range=" and cal.discounted_price between '".$arr['price_from']."' and '".$arr['price_to']."' ";
		}else{
			$price_range=" and cal.price between '".$arr['price_from']."' and '".$arr['price_to']."' ";
		}*/
		
	/*	$price_range=" and ((cal.price between '".$arr['price_from']."' and '".$arr['price_to']."') or ( cal.discounted='yes' and cal.discounted_price between '".$arr['price_from']."' and '".$arr['price_to']."')) "; ".$price_range."*/
		
		//$rating_range=" and avg(rt.average_rating) between '".$arr['rating_from']."' and '".$arr['rating_to']."'";
		
		$str_cat="";
		
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
			$str_cat=" and ((SUBSTRING_INDEX( cat_id, ',', 1 )  in(".$str_cat.")) or (SUBSTRING_INDEX(SUBSTRING_INDEX( cat_id, ',', 2 ) , ',', -1) in(".$str_cat.")) or (SUBSTRING_INDEX( cat_id, ',', -1 ) in(".$str_cat.")))";
		}
		if($arr['orderBySearch']=='activity_booker_name'){
			$orderby_name=" order by  act.activity_booker_name ";
		}else{
			$orderby_name=" order by  act.activity_id DESC ";	
		}
		
		$sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code FROM ".parent::SUFFIX."calender cal 
							  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
							  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
							  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
							  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
							  where opd.price_type_name='Adult Price' ".$condition." and act.active='yes' and cal.is_price='yes' ".$str_cat."  group by act.activity_id ".$orderby_name."";
							  
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
			$arrReturnInfo[]=$this->getActivityDetailsTimeWiseAjax($subTypeInfo[0],$theSubActivity[1],$subTypeInfo[2],$theSubActivity[3],$arr,$subTypeInfo[1]);
		}
		/*foreach($arrActivities as $theSubActivity)
		{
			$arrReturnInfo[]=$this->getActivityDetailsTimeWiseAjax($theSubActivity[0],$theSubActivity[1],$theSubActivity[2],$theSubActivity[3],$arr);
		}*/
		return $arrReturnInfo;
	}
	public function getActivityDetailsTimeWiseAjax($subActivityTypeId,$activity_id,$priceId,$currency_code,$arr,$theTimeId)
	{
		
		if($arr['search_date']!="")
		{
			$condition=" and cal.cal_date='".date("Y-m-d",strtotime($arr['search_date']))."'";
		}
		else
		{
			$condition="and cal.cal_date>=curdate() ";
		}
		
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
		
		// get time scedule by activity id for latest time
		/*$getLatestTimeScheduel_id="select schedule_time from `".parent::SUFFIX."sub_activity_type` where `id`='".$subActivityTypeId."'";
		$this->result=$this->query($getLatestTimeScheduel_id);
		$this->getRow();
		$timescheduel=$this->getField('schedule_time');
		$arrTimeIds=array();
		$arrTimeIds=explode(",",$timescheduel);	
		;*/
		/*$sqlTime="SELECT time_schedule_id,(case when (schedule_at='pm') then `hour`+12 else `hour` end) as theTime FROM ".parent::SUFFIX."activity_time_schedule where activity_id = '".$activity_id."' order by theTime limit 1";
		$this->result=$this->query($sqlTime);
		$this->getRow();
		$theTimeId=$arrTimeIds[0]*/
		
		
		// now fetch price from calendar....

		/*if($arr['is_discounted']=='yes'){
			$price_range=" and cal.discounted_price between '".$arr['price_from']."' and '".$arr['price_to']."' ";
		}else{
			$price_range=" and cal.price between '".$arr['price_from']."' and '".$arr['price_to']."' ";
		}*/
		
		//$price_range=" and ((cal.price between '".$arr['price_from']."' and '".$arr['price_to']."') or ( cal.discounted='yes' and cal.discounted_price between '".$arr['price_from']."' and '".$arr['price_to']."')) ";  ".$price_range."
		
		$sqlPrice="select cal.price,cal.discounted,cal.discounted_price from  ".parent::SUFFIX."calender cal where cal.sub_activity_type_id='".$subActivityTypeId."' and cal.activity_time='".$theTimeId."' and other_price='".$priceId."' ".$condition." and cal.is_price='yes' limit 1";
		$this->result=$this->query($sqlPrice);
		$this->getRow();
		$arrActPriceInfo=array($this->getField('price'),$this->getField('discounted'),$this->getField('discounted_price'));
		
		$sql="select currency_symbol from ".parent::SUFFIX."country where currency_code='".$currency_code."'";
		$this->result=$this->query($sql);
		$this->getRow();
		$currency_symbol=$this->getField('currency_symbol');
		
		// now fetch necessary elements from sub activity like name and all	
		$str_cat=" ";
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
			$str_cat=" and ((SUBSTRING_INDEX( cat_id, ',', 1 )  in(".$str_cat.")) or (SUBSTRING_INDEX(SUBSTRING_INDEX( cat_id, ',', 2 ) , ',', -1) in(".$str_cat.")) or (SUBSTRING_INDEX( cat_id, ',', -1 ) in(".$str_cat.")))";
		}
		if($arr['orderBySearch']=='activity_booker_name'){
			$orderby_name=" order by  act.activity_booker_name ";
		}else{
			$orderby_name=" order by  act.activity_id DESC ";	
		}	
		
		$sql="select act.activity_booker_name,city.city_name from ".parent::SUFFIX."booker_activities act inner join ".parent::SUFFIX."city city on act.city_id = city.city_id where act.activity_id='".$activity_id."'";
		$this->result=$this->query($sql);
		$this->getRow();
		$city_name=$this->getField('city_name');
		
		#Getting the activity overall rating and coun of rating.
		$sql="select count(rating_id) as count,avg(average_rating) as rating from `".parent::SUFFIX."rating` where activity_id='".$activity_id."'";
		$this->result=$this->query($sql);
		$this->getRow();
		$rating_count=$this->getField('count');
		$rating=number_format($this->getField('rating'),2);
		
		
		
		
		$sql="select act.activity_booker_name, act.description, img.image_path,cnt.country_name from ".parent::SUFFIX."booker_activities act inner join ".parent::SUFFIX."activity_photo img on act.activity_id = img.activity_id inner join ".parent::SUFFIX."country cnt on act.country_id=cnt.country_id where act.activity_id='".$activity_id."' ".$str_cat." ".$orderby_name;
		
		$this->result=$this->query($sql);
		$this->getRow();		
$arrAct=array('id'=>$subActivityTypeId,'activity_id'=>$activity_id,'whole_amt'=>$arrActPriceInfo[0] ,'price'=>$arrActPriceInfo[0],'act_discounted'=>$arrActPriceInfo[1],'dis_price'=>$arrActPriceInfo[2],'act_image_path'=>$this->getField('image_path'),'activity_desc'=>$this->getField('description'),'activity_booker_name'=>$this->getField('activity_booker_name'),'city_name'=>$city_name,'currency_symbol'=>$currency_symbol,'currency_code'=>$currency_code,'country_name'=>$this->getField('country_name'),'rating_count'=>$rating_count,'rating'=>$rating);	
		 /*
		 	echo "<pre>";
			 	print_r($arrAct);	
			echo "</per>";*/
		return $arrAct;
	}
	public function getCurrancySymbol($currancy_code)
	{
		$sql="select currency_symbol from `".parent::SUFFIX."country` where `currency_code`='".$currancy_code."'";
		$this->result=$this->query($sql);
	
	}
	
	public function getActivityByCityWithDate($city_id,$search_date)
	{
		// fetch all activities matching city id from calender for now and next days
		$sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code FROM ".parent::SUFFIX."calender cal 
							  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
							  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
							  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
							  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
							  where act.city_id='".$city_id."' and cal.cal_date='".date("Y-m-d",strtotime($search_date))."' and opd.price_type_name='Adult Price' and act.active='yes' and cal.is_price='yes' group by act.activity_id ";
							  
							  
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
			$arrReturnInfo[]=$this->getActivityDetailsDateWise($subTypeInfo[0],$theSubActivity[1],$subTypeInfo[2],$theSubActivity[3],$search_date,$subTypeInfo[1]);
		}
		/*foreach($arrActivities as $theSubActivity)
		{
			$arrReturnInfo[]=$this->getActivityDetailsDateWise($theSubActivity[0],$theSubActivity[1],$theSubActivity[2],$theSubActivity[3],$search_date);
		}*/
			/*echo "<pre>";
		print_r($arrReturnInfo);
			echo "</pre>";*/
		return $arrReturnInfo;
	}
	public function getActivityDetailsDateWise($subActivityTypeId,$activity_id,$priceId,$currency_code,$search_date,$theTimeId)
	{
		/*$getLatestTimeScheduel_id="select schedule_time from `".parent::SUFFIX."sub_activity_type` where `id`='".$subActivityTypeId."'";
		$this->result=$this->query($getLatestTimeScheduel_id);
		$this->getRow();
		$timescheduel=$this->getField('schedule_time');
		$arrTimeIds=array();
		$arrTimeIds=explode(",",$timescheduel);	
		// get time scedule by activity id for latest time
		
		$theTimeId=$arrTimeIds[0];*/
		/*
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
		
		// now fetch price from calendar....
		
		$sqlPrice="select price,discounted,discounted_price from  ".parent::SUFFIX."calender where sub_activity_type_id='".$subActivityTypeId."' and activity_time='".$theTimeId."' and other_price='".$priceId."' and cal_date='".date("Y-m-d",strtotime($search_date))."' and is_price='yes' limit 1";
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
		$sql="select act.activity_booker_name, act.physical_address,act.description,city.city_name, img.image_path from ".parent::SUFFIX."booker_activities act inner join ".parent::SUFFIX."activity_photo img on act.activity_id = img.activity_id inner join ".parent::SUFFIX."city city on act.city_id=city.city_id where act.activity_id='".$activity_id."'";
		
		$this->result=$this->query($sql);
		$this->getRow();		
		
		$arrAct=array('id'=>$subActivityTypeId,'activity_id'=>$activity_id,'whole_amt'=>$arrActPriceInfo[0] ,'price'=>$arrActPriceInfo[0],'act_discounted'=>$arrActPriceInfo[1],'dis_price'=>$arrActPriceInfo[2],'act_image_path'=>$this->getField('image_path'),'activity_desc'=>$this->getField('description'),'physical_address'=>$this->getField('physical_address'),'activity_booker_name'=>$this->getField('activity_booker_name'),'city_name'=>$this->getField('city_name'),'currency_symbol'=>$currency_symbol,'currency_code'=>$currency_code,'rating_count'=>$rating_count,'rating'=>$rating);
		return $arrAct;
	}
	
	
	public function getActivityByCityandCatId($act_ids)
	{
	
		/*$strcat="and ((SUBSTRING_INDEX( act.cat_id, ',', 1 )  in(".$cat_id.")) or (SUBSTRING_INDEX(SUBSTRING_INDEX( act.cat_id, ',', 2 ) , ',', -1) in(".$cat_id.")) or (SUBSTRING_INDEX( act.cat_id, ',', -1 ) in(".$cat_id.")))";*/
	
		// fetch all activities matching city id from calender for now and next days
		$sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code FROM ".parent::SUFFIX."calender cal 
							  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
							  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
							  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
							  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
							  where cal_date >= curdate() and act.activity_id in(".$act_ids.") and opd.price_type_name='Adult Price' and act.active='yes' and cal.is_price='yes' group by act.activity_id ";
							  
							  
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
			$arrReturnInfo[]=$this->getActivityDetailsTimeWiseForActIds($subTypeInfo[0],$theSubActivity[1],$subTypeInfo[2],$theSubActivity[3],$subTypeInfo[1]);
		}
		
		/*
		foreach($arrActivities as $theSubActivity)
		{
			$arrReturnInfo[]=$this->getActivityDetailsTimeWiseForActIds($theSubActivity[0],$theSubActivity[1],$theSubActivity[2],$theSubActivity[3]);
		}*/
			/*echo "<pre>";
		print_r($arrReturnInfo);
			echo "</pre>";*/
		return $arrReturnInfo;
	}
	public function getActivityBySearch($where_cond)
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
		
		/*
		foreach($arrActivities as $theSubActivity)
		{
			$arrReturnInfo[]=$this->getActivityDetailsBySearch($theSubActivity[0],$theSubActivity[1],$theSubActivity[2],$theSubActivity[3]);
		}
		*/
		
		/*echo "<br>";
			echo "<pre>";
		print_r($arrReturnInfo);
			echo "</pre>";*/
		return $arrReturnInfo;
	}
	public function getActivityBySearchAjax($arr)
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
	
	
	public function getActivityDetailsBySearch($subActivityTypeId,$activity_id,$priceId,$currency_code,$theTimeId)
	{
		
		/*$getLatestTimeScheduel_id="select schedule_time from `".parent::SUFFIX."sub_activity_type` where `id`='".$subActivityTypeId."'";
		$this->result=$this->query($getLatestTimeScheduel_id);
		$this->getRow();
		$timescheduel=$this->getField('schedule_time');
		$theTimeId=$arrTimeIds[0];
		$arrTimeIds=array();
		$arrTimeIds=explode(",",$timescheduel);	*/
	
		// get time scedule by activity id for latest time
		
		/*
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
		$theTimeId=$this->getField('time_schedule_id');
		*/
		
		// now fetch price from calendar....
			
		if($_REQUEST['small_search_dt']!="")
		{
			$search_date=date("Y-m-d",strtotime($_REQUEST['small_search_dt']));
		}
		elseif($_REQUEST['search_dt']!="")
		{
			$search_date=date("Y-m-d",strtotime($_REQUEST['search_dt']));
		}
		else
		{
			$search_date=date("Y-m-d");
		}
		
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
	
	/*--------------------------------------------Activity Functions for bucket list -------------------------------------*/
	
	public function getActivityOfBucket($user_id)
	{
		// fetch all activities matching city id from calender for now and next days
		 $sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code FROM ".parent::SUFFIX."calender cal 
							  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
							  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
							  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
							  inner join ".parent::SUFFIX."wish_list_details bucket on act.activity_id=bucket.activity_id
							  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
							  where cal_date >= curdate() and bucket.user_id=".$user_id." and opd.price_type_name='Adult Price' and act.active='yes' and cal.is_price='yes' group by act.activity_id ";
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
			$arrReturnInfo[]=$this->getActivityDetailsForBucket($subTypeInfo[0],$theSubActivity[1],$subTypeInfo[2],$theSubActivity[3],$subTypeInfo[1]);
		}
		
		/*foreach($arrActivities as $theSubActivity)
		{
			$arrReturnInfo[]=$this->getActivityDetailsForBucket($theSubActivity[0],$theSubActivity[1],$theSubActivity[2],$theSubActivity[3]);
		}*/
		return $arrReturnInfo;
	}
	
	public function getActivityDetailsForBucket($subActivityTypeId,$activity_id,$priceId,$currency_code,$theTimeId)
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
	
	
		/*$getLatestTimeScheduel_id="select schedule_time from `".parent::SUFFIX."sub_activity_type` where `id`='".$subActivityTypeId."'";
		$this->result=$this->query($getLatestTimeScheduel_id);
		$this->getRow();
		$timescheduel=$this->getField('schedule_time');
		
		$arrTimeIds=array();
		$arrTimeIds=explode(",",$timescheduel);	
		// get time scedule by activity id for latest time
		
		/*$sqlTime="SELECT time_schedule_id,(case when (schedule_at='pm') then `hour`+12 else `hour` end) as theTime FROM ".parent::SUFFIX."activity_time_schedule where activity_id = '".$activity_id."' order by theTime limit 1";
		$this->result=$this->query($sqlTime);
		$this->getRow();
		$theTimeId=$this->getField('time_schedule_id');*/
		//$theTimeId=$arrTimeIds[0];
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
		$sql="select act.activity_booker_name, act.description,city.city_name, img.image_path from ".parent::SUFFIX."booker_activities act inner join ".parent::SUFFIX."activity_photo img on act.activity_id = img.activity_id inner join ".parent::SUFFIX."city city on act.city_id=city.city_id where act.activity_id='".$activity_id."'";
		
		$this->result=$this->query($sql);
		$this->getRow();		
		
		$arrAct=array('id'=>$subActivityTypeId,'activity_id'=>$activity_id,'whole_amt'=>$arrActPriceInfo[0] ,'price'=>$arrActPriceInfo[0],'act_discounted'=>$arrActPriceInfo[1],'dis_price'=>$arrActPriceInfo[2],'act_image_path'=>$this->getField('image_path'),'activity_desc'=>$this->getField('description'),'activity_booker_name'=>$this->getField('activity_booker_name'),'city_name'=>$this->getField('city_name'),'currency_symbol'=>$currency_symbol,'currency_code'=>$currency_code,'rating_count'=>$rating_count,'rating'=>$rating);
		return $arrAct;
	}
	
	/*--------------------------------------------Activity Functions for bucket list end here ----------------------------*/
	
	/*--------------------------------------------Activity by country city category and date -----------------------------*/
	public function getActivityByContryCityCatAndDate($country_id,$city_id,$cat_id,$search_date)
	{
		$strcat="and ((SUBSTRING_INDEX( act.cat_id, ',', 1 )  in(".$cat_id.")) or (SUBSTRING_INDEX(SUBSTRING_INDEX( act.cat_id, ',', 2 ) , ',', -1) in(".$cat_id.")) or (SUBSTRING_INDEX( act.cat_id, ',', -1 ) in(".$cat_id.")))";
	
		// fetch all activities matching city id from calender for now and next days
		$sqlActsFromCalender="SELECT distinct(cal.sub_activity_type_id),act.activity_id,opd.id,sad.currency_code FROM ".parent::SUFFIX."calender cal 
							  inner join ".parent::SUFFIX."sub_activity_type sat on cal.sub_activity_type_id = sat.id
							  inner join ".parent::SUFFIX."sub_activity_detail sad on cal.sub_activity_id = sad.sub_activity_id
							  inner join ".parent::SUFFIX."booker_activities act on sad.activity_id =  act.activity_id
							  inner join ".parent::SUFFIX."other_price_details opd on cal.other_price=opd.id
							  where cal_date='".$search_date."' and act.country_id='".$country_id."' and act.city_id='".$city_id."' ".$strcat." and opd.price_type_name='Adult Price' and act.active='yes' and cal.is_price='yes' group by act.activity_id ";
							  
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
			$arrReturnInfo[]=$this->getActivityDetailsTimeWiseByDate($subTypeInfo[0],$theSubActivity[1],$subTypeInfo[2],$theSubActivity[3],$search_date,$subTypeInfo[1]);
		}
		
		/*
		foreach($arrActivities as $theSubActivity)
		{
			$arrReturnInfo[]=$this->getActivityDetailsTimeWiseByDate($theSubActivity[0],$theSubActivity[1],$theSubActivity[2],$theSubActivity[3],$search_date);
		}*/
			/*echo "<pre>";
		print_r($arrReturnInfo);
			echo "</pre>";*/
		return $arrReturnInfo;
	}
	
	
	public function getActivityDetailsTimeWiseByDate($subActivityTypeId,$activity_id,$priceId,$currency_code,$search_date,$theTimeId)
	{
		/*$getLatestTimeScheduel_id="select schedule_time from `".parent::SUFFIX."sub_activity_type` where `id`='".$subActivityTypeId."'";
		$this->result=$this->query($getLatestTimeScheduel_id);
		$this->getRow();
		$timescheduel=$this->getField('schedule_time');
		
		$arrTimeIds=array();
		$arrTimeIds=explode(",",$timescheduel);	
		$theTimeId=$arrTimeIds[0];*/
		// get time scedule by activity id for latest time
		
		/*$sqlTime="SELECT time_schedule_id,(case when (schedule_at='pm') then `hour`+12 else `hour` end) as theTime FROM ".parent::SUFFIX."activity_time_schedule where activity_id = '".$activity_id."' order by theTime limit 1";
		$this->result=$this->query($sqlTime);
		$this->getRow();
		$theTimeId=$this->getField('time_schedule_id');*/
		
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
		$sql="select act.activity_booker_name,act.physical_address, act.description,city.city_name, img.image_path,cnt.country_name from ".parent::SUFFIX."booker_activities act inner join ".parent::SUFFIX."activity_photo img on act.activity_id = img.activity_id inner join ".parent::SUFFIX."city city on act.city_id=city.city_id inner join ".parent::SUFFIX."country cnt on act.country_id=cnt.country_id where act.activity_id='".$activity_id."'";
		
		$this->result=$this->query($sql);
		$this->getRow();		
		
		$arrAct=array('id'=>$subActivityTypeId,'activity_id'=>$activity_id,'whole_amt'=>$arrActPriceInfo[0] ,'price'=>$arrActPriceInfo[0],'act_discounted'=>$arrActPriceInfo[1],'dis_price'=>$arrActPriceInfo[2],'act_image_path'=>$this->getField('image_path'),'activity_desc'=>$this->getField('description'),'activity_booker_name'=>$this->getField('activity_booker_name'),'city_name'=>$this->getField('city_name'),'currency_symbol'=>$currency_symbol,'currency_code'=>$currency_code,'physical_address'=>$this->getField('physical_address'),'country_name'=>$this->getField('country_name'),'rating_count'=>$rating_count,'rating'=>$rating);
		return $arrAct;
	}
	/*--------------------------------------------Activity by country city category and date end here -----------------------------*/
	
	
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
		
	/*	echo "<pre>";
		print_r($arrPriceDtl);
		echo "</pre>";*/
		
		
		if($discouted=='yes')
		{
			usort($arrPriceDtl, array('City','discounted_price_compare')); //sorting the array on the discounted price
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
			usort($arrPriceDtl, array('City','price_compare'));//sorting the array on the price
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
	
	public function getActDtlPageRating($activity_id)
	{
		$sql="select rat.*,usr.`first_name`,usr.`last_name`,usr.`email`,usr.`gender`,cntry.`country_name` from `".parent::SUFFIX."rating` as rat left join `".parent::SUFFIX."user_details` as usr on rat.`user_id`=usr.`user_id` left join `".parent::SUFFIX."country` as cntry on cntry.`country_id`=usr.`country` where rat.`activity_id`='".$activity_id."' and rat.`status`='1' order by rat.`added_date` DESC limit 2";	
		$this->result=$this->query($sql);
	}
}
?>