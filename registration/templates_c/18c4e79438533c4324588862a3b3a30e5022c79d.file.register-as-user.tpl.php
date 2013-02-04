<?php /* Smarty version Smarty-3.0.8, created on 2012-12-08 11:37:00
         compiled from "../templates/registration/register-as-user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:671350c3265c0e3b45-57175380%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18c4e79438533c4324588862a3b3a30e5022c79d' => 
    array (
      0 => '../templates/registration/register-as-user.tpl',
      1 => 1354966573,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '671350c3265c0e3b45-57175380',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title','Register'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header2')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<!--/Start::Body/-->
<div id="WrapperOtr">
  <div id="Pageholder">
    <div class="registration_as_user">
      <h1>Register as user/service seeker</h1>
      <div class="line_divider"></div>
      
      <div class="login_inner">
        <div class="login_box">
          
          
          <div class="fld_otr">
            <label for="login"> Name</label>
            <input type="text" name="text">
          </div>
          <div class="fld_otr">
            <label for="login"> Email address</label>
            <input type="text" name="text">
          </div>
          
          <div class="fld_otr">
            <label for="login">Password</label>
            <input type="password" name="text">
          </div>
          
          <div class="fld_otr">
            <label for="login"> Confirm Password</label>
            <input type="password" name="text">
          </div>
          
          <div class="fld_otr">
            <label for="login"> Bank code</label>
            <input type="text" name="text">
          </div>
          
          <div class="fld_otr">
            <label for="login"> Branch code</label>
            <input type="text" name="text">
          </div>
          
          <div class="fld_otr">
            <label for="login"> IBAN code</label>
            <input type="text" name="text">
          </div>
          
          <div class="fld_otr">
            <span> Captcha</span>
           	<div class="cptcha_img"> <img src="images/captcha.png"></div>
           <input width="140" type="text" onFocus="if (this.value=='Type the words here..') this.value='';" onBlur="if (this.value=='') this.value='Type the words here..';" value="Type the words here.." size="20" class="cpt_cls" id="mod-search-searchword" name="searchword">
          </div>
          
          <div class="fld_otr">
                            <div class="check_forgot_box">
                            <input type="checkbox" name="text">
                             <span>I agree the terms and conditions</span>
                            
                            </div>
                        </div>
          
          
          
          
          <div class="fld_otr">
            <div class="login_btn">
              <input type="submit" name="text" value="Register">
               </div>
          </div>
        </div>
        <div class="drop_shadwo"></div>
      </div>
      
      
    </div>
  </div>
</div>
<!--/End::Body/-->
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>