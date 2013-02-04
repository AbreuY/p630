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

//print_r($_GET);die;
	
if(isset($_GET['news_id']) || $_GET['news_id']!='')
{	
	$news_id=$_GET['news_id'];
	$result=$user->getRecordById($news_id);
	$news_title=$user->getField('title');
	$news_content=$user->getField('content');
//	$news_content_main=$news_content;	
	$num_chk=$user->getCount();
}

if(isset($_POST['contact_submit']) && $_POST['contact_submit']!='')
{			
//	$content_of_mail=$news_content."<br />".		
	$emails=$_POST['cotact_imports'];	
	$arr=explode(",",$emails);
	if (preg_match('|^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$|i',$arr[0])) {	
		$subject=$news_title;						
		$headers  = 'From: '.SITE_EMAIL. "\r\n";
		$headers .= "MIME-version: 1.0\n";
		$headers .= "Content-type: text/html; charset=UTF-8\n";
		mail($emails,$subject,$news_content,$headers);			
		unlink("../newsletter/upload/user_report.csv");
		$_SESSION['msg']="<span class='success'>Newsletter sent successfully</span>";
		header("location:".$_SERVER['HTTP_REFERER']);	
	}
	else
	{
		$_SESSION['msg']="<span class='success'>Please upload proper csv file.</span>";
		header("location:".$_SERVER['HTTP_REFERER']);
	}	
}

