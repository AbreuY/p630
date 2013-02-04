<?php
require_once("../pi_classes/commonSetting.php");

//chkAdminLogin($_SESSION['adminID']);

// require_once('../pi_classes/Manageuser.php');
 require_once("../pi_classes/paging.php");
 //require_once('set_language.php');
 require_once("../pi_classes/class.users.php");
$obj_user=new users();
$extraDataObj=clone $obj_user;


if(isset($_POST['sub']))
   {  
  // echo "<pre>"; print_r($_POST); exit;
	  $criteria = trim($_POST['search']);  
   }else
     {
       if(isset($_GET['criteria']))
	    {
	       $criteria = trim($_GET['criteria']);  
	 	}else
		  {
		     $criteria = '';
		  }
	 }	
	

/** Record Delete Action starts **/
if(isset($_GET['delete_id']))
{
	$cat_id=$_GET['delete_id'];	

//	$res=$ipObj->deleteRecord($cat_id);
	$res=$obj_user->deleteRecord($cat_id);
	//exit;
	$_SESSION['msg']="<span class='success'>User deleted successfully!</span>";
	//header("location:".$_SERVER['HTTP_REFERER']);
	header("location:manage_users.php");
}
/** Record Delete Action ends **/


/** Change Record Status **/
if(isset($_GET['status']))
{
	if($_GET['status']=='Active')
	{
		$status="Inactive";
	}
	else if($_GET['status']=='Inactive')
	{
		$status="Active";
	}
	$cat_id=$_GET['record_id'];
//	updateStatus($status, $update_id)
	$res=$obj_user->updateStatus($status, $cat_id);
	$_SESSION['msg']="<span class='success'>Status updated successfully!</span>";
	header("location:".$_SERVER['HTTP_REFERER']);
}

if(isset($_GET['changeNewsletterSub']))
{
	$st=($_GET['st']=='Y')?'N':'Y';
	$cat_id=$_GET['record'];
	$res=$obj_user->updateNewsLetterStatus($st, $cat_id);
	$_SESSION['msg']="<span class='success'>Status updated successfully!</span>";
	header("location:".$_SERVER['HTTP_REFERER']);
}
// End
if(isset($_GET['changeStyleNotesSub']))
{
	$st=($_GET['st']=='Y')?'N':'Y';
	$cat_id=$_GET['record'];
	$res=$obj_user->updateStyleNotesStatus($st, $cat_id);
	$_SESSION['msg']="<span class='success'>Status updated successfully!</span>";
	header("location:".$_SERVER['HTTP_REFERER']);
}
// End
if(isset($_GET['changeUpcomingAuctionSub']))
{
	$st=($_GET['st']=='Y')?'N':'Y';
	$cat_id=$_GET['record'];
	$res=$obj_user->updateUpcomingStatus($st, $cat_id);
	$_SESSION['msg']="<span class='success'>Status updated successfully!</span>";
	header("location:".$_SERVER['HTTP_REFERER']);
}
// End
include_once("header1.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Global Setting| Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/layout.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/ie.css" type="text/css" media="screen" />
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/hideshow.js" language="javascript" type="text/javascript"></script>
<!--<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.tablesorter.min.js" language="javascript" type="text/javascript"></script>-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.equalHeight.js"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.validate.js" language="javascript" type="text/javascript"></script>

<script type="text/javascript" src="../js/ui.core.js"></script>
<script type="text/javascript" src="../js/ui.datepicker.js"></script>
<link type="text/css" href="../js/base/ui.all.css" rel="stylesheet" />


<script type="text/javascript" language="javascript">

function confirmDelete(deleteid)
{
	//alert(deleteid);
	if (confirm("Are you sure you want to delete user?"))
	{
		window.location="?delete_id="+deleteid;
	}
}

$(function() {

		//$("#start_date").datepicker({minDate: 0, maxDate: '+10Y +10D'});
		$('#start_date').datepicker({dateFormat: 'yy-mm-dd'});
	//	$("#end_date").datepicker({minDate: 0, maxDate: '+10Y +10D'});
		$('#end_date').datepicker({dateFormat: 'yy-mm-dd'});		
			
	});
	
$(document).ready(function(){
	Fn_ShowNumUser();
});


function Fn_ShowNumUser()
{
	var start_date=$('#start_date').val();
		var end_date=$('#end_date').val();
		//alert(start_date); alert(end_date); 	
		//if(start_date)
		var url="ajax_show_users.php";
		$.post(url,{start_date:start_date,end_date:end_date},function(data){
	//		alert(data);
			$('#no_of_user').html(data);
		});	

}
</script>
<style>
#loading { 
width: 70%; 
text-align:center;
padding-top:40px;
position: absolute;
}
</style>
</head>
<body>
	<?php include("./header.php");?>	
	<?php include("./menu.php");?>	

