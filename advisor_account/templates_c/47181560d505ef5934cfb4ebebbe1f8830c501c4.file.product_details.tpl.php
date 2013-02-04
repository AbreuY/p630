<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 14:42:04
         compiled from "../templates/advisor_account/product_details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8181510299bc333616-74798648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47181560d505ef5934cfb4ebebbe1f8830c501c4' => 
    array (
      0 => '../templates/advisor_account/product_details.tpl',
      1 => 1358935124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8181510299bc333616-74798648',
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
    <div class="product_details_page_caroline">
      <div class="video_completd_otr">
        <div class="video_text"><?php echo $_smarty_tpl->getVariable('ProArr')->value['name'];?>
</div>
        <div class="video_img"><img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
/front_media/images/video_img.png" width="340" height="164"></div>
        <div class="description_otr">
          <div class="left_inn_text">Product Description&nbsp;:</div>
          <div class="right_inn_text"><?php echo $_smarty_tpl->getVariable('ProArr')->value['description'];?>
</div>
        </div>
        <!--*-->
        
        <div class="description_otr">
          <div class="left_inn_text">Rating&nbsp;:</div>
          <div class="right_inn_text"><img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
/front_media/images/rating_img.png" width="101" height="20"></div>
        </div>
        
        <!--*-->
        <div class="description_otr">
          <div class="left_inn_text">Price&nbsp;:</div>
          <div class="right_inn_text"><?php if ($_smarty_tpl->getVariable('ProArr')->value['type']=="free"){?>This is a Free product.<?php }else{ ?>$<?php echo $_smarty_tpl->getVariable('ProArr')->value['price'];?>
<?php }?></div>
        </div>
        <!--*-->
        <div class="fld_otr" style="width:100%; text-align:center; margin:10px 0;">
          <input type="submit" name="" id="" value="Buy now">
        </div>
      </div>
    </div>
  </div>
</div>


<!--/End::Body/-->
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>