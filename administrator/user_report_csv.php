<?php
ob_start();
session_start();
require_once("../pi_classes/AbstractDB.php");

require_once("../pi_classes/class.users.php");
$obj_user=new users();
$extraDataObj=clone $obj_user;

header( 'Content-Type: text/csv' );
header( 'Content-Disposition: attachment;filename=user_report.csv' );
	
//"Country Name","Date of birth","Status","Total purchased bids","Total bonus bids","Available bids","Number of Wins","Subscribe to newsletter","Subscribe to style notes","Subscribe to upcoming auctions","Friend Id","Affiliate Id","Date of last bid";
$fields_array=array("Sr No.","User Id","Registered On","Name","Email","Country Name","Date of birth","Status","Total purchased bids","Total bonus bids","Available bids","Number of Wins","Subscribe to newsletter","Subscribe to style notes","Subscribe to upcoming auctions","Friend Id","Affiliate Id","Date of last bid");
//$row = mysql_fetch_assoc( $result );
if($fields_array)// ( $row )
{
	echocsv($fields_array);
}
  

$obj_user->getRecordList(1);
//while($i<5){
$i=2;
while($obj_user->getRow())
{
	$indx=$i-1;
	$user_id=$obj_user->getField("userid");
	$registration_date=$obj_user->getField("created_date");
	
	$firstname=$obj_user->getField("firstname");
	$lastname=$obj_user->getField("lastname");
	$user_name=ucwords($firstname." ".$lastname);
	
	$email=$obj_user->getField("email");
	$status=$obj_user->getField("user_status");

	$title=$obj_user->getField("title");
	$dob=$obj_user->getField("DOB");
	$country_id=$obj_user->getField("country");
	$country_name=$extraDataObj->userCountryName($country_id);
	
	$friend_id=$obj_user->getField("invited_by_id");
	$affiliate_id=$obj_user->getField("affiliate_id");	
	$available_credit=$obj_user->getField("total_credit_bal");
	
	
	$style_notes=$obj_user->getField("style_notes");
	$upcoming_auctions=$obj_user->getField("upcoming_auctions");
	$subscribe_newsletter=$obj_user->getField("receive_bidder_email");
		
//	$date_of_last_bid=
	$total_purchased_bids=$extraDataObj->userTotalPurchasedBids($user_id,"purchase");
	$total_bonus_bids=$extraDataObj->userTotalPurchasedBids($user_id,"bonus");
	$last_bid_date=$extraDataObj->userLastBidDate($user_id);
	$number_of_wins=$extraDataObj->userNumberOfWins($user_id);
	
	$value_array=array(	$indx, $user_id, $registration_date, $user_name, 
						$email, $country_name,$dob,$status,$total_purchased_bids,
						$total_bonus_bids,$available_credit,$number_of_wins,
						$subscribe_newsletter,$style_notes,$upcoming_auctions,
						$friend_id,$affiliate_id,$last_bid_date);
	
	echocsv($value_array);

	$i++;
}


  function echocsv( $fields )
  {
    $separator = '';
	
    foreach ( $fields as $field )
    {		
      if ( preg_match( '/\\r|\\n|,|"/', $field ) )
      {
        $field = '"' . str_replace( '"', '""', $field ) . '"';
      }
      echo $separator . $field;
      $separator = ',';
    }
    echo "\r\n";
  }


?>