<?php
require_once("../../pi_classes/commonSetting.php");
chkAdminLogin($_SESSION['adminID']);
require_once("../../pi_classes/ThumbLib.inc.php");
require_once("../../pi_classes/Admin.php");
require_once('../../pi_classes/User.php');
require_once('../../pi_classes/class.category.php');
//echo "ok tested";
//die();
$objActMain=new Admin();
$objCity=new User();
$ObjDetail=clone $objActMain;
$objActivityAction = clone $objActMain;
$objCat=new category();
//print_r($_GET);
	//die();

if(isset($_GET['act_id']) || $_GET['act_id']!='')
{	
	$edit_id=$_GET['act_id'];
	$result=$objActMain->getRecordById($edit_id);
	$whereCnd="`activity_id`=".$edit_id;
	$pk_name=array();
	$res = $ObjDetail->getActivitySpecificRecordList("*",$whereCnd);
	while($res = mysql_fetch_assoc($res)) {
	 $pk_name[]=$res;
}

//echo "<pre>"; print_r($pk_name); exit;
}
if($_POST['btnSubmit']=="Submit")
{
	extract($_POST);
	
	$act_name=$_POST['act_name'];
	$user_id=$_POST['supp_name']; //This is Supplier ID
	$continent_id=$_POST['continent_name'];
	$country_id=$_POST['country_name'];
	$city_id=$_POST['city'];
	$whole_amt=$_POST['tot_amt'];
	$commission_amt=$_POST['commision_amt'];
	$commision_type=$_POST['comm_type'];
	$commission_amt=$_POST['commision_amt'];			
	$discount_amt=$_POST['descount_amt'];
	$start_location=$_POST['start_loc'];
	$end_location=$_POST['end_loc'];
	$cat_id=$_POST['category'];
	$start_date= $_POST['start_date'];
	$end_date=$_POST['end_date'];
	$act_location=$_POST['act_location'];
	$act_pricing=$_POST['act_pricing'];
	$activity_desc=$_POST['act_desc'];
	$need_to_know=$_POST['act_need_know'];
	$cancel_policy=$_POST['cancel_policy'];
	$date = date('Y-m-d');
	$dfields="`activity_id`,`activity_booker_name`,`user_id`,`continent_id`,`country_id`,`city_id`,`commission_amt`,`commission_type`,`whole_amt`,`discount_amt`,`start_location`,`end_location`,`cat_id`,`start_date`,`end_date`,`active`,`activity_location`,`activity_desc`,`activity_pricing`,`need_to_know`,`cancel_policy`,`created_on`" ;
	$dvalues="'','".addslashes($act_name)."','".$user_id."','".$continent_id."','".$country_id."','".$city_id."','".$commission_amt."','".$commision_type."','".$whole_amt."','".$discount_amt."','".addslashes($start_location)."','".addslashes($end_location)."','".$cat_id."','".$start_date."','".$end_date."','1','".addslashes($act_location)."','".addslashes($activity_desc)."','".addslashes($act_pricing)."','".addslashes($need_to_know)."','".addslashes($cancel_policy)."','".$date."'";
	$cnf=$ObjDetail->insertActivityDetails($dfields,$dvalues);		
	$_SESSION['msg']['added']='added';	
	header("location:list.php");
}

