<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 06:28:01
         compiled from "../templates/advisor_account/view_products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3611510225f1396186-71550396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '349998eaf1699a3a123a53440e76bfa8ff155254' => 
    array (
      0 => '../templates/advisor_account/view_products.tpl',
      1 => 1358935124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3611510225f1396186-71550396',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"My Profile - Personal Information"); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?> 
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/jquery.validate.js" type="text/javascript"></script> 
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/jquery.livequery.js"></script>
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
  <?php echo $_smarty_tpl->getVariable('msg')->value;?>

    <div class="about_page_otr">
      <h1>Advisor Account</h1>
      <div class="line_divider"></div>
      <div class="abt_main_otr">  <?php $_smarty_tpl->tpl_vars['abt_active6'] = new Smarty_variable("abt_active", null, null);?>
        <?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('advisorLeftMenu')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        <div class="advisor_dash_right_part">
        	<div class="session_heading_titl">View Products</div>        
        <div class="my_purchases" style="margin-top:2px;">
            <div class="session_req_left">
            	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ProArr')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
?>
                <div class="session_req_lef_comment">
                	<div class="comment_one"> <?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
 </div>
                    <div class="comment_two">
                    	<a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
edit-product/<?php echo $_smarty_tpl->tpl_vars['val']->value['product_id'];?>
">Edit</a>
                    	<a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
delete-product/<?php echo $_smarty_tpl->tpl_vars['val']->value['product_id'];?>
">Delete</a>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/gurubul.js" type="text/javascript"></script>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>