<?php
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/Admin.php");
require_once("../../pi_classes/class.category.php");
chkAdminLogin();
$Obj=new category();
$ObjDetail=clone $Obj;
$objCategory=clone $Obj;
if(isset($_GET['sub_cat_id']) || $_GET['sub_cat_id']!='')
{
	$edit_id=$_GET['sub_cat_id'];
	$whereCnd="`sub_cat_id`=".$edit_id;
	$pk_name=array();
	$res = $ObjDetail->getSubCatSpecificRecordList("*",$whereCnd);
	while($res = mysql_fetch_assoc($res)) {
		$pk_name[]=$res;
	}
}
if($_POST['sub_cat_name']!="")
{
	extract($_POST);	
	if($_POST['edit_id']!='')
	{	
		$sub_cat_id=$_POST['edit_id'];
		$set_fields = "`cat_id`='".$_POST['cat_id']."' ";
		$set_fields .= ", `sub_cat_name`='".addslashes($_POST['sub_cat_name'])."' ";
		$where_field="`sub_cat_id`='".$sub_cat_id."'";		
			
		$ObjDetail->updateSubCatSpecificRecord($set_fields, $where_field);		
		$_SESSION['msg']['updated']="updated";	
	}
	else
	{
		//print_r($_POST);die();
		$dfields="`sub_cat_id`,`cat_id`,`sub_cat_name`" ;
		$dvalues="'','".addslashes($_POST['cat_id'])."', '".$_POST['sub_cat_name']."'";
		$cnf=$ObjDetail->insertSubCatDetails($dfields,$dvalues);			
		$_SESSION['msg']['added']="added";	
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

		/*$('#cat_id').on('change', function() {
 		 $('option:selected', this).attr('selected',true).siblings().removeAttr('selected');
		}); */

		
	jQuery("#frmSubCategory").validate({
		errorElement:'div',
		rules: {
			cat_id: {
				required: true
			},
			sub_cat_name:{
				required: true,
				remote:{
					url:"../ajax/ajax_request.php",
					type:"post",
					data:{
						action:"chk_sub_cat_name",cat_id:jQuery('#cat_id').val(),old_sub_cat_name:jQuery('#old_sub_cat_name').val(),action_type:jQuery('#action_type').val()
					}
				}
			}
		},
		messages: {
			cat_id:{
				required:"Please select category"
			},
			sub_cat_name: {
				required:"Please enter sub category name",
				remote: "This sub category already exist, please try another"
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
		<form name="frmSubCategory" id="frmSubCategory" method="post">
		<input type="hidden" id="edit_id" name="edit_id" value="<?php echo $_GET['sub_cat_id'];?>" />
		<input type="hidden" name="old_sub_cat_name" id="old_sub_cat_name" value="<?php echo $pk_name[0]['sub_cat_name'];?>" />
		<input type="hidden" name="action_type" id="action_type" value="<?php if($_GET['sub_cat_id']){ echo "edit"; }else{ echo "add"; };?>" />
		<article class="module width_full">
			<header><h3><?php if(isset($_GET['sub_cat_id'])){ echo "Edit";}else{ echo "Add";}?> Sub Category</h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/subcat/list.php" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Select Category<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<?php
								$objCategory->getRecordList();
							?>
							<select name="cat_id" id="cat_id">
								<option value="" selected="selected">--Select Category--</option>
								<?php 
									while($objCategory->getRow()){ 
								?>
									<option value="<?php echo $objCategory->getField('cat_id');?>" <?php if($pk_name[0]['cat_id']==$objCategory->getField('cat_id')){?> selected="selected" <?php }?>><?php echo $objCategory->getField('cat_name');?></option>
								<?php } ?>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Sub Category Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="sub_cat_name" id="sub_cat_name" value="<?php echo $pk_name[0]['sub_cat_name'];?>" style="width:92%;" />
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