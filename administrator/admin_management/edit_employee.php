<?php
	#RequirFile:
	require_once('../../pi_classes/commonSetting.php');
	require_once('../../pi_classes/Admin.php');
	if(empty($_SESSION['admin_id'])){
		header("location:".site_path."administrator/login.php");
	}
	#Object:
	$objUpdEmp=new Admin();	
	$objEmpDtl=clone $objUpdEmp;
	if(isset($_SESSION['msg']['updated'])){
		unset($_SESSION['msg']['updated']);
	}
	#EditProfileUpdate:
	if($_POST['email']!=''){
		$objUpdEmp->updateEmployeeDetails($_POST);
		$_SESSION['msg']['updated']='updated';
		header("location:manage_employee_details.php");
	}
	
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<script type="text/javascript">
jQuery(document).ready(function() {	
  	$old_pass = jQuery('#old_pass').val();
	jQuery("#frm_employee").validate({
		errorElement:'div',
		rules: {
			first_name: {
				required: true
			},
			last_name:{
				required: true
			},
			username:{
				required: true,
				remote:{
					url: "../ajax/ajax_request.php",
					type: "post",
					data: {
					  action:"chk_emp_other_username",old_username:jQuery('#old_username').val()
					}
				}
			},
			email:{
				required: true,
				email:true,
				remote:{
					url: "../ajax/ajax_request.php",
					type: "post",
					data: {
					  action:"chk_emp_other_email",old_email:jQuery('#old_email').val()
					}
				}
			},				
			old_pass:{			
				required: "#change_pass:checked",				
				remote: {					
					url: "../ajax/ajax_request.php",
					type: "post",
					data: {
					  action:"chk_emp_old_pass",admin_id:jQuery('#admin_id').val()
					},					
				}
			},
			new_pass:{
				required: "#change_pass:checked",
				minlength:8
			},
			cnf_pass:{
				required: "#change_pass:checked",
				equalTo:'#new_pass'
			}
		},
		messages: {
			first_name:{
				required:"Please enter first name"
			},
			last_name: {
				required:"Please enter last name"
			},
			username: {
				required:"Please enter username.",
				remote:"This username already exist, please try another"
			},
			email: {
				required:"Please enter email id.",
				email:"Please enter valid email id.",
				remote:"This email id already exist, please try another"
			},
			old_pass: {
				required:"Please enter old password.",
				remote:"Old password not match in database"
			},
			new_pass: {
				required:"Please enter new password."
			},
			cnf_pass: {
				required:"Please enter confirm password.",
				equalTo:"New password and confirm password does not match."
			}
		}
	});
	
	//code to hide topic selection, disable for demo
	var change_pass = $("#change_pass");
	// change_pass are optional, hide at first
	var inital = change_pass.is(":checked");
	var pass = $("#change_pass_div")[inital ? "removeClass" : "addClass"]("gray");
	var topicInputs = pass.find("input").attr("disabled", !inital);
	// show when change_pass is checked
	change_pass.click(function() {
		pass[this.checked ? "removeClass" : "addClass"]("gray");
		topicInputs.attr("disabled", !this.checked);
		if(change_pass.is(":checked")){
			$("#old_pass_div").html("*");
			$("#new_pass_div").html("*");
			$("#cnf_pass_div").html("*");
		}else{
			$("#old_pass_div").html("");
			$("#new_pass_div").html("");
			$("#cnf_pass_div").html("");
		}
	});
	
	//BASIC pass srtength
	$(".password_test").passStrength({
		userid: "#first_name"
	});
	jQuery('#btnCancel').click(function(){
		location.href="manage_employee_details.php";
	});
});
</script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">		
		<form name="frm_employee" id="frm_employee" method="post">
		<input type="hidden" name="admin_id" id="admin_id" value="<?php echo base64_decode($_REQUEST['admin_id']);?>" />
		<article class="module width_full">
			<header><h3>Edit Employee</h3></header>
			<header>
				<div style="float: left;padding: 5px 0 0 20px;">
					<a href="<?php echo AbstractDB::SITE_PATH;?>administrator/admin_management/manage_employee_details.php" title="Go back">
                    <img src="../images/back_icon2.png" border="0" /></a>
				</div>
			</header>
				<div class="module_content">
						<?php
							$objEmpDtl->getEmpDtlById(base64_decode($_REQUEST['admin_id']));
							$objEmpDtl->getAllRow();
						?>
						
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>First Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="first_name" id="first_name" value="<?php echo $objEmpDtl->getField('first_name');?>" style="width:92%;" />
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Last Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="last_name" id="last_name" value="<?php echo $objEmpDtl->getField('last_name');?>" style="width:92%;" />
						</fieldset><div class="clear"></div>
						
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Username<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="username" id="username" value="<?php echo $objEmpDtl->getField('username');?>" style="width:92%;" />
							<input type="hidden" name="old_username" id="old_username" value="<?php echo $objEmpDtl->getField('username');?>" />
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Email Id<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="email" id="email" value="<?php echo $objEmpDtl->getField('email');?>" autocomplete="off" 
                            style="width:92%;" />
							<input type="hidden" name="old_email" id="old_email" value="<?php echo $objEmpDtl->getField('email');?>" />
							<input type="hidden" name="original_pass" id="original_pass" value="<?php echo $objEmpDtl->getField('password');?>"/>
						</fieldset><div class="clear"></div>
						
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Change Password</label>
							<input type="checkbox" name="change_pass" id="change_pass" autocomplete="off" style="width:20%;float:right" />
						</fieldset><div class="clear"></div>
						<div id="change_pass_div">
						
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Old Password<sup id="old_pass_div" style="color:#FF0000;font-weight:bold;"></sup></label>
							<input type="password" name="old_pass" id="old_pass"  style="width:92%;" />
							
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>New Password<sup id="new_pass_div" style="color:#FF0000;font-weight:bold;"></sup></label>
							<input type="password" name="new_pass" id="new_pass" class="password_test" style="width:92%;" />
						</fieldset><div class="clear"></div>
						
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Confirm Password<sup id="cnf_pass_div" style="color:#FF0000;font-weight:bold;"></sup></label>
							<input type="password" name="cnf_pass" id="cnf_pass" style="width:92%;" />
						</fieldset>
						</div>
						<div class="clear"></div>
				</div>
				<div class="clear"></div>
			<footer>
				<div class="submit_link">
					<input type="submit" name="btnUpdate" id="btnUpdate" value="Update" class="alt_btn">
					<input type="button" name="btnCancel" id="btnCancel" value="Cancel" class="btn_cancel">
				</div>
			</footer>
		</article><!-- end of post new article -->
		</form>
		<div class="spacer"></div>
	</section>
</body>
</html>