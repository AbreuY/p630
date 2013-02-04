<?php /* Smarty version Smarty-3.0.8, created on 2013-01-23 10:45:07
         compiled from "../templates/advisor_account/book_an_email.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1039650ffbf337a4425-87833273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76440d4337eda4b47b5683f76368ab88f2e82ae3' => 
    array (
      0 => '../templates/advisor_account/book_an_email.tpl',
      1 => 1358935124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1039650ffbf337a4425-87833273',
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
  <div id="Pageholder"> <?php echo $_smarty_tpl->getVariable('msg')->value;?>

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
" class="edit_act_nav1"> Book an email consultation</a></li>
              <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
send-free-msg/<?php echo $_smarty_tpl->getVariable('aid')->value;?>
"> Send free messages</a></li>
              <li> <a href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
view-all-products/<?php echo $_smarty_tpl->getVariable('aid')->value;?>
"> View all products</a></li>
            </ul>
          </div>
          <div class="tab_cont_otr">
            <div class="email_consultation"> 
            <form action="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor_account/book_an_email_action.php" method="post" name="form_email" id="form_email" enctype="multipart/form-data">
            <div class="personal_info_box">
            <div class="fld_otr"><label>Email cost</label> $<?php echo $_smarty_tpl->getVariable('DetArr')->value['priceEmailConsulte'];?>
</div>
            	<!--<div class="fld_otr">
                  <label for="login"> Category</label>
                     <select class="time_zone_box">
                        <option> 1 hour </option>
                        <option> 1 hour </option>
                        <option> 1 hour </option>
                      </select>
              	  </div>
                  <div class="fld_otr">
                  <label for="login"> Topic</label>
                     <select class="time_zone_box">
                        <option> 1 hour </option>
                        <option> 1 hour </option>
                        <option> 1 hour </option>
                      </select>
              	  </div>
                  
                  <div class="fld_otr">
                  <label for="login"> Industry</label>
                     <select class="time_zone_box">
                        <option> 1 hour </option>
                        <option> 1 hour </option>
                        <option> 1 hour </option>
                      </select>
              	  </div>-->
                  
                  <div class="fld_otr">
                  <label> Subject <!--(Public)--> </label>
                  <input type="text" name="subject" id="subject" class="sub_public">
                  <input type="hidden" name="advisor_id" value="<?php echo $_smarty_tpl->getVariable('DetArr')->value['advisor_id'];?>
" />
                </div>
                
                <div class="fld_otr">
                  <label> Describe your question or small project </label>
                  <div class="text_custom_editor"><textarea name="description" style="min-width:400px !important; max-width:400px !important; height:200px;"></textarea></div>
                </div>
                
                <div class="fld_otr">
                    <label> Attachments </label>
                  <input type="file" name="upload_file[]" multiple="multiple">
                  </div>
                  
                  <div class="fld_otr">
                  <label for="login"> Set a deadline</label>
                     <select name="deadline">
                        <option value="1"> 1 Day </option>
                        <option value="2"> 2 Days </option>
                        <option value="3" selected="selected"> 3 Days </option>
                        <option value="4"> 4 Days </option>
                        <option value="5"> 5 Days </option>
                        <option value="6"> 6 Days </option>
                        <option value="7"> 7 Days </option>
                      </select>
              	  </div>
                  
                  <!--<div class="fld_otr"> 
                	<label> Discount Code </label>
                     <input type="text" name="text">
                     <a href="#" class="count_validate"> Validate </a>
                </div>-->
                  
                  <div class="fld_otr" style="width:100%">
                  <div class="personal_btn">
                    <input type="submit" name="send_req" id="send_req" value="Send Request">
                  </div>
                </div>
                  
                
                 </div>
            </form>
                
            </div>
          </div>
        </div>
        <!-- search_page_dash_otr -----------end ------> 
        
      </div>
    </div>
  </div>
</div>

<!--/End::Body/-->
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/gurubul.js" type="text/javascript"></script>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/jquery.validate.js" type="text/javascript"></script>

<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<script type="text/javascript">
$(document).ready(function(e) {
	$("#send_req").click(function(){
		$("#form_email").validate({
			rules: {
				subject: {
					required: true
				},
				description: {
					required: true
				} 
			},
			messages: {
				subject: {
					required: "Please enter a subject."
				},
				description: {
					required: "Please enter a message."
				} 
			}
			
		}); //end validate 
	});
});
</script>

<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>