<?php
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/Admin.php");
chkAdminLogin();
$Obj=new Admin();
$ObjDetail=clone $Obj;
$ObjCountry=clone $Obj;
if(isset($_GET['act_id']) || $_GET['act_id']!='')
{
	$edit_id=$_GET['act_id'];
	$result=$Obj->getRecord_city_ById($edit_id);
	$whereCnd="`city_id`=".$edit_id;
	$pk_name=array();
	$res = $ObjDetail->getCitySpecificRecordList("*",$whereCnd);
	while($res = mysql_fetch_assoc($res)) {
		$pk_name[]=$res;
	}
}
if($_POST['city_name']!="")
{
	extract($_POST);	
	if($_POST['edit_id']!='')
	{		
		$activity_id=$_POST['edit_id'];
		$set_fields = "`city_name`='".addslashes($_POST['city_name'])."' ";
		$set_fields .= ", `country_id`='".$_POST['country_id']."' ";
		$set_fields .= ", `lat`='".$_POST['lat']."' ";
		$set_fields .= ", `lan`='".$_POST['lan']."' ";	
		$set_fields .= ", `city_activity_desc`='".addslashes($_POST['city_activity_desc'])."' ";
	$set_fields .= ", `city_authentic_activity`='".addslashes($_POST['city_authentic_activity'])."' ";
	$set_fields .= ", `city_nigth_time_activity`='".addslashes($_POST['city_nigth_time_activity'])."' ";
		$where_field="`city_id`='".$activity_id."'";		
			
		$ObjDetail->updateCitySpecificRecord($set_fields, $where_field);		
		$_SESSION['msg']['updated']="updated";	
	}
	else
	{
		$dfields="`city_id`,`city_name`,`country_id`,`lat`,`lan`,`city_for`" ;
		$dvalues="'','".addslashes($_POST['city_name'])."', ".$_POST['country_id'].",'".$_POST['lat']."','".$_POST['lan']."','all'";
		$cnf=$ObjDetail->insertCityDetails($dfields,$dvalues);			
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
	jQuery("#frmCity").validate({
		errorElement:'div',
		rules: {
			country_id: {
				required: true
			},
			city_name:{
				required: true,
				remote:{
					url: "../ajax/ajax_request.php",
					type: "post",
					data: {
					  action:"chk_city_name",old_city_name:jQuery('#old_city_name').val(),action_type:jQuery('#action_type').val()
					}
				}
			}/*,
			lat:{
				required: true,
			},
			lan:{
				required: true,
			}*/
		},
		messages: {
			country_id:{
				required:"Please select country"
			},
			city_name: {
				required:"Please enter city name",
				remote: "This city already exist, please try another"
			}/*,
			lat: {
				required:"Please enter latitude."
			},
			lan: {
				required:"Please enter longitude."
			}*/
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
		<form name="frmCity" id="frmCity" method="post">
		<input type="hidden" id="edit_id" name="edit_id" value="<?php echo $_GET['act_id'];?>" />
		<input type="hidden" name="old_city_name" id="old_city_name" value="<?php echo $pk_name[0]['city_name'];?>" />
		<input type="hidden" name="action_type" id="action_type" value="<?php if($_GET['act_id']){ echo "edit"; }else{ echo "add"; };?>" />
		<article class="module width_full">
			<header><h3><?php if(isset($_GET['act_id'])){ echo "Edit";}else{ echo "Add";}?> City</h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/city/list.php" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Select Country<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<?php
								$ObjCountry->getAllCountry();
							?>
							<select name="country_id" id="country_id">
								<option value="">--Select Country--</option>
								<?php 
									while($ObjCountry->getRow()){ 
								?>
									<option value="<?php echo $ObjCountry->getField('country_id');?>" <?php if($pk_name[0]['country_id']==$ObjCountry->getField('country_id')){ echo "selected=selected"; } ?>><?php echo $ObjCountry->getField('country_name');?></option>
								<?php } ?>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>City Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="city_name" id="city_name" value="<?php echo $pk_name[0]['city_name'];?>" style="width:92%;" />
						</fieldset><div class="clear"></div>
						
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>latitude<sup style="color:#FF0000;font-weight:bold;"></sup></label>
							<input type="text" name="lat" id="lat" value="<?php echo $pk_name[0]['lat'];?>" style="width:92%;" />
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Longitude<sup style="color:#FF0000;font-weight:bold;"></sup></label>
							<input type="text" name="lan" id="lan" value="<?php echo $pk_name[0]['lan'];?>" style="width:92%;" />
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