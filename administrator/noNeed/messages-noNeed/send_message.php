<?php
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/Admin.php");
chkAdminLogin();
$supplierObj=new Admin();	
if(isset($_REQUEST['btnSubmit']))
{

$objAdminMsgAdd=clone $supplierObj;
		#Array ( [isValidForm] => [sender_id] => 3 [chkUserTo] => Supplier [receiver_id] => 1 [subject] => asd [message] => asd [btnCustSendMessage] => Send ) 
		if($_POST['chkUserTo']=="Supplier")
		{
		
			$userEmail=explode(',',$_POST['receiver_id2']);
			foreach($userEmail as $user_email)
			{	$count=0;
				if(trim($user_email)!="")
				{	$receiver_id="";
					$objUserID=clone $supplierObj;
					$objUserID->getSuppIdByEmail($user_email);
					$objUserID->getAllRow();
					$count=$objUserID->numofrows();
						if($count==1)
						{
							$receiver_id=$objUserID->getField('user_id');
								$dvalues="'','','".$receiver_id."','".$_POST['activity_id']."','".addslashes($_POST['subject'])."','".addslashes($_POST['message'])."','no','a','s','".date('Y-m-d H:i:s')."','as'";
							$objAdminMsgAdd->insertMsgFromAdmin($dvalues);
						
							$dvalues="'','','".$receiver_id."','".$_POST['activity_id']."','".addslashes($_POST['subject'])."','".addslashes($_POST['message'])."','no','a','s','".date('Y-m-d H:i:s')."','si'";
							$objAdminMsgAdd->insertMsgFromAdmin($dvalues);
						}
				}
			}				
		}
		elseif($_POST['chkUserTo']=="Customer")
		{
				
				$userEmail=explode(',',$_POST['receiver_id1']);
				
			foreach($userEmail as $user_email)
			{	$count=0;
				if(trim($user_email)!="")
				{	$receiver_id="";
					$objUserID=clone $supplierObj;
					$objUserID->getUserIdByEmail($user_email);
					$objUserID->getAllRow();
					$count=$objUserID->numofrows();
						if($count==1)
						{
							$receiver_id=$objUserID->getField('user_id');
								$receiver_id;
							$dvalues="'','','".$receiver_id."','".$_POST['activity_id']."','".addslashes($_POST['subject'])."','".addslashes($_POST['message'])."','no','a','c','".date('Y-m-d H:i:s')."','as'";
							$objAdminMsgAdd->insertMsgFromAdmin($dvalues);
						
							$dvalues="'','','".$receiver_id."','".$_POST['activity_id']."','".addslashes($_POST['subject'])."','".addslashes($_POST['message'])."','no','a','c','".date('Y-m-d H:i:s')."','ci'";	
							$objAdminMsgAdd->insertMsgFromAdmin($dvalues);
						}
				}
			}				
		}
		

		$_SESSION['msg']['message_sent']="Your message sent successfully";
		
		if($_POST['chkUserTo']=="Customer")
		{
			header("location:".AbstractDB::SITE_PATH."admin/messages/sent_list.php");
		}
		else
		{
			header("location:".AbstractDB::SITE_PATH."admin/messages/sent_list_supplier.php");
		}
		
}		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IN ADMIN PANEL | Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/layout.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/ie.css" type="text/css" media="screen" />
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
	
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>js/remote_multiple/themes/base/jquery.ui.all.css">
	<script src="<?php echo AbstractDB::SITE_PATH;?>js/remote_multiple/jquery-1.8.0.js"></script>
	<script src="<?php echo AbstractDB::SITE_PATH;?>js/remote_multiple/ui/jquery.ui.core.js"></script>
	<script src="<?php echo AbstractDB::SITE_PATH;?>js/remote_multiple/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo AbstractDB::SITE_PATH;?>js/remote_multiple/ui/jquery.ui.position.js"></script>
	<script src="<?php echo AbstractDB::SITE_PATH;?>js/remote_multiple/ui/jquery.ui.autocomplete.js"></script>
	<!--<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>js/remote_multiple/demos.css">-->
	<style>
	.ui-autocomplete-loading { background: white url('../../images/ui-anim_basic_16x16.gif') right center no-repeat; }
	</style>
<!-- <script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.validate.js" language="javascript" type="text/javascript"></script> -->

<!--<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery("#frmSendMessage").validate({
		errorElement:'div',
			rules: {
				    receiver_id1:{
				 		required:true
					},
					receiver_id2:{
				 		required:true
					},
					subject:{
				 		required:true
					 },
					 message:{
				 		required:true
					 }
			},
			messages:{
				receiver_id1:{
						required:"Please select receiver"
				},
				receiver_id2:{
						required:"Please select receiver"
				},
				subject:{
						required:"Please enter subject"
				},
				message:{
						required:"Please Enter message"
				}
			}
	});
});	

</script>-->

