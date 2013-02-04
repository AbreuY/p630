<?php
	#RequireFile:
	require_once('../../pi_classes/commonSetting.php');
	require_once('../../pi_classes/Admin.php');
	
	if(empty($_SESSION['admin_id'])){
		header("location:".site_path."administrator/login.php");
	}
	#Object:
	$objAddEmp=new Admin();
	if(isset($_SESSION['msg'])){
		unset($_SESSION['msg']);
	}
	#AddNewAdmin:
	if($_POST['btnSubmit']=='Submit'){
		$objAddEmp=$objAddEmp->addEmployeeDetails($_POST);
		$_SESSION['msg']['added']='added';
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
					  action:"chk_emp_username"
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
					  action:"chk_emp_email"
					}
				}
			},				
			new_pass:{
				required: true,
				minlength:8
			},
			cnf_pass:{
				required: true,
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
			new_pass: {
				required:"Please enter new password."
			},
			cnf_pass: {
				required:"Please enter confirm password.",
				equalTo:"New password and confirm password does not match."
			}
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
		<article class="module width_full">
			<header><h3>Add New Admin</h3></header>
				<header>
					<div style="float: left;padding: 5px 0 0 20px;">
						<a href="<?php echo AbstractDB::SITE_PATH;?>administrator/admin_management/manage_employee_details.php" title="Go back">
                        <img src="../images/back_icon2.png" border="0" /></a>
					</div>
				</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>First Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="first_name" id="first_name" style="width:92%;" />
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Last Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="last_name" id="last_name" style="width:92%;" />
						</fieldset><div class="clear"></div>
						
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Username<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="username" id="username" style="width:92%;" />
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Email Id<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="email" id="email" autocomplete="off" style="width:92%;" />
						</fieldset><div class="clear"></div>	
							
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>New Password<sup id="new_pass_div" style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="password" name="new_pass" id="new_pass" class="password_test" style="width:92%;" />
						</fieldset>
						
						<fieldset style="width:48%; float:left;">
							<label>Confirm Password<sup id="cnf_pass_div" style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="password" name="cnf_pass" id="cnf_pass" style="width:92%;" />
						</fieldset>
						
						<div class="clear"></div>
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