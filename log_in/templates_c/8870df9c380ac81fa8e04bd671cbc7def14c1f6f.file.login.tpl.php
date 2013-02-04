<?php /* Smarty version Smarty-3.0.8, created on 2013-01-23 10:13:25
         compiled from "../templates/log_in/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:60350d825de513662-29212713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8870df9c380ac81fa8e04bd671cbc7def14c1f6f' => 
    array (
      0 => '../templates/log_in/login.tpl',
      1 => 1358935125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60350d825de513662-29212713',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title','Login'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<script src="front_media/js/jquery.validate.js" type="text/javascript"></script>
<style type="text/css">
.error{
	color: red;
}
</style>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header2')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<!--/Start::Body/-->
<div id="WrapperOtr">
  <div id="Pageholder">
  		<?php echo $_smarty_tpl->getVariable('msg')->value;?>
  	
    <div class="login_page_otr">
    <h1>Log In</h1>    
    <div class="line_divider"></div>

      <div class="login_inner">
        <!--<div class="login_title">Log in as </div>-->
        <div class="login_box">
		<form action="log_in/login_action.php" method="post" id="log_form">
		<div id="log_box">
		  <div class="fld_otr2">
            <input type="radio" name="user_advisor" id="user_advisor" value="user" checked="checked">
            <label> Service Seeker</label>
          </div>
          <div class="fld_otr2">
            <input type="radio" name="user_advisor" id="user_advisor" value="advisor">
            <label> Advisor</label>
          </div>
          <div class="fld_otr">
            <label for="login"> Email address</label>
            <input type="text" name="email" id="email">
          </div>
          <div class="fld_otr">
            <label for="login">Password</label>
            <input type="password" name="pass" id="pass">
          </div>
          <div class="fld_otr">
            <div class="login_btn">
              <input type="submit" value="Log in" name="login_but" id="login_but">
              <a href="javascript:void(0);" onclick="onForgotClick();">Forgot password ?</a> </div>
          </div>
		  </div>
          </form>
		  <form id="forgot_form" action="log_in/forgot_action.php" method="post">
          <div id="forgot_box" class="fld_otr_forgot" style="display:none;">
            <label for="login">Enter your email address</label>
            <input type="text" name="femail" id="femail">
            <div class="login_btn">
              <input type="submit" value="Submit" name="forgot_but" id="forgot_but">
            </div>
          </div>
		  </form>
        </div>
        <div class="drop_shadwo"></div>
      </div>
    </div>
  </div>
</div>
<!--/End::Body/-->
<div id="script">
<!--Validations User and advisor-->
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/login/user_advisor_login_validate.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/gurubul.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/login/forgot_validate.js" type="text/javascript"></script>
</div>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>