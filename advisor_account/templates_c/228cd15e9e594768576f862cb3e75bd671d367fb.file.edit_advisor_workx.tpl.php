<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 09:54:37
         compiled from "../templates/advisor_account/edit_advisor_workx.tpl" */ ?>
<?php /*%%SmartyHeaderCode:242345102565de605c5-04608854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '228cd15e9e594768576f862cb3e75bd671d367fb' => 
    array (
      0 => '../templates/advisor_account/edit_advisor_workx.tpl',
      1 => 1358935124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '242345102565de605c5-04608854',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"My Profile - Work Experience"); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/jquery.livequery.js"></script>
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
       <?php $_smarty_tpl->tpl_vars['abt_active2'] = new Smarty_variable("abt_active", null, null);?>
        <?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('advisorLeftMenu')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        
        <div class="user_dash_right_part">
        <div class="session_heading_titl">Edit and Update Your Profile</div>
       <div class="advisor_my_profile_otr">
            <div class="edit_menu_start">
              <ul>
                <li> <a href="edit-advisor-profile"> Personal Info</a></li>
                <li> <a href="edit-advisor-education"> Education</a></li>
                <li> <a href="edit-advisor-workx" class="edit_act_nav1"> Work Exp</a></li>
                <li> <a href="edit-advisor-exper"> Expertise</a></li>
                <li> <a href="edit-advisor-pitch"> My pitch</a></li>
              </ul>
            </div>
	        <form name="frmWrkExpAdvisorInfo" id="frmWrkExpAdvisorInfo"  method="post" onsubmit="return validateWorkExperienceForm();"
            action="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor_account/edit_advisor_dash_action.php">
            <input type="hidden" name="advisor_id" id="advisor_id" value="<?php echo $_smarty_tpl->getVariable('advisor_id')->value;?>
"/>
            <div class="personal_info_otr">
             <div class="JobExperience">
             	 <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('advExpInfo')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?> 
                        <?php ob_start();?><?php echo $_smarty_tpl->getVariable('advExpInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['lp'];?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['lp'] = new Smarty_variable($_tmp1, null, null);?> 
			     <?php if ($_smarty_tpl->getVariable('lp')->value>=2){?>
                 <div class="job dynamicMod">
			     <?php }else{ ?>
		         <div class="job">
			     <?php }?>
                    <div class="personal_info_box">
                        <div class="work_exp_otr">
                          <div class="fld_otr"> 	 	
                            <label for="login">Employer<font>*</font></label>
                            <input type="text" rel="validate" name="employerField[]" id="employerField<?php echo $_smarty_tpl->getVariable('lp')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('advExpInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['employer'];?>
">
                            <p style="display:none;">Please enter the name of employer.</p>
                          </div>
                          <div class="fld_otr">
                            <label for="login"> Title :</label>
                            <input type="text" name="titleField[]" id="titleField<?php echo $_smarty_tpl->getVariable('lp')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('advExpInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
">
                          </div>
                          <div class="fld_otr">
                            <label for="login"> Office country </label>
                            <select name="officeCountry[]" id="officeCountry<?php echo $_smarty_tpl->getVariable('lp')->value;?>
" >
                            	<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['name'] = 'cntry';
$_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('countryInfo')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['cntry']['total']);
?>
                              		<option value="<?php echo $_smarty_tpl->getVariable('countryInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['cntry']['index']]['id'];?>
" 
                                    <?php if ($_smarty_tpl->getVariable('advExpInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['office_country_id']==$_smarty_tpl->getVariable('countryInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['cntry']['index']]['id']){?> selected="selected" <?php }?>>
                                    <?php echo $_smarty_tpl->getVariable('countryInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['cntry']['index']]['country_name'];?>
</option>  	
                                <?php endfor; endif; ?>
                            </select>
                          </div>
                          
                          <div class="fld_otr">
                            <label for="login"> Office city </label>
                            <input type="text" name="officeCity[]" id="officeCity<?php echo $_smarty_tpl->getVariable('lp')->value;?>
"  value="<?php echo $_smarty_tpl->getVariable('advExpInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['office_city'];?>
">
                          </div>
                          
                          <div class="fld_otr">
                            <label for="login"> Time period </label>
                            <div class="login_btn">
                            
                              <select name="timePeriodFrom[]" id="timePeriodFrom<?php echo $_smarty_tpl->getVariable('lp')->value;?>
" >
	                              <?php  $_smarty_tpl->tpl_vars['yrFrom'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('year')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['yrFrom']->key => $_smarty_tpl->tpl_vars['yrFrom']->value){
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['yrFrom']->value;?>
"
                                        <?php if ($_smarty_tpl->getVariable('advExpInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['time_period_from']==$_smarty_tpl->tpl_vars['yrFrom']->value){?> selected="selected" <?php }?> ><?php echo $_smarty_tpl->tpl_vars['yrFrom']->value;?>
</option>
                                  <?php }} ?>
                              </select>
                              <span>To</span>
                              <select  name="timePeriodTo[]" id="timePeriodTo<?php echo $_smarty_tpl->getVariable('lp')->value;?>
" >
	                              <?php  $_smarty_tpl->tpl_vars['yrTo'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('year')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['yrTo']->key => $_smarty_tpl->tpl_vars['yrTo']->value){
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['yrTo']->value;?>
"
                                        <?php if ($_smarty_tpl->getVariable('advExpInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['time_period_to']==$_smarty_tpl->tpl_vars['yrTo']->value){?> selected="selected" <?php }?> >
                                        <?php echo $_smarty_tpl->tpl_vars['yrTo']->value;?>
</option>
                                  <?php }} ?>
                              </select>
                            </div>
                          </div>
                          <div class="fld_otr">
                            <label for="login"> Description </label>
                            <textarea name="description[]" id="description<?php echo $_smarty_tpl->getVariable('lp')->value;?>
" rows="5" cols="15"><?php echo $_smarty_tpl->getVariable('advExpInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['description'];?>
</textarea>
                          </div>
                    	</div>
                    </div>
                   <?php if ($_smarty_tpl->getVariable('lp')->value>=2){?>
	                 <a href="javascript:void(0);" title="Remove" class="removeMod">Remove</a></div>                    
				   <?php }else{ ?>
                     </div>
                   <?php }?>
                  <?php endfor; endif; ?>
                    <input type="button" name="addJob" id="addJob" value="Add Job">
                </div> 
                <div class="fld_otr" style="width:100%;">
                  <div class="personal_btn">
                    <input type="submit" name="btnAdvExpSubmit" id="btnAdvExpSubmit" value="Save Employment History">
                    <input type="submit" name="btnAdvExpSubmit" id="btnAdvExpSubmit" value="Save and continue">
                  </div>
                </div> 
              </div>
             </form> 
             <input type="hidden" name="noOfExperience" id="noOfExperience" value="<?php echo $_smarty_tpl->getVariable('numOfAdvExp')->value;?>
">        
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/End::Body/-->
<!--/Start::JS/-->
<div id="javaScript">
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/advisor_account/advisor_workexperience.js"></script>
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/gurubul.js" type="text/javascript"></script> 
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/advisor_account/advisor_edit_validate.js"></script>
</div>
<!--/End::JS/-->
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>