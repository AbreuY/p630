<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 10:14:30
         compiled from "../templates/advisor_account/advisor_dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:291651025b06069fc4-96148425%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7b013906e56e35e7758d17ab8f835481f24a1c4' => 
    array (
      0 => '../templates/advisor_account/advisor_dashboard.tpl',
      1 => 1359108868,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '291651025b06069fc4-96148425',
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
      	<?php $_smarty_tpl->tpl_vars['abt_active1'] = new Smarty_variable("abt_active", null, null);?>
        <?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('advisorLeftMenu')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        
        <div class="user_dash_right_part">
        <div class="session_heading_titl">Dashboard</div>
        
        <div class="session_completd_otr">
        <!--<div class="session_heading">Pending &amp; Paid Requests</div>
        <br /><br /><br />-->
        <div class="session_completd_otr" style="width:99%;">
            <div class="session_req_left">
            	<div class="session_req_lef_head">
                	<div class="request_one">Pending Requests For Webcam Session</div>
                   <!-- <div class="request_two">Status</div>-->
                </div>
                
                <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pend_webcam')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
                <div class="session_req_lef_comment">
                	<div class="comment_one"><?php echo $_smarty_tpl->tpl_vars['i']->value['subject'];?>
</div>
                    <div class="comment_two"> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
webcam-accept-detail/<?php echo $_smarty_tpl->tpl_vars['i']->value['webcam_id'];?>
">View</a></div>
                </div>
                <?php }} ?>
                
            	<div class="session_req_lef_head">
                	<div class="request_one">Pending Requests For Message Session</div>
                   <!-- <div class="request_two">Status</div>-->
                </div>
                
                 <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('pend_message')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
                <div class="session_req_lef_comment">
                	<div class="comment_one"><?php echo $_smarty_tpl->tpl_vars['i']->value['subject'];?>
</div>
                    <div class="comment_two"> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
message-accept-detail/<?php echo $_smarty_tpl->tpl_vars['i']->value['message_id'];?>
">View</a></div>
                </div>
                <?php }} ?>
                
                <?php if ($_smarty_tpl->getVariable('pend_message')->value==''&&$_smarty_tpl->getVariable('pend_webcam')->value==''){?>
                    <div class="session_req_lef_comment">
                        <div class="comment_one"><strong>No Pending Requests to Display !</strong></div>
                        <div class="comment_two">&nbsp;</div>
                    </div>
                <?php }?>
            </div>
            
           </div>
           
           
           
           <div class="session_completd_otr" style="width:99%;">
        	<!--<div class="session_heading">requests</div>-->
            <div class="session_req_left">
            	<div class="session_req_lef_head">
                	<div class="request_one">Paid Requests</div>
                    <!--<div class="request_two">Status</div>-->
                    
                </div>
               <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('paid_webcam')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
                <div class="session_req_lef_comment">
                	<div class="comment_one"><?php echo $_smarty_tpl->tpl_vars['i']->value['subject'];?>
W</div>
                    <div class="comment_two">View</div>
                </div>
                <?php }} ?>
                 <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('paid_message')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
                <div class="session_req_lef_comment">
                	<div class="comment_one"><?php echo $_smarty_tpl->tpl_vars['i']->value['subject'];?>
