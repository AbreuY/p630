<?php
class languageTranslation extends AbstractDB
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
	}	/* Following Functions are added by SJ on 31 May 2011 start*/	public function getRow($allFields='')	{ 	 	while($this->row = mysql_fetch_assoc($this->result))		{			if($allFields)				return $this->row;			else			 	return true;		}		 return false;   	}
	public function numofrows()	{		$num=mysql_num_rows($this->result);		return $num;	}	// Function for get Count row		public function getCount()	{		$number = mysql_num_rows($this->result); 		return $number;	}	public function fetchWord($langid,$wordid)	{		$this->result=$this->query("select * from ".parent::SUFFIX."lang_dictionary where `lang_id`='".$langid."' and word='".$wordid."'");		$rs=$this->getRow();		return $this->getField('value');	}//End Function
	function insertRecord($fields,$values)	{				$insert_sql="INSERT INTO `".parent::SUFFIX."lang_dictionary` ( ".$fields." ) VALUES (".$values.")";		$cnf=$this->query($insert_sql);					return $cnf;	}//End Function	/** Functions for country country MANAGEMENT ends here **/}?>