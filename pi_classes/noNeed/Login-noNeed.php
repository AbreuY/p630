<?php
require_once dirname(__FILE__) . '/AbstractDB.php';
require_once dirname(__FILE__) .'/mail_class.php';

class Login extends AbstractDB
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
	public function numofrows()
	{
		$num=mysql_num_rows($this->result);
		return $num;
	}
	
	public function checkHeaderLoginDetails($arr){
		//$sql="select u.username, u.password,u.email, u.first_name,u.last_name,u.user_id,u.user_type,u.user_status,c.company_name,c.mn_contact_name from ".parent::SUFFIX."user_details as u inner join ".parent::SUFFIX."supplier_details as c on u.user_id = c.user_id where email='".stripslashes($arr['header_usre_name'])."' and password='".base64_encode($arr['password'])."'";
		$sql="select u.username, u.password,u.email, u.first_name,u.last_name,u.user_id,u.user_type,u.user_status from ".parent::SUFFIX."user_details as u where email='".stripslashes($arr['header_usre_name'])."' and password='".base64_encode($arr['password'])."'";
		$this->result=$this->query($sql);
		$this->update_loginDate($arr['header_usre_name']);
	}
	
	public function checkLoginDetails($arr){
		$sql="select username, password,email, first_name,last_name,user_id,user_type,user_status from ".parent::SUFFIX."user_details where `email`='".stripslashes($arr['email'])."' and password='".base64_encode($arr['password'])."' and user_type='C'"; 
		$this->result=$this->query($sql);
		$this->update_loginDate($arr['email']);
	}
	
	public function checkSupplierLoginDetails($arr){
		/*$sql="select u.username, u.password,u.email, u.first_name,u.last_name,u.user_id,u.user_type,u.user_status,c.company_name,c.mn_contact_name from ".parent::SUFFIX."user_details as u inner join ".parent::SUFFIX."supplier_details as c on u.user_id = c.user_id where email='".stripslashes($arr['email'])."' and password='".base64_encode($arr['password'])."' and user_type='S'";*/
		$sql="select u.username, u.password,u.email, u.first_name,u.last_name,u.user_id,u.user_type,u.user_status from ".parent::SUFFIX."user_details as u where email='".stripslashes($arr['email'])."' and password='".base64_encode($arr['password'])."' and user_type='S'";
		$this->result=$this->query($sql);
		$this->update_loginDate($arr['email']);
	}
		
	public function sendForgotPassword($arr){
		$sql="select username, password,email, first_name,last_name,user_id,user_type,user_status from ".parent::SUFFIX."user_details where email='".stripslashes($arr['email'])."'";
		$this->result=$this->query($sql);
	}
	
	public function update_loginDate($email)
	{
	  	$str="UPDATE ".parent::SUFFIX."user_details SET `last_login`='".date('Y-m-d H:i:s')."', `online_login_time`='".date('Y-m-d H:i:s')."', `is_online`='yes' WHERE `email`='".$email."'";
		$result=$this->query($str);
	}
		
	public function sendForgotPassMail($email)
	{
		/**************************Email Templets**************************/
		$obj_mail=new mail_class();
        $obj_mail->forgotten_password($email);
		/**************************Email Templets**************************/
	}
	
}
?>