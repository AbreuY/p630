<?
class newsletter extends AbstractDB
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
	
/** Functions for newsletter newsletter MANAGEMENT starts here **/

	// Function for Categories list 
	// Get newsletter customer list
	public function getRecordList($select_field='',$whereCnd=''){
		if($select_field=='')
		{
			$select_field="*";
		}
		
		if($whereCnd!='')
		{
			$cnd="select ".$select_field." from ".parent::SUFFIX."newsletter where ".$whereCnd;			
		}
		else
		{
			$cnd="select ".$select_field." from ".parent::SUFFIX."newsletter where 1";
		}
		///echo "<br/>".$cnd;
		$this->result=$this->query($cnd);
		return $this->result;
	}// End Function
	
	function insertRecord($fields,$values)
	{		
		$insert_sql="INSERT INTO `".parent::SUFFIX."newsletter` ( ".$fields." ) VALUES (".$values.")";
		$cnf=$this->query($insert_sql);			
		return $cnf;
	}//End Function	
	
	function getRecordById($rec_id)
	{
		$this->result=$this->query("select * from ".parent::SUFFIX."newsletter where `id`='".$rec_id."'");
		$rs=$this->getRow();
		return $rs;
	}//End Function

	function deleteRecord($whereCnd)
	{		
		//echo "delete from ".parent::SUFFIX."newsletter where ".$whereCnd; exit;
		$cnf=$this->query("delete from ".parent::SUFFIX."newsletter where ".$whereCnd);	
		// Delete entries from customer form details
		return $cnf;
	}//End Function	
	
	//Function to update newsletter
	function updateRecord($set_fields, $where_field)
	{
		//echo "UPDATE ".parent::SUFFIX."newsletter SET ".$set_fields." where id='".$update_id."'";
		$cnf=$this->query("UPDATE ".parent::SUFFIX."newsletter SET ".$set_fields." where ".$where_field);
		return $cnf;
	}//End Function

/** Functions for newsletter newsletter MANAGEMENT ends here **/
}

?>