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
              <li> <a href="{$site_path}schedule-web-cam/{$aid}"> Schedule a web-cam session</a></li>
              <li> <a href="{$site_path}book-an-email/{$aid}" class="edit_act_nav1"> Book an email consultation</a></li>
              <li> <a href="{$site_path}send-free-msg/{$aid}"> Send free messages</a></li>
              <li> <a href="{$site_path}view-all-products/{$aid}"> View all products</a></li>
            </ul>
          </div>
          <div class="tab_cont_otr">
            <div class="email_consultation"> 
            <form action="{$site_path}advisor_account/book_an_email_action.php" method="post" name="form_email" id="form_email" enctype="multipart/form-data">
            <div class="personal_info_box">
            <div class="fld_otr"><label>Email cost</label> ${$DetArr['priceEmailConsulte']}</div>
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
                  <input type="hidden" name="advisor_id" value="{$DetArr['advisor_id']}" />
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
<script src="{$site_path}front_media/js/gurubul.js" type="text/javascript"></script>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<script src="{$site_path}front_media/js/jquery.validate.js" type="text/javascript"></script>
{literal}
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
{/literal}
{include file=$footer}