<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 09:09:30
         compiled from "../templates/advisor_account/view_advisor_profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:692751024bca985e29-26392046%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84908035a06528cf832b4c6af99629d423e5bf8b' => 
    array (
      0 => '../templates/advisor_account/view_advisor_profile.tpl',
      1 => 1359104968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '692751024bca985e29-26392046',
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
" class="edit_act_nav1"> Expert information </a> </li>
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
"> View all products</a></li>
            </ul>
          </div>
          <div class="tab_cont_otr">
            <div class="expert_info_tab">
             <div class="experience_inn_all">
             <div class="experience_inn_all_otr">
            <div class="experience_inn_tab_otr">
              <div class="experience_inn_tab">
                <h3>My Experience</h3>
                <?php  $_smarty_tpl->tpl_vars['valWExp'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('WExpArr')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['valWExp']->key => $_smarty_tpl->tpl_vars['valWExp']->value){
?>
                <div class="my_exp_otr">
                  <div class="my_exp_lt_rt">
                    <div class="my_exp_left"> <?php echo $_smarty_tpl->tpl_vars['valWExp']->value['time_period_from'];?>
 - <?php echo $_smarty_tpl->tpl_vars['valWExp']->value['time_period_to'];?>
</div>
                    <div class="my_exp_right">
                      <h4> <?php echo $_smarty_tpl->tpl_vars['valWExp']->value['employer'];?>
 </h4>
                      <h5> <?php echo $_smarty_tpl->tpl_vars['valWExp']->value['title'];?>
 </h5>
                      <h6> <?php echo $_smarty_tpl->tpl_vars['valWExp']->value['office_city'];?>
<?php if ($_smarty_tpl->tpl_vars['valWExp']->value['office_city']!=''){?>, <?php }?><?php echo $_smarty_tpl->tpl_vars['valWExp']->value['country_name'];?>
 </h6>
                      <?php echo $_smarty_tpl->tpl_vars['valWExp']->value['description'];?>

                    </div>
                  </div>
                </div>
                <?php }} ?>
                <!--<div class="my_exp_otr">
                  <div class="my_exp_lt_rt">
                    <div class="my_exp_left"> 2010 - 2010</div>
                    <div class="my_exp_right">
                      <h4> McKinsey & Company </h4>
                      <h5> Senior Associate </h5>
                      <h6> Toronto, Canada </h6>
                    </div>
                  </div>
                </div>-->
              </div>
              
                      <!-- experience_inn_tab -----------start  ------>

              <div class="experience_inn_tab">
                <h3>My Education</h3>
                <?php  $_smarty_tpl->tpl_vars['valEdu'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('EduArr')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['valEdu']->key => $_smarty_tpl->tpl_vars['valEdu']->value){
?>
                <div class="my_exp_otr">
                  <div class="my_exp_lt_rt">
                    <div class="my_exp_left"> <?php echo $_smarty_tpl->tpl_vars['valEdu']->value['graduation_year'];?>
 </div>
                    <div class="my_exp_right">
                      <h4> <?php echo $_smarty_tpl->tpl_vars['valEdu']->value['school'];?>
 </h4>
                      <h5> <?php echo $_smarty_tpl->tpl_vars['valEdu']->value['degree'];?>
 </h5>
                      <h6> <?php echo $_smarty_tpl->tpl_vars['valEdu']->value['concentration'];?>
 </h6>
                    </div>
                  </div>
                </div>
                <?php }} ?>
                <!--<div class="my_exp_otr">
                  <div class="my_exp_lt_rt">
                    <div class="my_exp_left"> 2005-present </div>
                    <div class="my_exp_right">
                      <h4> McKinsey & Company </h4>
                      <h5> Senior Associate </h5>
                      <h6> Toronto, Canada </h6>
                    </div>
                  </div>
                </div>-->
              </div>
              
              <!-- experience_inn_tab -----------end  ------>
              
            </div>
              
              <div class="experience_inn_tab_otr2">
              <div class="experience_inn_tab_mid">
                <h3>My Expertise</h3>
                
              <!--  <div class="my_exp_otr">
                  <div class="my_exp_lt_rt">
                    <div class="my_exp_left"> Industry <br>Expertise</div>
                    <div class="my_exp_right">
                      <h4> McKinsey & Company </h4>
                      <h6> 1 year experience </h6>
                      <h4> Health care providers</h4>
                    </div>
                  </div>
                </div>-->
               <?php $_smarty_tpl->tpl_vars["to_prnt"] = new Smarty_variable('', true, null);?>
                <?php  $_smarty_tpl->tpl_vars['valExp'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ExpArr')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['valExp']->key => $_smarty_tpl->tpl_vars['valExp']->value){
?>
                
                <div class="my_exp_otr">
                  <div class="my_exp_lt_rt">
                    <?php if ($_smarty_tpl->getVariable('to_prnt')->value!=$_smarty_tpl->tpl_vars['valExp']->value['area_name']){?><div class="my_exp_left"> <?php echo $_smarty_tpl->tpl_vars['valExp']->value['area_name'];?>
 </div><?php }?>
                    <div class="my_exp_right">
                      <h4> <?php echo $_smarty_tpl->tpl_vars['valExp']->value['cat_name'];?>
 </h4>
                      <h6><?php echo $_smarty_tpl->tpl_vars['valExp']->value['about_experience_info'];?>
</h6>
                       <!--<h6> Easy eaditing interview </h6>-->
                       <?php if ($_smarty_tpl->tpl_vars['valExp']->value['to_show']){?>
                      <h5> Specialities :</h5>
                      	<ul class="special">
                        	<?php if ($_smarty_tpl->tpl_vars['valExp']->value['one']=='on'){?><li><span><?php echo $_smarty_tpl->tpl_vars['valExp']->value['A'];?>
</span><?php echo $_smarty_tpl->tpl_vars['valExp']->value['one_txt'];?>
</li><?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['valExp']->value['two']=='on'){?><li><span><?php echo $_smarty_tpl->tpl_vars['valExp']->value['B'];?>
</span><?php echo $_smarty_tpl->tpl_vars['valExp']->value['two_txt'];?>
</li><?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['valExp']->value['three']=='on'){?><li><span><?php echo $_smarty_tpl->tpl_vars['valExp']->value['C'];?>
</span><?php echo $_smarty_tpl->tpl_vars['valExp']->value['three_txt'];?>
</li><?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['valExp']->value['four']=='on'){?><li><span><?php echo $_smarty_tpl->tpl_vars['valExp']->value['D'];?>
</span><?php echo $_smarty_tpl->tpl_vars['valExp']->value['four_txt'];?>
</li><?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['valExp']->value['five']=='on'){?><li><span><?php echo $_smarty_tpl->tpl_vars['valExp']->value['E'];?>
</span><?php echo $_smarty_tpl->tpl_vars['valExp']->value['five_txt'];?>
</li><?php }?>
                        </ul>
                        
                      <?php }?>
                    </div>
                  </div>
                </div>
                <?php $_smarty_tpl->tpl_vars["to_prnt"] = new Smarty_variable($_smarty_tpl->tpl_vars['valExp']->value['area_name'], true, null);?>
                 <?php }} ?>
                
              </div>
              
                  
            </div>
            
            </div>
            
            <div class="experience_inn_tab_otr3">
            <div class="experience_inn_tab">
            	<h3> Hot Products </h3>
                <div class="cat_profile_rt">
            
            
            
            <?php  $_smarty_tpl->tpl_vars['pro'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ProArr')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pro']->key => $_smarty_tpl->tpl_vars['pro']->value){
?>
           <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
product-details/<?php echo $_smarty_tpl->tpl_vars['pro']->value['product_id'];?>
"><div class="pop_product">
              <div class="pop_img"> <img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/pop-product.png"> </div>
              <div class="pop_text"><span> <?php echo $_smarty_tpl->tpl_vars['pro']->value['name'];?>
 </span> <?php echo $_smarty_tpl->tpl_vars['pro']->value['description'];?>
..</div>
            </div></a>
            <?php }} ?>
            
           
            
           
            
           
            
            
          </div>
          <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
