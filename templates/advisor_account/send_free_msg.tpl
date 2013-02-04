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
              <li> <a href="{$site_path}book-an-email/{$aid}"> Book an email consultation</a></li>
              <li> <a href="{$site_path}send-free-msg/{$aid}" class="edit_act_nav1"> Send free messages</a></li>
              <li> <a href="{$site_path}view-all-products/{$aid}"> View all products</a></li>
            </ul>
          </div>
          <div class="tab_cont_otr">
            <div class="send_free_msg_tab">
            <form action="{$site_path}advisor_account/send_free_msg_action.php" name="freeMsgForm" id="freeMsgForm" method="post">
              <div class="personal_info_box">
            	<div class="fld_otr">
                  <label> Subject </label>
                 <input type="text" name="subject" id="subject" style="width:400px;">
                 <input type="hidden" name="aid" value="{$aid}" />
                </div>
                
                <div class="fld_otr">
                  <label> Type your message here </label>
                 <textarea name="msgg" onkeyup="countCharMsg(this);" id="msgg"></textarea>
                 <div>Chataters remaining: <strong><span id="left_chars">300</span></strong></div>
                </div>
                
                <div style="width:100%" class="fld_otr">
                  <div class="personal_btn">
                    <input type="submit" value="Send" id="send" name="send">
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
 <script src="{$site_path}front_media/js/gurubul.js" type="text/javascript"></script>
 <script src="{$site_path}front_media/js/jquery.validate.js" type="text/javascript"></script>
 <script src="{$site_path}front_media/js/advisor_account/free_msg_validate.js" type="text/javascript"></script> 
<!--/End::Body/-->
{include file=$footer}