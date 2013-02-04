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
                <li> <a href="{$site_path}active-account/profile-info/{$smarty.get.cd}"> Personal Info</a></li>
                <li> <a href="{$site_path}active-account/education-info/{$smarty.get.cd}" class="edit_act_nav1"> Education</a></li>
                <li> <a href="{$site_path}active-account/workexperience-info/{$smarty.get.cd}"> Work Exp</a></li>
                <li> <a href="{$site_path}active-account/expertise-info/{$smarty.get.cd}"> Expertise</a></li>
                <li> <a href="{$site_path}active-account/mypitch-info/{$smarty.get.cd}"> My pitch</a></li>
              </ul>
            </div>
            <form name="frmEducationAdvisorInfo" id="frmEducationAdvisorInfo"  method="post" onsubmit="return validateEduForm();"
            action="{$site_path}advisor_account/advisor_active_account_action.php?cd={$smarty.get.cd}">
            <input type="hidden" name="advisor_id" id="advisor_id" value="{$advisor_id}"/>
            <div class="personal_info_otr">
            {if $advEdutInfo ne ''}
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
                        <input type="text" rel="validate" name="graduationYear[]" id="graduationYear{$lp}" value="{$advEdutInfo[i].graduation_year}">
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
                  
                    <input type="button" name="bttnAddEdut" id="bttnAddEdut" value="Add Degree"  style="margin-left:10px"/>
	         </div>{*end::class="AddEducation"*}
            {*End*}
            {elseif $advEdutInfo eq ''}
            	<div class="AddEducation">
                 <div class="edu1">  
                  <div class="personal_info_box">
                    <div class="add_degree_otr">
                      <div class="fld_otr">
                        <label for="login"> School<font>*</font></label>
                        <input type="text" rel="validate" name="schoolName[]" id="schoolName1" value="">
                        <p style="display:none;">Please enter the name of your school/university.</p>
                      </div>
                      <div class="fld_otr">
                        <label for="login"> Degree<font>*</font></label>
                        <input type="text" rel="validate" name="degreeName[]" id="degreeName1" value="">
                        <p style="display:none;">Please enter the name of your degree.</p>
                      </div>
                      <div class="fld_otr">
                        <label for="login"> Concentration</label>
                        <input type="text" name="concentrationField[]" id="concentrationField1" value="">
                      </div>
                      <div class="fld_otr">
                        <label for="login"> Graduation year<font>*</font></label>
                        <input type="text" rel="validate" name="graduationYear[]" id="graduationYear1" value="">
                        <p style="display:none;">Enter your graduation year.</p>
                      </div>
                    </div>
                  </div>
                  </div>
                    <input type="button" name="bttnAddEdut" id="bttnAddEdut" value="Add Degree"  style="margin-left:10px"/>
	         </div>
            {/if}
            
            
                <div class="fld_otr" style="width:100%;">
                  <div class="personal_btn" style="width: 725px;">
                    <input type="submit" name="btnAdvEdutSubmit" id="btnAdvEdutSubmit" value="Save Education Information">
                    <input type="submit" name="btnAdvEdutSubmit" id="btnAdvEdutSubmit" value="Save and continue">
                  </div>
                </div>
              </div>
             </form> 
              {if $advEdutInfo ne ''}
             	 <input type="hidden" name="numOfEducation" id="numOfEducation" value="{$numOfAdvEdut}">         
              {elseif $advEdutInfo eq ''}
             	 <input type="hidden" name="numOfEducation" id="numOfEducation" value="1">        
              {/if}     
            </div>
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
<script type="text/javascript" src="{$site_path}front_media/js/advisor_account/advisor_edit_validate.js"></script>
<script src="{$site_path}front_media/js/gurubul.js" type="text/javascript"></script> 
</div>
<!--/End::JS/-->
{include file=$footer}