<?php /* Smarty version Smarty-3.0.8, created on 2013-01-16 05:42:07
         compiled from "../templates/advisor_account/preview_product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:401250f63daf329c81-11103475%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'edffab3f3f627386faa4f749d19b6f6dc278da59' => 
    array (
      0 => '../templates/advisor_account/preview_product.tpl',
      1 => 1358314864,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '401250f63daf329c81-11103475',
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
    <div class="about_page_otr">
      <h1>Advisor Account</h1>
      <div class="line_divider"></div>
      <div class="abt_main_otr">  <?php $_smarty_tpl->tpl_vars['abt_active5'] = new Smarty_variable("abt_active", null, null);?>
        <?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('advisorLeftMenu')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        <div class="advisor_dash_right_part">
          <div class="preview_product_page">
          		<div class="session_heading">Product Preview </div>
                    <div class="session_req_left">
                    <div class="session_req_lef_head">
                    	Video Presentation
                    </div>
                     <div class="video_img">
                     <div class="video_img2">
                     	<img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/video_img2.png">
                      </div>
                      <div class="video_img2">
                     	<img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/video_img2.png">
                      </div>
                      
                     </div>
                     
                     <div class="video_img"><img width="340" height="164" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/video_img.png"></div>
                     <form action="../advisor_account/preview_product_action.php"  id="createProductForm" method="post">
                     <div class="fld_otr">
                    <?php if ($_smarty_tpl->getVariable('paid')->value=="paid"){?><label for="login"> Set Price </label>
                    <input type="text" id="price" name="price"><?php }?>
                    <input type="hidden" id="pid" name="pid" value="<?php echo $_smarty_tpl->getVariable('pid')->value;?>
">
                  </div>
                  
                  <div style="width:100%; text-align:center; margin:10px 0;" class="fld_otr">
                    <input type="submit" value="Confirm product"  id="product_sub" name="">
                </div>
                </form>
                    </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/advisor_account/advisor_edit_product.js"></script>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
