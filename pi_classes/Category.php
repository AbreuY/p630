<?php
class category extends AbstractDB
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
	
	/* Following Functions are added by SJ on 31 May 2011 start*/
	
	public function getRow($allFields='')
	{ 
	 	while($this->row = mysql_fetch_assoc($this->result))
		{
			if($allFields)
				return $this->row;
			else
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
	
	// Function for get Count row	
	function getCount()
	{
		$number = mysql_num_rows($this->result); 
		return $number;
	}
	
	public function getAllCategoryDtl(){
		$sql="select * from `".parent::SUFFIX."category`";
		$this->result=$this->query($sql);
	}
	
	public function getAllCategoryDtlPage($start, $limit,$sort, $type){
		if($type==''){
			$type="ASC ";
		}
		if($sort==''){
			$sort='cat_name ';
		}		
		$sql="select * from `".parent::SUFFIX."category` order by ". $sort ." ".$type." LIMIT $start, $limit";
		$this->result=$this->query($sql);
	}
	
	public function deleteCategoryDetails($id){
		$sql_one="DELETE FROM `".parent::SUFFIX."category` WHERE `cat_id`='".$id."'";
		$this->query($sql_one);

		$sql="DELETE FROM `".parent::SUFFIX."category_expertise_services` WHERE `cat_id`='".$id."'";
		$this->result=$this->query($sql);		
	}

	public function getCategoryDtlById($id){
		$sql="select * from `".parent::SUFFIX."category` where cat_id='".$id."'";
		$this->result=$this->query($sql);
	}
	
	function updateRecord($set_fields, $where_field)
	{
		$this->result=$this->query("UPDATE ".parent::SUFFIX."category SET ".$set_fields." where ".$where_field);
	}//End Function
	
	#Start Function:- 
		function insert_category_expertise_services($fields,$values)
		{	
			$sql = "INSERT INTO ".parent::SUFFIX."category_expertise_services(".$fields.")VALUES(".$values.")";
			$this->result=$this->query($sql);
			return mysql_insert_id();
		}
	
		public function select_category_expertise_services($catId,$parentCatId){
			$sql="select * from `".parent::SUFFIX."category_expertise_services` where cat_id='".$catId."' and parent_cat_id='".$parentCatId."'";
			$this->result=$this->query($sql);
		}

		function update_category_expertise_services($set_fields,$where_field)
		{	
			$sql = "UPDATE ".parent::SUFFIX."category_expertise_services SET ".$set_fields." where ".$where_field;
			return $this->result=$this->query($sql);
		}
		
		public function delete_category_expertise_services($where_field){
			$sql="DELETE FROM `".parent::SUFFIX."category_expertise_services` WHERE ".$where_field;
			$this->result=$this->query($sql);
		}
	#End Function
	
	
	function insertRecord($dfields, $dvalues)
	{
		$sql="INSERT INTO ".parent::SUFFIX."category(".$dfields.")VALUES(".$dvalues.")";
		$this->result=$this->query("INSERT INTO ".parent::SUFFIX."category(".$dfields.")VALUES(".$dvalues.")");
		return mysql_insert_id();
	}//End Function
	
	#CategoryRecursionFunction:
	/*function getCategoryByLevel()
	{
		$query = "SELECT cat_id,parent_id,cat_level FROM ".parent::SUFFIX."category WHERE 1 ";
		$this->result = $this->query($query);
			while($temp = mysql_fetch_assoc($this->result))
			{	
			 	if(!$temp['parent_id']){
					$rs[] = $temp['cat_id']; 
				}
			}
			$rs = implode(',',$rs);
			$prntId = $rs;
			
			if(!empty($rs)){
				$rs = $this->GetCategoryIdWhichComesInRsArr($rs);					
			}
			if($rs){
				$finalResult = $rs;
			}else{
				$finalResult = $prntId;
			} 
		return $finalResult;
	}
	function GetCategoryIdWhichComesInRsArr($recordId)
	{
	    $tmp = explode(',',$recordId);
		$count = count($tmp);
		$theReturnString="";
		for($i=0;$i<$count;$i++){
			echo $sql = "SELECT cat_id,parent_id,cat_level FROM ".parent::SUFFIX."category WHERE parent_id='".$tmp[$i]."' ";
			echo "<hr>";
			$sql_rs = $result = $this->query($sql);
			
			if(mysql_num_rows($result)>0){
			
				$theChildIds=array();
				while($temp = mysql_fetch_assoc($result))
				{	
				 $theChildIds[] = $temp['cat_id']; 
				}

				$theRs = implode(',',$theChildIds);
				if(!empty($theRs)){
				$theReturnString.=$theRs;
				$theReturnString.=",".$this->GetCategoryIdWhichComesInRsArr($theRs);
				}
			}	
		}
		return 	$theReturnString;
	}*/
	
	public function fetAllCats($cat=0,$level=1,$arrCats=array())
	{
		$sql="select * from ".parent::SUFFIX."category where parent_id='".$cat."' and cat_level='".$level."'";
		$res=mysql_query($sql);
		
		if(mysql_num_rows($res)>0)
		{
			while($row=mysql_fetch_assoc($res))
			{
				$arrSubCats=array();
				$arrCats[$row['cat_id']]['name']=$row['cat_name'];
				$arrCats[$row['cat_id']]['id']=$row['cat_id'];
				$arrCats[$row['cat_id']]['level']=$row['cat_level'];
				$arrCats[$row['cat_id']]['subcats']=$this->fetAllCats($row['cat_id'],$row['cat_level']+1,$arrSubCats);
			}
		}
		return $arrCats;
	}
	
	public function printMyValues($arrThe)
	{
		if(!isset($str)) $str="";
		foreach($arrThe as $theArr){
			if($theArr['level']>1)
			{
				$theStr="";
				for($i=0;$i<($theArr['level']*1);$i++)
				{
					$theStr.="-&nbsp;";
				}
				$theStr.=$theArr['name'];
			}
			else
			$theStr="-&nbsp;".$theArr['name'];
		
		$str.="<option value='".$theArr['id'].",".$theArr['level']."'>".$theStr."</option>";
		if(count($theArr['subcats'])>0)
		{
			$str.=$this->printMyValues($theArr['subcats']);
		}
		}
		return $str;
	}
	public function retrieve_data_from_table($table_name, $whereCnd='')
	{
	 	$query_string = "select * from ".parent::SUFFIX.$table_name.$whereCnd;						
		$this->result = $this->query($query_string);			
		if (!$this->result)
  		{
  			die('Could not select: ' . mysql_error());
  		}
		return $this->result ;
	}
	
}
?>