{include file=$header1 title="Active Advisor Account"}
<script src="{$site_path}front_media/js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript" src="{$site_path}front_media/js/jquery.livequery.js"></script>
<style type="text/css">
.error{
	color: red;
}
</style>
{include file=$header2}
<!--/Start::Body/-->
<div id="WrapperOtr">
  <div id="Pageholder">
       {*--/Start::Msg/--*} {$msg} {*--/End::Msg/--*}
    <div class="about_page_otr">
      <h1>Advisor Account</h1>
      <div class="line_divider"></div>
      <div class="abt_main_otr">
        <div class="advisor_dash_front_part">
          <div class="advisor_my_profile_otr">
            <div class="edit_menu_start">
              <ul>
                <li> <a href="{$site_path}active-account/profile-info/{$smarty.get.cd}" > Personal Info</a></li>
                <li> <a href="{$site_path}active-account/education-info/{$smarty.get.cd}"> Education</a></li>
                <li> <a href="{$site_path}active-account/workexperience-info/{$smarty.get.cd}"> Work Exp</a></li>
                <li> <a href="{$site_path}active-account/expertise-info/{$smarty.get.cd}"> Expertise</a></li>
                <li> <a href="{$site_path}active-account/mypitch-info/{$smarty.get.cd}" class="edit_act_nav1"> My pitch</a></li>
              </ul>
            </div>
            <form name="profileInfoForm" id="profileInfoForm" method="post"
            action="{$site_path}advisor_account/advisor_active_account_action.php?cd={$smarty.get.cd}" >
             <input type="hidden" name="advisor_id" id="advisor_id" value="{$advisor_id}"/>
            <div class="personal_info_otr">
              <div class="personal_info_box">
                <div class="expertise_otr">
                  <div class="fld_otr_txtarea">
                  
                  <div class="pitch_txtarea">
                    <textarea name="pitchField" id="pitchField" onkeyup="countChar(this);">{$my_pitch}</textarea>
                    
                      <strong>Characters.</strong>
                	   <div id="charNum">
							{if $my_pitch neq ''} {$pitchCnt} {else} 600 {/if}
                       </div> 
                       </div> 
                    
                    <div class="pitch_otr">
                    <div class="pitch_img"></div>
                    <div class="pitch_msg">
                    	Optional, but recommended. Write a few lines covering what you have to offer and why people should pick your advice. For example:<br /><br />

With 10+ years of experience in a wide range of businesses, I can help you with common sense advice on everything from getting that first job to Business Plans, Marketing Strategy and everyday operational problems. I can help you navigate the rough waters of the business world. Let's talk.<br /><br />

If you become a top rated expert, the first 140 characters of your pitch may be visible on the front page of Evisors.com 
                    	
                    </div>
                    </div>
                    
                  </div>
                  
                  
                 
                </div>
              
                <div class="fld_otr" style="width:100%;">
                  <div class="personal_btn">
                    <input type="submit" name="btnAdvPitchSubmit" id="btnAdvPitchSubmit" value="Save Pitch">
                    <input type="submit" name="btnAdvPitchSubmit" id="btnAdvPitchSubmit" value="Save and Complete">
                  </div>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/End::Body/-->
<!--/Start::JS/-->
<div id="javaScript">
<script src="{$site_path}front_media/js/gurubul.js" type="text/javascript"></script> 
</div>
<!--/End::JS/-->
{include file=$footer}