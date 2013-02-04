<?php
require_once("../../pi_classes/commonSetting.php");
chkAdminLogin($_SESSION['adminID']);
require_once("../../pi_classes/ThumbLib.inc.php");
require_once("../../pi_classes/Admin.php");
require_once('../../pi_classes/User.php');
require_once('../../pi_classes/class.category.php');
require_once('../../pi_classes/class.cms.php');
	/*echo "<pre>";
	print_r($_SESSION);
	echo "</pre>";*/
	
	if(isset($_POST['btnCustomerInfo']))
		{	
			if($_POST['btnCustomerInfo']="Next")
			{	$_SESSION['act_details']['what_included']=addslashes($_POST['what_included']);
				$_SESSION['act_details']['what_not_included']=addslashes($_POST['what_not_included']);
				$_SESSION['act_details']['need_to_bring']=addslashes($_POST['need_to_bring']);
				$_SESSION['act_details']['loc_to_get']=addslashes($_POST['loc_to_get']);
				$_SESSION['act_details']['physical_address']=addslashes($_POST['physical_address']);
				$_SESSION['act_details']['pickup_transfer_service']=addslashes($_POST['pickup_transfer_service']);
				$_SESSION['act_details']['guideline_for_pub_trans']=addslashes($_POST['guideline_for_pub_trans']);
				$_SESSION['act_details']['parking_detail']=addslashes($_POST['parking_detail']); 
				if(isset($_POST['act_id']))
				{
					header("location:participant_guideline.php?act_id=".$_REQUEST['act_id']."&user_id=".$_REQUEST['user_id']);
				}
				else
				{
					header("location:participant_guideline.php?user_id=".$_REQUEST['user_id']);
				}
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
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
		editor_selector:"mceEditor",
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
        template_external_list_url : "<?php echo AbstractDB::SITE_PATH;?>js/template_list.js",
        external_link_list_url : "<?php echo AbstractDB::SITE_PATH;?>js/link_list.js",
        external_image_list_url : "<?php echo AbstractDB::SITE_PATH;?>js/image_list.js",
        media_external_list_url : "<?php echo AbstractDB::SITE_PATH;?>js/media_list.js",

        // Replace values for the template plugin
        template_replace_values : {
                username : "Some User",
                staffid : "991234"
        }
});
</script>

<script type="text/javascript">
jQuery(document).ready(function(){
		jQuery("#frmKeyCustInfo").validate({		
		errorElement:'div',
		rules: { 		
			what_included: {
				required: true 
			},
			what_not_included: {
				required: true 
			},
			need_to_bring: {
				required: true 
			},
			loc_to_get: {
				required: true 
			},
			physical_address: {
				required: true 
			},
			pickup_transfer_service: {
				required: true 
			},
			guideline_for_pub_trans: {
				required: true 
			},
			parking_detail: {
				required: true 
			}	
					
	    },
		messages: { 		
			what_included: {
				required: "Please enter what is to be included information"
			},
			what_not_included: {
				required: "Please enter what is to be not included information" 
			},
			need_to_bring: {
				required: "Please enter need to bring information" 
			},
			loc_to_get: {
				required: "Please enter location to get information" 
			},
			physical_address: {
				required: "Please enter physical address information" 
			},
			pickup_transfer_service: {
				required: "Please enter pickup and transfer service information"  
			},
			guideline_for_pub_trans: {
				required: "Please enter guideline for public transport information" 
			},
			parking_detail: {
				required: "Please enter parking information"
			}
	   }	
		});
	});		
</script>
<script type="text/javascript">
 function CountLeft(field, count, max)
 {
 	if (field.value.length > max)
 	field.value = field.value.substring(0, max);
 	else
 	count.value = max - field.value.length;
 }
 </script> 
 <!--
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
-->

<title>Add Activity</title>
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
		<form name="frmKeyCustInfo" id="frmKeyCustInfo" method="POST" enctype="multipart/form-data">
		<article class="module width_full" style="width:95%">
		<div id="loading"></div>		
			<?php include("../supplier_menu.php");?>
		<header><h3 class="tabs_involved">Edit Activity</h3>
		</header>
		<!--<header>
				<div style="float: left;padding: 5px 0 0 20px;">
					<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/list.php" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
				</div>
		</header>-->
		<div class="module_content">
							<fieldset style="width:100%; float:left;">
								<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
							</fieldset><div class="clear"></div>
