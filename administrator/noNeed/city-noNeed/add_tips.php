<?php
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/Admin.php");
require_once("../../pi_classes/ThumbLib.inc.php");
chkAdminLogin();
$Obj=new Admin();
$ObjDetail=clone $Obj;
if(isset($_GET['tips_id']) || $_GET['tips_id']!='')
{	
	$tips_id=$_GET['tips_id'];
	$whereCnd="`id`=".$tips_id;
	$pk_name=array();
	$res = $ObjDetail->getCountryCityTipsList("*",$whereCnd);
	while($res = mysql_fetch_assoc($res))
	{
		$pk_name[]=$res;
	}
}

if($_POST['tips_content']!="")
{
	extract($_POST);	
	if($_POST['tips_id']!='')
	{		
		$tips_id=$_POST['tips_id'];			
		$set_fields = "`tips_content`='".addslashes($_POST['tips_content'])."'";
		$where_field .="`id`=".$tips_id;			
		$ObjDetail->updateCountryCityTips($set_fields, $where_field);
		$_SESSION['msg']['updated']='updated';
	}
	else
	{
		$dfields="`id`,`tips_for`,`country_city_id`,`tips_content`,`tips_status`,`add_date`" ;
		$dvalues="'','City'";
		$dvalues .=",'".$_POST['city_id']."'";
		$dvalues .=",'".addslashes($_POST['tips_content'])."'";
		$dvalues .=",'Active'";
		$dvalues .=",'".date("Y-m-d H:i:s")."'";
		$cnf=$ObjDetail->insertCountryCityTipsDetails($dfields,$dvalues);			
		$_SESSION['msg']['added']='added';
	}
	header("location:manage_tips.php?id=".$_POST['city_id']);
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
	jQuery("#frmAddTips").validate({		
		errorElement:'div',
		rules: {
			tips_content: {
				required: true
			}
		},
		messages: {
			tips_content:{
				required:"Please enter tips content"
			}
		}
	});
	
	jQuery('#btnCancel').click(function(){
		location.href="manage_tips.php?id="+jQuery('#city_id').val();
	});
});
</script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>
	<section id="main" class="column">
		<form name="frmAddTips" id="frmAddTips" method="post">
		<input type="hidden" name="tips_id" value="<?php echo $_REQUEST['tips_id'];?>" />
		<input type="hidden" name="city_id" value="<?php echo $_REQUEST['id'];?>" />
		<article class="module width_full">
			<header><h3><?php if(isset($_GET['tips_id'])){ echo "Edit";}else{ echo "Add";}?> Tips</h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/city/manage_tips.php?id=<?php echo $_REQUEST['id'];?>" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Tips Content<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<textarea name="tips_content" id="tips_contetn" rows="3" cols="20"><?php echo $pk_name[0]['tips_content'];?></textarea>
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