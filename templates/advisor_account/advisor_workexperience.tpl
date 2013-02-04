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
                <li> <a href="{$site_path}active-account/workexperience-info/{$smarty.get.cd}" class="edit_act_nav1"> Work Exp</a></li>
                <li> <a href="{$site_path}active-account/expertise-info/{$smarty.get.cd}"> Expertise</a></li>
                <li> <a href="{$site_path}active-account/mypitch-info/{$smarty.get.cd}"> My pitch</a></li>
              </ul>
            </div>
            <form name="frmWrkExpAdvisorInfo" id="frmWrkExpAdvisorInfo"  method="post" onsubmit="return validateWorkExperienceForm();"
            action="{$site_path}advisor_account/advisor_active_account_action.php?cd={$smarty.get.cd}">
            <input type="hidden" name="advisor_id" id="advisor_id" value="{$advisor_id}"/>
            <div class="personal_info_otr">
           	{if $advExpInfo ne ''} 
                 {*Start*}
                 <div class="JobExperience">
                     {section name=i loop=$advExpInfo} 
                            {assign var=lp value={$advExpInfo[i].lp}} 
                     {if $lp gte 2}
                     <div class="job dynamicMod"><a href="javascript:void(0);" title="Remove" class="removeMod">Remove</a>
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
                       {if $lp eq 2}
                         </div>                    
                       {else}
                         </div>
                       {/if}
                         {*end::class="job"*}
                      {/section}
                        <input type="button" name="addJob" id="addJob" value="Add Job">
                    </div>
                 {*End*}
                
            {elseif $advExpInfo eq ''}
                
                <div class="JobExperience">
		         <div class="job">
                    <div class="personal_info_box">
                        <div class="work_exp_otr">
                          <div class="fld_otr"> 	 	
                            <label for="login">Employer<font>*</font></label>
                            <input type="text" rel="validate" name="employerField[]" id="employerField1" value="">
                          </div>
                          <div class="fld_otr">
                            <label for="login"> Title :</label>
                            <input type="text" name="titleField[]" id="titleField1" value="">
                          </div>
                          <div class="fld_otr">
                            <label for="login"> Office country </label>
                            <select name="officeCountry[]" id="officeCountry1" >
                            	{section name=cntry loop=$countryInfo}
                              		<option value="{$countryInfo[cntry].id}" >
                                    {$countryInfo[cntry].country_name}</option>  	
                                {/section}
                            </select>
                          </div>
                          
                          <div class="fld_otr">
                            <label for="login"> Office city </label>
                            <input type="text" name="officeCity[]" id="officeCity1"  value="">
                          </div>
                          <div class="fld_otr">
                            <label for="login"> Industry </label>
                            <input type="text" name="industryField[]" id="industryField1" value="" >
                          </div>
                          <div class="fld_otr">
                            <label for="login"> Time period </label>
                            <div class="login_btn">
                                <input type="checkbox" name="timePeriodType[]" value="Work" id="timePeriodWork1" />
                                 <label>I currently work here</label>
                                <input type="checkbox" name="timePeriodType[]" value="Internship" id="timePeriodInternship1" />
                                 <label>Internship</label>
                              <select name="timePeriodFrom[]" id="timePeriodFrom" >
	                              {foreach from=$year item=yrFrom}
                                        <option value="{$yrFrom}">{$yrFrom}</option>
                                  {/foreach}
                              </select>
                              <span>To</span>
                              <select  name="timePeriodTo[]" id="timePeriodTo1">
	                              {foreach from=$year item=yrTo}
                                        <option value="{$yrTo}">{$yrTo}</option>
                                  {/foreach}
                              </select>
                            </div>
                          </div>
                          <div class="fld_otr">
                            <label for="login"> Description </label>
                            <textarea name="description[]" id="description1" rows="5" cols="15"></textarea>
                          </div>
                    	</div>
                    </div>
                     </div>
                    <input type="button" name="addJob" id="addJob" value="Add Job">
                </div>
          {/if}
                <div class="fld_otr" style="width:100%;">
                  <div class="personal_btn" style="width:725px;">
                    <input type="submit" name="btnAdvExpSubmit" id="btnAdvExpSubmit" value="Save Employment History">
                    <input type="submit" name="btnAdvExpSubmit" id="btnAdvExpSubmit" value="Save and continue">
                  </div>
                </div> 
              </div>
             </form> 
              {if $advEdutInfo ne ''}
        		  <input type="hidden" name="noOfExperience" id="noOfExperience" value="{$numOfAdvExp}">        
              {elseif $advEdutInfo eq ''}
		          <input type="hidden" name="noOfExperience" id="noOfExperience" value="1">        
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
<script type="text/javascript" src="{$site_path}front_media/js/advisor_account/advisor_workexperience.js"></script>
<script type="text/javascript" src="{$site_path}front_media/js/advisor_account/advisor_edit_validate.js"></script>
<script src="{$site_path}front_media/js/gurubul.js" type="text/javascript"></script> 
</div>
<!--/End::JS/-->
{include file=$footer}