<? include_once("header2.php"); ?>

<?php


//$recordcount = $obj_user->getallUsercount($criteria);
if(isset($criteria) && $criteria!='')
{
	$search_cnd="email LIKE '%$criteria%' OR firstname LIKE '%$criteria%' OR lastname LIKE '%$criteria%'";
}
else
{
	$search_cnd=1;
}
	$obj_user->getRecordList($search_cnd);
	$recordcount =$obj_user->getCount();
	if($recordcount > 0){		
		$total				=				$recordcount;
		$page 				= 				$_GET['page'];
		$orderby			=				$_GET['orderby'];
		$limit 				=				25;
		$pager  			=				Pager::getPagerData($total, $limit, $page);
		$offset 			= 				$pager->offset;
		$limit  			= 				$pager->limit;
		$page   			= 				$pager->page;
		$param              = 				$_GET['param'];		

	    $obj_user->getallUserinfo($limit,$offset,$criteria,$orderby,$param);		
}
?>
<section id="main" class="column">	
	<div class="module_content module width_full " style="width: 98%;">
<header><h3>user management</h3></header>
<div class="tab_container">

<table>
	<tr>
		<td valign="top" width="440">
			<form name="serchForm" action="manage_users.php" method="post">
			<?php echo $lang['rec_search']; ?>
			<input type="text" name="search" value="<?php echo $criteria; ?>">&nbsp;
			<input type="submit" name="go" value="GO"/>
			<input type="hidden" name="sub" value="sub"/>
			</form>
		</td>
		
		<td width="20"></td>
		<td valign="top"></td>
	</tr>
</table>

<table>	
	<tr>
		<td><strong>Please enter date: </strong></td>
		<td>&nbsp;</td>
	</tr>
	
	<tr>		
		<td>From : <input name="start_date" id="start_date" /></td>
		<td>To : <input name="end_date" id="end_date" /> <input type="button" value="Show" id="ShowNumUser" name="ShowNumUser" onclick="Fn_ShowNumUser()"/></td>
	</tr>
	<tr>
		<td><strong>Number of registered users: </strong></td>
		<td><strong id="no_of_user"></strong></td>
	</tr>
</table>
<br />
<table class="" style="width: 60%;" cellpadding="0" cellspacing="0">
	<? if($msg!=''){?>
	<tr><td align="center" colspan="2"><? echo $msg; ?></td></tr>
	<? }?>
		<tr>
		<td align="left">
		 <?php
			if($recordcount > $limit){?>
			<b>Goto Page</b>: <select onchange="location.href='manage_users.php?orderby=<?php echo $orderby; ?>&param=<?php echo $param; ?>&criteria=<?php echo $criteria; ?>&page='+this.value;">
           <?php
		   for ($i = 1; $i <= $pager->numPages; $i++){ ?>
	        <option <?php if ($i == $pager->page){ echo 'selected="selected"';	}?>><?php echo $i;?></option> <?php
			}
			?>
		</select>
    <?php
	}
		 ?>
		</td>
		<td align="right">
		<a href="user_report_csv.php">Download File as CSV</a>
		</td>
	</tr>

</table>
<br />
	<?php  
	if($_GET['orderby']==''){
	$param='asc'; 
	}
	if($param=='asc'){
	$param='desc'; 
	}else{
		$param='asc'; 
	}
	
	?>
<table bgcolor="#000000" cellspacing="0" cellpadding="0" border="0">
<tr>
<td>
<TABLE cellspacing="1"  cellpadding=2 border="0" width="100%" class="worktable">
 <TR>
 <TD class="workcap" width="40">User ID</TD>
 <TD class="workcap" width="90">Date Registered</TD>
 <TD class="workcap" width="40">Title</TD>
 <TD class="workcap" width="100"><a href="manage_users.php?orderby=firstname&param=<?php echo $param; ?>&criteria=<?php echo $criteria;?>">First Name</a></TD>
 <TD class="workcap" width="100"><a href="manage_users.php?orderby=lastname&param=<?php echo $param; ?>&criteria=<?php echo $criteria;?>">Last Name</a></TD>
 <TD class="workcap" width="100"><a href="manage_users.php?orderby=email&param=<?php echo $param; ?>&criteria=<?php echo $criteria;?>">Email</a></TD>
 <TD class="workcap" width="40">Country Name</TD>
 <TD class="workcap" width="40">Date of birth</TD>
 <TD class="workcap" width="50"><a href="manage_users.php?orderby=user_status&param=<?php echo $param; ?>&criteria=<?php echo $criteria;?>">Status</a></TD>
  <TD class="workcap" width="40">Subscribe to newsletter</TD>
 <TD class="workcap" width="40">Subscribe to style notes</TD>
 <TD class="workcap" width="40">Subscribe to upcoming auctions</TD>
 <TD class="workcap" width="40">Friend Id</TD>
 <TD class="workcap" width="40">Affiliate Id</TD>
 <TD class="workcap" width="40">Date of last bid</TD>
 <TD class="workcap" width="40">Edit</TD>
 <TD class="workcap" width="40">Delete</TD>
 <TD class="workcap" width="40">Wish List</TD>
 </TR>