if(isset($_POST['opt_submit']) && $_POST['opt_submit'] != '')
{
//	print_r ($_POST);echo "<pre>";die;			
	$distinct_var=$_POST['send_type'];
	if(strcmp($distinct_var,"0")==0)
	{
		$emails=$_POST['selected_group'];
		$arr=explode(",",$emails);
		if (preg_match('|^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$|i',$arr[0])) 
		{				
	/*					
			$subject=$_POST['subject'];
			$headers  = 'From: '.SITE_EMAIL. "\r\n";
			$headers .= "MIME-version: 1.0\n";
			$headers .= "Content-type: text/html; charset=UTF-8\n";			
			mail($emails,$subject,$news_content,$headers);				
			$_SESSION['msg']="<span class='success'>Newsletter sent successfully</span>";
			header("location:".$_SERVER['HTTP_REFERER']);		
	*/		

			$arrNew=explode(",",$emails);
			foreach($arrNew as $key => $value)
			{	
				$news_content_main=$news_content;							
		//		$string_to_send="type=style_notes&ID=";
		//		$string_to_send.=md5($value);
		//		$link_to_send=HTTPS_SITE_PATH."unsubscribe.php?".$string_to_send;
		//		$string_to_send="";
				$subject=$_POST['subject'];
				$headers  = 'From: '.SITE_EMAIL. "\r\n";
				$headers .= "MIME-version: 1.0\n";
				$headers .= "Content-type: text/html; charset=UTF-8\n";		
				$news_content_main=str_replace("|EMAIL|","$value",$news_content_main);		
				$news_content_to_send=$news_content_main;	
				$news_content_main="";				
				$link_to_send="";		
				mail($value,$subject,$news_content_to_send,$headers);							
			}			
			$_SESSION['msg']="<span class='success'>Newsletter sent successfully</span>";
			header("location:".$_SERVER['HTTP_REFERER']);		
			
		}
		else
		{
			$_SESSION['msg']="<span class='success'>Please select non-empty group.</span>";
			header("location:".$_SERVER['HTTP_REFERER']);		
		}			
	}
	else if(strcmp($distinct_var,"1")==0)
	{		
		$emails=$_POST['selected_group'];
		$arr=explode(",",$emails);
		if (preg_match('|^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$|i',$arr[0])) 
		{				
			$arrNew=explode(",",$emails);
			foreach($arrNew as $key => $value)
			{	
				$news_content_main=$news_content;							
				$string_to_send="type=style_notes&ID=";
				$string_to_send.=md5($value);
				$link_to_send=HTTPS_SITE_PATH."unsubscribe.php?".$string_to_send;
				$string_to_send="";
				$subject=$_POST['subject'];
				$headers  = 'From: '.SITE_EMAIL. "\r\n";
				$headers .= "MIME-version: 1.0\n";
				$headers .= "Content-type: text/html; charset=UTF-8\n";		
				$news_content_main=str_replace("|EMAIL|","$value",$news_content_main);		
				$news_content_to_send=$news_content_main."<br/> To unsubcribe click on below link.<br/>".$link_to_send;	
				$news_content_main="";				
				$link_to_send="";		
				mail($value,$subject,$news_content_to_send,$headers);							
			}			
			$_SESSION['msg']="<span class='success'>Newsletter sent successfully</span>";
			header("location:".$_SERVER['HTTP_REFERER']);				
		}
		else
		{
			$_SESSION['msg']="<span class='success'>Please select non-empty group.</span>";
			header("location:".$_SERVER['HTTP_REFERER']);		
		}					
	}
	else if(strcmp($distinct_var,"2")==0)
	{
		
		$emails=$_POST['selected_group'];
		$arr=explode(",",$emails);
		if (preg_match('|^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$|i',$arr[0])) 
		{				
			$arrNew=explode(",",$emails);
			foreach($arrNew as $key => $value)
			{								
				$news_content_main=$news_content;		
				$string_to_send="type=news_letter&ID=";
				$string_to_send.=md5($value);
				$link_to_send=HTTPS_SITE_PATH."unsubscribe.php?".$string_to_send;
				$string_to_send="";
				$subject=$_POST['subject'];
				$headers  = 'From: '.SITE_EMAIL. "\r\n";
				$headers .= "MIME-version: 1.0\n";
				$headers .= "Content-type: text/html; charset=UTF-8\n";
				$news_content_main=str_replace("|EMAIL|","$value",$news_content_main);
				$news_content_to_send=$news_content_main."<br/> To unsubcribe click on below link.<br/>".$link_to_send;		
				$news_content_main="";
				$link_to_send="";		
				mail($value,$subject,$news_content_to_send,$headers);							
			}	
			$_SESSION['msg']="<span class='success'>Newsletter sent successfully</span>";
			header("location:".$_SERVER['HTTP_REFERER']);						
		}
		else
		{
			$_SESSION['msg']="<span class='success'>Please select non-empty group.</span>";
			header("location:".$_SERVER['HTTP_REFERER']);		
		}					
	}	
	else if(strcmp($distinct_var,"3")==0)
	{		
		$emails=$_POST['selected_group'];
		$arr=explode(",",$emails);
		if (preg_match('|^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$|i',$arr[0])) 
		{				
			$arrNew=explode(",",$emails);
			foreach($arrNew as $key => $value)
			{								
				$news_content_main=$news_content;	
				$string_to_send="type=upcoming_auction&ID=";
				$string_to_send.=md5($value);
				$link_to_send=HTTPS_SITE_PATH."unsubscribe.php?".$string_to_send;
				$string_to_send="";
				$subject=$_POST['subject'];
				$headers  = 'From: '.SITE_EMAIL. "\r\n";
				$headers .= "MIME-version: 1.0\n";
				$headers .= "Content-type: text/html; charset=UTF-8\n";
				$news_content_main=str_replace("|EMAIL|","$value",$news_content_main);
				$news_content_to_send=$news_content_main."<br/> To unsubcribe click on below link.<br/>".$link_to_send;
				$news_content_main="";
				$link_to_send="";				
				mail($value,$subject,$news_content_to_send,$headers);							
			}		
			$_SESSION['msg']="<span class='success'>Newsletter sent successfully</span>";
			header("location:".$_SERVER['HTTP_REFERER']);					
		}
		else
		{
			$_SESSION['msg']="<span class='success'>Please select non-empty group.</span>";
			header("location:".$_SERVER['HTTP_REFERER']);		
		}					
	}	
	else
	{
		$_SESSION['msg']="<span class='success'>Please select non-empty group.</span>";
		header("location:".$_SERVER['HTTP_REFERER']);			
	}
		
/*			
	$emails=$_POST['selected_group'];
	$arr=explode(",",$emails);
	if (preg_match('|^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$|i',$arr[0])) 
	{				
		$arrNew=explode(",",$emails);
		foreach($arrNew as $key => $value)
		{
			echo "Name: $key, Age: $value <br />";
			$string_to_send.=base64_encode($value);
			$link_to_send=SITE_PATH."verify/".$string_to_send;
		}
	
		$subject=$_POST['subject'];
		$headers  = 'From: '.SITE_EMAIL. "\r\n";
		$headers .= "MIME-version: 1.0\n";
		$headers .= "Content-type: text/html; charset=UTF-8\n";
		mail($emails,$subject,$news_content,$headers);				
		$_SESSION['msg']="<span class='success'>Newsletter sent successfully</span>";
		header("location:".$_SERVER['HTTP_REFERER']);		
	}
	else
	{
		$_SESSION['msg']="<span class='success'>Please select non-empty group.</span>";
		header("location:".$_SERVER['HTTP_REFERER']);		
	}	
*/	
}

