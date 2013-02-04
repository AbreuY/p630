<?php
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/Admin.php");
chkAdminLogin();
$ObjMsgDtl=new Admin();
if($_REQUEST['type']=="inbox")
{
	/* Update the status of message */
		$objadminUpdateStatus=clone $ObjMsgDtl;
		$objadminUpdateStatus->updateAdminMsgStatus(base64_decode($_REQUEST['message_id']));
	
	if($_REQUEST['user']=="customer")
	{
		$ObjMsgDtl->getAdminInboxMsgDtlCust(base64_decode($_REQUEST['message_id']));
	}
	elseif($_REQUEST['user']=="supplier")
	{
		$ObjMsgDtl->getAdminInboxMsgDtlSupp(base64_decode($_REQUEST['message_id']));
	}
}
elseif($_REQUEST['type']=="sent")
{
	if($_REQUEST['user']=="customer")
	{
		$ObjMsgDtl->getAdminSentMsgDtlCust(base64_decode($_REQUEST['message_id']));
	}
	elseif($_REQUEST['user']=="supplier")
	{
		$ObjMsgDtl->getAdminSentMsgDtlSupp(base64_decode($_REQUEST['message_id']));
	}
}
$ObjMsgDtl->getAllRow();
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
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>
	<section id="main" class="column">
		<form name="frmMessageDtl" id="frmMessageDtl" method="post">
		<article class="module width_full">
			<header><h3>Message Detail</h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
					<?php 
					if($_REQUEST['type']=="inbox")
					{
						if($_REQUEST['user']=='customer') {?>
							<a href="<?php echo AbstractDB::SITE_PATH;?>admin/messages/inbox_list.php" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
						<? }elseif($_REQUEST['user']=='supplier')
							{?>
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/messages/inbox_list_supplier.php" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
							<?php 
							}
					}elseif	($_REQUEST['type']=="sent")	
					{
						if($_REQUEST['user']=='customer') {?>
							<a href="<?php echo AbstractDB::SITE_PATH;?>admin/messages/sent_list.php" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
						<? }elseif($_REQUEST['user']=='supplier')
							{?>
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/messages/sent_list_supplier.php" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
							<?php 
							}
					}
					?>
					
					&nbsp;&nbsp;
					<a href="<?php echo AbstractDB::SITE_PATH;?>admin/messages/send_message.php">Send Message</a>
					</div>
				</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
					<?php 	
						if($_REQUEST['type']=="inbox")
						{
						?>
							<label>From</label>
							<div style="padding-left:20px">
							<?php
							if($_REQUEST['user']=="customer")
							{
							 echo $ObjMsgDtl->getField('first_name')." ".$ObjMsgDtl->getField('last_name'); 
							}
							elseif($_REQUEST['user']=="supplier")
							{
								 echo $ObjMsgDtl->getField('company_name'); 
							}
						}elseif($_REQUEST['type']=="sent")	
						{
							?>
							<label>To</label><?php
							if($_REQUEST['user']=="customer")
							{
							 echo $ObjMsgDtl->getField('first_name')." ".$ObjMsgDtl->getField('last_name'); 
							}
							elseif($_REQUEST['user']=="supplier")
							{
								 echo $ObjMsgDtl->getField('company_name'); 
							}
						}
							?>
							</div>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label> Date</label>
							<div style="padding-left:20px"><?php echo $ObjMsgDtl->getField('msg_date');?></div>
						</fieldset><div class="clear"></div>
						
						<fieldset style="width:98%; float:left; margin-right: 3%;" >
							<label>	Subject</label>
							<div style="padding-left:20px"><?php echo $ObjMsgDtl->getField('subject');?></div>
						</fieldset>
						<fieldset style="width:98%; float:left;">
							<label> Message</label><div style="padding-left:20px">
							<textarea readonly="readonly" style="width:600px;height:200px;"><?php echo $ObjMsgDtl->getField('message');?></textarea></div>
						</fieldset><div class="clear"></div>	
				</div>
			</article><!-- end of post new article -->
		</form>
		<div class="spacer"></div>
	</section>
</body>
</html>