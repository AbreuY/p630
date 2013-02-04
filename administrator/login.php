<?php
	#RequirFile:
	require_once('../pi_classes/commonSetting.php');
	if(!empty($_SESSION['admin_id'])){
		header("location:index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IN ADMIN PANEL | Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/style.css" />
<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/niceforms-default.css" />
<script language="javascript" type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery-1.7.1.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/niceforms.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.validate.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	// display error/success/alert messgae
	jQuery('.alert_error').mouseover(function(){
		jQuery(this).css('cursor','pointer').click(function(){
			jQuery(this).hide();
		});
	});	
	jQuery('.alert_error').slideDown('slow').delay(3000).slideUp('slow');
	
	jQuery('.alert_info').mouseover(function(){
		jQuery(this).css('cursor','pointer').click(function(){
			jQuery(this).hide();
		});
	});	
	jQuery('.alert_info').slideDown('slow').delay(3000).slideUp('slow');
	
	jQuery('.alert_success').mouseover(function(){
		jQuery(this).css('cursor','pointer').click(function(){
			jQuery(this).hide();
		});
	});	
	jQuery('.alert_success').slideDown('slow').delay(3000).slideUp('slow');
	// display error/success/alert messgae
});
jQuery(document).ready(function() {	
	jQuery("#frm_login").validate({
		errorElement:'div',
		rules: {
			admin_uname: {
				required: true
			},
			admin_pass:{
				required: true
			}
		},
		messages: {
			admin_uname:{
				required:"Please enter username"
			},
			admin_pass: {
				required:"Please enter password"
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
        <div class="login_form" id="main">
         <h3>Admin Panel Login</h3>
         <!--<a href="forgot_pass.php" class="forgot_pass">Forgot password</a> -->
		<?php if($_REQUEST['admin_inactive']){ ?>
		 <h4 class="alert_error">Account status is inactive.</h4>
		<?php } ?>
		
		<?php if($_REQUEST['no_admin_record']){ ?>
		 <h4 class="alert_error">Either username or password is wrong. Please try again!</h4>
		<?php } ?>
		
		<?php if($_REQUEST['no_admin_email']){ ?>
		 <h4 class="alert_error">Employee does not exist with this email id!</h4>
		<?php } ?>
		
		<?php if($_REQUEST['pass_sent']){ ?>
		 <h4 class="alert_info">New password has been sent to your email id!</h4>
		<?php } ?>
         <form name="frm_login" id="frm_login" action="login_action.php" method="post" class="niceform">
                <fieldset>
                    <dl>
                        <dt><label for="email">Username:</label></dt>
                        <dd><input type="text" name="admin_uname" id="admin_uname" autocomplete="off" size="54" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="password">Password:</label></dt>
                        <dd><input type="password" name="admin_pass" id="admin_pass" autocomplete="off" size="54" /></dd>
                    </dl>
                    <dl class="submit">
						<input class="alt_btn" type="submit" name="submit" id="submit" value="Submit" />
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