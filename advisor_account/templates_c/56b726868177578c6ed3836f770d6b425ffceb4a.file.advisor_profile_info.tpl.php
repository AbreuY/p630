<?php /* Smarty version Smarty-3.0.8, created on 2013-01-14 09:38:59
         compiled from "../templates/advisor_account/advisor_profile_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2451850f3d233afbdd1-17890482%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56b726868177578c6ed3836f770d6b425ffceb4a' => 
    array (
      0 => '../templates/advisor_account/advisor_profile_info.tpl',
      1 => 1357545269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2451850f3d233afbdd1-17890482',
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
      Please, provide a bellow information and activate your account. 
      </br>      </br> 
        <div class="advisor_dash_front_part">
          <div class="advisor_my_profile_otr">
            <div class="edit_menu_start">
              <ul>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
active-account/profile-info/<?php echo $_GET['cd'];?>
" class="edit_act_nav1"> Personal Info</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
active-account/education-info/<?php echo $_GET['cd'];?>
"> Education</a></li>
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
            </div>  <!--name="frmEditAdvisorPitch" id="frmEditAdvisorPitch"      Change by sahil-->
            <form name="frmEditAdvisorPitch" id="profileInfoForm" method="post" 
            action="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor_account/advisor_active_account_action.php?cd=<?php echo $_GET['cd'];?>
" enctype="multipart/form-data" >
             <input type="hidden" name="advisor_id" id="advisor_id" value="<?php echo $_smarty_tpl->getVariable('advisor_id')->value;?>
"/>
            <div class="personal_info_otr">
              <div class="personal_info_box">
                <div class="profile_upload_img_box">
                  <div class="profile_img">
                  <?php ob_start();?><?php echo $_smarty_tpl->getVariable('advisorInfo')->value['image_path'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1!=''){?>
                    <img id="profilePhotoImg" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/advisor_images/180X180px/<?php echo $_smarty_tpl->getVariable('advisorInfo')->value['image_path'];?>
"/>
                    <?php }else{ ?>
                    <img id="profilePhotoImg" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/advisor_images/user-blank-image.png"  
                    width="180" height="180"/>
                  <?php }?>
                  <a href="javascript:void(0);" id="changePhotoFront">change photo</a>	
                    <input type="hidden" id="profilePhoto" name="profilePhoto" size="12"/> 
                    <input type="hidden" name="old_image_path" id="old_image_path" value="<?php echo $_smarty_tpl->getVariable('advisorInfo')->value['image_path'];?>
" size="12" />
                    We <strong>strongly recommend</strong> that you provide a photo. Over 90% of the evisors that receive requests have photos.
                  </div>
                  <div class="profile_img">
                    	<img title="" alt="user" width="180" height="180" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/video-pro.png">
                  <a href="javascript:void(0);" id="changeVideoFront">change video</a>	
                        <input type="hidden" id="profileIntoVideo" name="profileIntoVideo"  style="width:96px; float:left;" />
                          <input type="hidden" name="old_video_path" id="old_video_path" value="<?php echo $_smarty_tpl->getVariable('advisorInfo')->value['video_path'];?>
" />
                  </div>
                </div>
                <div class="fld_otr">
                  <label for="login"> First name<font>*</font></label>
                  <input type="text" name="firstName" id="firstName" value="<?php echo $_smarty_tpl->getVariable('advisorInfo')->value['first_name'];?>
">
                </div>
                <div class="fld_otr">
                  <label for="login"> Last name<font>*</font></label>
                  <input type="text" name="lastName" id="lastName" value="<?php echo $_smarty_tpl->getVariable('advisorInfo')->value['last_name'];?>
">
                </div>
                <div class="fld_otr">
                  <label for="login"> Email<font>*</font></label>
                  <input type="text" id="email" name="email" value="<?php echo $_smarty_tpl->getVariable('advisorInfo')->value['email'];?>
" readonly="readonly">
                </div>
                <div class="fld_otr">
                  <label for="login"> Languages</label>
                  <input type="text" name="searchSpeakingLanguage" id="searchSpeakingLanguage" value="" size="25" />
                  <input id="addLanguage" class="cupan_code_btn" value="Add Language" type="button" >
                </div>
                <div class="fld_otr">
                  <div class="login_btn">
                    <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('langInfo')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                        <?php ob_start();?><?php echo $_smarty_tpl->getVariable('langInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['lang_id'];?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['lang_id'] = new Smarty_variable($_tmp2, null, null);?>
                        <?php if ($_smarty_tpl->getVariable('lang_id')->value=='17'||$_smarty_tpl->getVariable('lang_id')->value=='54'||$_smarty_tpl->getVariable('lang_id')->value=='22'||$_smarty_tpl->getVariable('lang_id')->value=='25'||$_smarty_tpl->getVariable('lang_id')->value=='30'||$_smarty_tpl->getVariable('lang_id')->value=='16'){?>
                            <div class="check_arrow">
                               <input type="checkbox" name="language[]" id="language"  value="<?php echo $_smarty_tpl->getVariable('langInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['lang_id'];?>
" 
                               <?php ob_start();?><?php echo $_smarty_tpl->getVariable('langInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['lang_id'];?>
<?php $_tmp3=ob_get_clean();?><?php if (in_array($_tmp3,$_smarty_tpl->getVariable('advSelLangArr')->value)==1){?> checked="checked" <?php }?> />
                              <label><?php echo $_smarty_tpl->getVariable('langInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['lang_name'];?>
</label>
                            </div>
	                    <?php }?>
                    <?php endfor; endif; ?>
                    <div id="showMoreLangByAdded">
                    <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('addedLangInfo')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                        <?php ob_start();?><?php echo $_smarty_tpl->getVariable('langInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['lang_id'];?>
<?php $_tmp4=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['lang_id'] = new Smarty_variable($_tmp4, null, null);?>
                            <div class="check_arrow">
                               <input name="language[]" type="checkbox" checked="checked" value="<?php echo $_smarty_tpl->getVariable('addedLangInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['lang_id'];?>
,1" />
                              <label><?php echo $_smarty_tpl->getVariable('addedLangInfo')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['lang_name'];?>
</label>
                            </div>
                    <?php endfor; endif; ?>
                    </div>
                  </div>
                </div>
                <div class="fld_otr">
                  <label for="login"> Phone number</label>
                   <select id="phoneCode" name="phoneCode">
                   <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['name'] = 'phcd';
$_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('countryPhnCdArr')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['phcd']['total']);
?> 
                    <option value="<?php echo $_smarty_tpl->getVariable('countryPhnCdArr')->value[$_smarty_tpl->getVariable('smarty')->value['section']['phcd']['index']]['id'];?>
" <?php if ($_smarty_tpl->getVariable('advisorInfo')->value['phone_code']==$_smarty_tpl->getVariable('countryPhnCdArr')->value[$_smarty_tpl->getVariable('smarty')->value['section']['phcd']['index']]['id']){?> selected="selected" <?php }?>>
                    	<?php echo $_smarty_tpl->getVariable('countryPhnCdArr')->value[$_smarty_tpl->getVariable('smarty')->value['section']['phcd']['index']]['country_name'];?>
&nbsp;(+<?php echo $_smarty_tpl->getVariable('countryPhnCdArr')->value[$_smarty_tpl->getVariable('smarty')->value['section']['phcd']['index']]['phone'];?>
)
                    </option>
                    <?php endfor; endif; ?>     
                  </select>
                  <input type="text" id="phoneNumber" name="phoneNumber" class="phone_txt" value="<?php echo $_smarty_tpl->getVariable('advisorInfo')->value['contact_no'];?>
">
                </div>
                <div class="fld_otr">
                  <label for="login"> Time zone:</label>
                  <select class="time_zone_box" name="time_zone" id="time_zone">
                    <option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---Select your Time zone---</option>
                    <?php  $_smarty_tpl->tpl_vars['tZ'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('TimeZone')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tZ']->key => $_smarty_tpl->tpl_vars['tZ']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['tZ']->value['id'];?>
" <?php if ($_smarty_tpl->getVariable('advisorInfo')->value['timezone']==$_smarty_tpl->tpl_vars['tZ']->value['id']){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['tZ']->value['gmt'];?>
 <?php echo $_smarty_tpl->tpl_vars['tZ']->value['timezone_location'];?>
</option>
            		<?php }} ?>
                  </select>
                </div>
                <div class="fld_otr">
                  <label for="login"> Availability<font>*</font></label>
                  <div class="availability_box">
                    <table>
                      <tbody>
                        <tr>
                          <th>&nbsp;</th>
                          <th><div class="avl_cheeck_box">M</div></th>
                          <th>T</th>
                          <th>W</th>
                          <th>T</th>
                          <th>F</th>
                          <th>S</th>
                          <th>S</th>
                        </tr>
                         <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('advAvailability')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                         <tr>
                          <td><?php echo $_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['hour'];?>
</td>
                          <td><div class="avl_cheeck_box">
                          	  <input type="checkbox" value="Y" name="availability[<?php echo $_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['time_id'];?>
][0]" 
                              <?php if ($_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['monday']=='Yes'){?> checked="checked" <?php }?> 
							  class="availableday0 availablehour<?php echo $_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['time_id'];?>
"  />
                            </div></td>
                          <td><div class="avl_cheeck_box">
                          	  <input type="checkbox" value="Y" name="availability[<?php echo $_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['time_id'];?>
][1]" 
                              <?php if ($_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['tuesday']=='Yes'){?> checked="checked" <?php }?> 
							  class="availableday1 availablehour<?php echo $_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['time_id'];?>
"  />
                            </div></td>
                          <td><div class="avl_cheeck_box">
                          	  <input type="checkbox" value="Y" name="availability[<?php echo $_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['time_id'];?>
][2]" 
                              <?php if ($_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['wednesday']=='Yes'){?> checked="checked" <?php }?> 
							  class="availableday2 availablehour<?php echo $_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['time_id'];?>
"  />
                            </div></td>
                          <td><div class="avl_cheeck_box">
                          	  <input type="checkbox" value="Y" name="availability[<?php echo $_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['time_id'];?>
][3]" 
                              <?php if ($_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['thursday']=='Yes'){?> checked="checked" <?php }?> 
							  class="availableday3 availablehour<?php echo $_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['time_id'];?>
"  />
                            </div></td>
                          <td><div class="avl_cheeck_box">
                          	  <input type="checkbox" value="Y" name="availability[<?php echo $_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['time_id'];?>
][4]" 
                              <?php if ($_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['friday']=='Yes'){?> checked="checked" <?php }?> 
							  class="availableday4 availablehour<?php echo $_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['time_id'];?>
"  />
                            </div></td>
                          <td><div class="avl_cheeck_box">
                          	  <input type="checkbox" value="Y" name="availability[<?php echo $_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['time_id'];?>
][5]" 
                              <?php if ($_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['saturday']=='Yes'){?> checked="checked" <?php }?> 
							  class="availableday5 availablehour<?php echo $_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['time_id'];?>
"  />
                            </div></td>
                          <td><div class="avl_cheeck_box">
                          	  <input type="checkbox" value="Y" name="availability[<?php echo $_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['time_id'];?>
][6]" 
                              <?php if ($_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['sunday']=='Yes'){?> checked="checked" <?php }?> 
							  class="availableday6 availablehour<?php echo $_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['time_id'];?>
"  />
                            </div></td>
                          <td><div class="all_txt"><a href="javascript:toggleavailableHour(<?php echo $_smarty_tpl->getVariable('advAvailability')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['time_id'];?>
);">all</a></div></td>  
                          </tr>
                          <?php endfor; endif; ?>  
                          <tr>
                            <td>&nbsp;</td>
                            <td><div class="all_txt"><a href="javascript:toggleavailableDay(0)">all</a></div></td>
                            <td><div class="all_txt"><a href="javascript:toggleavailableDay(1)">all</a></div></td>
                            <td><div class="all_txt"><a href="javascript:toggleavailableDay(2)">all</a></div></td>
                            <td><div class="all_txt"><a href="javascript:toggleavailableDay(3)">all</a></div></td>
                            <td><div class="all_txt"><a href="javascript:toggleavailableDay(4)">all</a></div></td>
                            <td><div class="all_txt"><a href="javascript:toggleavailableDay(5)">all</a></div></td>
                            <td><div class="all_txt"><a href="javascript:toggleavailableDay(6)">all</a></div></td>
                            <td>&nbsp;</td>
                          </tr>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="fld_otr">
                    <label for="login"> Comment on availablilty :</label>
                    <textarea name="availability_comment" id="availability_comment"><?php echo $_smarty_tpl->getVariable('advisorInfo')->value['availability_comment'];?>
</textarea>
                  </div>
                </div>
                <div class="pricing_pay_otr">
                
                <fieldset>
                <legend> Pricing & Payment </legend>
                  <!--<div class="notifi_head">Pricing & Payment</div>-->
                  <div class="session_completd_otr">
                    <div class="session_req_left">
                      <div class="session_req_lef_head">
                        <div class="request_one">Consultation Type</div>
                        <div class="request_two">Your Listed Price</div>
                         <div class="request_two">For the First Consultation</div>
                          <div class="request_two">For Repeat Consultations*</div>
                      </div>
                      <div class="session_req_lef_comment">
                        <div class="comment_one">Webcam consulting (in US $)</div>
                        <div class="comment_two">
                         <input type="text" id="yourListedPriceWebConsulte" name="yourListedPriceWebConsulte" 
                         <?php if ($_smarty_tpl->getVariable('advisorInfo')->value['priceWebConsulte']!=''){?>value="<?php echo number_format($_smarty_tpl->getVariable('advisorInfo')->value['priceWebConsulte'],2);?>
" <?php }else{ ?> value="00.00" <?php }?> >
                        </div>
                        <div class="comment_two">
                         <input type="text" id="firstPriceWebConsulte" name="firstPriceWebConsulte" readonly="readonly"
                         <?php if ($_smarty_tpl->getVariable('advisorInfo')->value['firstPriceWebConsulte']!=''){?>value="<?php echo number_format($_smarty_tpl->getVariable('advisorInfo')->value['firstPriceWebConsulte'],2);?>
" <?php }else{ ?> value="00.00" <?php }?>>
                        </div>
                        <div class="comment_two">
                         <input type="text" id="repeatPriceWebConsulte" name="repeatPriceWebConsulte" readonly="readonly"
                        <?php if ($_smarty_tpl->getVariable('advisorInfo')->value['repeatPriceWebConsulte']!=''){?> value="<?php echo number_format($_smarty_tpl->getVariable('advisorInfo')->value['repeatPriceWebConsulte'],2);?>
" <?php }else{ ?> value="00.00" <?php }?>>
                        </div>
                      </div>
                      <div class="session_req_lef_comment">
                        <div class="comment_one">Email consulting (in US $)</div>
                        <div class="comment_two">
                         <input type="text" id="yourListedPriceWebcamEmailConsulte" name="yourListedPriceWebcamEmailConsulte"
                         <?php if ($_smarty_tpl->getVariable('advisorInfo')->value['priceEmailConsulte']!=''){?> value="<?php echo number_format($_smarty_tpl->getVariable('advisorInfo')->value['priceEmailConsulte'],2);?>
" <?php }else{ ?> value="00.00" <?php }?>>
                        </div>
                        <div class="comment_two">
                         <input type="text" id="firstPriceWebcamEmailConsulte" name="firstPriceWebcamEmailConsulte" readonly="readonly"
                         <?php if ($_smarty_tpl->getVariable('advisorInfo')->value['firstPriceWebcamEmailConsulte']!=''){?>value="<?php echo number_format($_smarty_tpl->getVariable('advisorInfo')->value['firstPriceWebcamEmailConsulte'],2);?>
" <?php }else{ ?> value="00.00" <?php }?>>
                        </div>
                        <div class="comment_two">
                         <input type="text" id="repeatPriceWebcamEmailConsulte" name="repeatPriceWebcamEmailConsulte" readonly="readonly"
                         <?php if ($_smarty_tpl->getVariable('advisorInfo')->value['repeatPriceWebcamEmailConsulte']!=''){?> value="<?php echo number_format($_smarty_tpl->getVariable('advisorInfo')->value['repeatPriceWebcamEmailConsulte'],2);?>
" <?php }else{ ?> value="00.00" <?php }?>>
                        </div>
                      </div>
                      <!--<div class="session_req_lef_comment">
                        <div class="comment_one">Bulk rate for Webcam/Email consulting (in US $)</div>
                        <div class="comment_two">
                         <input type="text" id="priceEmailConsulteBulk" name="priceEmailConsulteBulk" value="<?php echo $_smarty_tpl->getVariable('advisorInfo')->value['priceEmailConsulteBulk'];?>
">
                        </div>
                      </div>-->
                    </div>
                  </div>	
                  <div class="fld_otr_bank_code"> <span>Bank account details</span>
                    <div class="fld_otr_bank_code_inner">
                      <label for="login"> Bank code :</label>
                      <input type="text" id="bank_code" name="bank_code"  value="<?php echo $_smarty_tpl->getVariable('advisorInfo')->value['bank_code'];?>
">
                    </div>
                    <div class="fld_otr_bank_code_inner">
                      <label for="login"> Branch code :</label>
                      <input type="text" id="branch_code" name="branch_code"  value="<?php echo $_smarty_tpl->getVariable('advisorInfo')->value['branch_code'];?>
">
                    </div>
                    <div class="fld_otr_bank_code_inner">
                      <label for="login"> IBAN number:</label>
                      <input type="text" id="IBAN_code" name="IBAN_code"  value="<?php echo $_smarty_tpl->getVariable('advisorInfo')->value['IBAN_code'];?>
">
                    </div>
                  </div>
                  </fieldset>
                </div>
                
                <div class="social_media_otr">
                <fieldset>
                <!--<div class="notifi_head">Social Media</div>-->
                <legend>Social Media</legend>
                	<div class="fld_otr">
                  <label for="login"> Website :</label>
                  <input type="text" id="websitePageLink" name="websitePageLink" value="<?php echo $_smarty_tpl->getVariable('advSocailMediaInfo')->value['website'];?>
">
                </div>
                
                <div class="fld_otr">
                  <label for="login"> Blog :</label>
                  <input type="text" id="blogPageLink" name="blogPageLink" value="<?php echo $_smarty_tpl->getVariable('advSocailMediaInfo')->value['blog'];?>
">
                </div>

			<div class="fld_otr">
                  <label for="login"> Linkedin :</label>
                  <input type="text" id="linkedinPageLink" name="linkedinPageLink" value="<?php echo $_smarty_tpl->getVariable('advSocailMediaInfo')->value['linkedin'];?>
">
                </div>
                
                <div class="fld_otr">
                  <label for="login"> Facebook :</label> 	 	 	 	 	
                  <input type="text" id="facebookPageLink" name="facebookPageLink" value="<?php echo $_smarty_tpl->getVariable('advSocailMediaInfo')->value['facebook'];?>
">
                </div>
                                
                <div class="fld_otr">
                  <label for="login"> Twitter :</label>
                  <input type="text" id="twitterPageLink" name="twitterPageLink" value="<?php echo $_smarty_tpl->getVariable('advSocailMediaInfo')->value['twitter'];?>
">
                </div>
                
                </fieldset>
                </div>
                
                
                <div class="fld_otr" style="width:100%;">
                  <div class="personal_btn">
                    <input type="submit" name="submittAdvProfileInfo" id="submittAdvProfileInfo" value="Save personal information" >
                    <input type="submit" name="submittAdvProfileInfo" id="submittAdvProfileInfo" value="Save and continue">
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
<!--/Start::JS/-->
<div id="javaScript">
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/advisor_account/advisor_edit_validate.js"></script>
<!--/Start::AutoIncrmnt/-->
<script type='text/javascript' src='<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/autocomplete/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/autocomplete/jquery.autocomplete.css" />
<!--/End::AutoIncrmnt/-->
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/advisor_account/advisor_profile_info.js"></script>
<!--/Start::popupChangePhoto/--> 
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/lightbox/popup.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/lightbox/thickbox.js"></script>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/lightbox/css/thickbox.css" type="text/css" media="screen" />
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/gurubul.js" type="text/javascript"></script>
<!--/End::popupChangePhoto/--> 
</div>
<!--/End::JS/-->
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>