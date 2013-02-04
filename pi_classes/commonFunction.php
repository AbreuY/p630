<?php
/** This class fetches common global data for the site link SITE_TITLE, SITE_EMAIL**/
//ob_start();
//session_start();
class GlobalData extends AbstractDB
{
	// Definitions
	private
		$result;
	public function __construct()
	{
			parent::__construct();
			$this->result = NULL;
			return true;
	}
	
	public function getRow()
    { 
	    while($this->row=mysql_fetch_assoc($this->result))
		{
		    return $this->row;
		}
		return false;   
	}
	
	public function passwdGen($length = 8)
	{
		$str = 'abcdefghijkmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		for ($i = 0, $passwd = ''; $i < $length; $i++)
			$passwd .= self::substr($str, mt_rand(0, self::strlen($str) - 1), 1);
		return $passwd;
	}
	
	public function substr($str, $start, $length = false, $encoding = 'utf-8')
	{
		if (is_array($str))
			return false;
		if (function_exists('mb_substr'))
			return mb_substr($str, (int)($start), ($length === false ? self::strlen($str) : (int)($length)), $encoding);
		return substr($str, $start, ($length === false ? self::strlen($str) : (int)($length)));
	}
	
	public function strlen($str, $encoding = 'UTF-8')
	{
		if (is_array($str))
			return false;
		$str = html_entity_decode($str, ENT_COMPAT, 'UTF-8');
		if (function_exists('mb_strlen'))
			return mb_strlen($str, $encoding);
		return strlen($str);
	}
	
	function getGlobalDataList()
	{
		$cnd="select * from ".parent::SUFFIX."global_setting where 1";
		$this->result=$this->query($cnd);
		return $this->result;
	}
	// End Function

} 
// Fetch Global variables here and use their values as constants throught the site
define("SITE_PATH",AbstractDB::SITE_PATH);
define("SITE_ABS_PATH",AbstractDB::SITE_ABS_PATH);

function chkAdminLogin()
{
	if(empty($_SESSION['admin_id']))
	{		
		header("location:".SITE_PATH."administrator/index.php");
		exit;
	}
}

#CheckUserLogin:
function checkUserSession($userId)
{
	if(!isset($userId)){		
		header("location:".site_path."login");
	}
}

#CheckAdvisorLogin:
function checkUserTypeLogSession($userType)
{
	if(strcmp($userType,"Advisor")==0){		
		header("location:".site_path."advisor-dashboard");
	}elseif(strcmp($userType,"User")==0){
		header("location:".site_path."user-dashboard");		
	}
}


#CheckAdvisorLogin:
function checkAdvisorSession($advisorId)
{
	if(!isset($advisorId)){		
		header("location:".site_path."login");
	}
}


function ifUserLoggedIn($sessionUserid)
{
	if(isset($sessionUserid))
	{		
		header("location:".SITE_PATH);
	}
}

function chkAdvIALogin()
{
	if(empty($_SESSION['advisor_id_IA']))
	{		
		header("location:".SITE_PATH."login");
		exit;
	}
}
?>