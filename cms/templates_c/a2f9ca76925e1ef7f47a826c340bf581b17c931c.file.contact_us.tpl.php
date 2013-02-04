<?php /* Smarty version Smarty-3.0.8, created on 2012-12-22 11:42:48
         compiled from "../templates/cms/contact_us.tpl" */ ?>
<?php /*%%SmartyHeaderCode:951050d59cb86e21d1-99364189%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2f9ca76925e1ef7f47a826c340bf581b17c931c' => 
    array (
      0 => '../templates/cms/contact_us.tpl',
      1 => 1356175396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '951050d59cb86e21d1-99364189',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"Contact us"); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header2')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<!--/Start::Body/-->
<div id="WrapperOtr">
  <div id="Pageholder">
    <div class="about_page_otr">
      
      <h1>About Guru Bul</h1>
      <div class="line_divider"></div>
      
      <div class="abt_main_otr">
      	<div class="about_left_category">
        	<ul>
            	<li > <a href="javascript:void(0);" id="au" >Overview</a></li>
                <li > <a href="javascript:void(0);" id="cu"  class="abt_active">Contact us</a></li>
                <li > <a href="javascript:void(0);" id="pr">Press/Socail Media</a></li>
                <li > <a href="javascript:void(0);" id="jb">Jobs</a></li>
                <li > <a href="javascript:void(0);" id="fq">FAQ</a></li>
                <li > <a href="javascript:void(0);" id="tos">Terms of Service</a></li>
                <li > <a href="javascript:void(0);" id="prv">Privacy</a></li>
            </ul>
        </div>
        
        <div class="about_right_part" id="content">
        	<?php echo $_smarty_tpl->getVariable('content')->value;?>

        </div>		
		
      </div>
    </div>
  </div>
</div>

<div id="script">
<script src="front_media/js/cms/aboutus.js" type="text/javascript"></script>
</div>
<!--/End::Body/-->
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>