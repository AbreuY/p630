<?php
	require_once('../../pi_classes/Admin.php');
	ob_start();
	session_start();
	if(empty($_SESSION['admin_id'])){
		header("location:login.php");
	}
	$objVoucherAmountDtl=new Admin();
	
	if(isset($_SESSION['msg'])){
		unset($_SESSION['msg']);
	}
	if(isset($_GET['voucher_amount_id']))
	{
		$voucher_amount_id=$_GET['voucher_amount_id'];
		$whereCnd="voucher_amount_id=".$voucher_amount_id;
		$arrVoucherAmount=array();
		$res =$objVoucherAmountDtl->getVoucherAmountSpecificRecord("*",$whereCnd);
		while($res = mysql_fetch_assoc($res))
		{
			$arrVoucherAmount[]=$res;
		}
	}
	
	if($_POST['btnSubmit']=='Submit'){
		extract($_POST);	
		if($_POST['edit_id']!='')
		{	
			$objUpdateVoucherAmount=clone $objVoucherAmountDtl;
			$objUpdateVoucherAmount->updateVoucherAmout($_POST);
			$_SESSION['msg']['updated']='updated';
			header("location:".AbstractDB::SITE_PATH."admin/gift_voucher/view_voucher.php");	
			
		}
		else
		{
			$objAddVoucherAmount=clone $objVoucherAmountDtl;
			$objAddVoucherAmount->addVoucherAmount($_POST);
			$_SESSION['msg']['added']='added';
			header("location:".AbstractDB::SITE_PATH."admin/gift_voucher/view_voucher.php");
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
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.validate.js" language="javascript" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.core.js"></script> 
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.datepicker.js"></script>	
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.all.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.theme.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.core.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.datepicker.css" rel="stylesheet" />



<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery("#frm_add_new_voucher_amount").validate({
		errorElement:'div',
			rules: {
				   voucher_amount:{
				 				  required:true
							      }
				 },
			messages: {
				  voucher_amount:{
								required: "Please Enter the promo code"
								}
					 }
	});
	
	jQuery('#btnCancel').click(function(){
		location.href="view_voucher.php";
	});
});
</script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">		
		<form name="frm_add_new_voucher_amount" id="frm_add_new_voucher_amount" method="post" >
			<input type="hidden" name="action_type" id="action_type" value="<?php if(isset($_GET['voucher_amount_id'])){echo "edit";} else {echo "add";}?>" />
			<input type="hidden" name="edit_id" id="edit_id" value="<?php echo $_GET['voucher_amount_id'];?>" />
		<article class="module width_full">
			<header><h3><?php if(isset($_REQUEST['voucher_amount_id'])){ echo "Edit"; } else { echo "Add New"; }?> Voucher</h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/gift_voucher/view_voucher.php" title="Go back"><img src="<?php echo AbstractDB::SITE_PATH;?>admin/images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Enter Voucher Amount<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
								<input type="text" name="voucher_amount" id="voucher_amount" value="<?php echo $arrVoucherAmount[0]['voucher_amount'];?>" />
						</fieldset><div class="clear"></div>
						<div class="clear"></div>
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