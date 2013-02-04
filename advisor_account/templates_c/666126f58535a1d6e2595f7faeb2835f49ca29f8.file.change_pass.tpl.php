<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 06:49:23
         compiled from "../templates/advisor_account/change_pass.tpl" */ ?>
<?php /*%%SmartyHeaderCode:756951022af32a5570-43413379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '666126f58535a1d6e2595f7faeb2835f49ca29f8' => 
    array (
      0 => '../templates/advisor_account/change_pass.tpl',
      1 => 1358935124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '756951022af32a5570-43413379',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"Advisor Dashboard"); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/jquery.validate.js" type="text/javascript"></script>
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
  
    <div class="about_page_otr">
      
      <h1>Advisor Account</h1>
      <div class="line_divider"></div>
      
      <div class="abt_main_otr">
      <?php $_smarty_tpl->tpl_vars['abt_active10'] = new Smarty_variable("abt_active", null, null);?>
        <?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('advisorLeftMenu')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        
        <div class="user_dash_right_part change_pass_page">
        <div class="session_heading_titl">Change my password</div>
        
	        <form name="change_pass" id="change_pass"  method="post" 
            action="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor_account/change_pass_action.php">
            <input type="hidden" name="advisor_id" id="advisor_id" value="<?php echo $_smarty_tpl->getVariable('advisor_id')->value;?>
"/>
            <div class="personal_info_otr">
				
                    <div class="personal_info_box ">
                        <div class="work_exp_otr">
                        <div class="fld_otr"> This is the password you use to access this control panel.</div>
                          <div class="fld_otr"> 	 	
                            <label for="login">Current Password :</label>
                            <input type="password" name="old_pass" id="old_pass" value="">
                             <input type="hidden" name="chek_pass" id="check_pass" value="<?php echo $_smarty_tpl->getVariable('check_pass')->value;?>
"> 
                          </div>
                          <div class="fld_otr">
                            <label for="login"> New Password :</label>
                            <input type="password" name="new_pass" id="new_pass" value="">
                          </div>
                          
                          
                          <div class="fld_otr">
                            <label for="login"> Confirm Password :</label>
                            <input type="password" name="c_pass" id="c_pass"  value="">
                          </div>
                          
                    
                  <div align="center" class="fld_otr">
                    <input type="submit" name="submit" id="submit" value="Change Password">
                     </div>
                    </div>
                    
                 
              </div>
             </form> 
                   
            </div>
        
        </div>
        
      </div>
    </div>
  </div>
</div>
<!--/End::Body/-->
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/gurubul.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/advisor_account/change_pass.js" type="text/javascript"></script> 
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>