<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 07:31:31
         compiled from "../templates/user_account/usersession_completed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7958510234d3740960-92979498%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71f2288b17ff0a2db28631813b9611bc2a541296' => 
    array (
      0 => '../templates/user_account/usersession_completed.tpl',
      1 => 1359098918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7958510234d3740960-92979498',
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
      <h1>User Account</h1>
      <div class="line_divider"></div>
      <div class="abt_main_otr"> <?php $_smarty_tpl->tpl_vars['abt_active5'] = new Smarty_variable("abt_active", null, null);?>
        <?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('userLeftMenu')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        <div class="adviosr_session_msg">
          <div class="edit_menu_start">
            <ul>
              <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
usersession-pending" style="width:145px;" > Pending Request </a></li>
              <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
usersession-accepted" style="width:145px;" > Accepted Request</a></li>
              <li> <a class="edit_act_nav1" style="width:145px;"  href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
usersession-completed"> Completed Request</a></li>
              <li> <a style="width:145px;" href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
usersession-rejected"> Rejected Request</a></li>
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