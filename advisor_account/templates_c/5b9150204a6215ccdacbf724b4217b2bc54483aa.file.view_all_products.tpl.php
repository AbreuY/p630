<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 14:42:01
         compiled from "../templates/advisor_account/view_all_products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10540510299b9edfa90-94421187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b9150204a6215ccdacbf724b4217b2bc54483aa' => 
    array (
      0 => '../templates/advisor_account/view_all_products.tpl',
      1 => 1358935124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10540510299b9edfa90-94421187',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header1')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',"Advisor Dashboard"); echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('header2')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
<!--/Start::Body/-->

<div id="WrapperOtr">
  <div id="Pageholder">
    <div class="advisor_search_main_page">
      <div class="profile_advisor_srch_page">
        <div class="fb_twit_otr"> <a href="#"><img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/fb-main.png" alt="fb-main" title="Facebook"></a> <a href="#"><img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/twit-main.png" alt="twit-main" title="Twitter"></a> </div>
        <div class="inn_profile_otr">
          <div class="inn_profile_left">
            <div class="inn_user_img"><?php ob_start();?><?php echo $_smarty_tpl->getVariable('DetArr')->value['image_path'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1!=''){?>
                            <img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/advisor_images/180X180px/<?php echo $_smarty_tpl->getVariable('DetArr')->value['image_path'];?>
"/>
                            <?php }else{ ?>
                            <img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/advisor_images/user-blank-image.png"  
                            width="180" height="180"/>
                            <?php }?></div>
            <div class="profile_rt" >
              <div class="profile_rt_titl"><?php echo $_smarty_tpl->getVariable('DetArr')->value['first_name'];?>
&nbsp;<?php echo $_smarty_tpl->getVariable('DetArr')->value['last_name'];?>
</div>
              <div class="profile_rt_position">&nbsp;</div>
              <div class="profile_rt_consult"><strong>Consults in :</strong> <?php echo $_smarty_tpl->getVariable('Lan')->value;?>
.</div>
              <p><?php echo $_smarty_tpl->getVariable('DetArr')->value['my_pitch'];?>
</p>
            </div>
          </div>
          <div class="inn_profile_right">
            <div class="profile_rt_rating"> <span> Rating </span>
              <div title="good" style="cursor: default;" id="17"><img id="17-1" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on1.png" alt="1" title="good" class="17">&nbsp;<img id="17-2" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on1.png" alt="2" title="good" class="17">&nbsp;<img id="17-3" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on1.png" alt="3" title="good" class="17">&nbsp;<img id="17-4" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on1.png" alt="4" title="good" class="17">&nbsp;<img id="17-5" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-off1.png" alt="5" title="good" class="17"> </div>
            </div>
            <div class="btn_pro_otr">
              <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
schedule-web-cam/<?php echo $_smarty_tpl->getVariable('aid')->value;?>
"><input type="submit" name="" value="Schedule a web-cam session"></a>
              <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
book-an-email/<?php echo $_smarty_tpl->getVariable('aid')->value;?>
"><input type="submit" name="" value="Email consultation"></a>
            </div>
          </div>
        </div>
        
        <!-- search_page_dash_otr -----------start ------>
        <div class="search_page_dash_otr">
          <div class="edit_menu_start">
            <ul>
              <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
view-advisor-profile/<?php echo $_smarty_tpl->getVariable('aid')->value;?>
"> Expert information </a> </li>
              <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
schedule-web-cam/<?php echo $_smarty_tpl->getVariable('aid')->value;?>
"> Schedule a web-cam session</a></li>
              <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
book-an-email/<?php echo $_smarty_tpl->getVariable('aid')->value;?>
"> Book an email consultation</a></li>
              <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
send-free-msg/<?php echo $_smarty_tpl->getVariable('aid')->value;?>
"> Send free messages</a></li>
              <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
view-all-products/<?php echo $_smarty_tpl->getVariable('aid')->value;?>
" class="edit_act_nav1"> View all products</a></li>
            </ul>
          </div>
          <div class="tab_cont_otr">
            <div class="view_pro_all_tab">
              <div class="personal_info_box">
            	
				<h2> Products
                 <!--<div class="sort_by_rating">
                 Sort by :
                 	<select>
                    	<option> Rating</option>
                    </select>
                 </div>-->
                
                </h2> 
                
                
                <?php  $_smarty_tpl->tpl_vars['pro'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ProArr')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pro']->key => $_smarty_tpl->tpl_vars['pro']->value){
?>
                <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
product-details/<?php echo $_smarty_tpl->tpl_vars['pro']->value['product_id'];?>
"><div class="product_one_video">
                	<div class="pro_head"> <?php echo $_smarty_tpl->tpl_vars['pro']->value['name'];?>
 </div>
                    <?php if ($_smarty_tpl->tpl_vars['pro']->value['combination']=='video'){?><img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/video-icon.png"  /><?php }?>
                    			<?php if ($_smarty_tpl->tpl_vars['pro']->value['combination']=='videoppt'){?><img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/ppt.png"  /><?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['pro']->value['combination']=='audioppt'){?><img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/audio.png"  /><?php }?>
                </div></a>
                <?php }} ?>
                
                <!--<div class="product_one_video">
                	<div class="pro_head"> Video </div>
                    <a href="#"><img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/video-icon.png"  /></a>
                </div>
                <div class="product_one_video_ppt">
                	<div class="pro_head"> Video and ppt </div>
                    <a href="#"><img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/ppt.png"  /></a>
                </div>
                <div class="product_one_audio">
                	<div class="pro_head"> Audio and ppt </div>
                   <a href="#"> <img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/audio.png"  /></a>
                </div> -->
                              
               
                </div>
                
            </div>
          </div>
        </div>
        <!-- search_page_dash_otr -----------end ------> 
        
      </div>
    </div>
  </div>
</div>

<!--/End::Body/-->
<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>