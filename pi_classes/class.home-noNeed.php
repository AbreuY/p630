<?php
require_once dirname(__FILE__) . '/AbstractDB.php';
class Home extends AbstractDB
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
				return true;
	       }	
		return false;
	}
	public function numrows()
	{
		return mysql_num_rows($this->result);
	}
	
	
}
?>