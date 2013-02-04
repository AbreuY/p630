<?php
require_once("../../pi_classes/commonSetting.php");
chkAdminLogin();
require_once("../../pi_classes/class.category.php");
$Obj=new category();
$ObjDetail=clone $Obj;

$parentCatQry="`parent_id`=0";
$parentcat=array();
$Obj->getRecordList("*",$parentCatQry);
while($temp=$Obj->getRow(true))
{
	$cat_id=$temp['cat_id'];
	$whereCnd="`cat_id`=".$cat_id." and lang_id=".DEFAULT_LANG_ID;
	$ObjDetail->getLanguageSpecificRecordList("*",$whereCnd);
	$ObjDetail->getRow();
	$temp['cat_name']=$ObjDetail->getField('cat_name');

	$parentcat[]=$temp;
}

//echo "<pre>"; print_r($parentcat); exit;

if(isset($_GET['edit_id']) || $_GET['edit_id']!='')
{
	$edit_id=$_GET['edit_id'];
	$result=$Obj->getRecordById($edit_id);
	
	$cat_parent_id=$Obj->getField('parent_id');
	
	$whereCnd="`cat_id`=".$edit_id;
	$pk_name=array();
	$ObjDetail->getLanguageSpecificRecordList("*",$whereCnd);
	while($temp=$ObjDetail->getRow(true))
	{
		$pk_name[]=$temp;
	}
//echo "<pre>"; print_r($pk_name); exit;
}


if($_POST['btnSubmit']!="")
{
	extract($_POST);
//	echo "<pre>"; print_r($_POST); exit;

	if($_POST['edit_id']!='')
	{		
		$set_fields="`parent_id`='".$parent_cat_id."'";
		$where_field="`cat_id`=".$_POST['edit_id'];
		$rs=$Obj->updateRecord($set_fields, $where_field);
		
		for($i=0;$i<10;$i++)
		{
			$updt_lang_id=$i+1;
			$cat_id=$_POST['edit_id'];
			$set_fields="`cat_name`='".$subcat_name[$i]."'";
			$where_field="`lang_id`=".$updt_lang_id." and `cat_id`=".$cat_id;			
			$ObjDetail->updateLanguageSpecificRecord($set_fields, $where_field);
		}
		
		//exit;
		$_SESSION['msg1']="<span class='success'>Sub Category updated successfully!</span>";	
	}
	else
	{
		//echo "<pre>"; print_r($_POST); exit;
		$fields="`parent_id`";
		$values="'".$parent_cat_id."'";
		$cnf=$Obj->insertRecord($fields,$values);			
		$cat_id=$Obj->getLastID();
		for($i=0;$i<10;$i++)
		{
			//$ObjDetail
			$ins_lang_id=$i+1;
			$dfields="`cat_id`, `lang_id`, `cat_name`";
			$dvalues="'".$cat_id."','".$ins_lang_id."', '".$subcat_name[$i]."'";
			$cnf=$ObjDetail->insertLanguageSpecificDetails($dfields,$dvalues);			
		}

//		insertLanguageSpecificDetails
		$_SESSION['msg1']="<span class='success'>Sub Category added successfully!</span>";	
	}
//	exit;
	//header("location:".$_SERVER['HTTP_REFERER']);
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
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/hideshow.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.equalHeight.js"></script>
<script type="text/javascript" src="<?php echo SITE_PATH; ?>js/jquery.validate.pack.js"></script>
<script type="text/javascript" language="javascript">
jQuery(document).ready(function(){
	//alert("Hello");
	 jQuery("#frmRegister").validate({
  	 errorElement:'div',
	 rules: {	 
			 parent_cat_id:{
			 	required: true	
			 },
			"subcat_name[]":{
				required: true	
			}		
		},

		messages: {
			 parent_cat_id:{
			 	required: "Please select parent category"
			 },
			"subcat_name[]":{
				required: "Please enter subcategory name"	
			}
		}
		
		});

});

</script>
<style>
.error {
  color: #FF0000;
  float: left;
  padding: 0 0 0 13px;
}
#loading { 
width: 70%; 
text-align:center;
padding-top:40px;
position: absolute;
}
.tablesorter td {
    padding: 10px;
}
</style>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>
	<section id="main" class="column">
		
		<article class="module width_full">
		<div id="loading"></div>
		
		<header>
			<h3 class="tabs_involved">Edit Sub Category </h3>
		</header>
	<form name="frmRegister" id="frmRegister" action="" method="post">

	<input type="hidden" name="edit_id" value="<? echo $Obj->getField('cat_id');?>">
	<?php if($msg != ''){ ?>
	<div align="center"><? echo $msg; ?></div>
	<?php } ?>
	<table cellpadding="5px">
	
	<tr>
	<td valign="middle"><span class="FEFieldTitle"  style="width: 60">Select Category: </span></td>	
	<td>
		<fieldset><select id="parent_cat_id" name="parent_cat_id" class="FETextInput">
			<option value="">Select Category</option>
			<?php 
			for($i=0;$i<count($parentcat);$i++){
			$cur_cat_id=$parentcat[$i][cat_id];
			?>
			<option value="<? echo $cur_cat_id; ?>" <? if($cat_parent_id==$cur_cat_id){?> selected="selected" <? } ?>><? echo $parentcat[$i][cat_name]; ?></option>
			<?php } ?>
		</select></fieldset>
	</td>
	</tr>
	
	<tr>
		<td valign="top"><span class="FEFieldTitle" style="width: 60; margin-top:20px; display:block;">Subcategory Name: </span></td>
	
		
			<?php
				for($i=0;$i<1;$i++)
				{
					if($i%2){
						$bg_color="#E0E0E3";
					}else{
						$bg_color="#FFFFFF";
					}	
			?>
			
				<!--<td><? //echo $lang[$i]['lang_name']; ?></td>-->
				<td style='background-color:<?php echo $bg_color;?>;'>		
				<fieldset >
					<input type="text" dir="ltr" class="FETextInput" name="subcat_name[]" value="<? echo $pk_name[$i]['cat_name']; ?>" size="80"  maxlength="255" style="width="95%" >
				</fieldset>
				</td>
			</tr>
			<?php } ?>			
		

	<!--<tr>
	<td valign="top"><span class="FEFieldTitle"  style="width: 60">Package Price: </span></td>	
	<td>
		<input type="text" dir="ltr" class="FETextInput" name="package_price" id="package_price"  value="<? echo $Obj->getField('package_price');?>" size="80"  maxlength="255">
	</td>
	</tr>-->
	

	
	<tr>
	<td>&nbsp;</td>
	<td>
		<input type="SUBMIT" value="Submit" name="btnSubmit" class="btn3 admin-btn1">
	</td>
	</tr>	
	</table>
	
</form>>
</div>
</section>
</body>
</html>