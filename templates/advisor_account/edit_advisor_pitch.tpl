{include file=$header1 title="My Profile - My Pitch"}
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
  {*--/Start::Msg/--*} {$msg}  {*--/End::Msg/--*}
    <div class="about_page_otr">
      
      <h1>Advisor Account</h1>
      <div class="line_divider"></div>
      
      <div class="abt_main_otr">
       {assign value="abt_active" var=abt_active2}
        {include file=$advisorLeftMenu}
        
        <div class="user_dash_right_part">
        <div class="session_heading_titl">Edit and Update Your Profile</div>
       <div class="advisor_my_profile_otr">
            <div class="edit_menu_start">
              <ul>
                <li> <a href="edit-advisor-profile"> Personal Info</a></li>
                <li> <a href="edit-advisor-education"> Education</a></li>
                <li> <a href="edit-advisor-workx"> Work Exp</a></li>
                <li> <a href="edit-advisor-exper"> Expertise</a></li>
                <li> <a href="edit-advisor-pitch" class="edit_act_nav1"> My pitch</a></li>
              </ul>
            </div>
             <form name="profileInfoForm" id="profileInfoForm" method="post"
            action="{$site_path}advisor_account/edit_advisor_dash_action.php" >
             <input type="hidden" name="advisor_id" id="advisor_id" value="{$advisor_id}"/>
            <div class="personal_info_otr">
              <div class="personal_info_box">
                <div class="expertise_otr">
                  <div class="fld_otr_txtarea">
                  <div class="pitch_txtarea">
                    <textarea name="pitchField" id="pitchField" onkeyup="countChar(this);" style="width:600px; height:150px;">{$my_pitch}</textarea>
                    
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