<?php
require_once dirname(__FILE__) . '/AbstractDB.php';
class Supplier extends AbstractDB
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
	public function numofrows()
	{
		$num=mysql_num_rows($this->result);
		return $num;
	}
	
	function getAdminPrefer($user_id)
	{
		$sql="select * from `".parent::SUFFIX."preferences` where user_id='".$user_id."'";	
		$this->result=$this->query($sql);
	}
	
	function addAdminPrefer($post)
	{
		if($post['contact_prefer'][0]!=''){$email = 1;}else{$email = 0;}
		if($post['contact_prefer'][1]!=''){$phone = 1;}else{$phone = 0;}
		if($post['contact_prefer'][2]!=''){$skype = 1;}else{$skype = 0;}
		if($post['cut_off']=='more_48'){
			$cut_off_val=$post['more_48_val']*24;
		}else{
			$cut_off_val=$post['cut_off'];
		}
		if($post['cancel']=="other")
		{
			$cancel_val=$post['noofcancelday']*24;	
		}else
		{
			$cancel_val=$post['cancel'];
		}
		$sql="insert into `".parent::SUFFIX."preferences` (`user_id`,`email`,`phone`,`skype`,`book`,`cut_off`,`cut_off_value`,`newbook`,`require`,`cancel`,`cancel_discription`)
	
		values
	 
		('".$post['user_id']."','".$email."','".$phone."','".$skype."','".$post['book']."','".$post['cut_off']."','".$cut_off_val."','".$post['newbook']."','".$post['require']."','".$cancel_val."','".$post['othertext']."')";
	
		$this->result=$this->query($sql);
	}
	
	function updateAdminPrefer($post)
	{
		if($post['contact_prefer'][0]!=''){$email = 1;}else{$email = 0;}
		if($post['contact_prefer'][1]!=''){$phone = 1;}else{$phone = 0;}
		if($post['contact_prefer'][2]!=''){$skype = 1;}else{$skype = 0;}
		if($post['cut_off']=='more_48'){
			$cut_off_val=$post['more_48_val']*24;
		}else{
			$cut_off_val=$post['cut_off'];
		}
		if($post['cancel']=='other')
		{
			$cancel_val=$post['noofcancelday']*24;	
		}else
		{
			$cancel_val=$post['cancel'];
		}
		 $sql="update `".parent::SUFFIX."preferences` set
		`email`='".$email."',
		`phone`='".$phone."',
		`skype`='".$skype."',
		`book`='".$post['book']."',
		`asgift`='".$post['asgift']."',
		`cut_off`='".$post['cut_off']."',
		`cut_off_value`='".$cut_off_val."',
		`newbook`='".$post['newbook']."',
		`require`='".$post['require']."',
		`cancel`='".$cancel_val."',
		`cancel_discription`='".$post['othertext']."' where `user_id`='".$post['user_id']."'";
		$this->result=$this->query($sql);
	}
}
?>