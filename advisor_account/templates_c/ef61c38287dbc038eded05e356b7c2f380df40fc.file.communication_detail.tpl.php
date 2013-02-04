<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 06:28:26
         compiled from "../templates/advisor_account/communication_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:275765102260aec37f7-59053477%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef61c38287dbc038eded05e356b7c2f380df40fc' => 
    array (
      0 => '../templates/advisor_account/communication_detail.tpl',
      1 => 1358935124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '275765102260aec37f7-59053477',
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
    <div class="about_page_otr">
      <h1>Advisor Account</h1>
      <div class="line_divider"></div>
      <div class="abt_main_otr">
         <?php $_smarty_tpl->tpl_vars['abt_active7'] = new Smarty_variable("abt_active", null, null);?>
        <?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('advisorLeftMenu')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        <div class="user_dash_right_part">
        
        <div class="recent_communication">
            <div class="cmt_otr">
              <div class="cmt_otr_left">
                <div class="cmt_img"><img align="left" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/user_images/180X180px/<?php echo $_smarty_tpl->getVariable('communication')->value['img'];?>
" alt="" title=""><span><?php echo $_smarty_tpl->getVariable('communication')->value['uname'];?>
</span></div>
              </div>
              <div class="cmt_otr_right">
                <div class="cmt_rt_head"><?php echo $_smarty_tpl->getVariable('communication')->value['subject'];?>
</div>
               <div class="cmt_rt_descrption"><?php echo $_smarty_tpl->getVariable('communication')->value['message'];?>
</div>
                <div class="cmt_rt_posted"> <span> <?php echo $_smarty_tpl->getVariable('communication')->value['date_created'];?>
 </span> </div>
                <!--<div class="msg_bottom_head"><a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
communication-detail/<?php echo $_smarty_tpl->getVariable('communication')->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['communication_id'];?>
">View Conversation & Reply</a></div>-->
                
              </div>
            </div>
          </div>
        
        
        <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['record']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['name'] = 'record';
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('com_rep')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['record']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['record']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['record']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['record']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['record']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['record']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['record']['total']);
?>
        			
          <div class="recent_communication">
            <div class="msg_otr">
              <div class="msg_lt">
                <div class="msg_lt_img"><img align="left" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/<?php echo $_smarty_tpl->getVariable('com_rep')->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['u_a'];?>
/180X180px/<?php echo $_smarty_tpl->getVariable('com_rep')->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['img'];?>
" alt="" title=""></div>
              </div>
              <div class="msg_rt">
               <!-- <div class="msg_rt_head"><?php echo $_smarty_tpl->getVariable('com_rep')->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['message'];?>
</div>-->
                <div class="msg_rt_txt_part" style="font-size:14px;"><?php echo $_smarty_tpl->getVariable('com_rep')->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['message'];?>
</div>
                 <div class="cmt_rt_posted"> <span> <?php echo $_smarty_tpl->getVariable('com_rep')->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['date'];?>
 </span> </div>
                <!-- <div class="msg_bottom_head"><a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
communication-detail/<?php echo $_smarty_tpl->getVariable('communication')->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['communication_id'];?>
">View Conversation & Reply</a></div>-->
                
              </div>
            </div>
          </div>
          <?php endfor; endif; ?> 
          <div class="recent_communication recnt_rpl">
          <div class="msg_otr">
          <div class="msg_rt_head" style="border-bottom:none">Add a Reply</div>
          <br>
          <form method="post" id="replyFrom" action="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor_account/com_reply.php">
          <input type="hidden" name="cid" value="<?php echo $_smarty_tpl->getVariable('communication')->value['communication_id'];?>
">
          <input type="hidden" name="to" value="<?php echo $_smarty_tpl->getVariable('communication')->value['from'];?>
">
          <textarea  name="reply_con" id="reply_con"></textarea>
          <div class="fld_otr"><input type="submit" name="reply" id="reply" value="Reply" ></div>
          </form>
          </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
<!--/End::Body/-->

<script type="text/javascript">
$(document).ready(function(e) {
    $('#reply').click(function(e) {
        $('#replyFrom').validate({
			rules:{
				reply_con:{
					required: true,
					maxlength: 300
				}
			},
			messages:{
				reply_con:{
					required: "You can not send a blank reply.",
					maxlength: "Maximum size is 300 characters."
				}
			}
		});
    });
});
</script>

<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/gurubul.js" type="text/javascript"></script>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>