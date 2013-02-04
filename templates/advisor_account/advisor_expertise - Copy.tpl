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
                <li> <a href="{$site_path}active-account/expertise-info/{$smarty.get.cd}" class="edit_act_nav1"> Expertise</a></li>
                <li> <a href="{$site_path}active-account/mypitch-info/{$smarty.get.cd}"> My pitch</a></li>
              </ul>
            </div>
            <form name="frontProfileExprForm" id="frontProfileExprForm" method="post"
            action="{$site_path}advisor_account/advisor_active_account_action.php?cd={$smarty.get.cd}" >
          <input type="hidden" name="advisor_id" id="advisor_id" value="{$advisor_id}"/>
          <div class="personal_info_otr">
            <div class="personal_info_box">
              <div class="expertise_otr">
                <div class="fld_otr">In which areas would you like to offer your services ?</div>
                <div class="fld_otr0_main">
                  <div class="fld_otr0">
                    <div class="check_forgot_box">
                      <input type="checkbox" id="admission" name="admission" {if $numOfAdvExpr gt '0'} checked="checked" {/if}>
                      <span>Admission</span> </div>
                  </div>
                  <div class="fld_otr0">
                    <div class="check_forgot_box">
                      <input type="checkbox" id="career" name="career" {if $numOfAdvExprCareers gt '0'} checked="checked" {/if}>
                      <span>Careers</span> </div>
                  </div>
                </div>
                {*--/Admission/--*}
                <div id="add" {if $numOfAdvExpr eq '0'} style="display:none;" {/if} >
                  <div class="admission_inn_expertise">
                    <div class="notifi_head">Admissions</div>
                    <div class="fld_otr">In which degree do you have Admissions expertise (pick up to 3)?</div>
                    {foreach from=$catAdd key=k item=val}
                    <div class="fld_otr0_main">
                      <div class="fld_otr0">
                        <div class="check_forgot_box">
                          <input type="checkbox" class="checkAdd" name="expertise_cat_id['Admissions'][]"
                                         value="{$val['cat_id']}" data-ck="{$val['cat_id']}" 
                                         {if in_array({$val['cat_id']},$area_service_admission_catid) eq 1} checked="checked" {/if} >
                          <span>{$val['cat_name']}</span> </div>
                      </div>
                    </div>
                    {/foreach}    
                    
                    
                    {foreach from=$catAdd key=k item=val}
                    <div id="{"detailAdd"|cat:$val['cat_id']}" 
                            {if in_array({$val['cat_id']},$area_service_admission_catid) eq 0} style="display:none;" {/if} >
                    <div class="titl_area_main">
                      <div class="inner_titl">Admissions: {$val['cat_name']}</div>
                      <textarea name="{"textAdd"|cat:$val['cat_id']}">{$area_service_admission_info[$val['cat_id']].about_experience_info}</textarea>
                     {*<!-- <div class="fld_otr">Of your experience, which are related to this degree?</div>
                      <div class="exp_main">
                        <div class="exp_inn">Work Experience</div>
                        <div class="exp_inn">Education</div>
                      </div>-->*}
                      <div class="fld_otr">Which services are you willing to offer in College (Undergraduate) (pick at least 1)?</div>
                      <div class="fld_otr100">
                        <div class="check_forgot_box">
                          <input type="checkbox" class="PYtxt" data-ck="{$val['cat_id']}" name="{"checkPY"|cat:$val['cat_id']}" 
                                {if {$area_service_admission_info[$val['cat_id']].one} eq on} checked="checked" {/if} >
                          <span>Positioning Yourself</span> </div>
                        <textarea  name="{"textPY"|cat:$val['cat_id']}" id="{"textPY"|cat:$val['cat_id']}" 
                                {if {$area_service_admission_info[$val['cat_id']].one} neq on} style="display:none;" {/if} >                       {$area_service_admission_info[$val['cat_id']].one_txt}</textarea>
                        <div class="check_forgot_box">
                          <input type="checkbox" class="CMtxt" data-ck="{$val['cat_id']}" name="{"checkCM"|cat:$val['cat_id']}" 
                                {if {$area_service_admission_info[$val['cat_id']].two} eq on} checked="checked" {/if} >
                          <span>College Matching</span> </div>
                        <textarea name="{"textCM"|cat:$val['cat_id']}" id="{"textCM"|cat:$val['cat_id']}"  
                                 {if {$area_service_admission_info[$val['cat_id']].two} neq on} style="display:none;" {/if} >                        {$area_service_admission_info[$val['cat_id']].two_txt}</textarea>
                        <div class="check_forgot_box">
                          <input type="checkbox" class="APtxt" data-ck="{$val['cat_id']}" name="{"checkAP"|cat:$val['cat_id']}" 
                                {if {$area_service_admission_info[$val['cat_id']].three} eq on} checked="checked" {/if} >
                          <span>Applications</span> </div>
                        <textarea name="{"textAP"|cat:$val['cat_id']}" id="{"textAP"|cat:$val['cat_id']}"  
                                {if {$area_service_admission_info[$val['cat_id']].three} neq on} style="display:none;" {/if} >                      {$area_service_admission_info[$val['cat_id']].three_txt}</textarea>
                        <div class="check_forgot_box">
                          <input type="checkbox" class="IPtxt" data-ck="{$val['cat_id']}" name="{"checkIP"|cat:$val['cat_id']}" 
                                {if {$area_service_admission_info[$val['cat_id']].four} eq on} checked="checked" {/if} >
                          <span>Interview Prep</span> </div>
                        <textarea  name="{"textIP"|cat:$val['cat_id']}" id="{"textIP"|cat:$val['cat_id']}"  
                                 {if {$area_service_admission_info[$val['cat_id']].four} neq on} style="display:none;" {/if} >                      {$area_service_admission_info[$val['cat_id']].four_txt}</textarea>
                        <div class="check_forgot_box">
                          <input type="checkbox" class="PCtxt" data-ck="{$val['cat_id']}" name="{"checkPC"|cat:$val['cat_id']}"
                                {if {$area_service_admission_info[$val['cat_id']].five} eq on} checked="checked" {/if} >
                          <span>Paying for College</span> </div>
                        <textarea name="{"textPC"|cat:$val['cat_id']}" 	id="{"textPC"|cat:$val['cat_id']}"  
                                {if {$area_service_admission_info[$val['cat_id']].five} neq on} style="display:none;" {/if} >        {$area_service_admission_info[$val['cat_id']].five_txt}</textarea>
                      </div>
                    </div>
                  </div>
                  {/foreach} </div>
              </div>
              {*--/Careers/--*}
              <div id="car" {if $numOfAdvExprCareers eq '0'} style="display:none;" {/if}>
                <div class="admission_inn_expertise">
                  <div class="notifi_head">Careers</div>
                  <div class="fld_otr">In which industry do you have Careers expertise (pick up to 3)?</div>
                  {foreach from=$catCar key=k item=val}
                  <div class="fld_otr0_main">
                    <div class="fld_otr0">
                      <div class="check_forgot_box">
                        <input type="checkbox" class="checkCar" name="expertise_cat_id['Careers'][]"
                                         value="{$val['cat_id']}" data-ck="{$val['cat_id']}"
                                         {if in_array({$val['cat_id']},$area_service_careers_catid) eq 1} checked="checked" {/if} >
                        <span>{$val['cat_name']}</span> </div>
                    </div>
                  </div>
                  {/foreach}  
                  
                  
                  
                  
                  {foreach from=$catCar key=k item=val}
                  <div id="{"detailCar"|cat:$val['cat_id']}" 
                        {if in_array({$val['cat_id']},$area_service_careers_catid) eq 0} style="display:none;" {/if} >
                  <div class="titl_area_main">
                    <div class="inner_titl">Career: {$val['cat_name']}</div>
                    <textarea name="{"textCar"|cat:$val['cat_id']}" >{$area_service_careers_info[$val['cat_id']].about_experience_info}</textarea>
                    {*<!--<div class="fld_otr">Of your experience, which are related to this degree?</div>
                    <div class="exp_main">
                      <div class="exp_inn">Work Experience</div>
                      <div class="exp_inn">Education</div>
                    </div>-->*}
                    <div class="fld_otr">Which services are you willing to offer in College (Undergraduate) (pick at least 1)?</div>
                    <div class="fld_otr100">
                      <div class="check_forgot_box">
                        <input type="checkbox" class="CAtxt" data-ck="{$val['cat_id']}" name="{"checkCA"|cat:$val['cat_id']}"
                             {if {$area_service_careers_info[$val['cat_id']].one} eq on} checked="checked" {/if} >
                        <span>Career Assessment</span> </div>
                      <textarea  name="{"textCA"|cat:$val['cat_id']}" id="{"textCA"|cat:$val['cat_id']}" 
                            {if {$area_service_careers_info[$val['cat_id']].one} neq on} style="display:none;" {/if} >
                      {$area_service_careers_info[$val['cat_id']].one_txt}
                      </textarea>
                      <div class="check_forgot_box">
                        <input type="checkbox" class="IItxt" data-ck="{$val['cat_id']}" name="{"checkII"|cat:$val['cat_id']}"
                             {if {$area_service_careers_info[$val['cat_id']].two} eq on} checked="checked" {/if} >
                        <span>Informational Interview</span> </div>
                      <textarea name="{"textII"|cat:$val['cat_id']}" id="{"textII"|cat:$val['cat_id']}" 
                            {if {$area_service_careers_info[$val['cat_id']].two} neq on} style="display:none;" {/if} >                      {$area_service_careers_info[$val['cat_id']].two_txt}</textarea>
                      <div class="check_forgot_box">
                        <input type="checkbox" class="RCtxt" data-ck="{$val['cat_id']}" name="{"checkRC"|cat:$val['cat_id']}" 
                             {if {$area_service_careers_info[$val['cat_id']].three} eq on} checked="checked" {/if} >
                        <span>Resume & Cover Letter</span> </div>
                      <textarea name="{"textRC"|cat:$val['cat_id']}" id="{"textRC"|cat:$val['cat_id']}" 
                            {if {$area_service_careers_info[$val['cat_id']].three} neq on} style="display:none;" {/if} >                      {$area_service_careers_info[$val['cat_id']].three_txt}</textarea>
                      <div class="check_forgot_box">
                        <input type="checkbox" class="JStxt" data-ck="{$val['cat_id']}" name="{"checkJS"|cat:$val['cat_id']}"
                             {if {$area_service_careers_info[$val['cat_id']].four} eq on} checked="checked" {/if} >
                        <span>Job Search</span> </div>
                      <textarea  name="{"textJS"|cat:$val['cat_id']}" id="{"textJS"|cat:$val['cat_id']}" 
                            {if {$area_service_careers_info[$val['cat_id']].four} neq on} style="display:none;" {/if} >                      {$area_service_careers_info[$val['cat_id']].four_txt}</textarea>
                      <div class="check_forgot_box">
                        <input type="checkbox" class="IPRtxt" data-ck="{$val['cat_id']}" name="{"checkIPR"|cat:$val['cat_id']}"
                             {if {$area_service_careers_info[$val['cat_id']].five} eq on} checked="checked" {/if} >
                        <span>Interview Practice</span> </div>
                      <textarea name="{"textIPR"|cat:$val['cat_id']}" id="{"textIPR"|cat:$val['cat_id']}" 
                            {if {$area_service_careers_info[$val['cat_id']].five} neq on} style="display:none;" {/if} >                     {$area_service_careers_info[$val['cat_id']].five_txt}</textarea>
                    </div>
                  </div>
                </div>
                {/foreach} </div>
            </div>
          </div>
          <div class="fld_otr" style="width:100%;">
            <div class="personal_btn">
              <input type="submit" name="btnAdvExprSubmit" id="btnAdvExprSubmit" value="Save Expertise Information">
              <input type="submit" name="btnAdvExprSubmit" id="btnAdvExprSubmit" value="Save and continue"></div>
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
<script src="{$site_path}front_media/js/advisor_account/advisor_expertise.js" type="text/javascript"></script> 
</div>
<!--/End::JS/-->
{include file=$footer}