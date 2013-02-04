<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 10:44:47
         compiled from "../templates/user_account/user_left_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142115102621f4e22a5-91615610%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59ac64bccba4403d5f0de90d29bd9d134102dc71' => 
    array (
      0 => '../templates/user_account/user_left_menu.tpl',
      1 => 1359110684,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142115102621f4e22a5-91615610',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="dash_user_left">
          <ul>
            <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
user-dashboard" class="<?php echo $_smarty_tpl->getVariable('abt_active1')->value;?>
">Dashboard</a></li>
            <li> <a href="#" class="<?php echo $_smarty_tpl->getVariable('abt_active2')->value;?>
">Add guru credit</a></li>
            <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
user-edit-profile" class="<?php echo $_smarty_tpl->getVariable('abt_active3')->value;?>
">Edit profile</a></li>
            <li> <a href="#" class="<?php echo $_smarty_tpl->getVariable('abt_active4')->value;?>
">My purchases</a></li>
            <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
usersession-pending" class="<?php echo $_smarty_tpl->getVariable('abt_active5')->value;?>
">Session / messages</a></li>
            <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
user-communication" class="<?php echo $_smarty_tpl->getVariable('abt_active6')->value;?>
">
            	 Communication <?php if ($_smarty_tpl->getVariable('new_usr')->value!='0'){?><div class="circle bgcolor" style="float:right;"><span><?php echo $_smarty_tpl->getVariable('new_usr')->value;?>
</span></div><?php }?></a></li>
            <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
log_in/logout.php" class="<?php echo $_smarty_tpl->getVariable('abt_active7')->value;?>
">Logout</a></li>
          </ul>
        </div>