<script type="text/javascript">
	$(function() {
		function split( val ) {
			return val.split( /,\s*/ );
		}
		function extractLast( term ) {
			return split( term ).pop();
		}

		$( "#receiver_id1" )
			// don't navigate away from the field on tab when selecting an item
			.bind( "keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.TAB &&
						$( this ).data( "autocomplete" ).menu.active ) {
					event.preventDefault();
				}
			})
			.autocomplete({
				source: function( request, response ) {
					$.getJSON( "<?php echo AbstractDB::SITE_PATH;?>admin/ajax/cust_suggest.php", {
						term: extractLast( request.term )
					}, response );
				},
				search: function() {
					// custom minLength
					var term = extractLast( this.value );
					if ( term.length < 1 ) {
						return false;
					}
				},
				focus: function() {
					// prevent value inserted on focus
					return false;
				},
				select: function( event, ui ) {
					var terms = split( this.value );
					// remove the current input
					terms.pop();
					// add the selected item
					terms.push( ui.item.value );
					// add placeholder to get the comma-and-space at the end
					terms.push( "" );
					this.value = terms.join( ", " );
					return false;
				}
			});
	});
	</script>
	
	<script type="text/javascript">
	$(function() {
		function split( val ) {
			return val.split( /,\s*/ );
		}
		function extractLast( term ) {
			return split( term ).pop();
		}

		$( "#receiver_id2" )
			// don't navigate away from the field on tab when selecting an item
			.bind( "keydown", function( event ) {
				if ( event.keyCode === $.ui.keyCode.TAB &&
						$( this ).data( "autocomplete" ).menu.active ) {
					event.preventDefault();
				}
			})
			.autocomplete({
				source: function( request, response ) {
					$.getJSON( "<?php echo AbstractDB::SITE_PATH;?>admin/ajax/supp_suggest.php", {
						term: extractLast( request.term )
					}, response );
				},
				search: function() {
					// custom minLength
					var term = extractLast( this.value );
					if ( term.length < 1 ) {
						return false;
					}
				},
				focus: function() {
					// prevent value inserted on focus
					return false;
				},
				select: function( event, ui ) {
					var terms = split( this.value );
					// remove the current input
					terms.pop();
					// add the selected item
					terms.push( ui.item.value );
					// add placeholder to get the comma-and-space at the end
					terms.push( "" );
					this.value = terms.join( ", " );
					return false;
				}
			});
	});
	</script>
<script type="text/javascript">
function fn_toggle(id)
{
	if(id=='Supplier')
	{
		jQuery("#suppdiv").css('display','block');
		jQuery("#custdiv").css('display','none');
	}
	else
	if(id=='Customer')
	{
	jQuery("#custdiv").css('display','block');
	jQuery("#suppdiv").css('display','none');
	}
	
}
</script>

</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>
	<section id="main" class="column">
		<form name="frmSendMessage" id="frmSendMessage" method="post">
		<article class="module width_full">
			<header><h3>Send Message </h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
							<a href="<?php echo AbstractDB::SITE_PATH;?>admin/messages/inbox_list.php" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						<fieldset style="width:48%; float:left;">
								<input type="hidden" name="sender_id" id="sender_id" value="<?php echo $_SESSION['admin_id'];?>" />
							<label>From</label> 
							
							<div style="padding-left:20px"><?php echo $_SESSION['username'];?></div>
						</fieldset><div class="clear"></div>
						
						<fieldset style="width:48%; float:left;">
							<label> To</label>
							
							<div style="float:left">
							<input type="radio" name="chkUserTo" checked="checked" value="Supplier" style="float:left;width:50px;height:20px;" onclick="fn_toggle(this.value);" />Supplier
							</div>
							
							<div >
							<input type="radio" name="chkUserTo"  value="Customer" style="float:left;width:50px;height:20px;" onclick="fn_toggle(this.value);" />Customer
							</div>
							
							<div id="suppdiv" style="display:block">
							<br />
							<?php
							
								/*echo "<pre>";
								print_r($arrSupplier);
								echo "</per>";*/
							?>
							<input type="text" name="receiver_id2" id="receiver_id2"  />
							
							</div>
							
							<div id="custdiv" style="display:none">
							<br />
							<?php
								/*echo "<pre>";
								print_r($arrSupplier);
								echo "</per>";*/
							?>
								<input type="text" name="receiver_id1" id="receiver_id1"  />
								<!--<textarea name="receiver_id1" id="receiver_id1" style="width:400px" rows="3"></textarea>-->
							</div>
						</fieldset><div class="clear"></div>
						
						<fieldset style="width:98%; float:left; margin-right: 3%;" >
							<label>	Subject </label> 
							<input type="text" id="subject" name="subject"  style="width:550px;"/>
						</fieldset>
						
						<fieldset style="width:98%; float:left;">
							<label> Message</label><textarea id="message" name="message" rows="5" style="width:550px;"></textarea>
						</fieldset><div class="clear"></div>	
				</div>
					<footer>
				<div class="submit_link">
					<input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" class="alt_btn">
					<input type="reset" name="btnReset" id="btnReset" value="Reset">
					<input type="button" name="btnCancel" id="btnCancel" value="Cancel" class="btn_cancel">
				</div>
			</footer>
			</article><!-- end of post new article -->
		</form>
		<div class="spacer"></div>
	</section>
</body>
</html>