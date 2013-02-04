<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 09:54:46
         compiled from "../templates/advisor_account/edit_advisor_pitch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:145685102566613c8b3-71295280%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd497d9cbf3a11e2986189b7203216f4e4f50583' => 
    array (
      0 => '../templates/advisor_account/edit_advisor_pitch.tpl',
      1 => 1358935124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145685102566613c8b3-71295280',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"My Profile - My Pitch"); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
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
                <li> <a href="edit-advisor-workx"> Work Exp</a></li>
                <li> <a href="edit-advisor-exper"> Expertise</a></li>
                <li> <a href="edit-advisor-pitch" class="edit_act_nav1"> My pitch</a></li>
              </ul>
            </div>
             <form name="profileInfoForm" id="profileInfoForm" method="post"
            action="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor_account/edit_advisor_dash_action.php" >
             <input type="hidden" name="advisor_id" id="advisor_id" value="<?php echo $_smarty_tpl->getVariable('advisor_id')->value;?>
"/>
            <div class="personal_info_otr">
              <div class="personal_info_box">
                <div class="expertise_otr">
                  <div class="fld_otr_txtarea">
                  <div class="pitch_txtarea">
                    <textarea name="pitchField" id="pitchField" onkeyup="countChar(this);" style="width:600px; height:150px;"><?php echo $_smarty_tpl->getVariable('my_pitch')->value;?>
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