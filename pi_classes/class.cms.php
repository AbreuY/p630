<?php
class cms extends AbstractDB
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
	
	public function getRow()
	{ 
	 	while($this->row = mysql_fetch_assoc($this->result))
		{
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

//	//function to get CMS Details
//	function getCMSContents($page)
//	{
//		$this->result =$this->query( "select * from ".parent::SUFFIX."cms where page_name = '".$page."'");
//		return $this->result;
//	}//End Function
	
	
		//function to get CMS Details
	function getCMSContents($page)
	{
		$this->result =$this->query( "select * from ".parent::SUFFIX."cms where page_name = '".$page."'");
		return $this->result;
	}//End Function


	//function to insert CMS Details
	function insertCMSContents($page,$content){
		$content=addslashes($content);
		$cnf = $this->query("INSERT INTO `".parent::SUFFIX."cms` VALUES('','".$page."','".$content."')");
		return $cnf;
	}//End Function
	
	//function to update CMS Details
	function updateCMSContents($page,$content){
		$content=addslashes($content);
		$sql="update `".parent::SUFFIX."cms` set `content` = '".$content."' where page_name = '".$page."'";
		$this->result=$this->query($sql);
		
	}//End Function
	
	
	function getRecordList($select_field='',$whereCnd=''){
		if($select_field=='')
		{
			$select_field="*";
		}
		
		if($whereCnd!='')
		{
			$cnd="select ".$select_field." from ".parent::SUFFIX."cms where ".$whereCnd;			
		}
		else
		{
			$cnd="select ".$select_field." from ".parent::SUFFIX."cms where 1";
		}
		//echo "<br/>".$cnd;
		$this->result=$this->query($cnd);
		return $this->result;
	}// End Function
	
	
	
		
	public function getBoxcontent()
	{
		$sql="select * from `".parent::SUFFIX."box_text`";
		return $this->result=$this->query($sql);
	}
			
	public function getBox($page)
	{
		$sql="select * from `".parent::SUFFIX."box_text` where box_name = '".$page."'";
		return $this->result=$this->query($sql);
	}
	
	function updateBoxContents($page,$content)
	{
		$content=addslashes($content);
		$sql="update `".parent::SUFFIX."box_text` set `content` = '".$content."' where box_name = '".$page."'";
		$this->result=$this->query($sql);
		
	}//End Function
	
}
?>