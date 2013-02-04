<?php /* Smarty version Smarty-3.0.8, created on 2013-01-24 15:05:16
         compiled from "../templates/advisor_account/session_completed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2459051014dac2452d8-31012136%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9def397ef82cd006b388ce45a9c3c089d3e2980' => 
    array (
      0 => '../templates/advisor_account/session_completed.tpl',
      1 => 1359039915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2459051014dac2452d8-31012136',
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
              <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
session-pending"> Pending Request </a></li>
              <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
session-accepted"> Accepted Request</a></li>
              <li> <a class="edit_act_nav1" href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
session-completed"> Completed Request</a></li>
            </ul>
          </div>
          <div class="pending_req">
            <div class="pending_req_head"> Webcam sessions </div>
            <ul>
              <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('webcam')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
              <li> <?php echo $_smarty_tpl->tpl_vars['i']->value['subject'];?>

                <div class="comment_two"> </div>
              </li>
              <?php }} else { ?>
               <div class="session_req_lef_comment">
                    <div class="comment_one" style="width:100%; margin-top:10px;"><strong> No Any! Webcam Sessions Completed Request to Display Here ! 
                    </strong></div>
                    <div class="comment_two">&nbsp;</div>
                </div>
              <?php } ?>
            </ul>
          </div>
          <div class="pending_req">
            <div class="pending_req_head"> Email Consulting</div>
            <ul>
              <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('message')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
              <li> <?php echo $_smarty_tpl->tpl_vars['i']->value['subject'];?>

                <div class="comment_two"> </div>
              </li>
              <?php }} else { ?>
              <div class="session_req_lef_comment">
                    <div class="comment_one" style="width:100%; margin-top:10px;"><strong> No Any! Email Consultancy Completed Request to Display Here ! 
                    </strong></div>
                    <div class="comment_two">&nbsp;</div>
                </div>
              <?php } ?>
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