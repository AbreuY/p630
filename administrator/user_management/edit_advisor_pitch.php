<?php
#RequiresFiles:
	require_once('../../pi_classes/commonSetting.php');
	require_once('../../pi_classes/Admin.php');
#Redirect:
		chkAdminLogin();
#Objects:
	$objAdmin = new Admin();

#Action::GetInfoOfAdvisorByAdvisorId-
	 #clone:
	 $objAdvPitch	= clone $objAdmin;
	 	 #parameter:	
		 $setColoumFields 	= "";	$tableName = "";	$whereField = "";
		 $setColoumFields 	= "my_pitch";
		 $tableName 	  	= "advisor_details";
		 $whereField 	  	= "advisor_id='".base64_decode($_REQUEST['advisorId'])."' ";
	 $objAdvPitch->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
	 $foundNumRow = $objAdvPitch->numofrows();
	 $advPitchInfo = $objAdvPitch->getAllRow();
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
		<form name="frmEditAdvisorPitch" id="frmEditAdvisorPitch" method="post" action="edit_advisor_action.php" >
		<input type="hidden" name="advisor_id" id="advisor_id" value="<?php echo base64_decode($_REQUEST['advisorId']);?>" />
		<article class="module width_full">
			<?php 
				$pageName = "myPitchInfo";
				include("../supplier_menu.php");
			?>
			<header>
				<div style="float: left;padding: 5px 0 0 20px;">
					<a href="<?php echo AbstractDB::SITE_PATH;?>administrator/user_management/manage_advisor.php" title="Go back">
                    <img src="../images/back_icon2.png" border="0" /></a>
				</div>
			</header>
				<div class="module_content">
						<!--<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>-->
						<fieldset>
                            <fieldset style="width:48%; float:left; margin-right: 3%;">
                                <label>Pitch<sup style="color:#FF0000;font-weight:bold;"></sup></label>
                                <textarea name="pitchField" id="pitchField" style="width:92%;" rows="15" cols="25" onkeyup="countChar(this);"><?=$advPitchInfo['my_pitch']?></textarea>
                            </fieldset>
                            <strong>Characters.</strong><div id="charNum">
							<? echo ($advPitchInfo['my_pitch'])? 600 - strlen($advPitchInfo['my_pitch']) :  "600" ; ?></div> 
                        </fieldset>
                        <div class="clear"></div>
				</div>
				<div class="clear"></div>
			<footer>
				<div class="submit_link">
					<input type="submit" name="btnMyPitchSubmit" id="btnMyPitchSubmit" value="Save" class="alt_btn">
					<input type="button" name="btnCancel" id="btnCancel" value="Cancel" class="btn_cancel">
				</div>
			</footer>
		</article><!-- end of post new article -->
		</form>
		<div class="spacer"></div>
	</section>
<!--/JS/-->    
<div id="javaScript">
<script type="text/javascript">
	jQuery(document).ready(function() { 
		//Cancel Button Code:
		jQuery('#btnCancel').click(function(){
			location.href="manage_advisor.php";
		});
	});
	//Calculate TextArea Letters:
	function countChar(val){
		var len = val.value.length;
		if (len >= 600) {
			val.value = val.value.substring(0, 600);
		}else {
			$('#charNum').text(600 - len);
		}
	};
</script>
</div>    
</body>
</html>