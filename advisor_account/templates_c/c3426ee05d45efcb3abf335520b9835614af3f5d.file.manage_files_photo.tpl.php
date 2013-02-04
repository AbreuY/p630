<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 06:29:41
         compiled from "../templates/advisor_account/manage_files_photo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2351951022655ac9a31-80468056%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3426ee05d45efcb3abf335520b9835614af3f5d' => 
    array (
      0 => '../templates/advisor_account/manage_files_photo.tpl',
      1 => 1359032028,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2351951022655ac9a31-80468056',
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
<div id="mssg"></div>
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
manage-files-photo" class="edit_act_nav1"> Photo </a></li>
                <li> <a  href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
manage-files-video"> Video</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
manage-files-audio"> Audio</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
manage-files-micro"> Microsoft</a></li>
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
                                <th>Image Name</th>
                                <th>Thumbnail</th>
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
?><li>  <?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</li><?php }} ?></ul></td>
                                    <!--<td><input type="text" id="file_name_<?php echo $_smarty_tpl->tpl_vars['i']->value['file_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
" /> <button class="change_name" data-fd="<?php echo $_smarty_tpl->tpl_vars['i']->value['file_id'];?>
">Change Name</button></td>-->
                                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
</td>
                                    <td><img src="<?php echo $_smarty_tpl->getVariable('sitepath')->value;?>
front_media/product_files/180X180px/<?php echo $_smarty_tpl->tpl_vars['i']->value['location'];?>
"></td>
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
<script src="front_media/js/gurubul.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(e) {
    $('.change_name').click(function(e) {
        var id = $(this).attr("data-fd");
		var name = $('#file_name_'+id).val();
		console.log(id+"   "+name);
		$.ajax({
			url: "ajax/change_file_name.php",
			type: "post",
			data: {id: id, name: name},
			success: function(data){
           $("#mssg").html(data);
     		 }
			
		});
    });
});


</script>

<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>