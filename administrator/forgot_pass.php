<?php
	#RequirFile:
	require_once('../pi_classes/commonSetting.php');
	require_once('../pi_classes/Admin.php');
	#ForgotPasswordAction:
	if($_POST['email']){
		$objAdminLog=new Admin();
		$objAdminPw=clone $objAdminLog;
		$objAdminLog->getAdminPass($_POST['email']);
		$objAdminLog->getAllRow();
		if($objAdminLog->numofrows()>0){
			if($objAdminLog->getField('active')){
				$autoGenPass=GlobalData::passwdGen();
				$header	='';
				$header .= "Reply-To: ".AbstractDB::SITE_TITLE." ".$objAdminLog->getField('email')."\r\n"; 
				$header .= "Return-Path: ".AbstractDB::SITE_TITLE." ".$objAdminLog->getField('email')."\r\n"; 
				$header .= "From: ".AbstractDB::SITE_TITLE." ".$objAdminLog->getField('email')."\r\n"; 
				$header .= "Content-Type: text/html\r\n"; 
				$msg='';
				$msg.="Dear ".$objAdminLog->getField('firstname')." ".$objAdminLog->getField('lastname').",";
				$msg.="<br><br>Please use below login cradential to login with site.";
				$msg.="<br><br><a href=".AbstractDB::SITE_PATH."admin/login.php>Click here</a>";
				$msg.="<br><br>Username: ".$objAdminLog->getField('username');
				$msg.="<br><br>Password: ".$autoGenPass."</b>";
				$msg.="<br><br><br>".AbstractDB::SITE_TITLE." Team";
				
				$objAdminPw->updateNewAdminPass($objAdminLog->getField('email'),$autoGenPass);
				mail($objAdminLog->getField('email'),'Admin Login Details',$msg,$header);
				header("location:login.php?pass_sent=yes");
			}else{
				header("location:login.php?admin_inactive=yes");
			}
		}else{
			header("location:login.php?no_admin_email=yes");
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IN ADMIN PANEL | Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/style.css" />
<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/niceforms-default.css" />
<script language="javascript" type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery-1.7.1.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/niceforms.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.validate.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.alert_error').mouseover(function(){
		jQuery(this).css('cursor','pointer').click(function(){
			jQuery(this).hide();
		});
	});	
	jQuery('.alert_error').slideDown('slow').delay(2000).slideUp('slow');
});
jQuery(document).ready(function() {
	jQuery("#frm_forgot_pass").validate({
		errorElement:'div',
		rules: {
			email:{
				required: true,	
				email:true
			}				
		},
		messages: {
			email:{
				required: "Please enter email",
				email:"Please enter valid email"
			}
		}
	});
});
</script>
</head>
<body>
<div id="main_container">
	<div class="header_login">
		<div class="logo"><a href="index.php"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>    
    </div>     
        <div class="login_form">         
        <h3>Have you forgotten your password?</h3>         
        <a href="login.php" class="forgot_pass">Login</a> 
		<?php 
		 if($_REQUEST['error_msg']=='not_exist'){ ?>
		 <h4 class="alert_error">This email id is not exist in system.</h4>
		<?php } 
		if($_REQUEST['error_msg']=='sent'){ ?>
		 <h4 class="alert_error">Login details has been sent to your email id.</h4>
		<?php } ?>
        <form action="" method="post" class="niceform" name="frm_forgot_pass" id="frm_forgot_pass">
                <fieldset>
					<dl>
                        <dt><label for="">&nbsp;</label></dt>
                        <dd>&nbsp;</dd>
                    </dl>
                    <dl>
                        <dt><label for="email">Email Id:</label></dt>
                        <dd><input type="text" name="email" id="email"  autocomplete="off" size="54" /></dd>
                    </dl>
                     <dl class="submit">
                    <input class="alt_btn" type="submit" name="submit" id="submit" value="Send" />
                     </dl>                    
                </fieldset>                
         </form>
         </div>
    <div class="footer_login">
		<?php include("footer.php");?>
    </div>
</div>		
</body>
</html>