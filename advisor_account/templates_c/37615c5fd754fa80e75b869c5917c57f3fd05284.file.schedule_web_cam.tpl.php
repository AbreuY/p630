<?php /* Smarty version Smarty-3.0.8, created on 2013-01-25 06:07:40
         compiled from "../templates/advisor_account/schedule_web_cam.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154495102212c6808b8-10642956%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37615c5fd754fa80e75b869c5917c57f3fd05284' => 
    array (
      0 => '../templates/advisor_account/schedule_web_cam.tpl',
      1 => 1358935124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154495102212c6808b8-10642956',
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
" class="edit_act_nav1"> Schedule a web-cam session</a></li>
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
          <form action="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
advisor_account/schedule_web_cam_action.php" method="post" name="form_webcam" id="form_webcam" enctype="multipart/form-data">
            <div class="webcam_session_tab">
            	<div class="personal_info_box">
                <div class="meeting_details">
                <h2> Meeting Details </h2>
                <div class="fld_otr">
                  <label> Cost <!--(Public)--> </label>
                 $<?php echo $_smarty_tpl->getVariable('DetArr')->value['priceWebConsulte'];?>
/hr <!--(Public)--> 
                </div>
                <div class="fld_otr">
                <input type="hidden" id="advisor_id" name="advisor_id" value="<?php echo $_smarty_tpl->getVariable('DetArr')->value['advisor_id'];?>
" />
                  <label for="login"> Duration</label>
                     <select class="time_zone_box" name="duration">
                        <option value="1"> 1 hour </option>
                        <option value="2"> 2 hours </option>
                        <option value="3"> 3 hours </option>
                      </select>
                </div>
                <!--<div class="fld_otr">
                  <label for="login"> Type of Advice</label>
                 <select class="time_zone_box">
                        <option> Select type of advice </option>
                        <option> 1 hour </option>
                        <option> 1 hour </option>
                      </select>
                </div>-->
                <div class="fld_otr">
                  <label> Subject <!--(Public)--> </label>
                  <input type="text" name="subject" id="subject">
                </div>
                
                                  
                  <div class="fld_otr">
                    <label > Short Description </label>
                   <div class="text_custom_editor"> <textarea name="description"></textarea></div>
                  </div>
           
                <div class="fld_otr">
                    <label> Attachments </label>
                  <input type="file" name="upload_file[]" multiple="multiple">
                  </div>
                
                 </div>
                
                
                <div class="Scheduling">
                <h2> Meeting Details </h2>
                <div class="fld_otr">
                  <label for="login"> Your Time Zone </label>
                     <select class="time_zone_box" name="time_zone" id="time_zone">
                    <option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---Select your Time zone---</option>
                    <?php  $_smarty_tpl->tpl_vars['tZ'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('TimeZone')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tZ']->key => $_smarty_tpl->tpl_vars['tZ']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['tZ']->value['id'];?>
" data-offset="<?php echo $_smarty_tpl->tpl_vars['tZ']->value['offset'];?>
" <?php if ($_smarty_tpl->getVariable('DetArr')->value['timezone']==$_smarty_tpl->tpl_vars['tZ']->value['id']){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['tZ']->value['gmt'];?>
 <?php echo $_smarty_tpl->tpl_vars['tZ']->value['timezone_location'];?>
</option>
            		<?php }} ?>
                  </select>
                  <input type="hidden" name="ao_tZ" id="ao_tZ" value="" />
                </div>
                
                <div class="fld_otr">
                	   <span><strong><?php echo $_smarty_tpl->getVariable('DetArr')->value['first_name'];?>
's comments </strong>: <?php echo $_smarty_tpl->getVariable('DetArr')->value['availability_comment'];?>
 </span> 
                       <span><strong> <?php echo $_smarty_tpl->getVariable('DetArr')->value['first_name'];?>
's preferred hours (in your time zone)</strong></span>
                </div>
                
                	<div class="shedule_tabl_main">
  <table cellspacing="0" cellpadding="0" border="0" style="text-align: center;" class="shedule_tabl_hours">
    <tbody id="time_ZONE">
      <tr>
        <th></th>
        <th colspan="12">AM</th>
        <th><img src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/images/clock.png" alt="12 PM"></th>
        <th colspan="11">PM</th>
      </tr>
      <tr class="shadlue_bg">
        <th></th>
        <th class="verticaltext">12<br>
          <span class="daytime">AM</span></th>
        <th class="verticaltext">1</th>
        <th class="verticaltext">2</th>
        <th class="verticaltext">3</th>
        <th class="verticaltext">4</th>
        <th class="verticaltext">5</th>
        <th class="verticaltext">6</th>
        <th class="verticaltext">7</th>
        <th class="verticaltext">8</th>
        <th class="verticaltext">9</th>
        <th class="verticaltext">10</th>
        <th class="verticaltext">11</th>
        <th class="verticaltext">12<br>
          <span class="daytime">PM</span></th>
        <th class="verticaltext">1</th>
        <th class="verticaltext">2</th>
        <th class="verticaltext">3</th>
        <th class="verticaltext">4</th>
        <th class="verticaltext">5</th>
        <th class="verticaltext">6</th>
        <th class="verticaltext">7</th>
        <th class="verticaltext">8</th>
        <th class="verticaltext">9</th>
        <th class="verticaltext">10</th>
        <th class="verticaltext">11</th>
      </tr>
      
     
      <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 7+1 - (1) : 1-(7)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
      <?php if ($_smarty_tpl->tpl_vars['i']->value==1){?>
      <?php $_smarty_tpl->tpl_vars["day"] = new Smarty_variable("monday", null, null);?>
      <?php }elseif($_smarty_tpl->tpl_vars['i']->value==2){?>
      <?php $_smarty_tpl->tpl_vars["day"] = new Smarty_variable("tuesday", null, null);?>
      <?php }elseif($_smarty_tpl->tpl_vars['i']->value==3){?>
      <?php $_smarty_tpl->tpl_vars["day"] = new Smarty_variable("wednesday", null, null);?>
      <?php }elseif($_smarty_tpl->tpl_vars['i']->value==4){?>
      <?php $_smarty_tpl->tpl_vars["day"] = new Smarty_variable("thursday", null, null);?>
      <?php }elseif($_smarty_tpl->tpl_vars['i']->value==5){?>
      <?php $_smarty_tpl->tpl_vars["day"] = new Smarty_variable("friday", null, null);?>
      <?php }elseif($_smarty_tpl->tpl_vars['i']->value==6){?>
      <?php $_smarty_tpl->tpl_vars["day"] = new Smarty_variable("saturday", null, null);?>
      <?php }elseif($_smarty_tpl->tpl_vars['i']->value==7){?>
      <?php $_smarty_tpl->tpl_vars["day"] = new Smarty_variable("sunday", null, null);?>
      <?php }?>
      <tr id="day_01">
        <th align="left" style="padding-right: 10px;" class="week_name"><?php echo ((mb_detect_encoding($_smarty_tpl->getVariable('day')->value, 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->getVariable('day')->value,SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable('day')->value));?>
</th>
        <?php  $_smarty_tpl->tpl_vars['aval'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('AvailArr')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['aval']->key => $_smarty_tpl->tpl_vars['aval']->value){
?>
        <td><div <?php if ($_smarty_tpl->tpl_vars['aval']->value[$_smarty_tpl->getVariable('day')->value]=="No"){?> class="left_para" <?php }else{ ?> class="left_para tile_bg" <?php }?>>&nbsp;</div>
          <div <?php if ($_smarty_tpl->tpl_vars['aval']->value[$_smarty_tpl->getVariable('day')->value]=="No"){?> class="right_para" <?php }else{ ?> class="right_para tile_bg" <?php }?>>&nbsp;</div></td>
         <?php }} ?> 
      </tr>
      <?php }} ?>
    </tbody>
  </table>
</div>


	<div class="fld_otr wid_all">
    	<span> Please propose three meeting times (in your time zone) </span>
         <div class="add_meeting">
        <div class="date_time1">
        	<span> Date & Time #1</span>
            <input type="text" class="datepicker" name="date_1" id="date_1">
           
	</div>
    
    <div class="date_time1">
        	<span> Date & Time #2</span>
            <input type="text" class="datepicker" name="date_2" id="date_2">
            
	</div>
    
    <div class="date_time1">
        	<span> Date & Time #3</span>
            <input type="text" class="datepicker" name="date_3" id="date_3">
            
	</div>
    
    </div>
    
   <!-- <div class="add_meet_in"> <a href="#">+ Add Another Meeting</a> </div>-->
    </div>

                <!--<div class="fld_otr"> 
                	<label> Discount Code </label>
                     <input type="text"  name="text">
                     <a class="count_validate" href="#"> Validate </a>
                </div>-->
                
                 </div>
                 
                 
                 
                <div style="width:100%" class="fld_otr">
                  <div class="personal_btn">
                    <input type="submit" value="Send Request" id="send_req" name="send_req">
                  </div>
                </div>
              </div>
              
              
            </div>
          </form>
          </div>
        </div>
        <!-- search_page_dash_otr -----------end ------> 
        
      </div>
    </div>
  </div>
</div>

<!--/End::Body/-->

<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/timepick/jquery-ui-timepicker-addon.js"></script>
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/gurubul.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/timepick/timepicker_addon.css" />
<style type="text/css">
.ui-widget {
    font-size: 0.7em !important;
}
</style>
<script src="<?php echo $_smarty_tpl->getVariable('site_path')->value;?>
front_media/js/jquery.validate.js" type="text/javascript"></script>

<script>
$(document).ready(function(e) {
	$('#ao_tZ').val($("option:selected", '#time_zone').attr('data-offset'));
    $('#time_zone').change(function(){
		var offset_o = $("option:selected", this).attr('data-offset');
		$.ajax({
				type: "POST",
				url: "../ajax/availibility_timezone.php",
				data: {offset:offset_o, aid:$('#advisor_id').val(), atz:$('#ao_tZ').val()},
				success: function(data){
					$("#time_ZONE").html(data);
				}
			});//end ajax
	});
	
	$("#send_req").click(function(){
		$("#form_webcam").validate({
			rules: {
				subject: {
					required: true
				},
				description: {
					required: true
				},
				time_zone: {
					required: true
				},
				date_1: {
					required: true
				},
				date_2: {
					required: true
				},
				date_3: {
					required: true
				}  
			},
			messages: {
				subject: {
					required: "Please enter a subject."
				},
				description: {
					required: "Please enter a message."
				},
				time_zone: {
					required: "Please select your time zone."
				},
				date_1: {
					required: "Propose three timings."
				},
				date_2: {
					required: "Propose three timings."
				},
				date_3: {
					required: "Propose three timings."
				}  
			}
			
		}); //end validate 
	}); // end login click
});
$(function() {
    $( ".datepicker" ).datetimepicker({minDate: 0});
	
  });
</script>

<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>




<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('footer')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>