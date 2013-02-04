<?php /* Smarty version Smarty-3.0.8, created on 2013-01-24 07:12:41
         compiled from "../templates/header2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:524550fa41abae5896-88658164%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '983ae3051a2da0755a82ea68448807ed98e20d39' => 
    array (
      0 => '../templates/header2.tpl',
      1 => 1358935125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '524550fa41abae5896-88658164',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
</head>
<!--/End::Header1/-->
<body>
<!--/Start::Header2/-->
<header>
  <div id="hederOtr">
    <div class="logo"> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
home"><img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/logo.png" alt="logo-image" title="guru bul"></a></div>
    <div class="header_rt">
      <div class="top_navi">
        <ul>
          <li><a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
about-us" class="navi_act" id="abouthead">About us </a></li>
          <li><a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
guideline" id="guidehead">guideline </a></li>
		  <?php if ($_SESSION['user_id']!=''||$_SESSION['advisor_id']!=''){?>
         	 <?php if ($_SESSION['user_id']!=''){?>
          <li><a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
user-dashboard" id="loginhead"><?php echo $_smarty_tpl->getVariable('userDetailsArr')->value['username'];?>
's Dashboard</a></li>
              <?php }elseif($_SESSION['advisor_id']!=''){?>
           <li><a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor-dashboard" id="loginhead"><?php echo $_smarty_tpl->getVariable('advisorDetailsArr')->value['first_name'];?>
's Dashboard</a></li>
           	  <?php }?>         
          <li style="background:none; padding-right:0;"><a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
log_in/logout.php" id="loginhead">log Out</a></li>
          <?php }?>	           
          <?php if ($_SESSION['advisor_id']==''&&$_SESSION['user_id']==''&&$_SESSION['advisor_id_IA']==''){?>
          <li><a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
login" id="loginhead">login</a></li>
          <li style="background:none; padding-right:0;"><a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
register" id="reghead">register</a></li>
          <?php }?>
          <?php if ($_SESSION['advisor_id_IA']!=''){?>
          <li><a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
active-account/profile-info/<?php echo $_smarty_tpl->getVariable('advisorDetailsArr')->value['cd'];?>
" id="loginhead">
          <?php echo $_smarty_tpl->getVariable('advisorDetailsArr')->value['first_name'];?>
's Dashboard</a></li>
          <li style="background:none; padding-right:0;"><a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
log_in/logout.php" id="loginhead">log Out</a></li>
          <?php }?>
        </ul>
      </div>
      <div class="srch_otr">
        <div class="srch_in_one">
          <input width="140" type="text" onFocus="if (this.value=='Search...') this.value='';" onBlur="if (this.value=='') this.value='Search...';" value="Search..." size="20" class="searchbox" id="mod-search-searchword" name="searchword">
          <input type="submit" value="" class="go_btn" name="Submit">
        </div>
      </div>
    </div>
  </div>
</header>
<!--/End::Header2/-->