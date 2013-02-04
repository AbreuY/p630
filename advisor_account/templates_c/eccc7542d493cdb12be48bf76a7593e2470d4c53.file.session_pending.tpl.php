<?php /* Smarty version Smarty-3.0.8, created on 2013-01-24 15:07:01
         compiled from "../templates/advisor_account/session_pending.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2668451014e15a877c6-58012344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eccc7542d493cdb12be48bf76a7593e2470d4c53' => 
    array (
      0 => '../templates/advisor_account/session_pending.tpl',
      1 => 1359040021,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2668451014e15a877c6-58012344',
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
  <div id="Pageholder">
    <div class="about_page_otr">
      <h1>Advisor Account</h1>
      <div class="line_divider"></div>
      <div class="abt_main_otr"> <?php $_smarty_tpl->tpl_vars['abt_active3'] = new Smarty_variable("abt_active", null, null);?>
        <?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('advisorLeftMenu')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        <div class="adviosr_session_msg">
          <div class="edit_menu_start">
            <ul>
              <li> <a class="edit_act_nav1" href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
session-pending"> Pending Request </a></li>
              <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
session-accepted"> Accepted Request</a></li>
              <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
session-completed"> Completed Request</a></li>
            </ul>
          </div>
          <div class="pending_req">
            <div class="pending_req_head"> Agenda for webcam sessions</div>
            <ul>
              <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('webcam')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
              <li><?php echo $_smarty_tpl->tpl_vars['i']->value['subject'];?>

                <div class="comment_two"> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
webcam-accept-detail/<?php echo $_smarty_tpl->tpl_vars['i']->value['webcam_id'];?>
">
                  <input type="submit" name="" value="Review">
                  </a> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
webcam-reject/<?php echo $_smarty_tpl->tpl_vars['i']->value['webcam_id'];?>
">
                  <input type="submit" name="" value="Reject">
                  </a> </div>
              </li>
              <?php }} else { ?>
                <div class="session_req_lef_comment">
                    <div class="comment_one" style="width:100%; margin-top:10px;"><strong> No Any! Webcam Sessions Request to Display Here!</strong></div>
                    <div class="comment_two">&nbsp;</div>
                </div>
              <?php } ?> 
              <!--<span><a href="#"> See more..</a></span>-->
            </ul>
          </div>
          <div class="pending_req">
            <div class="pending_req_head"> Email consultancy messages</div>
            <ul>
              <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('message')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
              <li> <?php echo $_smarty_tpl->tpl_vars['i']->value['subject'];?>

                <div class="comment_two"> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
message-accept-detail/<?php echo $_smarty_tpl->tpl_vars['i']->value['message_id'];?>
">
                  <input type="submit" name="" value="Review">
                  </a> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
message-reject/<?php echo $_smarty_tpl->tpl_vars['i']->value['message_id'];?>
">
                  <input type="submit" name="" value="Reject">
                  </a> </div>
              </li>
              <?php }} else { ?>
                <div class="session_req_lef_comment">
                    <div class="comment_one" style="width:100%; margin-top:10px;"><strong> No Any! Email Consultancy Message Request to Display Here!
                    </strong></div>
                    <div class="comment_two">&nbsp;</div>
                </div>
              <?php } ?> 
              <!--<span><a href="#"> See more..</a></span>-->
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/End::Body/--> 
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>