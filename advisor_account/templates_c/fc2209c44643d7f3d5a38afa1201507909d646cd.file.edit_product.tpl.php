<?php /* Smarty version Smarty-3.0.8, created on 2013-01-22 09:42:53
         compiled from "../templates/advisor_account/edit_product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77550fe5f1d13ab04-07264606%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc2209c44643d7f3d5a38afa1201507909d646cd' => 
    array (
      0 => '../templates/advisor_account/edit_product.tpl',
      1 => 1358847771,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77550fe5f1d13ab04-07264606',
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
      <div class="abt_main_otr"> <?php $_smarty_tpl->tpl_vars['abt_active6'] = new Smarty_variable("abt_active", null, null);?>
        <?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('advisorLeftMenu')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        <div class="ad_own_product_page">
        <div class="session_heading_titl">View Products</div>
        <form name="createProductForm" id="createProductForm" method="post" action="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor_account/edit_product_action.php?pid=<?php echo $_smarty_tpl->getVariable('ProArr')->value['product_id'];?>
"  enctype="multipart/form-data">
          <div class="preference_box_paypal">
            <div class="notifi_head">Edit product</div>
            <div class="fld_otr">
              <label for="login"> Title :</label>
              <input type="text" name="name" id="name" value="<?php echo $_smarty_tpl->getVariable('ProArr')->value['name'];?>
">
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
"<?php if (in_array($_smarty_tpl->tpl_vars['cat']->value['cat_id'],$_smarty_tpl->getVariable('ProCatArr')->value)){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['cat']->value['cat_name'];?>
</option>
                <?php }} ?> 
              </select>
              <div id="cats">
              <?php if ($_smarty_tpl->getVariable('chk_2')->value){?>
                <label for="login">&nbsp;</label>
              <select id = "cat_2" name="category_2[]" multiple="multiple">
                <!--<option value="">--Select a sub-category--</option>-->
                <?php  $_smarty_tpl->tpl_vars['cat2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('category2')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cat2']->key => $_smarty_tpl->tpl_vars['cat2']->value){
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['cat2']->value['cat_id'];?>
"<?php if (in_array($_smarty_tpl->tpl_vars['cat2']->value['cat_id'],$_smarty_tpl->getVariable('ProCatArr')->value)){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['cat2']->value['cat_name'];?>
</option>
                <?php }} ?> 
              </select>
              <?php }?>
              </div>
              <!--<div id="cats"></div>-->
            </div>
            <div class="fld_otr">
              <label for="login"> Description :</label>
              <textarea name="description" id="description" style="height:154px;width:322px;"><?php echo $_smarty_tpl->getVariable('ProArr')->value['description'];?>
</textarea>
            </div>
            <div class="fld_otr">
              <label for="login"> Select product combination :</label>
              <div class="chk_name">
                <input type="radio" name="combination" value="video" <?php if ($_smarty_tpl->getVariable('ProArr')->value['combination']=="video"){?> checked="checked" <?php }?>>
                <span>Video | Word/Excel/PDF/Image (optinal)</span> </div>
              <div class="chk_name">
                <input type="radio" name="combination" value="videoppt" <?php if ($_smarty_tpl->getVariable('ProArr')->value['combination']=="videoppt"){?> checked="checked" <?php }?>>
                <span>Video and PPT | Word/Excel/PDF/Image (optinal)</span> </div>
              <div class="chk_name">
                <input type="radio" name="combination" value="audioppt" <?php if ($_smarty_tpl->getVariable('ProArr')->value['combination']=="audioppt"){?> checked="checked" <?php }?>>
                <span>Audio and PPT | Word/Excel/PDF/Image (optinal)</span> </div>
            </div>
            <div class="fld_otr">
              <label for="login"> Product type:</label>
              <select name="type" id="type">
                <option value="paid" <?php if ($_smarty_tpl->getVariable('ProArr')->value['type']=="paid"){?> selected="selected" <?php }?>>Available for purchased</option>
                <option value="free" <?php if ($_smarty_tpl->getVariable('ProArr')->value['type']=="free"){?> selected="selected" <?php }?>>Available for free</option>
              </select>
            </div>
            
            <div class="fld_otr" id="price_box" <?php if ($_smarty_tpl->getVariable('ProArr')->value['type']=="free"){?> style="display:none;" <?php }?>>
              <label for="login"> Price :</label>
              <input type="text" name="price" id="price" value="<?php echo $_smarty_tpl->getVariable('ProArr')->value['price'];?>
">
            </div>
            
            
            <!----------------------------------------------------------------------------------------------------------------------------->
            
            <div class="fld_otr">
              <label for="login"> &nbsp;</label>
              <div class="chk_name">
                <div style="border:solid; width:120px;"><a href="javascript:void(0);" id="add_from_existing_file" style="color:#666666;">&nbsp;&nbsp;&nbsp;Show/Hide Files</a></div>
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
" <?php if ($_smarty_tpl->tpl_vars['i']->value['check']){?> checked="checked" <?php }?> /></td>
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
" <?php if ($_smarty_tpl->tpl_vars['i']->value['check']){?> checked="checked" <?php }?> /></td>
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
" <?php if ($_smarty_tpl->tpl_vars['i']->value['check']){?> checked="checked" <?php }?> /></td>
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
" <?php if ($_smarty_tpl->tpl_vars['i']->value['check']){?> checked="checked" <?php }?> /></td>
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
" <?php if ($_smarty_tpl->tpl_vars['i']->value['check']){?> checked="checked" <?php }?> /></td>
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
            
            <!----------------------------------------------------------------------------------------------------------------------------->
            
            
            <div class="fld_otr">
              <div class="login_btn">
                <input type="submit" value="Save changes" id="product_sub" name="text">
              </div>
            </div>
          </div>
          </form>
          </div>
      </div>
    </div>
  </div>
</div>
<!--/End::Body/--> 
 
<script>
$(document).ready(function(e) {
    $("#category").change(function(){
			$.ajax({
				url: "../ajax/product_cat_select.php?id="+$(this).val(),
				success: function(data){
					$("#cats").html(data);
				}
			});//end ajax
	});//end change
	
	$("#type").change(function(){
		if($(this).val() == "free"){
			$("#price_box").fadeOut();
		}
		else{
			$("#price_box").fadeIn();
		}
	});
	
	
});

function file_menu(obj){
	$('#m_photo').removeClass("edit_act_nav1");
	$('#m_audio').removeClass("edit_act_nav1");
	$('#m_video').removeClass("edit_act_nav1");
	$('#m_micro').removeClass("edit_act_nav1");
	$('#m_pdf').removeClass("edit_act_nav1");
	$('#'+$(obj).attr('id')).addClass("edit_act_nav1");
	$("#photo").hide();
	$("#video").hide();
	$("#audio").hide();
	$("#micro").hide();
	$("#pdf").hide();
	$('#'+$(obj).attr('data-menu')).show();
}
</script> 

<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/advisor_account/advisor_edit_product.js"></script>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>