<?php
while($obj_user->getRow())
{
	$user_id=$obj_user->getField("userid");
	$status=$obj_user->getField("user_status");
	$firstname=$obj_user->getField("firstname");
	$lastname=$obj_user->getField("lastname");
	$registration_date=$obj_user->getField("created_date");
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
	
?> 
 <TR>
 <TD class="worktd" width="40"><?php echo $user_id; ?></TD>
 <TD class="worktd" width="90"><?php echo $registration_date; ?></TD>
  <TD class="worktd" width="40"><?php echo $title; ?></TD>
 <TD class="worktd" width="100"><?php echo $firstname; ?></TD>
  <TD class="worktd" width="100"><?php echo $lastname; ?></TD>
 <TD class="worktd" width="30"><?php echo $email=$obj_user->getField("email"); ?></TD>
 <TD class="worktd" width="40"><?php echo $country_name; ?></TD>
 <TD class="worktd" width="40"><?php echo $dob; ?></TD>
 <TD class="worktd" width="80"><a href="?status=<? echo $status; ?>&amp;record_id=<? echo $user_id; ?>" title="Change status"><?php echo $status; ?></a></TD>

 <TD class="worktd" width="40"><input type="checkbox" value="<?php echo strtoupper($subscribe_newsletter); ?>" <?php if(strtoupper($subscribe_newsletter)=='Y') echo "checked='checked'"; ?> autocomplete="false" onclick="location.href='manage_users.php?changeNewsletterSub=1&st=<?php echo strtoupper($subscribe_newsletter); ?>&record=<?php echo $user_id;?>'" /></TD>
 <TD class="worktd" width="40"><input type="checkbox" value="<?php echo strtoupper($style_notes); ?>" <?php if(strtoupper($style_notes)=='Y') echo "checked='checked'"; ?> autocomplete="false" onclick="location.href='manage_users.php?changeStyleNotesSub=1&st=<?php echo strtoupper($style_notes); ?>&record=<?php echo $user_id;?>'" /></TD>
 <TD class="worktd" width="40"><input type="checkbox" value="<?php echo strtoupper($upcoming_auctions); ?>" <?php if(strtoupper($upcoming_auctions)=='Y') echo "checked='checked'"; ?> autocomplete="false" onclick="location.href='manage_users.php?changeUpcomingAuctionSub=1&st=<?php echo strtoupper($upcoming_auctions); ?>&record=<?php echo $user_id;?>'" /></TD>
 <TD class="worktd" width="40"><?php echo $friend_id; ?></TD>
 <TD class="worktd" width="40"><?php echo $affiliate_id; ?></TD>
 <TD class="worktd" width="40"><?php echo $last_bid_date; ?></TD>
 
<TD class="worktd"  align="center" width="70">
 <a  title="edit" href="edituser.php?edit_id=<?=$user_id ?>" style="font-family:Arial; font-size:12px; border:0px;" ><img src="./images/icn_edit.png"></a>
 </TD>
 <TD class="worktd"  align="center" width="70">
 <TABLE  class="worklink" cellspacing=0 cellpadding=1>
 <tr>
 <td valign=top><A  HREF="javascript:void(0)" style="font-family:Arial; font-size:12px; border:0px;" ><IMG src="./images/icn_trash.png onClick="return deleteUser(<?php echo $user_id;?>)" border=0></a></td>
 <td><A  HREF="javascript:void(0)" onClick="return confirmDelete(<?php echo $user_id;?>)" style="border: 0px;font-family:Arial; font-size:12px" >Delete</a></td>
 </tr>
 </table>
 </TD>
 <TD class="worktd" width="40"><a href="wish_list.php?uid=<?=$user_id ?>">View</a></TD>
		</TR>
		<?php } ?>
		<tr><td class="dbgrid2navpanel" dir="ltr" lang=he colspan=15></td></tr></TABLE></td></tr>
		
		</table>
</div>
</div>
</section>
<? include_once("footer.php"); ?>