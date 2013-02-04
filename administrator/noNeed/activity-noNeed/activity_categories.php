<?php
require_once("../../pi_classes/commonSetting.php");
chkAdminLogin($_SESSION['adminID']);
require_once("../../pi_classes/ThumbLib.inc.php");
require_once("../../pi_classes/Admin.php");
require_once('../../pi_classes/User.php');
require_once('../../pi_classes/class.category.php');
require_once('../../pi_classes/Activity.php');

	$objUpdateActivityDtl=new Activity();
	$objInsertActivityDtl=clone $objUpdateActivityDtl;
	$objSuppCntryCity=new User();
	if(isset($_POST['btnCategoryBack']))
	{
		if($_POST['btnCategoryBack']="Back")
		{
			$cat_id=implode(",",$_POST['category_check']);
			$_SESSION['act_details']['cat_id']=$cat_id;
			$_SESSION['act_details']['category_suggesion']=addslashes($_POST['category_suggesion']);
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
	
	if(isset($_POST['btnCategory']))
	{
		$cat_id=implode(",",$_POST['category_check']);
		$_SESSION['act_details']['cat_id']=$cat_id;
		$_SESSION['act_details']['category_suggesion']=addslashes($_POST['category_suggesion']);
		if($_POST['btnCategory']=="Update")
		{
		$setFields="set `activity_booker_name`='".$_SESSION['act_details']['activity_booker_name']."', ";
		$setFields.="`cat_id`='".$_SESSION['act_details']['cat_id']."', ";
		$setFields.="`description`='".$_SESSION['act_details']['description']."', ";
		$setFields.="`highlights`='".$_SESSION['act_details']['highlights']."', ";
		$setFields.="`highlights_detail`='".$_SESSION['act_details']['highlights_detail']."', ";
		//$setFields.="`options`='".$_SESSION['act_details']['options']."', ";
		$setFields.="`avail_duration`='".$_SESSION['act_details']['avail_duration']."', ";
		//$setFields.="`departure_time`='".$_SESSION['act_details']['departure_time']."', ";
		// 	$setFields.="`available_days`='".$_SESSION['act_details']['available_days']."', ";
		$setFields.="`what_included`='".$_SESSION['act_details']['what_included']."', ";
		$setFields.="`what_not_included`='".$_SESSION['act_details']['what_not_included']."', ";
		$setFields.="`need_to_bring`='".$_SESSION['act_details']['need_to_bring']."', ";
		$setFields.="`loc_to_get`='".$_SESSION['act_details']['loc_to_get']."', ";
		$setFields.="`physical_address`='".$_SESSION['act_details']['physical_address']."', ";
		$setFields.="`pickup_transfer_service`='".$_SESSION['act_details']['pickup_transfer_service']."', ";
		$setFields.="`guideline_for_pub_trans`='".$_SESSION['act_details']['guideline_for_pub_trans']."', ";
		$setFields.="`parking_detail`='".$_SESSION['act_details']['parking_detail']."', ";
		$setFields.="`restrictions`='".$_SESSION['act_details']['restrictions']."', ";
		$setFields.="`individual_requirent`='".$_SESSION['act_details']['individual_requirent']."', ";
		$setFields.="`min_max_info`='".$_SESSION['act_details']['min_max_info']."', ";
		$setFields.="`impairment_info`='".$_SESSION['act_details']['impairment_info']."', ";
		$setFields.="`extra_info`='".$_SESSION['act_details']['extra_info']."', ";
		$setFields.="`weather_info`='".$_SESSION['act_details']['weather_info']."', ";
		$setFields.="`reschedule_info`='".$_SESSION['act_details']['reschedule_info']."', ";
		$setFields.="`guide_info`='".$_SESSION['act_details']['guide_info']."', ";
		$setFields.="`min_number_policy`='".$_SESSION['act_details']['min_number_policy']."', ";
		$setFields.="`spectators_info`='".$_SESSION['act_details']['spectators_info']."', ";
		$setFields.="`category_suggesion`='".$_SESSION['act_details']['category_suggesion']."' ";
		//$setFields.="`friendwatch_policy`='".$_SESSION['act_details']['friendwatch_policy']."', ";
		//$setFields.="`change_policy`='".$_SESSION['act_details']['change_policy']."', ";
		//$setFields.="`cancel_policy`='".$_SESSION['act_details']['cancel_policy']."', ";
		//$setFields.="`created_on`='".date("Y-m-d H:i:s")."' ";
		$whereCond="where `activity_id`='".$_SESSION['act_details']['activity_id']."'";
		$objUpdateActivityDtl->updateActivityDetail($setFields,$whereCond);
		$_SESSION['msg']['Activity_detail_updated']='Activity details updated successfully!';
		if(isset($_SESSION['act_details']))
			unset($_SESSION['act_details']);
		if(isset($_SESSION['submit_type']))
			unset($_SESSION['submit_type']);
		header("location:".AbstractDB::SITE_PATH."admin/activity/list.php?user_id=".$_POST['user_id']);
		}
		elseif($_POST['btnCategory']=="Submit")
		{

					//`available_days`,  ,'".$_SESSION['act_details']['available_days']."' `departure_time`, `friendwatch_policy`,`change_policy`,`cancel_policy`,
					
		// removed fields  `options`, 
		
		// removed values '".$_SESSION['act_details']['options']."','".$_SESSION['act_details']['departure_time']."','".$_SESSION['act_details']['friendwatch_policy']."','".$_SESSION['act_details']['change_policy']."','".$_SESSION['act_details']['cancel_policy']."',
		
			$dfields_for_activity="`activity_id`,`activity_booker_name`,`user_id`,`company_id`,`country_id`,`city_id`,`cat_id`,`active`,`description`,`highlights`,`highlights_detail`,`avail_duration`, `what_included`,`what_not_included`,`need_to_bring`,`loc_to_get`,`physical_address`,`pickup_transfer_service`,`guideline_for_pub_trans`,`parking_detail`,`restrictions`,`individual_requirent`,`min_max_info`,`impairment_info`,`extra_info`,`weather_info`,`reschedule_info`,`guide_info`,`min_number_policy`,`spectators_info`,`category_suggesion`,`created_on`,`supplier_deleted`,`admin_deleted`";
			// getting country and city id from supplier account
				$objSuppCntryCity->getCountryCityID(base64_decode($_REQUEST['user_id']));
				$objSuppCntryCity->getAllRow();
				$country_id=$objSuppCntryCity->getField('country');
				$city_id=$objSuppCntryCity->getField('city');
			$dvalues_for_activity="'','".$_SESSION['act_details']['activity_booker_name']."','".base64_decode($_REQUEST['user_id'])."','".$compID."','".$country_id."','".$city_id."','".$_SESSION['act_details']['cat_id']."','no','".$_SESSION['act_details']['description']."','".$_SESSION['act_details']['highlights']."','".$_SESSION['act_details']['highlights_detail']."','".$_SESSION['act_details']['avail_duration']."','".$_SESSION['act_details']['what_included']."','".$_SESSION['act_details']['what_not_included']."','".$_SESSION['act_details']['need_to_bring']."','".$_SESSION['act_details']['loc_to_get']."','".$_SESSION['act_details']['physical_address']."','".$_SESSION['act_details']['pickup_transfer_service']."','".$_SESSION['act_details']['guideline_for_pub_trans']."','".$_SESSION['act_details']['parking_detail']."','".$_SESSION['act_details']['restrictions']."','".$_SESSION['act_details']['individual_requirent']."','".$_SESSION['act_details']['min_max_info']."','".$_SESSION['act_details']['impairment_info']."','".$_SESSION['act_details']['extra_info']."','".$_SESSION['act_details']['weather_info']."','".$_SESSION['act_details']['reschedule_info']."','".$_SESSION['act_details']['guide_info']."','".$_SESSION['act_details']['min_number_policy']."','".$_SESSION['act_details']['spectators_info']."','".$_SESSION['act_details']['category_suggesion']."','".date('Y-m-d H:i:s')."','No','No'";
			#insert function to add activity detail --------
			$objInsertActivityDtl->insertActivityDetail($dfields_for_activity,$dvalues_for_activity);
			$_SESSION['msg']['activity_added']="Activity details added successfully";
			// unsetring session
			if(isset($_SESSION['act_details']))
				unset($_SESSION['act_details']);
			if(isset($_SESSION['submit_type']))
				unset($_SESSION['submit_type']);
			header("location:".AbstractDB::SITE_PATH."admin/activity/list.php?user_id=".$_POST['user_id']);
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
<script type="text/javascript">
jQuery(document).ready(function(){
		jQuery("#frmActivityCategory").validate({		
		errorElement:'div',
		rules: { 		
			"category_check[]":{
				required: true,
				maxlength:3
			}
	},
		messages: { 		
			"category_check[]": {
				required: "Please select one of the activity category.",
				maxlength:"You can choose max 3 categories."
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
<script type="text/javascript">
function fn_to_go_back()
{
	var selectedItems = new Array();
	jQuery("input[@name='category_check[]']:checked").each(function() {
				selectedItems.push(
				jQuery(this).val()
									);
	});
	location.href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/participant_guideline.php?goback=goback&user_id="+jQuery("#user_id").val()+"&act_id="+jQuery("#act_id").val()+"&category_check="+selectedItems+"&category_suggesion="+jQuery("#category_suggesion").val();	
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
		<form name="frmActivityCategory" id="frmActivityCategory" method="post">
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
									<h2>Activity Category</h2>
								  <input type="hidden" name="user_id" id="user_id" value="<?php echo $_REQUEST['user_id'] ?>" />									
								   <?php if(isset($_REQUEST['act_id'])) {?>
									   <input type="hidden" name="act_id" id="act_id" value="<?php echo $_REQUEST['act_id'] ?>" />
								   <?php } ?>	
							</fieldset><div class="clear"></div>
							<fieldset style="width:100%; float:left;">
								<p>Customers are able to search for activities across a number of categories. Please choose 3 categories that best reflect your business. Please mark an &quot;<b>&radic;</b>&quot; to the left of the categories selected.</p>
										<?php
											$objCategory=new category();
												$objCategory->getRecordList();
												$categoryCnt=$objCategory->getCount();
												$category=array();
												$allFields=true;
												if($categoryCnt>0){
													while($temp=$objCategory->getRow($allFields)){
													$category[]=$temp;
													}
												}
													$cat_ids=explode(',',$_SESSION['act_details']['cat_id']);
											foreach($category as $arrCategory)
											{		
														$select=0;
																foreach($cat_ids as $cat_id)
																{
																	if($cat_id==$arrCategory['cat_id'])
																	{
																		$select=1;
																	}
																}
										?>
													<span style="width:300px;float:left;padding:0px;">
<input type="checkbox" name="category_check[]" id="category_check[]" <?php if($select==1){?> checked="checked" <?php } ?> value="<?php echo $arrCategory['cat_id'];?>" style="float:left"/><?php echo $arrCategory['cat_name'];?>										
												 	</span>
									  <?php } ?>
													
							</fieldset><div class="clear"></div>
							
							<fieldset style="width:100%; float:left;">
								<p>Do you have another category you would like to suggest? We will continually be evolving our categories to best reflect the range of activities we promote so we are keen to hear your feedback!</p>
								<textarea rows="3" cols="15" id="category_suggesion" name="category_suggesion" ><?php echo $_SESSION['act_details']['category_suggesion'];?></textarea>
							</fieldset><div class="clear"></div>
						</div>
							<div class="clear"></div>
		<footer>
				<div class="submit_link">
					<!--	<input type="submit" value="{if $smarty.session.submit_type eq 'Update'}Update{else}Submit{/if}" id="btnCategory" name="btnCategory" /> -->
					<input type="submit" value="<?php if($_SESSION['submit_type']=='Update'){?>Update<?php }else{?>Submit<?php }?>" id="btnCategory" name="btnCategory" class="btn3 admin-btn1 admin-btn" style="padding-bottom: 3px;" /> 
				</div>
				<div class="submit_link">
					<input type="button" value="Back" id="btnCategoryBack" name="btnCategoryBack" class="btn3 admin-btn1 admin-btn" onclick="fn_to_go_back();" style="padding-bottom: 3px;" />
				</div>
		</footer>
		</div>
</article><!-- end of post new article -->

</FORM>
<div class="spacer"></div>
	</section>
</body>
</html>