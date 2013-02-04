<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 06:27:29
         compiled from "../templates/advisor_account/advisor_left_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42510225d14d9468-10244807%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca4d0054f79e87b9ebe97f8f1cb445b8c79ead71' => 
    array (
      0 => '../templates/advisor_account/advisor_left_menu.tpl',
      1 => 1359095246,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42510225d14d9468-10244807',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="dash_user_left">
        	<ul>
            	<li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor-dashboard" class="<?php echo $_smarty_tpl->getVariable('abt_active1')->value;?>
">Dashboard</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
my-profile/edit-advisor-profile" class="<?php echo $_smarty_tpl->getVariable('abt_active2')->value;?>
">My Profile</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
session-pending" class="<?php echo $_smarty_tpl->getVariable('abt_active3')->value;?>
">Session/Messages</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
manage-files-photo" class="<?php echo $_smarty_tpl->getVariable('abt_active4')->value;?>
">Manages Files</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
create-product" class="<?php echo $_smarty_tpl->getVariable('abt_active5')->value;?>
">Create Product</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
view-products" class="<?php echo $_smarty_tpl->getVariable('abt_active6')->value;?>
">View Products</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor-communication" class="<?php echo $_smarty_tpl->getVariable('abt_active7')->value;?>
">
                Communication <?php if ($_smarty_tpl->getVariable('new_adv')->value!=0){?><div class="circle bgcolor" style="float:right;"><span><?php echo $_smarty_tpl->getVariable('new_adv')->value;?>
</span></div><?php }?></a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
promote-profile" class="<?php echo $_smarty_tpl->getVariable('abt_active8')->value;?>
">Promote Profile</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor-guidelines" class="<?php echo $_smarty_tpl->getVariable('abt_active9')->value;?>
">Guidelines</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
change-pass" class="<?php echo $_smarty_tpl->getVariable('abt_active10')->value;?>
">Change Password</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
view-advisor-profile/<?php echo $_SESSION['advisor_id'];?>
" target="_blank" class="<?php echo $_smarty_tpl->getVariable('abt_active11')->value;?>
">View Profile</a></li>
                <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
log_in/logout.php" class="<?php echo $_smarty_tpl->getVariable('abt_active12')->value;?>
">Logout</a></li>
            </ul>
        </div>