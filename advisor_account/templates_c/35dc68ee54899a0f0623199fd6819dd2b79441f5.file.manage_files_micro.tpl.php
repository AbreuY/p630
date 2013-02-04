<?php /* Smarty version Smarty-3.0.8, created on 2013-01-23 09:50:07
         compiled from "../templates/advisor_account/manage_files_micro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2497850ffb24fdc74c3-93427960%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35dc68ee54899a0f0623199fd6819dd2b79441f5' => 
    array (
      0 => '../templates/advisor_account/manage_files_micro.tpl',
      1 => 1358934047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2497850ffb24fdc74c3-93427960',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"My Profile - Personal Information"); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<style type="text/css">
.error{
	color: red;
}
</style>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header2')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<div id="WrapperOtr">
  <div id="Pageholder">
    <div class="about_page_otr">
      <h1>Advisor Account</h1>
      <div class="line_divider"></div>
      <div class="abt_main_otr">
        <?php $_smarty_tpl->tpl_vars['abt_active4'] = new Smarty_variable("abt_active", null, null);?>
        <?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('advisorLeftMenu')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        <div class="advisor_dash_right_part"><?php echo $_smarty_tpl->getVariable('msg')->value;?>

       	<div class="session_heading_titl">Manages Files</div>        
          <div class="manage_file_page">
         	 <form action="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor_account/upload_file_action.php" method="post" enctype="multipart/form-data">
         	<div class="fld_otr_brws">
                  <label for="login"> Add file</label>
                  <input type="file" name="uploadFile" >
                  <input type="submit" name="upload" value="Upload">
                </div>
           </form>
                
          	<div class="edit_menu_start">
              <ul>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
manage-files-photo"> Photo </a></li>
                <li> <a  href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
manage-files-video"> Video</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
manage-files-audio"> Audio</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
manage-files-micro" class="edit_act_nav1"> Microsoft</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
manage-files-pdf"> PDF</a></li>
              </ul>
            </div>
            
            <div class="devide_R">
                    	
                         <table class="tbl_myorder">
                        	<tbody>
                            	<tr>
                              
                                <th>Sr No.</th>
                                <th>Related Product </th>
                                <th>Document Name</th>
                                 <th>Size</th>
                                <th>Format</th>
                                  
                                </tr>
                                
                                
                                 <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('files')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                                 <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</td>
                                    <td><ul class="related_products"><?php  $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['i']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['k']->key => $_smarty_tpl->tpl_vars['k']->value){
?><li><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</li><?php }} ?></ul></td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['size'];?>
MB</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['format'];?>
</td>
                                </tr>
                                <?php }} ?>
                                
                              
                            </tbody>
                        </table>
                        
                        <div class="spcer"></div>
                </div>
                
                
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>