{include file=$header1 title="My Profile - Education"}
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
                <li> <a href="edit-advisor-education" class="edit_act_nav1"> Education</a></li>
                <li> <a href="edit-advisor-workx"> Work Exp</a></li>
                <li> <a href="edit-advisor-exper"> Expertise</a></li>
                <li> <a href="edit-advisor-pitch"> My pitch</a></li>
              </ul>
            </div>
            <form name="frmEducationAdvisorInfo" id="frmEducationAdvisorInfo" onsubmit="return validateEduForm();"  method="post" 
            action="{$site_path}advisor_account/edit_advisor_dash_action.php" >
            <input type="hidden" name="advisor_id" id="advisor_id" value="{$advisor_id}"/>
            <div class="personal_info_otr">
            {*Start*}
             <div class="AddEducation">
                {section name=i loop=$advEdutInfo} 
                        {assign var=lp value={$advEdutInfo[i].lp}} 
                 {if $lp gte 2}
                 <div class="edu1 dynamicMod">
                 {else}
                 <div class="edu1">  
    	         {/if}        
                  <div class="personal_info_box">
                    <div class="add_degree_otr">
                      <div class="fld_otr">
                        <label for="login"> School<font>*</font></label>
                        <input type="text" rel="validate" name="schoolName[]" id="schoolName{$lp}" value="{$advEdutInfo[i].school}">
                        <p style="display:none;">Please enter the name of your school/university.</p>
                      </div>
                      <div class="fld_otr">
                        <label for="login"> Degree<font>*</font></label>
                        <input type="text" rel="validate" name="degreeName[]" id="degreeName{$lp}" value="{$advEdutInfo[i].degree}">
                        <p style="display:none;">Please enter the name of your degree.</p>
                      </div>
                      <div class="fld_otr">
                        <label for="login"> Concentration</label>
                        <input type="text" name="concentrationField[]" id="concentrationField{$lp}" value="{$advEdutInfo[i].concentration}">
                      </div>
                      <div class="fld_otr">
                        <label for="login"> Graduation year<font>*</font></label>
                        <input type="text"  rel="validate" name="graduationYear[]" id="graduationYear{$lp}" value="{$advEdutInfo[i].graduation_year}">
                        <p style="display:none;">Enter your graduation year.</p>
                      </div>
                     
                    </div>
                  </div>
                   {if $lp gte 2}
	                <a href="javascript:void(0);" title="Remove" class="removeModEdu">Remove</a></div>                    
				   {else}
                     </div>
                   {/if}
                  {*end::class="edu1"*}
                  {/section}
                                       <input type="button" name="bttnAddEdut" id="bttnAddEdut" value="Add Degree" />
	         </div>{*end::class="AddEducation"*}
                {*End*}
                <div class="fld_otr" style="width:100%;">
                  <div class="personal_btn">
                    <input type="submit" name="btnAdvEdutSubmit" id="btnAdvEdutSubmit" value="Save Education Information">
                    <input type="submit" name="btnAdvEdutSubmit" id="btnAdvEdutSubmit" value="Save and continue">
                  </div>
                </div>
              </div>
             </form> 
              <input type="hidden" name="numOfEducation" id="numOfEducation" value="{$numOfAdvEdut}">          
            </div>
         </div>
      </div>
    </div>
  </div>
</div>
<!--/End::Body/-->
<!--/Start::JS/-->
<div id="javaScript">
<script type="text/javascript" src="{$site_path}front_media/js/advisor_account/advisor_education.js"></script>
<script src="{$site_path}front_media/js/gurubul.js" type="text/javascript"></script> 
<script type="text/javascript" src="{$site_path}front_media/js/advisor_account/advisor_edit_validate.js"></script>
</div>
<!--/End::JS/-->
{include file=$footer}