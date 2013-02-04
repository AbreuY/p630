<?php

/* ############################################################ Diwakar1.0 ################################################################### */

	require_once(dirname(__FILE__) . "/AbstractDB.php");
	require_once(dirname(__FILE__) . "/../library/automailClass.php");
	require_once(dirname(__FILE__) . "/../include/phpmailer/class.phpmailer.php");
	
	class mail_class extends AbstractDB {	
		private
			$result;
		public function __construct(){
			$this->result = NULL;
			$this->automailCls = new automailClass($GLOBALS['dbObj'], $GLOBALS['basepath'],$GLOBALS['modulepath'],$GLOBALS['template'],"include/");
			return true;
		}
		public function getCount(){
			return mysql_num_rows($this->result);
		}	

	// This function is used send registration email for user
	public function complete_customer_registration($uid,$password)
	{
		$query="Select * from ".parent::SUFFIX."user_details where user_id=".$uid;
		$resultpassword= mysql_query($query);
		$resultfetchquery=mysql_fetch_object($resultpassword);
		$user_id=base64_encode($uid);
		$site_path = AbstractDB::SITE_PATH;
		//$link="<a href='".AbstractDB::SITE_PATH."user_verification.php?user_id=".$user_id."'>Clcik here</a>";
		$this->automailCls->send_automail_user('complete_customer_registration',
		array(
			'site_path'=>$site_path,		
			'first_name'=>$resultfetchquery->first_name,
			'last_name'=>$resultfetchquery->last_name,
			'email'=>$resultfetchquery->email,
			'username'=>$resultfetchquery->username,
			'password'=>$password),
			array($resultfetchquery->email));

	}
	//End function
	
	// This function is used send registration email for user
	public function complete_supplier_registration($uid,$password)
	{
		$query="select ud.*,sd.* from `".parent::SUFFIX."user_details` ud left join `".parent::SUFFIX."supplier_details` sd on ud.user_id=sd.user_id where ud.user_type='S' and ud.user_status='Active' and ud.user_id='".$uid."'";		
		$resultpassword= mysql_query($query);
		$resultfetchquery=mysql_fetch_object($resultpassword);
		$user_id=base64_encode($uid);
		//$link="<a href='".AbstractDB::SITE_PATH."user_verification.php?user_id=".$user_id."'>Clcik here</a>";
		$this->automailCls->send_automail_user('complete_supplier_registration',
		array('first_name'=>$resultfetchquery->first_name,
			'last_name'=>$resultfetchquery->last_name,
			'contact_name'=>$resultfetchquery->contact_name,
			'email'=>$resultfetchquery->email,
			'username'=>$resultfetchquery->username,
			'password'=>$password),
			array($resultfetchquery->email));
	}
	//End function


	//Forgot Password For Both User
	public function forgotten_password($email)
	{
		$query="SELECT  * FROM ".parent::SUFFIX."user_details where email='".$email."'";
		$resultpassword= mysql_query($query);
		$resultfetchquery=mysql_fetch_object($resultpassword); 
		//$link="<a href='".AbstractDB::SITE_PATH."sign_in_new.php'>Clcik here</a>";
		$cnf=$this->automailCls->send_automail_user('forgot_password',
		array(
					'first_name'=>$resultfetchquery->first_name,
					'last_name'=>$resultfetchquery->last_name,
					'email'=>$resultfetchquery->email,
					'username'=>$resultfetchquery->username,
					'password'=>base64_decode($resultfetchquery->password),
					'link'=>$link),
					array($resultfetchquery->email));
					
		return $cnf;			
	}

/*public function booked_mail()
	{
        		$subject ='Activity Booked';
				$body.='Hi '.$_SESSION['first_name'].',<br><br>
				Thanks for booking, the booking details are given below :			
				<br><br><table>';

foreach($_SESSION['cart'] as $cart_elements)
{		
	foreach($cart_elements as $v)
	{
		foreach($v as $sub)
		{				
			foreach($sub as $subb)
			{
				foreach($subb as $rec)
				{
					//print_r($rec);
					if ($rec['otrid'] == 0)
					{
						
						$body.='<tr><td colspan="6"><b>'.$rec['subname'].'</b></td></tr>';
					}
						$body.='<tr><td>'.$rec['qty'].'</td><td>X</td><td>'.$rec['price_type_name'].'
						@</td><td>'.$rec['display_time'].'</td><td>'.$rec['ct'].'</td><td>'.$rec['price'].'</td></tr>';
						$recp += $rec['price'];
				}
			}
		}
	}
}

$body.='</table><br><br>Total = '.$rec['ct'].''.$recp.'<br><br>
Sincerely,<br>
Activity Booker Online';

				$email = $_SESSION['email'];
				$mail             = new PHPMailer();
				$body             = $body;
				$mail->IsMail(); // telling the class to use SendMail transport
				$mail->From       = 'activitybookeronline';
				$mail->FromName   = 'Activity Booker Online';
				$mail->Subject    = $subject;
				$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
				$mail->MsgHTML($body);
				$mail->AddAddress($email, '');
				$mail->Send();
	}*/	
/*	public function booked_mail_supply($sup_mail,$name,$uid)
	{
		
		$query="Select activity_id from ".parent::SUFFIX."booker_activities where user_id=".$uid;
		$rs= mysql_query($query);
		while($temp = mysql_fetch_assoc($rs))
		{
			$act[] = $temp['activity_id'];
		}
        		$subject ='Activity Booked';
				$body.='Hi '.$name.',<br><br>
				You have a new booking request from Activity Booker!			
				<br><br><table>';

		foreach($_SESSION['cart'] as $cart_elements)
		{		
			if (in_array($cart_elements['cart_act_id'],$act))
			{
				foreach($cart_elements as $v)
				{
					foreach($v as $sub)
					{				
						foreach($sub as $subb)
						{
							foreach($subb as $rec)
							{
								//print_r($rec);
								if ($rec['otrid'] == 0)
								{
									
									$body.='<tr><td colspan="6"><b>'.$rec['subname'].'</b></td></tr>';
								}
									$body.='<tr><td>'.$rec['qty'].'</td><td>X</td><td>'.$rec['price_type_name'].'
									@</td><td>'.$rec['display_time'].'</td><td>'.$rec['ct'].'</td><td>'.$rec['price'].'</td></tr>';
									$recp += $rec['price'];
							}
						}
					}
				}
			}
		}

$body.='</table><br><br>Total ='.$recp.'<br><br>
';

				$email = $sup_mail;
				$mail             = new PHPMailer();
				$body             = $body;
				$mail->IsMail(); // telling the class to use SendMail transport
				$mail->From       = 'activitybookeronline';
				$mail->FromName   = 'Activity Booker Online';
				$mail->Subject    = $subject;
				$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
				$mail->MsgHTML($body);
				$mail->AddAddress($email, '');
				$mail->Send();
				
				echo 'hi'; die;
	}*/
	
	
	
	/*public function booked_mail_supply($sup_mail,$name,$uid)
	{
		
		$query="Select activity_id from ".parent::SUFFIX."booker_activities where user_id=".$uid;
		$rs= mysql_query($query);
		while($temp = mysql_fetch_assoc($rs))
		{
			$act[] = $temp['activity_id'];
		}
		$site_path = AbstractDB::SITE_PATH;
		$otr.='<table>';
		
		foreach($_SESSION['cart'] as $cart_elements)
		{		
			if (in_array($cart_elements['cart_act_id'],$act))
			{
				foreach($cart_elements as $v)
				{
					foreach($v as $sub)
					{				
						foreach($sub as $subb)
						{
							foreach($subb as $rec)
							{
								//print_r($rec);
								if ($rec['otrid'] == 0)
								{
									
									$otr.='<tr><td colspan="6">Activity Booked: <b>'.$cart_elements['cart_act_title'].'=>'.$rec['subname'].'</b></td></tr>
									<tr><td colspan="6">Date: '.$cart_elements['cart_act_bkdate'].'</td></tr>';
								}
									$otr.='<tr><td>'.$rec['qty'].'</td><td>X</td><td>'.$rec['price_type_name'].'
									@</td><td>'.$rec['display_time'].'</td><td>'.$rec['ct'].'</td><td>'.$rec['price'].'</td></tr>';
									$recp += $rec['price'];
							}
						}
					}
				}
			}
		}
		
$otr.='</table><br>Total ='.$rec['ct'].''.$recp.'';
		
		$email = $sup_mail;
		$cnf=$this->automailCls->send_automail_user('booked_mail_supply',
		array(		
					'contact_name'=>$_SESSION['first_name'],
					'book_detail'=>$otr,
					'site_path'=>$site_path,
					'first_name'=>$name),
					array($email));
					
		return $cnf;		
	}*/
	
	
	public function booked_mail_supply($sup_mail,$name,$uid)
	{
		$query="Select activity_id from ".parent::SUFFIX."booker_activities where user_id=".$uid;
		$rs= mysql_query($query);
		while($temp = mysql_fetch_assoc($rs))
		{
			$act[] = $temp['activity_id'];
		}
		$site_path = AbstractDB::SITE_PATH;
		$otr.='<table>';
		
		foreach($_SESSION['cart'] as $cart_elements)
		{		
			if (in_array($cart_elements['cart_act_id'],$act))
			{
				foreach($cart_elements as $v)
				{
					foreach($v as $sub)
					{				
						foreach($sub as $subb)
						{
							foreach($subb as $rec)
							{
								//print_r($rec);
								if ($rec['otrid'] == 0)
								{
									$otr.='<tr><td colspan="6">Activity Booked: <b>'.$cart_elements['cart_act_title'].'=>'.$rec['subname'].'</b></td></tr>
									<tr><td colspan="6">Date: '.$cart_elements['cart_act_bkdate'].'</td></tr>';
								}
									$otr.='<tr><td>'.$rec['qty'].'</td><td>X</td><td>'.$rec['price_type_name'].'
									@</td><td>'.$rec['display_time'].'</td><td>'.$rec['ct'].'</td><td>'.$rec['price'].'</td></tr>';
									$recp += $rec['price'];
							}
						}
					}
				}
			}
		}
		
$otr.='</table><br>Total ='.$rec['ct'].''.$recp.'';
		$email = $sup_mail;

		
		/*$cnf=$this->automailCls->send_automail_user('booked_mail_supply',
													array(		
															'contact_name'=>$name,
															'book_detail'=>$otr,
															'site_path'=>$site_path,
															'first_name'=>$_SESSION['first_name'],
															'last_name'=>$_SESSION['last_name'],
															'confirm_link'=>$confirm_link,
															'decline_link'=>$decline_link
														 ),
													 array($email)
													);
			return $cnf;		*/
	}
	
	public function free_sell_mail_supply($sup_mail,$name,$uid,$paid_currency)
	{
		$site_path = AbstractDB::SITE_PATH;
		/*echo "<pre>";
			print_r($_SESSION['cart']);
		echo "</pre>"; */
		// Gettig the Paid symole from paid currency
		$book_detail=$this->getBookingDetailForSupp($paid_currency);
		$email = $sup_mail;
			$cnf=$this->automailCls->send_automail_user('free_sell_booking_confirm',
														array(		
															'first_name'=>$_SESSION['first_name'],
															'last_name'=>$_SESSION['last_name'],
															'site_path'=>$site_path,
															'book_detail'=>$book_detail),
														array($email));
		return $cnf;
	}
	
	public function booked_mail($paid_currency)
	{
		$site_path = AbstractDB::SITE_PATH;
		/*echo "<pre>";
			print_r($_SESSION['cart']);
		echo "</pre>"; */
		// Gettig the Paid symole from paid currency
		$book_detail=$this->getBookingDetail($paid_currency);
		
		/*foreach($_SESSION['cart'] as $cartActivity)
		{
			
		}*/
		
		
		$email = $_SESSION['email'];
			$cnf=$this->automailCls->send_automail_user('booked_mail',
														array(		
																'first_name'=>$_SESSION['first_name'],
																'last_name'=>$_SESSION['last_name'],
																'site_path'=>$site_path,
																'book_detail'=>$book_detail),
														array($email));
		return $cnf;		
}
	
/*	function booking_confirm($mail,$type)
	{
				$email = $mail;
				$mail             = new PHPMailer();
				$body             = 'Hi,<br><br>The Supplier has responded to your booking.<br><br>Status : '.$type.'<br><br>Sincerly,<br>Activity Booker Online.';
				$mail->IsMail(); // telling the class to use SendMail transport
				$mail->From       = 'activitybookeronline';
				$mail->FromName   = 'Activity Booker Online';
				$mail->Subject    = $subject;
				$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
				$mail->MsgHTML($body);
				$mail->AddAddress($email, '');
				$mail->Send();
	}*/
	
	/*public function booking_confirm($abc,$act_name,$sub_name,$schedule_date)
	{
			
		$site_path = AbstractDB::SITE_PATH;
		$cnf=$this->automailCls->send_automail_user('booking_confirm',
		array(	
				'contact_name'=>$act_name,
				'site_path'=>$site_path,
				'book_detail'=>$sub_name,
				'link'=>$schedule_date),
				array($abc));
		return $cnf;	
	}*/
	
	public function booking_confirm($first_name,$email,$attachement)
	{
		$cnf=$this->automailCls->send_automail_user('booking_confirm',
		array(	
				'first_name'=>$first_name,'attachement'=>$attachement),
				array($email));
		return $cnf;
	}
	
	
	public function golive($abc)
	{
		$site_path = AbstractDB::SITE_PATH;
		$query="SELECT  * FROM ".parent::SUFFIX."global_setting where id=2";
		$resultpassword= mysql_query($query);
		$resultfetchquery=mysql_fetch_object($resultpassword); 
		$email=$resultfetchquery->value;
		$cnf=$this->automailCls->send_automail_user('post_activity',
		array(	
		
				'site_path'=>$site_path,
				'contact_name'=>$_SESSION['email']),
				array($email));
		if($cnf)
		{
		$sql="update `".parent::SUFFIX."activity_entry` SET `request_status`='Yes'  where activity_id='".$_REQUEST['activity_id']."'";
		$this->result=$this->query($sql);
		echo 'Congratulations! A request has been sent to the Admin.';
		}
		else
		{
		echo 'There was an error, please try again.';
		}
	}	
	
		public function booking_cancelled($abc,$act_name,$sub_name,$schedule_date,$cname)
	{	
		$site_path = AbstractDB::SITE_PATH;
		$cnf=$this->automailCls->send_automail_user('customer_cancel_booking',
		array(	
				'contact_name'=>$act_name,
				//'last_name'=>$rfid,
				'site_path'=>$site_path,
				'book_detail'=>$sub_name,
				'first_name'=>$cname,
				'link'=>$schedule_date),
				array($abc));
			
		return $cnf;			
	}
	
	// This function is use to send email for new suggested activity category
	public function suggested_category_template($uid,$suggested_category)
	{
		$this->automailCls->send_automail_user('suggested_category_template_tpl',
		array('suggested_category'=>$suggested_category),
		array('ryan@hakatours.com'));
	}
	//End function
	
	
	public function test_cust_reg($user_id,$passwd)
	{
		$query="select * from ".parent::SUFFIX."user_details where user_id=".$user_id;
		$result=mysql_query($query);
		$resultfetchquery=mysql_fetch_object($result);
		$this->automailCls->send_automail_user('test_cust_reg',array('first_name'=>$resultfetchquery->first_name,'last_name'=>$resultfetchquery->last_name,'password'=>$passwd),array($resultfetchquery->email));
			
	}
	
public function getBookingDetail($paid_currency)
{	
		$query="select currency_symbol from ".parent::SUFFIX."country where currency_code='".$paid_currency."' limit 1";
		$rs= mysql_query($query);
		while($temp = mysql_fetch_assoc($rs))
		{
			$paid_symbol = $temp['currency_symbol'];
		}	
			$paid_currency_code=$paid_currency;
		$otr.='<table>';
foreach($_SESSION['cart'] as $cart_elements)
{	
	$query="Select supp.company_name,act.activity_id from ".parent::SUFFIX."supplier_details as supp left join ".parent::SUFFIX."booker_activities as act on act.user_id=supp.user_id where act.activity_id=".$cart_elements['cart_act_id'];
	$rs= mysql_query($query);
	while($temp = mysql_fetch_assoc($rs))
	{
		$supplier_name = $temp['company_name'];
	}

	$otr.='<tr><td colspan="5">Activity Supplier: <b>'.$supplier_name.'</b></td></tr>';
	$otr.='<tr><td colspan="5">Activity Booked: <b>'.$cart_elements['cart_act_title'].'</b></td></tr>';
	$otr.='<tr><td colspan="5">Date: '.$cart_elements['cart_act_bkdate'].'</td></tr>';
	
	$total_in_NZD=0;
	$total_deposite_in_NZD=0;
	$total_balance_in_NZD=0;
	
	$total_in_paid=0;
	$total_deposite_in_paid=0;
	$total_balance_in_paid=0;

	$total_activity_price_in_NZD=0;
	$total_deposite_received_in_NZD=0;
	$balance_in_NZD=0;
	
	$total_activity_price_in_paid=0;
	$total_deposite_received_in_paid=0;
	$balance_in_paid=0;
	
	foreach($cart_elements['cart_elements'] as $sub)
	{
			foreach($sub as $subb)
			{
				foreach($subb as $rec)
				{
					//print_r($rec);
					if ($rec['otrid'] == 0)
					{
						$otr.='<tr><td colspan="5">'.$rec['subname'].'</b></td></tr>';
						
						$otr.='<tr><td style="width:100px">Quantity</td><td style="width:100px">Price Type</td><td style="width:100px">Departure Time</td><td style="width:100px">Unit Price</td><td style="width:100px">Total Price</td></tr>';
					}
						$otr.='<tr><td>'.$rec['qty'].'</td><td>'.$rec['price_type_name'].'
						</td><td>'.$rec['display_time'].'</td><td>'.$cart_elements['cart_act_currency_symbol'].$rec['unit_price'].' '.$rec['ct'].'</td><td>'.$cart_elements['cart_act_currency_symbol'].$rec['price'].' '.$rec['ct'].'</td></tr>';
						
						$total_activity_price_in_NZD+=$rec['price_in_NZD'];   $total_activity_price_in_paid+=$rec['converted_price'];
						$total_deposite_received_in_NZD+=$rec['deposite_amount_in_NZD'];   $total_deposite_received_in_paid+=$rec['deposite_amount'];
				}
			}
		
	}
	$balance_in_NZD=$total_activity_price_in_NZD-$total_deposite_received_in_NZD;
	$balance_in_paid=$total_activity_price_in_paid-$total_deposite_received_in_paid;
	
	/*$total_in_NZD+=$total_activity_price_in_NZD;
	$total_deposite_in_NZD+=$total_deposite_received_in_NZD;
	$total_balance_in_NZD+=$balance_in_NZD;
	
	$total_in_paid=$total_activity_price_in_paid;
	$total_deposite_in_paid=$total_deposite_received_in_paid;
	$total_balance_in_paid+=$balance_in_paid;*/
	
	$otr.='<tr><td colspan="5">Activity Price: <b>$'.$total_activity_price_in_NZD.' NZD/'.$paid_symbol.$total_activity_price_in_paid.' '.$paid_currency_code.'</b></td></tr>';
	$otr.='<tr><td colspan="5">Deposit Received: <b>$'.$total_deposite_received_in_NZD.' NZD/'.$paid_symbol.$total_deposite_received_in_paid.' '.$paid_currency_code.'</b></td></tr>';
	$otr.='<tr><td colspan="5">Balance to be paid on the day: <b>$'.$balance_in_NZD.' NZD/'.$paid_symbol.$balance_in_paid.' '.$paid_currency_code.'</b></td></tr>';
	$otr.='<tr><td colspan="5" style="height:10px"> </td></tr>';
}
$otr.='</table>';
return $otr;
}


public function getBookingDetailForSupp($paid_currency)
{	
		$query="select currency_symbol from ".parent::SUFFIX."country where currency_code='".$paid_currency."' limit 1";
		$rs= mysql_query($query);
		while($temp = mysql_fetch_assoc($rs))
		{
			$paid_symbol = $temp['currency_symbol'];
		}	
			$paid_currency_code=$paid_currency;
		$otr.='<table>';
foreach($_SESSION['cart'] as $cart_elements)
{	
	$otr.='<tr><td colspan="5">Activity Booked: <b>'.$cart_elements['cart_act_title'].'</b></td></tr>';
	$otr.='<tr><td colspan="5">Date: '.$cart_elements['cart_act_bkdate'].'</td></tr>';
	
	$total_in_NZD=0;
	$total_deposite_in_NZD=0;
	$total_balance_in_NZD=0;
	
	$total_in_paid=0;
	$total_deposite_in_paid=0;
	$total_balance_in_paid=0;

	$total_activity_price_in_NZD=0;
	$total_deposite_received_in_NZD=0;
	$balance_in_NZD=0;
	
	$total_activity_price_in_paid=0;
	$total_deposite_received_in_paid=0;
	$balance_in_paid=0;
	
	foreach($cart_elements['cart_elements'] as $sub)
	{
			foreach($sub as $subb)
			{
				foreach($subb as $rec)
				{
					//print_r($rec);
					if ($rec['otrid'] == 0)
					{
						$otr.='<tr><td colspan="5">'.$rec['subname'].'</b></td></tr>';
						
						$otr.='<tr><td style="width:100px">Quantity</td><td style="width:100px">Price Type</td><td style="width:100px">Departure Time</td><td style="width:100px">Unit Price</td><td style="width:100px">Total Price</td></tr>';
					}
						$otr.='<tr><td>'.$rec['qty'].'</td><td>'.$rec['price_type_name'].'
						</td><td>'.$rec['display_time'].'</td><td>'.$cart_elements['cart_act_currency_symbol'].$rec['unit_price'].' '.$rec['ct'].'</td><td>'.$cart_elements['cart_act_currency_symbol'].$rec['price'].' '.$rec['ct'].'</td></tr>';
						
						$total_activity_price_in_NZD+=$rec['price_in_NZD'];   $total_activity_price_in_paid+=$rec['converted_price'];
						$total_deposite_received_in_NZD+=$rec['deposite_amount_in_NZD'];   $total_deposite_received_in_paid+=$rec['deposite_amount'];
				}
			}
		
	}
	$balance_in_NZD=$total_activity_price_in_NZD-$total_deposite_received_in_NZD;
	$balance_in_paid=$total_activity_price_in_paid-$total_deposite_received_in_paid;
	
	/*$total_in_NZD+=$total_activity_price_in_NZD;
	$total_deposite_in_NZD+=$total_deposite_received_in_NZD;
	$total_balance_in_NZD+=$balance_in_NZD;
	
	$total_in_paid=$total_activity_price_in_paid;
	$total_deposite_in_paid=$total_deposite_received_in_paid;
	$total_balance_in_paid+=$balance_in_paid;*/
	
	$otr.='<tr><td colspan="5">Activity Price: <b>$'.$total_activity_price_in_NZD.' NZD/'.$paid_symbol.$total_activity_price_in_paid.' '.$paid_currency_code.'</b></td></tr>';
	$otr.='<tr><td colspan="5">Deposit Received: <b>$'.$total_deposite_received_in_NZD.' NZD/'.$paid_symbol.$total_deposite_received_in_paid.' '.$paid_currency_code.'</b></td></tr>';
	$otr.='<tr><td colspan="5">Balance to be paid on the day: <b>$'.$balance_in_NZD.' NZD/'.$paid_symbol.$balance_in_paid.' '.$paid_currency_code.'</b></td></tr>';
	$otr.='<tr><td colspan="5" style="height:10px"> </td></tr>';
}
$otr.='</table>';
return $otr;
}


}//end of class
?>