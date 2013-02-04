<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 09:47:31
         compiled from "../templates/advisor_account/edit_advisor_exper.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29942510254b32f0aa8-87231921%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f4b2f27dc686413974b14f652ba85f59bafb320' => 
    array (
      0 => '../templates/advisor_account/edit_advisor_exper.tpl',
      1 => 1359032028,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29942510254b32f0aa8-87231921',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_capitalize')) include 'D:\wamp\www\p630\pi_classes\libs\plugins\modifier.capitalize.php';
?><?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"Advisor Dashboard"); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header2')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?> 
<!--/Start::Body/-->
<div id="WrapperOtr">
  <div id="Pageholder">  <?php echo $_smarty_tpl->getVariable('msg')->value;?>
  
    <div class="about_page_otr">
      <h1>Advisor Account</h1>
      <div class="line_divider"></div>
      <div class="abt_main_otr"> <?php $_smarty_tpl->tpl_vars['abt_active2'] = new Smarty_variable("abt_active", null, null);?>
        <?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('advisorLeftMenu')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        <div class="user_dash_right_part">
          <div class="session_heading_titl">Edit and Update Your Profile</div>
          <div class="advisor_my_profile_otr">
          <div class="edit_menu_start">
            <ul>
              <li> <a href="edit-advisor-profile"> Personal Info</a></li>
              <li> <a href="edit-advisor-education"> Education</a></li>
              <li> <a href="edit-advisor-workx"> Work Exp</a></li>
              <li> <a href="edit-advisor-exper" class="edit_act_nav1"> Expertise</a></li>
              <li> <a href="edit-advisor-pitch"> My pitch</a></li>
            </ul>
          </div>
          <form name="profileExprForm" id="profileExprForm" method="post"
            action="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor_account/edit_advisor_dash_action.php" >
            <input type="hidden" name="advisor_id" id="advisor_id" value="<?php echo $_smarty_tpl->getVariable('advisor_id')->value;?>
"/>
            <div class="personal_info_otr">
              <div class="personal_info_box">
                <div class="expertise_otr">
                  <div class="fld_otr">In which areas would you like to offer your services ?</div>
                  <div class="fld_otr0_main"> <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['name'] = 'exprArea';
$_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('area_expertise_cat')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['exprArea']['total']);
?>
                    <div class="fld_otr0">
                      <div class="check_forgot_box">
                        <input type="checkbox" id="expertArea<?php echo $_smarty_tpl->getVariable('area_expertise_cat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['exprArea']['index']]['cat_id'];?>
" name="expertArea[]" 
                      value="<?php echo $_smarty_tpl->getVariable('area_expertise_cat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['exprArea']['index']]['cat_id'];?>
