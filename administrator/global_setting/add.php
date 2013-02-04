<?php
#RequiresFiles:
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/Admin.php");
chkAdminLogin();	
$adminname=$_SESSION['admin_name'];
$adminid=$_SESSION['admin_Id'];
#Objects:
$admin = new Admin();
extract($_GET);
extract($_POST);	
if(isset($_GET['edit_id']) || $_GET['edit_id']!='')
{
	$id=$_GET['edit_id'];
	$result=$admin->getGlobalRecordById($id);
	$admin->getField('name');
	$admin->getField('value');
}
if($_POST['btnsubmit']!="")
{
	if($_POST['edit_id']!='')
	{		
		$set_fields="`value`='".$value."'";
		$where_field="`id`=".$_POST['edit_id'];
		$rs=$admin->updateGlobalSetting($set_fields, $where_field);
		$_SESSION['msg']['updated']="<span class='success'>Record updated successfully!</span>";	
	}	
	header("location:list.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Global Variable| Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/layout.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/ie.css" type="text/css" media="screen" />
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/hideshow.js" language="javascript" type="text/javascript"></script>
<!--<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.tablesorter.min.js" language="javascript" type="text/javascript"></script>-->
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.equalHeight.js"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript" src="<?=AbstractDB::SITE_PATH?>administrator/js/ajaxupload.3.5.js" ></script>
<script type="text/javascript">
$(document).ready(function(){
//alert("Hello");
    $("#frmGlobalSettings").validate({
		 errorElement:'div',
		 rules: {	 
			value:{
				required: true,
			}
		},
		messages: {
			value:{
				required: "Please enter value",
			}
		},
		// set this class to error-labels to indicate valid fields
		success: function(label) {
		// set &nbsp; as text for IE
			label.hide();
		}
	});

});


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
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	

	<section id="main" class="column">	
<form name="frmGlobalSettings" id="frmGlobalSettings" action="" method="POST" style="width: 80%;">
<article class="module width_full" style="width:120%">
		<div id="loading"></div>	
		<header><h3>Edit Global Setting</h3></header>
		
<header>
	<div style="float: left;padding: 5px 0 0 20px;">
		<a href="<?php echo AbstractDB::SITE_PATH;?>administrator/global_setting/list.php" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
	</div>
</header>

<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						
						<fieldset style="float:left; width:100%">
						<input type="hidden" name="edit_id" value="<? echo $_GET['edit_id']; ?>"/>
							<label>Parameter Name:</label>
							<strong><? echo $name=$admin->getField('name'); ?></strong>
						</fieldset>
						
						<fieldset>
						<input type="hidden" name="edit_id" value="<? echo $_GET['edit_id']; ?>"/>
							<label>Parameter Value:<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							 <? 
	  $value=$admin->getField('value');
	  if(strcmp($name,"LANDING_MODE")==0)
	  {
	  ?>
	  	<select name="value" id="value" class="FETextInput" style="width:100px">
			<option value="OFF" <? if(strcmp($value,"OFF")==0){ ?> selected="selected" <? } ?>>OFF</option>
			<option value="ON" <? if(strcmp($value,"ON")==0){ ?> selected="selected" <? } ?>>ON</option>			
		</select>
	  
	  <?
	  }
	  else
	  {
	  ?>
		<input type="text" name="value" id="value" value="<? echo $value; ?>" size="60" class=""/>	
		
	  <?
	  }	  
	  ?>
						</fieldset>
						</div>
<footer>
	<div class="submit_link" style="float:left; margin-left:20px;">
		<input class="btn3 alt_btn" type="submit" name="btnsubmit" id="btnsubmit" value="Submit"/>
		
	</div>
</footer>
</article>
</FORM>
<div class="spacer"></div>
	</section>			
</body>
</html>