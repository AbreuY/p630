<?php
	require_once('../../pi_classes/Admin.php');
	ob_start();
	session_start();
	if(empty($_SESSION['admin_id'])){
		header("location:login.php");
	}
	$objPromocodeDtl=new Admin();
	
	if(isset($_SESSION['msg'])){
		unset($_SESSION['msg']);
	}
	if(isset($_GET['promo_id']))
	{
		$promo_id=$_GET['promo_id'];
		$whereCnd="promo_id=".$promo_id;
		$arrPromoCode=array();
		$res =$objPromocodeDtl->getPromoCodeSpecificRecord("*",$whereCnd);
		while($res = mysql_fetch_assoc($res))
		{
			$arrPromoCode[]=$res;
		}
	}
		if($_POST['action_type']=="edit"){ #Updating the promo code
			extract($_POST);
			$objUpdatePromocode=clone $objPromocodeDtl;
			$objUpdatePromocode->updatePromoCode($_POST);
			$_SESSION['msg']['updated']='updated';
			header("location:".AbstractDB::SITE_PATH."admin/promocode/view_promo_code.php");	
		}
		elseif($_POST['action_type']=="add"){ #inserting the promo code
			$objAddPromocode=clone $objPromocodeDtl;
			$objAddPromocode->addPromocode($_POST);
			$_SESSION['msg']['added']='added';
			header("location:".AbstractDB::SITE_PATH."admin/promocode/view_promo_code.php");
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
	jQuery("#frm_add_promo_code").validate({
		errorElement:'div',
			rules: {
				   promo_code:{
				 		required:true,
						remote:{
								url: "../ajax/ajax_request.php",
								type: "post",
								data: {
									 action:"chk_promo_code",old_promo_code:jQuery('#old_promo_code').val(),action_type:jQuery('#action_type').val()
								}
							}
				 },
				 discount:{
				 		required:true
				 },
				 other_discount:{
				 		required:true
				 },
				 edate:{
				 		required:true
				 }
			},
			messages:{
				promo_code:{
					required: "Please Enter the promo code",
					remote: "This promo code is already taken."
				},
				discount:{
						required:"Please select discount"
				},
				other_discount:{
						required:"Please select discount"
				},
				edate:{
						required:"Please select expiry date"
				}
				
			}
	});
	jQuery('#btnCancel').click(function(){
		location.href="view_promo_code.php";
	});
	
	jQuery("#edate").datepicker({minDate:0 ,maxDate: '+1Y',changeMonth: true,changeYear: true, dateFormat:'d-m-yy'});		

});
function show_other_discount(val){
	if(val=='other'){
		document.getElementById('hide2').style.display='';
		document.getElementById('hide1').style.display='none';
	}else if(val=='orignal'){
		document.getElementById('hide2').style.display='none';
		document.getElementById('hide1').style.display='';
	}
}
</script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">		
		<form name="frm_add_promo_code" id="frm_add_promo_code" method="post" action="">
        
			<input type="hidden" name="old_promo_code" id="old_promo_code" value="<?php echo $arrPromoCode[0]['promo_code']?>" />
			<input type="hidden" name="action_type" id="action_type" value="<?php if(isset($_GET['promo_id'])){echo "edit";} else {echo "add";}?>" />
			<input type="hidden" name="edit_id" id="edit_id" value="<?php echo $_GET['promo_id'];?>" />
		<article class="module width_full">
			<header><h3><?php if(isset($_REQUEST['promo_id'])){ echo "Edit"; } else { echo "Add New"; }?> Promo Code</h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/promocode/view_promo_code.php" title="Go back"><img src="<?php echo AbstractDB::SITE_PATH;?>admin/images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Promotion Code<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
								<input type="text" name="promo_code" id="promo_code" value="<?php echo $arrPromoCode[0]['promo_code'];?>" />
						</fieldset><div class="clear"></div>
						<fieldset id="hide1" style="width:48%; float:left;"> 						
							<label>Discount<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<select name="discount" id="discount" style="width:145px;">
							  <option value="">-- Select --</option>
							  <option value="10" <?php if($arrPromoCode[0]['discnt']=='10') {?>selected="selected"<? }?>>10%</option>
							  <option value="20" <?php if($arrPromoCode[0]['discnt']=='20') {?> selected="selected" <? }?>>20%</option>
							  <option value="30" <?php if($arrPromoCode[0]['discnt']=='30') {?> selected="selected" <? }?>>30%</option>
							  <option value="50" <?php if($arrPromoCode[0]['discnt']=='50') {?> selected="selected" <? }?>>50%</option>
							  <option value="100" <?php if($arrPromoCode[0]['discnt']=='100') {?> selected="selected" <? }?>>100%</option>
							  <option value="other" <?php if($arrPromoCode[0]['discnt']=='0') {?> selected="selected" <? }?>>Other</option>
							</select>&nbsp;E.g 10%,20%,30%,50%,100%
						</fieldset><div class="clear"></div>
						
						<div class="clear"></div>
						<fieldset style="width:48%; float:left;">
							<label>Expiry Date<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							 <input type="text" name="edate" id="edate" autocomplete="off" readonly="true" value="<?php echo $arrPromoCode[0]['exp_date']; ?>" />
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