M</div>
                    <div class="comment_two">View</div>
                </div>
                <?php }} ?>
                
                <?php if ($_smarty_tpl->getVariable('paid_webcam')->value==''&&$_smarty_tpl->getVariable('paid_message')->value==''){?>
                    <div class="session_req_lef_comment">
                        <div class="comment_one"><strong>No Paid Requests to Display !</strong></div>
                        <div class="comment_two">&nbsp;</div>
                    </div>
                <?php }?>
            </div>
            <!--<div class="session_req_right">
            <div class="session_req_lef_head">Advisor</div>
            <div class="session_req_lef_comment">Advisor 1</div>
            </div>-->
           </div>
           
           
        </div>
        
        
        
        
        
        
        
        
        <div class="session_completd_otr">
        	<div class="session_heading">Total Earnings</div>
            <div class="session_req_left">
            	<div class="session_req_lef_head">
                	<div class="request_one"><strong>$ 999Dummy</strong></div>
                </div>
            </div>
        </div>
        
        
        
        
        
        
        
        
        
        
        <div class="product_purchased_otr">
        	<div class="session_heading">Total Pending Earnings</div>
            <div class="session_req_left">
            	<div class="session_req_lef_head">
                	<div class="request_one">Earning service type</div>
                   <!-- <div class="request_one">Advisor</div>-->
                    <div class="request_two" style="float:right;">Amount</div>
                </div>
                <div class="session_req_lef_comment">
                	<div class="comment_one">Webcam Sessions</div>
                   <!-- <div class="comment_three">Advisor 1</div>-->
                    <div class="comment_two" style="float:right;">$ 120Dummy</div>
                </div>
               <div class="session_req_lef_comment">
                	<div class="comment_one">E-mail Counsaltancy</div>
                   <!-- <div class="comment_three">Advisor 1</div>-->
                    <div class="comment_two" style="float:right;">$ 120Dummy</div>
                </div>
                <div class="session_req_lef_comment">
                	<div class="comment_one">Product Sales</div>
                    <!--<div class="comment_three">Advisor 1</div>-->
                    <div class="comment_two" style="float:right;">$ 120Dummy</div>
                </div>
                <!--<div class="session_req_lef_comment">
                	<div class="comment_one"><a href="#">Product 1</a></div>
                    <div class="comment_three">Advisor 1</div>
                    <div class="comment_two">$ 120</div>
                </div>
                <div class="session_req_lef_comment">
                	<div class="comment_one"><a href="#">Product 1</a></div>
                    <div class="comment_three">Advisor 1</div>
                    <div class="comment_two">$ 120</div>
                </div>-->
            </div>
        </div>
        
        
       
        
        
        <div class="unread_messages_otr">
        	<div class="session_heading">Unread messages</div>
            <div class="session_req_left">
            	<div class="session_req_lef_head">
                	<div class="request_one"><a href="#">View</a></div>
                    <div class="request_two">Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo.</div>
                </div>
                
                <div class="session_req_lef_head">
                	<div class="request_one"><a href="#">View</a></div>
                    <div class="request_two">Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo.</div>
                </div>
                
            </div>
        </div>
        
        <div class="recommended_products_otr">
        	<div class="session_heading">My Rates</div>
            <div class="session_req_left">
            	<!--<div class="session_req_lef_head">
                	<div class="request_one">Product</div>
                    <div class="request_two">Amount</div>
                </div>-->
                <div class="session_req_lef_comment">
                	<div class="comment_one">Webcam Sessions(per hour)</div>
                    <div class="comment_two">$ 120Dummy</div>
                </div>
                <div class="session_req_lef_comment">
                	<div class="comment_one">E-mail Consultancy</div>
                    <div class="comment_two">$ 120Dummy</div>
                </div>
                
            </div>
        </div>
        
        
        <div class="recommended_products_otr">
        	<div class="session_heading">My Ratings</div>
            <div class="session_req_left">
                <div class="session_req_lef_comment">
                	<div class="comment_one">Based on Webcam Session/E-mail Consultancy</div>
                    <div class="comment_two"><div class="profile_rt_rating">
                  <div id="17" style="cursor: default;" title="good"><img class="17" title="good" alt="1" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on.png" id="17-1">&nbsp;<img class="17" title="good" alt="2" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on.png" id="17-2">&nbsp;<img class="17" title="good" alt="3" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on.png" id="17-3">&nbsp;<img class="17" title="good" alt="4" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on.png" id="17-4">&nbsp;<img class="17" title="good" alt="5" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-off.png" id="17-5"> </div>
                </div></div>
                </div>
                <div class="session_req_lef_comment">
                	<div class="comment_one">Based on Products</div>
                    <div class="comment_two"><div class="profile_rt_rating">
                  <div id="17" style="cursor: default;" title="good"><img class="17" title="good" alt="1" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on.png" id="17-1">&nbsp;<img class="17" title="good" alt="2" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on.png" id="17-2">&nbsp;<img class="17" title="good" alt="3" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on.png" id="17-3">&nbsp;<img class="17" title="good" alt="4" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on.png" id="17-4">&nbsp;<img class="17" title="good" alt="5" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-off.png" id="17-5"> </div>
                </div></div>
                </div>
                
            </div>
        </div>
        
        
        </div>
        
      </div>
    </div>
  </div>
</div>
<!--/End::Body/-->
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>