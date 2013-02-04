<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 06:19:22
         compiled from "../templates/advisor_account/webcam_accept_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6782510223ea8922b0-63653847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f3fd789099c954408377750cf80d08be1c54d85' => 
    array (
      0 => '../templates/advisor_account/webcam_accept_detail.tpl',
      1 => 1359094665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6782510223ea8922b0-63653847',
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
        <?php $_smarty_tpl->tpl_vars['abt_active3'] = new Smarty_variable("abt_active", null, null);?>
        <?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('advisorLeftMenu')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        <div class="session_deails1">
          <div class="pending_req">
            <div class="pending_req_head"> Consultation with <?php echo $_smarty_tpl->getVariable('user')->value['username'];?>
 </div>
            <ul>
              <!--<li> <span>Scheduled for</span> : Not yet scheduled </li>
              <li> <span>Scheduled for</span> : Not yet scheduled </li>-->
              <li> <span>Subject </span> :  <?php echo $_smarty_tpl->getVariable('webcam')->value['subject'];?>
 </li>
              <li> <span>Duration</span> : <?php echo $_smarty_tpl->getVariable('webcam')->value['duration'];?>
 hour(s) </li>
              <li> <span>Description</span> :-<div> <?php echo $_smarty_tpl->getVariable('webcam')->value['description'];?>
 </div></li>
              <!--<li><span> Metting time </span>: Not yet scheduled </li>-->
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
dwnldwebcamconsulteattchfile/<?php echo base64_encode($_smarty_tpl->tpl_vars['i']->value['webcam_file_id']);?>
">Download</a>
                         <br />
                        <?php }} ?>
                    </div>
                    
	          </li>
            <?php }?>	  
            </ul>
            <!--<div class="fld_otr">
            	<input type="submit" name="" value="Cancel decline metting">
            	<input type="submit" name="" value="Rescheduled">
            </div>-->
          </div>
          <div class="pending_req">
            <div class="edit_menu_start2">
          <ul>
              <li> <a class="edit_act_nav1" href="#"> Accept </a></li>
              <li> <a href="#"> Payment</a></li>
              <li> <a href="#"> Answer</a></li>
              <li> <a href="#"> Feedback</a></li>
              <li> <a href="#"> Finished</a></li>
             </ul>
             </div>
             
          <div class="session_heading"> You will receive $<?php echo $_smarty_tpl->getVariable('adv')->value['will_get'];?>
 for this consultation </div>
            <div class="pending_req_head"> Agree on time below or &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
webcam-reject/<?php echo $_smarty_tpl->getVariable('webcam')->value['webcam_id'];?>
"><input type="submit" value="Decline" name=""></a></div>
            <ul class="agree_time">
              <li> <?php echo $_smarty_tpl->getVariable('webcam')->value['date_1'];?>
(GMT <?php if ($_smarty_tpl->getVariable('webcam')->value['user_offset']>-1){?> +<?php }?><?php echo $_smarty_tpl->getVariable('webcam')->value['user_offset'];?>
 hrs)<a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor_account/webcam_accept_action.php?wid=<?php echo $_smarty_tpl->getVariable('webcam')->value['webcam_id'];?>
&dat=1"><input type="submit" name="" value="Accept"></a></li>
              <li> <?php echo $_smarty_tpl->getVariable('webcam')->value['date_2'];?>
(GMT <?php if ($_smarty_tpl->getVariable('webcam')->value['user_offset']>-1){?> +<?php }?><?php echo $_smarty_tpl->getVariable('webcam')->value['user_offset'];?>
 hrs)<a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor_account/webcam_accept_action.php?wid=<?php echo $_smarty_tpl->getVariable('webcam')->value['webcam_id'];?>
&dat=2"><input type="submit" name="" value="Accept"></a></li>
              <li> <?php echo $_smarty_tpl->getVariable('webcam')->value['date_3'];?>
(GMT <?php if ($_smarty_tpl->getVariable('webcam')->value['user_offset']>-1){?> +<?php }?><?php echo $_smarty_tpl->getVariable('webcam')->value['user_offset'];?>
 hrs)<a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor_account/webcam_accept_action.php?wid=<?php echo $_smarty_tpl->getVariable('webcam')->value['webcam_id'];?>
&dat=3"><input type="submit" name="" value="Accept"></a></li>
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