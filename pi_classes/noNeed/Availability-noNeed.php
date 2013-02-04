<?php
require_once dirname(__FILE__) . '/AbstractDB.php';
class Availability extends AbstractDB
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
	
	function getSubActivityDtlBySupp($user_id)
	{
		$sql="SELECT * FROM `".parent::SUFFIX."booker_activities` where `user_id`=".$user_id;
		$this->result=$this->query($sql);
	}
}
?>