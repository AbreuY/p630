<?php
require_once dirname(__FILE__) . '/AbstractDB.php';

class User extends AbstractDB
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
	
	public function insert_row_in_table($table_name, $fields,$values)
	{		
		 $query_string = "INSERT INTO ".parent::SUFFIX.$table_name." ( ".$fields." ) VALUES (".$values.")";			
		 $this->result = $this->query($query_string);			
			if (!$this->result){
				die('Could not insert: ' . mysql_error());
			}
		 return mysql_insert_id();	
	}
	
	public function retrieve_data_from_table($table_name, $whereCnd='')
	{
	 	$query_string = "select * from ".parent::SUFFIX.$table_name." ".$whereCnd;				
		//echo "<hr /> <br />";
		$this->result = $this->query($query_string);			
		if (!$this->result)
  		{
  			die('Could not select: ' . mysql_error());
  		}
		return $this->result ;
	}
	
	public function update_record_in_table($table_name, $set_fields, $where_field)
	{		
		$query_string = "UPDATE ".parent::SUFFIX.$table_name." set ".$set_fields.$where_field;		
		$this->result = $this->query($query_string);			
		if (!$this->result)
  		{
  			die('Could not update: ' . mysql_error());
  		}
		return $this->result ;
	}
	
	#GetAllCountryTable---------------------------------------------------------------------------------------------------------------:
	public function getAllCountry(){
		$sql="select * from `".parent::SUFFIX."country` where 1";
		$this->result=$this->query($sql);
	}

	
	#AdvisorPoint~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~:
	/*public function GET_ADVISOR_DETAILS($setColoumFields,$whereField){
		$sql="SELECT ".$setColoumFields." FROM ".parent::SUFFIX."advisor_details where ".$whereField."";
		$this->result=$this->query($sql);
	}*/
	public function getAdvisorLangSelctInfo($advisorId){
		$sql="select lang_id from `".parent::SUFFIX."advisor_language` where `advisor_id`= '".$advisorId."' ";
		$this->result=$this->query($sql);
	}
	public function getAdvisorAvailability($advisorId){
		$sql="select * from `".parent::SUFFIX."advisor_availability` where `advisor_id`='".$advisorId."' ";
		$this->result=$this->query($sql);
	}
	public function getAdvisorAvailabilityTime(){
		$sql="select * from `".parent::SUFFIX."availability_time` where 1 ";
		$this->result=$this->query($sql);
	}

	public function getAdvisorDetailsById($advId){
		$sql="select * from `".parent::SUFFIX."advisor_details` where `advisor_id`='".$advId."' ";
		$this->result=$this->query($sql);
	}

	public function getAdvisorSocailMediaDetailsByAdvId($advId){
		$sql="select * from `".parent::SUFFIX."advisor_socailmedia_info` where `advisor_id`='".$advId."' ";
		$this->result=$this->query($sql);
	}
	public function updateAdvisorDetails_personalInfo($arr,$rename_photo_name,$socialMediaInfoExists, $rename_video_name){
		#*****personalInfo::socialMeadia*****-
			if($socialMediaInfoExists==0){
			 $sql_socialMedia = "INSERT INTO `".parent::SUFFIX."advisor_socailmedia_info`(`advisor_id`,`website`,`blog`,`linkedin`,`facebook`,`twitter`) 
															  VALUES('".base64_decode($arr['advisor_id'])."','".$arr['websitePageLink']."',
															  '".$arr['blogPageLink']."',
															  		 '".$arr['linkedinPageLink']."','".$arr['facebookPageLink']."',
																	 '".$arr['twitterPageLink']."')";
			}else{
			 $sql_socialMedia = "UPDATE `".parent::SUFFIX."advisor_socailmedia_info` SET `website`='".$arr['websitePageLink']."',
																	   `blog`='".$arr['blogPageLink']."',
																	   `linkedin`='".$arr['linkedinPageLink']."',
																	   `facebook`='".$arr['facebookPageLink']."',
																	   `twitter`='".$arr['twitterPageLink']."'
									where advisor_id='".base64_decode($arr['advisor_id'])."'";
			}
			$this->query($sql_socialMedia);
		#*****personalInfo::language*****-
				$languageArr = $arr['language'];	
				$advisorId = base64_decode($arr['advisor_id']);
				
				#step1:
				$delQry 	 = "delete from ".parent::SUFFIX."advisor_language where advisor_id='".$advisorId."'";
				$returnReslt = $this->result=$this->query($delQry);
				
				for($i=0;$i<count($languageArr);$i++){
					#~:					
					$tmpArrLvl    = explode(',',$languageArr[$i]);
					$lang_id   	  = $tmpArrLvl[0];
					$flagMoreLang = $tmpArrLvl[1];
					#~:
					$sql_lang = "INSERT INTO `".parent::SUFFIX."advisor_language`(`advisor_id`,`lang_id`,`flag_more_lang`)
															VALUES('".$advisorId."','".$lang_id."','".$flagMoreLang."')";
					$this->query($sql_lang);															
				}
		#*****personalInfo******-			
			$sql3 = "UPDATE `".parent::SUFFIX."advisor_details` SET `first_name`='".$arr['firstName']."',`last_name`='".$arr['lastName']."',
																   `phone_code`='".$arr['phoneCode']."',
																   `contact_no`='".$arr['phoneNumber']."',  
																   `priceWebConsulte`='".$arr['yourListedPriceWebConsulte']."',
																   `priceEmailConsulte`='".$arr['yourListedPriceWebcamEmailConsulte']."',
																   `bank_code`='".$arr['bank_code']."',`branch_code`='".$arr['branch_code']."',
																   `availability_comment`='".$arr['availability_comment']."',
																   `image_path`='".$rename_photo_name."',
																   `video_path`='".$rename_video_name."',
																   `timezone`='".$arr['time_zone']."',
																   `IBAN_code`='".$arr['IBAN_code']."',`upd_date`='".date("Y-m-d H:i:s")."' 
					where advisor_id='".base64_decode($arr['advisor_id'])."'";
			return $this->result=$this->query($sql3);
	}
	
	#Language---------------------------------------------------------------------------------------------------------------:
	public function getLanguageDetails(){
		$sql="SELECT * FROM `".parent::SUFFIX."language` where 1 ";
		$this->result=$this->query($sql);
	}
	
	#SendMail~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~:
	function custom_send_email($to,$from,$temp_name,$var_array)
	{
		$email_templates	=	"SELECT * from ".parent::SUFFIX."mail_bodies where mail_page_id='".$temp_name."'";
		$this->result		=	$this->query($email_templates);		
	
		$num_rows	=	$this->numofrows();
		
		if($num_rows > 0)
		{
			$this->getRow();
			
			$temp_name		=	$this->getField('mail_page_id');
			$temp_subject	=	$this->getField('mail_subject');
	    	$temp_message	=	stripcslashes(base64_decode($this->getField('mail_description')));
				
			$to		   =	$to;
			$sub	   =	$temp_subject;
			$site_from =	trim($from);
	
			$headers='';
			$headers="MIME-Version: 1.0\r\n";
			$headers.='From: '.$site_from."\r\n";
			//if(strcmp($_SESSION['bid']['paymentMethod'],"credit")==0){				
//		    	if(strcmp($temp_name,"Receipt for the purchase")==0)
//			    {	 
//					//$headers .= 'Bcc: ajay@panaceatek.com'."\r\n";
//					$headers .= 'Bcc: billingreceipts@runwaybidder.com'."\r\n";
//	    		}			
//			}			
			$headers.='Reply-To: '.$site_from."\r\n"; 			
			$headers.="Content-type: text/html; charset=utf-8\r\n"; 
			$headers.="X-Priority: 3\r\n"; 
			$headers.="X-Mailer: PHP/".phpversion()."\r\n";									  			
			
			$message =$temp_message;
			foreach($var_array as $k=>$v)
			{
				$message=str_replace("$k","$v",$message);
				$sub=str_replace("$k","$v",$sub);
			}		
			
			echo $to;echo "<br>";
			echo $sub;echo "<br>";									
			echo $message;
			echo "<br>";
			
			$ret=mail($to,$sub,$message,$headers);
		}
	}
	
	public function getGlobalRecordById($rec_id)
	{
		$this->result=$this->query("select * from ".parent::SUFFIX."global_setting where `id`='".$rec_id."'");
		$rs=$this->getRow();
		return $rs;
	}
	
	public function advisor_reg_linkedin($email, $lipid)
	{		
		$query_string = "INSERT INTO ".parent::SUFFIX."advisor_details (`email`,`linkedin_profile_id`,`created_date`) VALUES('".$email."','".$lipid."',
																		'".date('Y-m-d H:i:s')."')";			
		 $this->result = $this->query($query_string);			
			if (!$this->result){
				die('Could not insert: ' . mysql_error());
			}
		 return mysql_insert_id();	
	}
	
	public function deleteProductFile($pid){
		$sql="delete from `".parent::SUFFIX."product_file` where `product_id` ='".$pid."'";
		$this->result=$this->query($sql);
		return $this->result;
	}
	
	
}//End of class


?>