if($_POST['btnSubmit']=="Update"){

	$activity_id=$_POST['edit_id'];
	$set_fields = "`activity_booker_name`='".addslashes($_POST['act_name'])."' ";
	$set_fields .= ", "."`user_id`='".$_POST['supp_name']."' ";
	$set_fields .= ", "."`continent_id`='".$_POST['continent_name']."' ";
	$set_fields .= ", "."`country_id`='".$_POST['country_name']."' ";
	$set_fields .= ", "."`city_id`='".$_POST['city']."' ";
	$set_fields .= ", "."`commission_amt`='".$_POST['commision_amt']."' ";
	$set_fields .= ", "."`commission_type`='".$_POST['comm_type']."' ";
	$set_fields .= ", "."`whole_amt`='".$_POST['tot_amt']."' ";
	$set_fields .= ", "."`discount_amt`='".$_POST['descount_amt']."' ";
	$set_fields .= ", "."`start_location`='".addslashes($_POST['start_loc'])."'";
	$set_fields .= ", "."`end_location`='".addslashes($_POST['end_loc'])."'";
	$set_fields .= ", "."`cat_id`='".$_POST['category']."'";
	$set_fields .= ", "."`start_date`='".addslashes($_POST['start_date'])."'"; 	
	$set_fields .= ", "."`end_date`='".addslashes($_POST['end_date'])."'";  
	$set_fields .= ", "."`activity_location`='".addslashes($_POST['act_location'])."'";  
	$set_fields .= ", "."`activity_desc`='".addslashes($_POST['act_desc'])."'";
	$set_fields .= ", "."`activity_pricing`='".addslashes($_POST['act_pricing'])."'";  
	$set_fields .= ", "."`need_to_know`='".addslashes($_POST['act_need_know'])."'";
	$set_fields .= ", "."`cancel_policy`='".addslashes($_POST['cancel_policy'])."' ";
	$where_field="`activity_id`=".$activity_id;			
	$ObjDetail->updateActivitySpecificRecord($set_fields, $where_field);
	$_SESSION['msg']['updated']='updated';
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
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/hideshow.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.equalHeight.js"></script>
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/password_strength_plugin.js"  language="javascript" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.core.js"></script> 
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.datepicker.js"></script>	
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.all.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.theme.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.core.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.datepicker.css" rel="stylesheet" /> 

<script type="text/javascript">
jQuery(document).ready(function(){
		$("#start_date").datepicker({
			dateFormat: 'yy/mm/dd', 
			numberOfMonths:3, 
			minDate:0, 
			onSelect: function(dateText, inst){ 
				var date = $.datepicker.parseDate('yy/mm/dd', dateText);
				var new_min_date = $.datepicker.parseDate('yy/mm/dd', dateText); 
				date.setDate(date.getDate() + 1); 
				var $ret_date = $("#end_date");
				$ret_date.datepicker("option","minDate", new_min_date);
				$ret_date.datepicker("setDate", date); 
				$(this).datepicker("hide");
				//$ret_date.datepicker("show"); 
				//$ret_date.select();
			}
		});
		$("#end_date").datepicker({
			dateFormat: 'yy/mm/dd', 
			minDate:0, 
			numberOfMonths: 3			
		});
		
		jQuery("#frmAddActivity").validate({		
		errorElement:'div',
		rules: { 		
			act_name:{
				required: true 
			},
			supp_name:{
				required: true
			},
			continent_name: {
				required: true
			},
			country_name:{
				required: true
			},
			tot_amt:{
				required: true,
				number:true,
			},
			commision_amt: {
				required: true,
				number:true
			},
			descount_amt:{
				required: true,
				number:true			
			},
			deposite_amt:{
				required: true,
				number:true
			},
			start_loc:{
				required: true
			},			
			end_loc:{
				required: true
			},
			category:{
				required: true
			},
			start_date:{
				required: true
			},
			end_date:{
				required: true
			},
			content:{
				required: true
			},
			act_need_know:{
				required: true
			},
			cancel_policy:{
				required: true
			}			
	},
		messages: { 		
			act_name: {
				required: "Please enter activity name"
			},
			supp_name:{
				required: "Please select supplier name"
			},
			continent_name: {
				required: "Please select continent name"
			},
			country_name:{
				required: "Please select country name"
			},
			tot_amt:{
				required: "Please enter whole amount",
				number:"Please enter Valid Amount"
				
			},
			commision_amt: {
				required: "Please enter commision amoutnt"
			},
			descount_amt:{
				required: "Please enter discount amount",
				number:"Please enter valid discount amount"
			},
			
			start_location:{
				required: "Please enter activity start place"
			},			
			end_location:{
				required: "Please enter activity end place"
			},
			category:{
				required: "Please select category name"
			},
			start_date:{
				required: "Please select start date"
			},
			end_date:{
				required: "Please select end date"
			},
			content:{
				required: "Please enter activity description"
			},
			act_need_know:{
				required: "Please enter need to know information"
			},
			cancel_policy:{
				required: "Please enter cancel policy"
			},
		}	
		});
	});		
</script>
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
<script type="text/javascript">
function retrive_city(country_id){
	//Display_Load();
	//alert(country_id);
	jQuery.ajax({
		url: "<?php echo AbstractDB::SITE_PATH;?>admin/ajax/ajax_request.php",
		type: "post",
		data:"country_id="+country_id+"&action=get_city_by_country",
		success:function(msg){
			jQuery('#city_div').html(msg);
		}
	});
} 
function retrive_category(supplier_id){
	//Display_Load();
	jQuery.ajax({
		url: "<?php echo AbstractDB::SITE_PATH;?>admin/ajax/ajax_request.php",
		type: "post",
		data:"supplier_id="+supplier_id+"&action=get_category_by_supplier",
		success:function(msg){
			jQuery('#category_div').html(msg);
		}
	});
}
</script>
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
	
		<?php /* if(isset($_SESSION['msg']['delete'])){ ?>
			<h4 class="alert_success">Record deleted successfully!</h4>
		<?php } */?>	
		<?php /* if(isset($_SESSION['msg']['added'])){ ?>
			<h4 class="alert_success">Record added successfully!</h4>
		<?php } */?>	
		<?php /* if(isset($_SESSION['msg']['updated'])){ ?>
			<h4 class="alert_success">Record updated successfully!</h4>
		<?php 
			unset($_SESSION['msg']['updated']);
		} */?>	
		<section id="main" class="column">		
		<form name="frmAddActivity" id="frmAddActivity" method="POST" enctype="multipart/form-data">
		
		<article class="module width_full" style="width:95%">
		<div id="loading"></div>		
		<header><h3 class="tabs_involved"><?php if(isset($_GET['act_id']) || $_GET['act_id']!='')
{ echo "Edit"; }else{ echo "Add"; }?> Activity</h3>
		</header>
		<header>
				<div style="float: left;padding: 5px 0 0 20px;">
					<a href="<?php echo AbstractDB::SITE_PATH;?>admin/activity/list.php" title="Go back"><img src="../images/back_icon2.png" border="0" /></a>
				</div>
		</header>
		<div class="module_content">
			<input type="hidden" name="edit_id" value="<?php echo $objActMain->getField('activity_id');?>">
			<?php if($msg != ''){ ?>
	<header><div align="center"><? // 	 echo $msg; ?></div><header>
	
	<?php } ?>					<fieldset style="width:100%; float:left;">
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
							</fieldset>
							
							<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Activity Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="act_name" id="act_name" value="<?php echo $pk_name[0]['activity_booker_name']?>" style="width:92%;">
							<input type="hidden" name="old_actname" id="old_actname" value="<?php echo $pk_name[0]['activity_booker_name']?>" />
							</fieldset>
						
							<fieldset style="width:48%; float:left;left;">
							<label>Select Supplier<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<?php $objActivityAction->getAllSupp(); ?>
							<select name="supp_name" id="supp_name" onchange="retrive_category(this.value);">
							<option value="">Select Supplier</option>
							<?php
						while($objActivityAction->getAllRow()){
							?>	
							<option value="<?php echo $objActivityAction->getField('user_id');?>"<?php if($pk_name[0]['user_id']==$objActivityAction->getField('user_id')) {  ?>selected="selected"<?php }?>> <?php echo $objActivityAction->getField('company_name');?> </option>
					<?php }  ?>
							</select>
							</fieldset>	<div class="clear"></div>					
								<fieldset style="width:48%; float:left; margin-right:3%">
							<label>Select Category<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							
							<?php 
								$objActCatLimit=clone $objActMain;
								if($_REQUEST['act_id']!='')
								{
									$objActCat=clone $objActivityAction;									
									$objActCat->getCatgoryString($pk_name[0]['user_id']);
									while($objActCat->getAllRow())
									{
										$category=$objActCat->getField('category');
									}
									$objActCatLimit->getCategoryBySupp($category);										
								}
								else
								{
									$objActCatLimit->getAllCategory(); 
								}								
								?>
							<div id="category_div">
							<select name="category" id="category" class="FETextInput">
							<option value="">--Select Category--</option>
						<?php
									
						while($objActCatLimit->getAllRow()){
					?>	
					<option value="<?php echo $objActCatLimit->getField('cat_id');?>"<?php if($pk_name[0]['cat_id']==$objActCatLimit->getField('cat_id')) {  ?>selected="selected"<?php }?> > <?php echo $objActCatLimit->getField('cat_name');?> </option>
					<?php }  ?>
				</select>
							</div>
							</fieldset>
							<fieldset style="width:48%; float:left;">
							<label>Select Continent<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<select name="continent_name" id="continent_name">
								<option value="">--Select Continent--</option>
					<?php
						$objActContinent=clone $objActCatLimit;  
						$objActContinent->getAllContinent(); 
						while($objActContinent->getAllRow()){
					?>	
								<option value="<?php echo $objActContinent->getField('continent_id');?> "<?php if($pk_name[0]['continent_id']==$objActContinent->getField('continent_id')) {  ?>selected="selected"<?php }?>> <?php echo $objActContinent->getField('continent_name');?> </option>
					<?php }  ?>
							</select>
					
							</fieldset><div class="clear"></div>
							<fieldset style="width:48%; float:left; margin-right:3%">
							<label>Select Country<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<select name="country_name" id="country_name" class="FETextInput" onchange="retrive_city(this.value)">
								<option value="">--Select Country--</option>
					<?php $objActCnt=clone $objActivityAction; $objActCnt->getAllCountry($pk_name[0]['country_id']);
						while($objActCnt->getAllRow()){
					?>	
					<option value="<?php echo $objActCnt->getField('country_id');?>"<?php if($pk_name[0]['country_id']==$objActCnt->getField('country_id')) {$country_id=$pk_name[0]['country_id'];?> selected="selected"<?php }?>> <?php echo $objActCnt->getField('country_name');?> </option>
					<?php }  ?>
				</select>
							</fieldset>
						
							<fieldset style="width:48%; float:left;">
						<label>Select City<sup style="color:#FF0000;font-weight:bold;"></sup></label>
						<?php 
							//$objCity=new User();	
								if(isset($_REQUEST['act_id']))
								{						
									$objCity->getAllCityByCountry($country_id);
								}
								else
								{
									$objCity->getAllCity();
								}
						?>
							<div id="city_div">
								<select name="city" id="city">
								<option value="">--Select City--</option>
								<?php 
 							while($objCity->getAllRow()){	?>								
								<option value="<?php  echo $objCity->getField('city_id'); ?>" <?php if($pk_name[0]['city_id']==$objCity->getField('city_id')) {?> selected="selected"<?php }?> ><?php  echo $objCity->getField('city_name'); ?> </option>  
							<?php 
							}
						?>
						</select>
						</div>					
						</fieldset><div class="clear"></div>
							<fieldset style="width:48%; float:left; margin-right:3%">
							<label>Total Amount<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" dir="ltr" class="FETextInput" name="tot_amt" value="<?php echo $pk_name[0]['whole_amt']?>" size="80"  maxlength="255">
							</fieldset>
							
							<fieldset style="width:48%; float:left;">
							<label>Descount Amount<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
				<input type="text" dir="ltr" class="FETextInput" name="descount_amt" id="descount_amt" value="<?php echo $pk_name[0]['discount_amt']?>" size="80"  maxlength="255">
							</fieldset><div class="clear"></div>
							
							<fieldset style="width:48%; float:left;margin-right:3%">
							
							<label>Commition Amount<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<fieldset style="width:95%;margin-left:15px">
							<label>Select Commission Type<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
								<select id="comm_type" name="comm_type">
								<option value="">--Select Commision Type</option>
								<option value="percentage" <?php if($pk_name[0]['commission_type']=="percentage") { ?> selected="selected" <?php }?> >Percentage</option>
								<option value="whole" <?php if($pk_name[0]['commission_type']=="whole") { ?> selected="selected" <?php }?> >Whole</option>
								</select>
							</fieldset>							
							<fieldset style="width:95%;margin-left:15px">
							
							<label>Enter Commision<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
								<input type="text" name="commision_amt" style="size:50px;" id="commision_amt" value="<?php if($pk_name[0]['commission_type']=="percentage") { echo (($pk_name[0]['commission_amt']*100)/$pk_name[0]['whole_amt']); } else { echo $pk_name[0]['commission_amt']; }?>">		
							</fieldset>	
							</fieldset>
									
							<fieldset style="width:48%; float:left;">
							<label>Start Date<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
								<input type="text" name="start_date" id="start_date" value="<?php echo $pk_name[0]['start_date']?>">
							</fieldset>
							
							
							<fieldset style="width:48%; float:left;">
							<label>End Date<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" dir="ltr" class="FETextInput" name="end_date" id="end_date" value="<?php echo $pk_name[0]['end_date']?>" size="80"  maxlength="255" >
							</fieldset>
							
							<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Activity Start Place<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
								<input type="text" name="start_loc"  id="start_loc"value="<?php echo $pk_name[0]['start_location']?>">
							</fieldset>
							
							
							<fieldset style="width:48%; float:left;">
							<label>Activity End Place<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
						<input type="text" dir="ltr" class="FETextInput" name="end_loc"  id="end_loc" value="<?php echo $pk_name[0]['end_location']?>" size="80"  maxlength="255">
							</fieldset><div class="clear"></div>
							
							<fieldset style="width:100%; float:left;">
							<label style="float:none;">Location</label>
							<textarea  id="content0" name="act_location" cols="100" rows="5" class="mceEditor" style="margin-left: 10px;"><?php echo $pk_name[0]['activity_location']?></textarea><br /><br />
							</fieldset><div class="clear"></div>
							
							<fieldset style="width:100%; float:left;">
							<label style="float:none;">Activity Description</label>
							<textarea  id="content" name="act_desc" cols="100" rows="5" class="mceEditor" style="margin-left: 10px;"><?php echo $pk_name[0]['activity_desc']?></textarea><br /><br />
							</fieldset><div class="clear"></div>
							
							<fieldset style="width:100%; float:left;">
							<label style="float:none;">Pricing</label>
							<textarea  id="content3" name="act_pricing" cols="100" rows="5" class="mceEditor" style="margin-left: 10px;"><?php echo $pk_name[0]['activity_pricing']?></textarea><br /><br />
							</fieldset><div class="clear"></div>
						
							<fieldset style="width:100%; float:left;">
							<label style="float:none;">Need to Know</label>
								<textarea  id="content1" name="act_need_know" cols="100" rows="10" class="mceEditor" style="margin-left: 10px;"><?php echo $pk_name[0]['need_to_know']; ?></textarea><br /><br />
							</fieldset><div class="clear"></div>
						
							<fieldset style="width:100%; float:left;">
							<label style="float:none;">Cancel Policy</label>
							<textarea  id="content2" name="cancel_policy" cols="100" rows="10" class="mceEditor" style="margin-left: 10px;"><?php echo $pk_name[0]['cancel_policy']; ?></textarea>
							<!-- <textarea id="" name="cancel_palicy"></textarea> --><br /><br />		
											
							</fieldset>	<div class="clear"></div>
							
														
						</div>
						<div class="clear"></div>
		<footer>
				<div class="submit_link">
					<input type="SUBMIT" value="<?php if(isset($_GET['act_id'])) { ?>Update<?php }else{ ?>Submit<?php } ?>" name="btnSubmit" class="btn3 admin-btn1 admin-btn" style="padding-bottom: 3px;">
				</div>
		</footer>
</article><!-- end of post new article -->

</FORM>
<div class="spacer"></div>
	</section>
</body>
</html>