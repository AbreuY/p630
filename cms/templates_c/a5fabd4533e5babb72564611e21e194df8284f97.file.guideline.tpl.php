<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 14:42:08
         compiled from "../templates/cms/guideline.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29066510299c03b6804-89561361%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5fabd4533e5babb72564611e21e194df8284f97' => 
    array (
      0 => '../templates/cms/guideline.tpl',
      1 => 1358935124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29066510299c03b6804-89561361',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"Guidelines"); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header2')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<!--/Start::Body/-->
<div id="WrapperOtr">
  <div id="Pageholder">
    <div class="about_page_otr">
      
      <h1>Guidelines</h1>
      <div class="line_divider"></div>
      
      <div class="abt_main_otr">
      	<div class="about_left_category">
        	<ul>
            	<li > <a href="javascript:void(0);" id="vd" class="abt_active">Videos</a></li>
                <li > <a href="javascript:void(0);" id="rs">Recommended Software</a></li>
                <li > <a href="javascript:void(0);" id="p3">Page 3</a></li>
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
<script src="front_media/js/cms/guideline.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#abouthead").removeClass("navi_act");
	$("#guidehead").addClass("navi_act");
	$("#loginhead").removeClass("navi_act");
	$("#reghead").removeClass("navi_act");
});
</script>

</div>
<!--/End::Body/-->
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>