<?php
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/Admin.php");
require_once("../../pi_classes/ThumbLib.inc.php");
chkAdminLogin();
$Obj=new Admin();
$ObjDetail=clone $Obj;
if(isset($_GET['act_id']) || $_GET['act_id']!='')
{	
	$edit_id=$_GET['act_id'];
	$result=$Obj->getRecord_country_ById($edit_id);
	$whereCnd="`country_id`=".$edit_id;
	$pk_name=array();
	$res = $ObjDetail->getCountrySpecificRecordList("*",$whereCnd);
	while($res = mysql_fetch_assoc($res))
	{
		$pk_name[]=$res;
	}
}
if($_POST['country_name']!="")
{
	extract($_POST);	
	if($_POST['edit_id']!='')
	{		
		$activity_id=$_POST['edit_id'];			
		$set_fields = "`country_name`='".addslashes($_POST['country_name'])."', ";
		$set_fields .= "`long_name`='".addslashes($_POST['long_name'])."', ";
		$set_fields .= "`iso`='".addslashes($_POST['iso'])."', ";
		$set_fields .= "`country_code`='".addslashes($_POST['country_code'])."', ";
		$set_fields .= "`currency_code`='".addslashes($_POST['currency_code'])."', ";
		$set_fields .= "`currency_name`='".addslashes($_POST['currency_name'])."', ";
		$set_fields .= "`currency_symbol`='".addslashes($_POST['currency_symbol'])."', ";
		$set_fields .= "`country_for`='all'";
		$where_field .="`country_id`=".$activity_id;			
		$ObjDetail->updateCountrySpecificRecord($set_fields, $where_field);
		$_SESSION['msg']['updated']='updated';
	}
	else
	{
		$dfields="`country_id`,`country_name`,`long_name`,`iso`,`country_code`,`currency_code`,`currency_name`,`currency_symbol`,`country_for`" ;
		$dvalues="'','".addslashes($_POST['country_name'])."'";
		$dvalues .=",'".addslashes($_POST['long_name'])."'";
		$dvalues .=",'".addslashes($_POST['iso'])."'";
		$dvalues .=",'".addslashes($_POST['country_code'])."'";
		$dvalues .=",'".addslashes($_POST['currency_code'])."'";
		$dvalues .=",'".addslashes($_POST['currency_name'])."'";
		$dvalues .=",'".addslashes($_POST['currency_symbol'])."'";
		$dvalues .=",'all'";
		$cnf=$ObjDetail->insertCountryDetails($dfields,$dvalues);			
		$_SESSION['msg']['added']='added';
	}
	header("location:list.php");
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
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/hideshow.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.equalHeight.js"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery("#frmContinent").validate({		
		errorElement:'div',
		rules: {
			country_name: {
				required: true,
				remote:{
					url: "../ajax/ajax_request.php",
					type: "post",
					data: {
					  action:"chk_country_name",old_country_name:jQuery('#old_country_name').val(),action_type:jQuery('#action_type').val()
					}
				}
			},
			currency_code:{
				required:true	
			},
			country_code:{
				required:true
			}
		},
		messages: {
			country_name:{
				required:"Please enter country",
				remote: "This country already exist, please try another"
			},
			currency_code:{
				required:"Please enter currency code"
			},
			country_code:{
				required:"Please enter country code"
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
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>
	<section id="main" class="column">
		<form name="frmContinent" id="frmContinent" method="post">
		<input type="hidden" name="edit_id" value="<?php echo $Obj->getField('country_id');?>" />
		<input type="hidden" name="old_country_name" id="old_country_name" value="<?php echo $pk_name[0]['country_name'];?>" />
		<input type="hidden" name="action_type" id="action_type" value="<?php if($Obj->getField('country_id')){ echo "edit"; }else{ echo "add"; };?>" />
		<article class="module width_full">
			<header><h3><?php if(isset($_GET['act_id'])){ echo "Edit";}else{ echo "Add";}?> Country</h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/country/list.php" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Country Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="country_name" id="country_name" value="<?php echo stripslashes($pk_name[0]['country_name']);?>" style="width:92%;" />
						</fieldset>
						<fieldset style="width:48%; float:right;">
							<label>Country Long Name<sup style="color:#FF0000;font-weight:bold;"></sup></label>
							<input type="text" name="long_name" id="long_name" value="<?php echo stripslashes($pk_name[0]['long_name']);?>" style="width:92%;" />
						</fieldset>
						<div class="clear"></div>
						
						<fieldset style="width:48%; float:left;">
							<label>Country Code<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="country_code" id="country_code" value="<?php echo stripslashes($pk_name[0]['country_code']);?>" style="width:92%;" />
						</fieldset>
						
						<fieldset style="width:48%; float:right;">
							<label>ISO<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="iso" id="iso" value="<?php echo stripslashes($pk_name[0]['iso']);?>" style="width:92%;" />
						</fieldset>
						<div class="clear"></div>
						
						<fieldset style="width:48%; float:left;">
							<label>Curency Code<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="currency_code" id="currency_code" value="<?php echo stripslashes($pk_name[0]['currency_code']);?>" style="width:92%;" />
						</fieldset>
						<fieldset style="width:48%; float:right;">
							<label>Currency Name<sup style="color:#FF0000;font-weight:bold;"></sup></label>
							<input type="text" name="currency_name" id="currency_name" value="<?php echo stripslashes($pk_name[0]['currency_name']);?>" style="width:92%;" />
						</fieldset>
						<div class="clear"></div>
						
						<fieldset style="width:48%; float:left;">
							<label>Currency Symbol<sup style="color:#FF0000;font-weight:bold;"></sup></label>
							<input type="text" name="currency_symbol" id="currency_symbol" value="<?php echo stripslashes($pk_name[0]['currency_symbol']);?>" style="width:92%;" />
						</fieldset>
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