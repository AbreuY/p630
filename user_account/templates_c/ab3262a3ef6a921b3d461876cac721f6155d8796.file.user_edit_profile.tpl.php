<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 06:55:29
         compiled from "../templates/user_account/user_edit_profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2254751022c617c3451-02069560%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab3262a3ef6a921b3d461876cac721f6155d8796' => 
    array (
      0 => '../templates/user_account/user_edit_profile.tpl',
      1 => 1358955760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2254751022c617c3451-02069560',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title','UserDashBoard'); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?> 
<script src="front_media/js/jquery.validate.js" type="text/javascript"></script>
<style type="text/css">
.error{
	color: red;
}

</style>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header2')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?> 
<!--/Start::Body/-->

<div id="WrapperOtr">
  <div id="Pageholder">  <?php echo $_smarty_tpl->getVariable('msg')->value;?>
  
    <div class="about_page_otr">
      <h1>User Account</h1>
      <div class="line_divider"></div>
      <div class="abt_main_otr">
        <?php $_smarty_tpl->tpl_vars['abt_active3'] = new Smarty_variable("abt_active", null, null);?>
        <?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('userLeftMenu')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        <div class="add_gur_edit">
          <div class="preference_box_paypal">
            <div class="notifi_head">Edit Your Profile</div>
             <form action="user_account/user_edit_profile_action.php" method="post" id="update_form" enctype="multipart/form-data">
            <div class="profile_upload_img_box">
            
            <div class="profile_upload_img_box" >
                  <div class="profile_img">
                  	 <?php ob_start();?><?php echo $_smarty_tpl->getVariable('image_path')->value;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1!=''){?>
	                    <img id="profilePhotoImg" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/user_images/180X180px/<?php echo $_smarty_tpl->getVariable('image_path')->value;?>
"/>
                    <?php }else{ ?>
    	                <img id="profilePhotoImg" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/user_images/user-blank-image.png"  
        	            width="180" height="180"/>
                    <?php }?>
                    <a href="javascript:void(0);" id="changePhotoUser">change photo</a>
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $_smarty_tpl->getVariable('user_id')->value;?>
"/>	
                    <input type="hidden" id="profilePhoto" name="profilePhoto" size="12"/> 
                    <input type="hidden" name="old_image_path" id="old_image_path" value="<?php echo $_smarty_tpl->getVariable('image_path')->value;?>
"/>
                  </div>
                </div>
            
            
            
                  <!--<div class="profile_img"> <a href="#"> <?php if ($_smarty_tpl->getVariable('image_path')->value==''){?><img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/user_images/user-blank-image.png" alt="user" title=""><?php }?><?php if ($_smarty_tpl->getVariable('image_path')->value!=''){?><img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/user_images/180X180px/<?php echo $_smarty_tpl->getVariable('image_path')->value;?>
" alt="user" title=""> <?php }?>
                  	<input type="file" name="profilePhoto" size="5" /> </a>
                    <input type="hidden" name="old_image_path" value="<?php echo $_smarty_tpl->getVariable('image_path')->value;?>
" />
                  </div>-->
                </div>
              <div class="fld_otr">
                <label for="login"> Name  :</label>
                <input type="text" name="name" id="name" value="<?php echo $_smarty_tpl->getVariable('username')->value;?>
">
              </div>
              <div class="fld_otr">
                <label for="login"> Email  :</label>
                <input type="text" name="email" id="email" value="<?php echo $_smarty_tpl->getVariable('email')->value;?>
">
                <input type="hidden" name="oemail" id="oemail" value="<?php echo $_smarty_tpl->getVariable('email')->value;?>
">
              </div>
              <div class="fld_otr">
                <label for="login"> Bank code :</label>
                <input type="text" name="bank_code" id="bank_code" value="<?php echo $_smarty_tpl->getVariable('bank')->value;?>
">
              </div>
              <div class="fld_otr">
                <label for="login"> Branch code :</label>
                <input type="text" name="branch_code" id="branch_code" value="<?php echo $_smarty_tpl->getVariable('branch')->value;?>
">
              </div>
              <div class="fld_otr">
                <label for="login"> IBAN number :</label>
                <input type="text" name="iban_no" id="iban_no" value="<?php echo $_smarty_tpl->getVariable('iban')->value;?>
">
              </div>
           
              <div id="change_pass" style="display:none;" >
                <div class="fld_otr">
                  <label for="login"> Old Password :</label>
                  <input type="password" name="old_pass" id="old_pass">
                  <input type="hidden" name="old_pass_c" id="old_pass_c" value="<?php echo $_smarty_tpl->getVariable('pass')->value;?>
">
                </div>
                <div class="fld_otr">
                  <label for="login"> New Password :</label>
                  <input type="password" name="new_pass" id="new_pass">
                </div>
                <div class="fld_otr">
                  <label for="login"> Confirm Password :</label>
                  <input type="password" name="c_pass" id="c_pass">
                </div>
              </div>
              <div class="fld_otr">
                <div class="login_btn">
                  <input type="checkbox" name="change_pass_check" id="change_pass_check">
                  <label>Change password </label>
                </div>
              </div>
              <div class="fld_otr">
                <div class="login_btn">
                  <input type="submit" value="Save changes" name="update" id="update">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="script"> 
  <script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/user_account/user_edit_validate.js" type="text/javascript"></script> 
  <script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/gurubul.js" type="text/javascript"></script> 
  <script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/lightbox/popup.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/lightbox/user_thickbox.js"></script>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/lightbox/css/thickbox.css" type="text/css" media="screen" />
</div>

<!--/End::Body/--> 
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>