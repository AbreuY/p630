<?php
require_once("../../pi_classes/commonSetting.php");

chkAdminLogin($_SESSION['adminID']);

require_once("../../pi_classes/class.users.php");
require_once("../../pi_classes/paging.php");

//Create object 
$ipObj=new users();	

require_once("../../pi_classes/class.newsletter.php");
$adminname=$_SESSION['admin_name'];
$adminid=$_SESSION['admin_Id'];
$user=new newsletter();

//For uploading image
extract($_GET);
extract($_POST);
	
if(isset($_GET['news_id']) || $_GET['news_id']!='')
{
	$news_id=$_GET['news_id'];
	$result=$user->getRecordById($news_id);
	$news_title=$user->getField('title');
	$news_content=$user->getField('content');
	$num_chk=$user->getCount();
}


if($_POST['btnSubmit']!="")
{
	//echo "<pre>"; print_r($_POST); exit;
 	$subject=$_POST['subject'];
    for ($i=0; $i < count($_POST['selectedcontact']); $i++)
	  { 
	   $count=count($_POST['selectedcontact']);  
						
	 	$to = $_POST['selectedcontact'][$i];
				
		$name = SITE_EMAIL;
		$headers  = 'From: '.$name. "\r\n";
		$headers .= "MIME-version: 1.0\n";
		$headers .= "Content-type: text/html; charset=UTF-8\n";
		$bool=mail($to,$subject,$news_content,$headers);
	}

	$_SESSION['msg']="<span class='success'>Newsletter sent successfully</span>";
	header("location:".$_SERVER['HTTP_REFERER']);
}

include_once("../header1.php");
?>

<script type="text/javascript" language="javascript">

$(document).ready(function(){
	//alert("Hello");
	 $("#frmRegister").validate({
		 errorElement:'div',
		 rules: {	 
			subject:{
				required: true,
				minlength: 2,
				maxlength: 80
			},
			"selectedcontact[]":{
				required: true
			}
		},
		errorPlacement: function(error, element){
			if(element.attr("name")=="selectedcontact[]")
			{
				var afterEle=jQuery("#selUser");
				error.insertAfter(afterEle);
			}					
			else
			{
				error.insertAfter(element);
			}
		},
		messages: {
			subject:{
				required: "Please enter subject for email",
				minlength: $.format("Please enter at least {0} characters"),
				maxlength: $.format("Please enter at most {0} characters")
			},
			"selectedcontact[]":{
				required: "Please select users"
			}
		},
		// set this class to error-labels to indicate valid fields
		success: function(label) {
		// set &nbsp; as text for IE
			label.hide();
		}
	});
});

function checktoall(obj)
{
	if(obj.checked==true)
	{
		for (i = 0; i < document.frmRegister.id.length; i++)
		document.frmRegister.id[i].checked = true ;
	}else
	{
		for (i = 0; i < document.frmRegister.id.length; i++)
		document.frmRegister.id[i].checked = false ;
	}
}


</script>

<? include_once("../header2.php"); ?>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
    <TD class="admintopcaption" >Send Newsletter</TD>
</TR>
<TR>
    <TD  class="adminpanelheader"><!--Update User - Registered: 2009-11-04--></TD>

</TR>
</TABLE>
<FORM name="frmRegister" id="frmRegister" action="" method="POST" enctype="multipart/form-data">

	<input type="hidden" name="edit_id" value="<?php echo $_GET['edit_id']; ?>">
	<? if($msg != ''){ ?>
	<div align="center"><? echo $msg; ?></div>
	<? } ?>
	<br><br>

<table cellpadding="5px" width="100%">
	
	<tr>
		<td valign="top" width="10%">Subject : </td>
		<td>
			<input type="text" dir="ltr" class="FETextInput" name="subject" value="<? echo $user->getField('title'); ?>" size="84"  maxlength="255">
		</td>
	</tr>
			
	<tr>		
		<td valign="top" width="10%">Content : </td>
		<td>
		<table cellspacing="5px" width="80%">
			<tr class="red1_header">
				<td title="Check All" class="workcap" style="font:bold"><input id="all" name="all" value="all" type="checkbox" onClick="checktoall(this)" /></td>
				<td width="30%" class="workcap"><strong>User Name</strong></td>
				<td class="workcap"><strong>Email</strong></td>
			</tr>
			<?
				// Get Insurance Provider List
				$whereCnd=" `user_status`='Active' and `receive_bidder_email`='y'";
				$ipObj->getRecordList($whereCnd); //To get total number of record in the database which is needed for paging 
				$recordcount = $ipObj->getCount();
				$query=$whereCnd;
				if($recordcount > 0)
				{
					$total	= $recordcount;
					$page 	= $_GET['page'];
					$limit 	= 10;
					$pager  = Pager::getPagerData($total, $limit, $page);
					$offset = $pager->offset;
					$limit  = $pager->limit;
					$page   = $pager->page;
					$query 	= $query . " limit $offset, $limit";
					$ipObj->getRecordList($query);
						
					if($recordcount > $limit){
						if($page == 1){
							echo "Previous";
						}
						else{
							echo "<a href=\"?news_id=".$news_id."&page=" . ($page - 1) ."\">Previous</a>";
						}
						for ($i = 1; $i <= $pager->numPages; $i++){
							echo "  "." ";
							if ($i == $pager->page)
							{
								echo "<strong>$i</strong>";
							}
							else{
								echo "<a href=\"?news_id=".$news_id."&page=$i\"> $i </a>";
							} 
						}
						echo "  "." ";
						if ($page == $pager->numPages){
							echo "Next";
							}
						else{
							echo "<a href=\"?news_id=".$news_id."&page=" . ($page + 1) ."\">Next</a>";
						}						
					}	
				
				$cnt=$offset;
				
				
					while($ipObj->getRow())
					{
					 $ip_id=$ipObj->getField('user_id');
					 $ip_firstname=$ipObj->getField('firstname');
					 $ip_lastname=$ipObj->getField('lastname');
					 $ip_email=$ipObj->getField('email');
					 $ip_status=$ipObj->getField('status');
					 $ip_usertype=$ipObj->getField('usertype');
					 if(strcmp($ip_usertype,"artist")==0)
					 {
						$send_newsletter=$ipObj->getField('artist_notify_newsletter');
					 }
					 else if(strcmp($ip_usertype,"customer")==0)
					 {
						$send_newsletter=$ipObj->getField('cust_notify_newsletter');
					 }
					 $cnt++;
						
						?>
						<tr>
							<td><input type="checkbox" id="id" name="selectedcontact[]" value="<? echo $ip_email; ?>"/></td>
							<td><? echo ucwords($ip_firstname." ".$ip_lastname); ?></td>
							<td><? echo $ip_email; ?></td>
						</tr>
						
						<?
						
					}					
				}
			?>
		</table>
		</td>
	</tr>
		
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="SUBMIT" value="Submit" name="btnSubmit" class="btn3">
		</td>
	</tr>	
	
</table>
	
</FORM>
<? include_once("../footer.php"); ?>