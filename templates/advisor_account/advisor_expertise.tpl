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
                {section name=exprArea loop=$area_expertise_cat}
                  <div class="fld_otr0">
                    <div class="check_forgot_box">
                      <input type="checkbox" id="expertArea{$area_expertise_cat[exprArea].cat_id}" name="expertArea[]" 
                      value="{$area_expertise_cat[exprArea].cat_id}" onclick="showSubServiceArea('{$area_expertise_cat[exprArea].cat_id}');"
                       {if in_array({$area_expertise_cat[exprArea].cat_id},$area_service_catid) eq 1} checked="checked" {/if}/>
                      <span>{$area_expertise_cat[exprArea].cat_name}</span> </div>
                  </div>
                {/section}
                </div>
                
                {*<!--/Start::ServiceAreaSubCat/-->*}
                {section name=a1 loop=$services_expertise_subcat}
                    <div id="divId{$services_expertise_subcat[a1].cat_id}"
                     {if in_array({$services_expertise_subcat[a1].cat_id},$area_service_catid) eq 0} style="display:none;" {/if}>
                     
                      <div class="admission_inn_expertise">
                        <div class="notifi_head">{$services_expertise_subcat[a1].cat_name}</div>
                        <div class="fld_otr">In which degree do you have {$services_expertise_subcat[a1].cat_name|capitalize} expertise ?</div>
                        
                        {foreach from=$services_expertise_subcat[a1].subServices key=sbA1 item=subServices}
                        <div class="fld_otr0_main">
                          <div class="fld_otr0">
                            <div class="check_forgot_box">
                              <input type="checkbox" class="checkAdd" name="expertise_cat_id['{$services_expertise_subcat[a1].cat_id}'][]"
                              value="{$subServices['cat_id']}" data-ck="{$val['cat_id']}"  
                              {if in_array({$subServices['cat_id']},$area_service_subcatid) eq 1} checked="checked" {/if}/> 
                              <span>{$subServices['cat_name']}</span> </div>
                          </div>
                        </div>
                        {/foreach}
                        
                        {*<!--{if in_array({$subServices['cat_id']},$area_service_admission_catid) eq 1} checked="checked" {/if}-->*}
                        {*<!--{if in_array({$val['cat_id']},$area_service_admission_catid) eq 0}  {/if}-->*}
                         
                        {foreach from=$services_expertise_subcat[a1].subServices key=k item=val}
                        <div id="{"detailAdd"|cat:$val['cat_id']}" 
                        {if in_array({$val['cat_id']},$area_service_subcatid) eq 0} style="display:none;" {/if} >
                            <div class="titl_area_main">
                              <div class="inner_titl"><strong>{$services_expertise_subcat[a1].cat_name|capitalize}: {$val['cat_name']|capitalize}</strong></div>
                              <textarea name="{"textAdd"|cat:$val['cat_id']}">{$area_service_info[$val['cat_id']].about_experience_info}</textarea>
                              <div class="pitch_msg">
                                <strong>This is your time to shine!</strong><br />
                                Tell us about your experience and background in this area, here. Below, you can pitch your services.<br />
                                <a class="see_shine_front" href="javascript:void(0);">See where this will be on your profile</a>
                              </div>
                              <div class="fld_otr">Which services are you willing to offer in {$val['cat_name']|capitalize}?</div>
                              <div class="fld_otr100">
                               
                                <div class="check_forgot_box"> 
                                  <input type="checkbox" class="PYtxt" data-ck="{$val['cat_id']}" name="{"checkPY"|cat:$val['cat_id']}" 
                                        {if {$area_service_info[$val['cat_id']].one} eq on} checked="checked" {/if} />  
                                  <span>{$val['serviceA']|capitalize}</span> </div>
                                <textarea  name="{"textPY"|cat:$val['cat_id']}" id="{"textPY"|cat:$val['cat_id']}" {if {$area_service_info[$val['cat_id']].one} neq on} style="display:none;" {/if}>{$area_service_info[$val['cat_id']].one_txt}</textarea> 
                                
                                <div class="check_forgot_box">
                                  <input type="checkbox" class="CMtxt" data-ck="{$val['cat_id']}" name="{"checkCM"|cat:$val['cat_id']}" 
                                        {if {$area_service_info[$val['cat_id']].two} eq on} checked="checked" {/if} />
                                  <span>{$val['serviceB']|capitalize}</span> </div>
                                <textarea name="{"textCM"|cat:$val['cat_id']}" id="{"textCM"|cat:$val['cat_id']}" {if {$area_service_info[$val['cat_id']].two} neq on} style="display:none;" {/if} >{$area_service_info[$val['cat_id']].two_txt}</textarea>
                                
                                <div class="check_forgot_box">
                                  <input type="checkbox" class="APtxt" data-ck="{$val['cat_id']}" name="{"checkAP"|cat:$val['cat_id']}"
                                                                {if {$area_service_info[$val['cat_id']].three} eq on} checked="checked" {/if} />
                                  <span>{$val['serviceC']|capitalize}</span> </div>
                                <textarea name="{"textAP"|cat:$val['cat_id']}" id="{"textAP"|cat:$val['cat_id']}" {if {$area_service_info[$val['cat_id']].three} neq on} style="display:none;" {/if} >{$area_service_info[$val['cat_id']].three_txt}</textarea>
        
                                <div class="check_forgot_box">
                                  <input type="checkbox" class="IPtxt" data-ck="{$val['cat_id']}" name="{"checkIP"|cat:$val['cat_id']}" {if {$area_service_info[$val['cat_id']].four} eq on} checked="checked" {/if} />
                                  <span>{$val['serviceD']|capitalize}</span></div>
                                <textarea  name="{"textIP"|cat:$val['cat_id']}" id="{"textIP"|cat:$val['cat_id']}" {if {$area_service_info[$val['cat_id']].four} neq on} style="display:none;" {/if} >{$area_service_info[$val['cat_id']].four_txt}</textarea>
        
                                <div class="check_forgot_box">
                                  <input type="checkbox" class="PCtxt" data-ck="{$val['cat_id']}" name="{"checkPC"|cat:$val['cat_id']}" 
                                        {if {$area_service_info[$val['cat_id']].five} eq on} checked="checked" {/if} />
                                  <span>{$val['serviceE']|capitalize}</span> </div>
                                <textarea name="{"textPC"|cat:$val['cat_id']}" 	id="{"textPC"|cat:$val['cat_id']}" {if {$area_service_info[$val['cat_id']].five} neq on} style="display:none;" {/if} >{$area_service_info[$val['cat_id']].five_txt}</textarea>
                              
                              </div>
                            </div>
                       </div>
                      {/foreach} 
                      
                      </div>
                    </div>
              	{/section}
                {*<!--/End::ServiceAreaSubCat/-->*}     
            
          </div>
          <div class="fld_otr" style="width:100%;">
            <div class="personal_btn">
              <input type="submit" name="btnAdvExprSubmit" id="btnAdvExprSubmit" value="Save Expertise Information">
              <input type="submit" name="btnAdvExprSubmit" id="btnAdvExprSubmit" value="Save and continue"></div>
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
<script src="{$site_path}front_media/js/advisor_account/advisor_expertise.js" type="text/javascript"></script> 
<script src="{$site_path}front_media/js/gurubul.js" type="text/javascript"></script> 
<script type="text/javascript" src="{$site_path}front_media/js/lightbox/popup.js"></script>
<script type="text/javascript" src="{$site_path}front_media/js/lightbox/user_thickbox.js"></script>
<link rel="stylesheet" href="{$site_path}front_media/js/lightbox/css/thickbox.css" type="text/css" media="screen" />
</div>
<!--/End::JS/-->
{include file=$footer}