view-all-products/<?php echo $_smarty_tpl->getVariable('aid')->value;?>
"> See All </a>
              </div>   
            </div>
            
            </div>
            
            <div class="review_main">
            	<h2> Reviews </h2>
                <div class="review_inn"> 
                <div class="profile_rt_rating"> 
              <div id="17" class="rate_in"><img class="17" title="good" alt="1" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on1.png" id="17-1">&nbsp;<img class="17" title="good" alt="2" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on1.png" id="17-2">&nbsp;<img class="17" title="good" alt="3" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on1.png" id="17-3">&nbsp;<img class="17" title="good" alt="4" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on1.png" id="17-4">&nbsp;<img class="17" title="good" alt="5" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-off1.png" id="17-5"> </div>
              <span> 4.5 </span>
              <span class="date_display"> Nov 27 2012</span>
            </div>
            
            <div class="review_titl"> Topic: Legal - Immigration </div>
             <div class="review_comment"> "Share practical insight addressing the communication challenges of legal and communication professionals alike "</div>
             
              </div>
              
              <div class="review_inn"> 
                <div class="profile_rt_rating"> 
              <div id="17" class="rate_in"><img class="17" title="good" alt="1" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on1.png" id="17-1">&nbsp;<img class="17" title="good" alt="2" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on1.png" id="17-2">&nbsp;<img class="17" title="good" alt="3" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on1.png" id="17-3">&nbsp;<img class="17" title="good" alt="4" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-on1.png" id="17-4">&nbsp;<img class="17" title="good" alt="5" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/star-off1.png" id="17-5"> </div>
              <span> 4.5 </span>
              <span class="date_display"> Nov 27 2012</span>
            </div>
            
            <div class="review_titl"> Topic: Legal - Immigration </div>
             <div class="review_comment"> "Share practical insight addressing the communication challenges of legal and communication professionals alike "</div>
             
              </div>
              
              
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