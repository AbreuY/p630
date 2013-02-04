<?php /* Smarty version Smarty-3.0.8, created on 2013-01-04 07:13:50
         compiled from "../templates/registration/register_as_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:842250e6812e75eb84-81535741%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bb26ededaeff1ee0ab65ea7d287aadbd4ed9a46' => 
    array (
      0 => '../templates/registration/register_as_user.tpl',
      1 => 1356960628,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '842250e6812e75eb84-81535741',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"Register As User"); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<script src="front_media/js/jquery.validate.js" type="text/javascript"></script>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header2')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<!--/Start::Body/-->
<div id="WrapperOtr">
  <div id="Pageholder">
    <div class="registration_as_user">
      <h1>Register as user/service seeker</h1>
      <div class="line_divider"></div>
	  
      <form id="userreg" method="post" action="registration/register_as_user_action.php">
      <div class="login_inner">
        <div class="login_box">
          
          
          <div class="fld_otr">
            <label for="login"> Name</label>
            <input type="text" name="name" id="name" value="">
          </div>
          <div class="fld_otr">
            <label for="login"> Email address</label>
            <input type="text" name="email" id="email" value="">
          </div>
          
          <div class="fld_otr">
            <label for="login">Password</label>
            <input type="password" name="pass" id="pass">
          </div>
          
          <div class="fld_otr">
            <label for="login"> Confirm Password</label>
            <input type="password" name="cpass" id="cpass">
          </div>
          
          <div class="fld_otr">
            <span> Captcha <strong>(click on image to reload)</strong></span>
           	<div class="cptcha_img" id="cptcha_img"> <img src="<?php echo $_smarty_tpl->getVariable('captchaimg')->value;?>
" width="226" height="100"></div>
           <input width="140" type="text" onFocus="if (this.value=='Type the words here..') this.value='';" onBlur="if (this.value=='') this.value='Type the words here..';" value="Type the words here.." size="20" class="cpt_cls" id="mod-search-searchword" name="captchaword" id="captchaword">
          </div>
          
          <div class="fld_otr">
                            <div class="check_forgot_box">
                            <input type="checkbox" name="tnc" id="tnc">
                             <span>I agree the <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
terms-of-service" target="_blank">Terms and Service</a></span>
                            
                            </div>
                        </div>
          
          
          
          
          <div class="fld_otr">
            <div class="login_btn">
              <input type="submit" name="submit" value="Register" id="register">
               </div>
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
<script src="front_media/js/registration/user_register_validate.js" type="text/javascript"></script>

<script type="application/javascript">
$(document).ready(function(e) {
    $('#cptcha_img').click(function(){
	
		jQuery.ajax({
			url: "ajax/ajax_captcha.php",	
			success:function(msg){
				$('#cptcha_img').html(msg);
			}
		});

	});
});
</script>

</div>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>