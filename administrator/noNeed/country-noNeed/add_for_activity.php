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
		$file_name=time();
		if($_FILES['img_path']['name']!=''){
			$new_img_path_temp=$_FILES['img_path'];	
			$filename=explode(".",$new_img_path_temp['name']);
			$frontfile=time().".".$filename[1];				
			$target_path ="../../upload/photo/".$frontfile;		
			$dest="../../upload/photo/thumbnail/".$frontfile;
			$upsus=move_uploaded_file($new_img_path_temp['tmp_name'],$target_path);				  
			$thumb = PhpThumbFactory::create($target_path);
			$thumb->adaptiveResize(214, 117); //width, height
			$thumb->save($dest);		
		}else{
			$frontfile=$_POST['old_img_path'];
		}
		
		$set_fields = "`country_name`='".addslashes($_POST['country_name'])."', ";
		$set_fields .= "`country_code`='".addslashes($_POST['country_code'])."', ";
		$set_fields .= "`currency_code`='".addslashes($_POST['currency_code'])."', ";
		$set_fields .= "`currency_name`='".addslashes($_POST['currency_name'])."', ";
		$set_fields .= "`currency_symbol`='".addslashes($_POST['currency_symbol'])."', ";
		$set_fields .= "`activity_details`='".addslashes($_POST['activity_details'])."', ";
		$set_fields .= "`season`='".addslashes($_POST['season'])."', ";
		$set_fields .= "`itinerary`='".addslashes($_POST['itinerary'])."', ";
		$set_fields .= "`country_for`='activity', ";
		$set_fields .= "`image_path`='".$frontfile."'";
		$where_field .="`country_id`=".$activity_id;			
		$ObjDetail->updateCountrySpecificRecord($set_fields, $where_field);
		$_SESSION['msg']['updated']='updated';
	}
	else
	{
		if($_FILES['img_path']['name']!=''){
			$new_img_path_temp=$_FILES['img_path'];	
			$filename=explode(".",$new_img_path_temp['name']);
			$frontfile=time().".".$filename[1];				
			$target_path ="../../upload/photo/".$frontfile;		
			$dest="../../upload/photo/thumbnail/".$frontfile;
			$upsus=move_uploaded_file($new_img_path_temp['tmp_name'],$target_path);				  
			$thumb = PhpThumbFactory::create($target_path);
			$thumb->adaptiveResize(214, 117); //width, height
			$thumb->save($dest);		
		}
		$dfields="`country_id`,`country_name`,`long_name`,`iso`,`country_code`,`currency_code`,`currency_name`,`currency_symbol`,`activity_details`,`season`,`itinerary`,`country_for`,`image_path`" ;
		$dvalues="'','".addslashes($_POST['country_name'])."'";
		$dvalues .=",'".addslashes($_POST['long_name'])."'";
		$dvalues .=",'".addslashes($_POST['iso'])."'";
		$dvalues .=",'".addslashes($_POST['country_code'])."'";
		$dvalues .=",'".addslashes($_POST['currency_code'])."'";
		$dvalues .=",'".addslashes($_POST['currency_name'])."'";
		$dvalues .=",'".addslashes($_POST['currency_symbol'])."'";
		$dvalues .=",'".addslashes($_POST['activity_details'])."'";
		$dvalues .=",'".addslashes($_POST['season'])."'";
		$dvalues .=",'".$_POST['itinerary']."'";
		$dvalues .=",'activity'";
		$dvalues .=",'".$frontfile."'";
		$cnf=$ObjDetail->insertCountryDetails($dfields,$dvalues);			
		$_SESSION['msg']['added']='added';
	}
	header("location:list_for_activity.php");
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
			},
			currency_symbol:{
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
			},
			currency_symbol:{
				required:"Please enter country symbol"
			}
		}
	});
	
	jQuery('#btnCancel').click(function(){
		location.href="list_for_activity.php";
	});
});
</script>
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Skin options
        skin : "o2k7",
        skin_variant : "silver",

        // Example content CSS (should be your site CSS)
        //content_css : "css/example.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "js/template_list.js",
        external_link_list_url : "js/link_list.js",
        external_image_list_url : "js/image_list.js",
        media_external_list_url : "js/media_list.js",

        // Replace values for the template plugin
        template_replace_values : {
                username : "Some User",
                staffid : "991234"
        }
});
</script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>
	<section id="main" class="column">
		<form name="frmContinent" id="frmContinent" method="post" enctype="multipart/form-data">
		<input type="hidden" name="edit_id" value="<?php echo $Obj->getField('country_id');?>" />
		<input type="hidden" name="old_country_name" id="old_country_name" value="<?php echo $pk_name[0]['country_name'];?>" />
		<input type="hidden" name="action_type" id="action_type" value="<?php if($Obj->getField('country_id')){ echo "edit"; }else{ echo "add"; };?>" />
		<article class="module width_full">
			<header><h3><?php if(isset($_GET['act_id'])){ echo "Edit";}else{ echo "Add";}?> Country</h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>admin/country/list_for_activity.php" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
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
							<label>Currency Symbol<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="currency_symbol" id="currency_symbol" value="<?php echo stripslashes($pk_name[0]['currency_symbol']);?>" style="width:92%;" />
						</fieldset>
						<div class="clear"></div>
						
						<fieldset style="width:48%; float:left;">
							<label>Country Image<sup style="color:#FF0000;font-weight:bold;"></sup></label>
							<input type="file" name="img_path" id="img_path" style="width:92%;" />
							<input type="hidden" name="old_img_path" id="old_img_path" value="<?php echo $pk_name[0]['image_path'];?>" />
						</fieldset>
						<fieldset style="width:48%; float:right;">
							<label>Uploaded Image<sup style="color:#FF0000;font-weight:bold;"></sup></label>
							<?php if($pk_name[0]['image_path']!=''){?>
							<img style="margin-left:10px" src='<?php echo AbstractDB::SITE_PATH."upload/photo/thumbnail/".$pk_name[0]['image_path'];?>' border='0' />
							<?php }else {?>
							Image not uploeded yet.
							<?php } ?>
						</fieldset>
						<div class="clear"></div>
						
						
						<fieldset style="width:100%; float:left;">
							<label style="float:none;"><?php echo stripslashes($pk_name[0]['country_name']);?> Activities</label>
							<textarea  id="activity_details" name="activity_details" cols="100" rows="5" class="mceEditor" style="margin-left: 10px;"><?php echo stripslashes($pk_name[0]['activity_details']);?></textarea><br /><br />
							</fieldset><div class="clear"></div>
							
							
						<fieldset style="width:100%; float:left;">
							<label style="float:none;">Activities by Season</label>
							<textarea  id="season" name="season" cols="100" rows="5" class="mceEditor" style="margin-left: 10px;"><?php echo stripslashes($pk_name[0]['season']);?></textarea><br /><br />
							</fieldset><div class="clear"></div>
							
						<fieldset style="width:100%; float:left;">
							<label style="float:none;">Suggested Itineraries</label>
							<textarea  id="itinerary" name="itinerary" cols="100" rows="5" class="mceEditor" style="margin-left: 10px;"><?php echo stripslashes($pk_name[0]['itinerary']);?></textarea><br /><br />
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