if(isset($_POST['uploadFile']) && $_POST['uploadFile']!="")
{	 	
	//	echo $_FILES["uploaded"]["type"];exit;
	 $target="../newsletter/upload/";  	 
	 // $target=$target.basename( $_FILES['uploaded']['name']);  	 
 	 $target=$target."user_report.csv";    
	 //	$arr=explode(".",$_FILES['uploadedfile']['name']);
	  $type=$_FILES["uploaded"]["type"];
	 			
	 if((strcmp($type,"text/csv")==0) || (strcmp($type,"application/vnd.ms-excel")==0))
	 { 	
		if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
		{	  			 
			   $_SESSION['msgs']="The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
			   $_SESSION['upload_success']="yes";
		} 
		else {
			   $_SESSION['msgs']="Sorry,there was a problem uploading your file.";
		}
	 }	
	 else
	 {
	 	  $_SESSION['msgs']="Please upload only csv file.";
	 }		
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

	$(".hida_show_section").hide();
	$(function(){ 
   		 $('.send_types').bind('change keyup',function () { 	      
    	  		var value = $(this).children("option:selected").attr('value');		  
		  //		alert(value);
		  		if(value != '')
				{
						$(".hida_show_section").show();
						$.ajax({
							type: "POST",
							url: '<?php echo SITE_PATH;?>admin/newsletter/get_selected_contacts.php',
							data:"group_id="+value,
							success: function(msg){		
								if(msg=='')
								{
									$("textarea#selected_groups").val('There is no any contacts available.');						
								}
								else
								{										
									$("textarea#selected_groups").val(msg);						
								}	
							}
						});
				}
				else
				{
					$(".hida_show_section").hide();
				}
				
    		}).change();
	 });



	//alert("Hello");
	 $("#frmRegister").validate({
		 errorElement:'div',
		 rules: {	 
			subject:{
				required: true,
				minlength: 2,
				maxlength: 80
			},			
			selected_group:{
				required: true
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
			selected_group:{
				required: "Please select proper group."
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
	
	 $("#import_contact").validate({
  	 errorElement:'div',
	 rules: {	 
			cotact_imports:{
				required: true	
			}
		},				
		messages: {
			cotact_imports:{
				required: "Please import contacts."	
			}			
		},	
		success:function(){			
		}		
	 });				
			
	$("#importButton").live("click",function(){														
		$.ajax({
		type: "POST",
		url: '<?php echo SITE_PATH;?>admin/newsletter/getContacts.php',
		data:"prod_id=pid",
		success: function(msg){		
				if(msg=='')
				{
					$("textarea#imported_cotacts").val('Please upload proper csv file.');						
				}
				else
				{										
					$("textarea#imported_cotacts").val(msg);						
				}	
			}
		});
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
	<input type="hidden" name="news_id" value="<?php echo $_GET['news_id']; ?>">
	<? if($msg != ''){ ?>
	<div align="center"><? echo $msg; ?></div>
	<? } ?>
	<br><br>
	<span style="clear:both; float:left; margin-right:30px;">Subject :</span> 
	<input type="text" dir="ltr" class="FETextInput" name="subject" value="<? echo $user->getField('title'); ?>" size="84"  maxlength="255">
	<br><br>
	<span style="clear:both; float:left;">Select option :</span>	
	<select name="send_type" class="send_types" style="float:left;">
		 <option value="" selected="selected">Select option</option>
 		 <option value="0">Database</option>
		 <option value="1">Subscribe to style notes</option>
		 <option value="2">Subscribe to newsletter</option>
		 <option value="3">Subscribe to upcoming auction</option>
	</select>
	<div class="hida_show_section">
		<textarea rows="2" cols="120" id="selected_groups"  name="selected_group" style="clear:both; float:left; margin-top:10px; margin-left:78px;"></textarea>
		<input type="submit" value="Submit" name="opt_submit" style="clear:both; float:left; margin-top:10px; margin-left:78px;"/>			
	</div>

<!--
<table cellpadding="5px" width="100%">
	
	<tr>
		<td valign="top" width="10%">Subject : </td>
		<td>
			<input type="text" dir="ltr" class="FETextInput" name="subject" value="<? //echo $user->getField('title'); ?>" size="84"  maxlength="255">
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
/*			
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
*/						
						?>
						<tr>
							<td><input type="checkbox" id="id" name="selectedcontact[]" value="<? //echo $ip_email; ?>"/></td>
							<td><? //echo ucwords($ip_firstname." ".$ip_lastname); ?></td>
							<td><? //echo $ip_email; ?></td>
						</tr>
						
						<?						
//					}					
//				}
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
-->

</FORM>

<form enctype="multipart/form-data" action="" method="POST" id="uplForm" style="clear:both; float:left; margin-top:50px;">
	 Please select csv file: <input name="uploaded" type="file" />	 
	 <input type="submit" value="Upload" name="uploadFile" id="upl_file" style="margin-left:20px;" />
	 <?php
	 if(isset($_SESSION['msgs']) && $_SESSION['msgs']!='')
	 {
	 	echo "<span style='color:red;'>".$_SESSION['msgs']."</span>";
		unset($_SESSION['msgs']);	
	 }			
	 ?>
</form> 

<?php
if(isset($_SESSION['upload_success']) && $_SESSION['upload_success']!="")
{
?>
<form id="import_contact" name="import_cnt" action="" method="post">
	<input type="button" id="importButton" value="Import" style=" clear:both; margin-left:120px; float:left;"/>
	<textarea rows="2" cols="120" id="imported_cotacts"  name="cotact_imports" style=" clear:both; margin-left:120px; float:left;"></textarea>
	<input type="submit" value="Submit" name="contact_submit" style=" clear:both; margin-left:120px; float:left; margin-top:10px;"/>
		
</form>
<? 
unset($_SESSION['upload_success']);
}
include_once("../footer.php"); ?>