<?php
require_once("../../pi_classes/commonSetting.php");
chkAdminLogin($_SESSION['adminID']);
require_once("../../pi_classes/ThumbLib.inc.php");
require_once("../../pi_classes/Admin.php");
require_once('../../pi_classes/Activity.php');
require_once('../../pi_classes/class.cms.php');
		$objActivityDtl=new Activity;
		if(isset($_REQUEST['type']))
		{
				if($_REQUEST['type']=="new")
				{
					if(isset($_SESSION['cmp_details']))
						unset($_SESSION['cmp_details']);
					if(isset($_SESSION['act_details']))
						unset($_SESSION['act_details']);
				}
		}
	if(isset($_GET['activity_id']))
	{
		if(isset($_SESSION['act_details']))
			unset($_SESSION['act_details']);
			
				$_SESSION['submit_type']="Update";
		//Getting activity all information
		$whereCond="activity_id='".base64_decode($_REQUEST['activity_id'])."'";
		$objActivityDtl->getActivityDetail($whereCond);
		$objActivityDtl->getAllRow();
		$_SESSION['act_details']['activity_id']=$objActivityDtl->getField('activity_id');
		$_SESSION['act_details']['activity_booker_name']=$objActivityDtl->getField('activity_booker_name');
		$_SESSION['act_details']['description']=$objActivityDtl->getField('description');
		$_SESSION['act_details']['highlights']=$objActivityDtl->getField('highlights');
		$_SESSION['act_details']['highlights_detail']=$objActivityDtl->getField('highlights_detail');
		//$_SESSION['act_details']['options']=$objActivityDtl->getField('options');
		$_SESSION['act_details']['avail_duration']=$objActivityDtl->getField('avail_duration');
		//$_SESSION['act_details']['departure_time']=$objActivityDtl->getField('departure_time');
		//$_SESSION['act_details']['available_days']=$objActivityDtl->getField('available_days');
		$_SESSION['act_details']['what_included']=$objActivityDtl->getField('what_included');
		$_SESSION['act_details']['what_not_included']=$objActivityDtl->getField('what_not_included');
		$_SESSION['act_details']['need_to_bring']=$objActivityDtl->getField('need_to_bring');
		$_SESSION['act_details']['loc_to_get']=$objActivityDtl->getField('loc_to_get');
		$_SESSION['act_details']['physical_address']=$objActivityDtl->getField('physical_address');
		$_SESSION['act_details']['pickup_transfer_service']=$objActivityDtl->getField('pickup_transfer_service');
		$_SESSION['act_details']['guideline_for_pub_trans']=$objActivityDtl->getField('guideline_for_pub_trans');
		$_SESSION['act_details']['parking_detail']=$objActivityDtl->getField('parking_detail');
		$_SESSION['act_details']['restrictions']=$objActivityDtl->getField('restrictions');
		$_SESSION['act_details']['individual_requirent']=$objActivityDtl->getField('individual_requirent');
		$_SESSION['act_details']['min_max_info']=$objActivityDtl->getField('min_max_info');
		$_SESSION['act_details']['impairment_info']=$objActivityDtl->getField('impairment_info');
		$_SESSION['act_details']['extra_info']=$objActivityDtl->getField('extra_info');
		$_SESSION['act_details']['weather_info']=$objActivityDtl->getField('weather_info');
		$_SESSION['act_details']['reschedule_info']=$objActivityDtl->getField('reschedule_info');
		$_SESSION['act_details']['guide_info']=$objActivityDtl->getField('guide_info');
		$_SESSION['act_details']['min_number_policy']=$objActivityDtl->getField('min_number_policy');
		$_SESSION['act_details']['spectators_info']=$objActivityDtl->getField('spectators_info');
		/*$_SESSION['act_details']['friendwatch_policy']=$objActivityDtl->getField('friendwatch_policy');
		$_SESSION['act_details']['change_policy']=$objActivityDtl->getField('change_policy');
		$_SESSION['act_details']['cancel_policy']=$objActivityDtl->getField('cancel_policy');*/
		$_SESSION['act_details']['cat_id']=$objActivityDtl->getField('cat_id');
		$_SESSION['act_details']['category_suggesion']=$objActivityDtl->getField('category_suggesion');
	}

		if(isset($_REQUEST['btnActivity']))
		{
				if($_REQUEST['btnActivity']="Next")
				{
					$_SESSION['act_details']['activity_booker_name']=addslashes($_REQUEST['activity_booker_name']);
					$_SESSION['act_details']['description']=addslashes($_REQUEST['description']);
					$_SESSION['act_details']['highlights']=addslashes($_REQUEST['highlights']);
					$_SESSION['act_details']['highlights_detail']=addslashes($_REQUEST['highlights_detail']);
					//$_SESSION['act_details']['options']=addslashes($_REQUEST['options']);
					$_SESSION['act_details']['avail_duration']=addslashes($_REQUEST['avail_duration']);
					//$_SESSION['act_details']['departure_time']=addslashes($_REQUEST['departure_time']);
					if(isset($_REQUEST['act_id']))
					{
						header("location:key_customer_info.php?act_id=".$_REQUEST['act_id']."&user_id=".$_REQUEST['user_id']);
					}
					else
					{						
						header("location:key_customer_info.php?user_id=".$_REQUEST['user_id']);
					}
				}
		}
		if(isset($_REQUEST['goback']))
		{
			if($_REQUEST['goback']="goback")
			{	
				/*echo "<pre>";
				print_r($_REQUEST);die();
				echo "</pre>";*/
				$_SESSION['act_details']['what_included']=addslashes($_REQUEST['what_included']);
				$_SESSION['act_details']['what_not_included']=addslashes($_REQUEST['what_not_included']);
				$_SESSION['act_details']['need_to_bring']=addslashes($_REQUEST['need_to_bring']);
				$_SESSION['act_details']['loc_to_get']=addslashes($_REQUEST['loc_to_get']);
				$_SESSION['act_details']['physical_address']=addslashes($_REQUEST['physical_address']);
				$_SESSION['act_details']['pickup_transfer_service']=addslashes($_REQUEST['pickup_transfer_service']);
				$_SESSION['act_details']['guideline_for_pub_trans']=addslashes($_REQUEST['guideline_for_pub_trans']);
				$_SESSION['act_details']['parking_detail']=addslashes($_REQUEST['parking_detail']); 
				if($_REQUEST['act_id']!="" && $_REQUEST['act_id']!='undefined')
				{
					header("location:edit_activity.php?act_id=".$_REQUEST['act_id']."&user_id=".$_REQUEST['user_id']);
				}
				else
				{
					header("location:edit_activity.php?user_id=".$_REQUEST['user_id']);
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
		jQuery("#frmAddActivity").validate({		
		errorElement:'div',
		rules: { 		
			activity_booker_name: {
				required: true 
			},
			description: {
				required: true 
			},
			highlights: {
				required: true 
			},
			avail_duration: {
				required: true 
			}
					
	    },
		messages: { 		
			activity_booker_name: {
				required: "Please enter activity name"
			},
			description: {
				required: "Please enter activity discription"
			},
			highlights: {
				required: "Please enter activity highlights" 
			},
			avail_duration: {
				required: "Please enter availble duration" 
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
		<form name="frmAddActivity" id="frmAddActivity" method="POST" enctype="multipart/form-data">
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
		
							<fieldset style="width:100%; float:left;">
									<h2>Activity Details</h2>
							</fieldset><div class="clear"></div>

							<fieldset style="width:100%; float:left;">
								<label for="activity_name">Activity Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label><br />
										<p class="paragraph">The name is the title of your product / experience. Please do not feature your company name here. For example: Nevis Bung, Rafting the Rangitata River etc</p>
									  <input type="text" name="activity_booker_name" id="activity_booker_name" value="<?php echo $_SESSION['act_details']['activity_booker_name'];?>" />
									  <input type="hidden" name="user_id" id="user_id" value="<?php echo $_REQUEST['user_id'] ?>" />
									  <?php  if(isset($_REQUEST['activity_id']) || isset($_REQUEST['act_id'])) {?>
									   <input type="hidden" name="act_id" id="act_id" value="<?php if(isset($_REQUEST['activity_id'])){ echo $_REQUEST['activity_id'];}else{echo $_REQUEST['act_id'];} ?>" />		<?php }?>
							</fieldset><div class="clear"></div>
						
							<fieldset style="width:100%; float:left;">
							<label for="description">Description<sup style="color:#FF0000;font-weight:bold;">*</sup></label><br />
									<p class="paragraph">This Description appears as the opening copy on your listing with Activity Booker - it provides a detailed and exciting overview of your experience. Min 50 words Max 150 words.</p>
									<input readonly type="text" name="left" size=3 maxlength=3 value="500"
									 style="width:50px; float:right; margin-right:16px;box-shadow:none; background: none repeat scroll 0 0 transparent; font-size: 25px; color:#555555;">
									<textarea name="description" id="description" rows="5" cols="20" 
									  onKeyDown="CountLeft(this.form.description,this.form.left,500);" onKeyUp="CountLeft(this.form.description,this.form.left,500);"><?php echo $_SESSION['act_details']['description'];?></textarea>
							</fieldset>	<div class="clear"></div>
							<fieldset style="width:100%; float:left;">
								<label for="highlights">Activity Highlights<sup style="color:#FF0000;font-weight:bold;">*</sup></label> <br />
										<p class="paragraph">What makes your activity special? Please provide your details in bullet point format and get emotive about it as this is key text that customers will read when deciding to do your activity. Min of 4 points, max of 8 points. Points you may want to include are: trip highlights, anything special / unusual that is included or is optional, some of the scenery they may see etc</p>
														
								<textarea name="highlights" id="highlights" rows="5" cols="20"><?php echo stripslashes($_SESSION['act_details']['highlights']);?></textarea>
							</fieldset><div class="clear"></div>
							
							<fieldset style="width:100%; float:left;">
								<label for="highlights_detail">Activity Highlights Detail Information<sup style="color:#FF0000;font-weight:bold;">*</sup></label> <br />
								<textarea name="highlights_detail" id="highlights_detail" rows="5" cols="20"><?php echo stripslashes($_SESSION['act_details']['highlights_detail']);?></textarea>
							</fieldset><div id="clear"></div>
							
							<!-- onKeyDown="CountLeft(this.form.highlights,this.form.left2,500);" onKeyUp="CountLeft(this.form.highlights,this.form.left2,500);" --> 
							
							<!--<fieldset style="width:100%; float:left;">
									<label for="options">Activity Options</label>
									<p class="paragraph">Does your activity have different options such as a skydive operation having jump heights from 9,000 - 15,000 ft or a horse trek operator having half and full day treks? If so, please write 25-50 words about each option. Leave blank otherwise.</p>
<input readonly type="text" name="left3" size=3 maxlength=3 value="250"
style="width:50px; float:right; margin-right:16px;box-shadow:none; background: none repeat scroll 0 0 transparent; font-size: 25px; color:#555555;">

<textarea name="options" id="options" rows="5" cols="20" onKeyDown="CountLeft(this.form.options,this.form.left3,250);" onKeyUp="CountLeft(this.form.options,this.form.left3,250);"><?php echo $_SESSION['act_details']['options'];?></textarea>
							</fieldset>-->
							<fieldset style="width:100%; float:left;">
									<label for="avail_duration">Availability and Duration<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
									<p>How long is the activity and how long does each component go for? E.g. A rafting company may say: "Our rafting trips take 3 hours and includes a 30 min safety and skills induction, 2 hours actual rafting time and 30mins travel to our rafting site from our base."</p>
								  <textarea name="avail_duration" id="avail_duration" rows="5" cols="20" class="validate[required] text-input"><?php echo $_SESSION['act_details']['avail_duration'];?></textarea>
								 	<!-- <p>What are your departure times? Please note, you will document activity pricing further down this document. If you have tiered pricing specific to your trip departure times, please document here.</p>
								  <textarea name="departure_time" id="departure_time" rows="5" cols="20" ><?php echo $_SESSION['act_details']['departure_time'];?></textarea>
							 
								  <p>Is your activity available 7 days a week, 365 days a year? If not, how frequent is it? If irregular, please give specific dates here.</p>
								  <textarea name="available_days" id="available_days" rows="5" cols="20" >{$smarty.session.act_details.available_days}</textarea>
								  -->
							</fieldset><div id="clear"></div>
							</div><div class="clear"></div>
		<footer>
				<div class="submit_link">
				<input type="submit" value="Next" id="btnActivity" name="btnActivity" class="btn3 admin-btn1 admin-btn" style="padding-bottom: 3px;" />
				</div>
		</footer>
		</div>
</article><!-- end of post new article -->
</form>
	<div class="spacer"></div>
</section>
</body>
</html>