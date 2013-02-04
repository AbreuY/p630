<?php
require_once(dirname(__FILE__)."/../../pi_classes/commonSetting.php");
require_once(dirname(__FILE__)."/../../pi_classes/Admin.php");
chkAdminLogin($_SESSION['adminID']);
$Obj=new Admin();
$ObjDetail=clone $Obj;

if(isset($_GET['act_id']) || $_GET['act_id']!='')
{
	$edit_id=$_GET['act_id'];
	$result=$Obj->getRecord_continent_ById($edit_id);
	$whereCnd="`continent_id`=".$edit_id;
	$pk_name=array();
	$res = $ObjDetail->getContinentSpecificRecordList("*",$whereCnd);
	while($res = mysql_fetch_assoc($res)) {
		$pk_name[]=$res;
	}
}

if($_POST['conti_name']!="")
{
	extract($_POST);
	if($_POST['edit_id']!='')
	{		
		$activity_id=$_POST['edit_id'];
		$set_fields = "`continent_name`='".$_POST['conti_name']."' ";			
		$where_field="`continent_id`=".$activity_id;			
		$ObjDetail->updateContinentSpecificRecord($set_fields, $where_field);		
		$_SESSION['msg']['updated']='updated';
	}
	else
	{
		$dfields="`continent_id`,`continent_name`" ;
		$dvalues="'','".$_POST['conti_name']."'";
		$cnf=$ObjDetail->insertContinentDetails($dfields,$dvalues);			
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
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
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
			conti_name: {
				required: true,
				remote:{
					url: "../ajax/ajax_request.php",
					type: "post",
					data: {
						action:"chk_continent_name",old_conti_name:jQuery('#old_conti_name').val(),action_type:jQuery('#action_type').val()
						}				  
					}
				}
		},
		messages: {
			conti_name:{
				required:"Please enter continent",
				remote:"This continent already exist, please try another"
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
	<?php include(dirname(__FILE__)."/../header.php");?>	
	<?php include(dirname(__FILE__)."/../menu.php");?>
	<section id="main" class="column">
		<form name="frmContinent" id="frmContinent" method="post">
		<input type="hidden" name="edit_id" value="<?php echo $Obj->getField('continent_id');?>">
		<input type="hidden" name="old_conti_name" id="old_conti_name" value="<?php echo $pk_name[0]['continent_name'];?>" />
		<input type="hidden" name="action_type" id="action_type" value="<?php if($Obj->getField('continent_id')){ echo "edit"; }else{ echo "add"; };?>" />		
		<article class="module width_full">
			<header><h3><?php if(isset($_GET['act_id'])){ echo "Edit";}else{ echo "Add";}?> Continent</h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/continent/list.php" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Continent Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="conti_name" id="conti_name" value="<?php echo $pk_name[0]['continent_name'];?>" style="width:92%;" />
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