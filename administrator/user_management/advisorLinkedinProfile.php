<?php
#RequiresFiles:
	require_once('../../pi_classes/commonSetting.php');
	require_once('../../pi_classes/Admin.php');
#Redirect:
	if(empty($_SESSION['admin_id'])){
		header("location:".site_path."administrator/login.php");
	}

#Objects:
	$objAdmin = new Admin();
	
#Action::Get Advisor Info:
	$objAdvisorInfo = clone $objAdmin;
	$objAdvisorInfo->getAdvisorDtlById(base64_decode($_GET['advisorId']));
	$advisorInfo = $objAdvisorInfo->getAllRow();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IN ADMIN PANEL | Powered by <?php echo AbstractDB::SITE_TITLE;?></title>

<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/layout.css" type="text/css" media="screen" />

<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/ie.css" type="text/css" media="screen" />
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/hideshow.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/password_strength_plugin.js"  language="javascript" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.core.js"></script> 
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.datepicker.js"></script>	
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.all.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.theme.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.core.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.datepicker.css" rel="stylesheet" /> 

</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">	
    	<?php if(isset($_SESSION['msg']['delete'])){ ?>
		<h4 class="alert_success">Record deleted successfully!</h4>
		<?php unset($_SESSION['msg']['delete']); } ?>	
		<?php if(isset($_SESSION['msg']['added'])){ ?>
			<h4 class="alert_success">Record added successfully!</h4>
		<?php unset($_SESSION['msg']['added']); } ?>	
		<?php if(isset($_SESSION['msg']['updated'])){ ?>
			<h4 class="alert_success">Record updated successfully!</h4>
		<?php 
			unset($_SESSION['msg']['updated']);
		} ?>	
			
		<form name="frmEditAdvisorInfo" id="frmEditAdvisorInfo" method="post" action="edit_advisor_action.php" enctype="multipart/form-data">
		<input type="hidden" name="advisor_id" id="advisor_id" value="<?php echo base64_decode($_REQUEST['advisorId']);?>" />
		<article class="module width_full">
			<header>
				<div style="float: left;padding: 5px 0 0 20px;">
					<a href="<?php echo AbstractDB::SITE_PATH;?>administrator/user_management/manage_advisor.php" title="Go back">
                    <img src="../images/back_icon2.png" border="0" /></a>
				</div>
			</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#000;font-weight:bold;padding-left:12px;">Request Advisor Linkedin Profile</span>
						</fieldset>
						<fieldset>
                        	<div style="width:736px; float:left;">
                                <iframe src="<?=$advisorInfo['linkedin_profile_id'];?>" 
                                style="width:736px; height:500px; margin-top:-37px" frameborder="0"></iframe>
                                <div style="width:100%; float:left; height:10px; background:#EBEBEB;">&nbsp;</div>
                            </div>
                      	</fieldset>
						<div class="clear"></div>
				</div>
				<div class="clear"></div>
			<footer>
			</footer>
		</article><!-- end of post new article -->
		</form>
		<div class="spacer"></div>
	</section>
    
<!--/JS/-->    
<div id="javaScript">
<script type="text/javascript">
jQuery(document).ready(function() { 
	// CODE FOR ADVISOR PERSONAL INFORMATION //
		jQuery("#frmEditAdvisorInfo").validate({
		errorElement:'div',
		rules: {
			firstName:{
				required:true
			},
			lastName:{
				required:true
			},
			email:{
				required: true,
				email:true,
				remote:{
					url: "../ajax/ajax_request.php",
					type: "post",
					data: {
					  action:"chk_advisor_other_email",old_email:jQuery('#old_email').val()
					}
				}
			},	
			phoneNumber:{
				required: true,
				number  : true
			}, 
			priceWebConsulte:{
				number  : true
			}, 
			priceEmailConsulteBulk:{
				number  : true
			}, 
			priceWebcamEmailConsulte:{
				number  : true
			}, 
			websitePageLink:{
				url: true
			},
			blogPageLink:{
				url: true
			},
			linkedinPageLink:{
				url: true
			},
			facebookPageLink:{
				url: true
			},
			twitterPageLink:{
				url: true
			} 
		},
		messages:{
			firstName:{
				required:"Please specify first name."
			},
			lastName: {
				required:"Please specify last name."
			},
			email: {
				required:"Please specify email id.",
				email:"Please specify valid email id.",
				remote:"This email id already exist, please try another."
			},
			phoneNumber:{
				required:"Please specify phone number.",
				number: "Please specify digits."	
			},
			priceWebConsulte:{
				number: "Please specify digits."	
			},
			priceEmailConsulteBulk:{
				number: "Please specify digits."	
			},
			priceWebcamEmailConsulte:{
				number: "Please specify digits."	
			},
			websitePageLink:{
				url: "Please enter a valid URL."
			},
			blogPageLink:{
				url: "Please enter a valid URL."
			},
			linkedinPageLink:{
				url: "Please enter a valid URL."
			},
			facebookPageLink:{
				url: "Please enter a valid URL."
			},
			twitterPageLink:{
				url: "Please enter a valid URL."
			} 
		}
	});
	
	//Cancel Button Code:
	jQuery('#btnCancel').click(function(){
		location.href="manage_advisor.php";
	});
});
</script>
<!-- jQuery Autocomplete -->
<script type='text/javascript' src='<?=site_path;?>front_media/js/autocomplete/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="<?=site_path;?>front_media/js/autocomplete/jquery.autocomplete.css" />
<script type="text/javascript">
$(document).ready(function() {
	$("#searchSpeakingLanguage").autocomplete("../ajax/ajax_autocomplete_lang.php?advisorId="+$("#advisor_id").val(),{
			width: 235,
			matchContains: true,
			//mustMatch: true,
			//minChars: 0,
			//multiple: true,
			//highlight: false,
			//multipleSeparator: ",",
			selectFirst: false
		});	
});
<!-- End :: jQuery Autocomplete -->
//AddLanguage:
$('#addLanguage').click(function(){
	if($("#searchSpeakingLanguage").val()!=''){
		$.ajax({
			url: "../ajax/ajax_advisor_language.php",
			type: "post",
			data:"advisorId="+$("#advisor_id").val()+"&languageName="+$("#searchSpeakingLanguage").val()+"&action=add_advisor_language",
			success:function(msg){
				jQuery('#showMoreLangByAdded').html(msg);
			}
		});
	}
});
function toggleavailableDay(value){
	if($(".availableday"+value+":checked").size()==23){
		$(".availableday"+value).each(function(){
			this.checked = "";
		});
	} else {
		$(".availableday"+value).each(function(){
			this.checked = "checked";
		})
	}
}
function toggleavailableHour(value){
	if($(".availablehour"+value+":checked").size()==7){
		$(".availablehour"+value).each(function(){
			this.checked = "";
		});
	} else {
		$(".availablehour"+value).each(function(){
			this.checked = "checked";
		})
	}
}
</script>
</div>
</body>
</html> 