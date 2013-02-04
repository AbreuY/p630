<?php /* Smarty version Smarty-3.0.8, created on 2012-12-26 14:37:01
         compiled from "../templates/advisor_account/advisor_mypitch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184950db0b8dbf7828-75175053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5159114f3929cce41da5f31e5ef3b54131f547f' => 
    array (
      0 => '../templates/advisor_account/advisor_mypitch.tpl',
      1 => 1356532619,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184950db0b8dbf7828-75175053',
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
" > Personal Info</a></li>
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
" class="edit_act_nav1"> My pitch</a></li>
              </ul>
            </div>
            <form name="profileInfoForm" id="profileInfoForm" method="post"
            action="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor_account/advisor_active_account_action.php?cd=<?php echo $_GET['cd'];?>
" >
             <input type="hidden" name="advisor_id" id="advisor_id" value="<?php echo $_smarty_tpl->getVariable('advisor_id')->value;?>
"/>
            <div class="personal_info_otr">
              <div class="personal_info_box">
                <div class="expertise_otr">
                  <div class="fld_otr_txtarea">
                  
                  <div class="pitch_txtarea">
                    <textarea name="pitchField" id="pitchField" onkeyup="countChar(this);"><?php echo $_smarty_tpl->getVariable('my_pitch')->value;?>
</textarea>
                    
                      <strong>Characters.</strong>
                	   <div id="charNum">
							<?php if ($_smarty_tpl->getVariable('my_pitch')->value!=''){?> <?php echo $_smarty_tpl->getVariable('pitchCnt')->value;?>
 <?php }else{ ?> 600 <?php }?>
                       </div> 
                       </div> 
                    
                    <div class="pitch_otr">
                    <div class="pitch_img"></div>
                    <div class="pitch_msg">
                    	Optional, but recommended. Write a few lines covering what you have to offer and why people should pick your advice. For example:<br /><br />

With 10+ years of experience in a wide range of businesses, I can help you with common sense advice on everything from getting that first job to Business Plans, Marketing Strategy and everyday operational problems. I can help you navigate the rough waters of the business world. Let's talk.<br /><br />

If you become a top rated expert, the first 140 characters of your pitch may be visible on the front page of Evisors.com 
                    	
                    </div>
                    </div>
                    
                  </div>
                  
                  
                 
                </div>
              
                <div class="fld_otr" style="width:100%;">
                  <div class="personal_btn">
                    <input type="submit" name="btnAdvPitchSubmit" id="btnAdvPitchSubmit" value="Save Pitch">
                    <input type="submit" name="btnAdvPitchSubmit" id="btnAdvPitchSubmit" value="Save and Complete">
                  </div>
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
<!--/Start::JS/-->
<div id="javaScript">
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/gurubul.js" type="text/javascript"></script> 
</div>
<!--/End::JS/-->
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>