{include file=$header1 title="My Profile - Work Experience"}
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
                <li> <a href="edit-advisor-workx" class="edit_act_nav1"> Work Exp</a></li>
                <li> <a href="edit-advisor-exper"> Expertise</a></li>
                <li> <a href="edit-advisor-pitch"> My pitch</a></li>
              </ul>
            </div>
	        <form name="frmWrkExpAdvisorInfo" id="frmWrkExpAdvisorInfo"  method="post" onsubmit="return validateWorkExperienceForm();"
            action="{$site_path}advisor_account/edit_advisor_dash_action.php">
            <input type="hidden" name="advisor_id" id="advisor_id" value="{$advisor_id}"/>
            <div class="personal_info_otr">
             {*Start*}
             <div class="JobExperience">
             	 {section name=i loop=$advExpInfo} 
                        {assign var=lp value={$advExpInfo[i].lp}} 
			     {if $lp gte 2}
                 <div class="job dynamicMod">
			     {else}
		         <div class="job">
			     {/if}
                    <div class="personal_info_box">
                        <div class="work_exp_otr">
                          <div class="fld_otr"> 	 	
                            <label for="login">Employer<font>*</font></label>
                            <input type="text" rel="validate" name="employerField[]" id="employerField{$lp}" value="{$advExpInfo[i].employer}">
                            <p style="display:none;">Please enter the name of employer.</p>
                          </div>
                          <div class="fld_otr">
                            <label for="login"> Title :</label>
                            <input type="text" name="titleField[]" id="titleField{$lp}" value="{$advExpInfo[i].title}">
                          </div>
                          <div class="fld_otr">
                            <label for="login"> Office country </label>
                            <select name="officeCountry[]" id="officeCountry{$lp}" >
                            	{section name=cntry loop=$countryInfo}
                              		<option value="{$countryInfo[cntry].id}" 
                                    {if $advExpInfo[i].office_country_id eq $countryInfo[cntry].id} selected="selected" {/if}>
                                    {$countryInfo[cntry].country_name}</option>  	
                                {/section}
                            </select>
                          </div>
                          
                          <div class="fld_otr">
                            <label for="login"> Office city </label>
                            <input type="text" name="officeCity[]" id="officeCity{$lp}"  value="{$advExpInfo[i].office_city}">
                          </div>
                          
                          <div class="fld_otr">
                            <label for="login"> Time period </label>
                            <div class="login_btn">
                            
                              <select name="timePeriodFrom[]" id="timePeriodFrom{$lp}" >
	                              {foreach from=$year item=yrFrom}
                                        <option value="{$yrFrom}"
                                        {if $advExpInfo[i].time_period_from eq $yrFrom} selected="selected" {/if} >{$yrFrom}</option>
                                  {/foreach}
                              </select>
                              <span>To</span>
                              <select  name="timePeriodTo[]" id="timePeriodTo{$lp}" >
	                              {foreach from=$year item=yrTo}
                                        <option value="{$yrTo}"
                                        {if $advExpInfo[i].time_period_to eq $yrTo} selected="selected" {/if} >
                                        {$yrTo}</option>
                                  {/foreach}
                              </select>
                            </div>
                          </div>
                          <div class="fld_otr">
                            <label for="login"> Description </label>
                            <textarea name="description[]" id="description{$lp}" rows="5" cols="15">{$advExpInfo[i].description}</textarea>
                          </div>
                    	</div>
                    </div>
                   {if $lp gte 2}
	                 <a href="javascript:void(0);" title="Remove" class="removeMod">Remove</a></div>                    
				   {else}
                     </div>
                   {/if}
                     {*end::class="job"*}
                  {/section}
                    <input type="button" name="addJob" id="addJob" value="Add Job">
                </div> 
                <div class="fld_otr" style="width:100%;">
                  <div class="personal_btn">
                    <input type="submit" name="btnAdvExpSubmit" id="btnAdvExpSubmit" value="Save Employment History">
                    <input type="submit" name="btnAdvExpSubmit" id="btnAdvExpSubmit" value="Save and continue">
                  </div>
                </div> 
              </div>
             </form> 
             <input type="hidden" name="noOfExperience" id="noOfExperience" value="{$numOfAdvExp}">        
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/End::Body/-->
<!--/Start::JS/-->
<div id="javaScript">
<script type="text/javascript" src="{$site_path}front_media/js/advisor_account/advisor_workexperience.js"></script>
<script src="{$site_path}front_media/js/gurubul.js" type="text/javascript"></script> 
<script type="text/javascript" src="{$site_path}front_media/js/advisor_account/advisor_edit_validate.js"></script>
</div>
<!--/End::JS/-->
{include file=$footer}