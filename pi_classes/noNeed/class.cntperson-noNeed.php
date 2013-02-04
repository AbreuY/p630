<?php
class cntperson extends AbstractDB
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
	// Get country customer list
	function getRecordList($select_field='',$whereCnd=''){
		if($select_field=='')
		{
			$select_field="*";
		}
		
		if($whereCnd!='')
		{
			$cnd="select ".$select_field." from ".parent::SUFFIX."contact_person where ".$whereCnd;			
		}
		else
		{
			$cnd="select ".$select_field." from ".parent::SUFFIX."contact_person where status='1'";
		}
		$this->result=$this->query($cnd);
		return $this->result;
	}// End Function
	
	function insertRecord($fields,$values)
	{		
		$insert_sql="INSERT INTO `".parent::SUFFIX."country` ( ".$fields." ) VALUES (".$values.")";
		$cnf=$this->query($insert_sql);			
		return $cnf;
	}//End Function	
	
	function getRecordById($rec_id)
	{
		$this->result=$this->query("select * from ".parent::SUFFIX."country where `country_id`='".$rec_id."'");
		$rs=$this->getRow();
		return $rs;
	}//End Function

	function deleteRecord($whereCnd)
	{		
		//echo "delete from ".parent::SUFFIX."country where ".$whereCnd; exit;
		$cnf=$this->query("delete from ".parent::SUFFIX."country where ".$whereCnd);	
		$cnf=$this->query("delete from ".parent::SUFFIX."state where ".$whereCnd);
		// Delete entries from customer form details
		return $cnf;
	}//End Function	
	
	//Function to update country
	function updateRecord($set_fields, $where_field)
	{
		//echo "UPDATE ".parent::SUFFIX."country SET ".$set_fields." where id='".$update_id."'";
		$cnf=$this->query("UPDATE ".parent::SUFFIX."country SET ".$set_fields." where ".$where_field);
		return $cnf;
	}//End Function

/** Functions for country country MANAGEMENT ends here **/
}

?>