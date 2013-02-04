{include file=$header1 title="My Profile - Personal Information"}
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
                <li> <a href="edit-advisor-profile" class="edit_act_nav1"> Personal Info</a></li>
                <li> <a href="edit-advisor-education"> Education</a></li>
                <li> <a href="edit-advisor-workx"> Work Exp</a></li>
                <li> <a href="edit-advisor-exper"> Expertise</a></li>
                <li> <a href="edit-advisor-pitch"> My pitch</a></li>
              </ul>
            </div>
            <form name="profileInfoForm" id="profileInfoForm" action="{$site_path}advisor_account/edit_advisor_dash_action.php" method="post"
             enctype="multipart/form-data">
             <input type="hidden" name="advisor_id" id="advisor_id" value="{$advisor_id}"/>
            <div class="personal_info_otr">
              <div class="personal_info_box">
                <div class="profile_upload_img_box">
                 <div class="profile_img">
                  {if {$advisorInfo['image_path']} neq ''}
                            <img id="profilePhotoImg" src="{$site_path}front_media/images/advisor_images/180X180px/{$advisorInfo['image_path']}"/>
                            {else}
                            <img id="profilePhotoImg" src="{$site_path}front_media/images/advisor_images/user-blank-image.png"  
                            width="180" height="180"/>
                            {/if}
                  	<a href="javascript:void(0);" id="changePhotoEdit">change photo</a>	
                    <input type="hidden" id="profilePhoto" name="profilePhoto" size="12"/> 
                    <input type="hidden" name="old_image_path" id="old_image_path" value="{$advisorInfo['image_path']}" size="12" />
                    We <strong>strongly recommend</strong> that you provide a photo. Over 90% of the advisors that receive requests have photos.
                  </div>
                  <div class="profile_img">
                    	<img title="" alt="user" width="180" height="180" src="{$site_path}front_media/images/video-pro.png">
                  <a href="javascript:void(0);" id="changeVideoEdit">change video</a>	
                        <input type="hidden" id="profileIntoVideo" name="profileIntoVideo"  style="width:96px; float:left;" />
                          <input type="hidden" name="old_video_path" id="old_video_path" value="{$advisorInfo['video_path']}" />
                  </div>
                </div>
                <div class="fld_otr">
                  <label for="login"> First name<font>*</font></label>
                  <input type="text" name="firstName" id="firstName" value="{$advisorInfo['first_name']}">
                </div>
                <div class="fld_otr">
                  <label for="login"> Last name<font>*</font></label>
                  <input type="text" name="lastName" id="lastName" value="{$advisorInfo['last_name']}">
                </div>
                <div class="fld_otr">
                  <label for="login"> Email<font>*</font></label>
                  <input type="text" id="email" name="email" value="{$advisorInfo['email']}">
                  <input type="hidden" id="oemail" name="oemail" value="{$advisorInfo['email']}">
                </div>
                <div class="fld_otr">
                  <label for="login"> Languages</label>
                  <input type="text" name="searchSpeakingLanguage" id="searchSpeakingLanguage" value="" size="25" />
                  <input id="addLanguage" class="cupan_code_btn" value="Add Language" type="button" >
                </div>
                <div class="fld_otr">
                  <div class="login_btn">
                    {section name=i loop=$langInfo} 
                        {assign var=lang_id value={$langInfo[i].lang_id}}
                        {if $lang_id eq '17' or $lang_id eq '54' or $lang_id=='22' or $lang_id eq '25' or $lang_id eq '30' or $lang_id eq '16'}
                            <div class="check_arrow">
                               <input type="checkbox" name="language[]" id="language"  value="{$langInfo[i].lang_id}" 
                               {if in_array({$langInfo[i].lang_id},$advSelLangArr) eq 1} checked="checked" {/if} />
                              <label>{$langInfo[i].lang_name}</label>
                            </div>
	                    {/if}
                    {/section}
                    <div id="showMoreLangByAdded">
                    {section name=i loop=$addedLangInfo}
                        {assign var=lang_id value={$langInfo[i].lang_id}}
                            <div class="check_arrow">
                               <input name="language[]" type="checkbox" checked="checked" value="{$addedLangInfo[i].lang_id},1" />
                              <label>{$addedLangInfo[i].lang_name}</label>
                            </div>
                    {/section}
                    </div>
                  </div>
                </div>
                <div class="fld_otr">
                  <label for="login"> Phone number</label>
                  <select id="phoneCode" name="phoneCode">
                   {section name=phcd loop=$countryPhnCdArr} 
                    <option value="{$countryPhnCdArr[phcd].id}" {if $advisorInfo['phone_code'] eq $countryPhnCdArr[phcd].id} selected="selected" {/if}>
                    	{$countryPhnCdArr[phcd].country_name}&nbsp;(+{$countryPhnCdArr[phcd].phone})
                    </option>
                    {/section}     
                  </select>
                  <input type="text" id="phoneNumber" name="phoneNumber" class="phone_txt" value="{$advisorInfo['contact_no']}">
                </div>
                <div class="fld_otr">
                  <label for="login"> Time zone:</label>
                  <select class="time_zone_box" name="time_zone" id="time_zone">
                    <option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---Select your Time zone---</option>
                    {foreach from=$TimeZone item=tZ}
                    <option value="{$tZ.id}" {if $advisorInfo['timezone'] eq $tZ.id} selected="selected" {/if}>{$tZ.gmt} {$tZ.timezone_location}</option>
            		{/foreach}
                  </select>
                </div>
                <div class="fld_otr">
                  <label for="login"> Availability<font>*</font></label>
                  <div class="availability_box">
                    <table>
                      <tbody>
                        <tr>
                          <th>&nbsp;</th>
                          <th><div class="avl_cheeck_box">M</div></th>
                          <th>T</th>
                          <th>W</th>
                          <th>T</th>
                          <th>F</th>
                          <th>S</th>
                          <th>S</th>
                        </tr>
                         {section name=i loop=$advAvailability}
                         <tr>
                          <td>{$advAvailability[i].hour}</td>
                          <td><div class="avl_cheeck_box">
                          	  <input type="checkbox" value="Y" name="availability[{$advAvailability[i].time_id}][0]" 
                              {if $advAvailability[i].monday eq 'Yes'} checked="checked" {/if} 
							  class="availableday0 availablehour{$advAvailability[i].time_id}"  />
                            </div></td>
                          <td><div class="avl_cheeck_box">
                          	  <input type="checkbox" value="Y" name="availability[{$advAvailability[i].time_id}][1]" 
                              {if $advAvailability[i].tuesday eq 'Yes'} checked="checked" {/if} 
							  class="availableday1 availablehour{$advAvailability[i].time_id}"  />
                            </div></td>
                          <td><div class="avl_cheeck_box">
                          	  <input type="checkbox" value="Y" name="availability[{$advAvailability[i].time_id}][2]" 
                              {if $advAvailability[i].wednesday eq 'Yes'} checked="checked" {/if} 
							  class="availableday2 availablehour{$advAvailability[i].time_id}"  />
                            </div></td>
                          <td><div class="avl_cheeck_box">
                          	  <input type="checkbox" value="Y" name="availability[{$advAvailability[i].time_id}][3]" 
                              {if $advAvailability[i].thursday eq 'Yes'} checked="checked" {/if} 
							  class="availableday3 availablehour{$advAvailability[i].time_id}"  />
                            </div></td>
                          <td><div class="avl_cheeck_box">
                          	  <input type="checkbox" value="Y" name="availability[{$advAvailability[i].time_id}][4]" 
                              {if $advAvailability[i].friday eq 'Yes'} checked="checked" {/if} 
							  class="availableday4 availablehour{$advAvailability[i].time_id}"  />
                            </div></td>
                          <td><div class="avl_cheeck_box">
                          	  <input type="checkbox" value="Y" name="availability[{$advAvailability[i].time_id}][5]" 
                              {if $advAvailability[i].saturday eq 'Yes'} checked="checked" {/if} 
							  class="availableday5 availablehour{$advAvailability[i].time_id}"  />
                            </div></td>
                          <td><div class="avl_cheeck_box">
                          	  <input type="checkbox" value="Y" name="availability[{$advAvailability[i].time_id}][6]" 
                              {if $advAvailability[i].sunday eq 'Yes'} checked="checked" {/if} 
							  class="availableday6 availablehour{$advAvailability[i].time_id}"  />
                            </div></td>
                          <td><div class="all_txt"><a href="javascript:toggleavailableHour({$advAvailability[i].time_id});">all</a></div></td>  
                          </tr>
                          {/section}  
                          <tr>
                            <td>&nbsp;</td>
                            <td><div class="all_txt"><a href="javascript:toggleavailableDay(0)">all</a></div></td>
                            <td><div class="all_txt"><a href="javascript:toggleavailableDay(1)">all</a></div></td>
                            <td><div class="all_txt"><a href="javascript:toggleavailableDay(2)">all</a></div></td>
                            <td><div class="all_txt"><a href="javascript:toggleavailableDay(3)">all</a></div></td>
                            <td><div class="all_txt"><a href="javascript:toggleavailableDay(4)">all</a></div></td>
                            <td><div class="all_txt"><a href="javascript:toggleavailableDay(5)">all</a></div></td>
                            <td><div class="all_txt"><a href="javascript:toggleavailableDay(6)">all</a></div></td>
                            <td>&nbsp;</td>
                          </tr>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="fld_otr">
                    <label for="login"> Comment on availablilty :</label>
                    <textarea name="availability_comment" id="availability_comment">{$advisorInfo['availability_comment']}</textarea>
                  </div>
                </div>
                <div class="pricing_pay_otr">
                
                <fieldset>
                <legend> Pricing & Payment </legend>
                  <!--<div class="notifi_head">Pricing & Payment</div>-->
                  <div class="session_completd_otr" >
                    <div class="session_req_left">
                      <div class="session_req_lef_head">
                        <div class="request_one">Consultation Type</div>
                        <div class="request_two">Your Listed Price</div>
                        <div class="request_two">For the First Consultation</div>
                        <div class="request_two">For Repeat Consultations*</div>
                      </div>
                      <div class="session_req_lef_comment">
                        <div class="comment_one">Webcam consulting (in US $)</div>
                        <div class="comment_two">
                         <input type="text" id="yourListedPriceWebConsulte" name="yourListedPriceWebConsulte" 
                         {if $advisorInfo['priceWebConsulte'] neq ''}value="{$advisorInfo['priceWebConsulte']|number_format:2}" {else} value="00.00" {/if} >
                        </div>
                        <div class="comment_two">
                         <input type="text" id="firstPriceWebConsulte" name="firstPriceWebConsulte" readonly="readonly"
                         {if $advisorInfo['priceWebConsulte'] neq ''}value="{$advisorInfo['firstPriceWebConsulte']|number_format:2}" {else} value="00.00" {/if}>
                        </div>
                        <div class="comment_two">
                         <input type="text" id="repeatPriceWebConsulte" name="repeatPriceWebConsulte" readonly="readonly"
                        {if $advisorInfo['priceWebConsulte'] neq ''} value="{$advisorInfo['repeatPriceWebConsulte']|number_format:2}" {else} value="00.00" {/if}>
                        </div>
                      </div>
                      <div class="session_req_lef_comment">
                        <div class="comment_one">Email consulting (in US $)</div>
                        <div class="comment_two">
                         <input type="text" id="yourListedPriceWebcamEmailConsulte" name="yourListedPriceWebcamEmailConsulte"
                         {if $advisorInfo['priceEmailConsulte'] neq ''} value="{$advisorInfo['priceEmailConsulte']|number_format:2}" {else} value="00.00" {/if}>
                        </div>
                        <div class="comment_two">
                         <input type="text" id="firstPriceWebcamEmailConsulte" name="firstPriceWebcamEmailConsulte" readonly="readonly"
                         {if $advisorInfo['firstPriceWebcamEmailConsulte'] neq ''}value="{$advisorInfo['firstPriceWebcamEmailConsulte']|number_format:2}" {else} value="00.00" {/if}>
                        </div>
                        <div class="comment_two">
                         <input type="text" id="repeatPriceWebcamEmailConsulte" name="repeatPriceWebcamEmailConsulte" readonly="readonly"
                         {if $advisorInfo['repeatPriceWebcamEmailConsulte'] neq ''} value="{$advisorInfo['repeatPriceWebcamEmailConsulte']|number_format:2}" {else} value="00.00" {/if}>
                        </div>
                      </div>
                      <!--<div class="session_req_lef_comment">
                        <div class="comment_one">Bulk rate for Webcam/Email consulting (in US $)</div>
                        <div class="comment_two">
                          <input type="text" id="priceEmailConsulteBulk" name="priceEmailConsulteBulk" value="{$advisorInfo['priceEmailConsulteBulk']}">
                        </div>
                      </div>-->
                    </div>
                  </div>	
                  <div class="fld_otr_bank_code"> <span>Bank account details</span>
                    <div class="fld_otr_bank_code_inner">
                      <label for="login"> Bank code :</label>
                      <input type="text" id="bank_code" name="bank_code"  value="{$advisorInfo['bank_code']}">
                    </div>
                    <div class="fld_otr_bank_code_inner">
                      <label for="login"> Branch code :</label>
                      <input type="text" id="branch_code" name="branch_code"  value="{$advisorInfo['branch_code']}">
                    </div>
                    <div class="fld_otr_bank_code_inner">
                      <label for="login"> IBAN number:</label>
                      <input type="text" id="IBAN_code" name="IBAN_code"  value="{$advisorInfo['IBAN_code']}">
                    </div>
                  </div>
                  </fieldset>
                </div>
                
                <div class="social_media_otr">
                <fieldset>
                <!--<div class="notifi_head">Social Media</div>-->
                <legend>Social Media</legend>
                	<div class="fld_otr">
                  <label for="login"> Website :</label>
                  <input type="text" id="websitePageLink" name="websitePageLink" value="{$advSocailMediaInfo['website']}">
                </div>
                
                <div class="fld_otr">
                  <label for="login"> Blog :</label>
                  <input type="text" id="blogPageLink" name="blogPageLink" value="{$advSocailMediaInfo['blog']}">
                </div>

			<div class="fld_otr">
                  <label for="login"> Linkedin :</label>
                  <input type="text" id="linkedinPageLink" name="linkedinPageLink" value="{$advSocailMediaInfo['linkedin']}">
                </div>
                
                <div class="fld_otr">
                  <label for="login"> Facebook :</label> 	 	 	 	 	
                  <input type="text" id="facebookPageLink" name="facebookPageLink" value="{$advSocailMediaInfo['facebook']}">
                </div>
                   
                <div class="fld_otr">
                  <label for="login"> Twitter :</label>
                  <input type="text" id="twitterPageLink" name="twitterPageLink" value="{$advSocailMediaInfo['twitter']}">
                </div>
                
                </fieldset>
                </div>
                
                
                <div class="fld_otr" style="width:100%;">
                  <div class="personal_btn" >
                    <input type="submit" name="submittAdvProfileInfo" id="submittAdvProfileInfo" value="Save personal information" >
                    <input type="submit" name="submittAdvProfileInfo" id="submittAdvProfileInfo" value="Save and continue">
                  </div>
                </div>
              </div>
            </div>
            </form>
            <input type="hidden" id="javascript_sitepath" name="javascript_sitepath" value="{$site_path}" />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/End::Body/-->
<!--/Start::JS/-->
<div id="javaScript">
<script type="text/javascript" src="{$site_path}front_media/js/advisor_account/advisor_edit_validate.js"></script>
<!--/Start::AutoIncrmnt/-->
<script type='text/javascript' src='{$site_path}front_media/js/autocomplete/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="{$site_path}front_media/js/autocomplete/jquery.autocomplete.css" />
<!--/End::AutoIncrmnt/-->
<script type="text/javascript" src="{$site_path}front_media/js/advisor_account/editAdvisorProfileInfo.js"></script>
<!--/Start::popupChangePhoto/--> 
<script type="text/javascript" src="{$site_path}front_media/js/lightbox/popup.js"></script>
<script type="text/javascript" src="{$site_path}front_media/js/lightbox/thickbox.js"></script>
<link rel="stylesheet" href="{$site_path}front_media/js/lightbox/css/thickbox.css" type="text/css" media="screen" />
<script src="{$site_path}front_media/js/gurubul.js" type="text/javascript"></script>
<!--/End::popupChangePhoto/--> 
</div>
<!--/End::JS/-->
{include file=$footer}