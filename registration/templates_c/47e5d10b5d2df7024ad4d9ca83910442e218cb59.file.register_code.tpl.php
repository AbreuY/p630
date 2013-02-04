<?php /* Smarty version Smarty-3.0.8, created on 2012-12-20 09:58:56
         compiled from "../templates/registration/register_code.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2877950d2e1609e2d74-51142018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47e5d10b5d2df7024ad4d9ca83910442e218cb59' => 
    array (
      0 => '../templates/registration/register_code.tpl',
      1 => 1355997323,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2877950d2e1609e2d74-51142018',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"Verify Advisor Account Email"); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/jquery.livequery.js" type="text/javascript"></script>

<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header2')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<!--/Start::Body/-->
<div id="WrapperOtr">
  <div id="Pageholder">
     <?php echo $_smarty_tpl->getVariable('msg')->value;?>
  
    <div class="registration_as_advisor">
      <h1>Verify Advisor Account Email</h1>
      <div class="line_divider"></div>
      
      <div class="registration_advisor_inner">
      <form action="registration/verify_account_email_action.php" method="post" id="verifyAccountEmail" name="verifyAccountEmail">
        <div class="login_box">
          <div class="adviosr_heading">Welcome!</div>
          <div style="margin-bottom:14px;">Thank you for applying to be an expert with us. Begin your registration process by filling out the following.</div>
          <div style="margin-bottom:14px;">You will need a registration code to register. If you do not have one yet, please apply <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
register-as-advisor-linkedin">here</a>.</div>

          <div class="fld_otr">
            <label for="login"> First Name</label>
            <input type="text" name="fname" id="fname" autocomplete="off">
          </div>
          <div class="fld_otr">
            <label for="login"> Last Name</label>
            <input type="text" name="lname" id="lname" autocomplete="off">
          </div>
          
          <div class="fld_otr">
            <label for="login"> Email address</label>
            <input type="text" name="email" id="email" autocomplete="off">
          </div>
          
          <div class="fld_otr">
            <label for="login">Password</label>
            <input type="password" name="pass" id="pass" autocomplete="off">
          </div>
          
          <div class="fld_otr">
            <label for="login"> Confirm Password</label>
            <input type="password" name="cpass" id="cpass" autocomplete="off">
          </div>
		 
          <div class="fld_otr">
            <label for="login"> Registration code: </label>
            <input type="text" name="registrationCode" id="registrationCode" autocomplete="off">
          </div>
          <div class="fld_otr">
            <span> By clicking the button below, you are agreeing to our <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
terms-of-service" target="_blank">Terms and Service</a>. </span>

          </div>
          
          <div class="fld_otr0">
            <div class="login_btn">
              <input type="submit" name="submit" id="register" value="Verify Account Email">
               </div>
          </div>
        </div>
        </form>
        <div class="drop_shadwo2"></div>
      </div>
      
      
    </div>
  </div>
</div>
<!--/End::Body/-->
<!--/Start::JS/-->
<div id="javaScript">
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/registration/register_code.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/gurubul.js"></script>
</div>
<!--/End::JS/-->
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>