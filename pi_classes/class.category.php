<?php
require_once dirname(__FILE__) . '/AbstractDB.php';
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
	

	// Function for Categories list 
	// Get category customer list
	function getRecordList($select_field='',$whereCnd=''){
		if($select_field=='')
		{
			$select_field="*";
		}
		
		if($whereCnd!='')
		{
			$cnd="select ".$select_field." from ".parent::SUFFIX."category where ".$whereCnd;			
		}
		else
		{
			$cnd="select ".$select_field." from ".parent::SUFFIX."category where 1";
		}
		$this->result=$this->query($cnd);
		return $this->result;
	}// End Function
	
	//Funtion to get category list of supplier
	
	//end of funtion
	
	// Get continent list
	function getRecordListContinent($select_field='',$whereCnd=''){
		if($select_field=='')
		{
			$select_field="*";
		}
		
		if($whereCnd!='')
		{
			$cnd="select ".$select_field." from ".parent::SUFFIX."continent where ".$whereCnd;			
		}
		else
		{
			$cnd="select ".$select_field." from ".parent::SUFFIX."continent where 1";
		}
		
		$this->result=$this->query($cnd);
		return $this->result;
	}// End Function
	
	function insertRecord($fields,$values)
	{		
		$insert_sql="INSERT INTO `".parent::SUFFIX."category` ( ".$fields." ) VALUES (".$values.")";
		$cnf=$this->query($insert_sql);			
		return $cnf;
	}//End Function	
	
	//function to insert sub category record
	function insertSubCatDetails($fields,$values)
	{
		$insert_sql="insert into `".parent::SUFFIX."subcategory` (".$fields.") VALUES (".$values.")";
		$cnt=$this->query($insert_sql);
			return cnf;
			
	}//end funtion
	
	function getRecordById($rec_id)
	{
		$this->result=$this->query("select * from ".parent::SUFFIX."category where `cat_id`='".$rec_id."'");
		$rs=$this->getRow();
		return $rs;
	}//End Function

	function deleteRecord($whereCnd)
	{		
		//echo "delete from ".parent::SUFFIX."category where ".$whereCnd; exit;
		$cnf=$this->query("delete from ".parent::SUFFIX."category where ".$whereCnd);	
		$cnf=$this->query("delete from ".parent::SUFFIX."state where ".$whereCnd);
		// Delete entries from customer form details
		return $cnf;
	}//End Function	
	
	//Function to update category
	function updateRecord($set_fields, $where_field)
	{
		//fde "UPDATE ".parent::SUFFIX."category SET ".$set_fields." where id='".$update_id."'";
		$cnf=$this->query("UPDATE ".parent::SUFFIX."category SET ".$set_fields." where ".$where_field);
		return $cnf;
	}//End Function

	//function to retrive category id according to suuplier
	
	function getCatgoryString($supplier_id)
	{
		$sql="select * from ".parent::SUFFIX."supplier_details where user_id='".$supplier_id."'";
		$this->result=$this->query($sql);
		return $this->result;
	}	
	
	function getCategoryBySupp($category)
	{
		$sql="select * from ".parent::SUFFIX."category where cat_id in(".$category.")";
		$this->result=$this->query($sql);
		return $this->result;
	}
	
	function chkSubCategoryName($subcatname,$cat_id)
	{
		$sql="select * from ".parent::SUFFIX."subcategory where `sub_cat_name`='".$subcatname."' and `cat_id`='".$cat_id."'";
		$this->result=$this->query($sql);
		
	}
	
	//function to delete subcategory
	
	function deleteSubCatDetails($subcatid)
	{
		$sql="delete from `".parent::SUFFIX."subcategory` where `sub_cat_id`='".$subcatid."'";
		$this->result=$this->query($sql);
	}
	
	function getAllSubCatDtl()
	{
		$sql="select * from `".parent::SUFFIX."subcategory`";
		$this->result=$this->query($sql);
	}
	
	public function getAllSubCatDtlPage($start, $limit,$sort, $type){
		if($type==''){
			$type="ASC";
		}
		if($sort==''){
			$sort='sub_cat_id';
		}		
		$sql="select a.*,b.cat_name from `".parent::SUFFIX."subcategory` a left join `".parent::SUFFIX."category` b on (a.cat_id=b.cat_id) order by ". $sort ." ".$type." LIMIT $start, $limit";
		$this->result=$this->query($sql);
	}	
	
	function getSubCatSpecificRecordList($select_field='',$whereCnd=''){
		if($select_field=='')
		{
			$select_field="*";
		}
		
		if($whereCnd!='')
		{
			$cnd="select ".$select_field." from ".parent::SUFFIX."subcategory where ".$whereCnd;			
		}
		else
		{
			$cnd="select ".$select_field." from ".parent::SUFFIX."subcategory where 1";
		}
		$this->result=$this->query($cnd);
		return $this->result;
	}// End Functionc
	
	function updateSubCatSpecificRecord($set_fields, $where_field)
	{
		$sql="UPDATE ".parent::SUFFIX."subcategory SET ".$set_fields." where ".$where_field;
		$cnf=$this->query($sql);
		return $cnf;
	}//End Function
/** Functions for category category MANAGEMENT ends here **/


		// Get feedback  category for supplie acount
	function getFbCatRecordList($select_field='',$whereCnd=''){
		if($select_field=='')
		{
			$select_field="*";
		}
		
		if($whereCnd!='')
		{
			$cnd="select ".$select_field." from ".parent::SUFFIX."feedback_category where ".$whereCnd;			
		}
		else
		{
			$cnd="select ".$select_field." from ".parent::SUFFIX."feedback_category where 1";
		}
		$this->result=$this->query($cnd);
		return $this->result;
	}// End Function


}

?>