<?php
require_once dirname(__FILE__) . '/AbstractDB.php';

class Comman extends AbstractDB
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
			return $this->row;
	       }	
		return false;
	}
	

	public function getRow1($allFields='')
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
		if($this->row = mysql_fetch_assoc($this->result))
		   {
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
	
	public function GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField){
		$sql="SELECT ".$setColoumFields." FROM ".parent::SUFFIX.$tableName." where ".$whereField."";
		$this->result=$this->query($sql);
	}
 
	public function INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values)
	{		
		$sql ="INSERT INTO ".parent::SUFFIX.$tableName."(".$fields.") VALUES(".$values.")";		
		$cnf=$this->query($sql);
		$ins_id=mysql_insert_id();		
		return $ins_id;
	}

	public function UPDATE_ANYRECORD_IN_TABLE($tableName,$set_fields,$where_field)
	{
		$updt_sql="UPDATE ".parent::SUFFIX.$tableName." SET ".$set_fields." where ".$where_field; 
		return $this->result=$this->query($updt_sql);
	}
	
	public function DELETE_ANYRECORD_FROM_TABLE($tableName,$where_field)
	{
		$delt_sql="DELETE FROM ".parent::SUFFIX.$tableName." where ".$where_field;
		return $this->result=$this->query($delt_sql);
	}
	
	#UserRegist~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~:
	public function GET_USER_DETAILS($setColoumFields,$whereField){
		$sql="SELECT ".$setColoumFields." FROM ".parent::SUFFIX."user_details where ".$whereField."";
		$this->result=$this->query($sql);
	}
	
	#GetAllCountryTable---------------------------------------------------------------------------------------------------------------:
	public function getAllCountry(){
		$sql="select * from `".parent::SUFFIX."country` where 1";
		$this->result=$this->query($sql);
	}
	
	#AdvisorPoint~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~:
	public function GET_ADVISOR_DETAILS($setColoumFields,$whereField){
		$sql="SELECT ".$setColoumFields." FROM ".parent::SUFFIX."advisor_details where ".$whereField."";
		$this->result=$this->query($sql);
	}
	
	#Language---------------------------------------------------------------------------------------------------------------:
	public function getLanguageDetails(){
		$sql="SELECT * FROM `".parent::SUFFIX."language` where 1 ";
		$this->result=$this->query($sql);
	}
	
	#GlobalInfo---------------------------------------------------------------------------------------------------------------:
	public function GET_GLOBAL_DETAILS()
	{
		return $this->result=$this->query("select * from ".parent::SUFFIX."global_setting");
	}
	
}//End of class


?>
