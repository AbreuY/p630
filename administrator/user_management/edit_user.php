<?php
	#RequiresFiles:
	require_once('../../pi_classes/commonSetting.php');
	require_once('../../pi_classes/Admin.php');
	#Redirect:
		chkAdminLogin();
	#Object:
	$objUpdEmp=new Admin();	
	#clone:
	$objEmpDtl=clone $objUpdEmp;
	if(isset($_SESSION['msg']['updated'])){
		unset($_SESSION['msg']['updated']);
	}
	#Action:	
	if($_POST['email']!=''){
		#UpdtQuery:
		$rtnRsUpdt = $objUpdEmp->updateUserDetails($_POST);
		#SendMailAction:	
		if($_POST['new_pass']!=''&&$rtnRsUpdt=='1'){
			
			$email = $_POST['email'];  
			$pass  = $_POST['new_pass'];
			#clone:
			$objGblSett=clone $objUpdEmp;
			$objGblSett->getGlobalRecordById($rec_id=2);
			#clone:
			$objSndNotifcn = clone $objUpdEmp;
				$to		   = $_POST['email'];
				$from      = $objGblSett->getField('value');
				$temp_name = "by_administrator_user_password";
				$var_array = array("%%username%%"=>ucwords($_POST['first_name']),"%%email%%"=>$email,
								   "%%password%%"=>$pass);
			$objSndNotifcn->custom_send_email($to,$from,$temp_name,$var_array);
			time_nanosleep(0,100000);
		}
		$_SESSION['msg']['updated']='updated';
		header("location:manage_users.php");exit();
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

<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.core.js"></script> 
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.datepicker.js"></script>	
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.all.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.theme.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.core.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.datepicker.css" rel="stylesheet" /> 

<script type="text/javascript">
function retrive_city(country_id){
	//Display_Load();
	//alert(country_id);
	jQuery.ajax({
		url: "<?php echo AbstractDB::SITE_PATH;?>administrator/ajax/ajax_request.php",
		type: "post",
		data:"country_id="+country_id+"&action=get_city_by_country",
		success:function(msg){
			jQuery('#city_div').html(msg);
		}
	});
}
</script>
<script type="text/javascript">
jQuery(document).ready(function() {
		//jQuery("#dob").datepicker();//{minDate: '-30Y +30D', maxDate: '0',changeMonth: true,changeYear: true,yearRange:'-30:+30'});	
		jQuery("#dob").datepicker({minDate: '-30Y +30D', maxDate: '0',changeMonth: true,changeYear: true,yearRange:'-30:+30'});
		$old_pass = jQuery('#old_pass').val();
		jQuery("#frm_edit_user").validate({
		errorElement:'div',
		rules: {
			first_name: {
				required: true
			},
			last_name:{
				required: true
			},
			email:{
				required: true,
				email:true,
				remote:{
					url: "../ajax/ajax_request.php",
					type: "post",
					data: {
					  action:"chk_user_other_email",old_email:jQuery('#old_email').val()
					}
				}
			},	
			address:{
				required: true
			},
			location:{
				required: true
			},
			nationality:{
				required: true
			},
			city:{
				required: true
			},
			gender:{
				required: true
			},
			/*dob:{
				required: true,
				date: true
			},
			zipcode:{
				required: true				
			},
			old_pass:{
				required: "#change_pass:checked",
				remote: {
					url: "ajax/ajax_request.php",
					type: "post",
					data: {
					//alert(jQuery('#old_pass').val());
						  action:"chk_user_old_pass",user_id:jQuery('#user_id').val()
						  }					
						}
			},*/
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
			email: {
				required:"Please enter email id.",
				email:"Please enter valid email id.",
				remote:"This email id already exist, please try another"
			},
			address:{
				required:"Please enter address"
			},
			location:{
				required:"Please enter location"
			},
			nationality:{
				required:"Please enter nationality"
			},
			city:{
				required:"Please enter city"
			},
			gender:{
				required:"Please enter gender"
			},
			dob:{
				required:"Please enter dob"
			},
			zipcode:{
				required:"Please enter zipcode"
			}/*,
			old_pass: {
			required:"Please enter old password.",
			remote:"Old password not match in database"
			}*/,
			new_pass: {
				required:"Please enter new password.",
				minlength:"Minimum 8 characters"
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
		location.href="manage_users.php";
	});
});
</script>
<script type="text/javascript">
function retrive_country(){

	//Display_Load();
	//alert(country_id);
	jQuery.ajax({
		url: "../ajax/ajax_request.php",
		type: "post",
		data:"action=get_country",
		success:function(msg){
			jQuery('#country_div').html(msg);
			//window.location.href='<?php echo AbstractDB::SITE_PATH;?>supplier_registration.php';
			//Hide_Load();
		}
	});
}
</script>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">		
		<form name="frm_edit_user" id="frm_edit_user" method="post" enctype="multipart/form-data">
		<input type="hidden" name="user_id" id="user_id" value="<?php echo base64_decode($_REQUEST['user_id']);?>" />
		<article class="module width_full">
			<header><h3>Edit User</h3></header>
			<header>
				<div style="float: left;padding: 5px 0 0 20px;">
					<a href="<?php echo AbstractDB::SITE_PATH;?>administrator/user_management/manage_users.php" title="Go back">
                    <img src="../images/back_icon2.png" /></a>
				</div>
			</header>
				<div class="module_content">
						<?php
							$objEmpDtl->getUserDtlById(base64_decode($_REQUEST['user_id']));
							$objEmpDtl->getAllRow();
						?>
						
						<fieldset>
							<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
						</fieldset>
                        <fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>User Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="first_name" id="first_name" value="<?php echo $objEmpDtl->getField('username');?>" style="width:92%;" />
						</fieldset>
<!--						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>First Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="first_name" id="first_name" value="<?php//echo $objEmpDtl->getField('first_name');?>" style="width:92%;" />
						</fieldset>
                        
						<fieldset style="width:48%; float:left;">
							<label>Last Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="last_name" id="last_name" value="<?php//echo $objEmpDtl->getField('last_name');?>" style="width:92%;" />
						</fieldset><div class="clear"></div>-->
                        
						
						<!-- <fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Username<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="username" id="username" value="<?//php echo $objEmpDtl->getField('username');?>" style="width:92%;" />
							<input type="hidden" name="old_username" id="old_username" value="<?//php echo $objEmpDtl->getField('username');?>" />
						</fieldset> -->
                        
						<fieldset style="width:48%; float:left;"><!-- margin-right: 3%;-->
							<label>Email Id<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="email" id="email" value="<?php echo $objEmpDtl->getField('email');?>" autocomplete="off" 
                            style="width:92%;" />
							<input type="hidden" name="old_email" id="old_email" value="<?php echo $objEmpDtl->getField('email');?>" />
							<input type="hidden" name="original_pass" id="original_pass" value="<?php echo $objEmpDtl->getField('password');?>"/>
						</fieldset>
                        
						<!--<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Address<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<textarea rows="3" style="width:92%;" name="address" id="address"> <?//php echo $objEmpDtl->getField('address');?></textarea>
						</fieldset>
                        
						<fieldset style="width:48%; float:left;">
							<label>Location<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="location" id="location" value="<?//php echo $objEmpDtl->getField('location');?>" style="width:92%;" />
						</fieldset><div class="clear"></div>-->
						
						<?php /*?><fieldset style="width:48%; float:left;">
						<label>Nationality<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
						<?php 
							$objCountry=new User();
							$objCountry->getAllCountry();
							?>
								<select name="nationality" id="nationality" class="validate[required] text-input" onchange="retrive_city(this.value)">
								<option value="">--Select Nationality--</option>
								<?php
								while($objCountry->getAllRow()){									
						?>		<option value="<?php echo $objCountry->getField('country_id');?>" <?php if($objEmpDtl->getField('country')==$objCountry->getField('country_id')) { $country_id=$objEmpDtl->getField('country'); ?> selected="selected"<?php }?> > <?php echo $objCountry->getField('country_name');?> </option> 
							
						<?php 
								} 
						?>
						</select>
						</fieldset><?php */?>
						<?php /*?><fieldset style="width:48%; float:left; margin-right: 3%;">
						<label>City<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
						<?php 
							$objCity=Clone $objCountry;
							$objCity->getAllCityByCountry($country_id);
							?>
							<div id="city_div">
								<select name="city" id="city" class="validate[required] text-input">
								<option value="">--Select City--</option>
								<?php
								while($objCity->getAllRow()){									
						?>		<option value="<?php echo $objCity->getField('city_id');?>" <?php if($objEmpDtl->getField('city')==$objCity->getField('city_id')) { ?> selected="selected"<?php }?> > <?php echo $objCity->getField('city_name');?> </option> 
							
						<?php 
								} 
						?>
						</select>
						</div>
						</fieldset><?php */?>
						<?php /*?><fieldset style="width:48%; float:left;">
							<label>Gender<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<select name="gender" id="gender" value="<?php echo $objEmpDtl->getField('gender');?>" >
							<option value="">--Select Gender--</option>
							<option value="Male" <?php if($objEmpDtl->getField('gender')=="Male"){;?> selected="selected"<?php }?> >Male</option>
							<option value="Female" <?php if($objEmpDtl->getField('gender')=="Female"){;?> selected="selected"<?php }?>>Female</option>
							</select>
						</fieldset><div class="clear"></div><?php */?>
                        
						<!--<fieldset style="width:48%; float:right;">
						<label>Date Of Birth<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
						<input type="text" name="dob" id="dob" value="<?php//echo $objEmpDtl->getField('dob');?>"  class="validate[required] text-input" 
                        style="width:92%;" />
						</fieldset>-->
						
                          <!--<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Zipcode<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="zipcode" id="zipcode" value="<?php//echo $objEmpDtl->getField('zipcode');?>" style="width:92%;" />
							
						</fieldset>-->

                        <?php /*?><fieldset style="width:48%; float:left;">
							<label>Travel Status<sup id="new_pass_div" style="color:#FF0000;font-weight:bold;"></sup></label>
							<select name="travel_status" id="travel_status">
                                <option value="">--Select Travel Staus--</option>
                                <option value="At home" <?php if($objEmpDtl->getField('travel_status')=="At home"){?> selected="selected" <?php }?> >At home</option>
                                <option value="On the road" <?php if($objEmpDtl->getField('travel_status')=="On the road"){?> selected="selected" <?php }?>>On the road</option>
                                <option value="Trip planned" <?php if($objEmpDtl->getField('travel_status')=="Trip planned"){?> selected="selected" <?php }?>>Trip planned</option>
							</select>
						</fieldset><div class="clear"></div><?php */?>
                        
                        <?php /*?><fieldset style="width:48%; float:left;margin-right: 3%;">
                                <label>Occupations<sup id="new_pass_div1" style="color:#FF0000;font-weight:bold;"></sup></label>
                                <select name="occupation" id="occupation">
                                    <option value="">--Select Occupation--</option>
                                    <option value="Employed" <?php if($objEmpDtl->getField('occupation')=="Employed"){?> selected="selected" <?php }?> >Employed</option>
                                    <option value="Unemployed" <?php if($objEmpDtl->getField('occupation')=="Unemployed"){?> selected="selected" <?php }?>>Unemployed</option>
                                    <option value="Student" <?php if($objEmpDtl->getField('occupation')=="Student"){?> selected="selected" <?php }?>>Student</option>
                                    <option value="On Gap Year" <?php if($objEmpDtl->getField('occupation')=="On Gap Year"){?> selected="selected" <?php }?>>On Gap Year</option>											
                                </select>
							</fieldset><?php */?>
                        
                        <?php /*?><fieldset style="width:48%; float:left;">
							<label>Upload Image</label>
							<img style="margin-left:20px" src="<?php echo AbstractDB::SITE_PATH;?>/upload/activity/thumbnail/<?php echo $objEmpDtl->getField('image_path');?>" />
							<!-- <input type="text" name="image_path" id="image_path"  style="width:92%;" /> -->
							<input type="hidden" name="img_id" id="img_id" value="<?php echo $img_id ?>"  />
							<input type="hidden" name="old_image_path" id="old_image_path" value="<?php echo $objEmpDtl->getField('image_path');?>" />
							<input type="file" name="image_path" id="image_path" style="vertical-align:top;margin-left: 20px;margin-top: 5px"" />
						</fieldset><div class="clear"></div><?php */?>
                        
                        <fieldset style="width:48%; float:left;margin-right: 3%;">
							<label>Bank Details</label>
						</fieldset><div class="clear"></div>

						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Bank Code<sup id="" style="color:#FF0000;font-weight:bold;"></sup></label>
							<input type="text" name="bank_code" id="bank_code"  style="width:92%;" value="<?php echo $objEmpDtl->getField('bank_code');?>"/>
						</fieldset>
                        
						<fieldset style="width:48%;float:left;">
							<label>Branch Code<sup id="" style="color:#FF0000;font-weight:bold;"></sup></label>
							<input type="text" name="branch_code" id="branch_code"  style="width:92%;" 
                            value="<?php echo $objEmpDtl->getField('branch_code');?>"/>
						</fieldset>
						
						<fieldset style="width:48%; float:left;margin-right:3%;"><!-- -->
							<label>IBAN Code<sup id="" style="color:#FF0000;font-weight:bold;"></sup></label>
							<input type="text" name="iban_code" id="iban_code" style="width:92%;" value="<?php echo $objEmpDtl->getField('IBAN_code');?>"/>
						</fieldset>
                        <div class="clear"></div>
                        
						<fieldset style="width:48%; float:left;">
							<label>Change Password</label>
							<input type="checkbox" name="change_pass" id="change_pass" autocomplete="off" style="width:20%;float:right" />
						</fieldset><div class="clear"></div>

						<div id="change_pass_div">

                            <!--<fieldset style="width:48%; float:left; margin-right: 3%;">
                                <label>Old Password<sup id="old_pass_div" style="color:#FF0000;font-weight:bold;"></sup></label>
                                <input type="password" name="old_pass" id="old_pass"  style="width:92%;" />
                            </fieldset>-->
                            
                            <fieldset style="width:48%;float:left;margin-right: 3%;">
                                <label>New Password<sup id="new_pass_div" style="color:#FF0000;font-weight:bold;"></sup></label>
                                <input type="password" name="new_pass" id="new_pass" style="width:92%;" />
                            </fieldset>
                            
                            <fieldset style="width:48%; float:right;"><!-- -->
                                <label>Confirm Password<sup id="cnf_pass_div" style="color:#FF0000;font-weight:bold;"></sup></label>
                                <input type="password" name="cnf_pass" id="cnf_pass" style="width:92%;" />
                            </fieldset>
										
						</div>
						<div class="clear"></div>
				</div>
				<div class="clear"></div>
			<footer>
				<div class="submit_link">
					<input type="submit" name="btnSubmit" id="btnSubmit" value="<?php if(isset($_GET['user_id'])) { ?>Update<?php }else{ ?>Submit<?php } ?>" class="alt_btn">
					<input type="button" name="btnCancel" id="btnCancel" value="Cancel" class="btn_cancel">
				</div>
			</footer>
		</article><!-- end of post new article -->
		</form>
		<div class="spacer"></div>
	</section>
</body>
</html>