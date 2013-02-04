<?php

require_once("../pi_classes/commonSetting.php");
require_once("../pi_classes/Admin.php");
require_once("../pi_classes/Category.php");
chkAdminLogin();
ob_start();
$Obj=new Admin();
$ObjDetail=clone $Obj;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IN ADMIN PANEL | Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/layout.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/ie.css" type="text/css" media="screen" />
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/hideshow.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.equalHeight.js"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery("#frmCategory").validate({
		errorElement:'div',
		rules: {
			cat_name: {
				required: true
			}
		},
		messages: {
			cat_name:{
				required:"Please enter category name"
			}
		}
	});
	
	jQuery('#btnCancel').click(function(){
		location.href="list.php";
	});
});
</script>
</head>
<body>
	<?php include("header.php");?>	
	<?php include("menu.php");?>
	<section id="main" class="column">
		<form name="frmCategory" id="frmCategory" method="post">
		<input type="hidden" name="cat_id" value="<?php echo $Obj->getField('cat_id');?>">
		<article class="module width_full">
				<?php
						#Updating the read status
						$id=base64_decode($_GET['id']);
						$Obj->UpdateReadStatus($id);
						
						#gettting the deatil message.
						$Obj->getCntMsgById($id); 
						while($Obj->getAllRow()){
				?>
			<header><h3>Message From <?php echo $Obj->getField('name'); ?></h3></header>
                <header>
                   <div style="float: left;padding: 5px 0 0 20px;">
                        <a href="<?php echo AbstractDB::SITE_PATH;?>admin/manage_contact_message.php" title="Go back"><img src="images/back_icon2.png" border="0" /></a>	</div>
                </header>
                    <div class="module_content">
						<fieldset>
							<?php
								echo "<pre>";
								echo $Obj->getField('message');
								echo "</pre>";
								}
							?>
						</fieldset>
						
				</div>
			<!--<footer>
				<div class="submit_link">
					<input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" class="alt_btn">
					<input type="reset" name="btnReset" id="btnReset" value="Reset">
					<input type="button" name="btnCancel" id="btnCancel" value="Cancel" class="btn_cancel">
				</div>
			</footer>-->
		</article><!-- end of post new article -->
		</form>
		<div class="spacer"></div>
	</section>
</body>
</html>