<script type="text/javascript">
function fn_to_go_back()
{
	location.href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/edit_activity.php?goback=goback&user_id="+jQuery("#user_id").val()+"&act_id="+jQuery("#act_id").val()+"&what_included="+jQuery("#what_included").val()+"&what_not_included="+jQuery("#what_not_included").val()+"&need_to_bring="+jQuery("#need_to_bring").val()+"&loc_to_get="+jQuery("#loc_to_get").val()+"&physical_address="+jQuery("#physical_address").val()+"&pickup_transfer_service="+jQuery("#pickup_transfer_service").val()+"&guideline_for_pub_trans="+jQuery("#guideline_for_pub_trans").val()+"&parking_detail="+jQuery("#parking_detail").val();
}
</script>							
							<fieldset style="width:100%; float:left;">
									<h2>Key customer information</h2>
								  <input type="hidden" name="user_id" id="user_id" value="<?php echo $_REQUEST['user_id'] ?>" />
								  <?php if(isset($_REQUEST['act_id'])) {?>
									  <input type="hidden" name="act_id" id="act_id" value="<?php echo $_REQUEST['act_id'] ?>" />
								  <?php }?>
							</fieldset><div class="clear"></div>
							<fieldset style="width:100%; float:left;padding-left:10px">
								<label for="what_included">What is Included?<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
								<p>Eg, 2 hours rafting on the Rangitata River, lunch, all specialist equipment. Please populate in point form below.</p>
							   <textarea rows="3" cols="15" id="what_included" name="what_included"><?php
							   	$boxobj=new cms();
							   if($_SESSION['act_details']['what_included']!="")
								{
									echo stripslashes($_SESSION['act_details']['what_included']);
								}
								/*else
								{	$box_name="Activity Included";
									$boxobj->getBox($box_name);
									$num_chk = $boxobj->getRow();
									$what_included=html_entity_decode($boxobj->getField('content'));
									echo stripslashes($what_included);
								}*/?></textarea>
							</fieldset><div class="clear"></div>
						
							<fieldset style="width:100%; float:left;padding-left:10px">
								<label for="what_not_included">What is NOT included?<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
								<textarea rows="3" cols="15"  id="what_not_included" name="what_not_included"><?php 
								if($_SESSION['act_details']['what_not_included']!="")
								{
									echo stripslashes($_SESSION['act_details']['what_not_included']);
								}
								/*else
								{	$boxobj1=clone $boxobj;
									$box_name="Activity Not Included";
									$boxobj->getBox($box_name);
									$num_chk = $boxobj->getRow();
									$what_not_included=html_entity_decode($boxobj->getField('content'));
									echo stripslashes($what_not_included);
								}*/?></textarea>
							</fieldset>	<div class="clear"></div>
							
							<fieldset style="width:100%; float:left;">
								<label for="need_to_bring">What do customers need to bring?<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
								<textarea rows="3" cols="15" id="need_to_bring" name="need_to_bring" ><?php echo $_SESSION['act_details']['need_to_bring'];?></textarea>
							</fieldset><div class="clear"></div>
							
							<fieldset style="width:100%; float:left;">
								<label for="loc_to_get">Location and getting to you<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
								<p>What is the broad location? e.g.: 30-minute drive from Sydney. If you're mobile, please detail how far you'll go and any fees incurred. </p>
								<textarea rows="3" cols="15" id="loc_to_get" name="loc_to_get" ><?php echo $_SESSION['act_details']['loc_to_get'];?></textarea>
							</fieldset><div id="clear"></div>
							
							<fieldset style="width:100%; float:left;">
							<label for="physical_address" style="width:500px">Physical Address (where customers meet)</label>
									Please enter the address in the following format without the country name(This will reflect on the Google Map):
								<i style="font-size:12px; color:#FF6600;"><br>
									Eg: Gate 3 Olympic Stand Melbourne Cricket Ground Brunton Avenue East Melbourne VIC 3002
								</i>
								 <sup style="color:#FF0000;font-weight:bold;">*</sup>
								<textarea rows="3" cols="15" id="physical_address" name="physical_address"><?php echo $_SESSION['act_details']['physical_address'];?></textarea>
							</fieldset><div id="clear"></div>

							<fieldset style="width:100%; float:left;">
									<label for="pickup_transfer_service">Do you provide a pick-up / transfer service? If so where from, how often and how is it booked?<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
									<textarea rows="3" cols="15" id="pickup_transfer_service" name="pickup_transfer_service"><?php echo $_SESSION['act_details']['pickup_transfer_service'];?></textarea>
							</fieldset><div class="clear"></div>
							
							<fieldset style="width:100%; float:left;">
									<label for="guideline_for_pub_trans">Is your activity accessible by public transport? If so, do you have some brief guidelines?<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
									<textarea rows="3" cols="15" id="guideline_for_pub_trans" name="guideline_for_pub_trans"><?php echo $_SESSION['act_details']['guideline_for_pub_trans'];?></textarea>
							</fieldset><div id="clear"></div>
							
							<fieldset style="width:100%; float:left;">
									 <label for="parking_detail">Is parking available/ free?<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
									<textarea rows="3" cols="15" id="parking_detail" name="parking_detail"><?php echo $_SESSION['act_details']['parking_detail'];?></textarea>
							</fieldset><div id="clear"></div>	
													
						</div>
							<div class="clear"></div>
							
							
		<footer>
				
				<div class="submit_link">
					<input type="submit" value="Next" id="btnCustomerInfo" name="btnCustomerInfo" class="btn3 admin-btn1 admin-btn" style="padding-bottom: 3px;" />
				</div>
				
				<div class="submit_link">
					<input type="button" value="Back" id="btnCustomerInfoBack" name="btnCustomerInfoBack" class="btn3 admin-btn1 admin-btn" onclick="fn_to_go_back();" style="padding-bottom: 3px;" />
				</div>
		</footer>
		</div>
</article><!-- end of post new article -->

</form>
<div class="spacer"></div>
	</section>
</body>
</html>