{include file=$header1 title="Advisor Dashboard"}
{include file=$header2}
<!--/Start::Body/-->
<div id="WrapperOtr">
  <div id="Pageholder"> {$msg}
    <div class="advisor_search_main_page">
      <div class="profile_advisor_srch_page">
        <div class="fb_twit_otr"> <a href="#"><img src="{$site_path}front_media/images/fb-main.png" alt="fb-main" title="Facebook"></a> <a href="#"><img src="{$site_path}front_media/images/twit-main.png" alt="twit-main" title="Twitter"></a> </div>
        <div class="inn_profile_otr">
          <div class="inn_profile_left">
            <div class="inn_user_img">{if {$DetArr['image_path']} neq ''}
                            <img src="{$site_path}front_media/images/advisor_images/180X180px/{$DetArr['image_path']}"/>
                            {else}
                            <img src="{$site_path}front_media/images/advisor_images/user-blank-image.png"  
                            width="180" height="180"/>
                            {/if}</div>
            <div class="profile_rt" >
              <div class="profile_rt_titl">{$DetArr['first_name']}&nbsp;{$DetArr['last_name']}</div>
              <div class="profile_rt_position">&nbsp;</div>
              <div class="profile_rt_consult"><strong>Consults in :</strong> {$Lan}.</div>
              <p>{$DetArr['my_pitch']}</p>
            </div>
          </div>
          <div class="inn_profile_right">
            <div class="profile_rt_rating"> <span> Rating </span>
              <div title="good" style="cursor: default;" id="17"><img id="17-1" src="{$site_path}front_media/images/star-on1.png" alt="1" title="good" class="17">&nbsp;<img id="17-2" src="{$site_path}front_media/images/star-on1.png" alt="2" title="good" class="17">&nbsp;<img id="17-3" src="{$site_path}front_media/images/star-on1.png" alt="3" title="good" class="17">&nbsp;<img id="17-4" src="{$site_path}front_media/images/star-on1.png" alt="4" title="good" class="17">&nbsp;<img id="17-5" src="{$site_path}front_media/images/star-off1.png" alt="5" title="good" class="17"> </div>
            </div>
            <div class="btn_pro_otr">
              <a href="{$site_path}schedule-web-cam/{$aid}"><input type="submit" name="" value="Schedule a web-cam session"></a>
              <a href="{$site_path}book-an-email/{$aid}"><input type="submit" name="" value="Email consultation"></a>
            </div>
          </div>
        </div>
        
        <!-- search_page_dash_otr -----------start ------>
        <div class="search_page_dash_otr">
          <div class="edit_menu_start">
            <ul>
              <li> <a href="{$site_path}view-advisor-profile/{$aid}"> Expert information </a> </li>
              <li> <a href="{$site_path}schedule-web-cam/{$aid}" class="edit_act_nav1"> Schedule a web-cam session</a></li>
              <li> <a href="{$site_path}book-an-email/{$aid}"> Book an email consultation</a></li>
              <li> <a href="{$site_path}send-free-msg/{$aid}"> Send free messages</a></li>
              <li> <a href="{$site_path}view-all-products/{$aid}"> View all products</a></li>
            </ul>
          </div>
          <div class="tab_cont_otr">
          <form action="{$site_path}advisor_account/schedule_web_cam_action.php" method="post" name="form_webcam" id="form_webcam" enctype="multipart/form-data">
            <div class="webcam_session_tab">
            	<div class="personal_info_box">
                <div class="meeting_details">
                <h2> Meeting Details </h2>
                <div class="fld_otr">
                  <label> Cost <!--(Public)--> </label>
                 ${$DetArr['priceWebConsulte']}/hr <!--(Public)--> 
                </div>
                <div class="fld_otr">
                <input type="hidden" id="advisor_id" name="advisor_id" value="{$DetArr['advisor_id']}" />
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
                    {foreach from=$TimeZone item=tZ}
                    <option value="{$tZ.id}" data-offset="{$tZ.offset}" {if $DetArr['timezone'] eq $tZ.id} selected="selected" {/if}>{$tZ.gmt} {$tZ.timezone_location}</option>
            		{/foreach}
                  </select>
                  <input type="hidden" name="ao_tZ" id="ao_tZ" value="" />
                </div>
                
                <div class="fld_otr">
                	   <span><strong>{$DetArr['first_name']}'s comments </strong>: {$DetArr['availability_comment']} </span> 
                       <span><strong> {$DetArr['first_name']}'s preferred hours (in your time zone)</strong></span>
                </div>
                
                	<div class="shedule_tabl_main">
  <table cellspacing="0" cellpadding="0" border="0" style="text-align: center;" class="shedule_tabl_hours">
    <tbody id="time_ZONE">
      <tr>
        <th></th>
        <th colspan="12">AM</th>
        <th><img src="{$site_path}front_media/images/clock.png" alt="12 PM"></th>
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
      
     
      {for $i=1 to 7}
      {if $i eq 1}
      {assign var="day" value="monday"}
      {elseif $i eq 2}
      {assign var="day" value="tuesday"}
      {elseif $i eq 3}
      {assign var="day" value="wednesday"}
      {elseif $i eq 4}
      {assign var="day" value="thursday"}
      {elseif $i eq 5}
      {assign var="day" value="friday"}
      {elseif $i eq 6}
      {assign var="day" value="saturday"}
      {elseif $i eq 7}
      {assign var="day" value="sunday"}
      {/if}
      <tr id="day_01">
        <th align="left" style="padding-right: 10px;" class="week_name">{$day|upper}</th>
        {foreach from=$AvailArr item=aval}
        <td><div {if $aval.$day eq "No"} class="left_para" {else} class="left_para tile_bg" {/if}>&nbsp;</div>
          <div {if $aval.$day eq "No"} class="right_para" {else} class="right_para tile_bg" {/if}>&nbsp;</div></td>
         {/foreach} 
      </tr>
      {/for}
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
<script type="text/javascript" src="{$site_path}front_media/js/timepick/jquery-ui-timepicker-addon.js"></script>
<script src="{$site_path}front_media/js/gurubul.js" type="text/javascript"></script>
<link rel="stylesheet" href="{$site_path}front_media/js/timepick/timepicker_addon.css" />
<style type="text/css">
.ui-widget {
    font-size: 0.7em !important;
}
</style>
<script src="{$site_path}front_media/js/jquery.validate.js" type="text/javascript"></script>
{literal}
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

{/literal}


{include file=$footer}