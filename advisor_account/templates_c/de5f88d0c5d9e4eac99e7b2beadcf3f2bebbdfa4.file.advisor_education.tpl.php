<?php /* Smarty version Smarty-3.0.8, created on 2012-12-27 15:13:13
         compiled from "../templates/advisor_account/advisor_education.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2943750dc6589b6f0e6-50810603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de5f88d0c5d9e4eac99e7b2beadcf3f2bebbdfa4' => 
    array (
      0 => '../templates/advisor_account/advisor_education.tpl',
      1 => 1356620757,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2943750dc6589b6f0e6-50810603',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"Active Advisor Account"); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
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
        <div class="advisor_dash_front_part">
          <div class="advisor_my_profile_otr">
            <div class="edit_menu_start">
              <ul>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
active-account/profile-info/<?php echo $_GET['cd'];?>
"> Personal Info</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
active-account/education-info/<?php echo $_GET['cd'];?>
" class="edit_act_nav1"> Education</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
active-account/workexperience-info/<?php echo $_GET['cd'];?>
"> Work Exp</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
active-account/expertise-info/<?php echo $_GET['cd'];?>
"> Expertise</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
active-account/mypitch-info/<?php echo $_GET['cd'];?>
"> My pitch</a></li>
              </ul>
            </div>
            <form name="frmEducationAdvisorInfo" id="frmEducationAdvisorInfo"  method="post" onsubmit="return validateEduForm();"
            action="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor_account/advisor_active_account_action.php?cd=<?php echo $_GET['cd'];?>
">
            <input type="hidden" name="advisor_id" id="advisor_id" value="<?php echo $_smarty_tpl->getVariable('advisor_id')->value;?>
"/>
            <div class="personal_info_otr">
            <?php if ($_smarty_tpl->getVariable('advEdutInfo')->value!=''){?> 
             <div class="AddEducation">
                <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('advEdutInfo')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                        <?php ob_start();?><?php echo $_smarty_tpl->getVariable('advEdutInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['lp'];?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['lp'] = new Smarty_variable($_tmp1, null, null);?> 
                 <?php if ($_smarty_tpl->getVariable('lp')->value>=2){?>
                 <div class="edu1 dynamicMod">
                 <?php }else{ ?>
                 <div class="edu1">  
    	         <?php }?>        
                  <div class="personal_info_box">
                    <div class="add_degree_otr">
                      <div class="fld_otr">
                        <label for="login"> School<font>*</font></label>
                        <input type="text" rel="validate" name="schoolName[]" id="schoolName<?php echo $_smarty_tpl->getVariable('lp')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('advEdutInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['school'];?>
">
	                    <p style="display:none;">Please enter the name of your school/university.</p>
                      </div>
                      <div class="fld_otr">
                        <label for="login"> Degree<font>*</font></label>
                        <input type="text" rel="validate" name="degreeName[]" id="degreeName<?php echo $_smarty_tpl->getVariable('lp')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('advEdutInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['degree'];?>
">
                         <p style="display:none;">Please enter the name of your degree.</p>
                      </div>
                      <div class="fld_otr">
                        <label for="login"> Concentration</label>
                        <input type="text" name="concentrationField[]" id="concentrationField<?php echo $_smarty_tpl->getVariable('lp')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('advEdutInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['concentration'];?>
">
                      </div>
                      <div class="fld_otr">
                        <label for="login"> Graduation year<font>*</font></label>
                        <input type="text" rel="validate" name="graduationYear[]" id="graduationYear<?php echo $_smarty_tpl->getVariable('lp')->value;?>
" value="<?php echo $_smarty_tpl->getVariable('advEdutInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['graduation_year'];?>
">
                        <p style="display:none;">Enter your graduation year.</p>
                      </div>
                      
                    </div>
                  </div>
                   <?php if ($_smarty_tpl->getVariable('lp')->value>=2){?>
	                   <a href="javascript:void(0);" title="Remove" class="removeModEdu">Remove</a></div>                    
				   <?php }else{ ?>
                     </div>
                   <?php }?>
                  <?php endfor; endif; ?>
                  
                    <input type="button" name="bttnAddEdut" id="bttnAddEdut" value="Add Degree"  style="margin-left:10px"/>
	         </div>
            <?php }elseif($_smarty_tpl->getVariable('advEdutInfo')->value==''){?>
            	<div class="AddEducation">
                 <div class="edu1">  
                  <div class="personal_info_box">
                    <div class="add_degree_otr">
                      <div class="fld_otr">
                        <label for="login"> School<font>*</font></label>
                        <input type="text" rel="validate" name="schoolName[]" id="schoolName1" value="">
                        <p style="display:none;">Please enter the name of your school/university.</p>
                      </div>
                      <div class="fld_otr">
                        <label for="login"> Degree<font>*</font></label>
                        <input type="text" rel="validate" name="degreeName[]" id="degreeName1" value="">
                        <p style="display:none;">Please enter the name of your degree.</p>
                      </div>
                      <div class="fld_otr">
                        <label for="login"> Concentration</label>
                        <input type="text" name="concentrationField[]" id="concentrationField1" value="">
                      </div>
                      <div class="fld_otr">
                        <label for="login"> Graduation year<font>*</font></label>
                        <input type="text" rel="validate" name="graduationYear[]" id="graduationYear1" value="">
                        <p style="display:none;">Enter your graduation year.</p>
                      </div>
                    </div>
                  </div>
                  </div>
                    <input type="button" name="bttnAddEdut" id="bttnAddEdut" value="Add Degree"  style="margin-left:10px"/>
	         </div>
            <?php }?>
            
            
                <div class="fld_otr" style="width:100%;">
                  <div class="personal_btn" style="width: 725px;">
                    <input type="submit" name="btnAdvEdutSubmit" id="btnAdvEdutSubmit" value="Save Education Information">
                    <input type="submit" name="btnAdvEdutSubmit" id="btnAdvEdutSubmit" value="Save and continue">
                  </div>
                </div>
              </div>
             </form> 
              <?php if ($_smarty_tpl->getVariable('advEdutInfo')->value!=''){?>
             	 <input type="hidden" name="numOfEducation" id="numOfEducation" value="<?php echo $_smarty_tpl->getVariable('numOfAdvEdut')->value;?>
">         
              <?php }elseif($_smarty_tpl->getVariable('advEdutInfo')->value==''){?>
             	 <input type="hidden" name="numOfEducation" id="numOfEducation" value="1">        
              <?php }?>     
            </div>
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
front_media/js/advisor_account/advisor_education.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/advisor_account/advisor_edit_validate.js"></script>
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/gurubul.js" type="text/javascript"></script> 
</div>
<!--/End::JS/-->
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>