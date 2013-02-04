<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 11:17:19
         compiled from "../templates/advisor_account/message_advisor_payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31184510269bf2e6fd9-08164203%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f65dc40f04be3d668e8d2be9603af97b8741a9c' => 
    array (
      0 => '../templates/advisor_account/message_advisor_payment.tpl',
      1 => 1359112623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31184510269bf2e6fd9-08164203',
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
      <div class="abt_main_otr">
        <div class="dash_user_left">
          <?php $_smarty_tpl->tpl_vars['abt_active3'] = new Smarty_variable("abt_active", null, null);?>
        <?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('advisorLeftMenu')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        </div>
        <div class="session_deails1 msg_details_page">
          <!--<div class="edit_menu_start">
            <ul>
              <li> <a class="edit_act_nav1" href="#"> Pending Request </a></li>
              <li> <a href="#"> Accepted Request</a></li>
              <li> <a href="#"> Completed Request</a></li>
            </ul>
          </div>-->
          <div class="pending_req">
            <div class="pending_req_head"> Consultation with <?php echo $_smarty_tpl->getVariable('user')->value['username'];?>
 </div>
            <ul class="msg_topic">
              <!--<li> <span>Topic</span> : Not yet scheduled </li>-->
              <li> <span>Subject </span>: <?php echo $_smarty_tpl->getVariable('message')->value['subject'];?>
 </li>
              <li> <span>Deadline</span> : <?php echo $_smarty_tpl->getVariable('message')->value['deadline'];?>
 days </li>
              <?php if ($_smarty_tpl->getVariable('files')->value!=''){?>
              <li> 
              		<span>Attached Files</span>: <br />
                    <div style="margin-left:120px; float:left;width:100%;">
                    	<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('files')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
                         <?php echo $_smarty_tpl->tpl_vars['i']->value['indx'];?>
].&nbsp;<?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
.<?php echo $_smarty_tpl->tpl_vars['i']->value['format'];?>

                         &nbsp;&nbsp;&nbsp;&nbsp;
                         <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
dwnldemailconsulteattchfile/<?php echo base64_encode($_smarty_tpl->tpl_vars['i']->value['message_file_id']);?>
">Download</a>
                         <br />
                        <?php }} ?>
                    </div>
                    
	          </li>
            <?php }?>	  
            </ul>
            <!--<div class="cmt_img"> <img src="images/user-comment.png" alt="user" title=""> </div>-->
          </div>
          <div class="edit_menu_start2">
            <ul>
              <li> <a href="#" > Accept </a></li>
              <li> <a href="#" class="edit_act_nav1"> Payment</a></li>
              <li> <a href="#"> Answer</a></li>
              <li> <a href="#"> Feedback</a></li>
              <li> <a href="#"> Finished</a></li>
              <div class="accept_tab1">
                <div class="accept_tab1_head"> The ball is in the customer's court.  We are waiting to receive payment from the customer. The customer has 48 hours to pay.</div>
              </div>
              <div class="accept_below_tab">
                <div class="pending_req_head"> <?php echo $_smarty_tpl->getVariable('user')->value['username'];?>
's Question </div>
                <div class="q_box">
                  <div class="q_box_left">
                    <div  class="q_head"> <?php echo $_smarty_tpl->getVariable('message')->value['description'];?>
 </div>
                    <!--<div class="q_qs_otr">
                      <div class="q_qustion"> Question </div>
                      <div class="q_ans"> more info on my question more info on my question </div>
                    </div>-->
                    <!--<div class="q_qs_otr">
                      <div class="q_qustion"> Question </div>
                      <div class="q_ans"> more info on my question more info on my question </div>
                    </div>-->
                  </div>
                  <input type="hidden" name="mid" id="mid" value="<?php echo $_smarty_tpl->getVariable('message')->value['message_id'];?>
" />
            <input type="hidden" name="adv_name" id="adv_name" value="<?php echo $_smarty_tpl->getVariable('adv')->value['first_name'];?>
" />
            <input type="hidden" name="usr_name" id="usr_name" value="<?php echo $_smarty_tpl->getVariable('user')->value['username'];?>
" />
                  <div class="q_box_right">
                    <div class="cleara_box">
                            	<div class="cleara_box_head">Clarify</div>
                                <div class="cleara_msg" id="msg_otr" style="overflow:auto; max-height:150px;">
                                	<!--<div>No chat message have ben sent</div>-->
                                    <?php echo $_smarty_tpl->getVariable('chat')->value;?>

                                </div>
                                <textarea id="msg" onkeydown="if (event.keyCode == 13) $('#send_msg_but').click()"></textarea>
                                <button id="send_msg_but" name="">Enter</button> 
                            </div>
                  </div>
                </div>
              </div>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--/End::Body/-->


<script type="text/javascript" src="../front_media/js/advisor_account/advisor_chat.js"></script>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>