" onclick="showSubServiceArea('<?php echo $_smarty_tpl->getVariable('area_expertise_cat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['exprArea']['index']]['cat_id'];?>
');"
                       <?php ob_start();?><?php echo $_smarty_tpl->getVariable('area_expertise_cat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['exprArea']['index']]['cat_id'];?>
<?php $_tmp1=ob_get_clean();?><?php if (in_array($_tmp1,$_smarty_tpl->getVariable('area_service_catid')->value)==1){?> checked="checked" <?php }?>/>
                        <span><?php echo $_smarty_tpl->getVariable('area_expertise_cat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['exprArea']['index']]['cat_name'];?>
</span> </div>
                    </div>
                    <?php endfor; endif; ?> </div>
                  <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['a1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['name'] = 'a1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('services_expertise_subcat')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['a1']['total']);
?>
                  <div id="divId<?php echo $_smarty_tpl->getVariable('services_expertise_subcat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['a1']['index']]['cat_id'];?>
"
                     <?php ob_start();?><?php echo $_smarty_tpl->getVariable('services_expertise_subcat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['a1']['index']]['cat_id'];?>
<?php $_tmp2=ob_get_clean();?><?php if (in_array($_tmp2,$_smarty_tpl->getVariable('area_service_catid')->value)==0){?> style="display:none;" <?php }?>>
                    <div class="admission_inn_expertise">
                      <div class="notifi_head"><?php echo $_smarty_tpl->getVariable('services_expertise_subcat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['a1']['index']]['cat_name'];?>
</div>
                      <div class="fld_otr">In which degree do you have <?php echo smarty_modifier_capitalize($_smarty_tpl->getVariable('services_expertise_subcat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['a1']['index']]['cat_name']);?>
 expertise?</div>
                      <?php  $_smarty_tpl->tpl_vars['subServices'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['sbA1'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('services_expertise_subcat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['a1']['index']]['subServices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subServices']->key => $_smarty_tpl->tpl_vars['subServices']->value){
 $_smarty_tpl->tpl_vars['sbA1']->value = $_smarty_tpl->tpl_vars['subServices']->key;
?>
                      <div class="fld_otr0_main">
                        <div class="fld_otr0">
                          <div class="check_forgot_box">
                            <input type="checkbox" class="checkAdd" name="expertise_cat_id['<?php echo $_smarty_tpl->getVariable('services_expertise_subcat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['a1']['index']]['cat_id'];?>
'][]"
                              value="<?php echo $_smarty_tpl->tpl_vars['subServices']->value['cat_id'];?>
" data-ck="<?php echo $_smarty_tpl->tpl_vars['subServices']->value['cat_id'];?>
"  
                              <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['subServices']->value['cat_id'];?>
<?php $_tmp3=ob_get_clean();?><?php if (in_array($_tmp3,$_smarty_tpl->getVariable('area_service_subcatid')->value)==1){?> checked="checked" <?php }?>/>
                            <span><?php echo $_smarty_tpl->tpl_vars['subServices']->value['cat_name'];?>
</span> </div>
                        </div>
                      </div>
                      <?php }} ?>
                      
                      
                      <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('services_expertise_subcat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['a1']['index']]['subServices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                      <div id="<?php echo ("detailAdd").($_smarty_tpl->tpl_vars['val']->value['cat_id']);?>
" 
                        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['val']->value['cat_id'];?>
<?php $_tmp4=ob_get_clean();?><?php if (in_array($_tmp4,$_smarty_tpl->getVariable('area_service_subcatid')->value)==0){?> style="display:none;" <?php }?> >
                      <div class="titl_area_main">
                        <div class="inner_titl"><strong><?php echo smarty_modifier_capitalize($_smarty_tpl->getVariable('services_expertise_subcat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['a1']['index']]['cat_name']);?>
: <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['val']->value['cat_name']);?>
</strong></div>
                        <textarea name="<?php echo ("textAdd").($_smarty_tpl->tpl_vars['val']->value['cat_id']);?>
"><?php echo $_smarty_tpl->getVariable('area_service_info')->value[$_smarty_tpl->tpl_vars['val']->value['cat_id']]['about_experience_info'];?>
</textarea>
                        <div class="pitch_msg">
                        <strong>This is your time to shine!</strong><br />
                        Tell us about your experience and background in this area, here. Below, you can pitch your services.<br />
                        <a class="see_shine" href="javascript:void(0);">See where this will be on your profile</a>
                        </div>
                        <div class="fld_otr">Which services are you willing to offer in <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['val']->value['cat_name']);?>
?</div>
                        <div class="fld_otr100">
                          <div class="check_forgot_box">
                            <input type="checkbox" class="PYtxt" data-ck="<?php echo $_smarty_tpl->tpl_vars['val']->value['cat_id'];?>
" name="<?php echo ("checkPY").($_smarty_tpl->tpl_vars['val']->value['cat_id']);?>
" 
                                        <?php ob_start();?><?php echo $_smarty_tpl->getVariable('area_service_info')->value[$_smarty_tpl->tpl_vars['val']->value['cat_id']]['one'];?>
<?php $_tmp5=ob_get_clean();?><?php if ($_tmp5=='on'){?> checked="checked" <?php }?> />
                            <span><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['val']->value['serviceA']);?>
</span> </div>
                          <textarea  name="<?php echo ("textPY").($_smarty_tpl->tpl_vars['val']->value['cat_id']);?>
" id="<?php echo ("textPY").($_smarty_tpl->tpl_vars['val']->value['cat_id']);?>
" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('area_service_info')->value[$_smarty_tpl->tpl_vars['val']->value['cat_id']]['one'];?>
<?php $_tmp6=ob_get_clean();?><?php if ($_tmp6!='on'){?> style="display:none;" <?php }?>><?php echo $_smarty_tpl->getVariable('area_service_info')->value[$_smarty_tpl->tpl_vars['val']->value['cat_id']]['one_txt'];?>
</textarea>
                          <div class="check_forgot_box">
                            <input type="checkbox" class="CMtxt" data-ck="<?php echo $_smarty_tpl->tpl_vars['val']->value['cat_id'];?>
" name="<?php echo ("checkCM").($_smarty_tpl->tpl_vars['val']->value['cat_id']);?>
" 
                                        <?php ob_start();?><?php echo $_smarty_tpl->getVariable('area_service_info')->value[$_smarty_tpl->tpl_vars['val']->value['cat_id']]['two'];?>
<?php $_tmp7=ob_get_clean();?><?php if ($_tmp7=='on'){?> checked="checked" <?php }?> />
                            <span><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['val']->value['serviceB']);?>
</span> </div>
                          <textarea name="<?php echo ("textCM").($_smarty_tpl->tpl_vars['val']->value['cat_id']);?>
" id="<?php echo ("textCM").($_smarty_tpl->tpl_vars['val']->value['cat_id']);?>
" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('area_service_info')->value[$_smarty_tpl->tpl_vars['val']->value['cat_id']]['two'];?>
<?php $_tmp8=ob_get_clean();?><?php if ($_tmp8!='on'){?> style="display:none;" <?php }?> ><?php echo $_smarty_tpl->getVariable('area_service_info')->value[$_smarty_tpl->tpl_vars['val']->value['cat_id']]['two_txt'];?>
</textarea>
                          <div class="check_forgot_box">
                            <input type="checkbox" class="APtxt" data-ck="<?php echo $_smarty_tpl->tpl_vars['val']->value['cat_id'];?>
" name="<?php echo ("checkAP").($_smarty_tpl->tpl_vars['val']->value['cat_id']);?>
"
                                                                <?php ob_start();?><?php echo $_smarty_tpl->getVariable('area_service_info')->value[$_smarty_tpl->tpl_vars['val']->value['cat_id']]['three'];?>
<?php $_tmp9=ob_get_clean();?><?php if ($_tmp9=='on'){?> checked="checked" <?php }?> />
                            <span><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['val']->value['serviceC']);?>
</span> </div>
                          <textarea name="<?php echo ("textAP").($_smarty_tpl->tpl_vars['val']->value['cat_id']);?>
" id="<?php echo ("textAP").($_smarty_tpl->tpl_vars['val']->value['cat_id']);?>
" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('area_service_info')->value[$_smarty_tpl->tpl_vars['val']->value['cat_id']]['three'];?>
<?php $_tmp10=ob_get_clean();?><?php if ($_tmp10!='on'){?> style="display:none;" <?php }?> ><?php echo $_smarty_tpl->getVariable('area_service_info')->value[$_smarty_tpl->tpl_vars['val']->value['cat_id']]['three_txt'];?>
</textarea>
                          <div class="check_forgot_box">
                            <input type="checkbox" class="IPtxt" data-ck="<?php echo $_smarty_tpl->tpl_vars['val']->value['cat_id'];?>
" name="<?php echo ("checkIP").($_smarty_tpl->tpl_vars['val']->value['cat_id']);?>
" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('area_service_info')->value[$_smarty_tpl->tpl_vars['val']->value['cat_id']]['four'];?>
<?php $_tmp11=ob_get_clean();?><?php if ($_tmp11=='on'){?> checked="checked" <?php }?> />
                            <span><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['val']->value['serviceD']);?>
</span></div>
                          <textarea  name="<?php echo ("textIP").($_smarty_tpl->tpl_vars['val']->value['cat_id']);?>
" id="<?php echo ("textIP").($_smarty_tpl->tpl_vars['val']->value['cat_id']);?>
" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('area_service_info')->value[$_smarty_tpl->tpl_vars['val']->value['cat_id']]['four'];?>
<?php $_tmp12=ob_get_clean();?><?php if ($_tmp12!='on'){?> style="display:none;" <?php }?> ><?php echo $_smarty_tpl->getVariable('area_service_info')->value[$_smarty_tpl->tpl_vars['val']->value['cat_id']]['four_txt'];?>
</textarea>
                          <div class="check_forgot_box">
                            <input type="checkbox" class="PCtxt" data-ck="<?php echo $_smarty_tpl->tpl_vars['val']->value['cat_id'];?>
" name="<?php echo ("checkPC").($_smarty_tpl->tpl_vars['val']->value['cat_id']);?>
" 
                                        <?php ob_start();?><?php echo $_smarty_tpl->getVariable('area_service_info')->value[$_smarty_tpl->tpl_vars['val']->value['cat_id']]['five'];?>
<?php $_tmp13=ob_get_clean();?><?php if ($_tmp13=='on'){?> checked="checked" <?php }?> />
                            <span><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['val']->value['serviceE']);?>
</span> </div>
                          <textarea name="<?php echo ("textPC").($_smarty_tpl->tpl_vars['val']->value['cat_id']);?>
" 	id="<?php echo ("textPC").($_smarty_tpl->tpl_vars['val']->value['cat_id']);?>
" <?php ob_start();?><?php echo $_smarty_tpl->getVariable('area_service_info')->value[$_smarty_tpl->tpl_vars['val']->value['cat_id']]['five'];?>
<?php $_tmp14=ob_get_clean();?><?php if ($_tmp14!='on'){?> style="display:none;" <?php }?> ><?php echo $_smarty_tpl->getVariable('area_service_info')->value[$_smarty_tpl->tpl_vars['val']->value['cat_id']]['five_txt'];?>
</textarea>
                        </div>
                      </div>
                    </div>
                    <?php }} ?> </div>
                </div>
                <?php endfor; endif; ?>
                 </div>
              <div class="fld_otr" style="width:100%;">
                <div class="personal_btn">
                  <input type="submit" name="btnAdvExprSubmit" id="btnAdvExprSubmit" value="Save Expertise Information">
                  <input type="submit" name="btnAdvExprSubmit" id="btnAdvExprSubmit" value="Save and continue">
                </div>
              </div>
            </div>
            </div>
          </form>
          <input type="hidden" id="javascript_sitepath" name="javascript_sitepath" value="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
" />
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--/End::Body/-->
<div id="script"> 
  <script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/advisor_account/advisor_expertise.js" type="text/javascript"></script> 
  <script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/gurubul.js" type="text/javascript"></script>
   <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/lightbox/popup.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/lightbox/user_thickbox.js"></script>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/lightbox/css/thickbox.css" type="text/css" media="screen" /> 
</div>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>