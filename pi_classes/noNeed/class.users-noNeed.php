<?php
require_once dirname(__FILE__) . '/AbstractDB.php';
class users extends AbstractDB
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
	
	public function deleteUserDetails($emp_id){
		
		$sql="DELETE FROM `".parent::SUFFIX."user_details` WHERE `userid`='".$emp_id."'";
		//print_r($sql);
		$this->result=$this->query($sql);
	}
	
	public function getRowAllFields()
	{ 
	 	while($this->row = mysql_fetch_assoc($this->result))
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
	
	// Function for get Count row	
	function getCount()
	{
		$number = mysql_num_rows($this->result); 
		return $number;
	}

	function customQuery($query){	
		$this->result=$this->query($query);
		return $this->result;
	}// End Function
	
	function insertRecord($fields,$values)
	{		
		$insert_sql="INSERT INTO `".parent::SUFFIX."user_details` ( ".$fields." ) VALUES (".$values.")";
		$cnf=$this->query($insert_sql);			
		return $cnf;
	}//End Function	

	// Get Insurance customer list
	function getRecordList($whereCnd=''){
		if($whereCnd!='')
		{
			$cnd="select * from ".parent::SUFFIX."user_details where ".$whereCnd;			
		}
		else
		{
			$cnd="select * from ".parent::SUFFIX."user_details where 1";
		}
//		echo "<br/>".$cnd;
//		exit;
		$this->result=$this->query($cnd);
		return $this->result;
	}// End Function
	
	function getFakeRecordList($whereCnd=''){
		if($whereCnd!='')
		{
			$cnd="select * from ".parent::SUFFIX."fake_users where ".$whereCnd;			
		}
		else
		{
			$cnd="select * from ".parent::SUFFIX."fake_users where 1";
		}
//		echo "<br/>".$cnd;
//		exit;
		$this->result=$this->query($cnd);
		return $this->result;
	}// End Function
	
	//Get Insurance customer List with Paging
	function getRecordListPaging($query){
		$this->result=$this->query("select * from ".parent::SUFFIX."user_details where 1".$query);
		return $this->result;
	}// End Function
	
	
	//Function to delete category
	function deleteRecord($delete_id)
	{
		$cnf=$this->query("delete from ".parent::SUFFIX."user_details where userid='".$delete_id."'");	
		return $cnf;
	}//End Function	
	
	function updateStatus($status, $update_id)
	{
//		echo "UPDATE ".parent::SUFFIX."user_details set `user_status`='".$status."' where userid='".$update_id."'"; //exit;
		$cnf=$this->query("UPDATE ".parent::SUFFIX."user_details set `user_status`='".$status."' where userid='".$update_id."'");	
		return $cnf;
	}//End Function	
	function updateNewsLetterStatus($status, $update_id)
	{
//		echo "UPDATE ".parent::SUFFIX."user_details set `user_status`='".$status."' where userid='".$update_id."'"; //exit;

		$cnf=$this->query("UPDATE ".parent::SUFFIX."user_details set `receive_bidder_email`='".$status."' where userid='".$update_id."'");	
		return $cnf;
	}//End Function	
	function updateStyleNotesStatus($status, $update_id)
	{
//		echo "UPDATE ".parent::SUFFIX."user_details set `user_status`='".$status."' where userid='".$update_id."'"; //exit;

		$cnf=$this->query("UPDATE ".parent::SUFFIX."user_details set `style_notes`='".$status."' where userid='".$update_id."'");	
		return $cnf;
	}//End Function	
	
	function updateUpcomingStatus($status, $update_id)
	{
//		echo "UPDATE ".parent::SUFFIX."user_details set `user_status`='".$status."' where userid='".$update_id."'"; //exit;

		$cnf=$this->query("UPDATE ".parent::SUFFIX."user_details set `upcoming_auctions`='".$status."' where userid='".$update_id."'");	
		return $cnf;
	}//End Function	
	function updateUserCreditBid($user_id, $add_bid_cnt)
	{
		$this->result=$this->query("select `total_credit_bal` from ".parent::SUFFIX."user_details where userid='".$user_id."'");
		$rs=$this->getRow();	

		$bid_cnt=$this->getField('total_credit_bal');
		$total_credit_bal=$bid_cnt+$add_bid_cnt;
		if($_SESSION['user_total_no_of_bids']!='')
		{
			$_SESSION['user_total_no_of_bids']=$total_credit_bal;
		}
//		echo "UPDATE ".parent::SUFFIX."user_details set `total_credit_bal`='".$total_credit_bal."' where userid='".$user_id."'";
		$cnf=$this->query("UPDATE ".parent::SUFFIX."user_details set `total_credit_bal`='".$total_credit_bal."' where userid='".$user_id."'");	
		return $cnf;
	}//End Function	
	
	
	function getRecordById($rec_id)
	{
		//echo "select * from ".parent::SUFFIX."user_details where userid='".$rec_id."'";
		$this->result=$this->query("select * from ".parent::SUFFIX."user_details where userid='".$rec_id."'");
		$rs=$this->getRow();
		return $rs;
	}//End Function
	

	//Function to fetch record by using email address
	function getRecordByEmailPassID($email_id,$password)
	{
		$this->result=$this->query("select * from ".parent::SUFFIX."user_details where email='".$email_id."' and password = '".$password."'");
		$rs=$this->getRow();
		return $rs;
	}//End Function
	
	//Function to fetch record by using email address
	function getRecordByUsername($username,$password)
	{
		$this->result=$this->query("select * from ".parent::SUFFIX."user_details where username='".$username."' and password = '".$password."' and status='active'");
		$rs=$this->getRow();
		return $rs;
	}//End Function

	function getRecordByEmail($email)
	{
//		echo "select * from ".parent::SUFFIX."user_details where email='".$email."' and user_status='Active'"
		$this->result=$this->query("select * from ".parent::SUFFIX."user_details where email='".$email."' and user_status='Active'");
		$num=$this->getCount();
		if($num==1){
			$rs=$this->getRow();
			return $rs;
		}
		else{
			return "fail";
		}
	}//End Function to get Homeowner record by Email id only


		//Function to update category
	function updateRecord($set_fields, $where_field)
	{
		//echo "<br/>UPDATE ".parent::SUFFIX."user_details SET ".$set_fields." where ".$where_field;
		$cnf=$this->query("UPDATE ".parent::SUFFIX."user_details SET ".$set_fields." where ".$where_field);
//		echo $cnf;exit;
		//exit;
		return $cnf;
	}//End Function
	
	function updateFakeRecord($set_fields, $where_field)
	{

		//echo "<br/>UPDATE ".parent::SUFFIX."user_details SET ".$set_fields." where ".$where_field;
		$cnf=$this->query("UPDATE ".parent::SUFFIX."fake_users SET ".$set_fields." where ".$where_field);
//		echo $cnf;exit;
		//exit;
		return $cnf;
	}//End Function
	function insertFakeRecord($set_fields)
	{
		$cnf=$this->query("INSERT INTO ".parent::SUFFIX."fake_users ".$set_fields);
		
		return mysql_insert_id();
	}//End Function
	function deleteFakeRecord($theId)
	{
		$cnf=$this->query("DELETE FROM ".parent::SUFFIX."fake_users where fid='".$theId."'");
	}//End Function
	public function get_email_template($template_name)
	{
		$email_templates	=	"SELECT * from ".parent::SUFFIX."email_templates where temp_name='".$template_name."'";
		$this->result	=	$this->query($email_templates);
	}
	//Ends
	
	function custom_send_email($to,$from,$temp_name,$var_array)
	{
		$email_templates	=	"SELECT * from ".parent::SUFFIX."email_templates where temp_name='".$temp_name."'";
		$this->result		=	$this->query($email_templates);		
	
		$num_rows	=	$this->numofrows();
		
		if($num_rows > 0)
		{
			$this->getRow();
			
			$temp_name	=	$this->getField('temp_name');
			$temp_subject	=	$this->getField('temp_subject');
			$temp_message	=	$this->getField('temp_message');
				
			$to	=	$to;
		
			
			$sub=$temp_subject;
						
		//	$site_from=str_replace(" ","",ucwords(SITE_TITLE))." <".trim(SITE_EMAIL).">";
			
			$site_from=ucwords(SITE_TITLE)." <".trim(SITE_EMAIL).">";
			
			$headers='';
			
			$headers="MIME-Version: 1.0\r\n";

			$headers.='From: '.$site_from."\r\n";
			
			
			if(strcmp($_SESSION['bid']['paymentMethod'],"credit")==0){				
		    	if(strcmp($temp_name,"Receipt for the purchase")==0)
			    {	 
	     //	   $headers .= 'Bcc: ajay@panaceatek.com'."\r\n";
			   $headers .= 'Bcc: billingreceipts@runwaybidder.com'."\r\n";
	    		}			
			}			
			$headers.='Reply-To: '.$site_from."\r\n"; 			
			$headers.="Content-type: text/html; charset=utf-8\r\n"; 
			$headers.="X-Priority: 3\r\n"; 
			$headers.="X-Mailer: PHP/".phpversion()."\r\n";									  			
			$message=$temp_message;
			foreach($var_array as $k=>$v)
			{
				if($k=="|FREE_BID_POINTS|" && $v<1) $message=str_replace("+  |FREE_BID_POINTS| free bids","",$message);
				
				$message=str_replace("$k","$v",$message);
				$sub=str_replace("$k","$v",$sub);
			}		
			
			$ret=mail($to,$sub,$message,$headers);
		}
	}
	
	function custom_send_email_to_multiple_user($to_array,$from,$temp_name,$var_array)
	{
		$email_templates	=	"SELECT * from ".parent::SUFFIX."email_templates where temp_name='".$temp_name."'";
		$this->result	=	$this->query($email_templates);		
	
		$num_rows	=	$this->numofrows();
		
		if($num_rows > 0)
		{
			$this->getRow();
			
			$temp_name	=	$this->getField('temp_name');
			$temp_subject	=	$this->getField('temp_subject');
			$temp_message	=	$this->getField('temp_message');
				
			$to	=	$to;
			$sub 	= $temp_subject;
						
		//	$site_from=str_replace(" ","",ucwords(SITE_TITLE))." <".trim(SITE_EMAIL).">";
			
			$site_from=ucwords(SITE_TITLE)." <".trim(SITE_EMAIL).">";
			
			$headers='';
			
			$headers="MIME-Version: 1.0\r\n";
			$headers.='From: '.$site_from."\r\n";
			$headers.='Reply-To: '.$site_from."\r\n"; 
			
			$headers.="Content-type: text/html; charset=utf-8\r\n"; 
			$headers.="X-Priority: 3\r\n"; 
			$headers.="X-Mailer: PHP/".phpversion()."\r\n";						
			  			
			$message=$temp_message;
			foreach($var_array as $k=>$v)
			{
				$message=str_replace("$k","$v",$message);
				$message_temp=$message;
				$sub=str_replace("$k","$v",$sub);
				$sub_temp=$sub;
			}		
			
			
			for($i=0;$i<count($to_array);$i++)
			{
				$message=str_replace("|USER_NAME|",$to_array[$i]['firstname'],$message);
				$sub=str_replace("|USER_NAME|",$to_array[$i]['firstname'],$sub);
				$to=$to_array[$i]['email'];
				//echo "<br/>".$to.$to_array[$i]['firstname'];
				//echo "<br/>".$message;					
				mail($to,$sub,$message,$headers);
				$message=$message_temp;			
				$sub=$sub_temp;
			}					
		}
	}
	
	// Get Template Format for sending notification to user about successful registration
	public function accnt_verificn_email_temp()
	{
		$email_templates	=	"SELECT * from ".parent::SUFFIX."email_templates where temp_name='Registration success email'";
		$this->result	=	$this->query($email_templates);
	}
	//Ends
	
	public function password_reset_email()
	{
		$email_templates	=	"SELECT * from ".parent::SUFFIX."email_templates where temp_name='Forgot Password'";
		$this->result	=	$this->query($email_templates);
	}

	public function item_relist_email()
	{
		$email_templates	=	"SELECT * from ".parent::SUFFIX."email_templates where temp_name='Wish List Item Relist Notification'";
		$this->result	=	$this->query($email_templates);
	}
	
	public function upcoming_auctions_email()
	{
		$email_templates	=	"SELECT * from ".parent::SUFFIX."email_templates where temp_name='Upcoming Auction Notification'";
		$this->result	=	$this->query($email_templates);
	}
	
	public function birthday_coupon_email()
	{
		$email_templates	=	"SELECT * from ".parent::SUFFIX."email_templates where temp_name='Birthday Coupon Notification'";
		$this->result	=	$this->query($email_templates);
	}

/*function to get online users*/
		public function getOnlineusers(){
			$onlinestatus=('Y');
			$result=$this->query(" SELECT * FROM ".parent::SUFFIX."user_details where online='$onlinestatus'");
	 		return $result;
		}
		/*function to get online users end*/
		/*function to get suspended users*/
		public function getSuspendedusers(){
			$suspend=('Y');
			$result=$this->query(" SELECT * FROM ".parent::SUFFIX."user_details where suspend='$suspend'");
	 		return $result;
		}
		/*function to get suspended users end*/
		/*function to get Block users*/
		public function getBlockedusers(){
			$blocked=('Y');
			$result=$this->query(" SELECT * FROM ".parent::SUFFIX."user_details where blocked='$blocked'");
	 		return $result;
		}
		/*function to get Block users end*/
		
		public function getallUserinfo($limit,$offset,$criteria,$orderby,$param){
				
			if($param=='')
				{
					$param='asc';
				}

			if($orderby=='')
			{
			$orderby='userid';
			}
				
			if($criteria!=''){
				$que ="SELECT * FROM ".parent::SUFFIX."user_details where (email LIKE '%$criteria%' OR firstname LIKE '%$criteria%' OR lastname LIKE '%$criteria%') order by ".$orderby." ".$param." limit $offset,$limit  ";
				//$this->result=$this->query("SELECT * FROM ".parent::SUFFIX."user_details where (username LIKE '%$criteria%' OR email LIKE '%$criteria%' OR fname LIKE '%$criteria%' OR lname LIKE '%$criteria%') and user_dummy='N' order by ".$orderby." ".$param." limit $offset,$limit  ");	
			}		
			else{				
				$que ="SELECT * FROM ".parent::SUFFIX."user_details where 1 order by ".$orderby." ".$param." limit $offset,$limit ";							
			}	
			//echo $que;
			$this->result=$this->query($que);
		}
		
		public function getallFakeUserinfo($limit,$offset,$criteria,$orderby,$param){
				
			if($param=='')
				{
					$param='asc';
				}

			if($orderby=='')
			{
			$orderby='fid';
			}
				
			if($criteria!=''){
				$que ="SELECT * FROM ".parent::SUFFIX."fake_users where (first_name LIKE '%$criteria%' OR last_name LIKE '%$criteria%') order by ".$orderby." ".$param." limit $offset,$limit  ";
				//$this->result=$this->query("SELECT * FROM ".parent::SUFFIX."user_details where (username LIKE '%$criteria%' OR email LIKE '%$criteria%' OR fname LIKE '%$criteria%' OR lname LIKE '%$criteria%') and user_dummy='N' order by ".$orderby." ".$param." limit $offset,$limit  ");	
			}		
			else{				
				$que ="SELECT * FROM ".parent::SUFFIX."fake_users where 1 order by ".$orderby." ".$param." limit $offset,$limit ";							
			}	
			//echo $que;
			$this->result=$this->query($que);
		}
		
	function inviteFriend($arr)
    {

        $plugin=$arr['provider_box'];
		$username=$arr['email_box']."@".$arr['provider_box'].".com";
		$password=$arr['password_box'];
		
		require_once('OpenInviter/openinviter.php');

	    $oi = new OpenInviter();

        $tesp=$oi->startPlugin($plugin,true);
		if($tesp)
		{

          $oi->login($username,$password);			
          $data =  $oi->getMyContacts();
		}
		else
		{
	    	$data=false;
		}
       	return $data;
    }
	
	function insertAffiliateCampaign($fields,$values)
	{		
		$insert_sql="INSERT INTO `".parent::SUFFIX."affiliate_key` ( ".$fields." ) VALUES (".$values.")";
		$cnf=$this->query($insert_sql);			
		return $cnf;
	}//End Function	
	
	function getAffiliateCampaignList($selectField, $whereField, $returnArray=false)
	{
		if($whereField=='')
		{
			$whereField=1;
		}
		
		if($selectField=='')
		{
			$selectField='*';
		}
		$sql="select ".$selectField." from `".parent::SUFFIX."affiliate_key` where ".$whereField;		
		return $this->getResultant($sql,$returnArray);
	}
	
	function updateAffiliateCampaign($set_fields, $where_field)
	{
		//echo "UPDATE ".parent::SUFFIX."affiliate_request SET ".$set_fields." where ".$where_field;
		$cnf=$this->query("UPDATE ".parent::SUFFIX."affiliate_key SET ".$set_fields." where ".$where_field);
		//exit;
		return $cnf;
	}//End Function

	
	function getResultant($sql,$return_array=false)
	{
		$this->result=$this->query($sql);
		if($this->result && $return_array)
		{
			if($this->getCount() > 0)
			{
				$temp=array();
				$result_array=array();
				while($temp=$this->getRowAllFields())
				{
					$result_array[]=$temp;
				}				
				return $result_array;
			}
		}
		else
		{	
			if($this->getCount() > 0)						
				return $this->result;
			else
				return false;
		}
	}
	
	function insertAffiliateCommission($fields,$values)
	{		
		$insert_sql="INSERT INTO `".parent::SUFFIX."affiliate_commission` ( ".$fields." ) VALUES (".$values.")";
//		echo "<br/>".$insert_sql;
		$cnf=$this->query($insert_sql);	
//		exit;		
		return $cnf;
	}//End Function	
	
	

	function sendAffiliatePaymentRequest($fields,$values)
	{		
		$insert_sql="INSERT INTO `".parent::SUFFIX."affiliate_request` ( ".$fields." ) VALUES (".$values.")";
		$cnf=$this->query($insert_sql);			
		return $cnf;
	}//End Function	
	
		
	// Get Insurance customer list
	function getAffiliateTotalCommission($affiliate_id){
		$cnd="select sum(`commission_amount`) as total_commission from ".parent::SUFFIX."affiliate_commission where `affiliate_id`=".$affiliate_id;			
//		echo "<br/>".$cnd;
//		exit;
		$this->result=$this->query($cnd);
		$this->getRow();
		return $this->result;
	}// End Function
	
	function affKeyNoOfSales($affiliateKey_referral)
	{
		$cnd="select `userid` from ".parent::SUFFIX."affiliate_commission where `userid` in (".$affiliateKey_referral.")";			
		$this->result=$this->query($cnd);
		$no_of_sales=$this->getCount();
		
		$cnd1="select sum(`commission_amount`) as total_aff_key_commission from ".parent::SUFFIX."affiliate_commission where `userid` in (".$affiliateKey_referral.")";			
		$this->result=$this->query($cnd1);
		$this->getRow();
		if($this->getField('total_aff_key_commission')==NULL)
			$total_aff_key_commission=0;
		else
			$total_aff_key_commission=$this->getField('total_aff_key_commission');
		$arr=array();
		$arr['no_of_sales']=$no_of_sales;
		$arr['total_aff_key_commission']=$total_aff_key_commission;
		return $arr;
	}
	
	function getUsersAffiliate($userid)
	{

		$cnd="select `affiliate_id`, `user_status` from ".parent::SUFFIX."user_details where `userid`=".$userid." and user_status='Active'";			

		$this->result=$this->query($cnd);
		if($this->getRow())
		{
			$affiliate_info=array();
			$affiliate_id=$this->getField('affiliate_id');
				
			$cnd="select `userid`, `paypal_email`, `website` ,`user_status` from ".parent::SUFFIX."user_details where `userid`=".$affiliate_id." and user_status='Active'";			
			$this->result=$this->query($cnd);
			$affiliate_info=$this->getRowAllFields();	
			$affiliate_info['affiliate_id']=$affiliate_id;
			//echo "<pre>"; print_r($affiliate_info); exit;
		}
				
		return $affiliate_info;
	}// End Function
	
	
	
	
	function getUsersInvitedByFriendId($userid){

		$cnd="select `invited_by_id` from ".parent::SUFFIX."user_details where `userid`=".$userid;			
//		echo "<br/>".$cnd;
//		exit;
		$this->result=$this->query($cnd);
		$this->getRow();
		
		return $this->getField('invited_by_id');
	}// End Function
	
	function getAffiliateCommissionList($whereCnd=''){
		if($whereCnd!='')
		{
			$cnd="select * from ".parent::SUFFIX."affiliate_commission where ".$whereCnd;			
		}
		else
		{
			$cnd="select * from ".parent::SUFFIX."affiliate_commission where 1";
		}
//		echo "<br/>".$cnd;
//		exit;
		$this->result=$this->query($cnd);
		return $this->result;
	}// End Function
	
	function getAffiliatePaymentReqList($whereCnd=''){
		if($whereCnd!='')
		{
			$cnd="select * from ".parent::SUFFIX."affiliate_request where ".$whereCnd;			
		}
		else
		{
			$cnd="select * from ".parent::SUFFIX."affiliate_request where 1";
		}
//		echo "<br/>".$cnd;
//		exit;
		$this->result=$this->query($cnd);
		return $this->result;
	}// End Function

	function updateAffiliatePaymentReq($set_fields, $where_field)
	{
		//echo "UPDATE ".parent::SUFFIX."affiliate_request SET ".$set_fields." where ".$where_field;
		$cnf=$this->query("UPDATE ".parent::SUFFIX."affiliate_request SET ".$set_fields." where ".$where_field);
		//exit;
		return $cnf;
	}//End Function
	
	function updateUserPaidCommission($user_id, $add_pcommission)
	{
		$this->result=$this->query("select `affiliate_paid_commission` from ".parent::SUFFIX."user_details where userid='".$user_id."'");
		$rs=$this->getRow();	

		$pcommission=$this->getField('affiliate_paid_commission');
		$total_pcommission=$pcommission+$add_pcommission;


		//echo "UPDATE ".parent::SUFFIX."user_details set `affiliate_paid_commission`='".$total_pcommission."' where userid='".$user_id."'";
		$cnf=$this->query("UPDATE ".parent::SUFFIX."user_details set `affiliate_paid_commission`='".$total_pcommission."' where userid='".$user_id."'");	
		//exit;
		return $cnf;
	}//End Function	
	
	function userPaidCommission($user_id)
	{
		$this->result=$this->query("select `affiliate_paid_commission` from ".parent::SUFFIX."user_details where userid='".$user_id."'");
		$rs=$this->getRow();	
		
		return $this->getField('affiliate_paid_commission');
	}
	
	function userLastBidDate($user_id)
	{	//SELECT `user_id` , `bid_date` FROM `bidder_user_bid` WHERE `user_id`=11 ORDER BY `bid_date` DESC LIMIT 0 , 1  
		//echo "SELECT `user_id` , `bid_date` FROM ".parent::SUFFIX."user_bid where userid='".$user_id."' ORDER BY `bid_date` DESC LIMIT 0 , 1";
		$this->result=$this->query("SELECT `user_id` , `bid_date` FROM ".parent::SUFFIX."user_bid where user_id='".$user_id."' ORDER BY `bid_date` DESC LIMIT 0 , 1");
		if($this->getCount()>0)
		{
			$rs=$this->getRow();
			$date=$this->getField('bid_date');				
		}		
		return $date;
	}
	
	
	function userTotalPurchasedBids($user_id,$bonus_bids='')
	{	//SELECT `user_id` , `bid_date` FROM `bidder_user_bid` WHERE `user_id`=11 ORDER BY `bid_date` DESC LIMIT 0 , 1  
		$qry="SELECT sum(`no_of_bids`) as no_of_bids FROM `".parent::SUFFIX."user_bid_package` WHERE `user_id`=".$user_id;
		if(strcmp($bonus_bids,'bonus')==0)
		{
			$qry.=" and type!='Bid'";
		}
		else if(strcmp($bonus_bids,'purchase')==0)
		{
			$qry.=" and type='Bid'";
		}
//		echo "<br/>".$qry;
		$this->result=$this->query($qry);
		if($this->getCount()>0)
		{
			$rs=$this->getRow();
			$date=$this->getField('no_of_bids');				
		}
		else
		{
			$date=0;
		}
		
		return $date;
	}
	
	function userNumberOfWins($user_id)
	{	//SELECT `user_id` , `bid_date` FROM `bidder_user_bid` WHERE `user_id`=11 ORDER BY `bid_date` DESC LIMIT 0 , 1  
		$this->result=$this->query("SELECT count(1) as num_of_wins FROM `".parent::SUFFIX."bid_winners` WHERE `user_id`=".$user_id);
		if($this->getCount()>0)
		{
			$rs=$this->getRow();
			$date=$this->getField('num_of_wins');				
		}
		else
		{
			$date=0;
		}		
		return $date;
	}
	
	function userCountryName($country_id)
	{	//SELECT `user_id` , `bid_date` FROM `bidder_user_bid` WHERE `user_id`=11 ORDER BY `bid_date` DESC LIMIT 0 , 1  
		$this->result=$this->query("SELECT * FROM `".parent::SUFFIX."country` WHERE `country_id`=".$country_id);
		
		if($this->getCount()>0)
		{
			$rs=$this->getRow();
			$country_name=$this->getField('country_name');				
		}
				
		return $country_name;
	}
	
	

	function insertInvitedUserBids($fields,$values)
	{	
		$insert_sql="INSERT INTO `".parent::SUFFIX."user_bid_package` ( ".$fields." ) VALUES (".$values.")";

		$cnf=$this->query($insert_sql);		
		$insert_id=$this->getLastID();
		
		//Update free bid count according to bid type added
		$val_array=array();
		$val_array=explode(",",$values);
		$user_id=(int)str_replace("'","",$val_array[0]);
	
		$insert_bid_type=trim($val_array[1]);
		$no_of_bids=(int)str_replace("'","",$val_array[2]);
		
						
/*						
		if(strcmp("'Bid'",$insert_bid_type)==0)
		{	
		//If insert bid are from bid package then, insert string fields will be like
			//$fields="`user_id`, `type`, `package_id`, `price`, `no_of_bids`, `free_bid_points`, `payment_status`, `pay_date`";
			//$no_of_bids=(int)str_replace("'","",$val_array[5]); //Gives no of free bid points
			$no_of_bids=(int)str_replace("'","",$val_array[4]); //Gives no of total number of bids
		}
		else
		{	//If insert bid are from some type of bonus bids then, insert string fields will be like
			//$fields="`user_id`, `type`, `no_of_bids`, `payment_status`, `pay_date`";	
			
		}		
*/		
		
		$updt_use_bid_cnt_qry="UPDATE `".parent::SUFFIX."user_bid_package` SET `use_bid` = ".$no_of_bids." WHERE `id` = ".$insert_id;
		$cnf=$this->query($updt_use_bid_cnt_qry);	
		return $cnf;
	}//End Function	


	function update_zero_flag($uid,$flag)
	{		
		if($flag==1)
		{
			$cnf=$this->query("UPDATE ".parent::SUFFIX."user_details set `zero_bid`='N' where userid='".$uid."'");	
		}
		else
		{
			$cnf=$this->query("UPDATE ".parent::SUFFIX."user_details set `zero_bid`='Y' where userid='".$uid."'");	
		}
		return $cnf;		
	}
	
	function checkBalance($user_id)
	{
		$this->result=$this->query("select SUM(total_credit_bal) as total_bal  from ".parent::SUFFIX."user_details where userid='".$user_id."'");
		$this->getRow();
		if($this->getField('total_bal')!=''){
			return $this->getField('total_bal');
		}else{
			return 0;
		}	
	}	
	
	function getFakeUsers()
	{
		$this->result=$this->query("select * from ".parent::SUFFIX."user_details where `fake`='Y'");
		return $this->result;	
	}
		
	function check_fake_entry($user_id,$product_id)
	{
		$this->result=$this->query("select * from ".parent::SUFFIX."fake_user where `uid`='".$user_id."' and `pid`='".$product_id."'");
		return $this->result;		
	}	
	
	function insert_into_fake($pid,$st_pr,$en_pr,$uid,$single_bids,$agent_bids)
	{		
		$this->result=$this->query("INSERT INTO ".parent::SUFFIX."fake_user (`id`,`uid`,`pid`,`start_price`,`end_price`,`fixed_counter`,`fixed_agent_counter`) VALUES ('','".$uid."','".$pid."','".$st_pr."','".$en_pr."','".$single_bids."','".$agent_bids."')");
		return $this->result;			
	}
	
	function update_into_fake($fields_to_set,$fields_to_where)
	{	
		$this->result=$this->query("UPDATE ".parent::SUFFIX."fake_user SET ".$fields_to_set." where ".$fields_to_where);		
		return $this->result;			
	}		
	
	function delete_before_update($usrID,$prID)
	{
		$cnf=$this->query("DELETE FROM ".parent::SUFFIX."auto_bid WHERE product_id='".$prID."' and user_id='".$usrID."'");	
		return $cnf;
	}
	
	function delete_fake_entry($usrID,$prID)
	{
		$cnf=$this->query("delete from ".parent::SUFFIX."fake_user where uid='".$usrID."' and pid='".$prID."'");	
		$cnf1=$this->query("DELETE FROM ".parent::SUFFIX."auto_bid WHERE product_id='".$prID."' and user_id='".$usrID."'");				
		return $cnf;	
	}
	
	function update_credit_by_bidpack($uid,$bal)
	{	
		$bid_query="INSERT INTO `".parent::SUFFIX."user_bid_package` (`user_id`, `package_id`, `type`,`price`, `no_of_bids`,`free_bid_point`, `use_bid`,`payment_status`, `pay_date`) VALUES ('".$uid."', '0', 'Bid Pack Bonus','0', '".$bal."','0', '".$bal."','Paid', '".date("Y-m-d H:i:s")."')";
		$ichk=$this->query($bid_query);		
			
		$cnf=$this->query("UPDATE ".parent::SUFFIX."user_details set `total_credit_bal`=(`total_credit_bal`+'".$bal."') where userid='".$uid."'");	
		return $cnf;		
	}	
	
	function updateUserAffId($uid,$aff_id)
	{
		$sql="Update ".parent::SUFFIX."user_details set affiliate_id='".$aff_id."' where userid='".$uid."' ";
		$this->query($sql);
	}
	
	function getUserById($theId)
	{
		$sql="select * from ".parent::SUFFIX."user_details where userid='".$theId."'";
		return $this->query($sql);
	}
	
	function getFakeRecordById($theId)
	{
		$sql="select * from ".parent::SUFFIX."fake_users where fid='".$theId."'";
		$this->result=$this->query($sql);
		$this->getRow();
	}
	
		function getSubscribers()
	{
		$sql="select * from `".parent::SUFFIX."subscribers";
		return $this->result=$this->query($sql);
	}
}
?>