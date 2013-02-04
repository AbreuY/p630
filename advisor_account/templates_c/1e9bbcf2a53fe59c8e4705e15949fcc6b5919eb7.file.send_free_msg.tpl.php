<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 06:25:02
         compiled from "../templates/advisor_account/send_free_msg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9965102253e542d00-92519409%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e9bbcf2a53fe59c8e4705e15949fcc6b5919eb7' => 
    array (
      0 => '../templates/advisor_account/send_free_msg.tpl',
      1 => 1358955760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9965102253e542d00-92519409',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"Advisor Dashboard"); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header2')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<!--/Start::Body/-->

<div id="WrapperOtr">
  <div id="Pageholder"> <?php echo $_smarty_tpl->getVariable('msg')->value;?>

    <div class="advisor_search_main_page">
      <div class="profile_advisor_srch_page">
        <div class="fb_twit_otr"> <a href="#"><img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/fb-main.png" alt="fb-main" title="Facebook"></a> <a href="#"><img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/twit-main.png" alt="twit-main" title="Twitter"></a> </div>
        <div class="inn_profile_otr">
          <div class="inn_profile_left">
            <div class="inn_user_img"><?php ob_start();?><?php echo $_smarty_tpl->getVariable('DetArr')->value['image_path'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1!=''){?>
                            <img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/advisor_images/180X180px/<?php echo $_smarty_tpl->getVariable('DetArr')->value['image_path'];?>
"/>
                            <?php }else{ ?>
                            <img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/advisor_images/user-blank-image.png"  
                            width="180" height="180"/>
                            <?php }?></div>
            <div class="profile_rt" >
              <div class="profile_rt_titl"><?php echo $_smarty_tpl->getVariable('DetArr')->value['first_name'];?>
&nbsp;<?php echo $_smarty_tpl->getVariable('DetArr')->value['last_name'];?>
</div>
              <div class="profile_rt_position">&nbsp;</div>
              <div class="profile_rt_consult"><strong>Consults in :</strong> <?php echo $_smarty_tpl->getVariable('Lan')->value;?>
.</div>
              <p><?php echo $_smarty_tpl->getVariable('DetArr')->value['my_pitch'];?>
</p>
            </div>
          </div>
          <div class="inn_profile_right">
            <div class="profile_rt_rating"> <span> Rating </span>
              <div title="good" style="cursor: default;" id="17"><img id="17-1" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on1.png" alt="1" title="good" class="17">&nbsp;<img id="17-2" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on1.png" alt="2" title="good" class="17">&nbsp;<img id="17-3" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on1.png" alt="3" title="good" class="17">&nbsp;<img id="17-4" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on1.png" alt="4" title="good" class="17">&nbsp;<img id="17-5" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-off1.png" alt="5" title="good" class="17"> </div>
            </div>
            <div class="btn_pro_otr">
              <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
schedule-web-cam/<?php echo $_smarty_tpl->getVariable('aid')->value;?>
"><input type="submit" name="" value="Schedule a web-cam session"></a>
              <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
book-an-email/<?php echo $_smarty_tpl->getVariable('aid')->value;?>
"><input type="submit" name="" value="Email consultation"></a>
            </div>
          </div>
        </div>
        
        <!-- search_page_dash_otr -----------start ------>
        <div class="search_page_dash_otr">
          <div class="edit_menu_start">
            <ul>
              <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
view-advisor-profile/<?php echo $_smarty_tpl->getVariable('aid')->value;?>
"> Expert information </a> </li>
              <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
schedule-web-cam/<?php echo $_smarty_tpl->getVariable('aid')->value;?>
"> Schedule a web-cam session</a></li>
              <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
book-an-email/<?php echo $_smarty_tpl->getVariable('aid')->value;?>
"> Book an email consultation</a></li>
              <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
send-free-msg/<?php echo $_smarty_tpl->getVariable('aid')->value;?>
" class="edit_act_nav1"> Send free messages</a></li>
              <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
view-all-products/<?php echo $_smarty_tpl->getVariable('aid')->value;?>
"> View all products</a></li>
            </ul>
          </div>
          <div class="tab_cont_otr">
            <div class="send_free_msg_tab">
            <form action="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor_account/send_free_msg_action.php" name="freeMsgForm" id="freeMsgForm" method="post">
              <div class="personal_info_box">
            	<div class="fld_otr">
                  <label> Subject </label>
                 <input type="text" name="subject" id="subject" style="width:400px;">
                 <input type="hidden" name="aid" value="<?php echo $_smarty_tpl->getVariable('aid')->value;?>
" />
                </div>
                
                <div class="fld_otr">
                  <label> Type your message here </label>
                 <textarea name="msgg" onkeyup="countCharMsg(this);" id="msgg"></textarea>
                 <div>Chataters remaining: <strong><span id="left_chars">300</span></strong></div>
                </div>
                
                <div style="width:100%" class="fld_otr">
                  <div class="personal_btn">
                    <input type="submit" value="Send" id="send" name="send">
                  </div>
                </div>
                
                
                </div>
                </form>
                
            </div>
          </div>
        </div>
        <!-- search_page_dash_otr -----------end ------> 
        
      </div>
    </div>
  </div>
</div>
 <script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/gurubul.js" type="text/javascript"></script>
 <script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/jquery.validate.js" type="text/javascript"></script>
 <script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/advisor_account/free_msg_validate.js" type="text/javascript"></script> 
<!--/End::Body/-->
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>