<?php /* Smarty version Smarty-3.0.8, created on 2013-01-24 13:16:00
         compiled from "../templates/user_account/user_communication.tpl" */ ?>
<?php /*%%SmartyHeaderCode:514551013410a44e12-13750251%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '476a3a24cb7b701737fb3b828405e697993fda71' => 
    array (
      0 => '../templates/user_account/user_communication.tpl',
      1 => 1358956607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '514551013410a44e12-13750251',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title','UserDashBoard'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?> 
<script src="front_media/js/jquery.validate.js" type="text/javascript"></script>
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
      <h1>User Account</h1>
      <div class="line_divider"></div>
      <div class="abt_main_otr">
        <?php $_smarty_tpl->tpl_vars['abt_active6'] = new Smarty_variable("abt_active", null, null);?>
        <?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('userLeftMenu')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        <div class="user_dash_right_part">
        <div class="session_heading_titl">Communication</div>
        
        <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['record']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['name'] = 'record';
$_smarty_tpl->tpl_vars['smarty']->value['section']['record']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('communication')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <div class="cmt_otr">
              <div class="cmt_otr_left">
                <div class="cmt_img"><img align="left" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/advisor_images/180X180px/<?php echo $_smarty_tpl->getVariable('communication')->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['img'];?>
" alt="" title=""><span>To: <?php echo $_smarty_tpl->getVariable('communication')->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['fname'];?>
<a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
delete-usr-com/<?php echo $_smarty_tpl->getVariable('communication')->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['communication_id'];?>
"><div style="border:solid 1px;">Delete</div></a></span></div>
              </div>
              <div class="cmt_otr_right">
                <div class="cmt_rt_head"><strong><?php echo $_smarty_tpl->getVariable('communication')->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['subject'];?>
</strong></div><?php if ($_smarty_tpl->getVariable('communication')->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['new_usr']==1){?><span style="border:solid 1px;">New</span><?php }?>
                <div class="cmt_rt_descrption"><?php echo $_smarty_tpl->getVariable('communication')->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['message'];?>
</div>
                <div class="cmt_rt_posted"> <span> <?php echo $_smarty_tpl->getVariable('communication')->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['date_updated'];?>
 </span> </div>
                <div class="posted_btn"><a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
user-communication-detail/<?php echo $_smarty_tpl->getVariable('communication')->value[$_smarty_tpl->getVariable('smarty')->value['section']['record']['index']]['communication_id'];?>
">View Conversation & Reply</a></div>
                
              </div>
            </div>
          </div>
          <?php endfor; endif; ?>
          <?php if (empty($_smarty_tpl->getVariable('communication',null,true,false)->value)){?>
           <div class="recent_communication">
            <div class="cmt_otr">
           <strong> No Messages to Display !</strong>
            </div>
           </div>
          <?php }?>
          
          <?php if ($_smarty_tpl->getVariable('pagination')->value!=''){?>
          <div class="recent_communication">
           <span><?php echo $_smarty_tpl->getVariable('pagination')->value;?>
</span>
          </div>
          <?php }?>
                    
        </div>
      </div>
    </div>
  </div>
</div>

<div id="script"> 
  <script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/gurubul.js" type="text/javascript"></script> 
<!--/End::Body/--> 
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>