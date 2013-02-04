<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 09:55:23
         compiled from "../templates/advisor_account/create_product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:321665102568b236048-54110032%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1aaf3487c8f567321c4f581968fb43d1b77e10ca' => 
    array (
      0 => '../templates/advisor_account/create_product.tpl',
      1 => 1358935124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '321665102568b236048-54110032',
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
      <div class="abt_main_otr"> <?php $_smarty_tpl->tpl_vars['abt_active5'] = new Smarty_variable("abt_active", null, null);?>
        <?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('advisorLeftMenu')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        <div class="user_dash_right_part"><?php echo $_smarty_tpl->getVariable('msg')->value;?>

        
        <div class="session_heading_titl"> <div class="msg_new_head"> Create Product</div></div>
        
        <div class="ad_own_product_page">
        <form action="advisor_account/create_product_action.php" name="createProductForm" id="createProductForm" method="post" enctype="multipart/form-data">
          <div class="preference_box_paypal">
            <!--<div class="notifi_head">Create your own product</div>-->
            <div class="fld_otr">
              <label for="login"> Title :</label>
              <input type="text" name="name" id="name">
            </div>
            <div class="fld_otr">
              <label for="login"> Category:</label>
              <select id = "category" name="category[]" multiple="multiple">
                <!--<option value="">--Select a category--</option>-->
                <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('category')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_name'];?>
</option>
                <?php }} ?> 
              </select>
              <div id="cats"></div>
            </div>
            
            <div class="fld_otr">
              <label for="login"> Description :</label>
              <textarea name="description" id="description" style="height:154px;width:322px;"></textarea>
            </div>
            <div class="fld_otr">
              <label for="login"> Select product combination :</label>
              <div class="chk_name">
                <input type="radio" name="combination" value="video" checked="checked">
                <span>Video | Word/Excel/PDF/Image (optinal)</span> </div>
              <div class="chk_name">
                <input type="radio" name="combination" value="videoppt">
                <span>Video and PPT | Word/Excel/PDF/Image (optinal)</span> </div>
              <div class="chk_name">
                <input type="radio" name="combination" value="audioppt">
                <span>Audio and PPT | Word/Excel/PDF/Image (optinal)</span> </div>
            </div>
            <div class="fld_otr">
              <label for="login"> Product type:</label>
              <select name="type">
                <option value="paid">Available for purchased</option>
                <option value="free">Available for free</option>
              </select>
            </div>
            <div class="fld_otr">
              <label for="login"> Attach files :</label>
              <div class="chk_name">
                <div id="up_file">
                  <input type="file" name="upload_file[]" multiple="multiple">
                  <br>
                  <br>
                </div>
                <div style="border:solid; width:150px;"><a href="javascript:void(0);" id="add_from_existing_file" style="color:#666666;">&nbsp;Add From Existing files</a></div>
              </div>
            </div>
            
            <!----------------------------------------------------------------------------------------------------------------------------->
            
            <div class="manage_file_page" style="width:647px; display:none;">
              <div class="edit_menu_start" style="width:647px;">
                <ul>
                  <li style="width:128px;">
                  <a href="javascript:void(0);" onclick="file_menu(this)" data-menu = "photo" id="m_photo" class="edit_act_nav1"> Photo</a></li>
                  <li style="width:128px;"><a href="javascript:void(0);" onclick="file_menu(this)" data-menu = "video" id="m_video"> Video</a></li>
                  <li style="width:128px;"><a href="javascript:void(0);" onclick="file_menu(this)" data-menu = "audio" id="m_audio"> Audio</a></li>
                  <li style="width:128px;"><a href="javascript:void(0);" onclick="file_menu(this)" data-menu = "micro" id="m_micro"> Microsoft</a></li>
                  <li style="width:128px;"><a href="javascript:void(0);" onclick="file_menu(this)" data-menu = "pdf"  id="m_pdf"> PDF</a></li>
                </ul>
              </div>
              
              <div class="devide_R" style="width:647px;">
                <table id="photo" class="tbl_myorder">
                  <tbody>
                    <tr>
                      <th>Select</th>
                      <th>Image Name</th>
                      <!--<th>Thumbnail</th>-->
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                  <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('files')->value['photo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                  <tr>
                    <td><input type="checkbox" name="check_file[]" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['file_id'];?>
" /></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
</td>
                    <!-- <td><img src="<?php echo $_smarty_tpl->getVariable('sitepath')->value;?>
front_media/product_files/180X180px/<?php echo $_smarty_tpl->tpl_vars['i']->value['location'];?>
"></td>-->
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['size'];?>
MB</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['format'];?>
</td>
                  </tr>
                  <?php }} else { ?>
                  <tr>
                    <td colspan="4">No Records Found.</td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  
                </table>
                <table id="video" class="tbl_myorder" style="display:none;">
                  <tbody>
                    <tr>
                      <th>Select</th>
                      <th>Video Clip Name</th>
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                  <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('files')->value['video']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                  <tr>
                    <td><input type="checkbox" name="check_file[]" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['file_id'];?>
" /></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['size'];?>
MB</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['format'];?>
</td>
                  </tr>
                  <?php }} else { ?>
                  <tr>
                    <td colspan="4">No Records Found.</td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  
                </table>
                <table id="audio" class="tbl_myorder" style="display:none;">
                  <tbody>
                    <tr>
                      <th>Select</th>
                      <th>Audio Clip Name</th>
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                  <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('files')->value['audio']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                  <tr>
                    <td><input type="checkbox" name="check_file[]" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['file_id'];?>
" /></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['size'];?>
MB</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['format'];?>
</td>
                  </tr>
                  <?php }} else { ?>
                  <tr>
                    <td colspan="4">No Records Found.</td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  
                </table>
                <table id="micro" class="tbl_myorder" style="display:none;">
                  <tbody>
                    <tr>
                      <th>Select</th>
                      <th>Document Name</th>
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                  <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('files')->value['micro']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                  <tr>
                    <td><input type="checkbox" name="check_file[]" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['file_id'];?>
" /></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['size'];?>
MB</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['format'];?>
</td>
                  </tr>
                  <?php }} else { ?>
                  <tr>
                    <td colspan="4">No Records Found.</td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  
                </table>
                <table id="pdf" class="tbl_myorder" style="display:none;">
                  <tbody>
                    <tr>
                      <th>Select</th>
                      <th>File Name</th>
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                  <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('files')->value['pdf']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
                  <tr>
                    <td><input type="checkbox" name="check_file[]" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['file_id'];?>
" /></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['size'];?>
MB</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['format'];?>
</td>
                  </tr>
                  <?php }} else { ?>
                  <tr>
                    <td colspan="4">No Records Found.</td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  
                </table>
                <div class="spcer"></div>
              </div>
            </div>
            
            <!----------------------------------------------------------------------------------------------------------------------------->
            
            <div class="fld_otr">
              <div class="login_btn">
                <input type="submit" id="product_sub" value="Preview product" name="text">
              </div>
            </div>
          </div>
          </form>
          </div>
          
          </div>
          
      </div>
    </div>
  </div>
</div>
<!--/End::Body/--> 
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/advisor_account/advisor_edit_product.js"></script>
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/gurubul.js" type="text/javascript"></script>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>