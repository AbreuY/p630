<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 10:09:30
         compiled from "../templates/user_account/webcam_user_payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20018510259da97fa08-02968448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a902f411db3b24b0d82ee7a095c1328a5d59f68d' => 
    array (
      0 => '../templates/user_account/webcam_user_payment.tpl',
      1 => 1359108564,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20018510259da97fa08-02968448',
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
      <div class="abt_main_otr">
        <?php $_smarty_tpl->tpl_vars['abt_active5'] = new Smarty_variable("abt_active", null, null);?>
        <?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('userLeftMenu')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        <div class="session_deails1">
          <div class="pending_req">
            <div class="pending_req_head"> Consultation with Advisor <?php echo $_smarty_tpl->getVariable('adv')->value['first_name'];?>
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
              <li> <a href="#"> Accept </a></li>
              <li> <a href="#" class="edit_act_nav1"> Payment</a></li>
              <li> <a href="#"> Answer</a></li>
              <li> <a href="#"> Feedback</a></li>
              <li> <a href="#"> Finished</a></li>
             </ul>
             </div>
             
          <div class="session_heading">
          The ball is in the your court. The Advisor is waiting to receive payment from the your side.
         </div>
            <div class="session_heading">YOUR PAYMENT DETAILS -</div>
            <div class="pending_req_head">Agreed Time --- <?php echo $_smarty_tpl->getVariable('webcam')->value['date'];?>
(GMT <?php if ($_smarty_tpl->getVariable('webcam')->value['user_offset']>-1){?> +<?php }?><?php echo $_smarty_tpl->getVariable('webcam')->value['user_offset'];?>
 hrs)</div>
            <div class="pending_req_head">Webcam Session Duratiom --- <?php echo $_smarty_tpl->getVariable('webcam')->value['duration'];?>
 hrs</div>
            <div class="pending_req_head">Webcam Session Total Cost --- $<?php echo $_smarty_tpl->getVariable('webcam')->value['cost'];?>
</div>
			<br /><br /><br />
            <ul class="agree_time">
              <li><input type="submit" value="Pay" name=""></li>
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