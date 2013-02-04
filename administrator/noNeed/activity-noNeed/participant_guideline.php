<?php
require_once("../../pi_classes/commonSetting.php");
chkAdminLogin($_SESSION['adminID']);
require_once("../../pi_classes/ThumbLib.inc.php");
require_once("../../pi_classes/Admin.php");
require_once('../../pi_classes/User.php');
require_once('../../pi_classes/class.category.php');
	if(isset($_POST['btnParticipant']))
	{
		if($_POST['btnParticipant']="Next")
		{
			$_SESSION['act_details']['restrictions']=addslashes($_POST['restrictions']);
			$_SESSION['act_details']['individual_requirent']=addslashes($_POST['individual_requirent']);
			$_SESSION['act_details']['min_max_info']=addslashes($_POST['min_max_info']);
			$_SESSION['act_details']['impairment_info']=addslashes($_POST['impairment_info']);
			$_SESSION['act_details']['extra_info']=addslashes($_POST['extra_info']);
			$_SESSION['act_details']['weather_info']=addslashes($_POST['weather_info']);
			$_SESSION['act_details']['reschedule_info']=addslashes($_POST['reschedule_info']);
			$_SESSION['act_details']['guide_info']=addslashes($_POST['guide_info']);
			$_SESSION['act_details']['min_number_policy']=addslashes($_POST['min_number_policy']);
			$_SESSION['act_details']['spectators_info']=addslashes($_POST['spectators_info']);
			/*$_SESSION['act_details']['friendwatch_policy']=addslashes($_POST['friendwatch_policy']);
			$_SESSION['act_details']['change_policy']=addslashes($_POST['change_policy']);
			$_SESSION['act_details']['cancel_policy']=addslashes($_POST['cancel_policy']);*/
			if(isset($_POST['act_id']))
			{
				header("location:activity_categories.php?act_id=".$_REQUEST['act_id']."&user_id=".$_REQUEST['user_id']);
			}
			else
			{
				header("location:activity_categories.php?user_id=".$_REQUEST['user_id']);				
			}
		}
	}
	
	if(isset($_POST['btnParticipantBack']))
	{
		if($_POST['btnParticipantBack']="Back")
		{
			$_SESSION['act_details']['restrictions']=addslashes($_POST['restrictions']);
			$_SESSION['act_details']['individual_requirent']=addslashes($_POST['individual_requirent']);
			$_SESSION['act_details']['min_max_info']=addslashes($_POST['min_max_info']);
			$_SESSION['act_details']['impairment_info']=addslashes($_POST['impairment_info']);
			$_SESSION['act_details']['extra_info']=addslashes($_POST['extra_info']);
			$_SESSION['act_details']['weather_info']=addslashes($_POST['weather_info']);
			$_SESSION['act_details']['reschedule_info']=addslashes($_POST['reschedule_info']);
			$_SESSION['act_details']['guide_info']=addslashes($_POST['guide_info']);
			$_SESSION['act_details']['min_number_policy']=addslashes($_POST['min_number_policy']);
			$_SESSION['act_details']['spectators_info']=addslashes($_POST['spectators_info']);
			/*$_SESSION['act_details']['friendwatch_policy']=addslashes($_POST['friendwatch_policy']);
			$_SESSION['act_details']['change_policy']=addslashes($_POST['change_policy']);
			$_SESSION['act_details']['cancel_policy']=addslashes($_POST['cancel_policy']);*/
			if(isset($_POST['act_id']))
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
				$_SESSION['act_details']['cat_id']=$_REQUEST['category_check'];	
				$_SESSION['act_details']['category_suggesion']=addslashes($_REQUEST['category_suggesion']);
				if($_REQUEST['act_id']!="" && $_REQUEST['act_id']!='undefined')
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
<!-- 
<script type="text/javascript">
jQuery(document).ready(function(){
		jQuery("#frmAddActivity").validate({		
		errorElement:'div',
		rules: { 		
			act_name:{
				required: true 
			}			
	},
		messages: { 		
			act_name: {
				required: "Please enter activity name"
			}
		}	
		});
	});		
</script> -->
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
		<form name="frmParticipentGuideline" id="frmParticipentGuideline" method="POST" enctype="multipart/form-data">
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
									<h2>Participant Guideline</h2>
								  <input type="hidden" name="user_id" id="user_id" value="<?php echo $_REQUEST['user_id'] ?>" />	
								   <?php if(isset($_REQUEST['act_id'])) {?>								
								   <input type="hidden" name="act_id" id="act_id" value="<?php echo $_REQUEST['act_id'] ?>" />
								   <?php } ?>
							</fieldset><div class="clear"></div>

							<fieldset style="width:100%; float:left;">
								<p>Are there any restrictions on those doing your experience? e.g. no pregnant women...?</p>
								<textarea rows="3" cols="15" id="restrictions" name="restrictions" ><?php echo $_SESSION['act_details']['restrictions'];?></textarea>
							</fieldset><div class="clear"></div>
							
							<fieldset style="width:100%; float:left;">
								 <!-- <label for="email">What is NOT included?<sup style="color:#FF0000;font-weight:bold;">*</sup></label> -->
								<p>Are there any individual requirements... e.g. manual driver&lsquo;s license, moderate fitness...?</p>
								<textarea rows="3" cols="15" id="individual_requirent" name="individual_requirent" ><?php echo $_SESSION['act_details']['individual_requirent'];?></textarea>
							</fieldset><div class="clear"></div>
															
							<fieldset style="width:100%; float:left;">
								 <p>Is there a minimum / maximum age, minimum / maximum weight, minimum / maximum height?</p>
								<textarea rows="3" cols="15" id="min_max_info" name="min_max_info" ><?php echo $_SESSION['act_details']['min_max_info'];?></textarea>
							</fieldset>	<div class="clear"></div>
							
							<fieldset style="width:100%; float:left;">	
								<p>Is this activity suitable for people with vision or hearing impairments?</p>
								<textarea rows="3" cols="15" id="impairment_info" name="impairment_info" ><?php echo $_SESSION['act_details']['impairment_info'];?></textarea>		
							</fieldset><div class="clear"></div>
							
							<fieldset style="width:100%; float:left;">
								<label for="email">Extra Info</label>
								<p>What else is special about your activity? Is there anything else the customer needs to know before booking?</p>
								<textarea rows="3" cols="15" id="extra_info" name="extra_info" ><?php echo $_SESSION['act_details']['extra_info'];?></textarea>
							</fieldset><div id="clear"></div>
								
							<fieldset style="width:100%; float:left;">
								<label for="email">Weather</label>
								<p>Is your experience affected by weather? What is your policy when weather cancels your activity?</p>
								<textarea rows="3" cols="15" id="weather_info" name="weather_info"><?php echo $_SESSION['act_details']['weather_info'];?></textarea>
							</fieldset><div id="clear"></div>

							<fieldset style="width:100%; float:left;">
								<p>If you need to reschedule due to weather, how far in advance do you generally advise the customers?</p>
								<textarea rows="3" cols="15" id="reschedule_info" name="reschedule_info"><?php echo $_SESSION['act_details']['reschedule_info'];?></textarea>

							</fieldset><div class="clear"></div>
							
							
							<fieldset style="width:100%; float:left;">
								<label for="email">Numbers on the Day</label>
								<p>Will the customer be by themselves for this experience? If not, how many are in the group? How many instructors/guides will there be? </p>
								<textarea rows="3" cols="15" id="guide_info" name="guide_info"><?php echo $_SESSION['act_details']['guide_info'];?></textarea>
									
							</fieldset><div id="clear"></div>
								
							<fieldset style="width:100%; float:left;">
								<p>Does your activity run a minimum numbers policy?</p>
								<textarea rows="3" cols="15" id="min_number_policy" name="min_number_policy" ><?php echo $_SESSION['act_details']['min_number_policy'];?></textarea>
							</fieldset><div id="clear"></div>
							
							<fieldset style="width:100%; float:left;">
								<p>Is your experience suitable for spectators? </p>
								<textarea rows="3" cols="15" id="spectators_info" name="spectators_info"><?php echo $_SESSION['act_details']['spectators_info'];?></textarea>
							</fieldset><div id="clear"></div>
							
							<!--<fieldset style="width:100%; float:left;">
								<p>I have a friend that wants to watch. Is this possible? </p>
								<textarea rows="3" cols="15" id="friendwatch_policy" name="friendwatch_policy"><?php echo $_SESSION['act_details']['friendwatch_policy'];?></textarea>
							</fieldset><div id="clear"></div>	
							
							<fieldset style="width:100%; float:left;">	
								<p>What do I do if I want to change the date / time, the number of people booked or cancel? </p>
								<textarea rows="3" cols="15" id="change_policy" name="change_policy"><?php echo $_SESSION['act_details']['change_policy'];?></textarea>						
							</fieldset><div id="clear"></div>	
							
							<fieldset style="width:100%; float:left;">	
								<p>What is the cancellation policy?</p>
								<textarea rows="3" cols="15" id="cancel_policy" name="cancel_policy"><?php echo $_SESSION['act_details']['cancel_policy'];?></textarea>						
							</fieldset><div id="clear"></div>-->	
							
							<fieldset style="width:100%; float:left;">							
							</fieldset><div id="clear"></div>	
													
						</div>
							<div class="clear"></div>
		<footer>
				
				<div class="submit_link">
					<input type="submit" value="Next" id="btnParticipant" name="btnParticipant" class="btn3 admin-btn1 admin-btn" style="padding-bottom: 3px;" />
				</div>
				
				<div class="submit_link">
					<input type="submit" value="Back" id="btnParticipantBack" name="btnParticipantBack" class="btn3 admin-btn1 admin-btn" style="padding-bottom: 3px;" />
				</div>
		</footer>
		</div>
</article><!-- end of post new article -->

</FORM>
<div class="spacer"></div>
	</section>
</body>
</html>