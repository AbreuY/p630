<?php
class email_template extends AbstractDB
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
			if($allFields){
				return $this->row;
			}
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
	
/** Functions for email_templates email_templates MANAGEMENT starts here **/
	// Function for Categories list 
	// Get email_templates customer list
	function getRecordList($select_field='',$whereCnd=''){
		if($select_field=='')
		{
			$select_field="*";
		}
		
		if($whereCnd!='')
		{
			$cnd="select ".$select_field." from ".parent::SUFFIX."mail_bodies where ".$whereCnd;			
		}
		else
		{
			$cnd="select ".$select_field." from ".parent::SUFFIX."mail_bodies  where 1";
		}
		$this->result=$this->query($cnd);
		return $this->result;
	}// End Function
	
	public function getRecordListPage($start, $limit,$sort, $type){
		if($type==''){
			$type="ASC";
		}
		if($sort==''){
			$sort='mail_subject  ';
		}	
		$cnd="select * from ".parent::SUFFIX."mail_bodies order by ".$sort." ".$type." limit $start,$limit";
		$this->result=$this->query($cnd);
		return $this->result;
	}// End Function
	
	function insertRecord($fields,$values)
	{		
		$insert_sql="INSERT INTO `".parent::SUFFIX."mail_bodies` ( ".$fields." ) VALUES (".$values.")";
		$cnf=$this->query($insert_sql);			
		return $cnf;
	}//End Function	
	
	function getRecordById($rec_id)
	{
		$sql="select * from ".parent::SUFFIX."mail_bodies where `mail_page_id`='".$rec_id."'";
		$this->result=$this->query($sql);
	}//End Function

	function deleteRecord($whereCnd)
	{		
		$cnf=$this->query("delete from ".parent::SUFFIX."mail_bodies where ".$whereCnd);	
		return $cnf;
	}//End Function	
	
	//Function to update email_templates
	function updateRecord($set_fields, $where_field)
	{
		$sql="UPDATE ".parent::SUFFIX."mail_bodies  SET ".$set_fields." where ".$where_field;		
		$cnf=$this->query($sql);
		return $cnf;
	}//End Function
	
	public function deleteEmailTemplate($tpl_id){
		$sql="DELETE FROM `".parent::SUFFIX."mail_bodies` WHERE `mail_id`='".base64_decode($tpl_id)."'";
		return $this->result=$this->query($sql);
	}

/** Functions for email_templates email_templates MANAGEMENT ends here **/
}
?>