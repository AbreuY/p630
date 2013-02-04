<?php /* Smarty version Smarty-3.0.8, created on 2012-12-20 06:54:06
         compiled from "../templates/registration/register_as_advisor_linkedin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2687050d2b60e9c5042-42455273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '606176575d9fc367e729834f15ae2231f11cb5d6' => 
    array (
      0 => '../templates/registration/register_as_advisor_linkedin.tpl',
      1 => 1355986442,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2687050d2b60e9c5042-42455273',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"Register As Advisor"); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
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
    <div class="registration_as_user">
      <h1>Register as advisor via Linkedin</h1>
      <div class="line_divider"></div>
	  
      <form id="linked_action" method="post" action="registration/register_as_advisor_linked_action.php">
      <div class="login_inner">
        <div class="login_box">
          
          
         
          <div class="fld_otr">
            <label for="login"> Email address</label>
            <input type="text" name="email" id="email" value="">
          </div>
          
          <div class="fld_otr">
            <label for="login">Linkedin public profile</label>
            <input type="text" name="linkd" id="linkd">
          </div>
  
          <div class="fld_otr">
            <div class="login_btn">
              <input type="submit" name="submit" value="Apply Now!" id="register">
               </div>
          </div>
          <div class="otherOptions">
                <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
register-as-advisor">I don't have a LinkedIn profile »</a><br>
                <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
register-code">I already have a registration code »</a>
            </div>
        </div>
        <div class="drop_shadwo"></div>
      </div>
      </form>
      
    </div>
  </div>
</div>
<!--/End::Body/-->
<div id="script">
<script src="front_media/js/registration/advisor_register_linked_validate.js" type="text/javascript"></script>
</div>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>