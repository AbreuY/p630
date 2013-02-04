<?php
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/Admin.php");
chkAdminLogin();
$ObjMsgDtl=new Admin();
if($_REQUEST['type']=="inbox")
{
$ObjMsgDtl->getAdminInboxMessagesDetail(base64_decode($_REQUEST['message_id']));
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
			<header><h3>Message/<?php echo $ObjMsgDtl->getField('subject');?> </h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/messages/inbox_list.php" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>From : </label><?php echo $ObjMsgDtl->getField('company_name'); ?> 
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label> Date : </label><?php echo $ObjMsgDtl->getField('msg_date');?>
						</fieldset><div class="clear"></div>
						
						<fieldset style="width:98%; float:left; margin-right: 3%;" >
							<label>	Subject : </label> <?php echo $ObjMsgDtl->getField('subject');?>
						</fieldset>
						<fieldset style="width:98%; float:left;">
							<label> Message : </label><textarea readonly="readonly" style="width:600px;"><?php echo $ObjMsgDtl->getField('message');?></textarea>
						</fieldset><div class="clear"></div>	
				</div>
			</article><!-- end of post new article -->
		</form>
		<div class="spacer"></div>
	</section>
</body>
</html>