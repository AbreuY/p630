<!--
CAT egory Bk code.
<div id="menu">
        <ul class="menu">
         {foreach from=$category key=catKey item=category}
          <li><a href="#" {if $category[lp] eq 1} class="nav1 nav1_active" {/if} >{$category['cat_name']}</a>
            <div>
              <ul class="admission_ul">
              {foreach from=$category['subCategory'] key=k item=val}
                <li><a href="{$val['cat_id']}" class="parent"><span>{$val['cat_name']}</span></a></li>
              {/foreach}
              </ul>
            </div>
          </li>
          <li><a href="#" class="nav2">Careers</a>
            <div>
              <ul class="career_ul">
                {foreach from=$catCar key=k item=val}
                <li><a href="{$val['cat_id']}" class="parent"><span>{$val['cat_name']}</span></a></li>
              {/foreach}
              </ul>
            </div>
          </li>
          <li><a href="#" class="nav3">Business</a>
            <div>
              <ul class="busines_ul">
                {foreach from=$catBus key=k item=val}
                <li><a href="{$val['cat_id']}" class="parent"><span>{$val['cat_name']}</span></a></li>
              {/foreach}
              </ul>
            </div>
          </li>
          <li><a href="#" class="nav4">Tutoring</a>
            <div>
              <ul class="tutorial_ul">
                {foreach from=$catTut key=k item=val}
                <li><a href="{$val['cat_id']}" class="parent"><span>{$val['cat_name']}</span></a></li>
              {/foreach}
              </ul>
            </div>
          </li>
        </ul>
      </div>-->
      
Form Edit education details page:      
 {*<!--<div class="fld_otr otr_100">
                        <label for="login"> Offer free help as an :</label>
                        <div class="login_btn_border_otr">
                          <div class="check_arow_otr">
                            <div class="border_head">Free webcam call</div>
                            <div class="check_arrow">
                              <input type="checkbox" name="crntStudntFreeCall[]" id="crntStudntFreeCall" 
                              {if {$advEdutInfo[i].current_students_free_call} eq 1} checked="checked" {/if} value="1" /> 
                            </div>
                          </div>
                          <div class="check_arow_otr">
                            <div class="border_head">Free email</div>
                            <div class="check_arrow">
                              <input type="checkbox" name="crntStudntFreeEmail[]" id="crntStudntFreeEmail"
                              {if {$advEdutInfo[i].current_students_free_email} eq 1} checked="checked" {/if} value="1" />
                            </div>
                          </div>
                          <div class="chk_arow_msg">To current students (Not available yet)</div>
                        </div>
                        <div class="login_btn_border_otr">
                          <div class="check_arow_otr">
                            <div class="border_head">Free webcam call</div>
                            <div class="check_arrow">
                              <input type="checkbox" name="toAlumniFreeCall[]" id="toAlumniFreeCall"
                              {if {$advEdutInfo[i].to_alumni_free_call} eq 1} checked="checked" {/if} value="1" />
                            </div>
                          </div>
                          <div class="check_arow_otr">
                            <div class="border_head">Free email</div>
                            <div class="check_arrow">
                              <input type="checkbox" name="toAlumniFreeEmail[]" id="toAlumniFreeEmail"
                              {if {$advEdutInfo[i].to_alumni_free_email} eq 1} checked="checked" {/if} value="1" />
                            </div>
                          </div>
                          <div class="chk_arow_msg">To alumni (Not available yet)</div>
                        </div>
                      </div>-->*}      
                      
 <!--<div class="fld_otr otr_100">
                        <label for="login"> Offer free help as an :</label>
                        <div class="login_btn_border_otr">
                          <div class="check_arow_otr">
                            <div class="border_head">Free webcam call</div>
                            <div class="check_arrow">
                              <input type="checkbox" name="crntStudntFreeCall[]" id="crntStudntFreeCall" 
                              {if {$advEdutInfo[i].current_students_free_call} eq 1} checked="checked" {/if} value="1" /> 
                            </div>
                          </div>
                          <div class="check_arow_otr">
                            <div class="border_head">Free email</div>
                            <div class="check_arrow">
                              <input type="checkbox" name="crntStudntFreeEmail[]" id="crntStudntFreeEmail"
                              {if {$advEdutInfo[i].current_students_free_email} eq 1} checked="checked" {/if} value="1" />
                            </div>
                          </div>
                          <div class="chk_arow_msg">To current students (Not available yet)</div>
                        </div>
                        <div class="login_btn_border_otr">
                          <div class="check_arow_otr">
                            <div class="border_head">Free webcam call</div>
                            <div class="check_arrow">
                              <input type="checkbox" name="toAlumniFreeCall[]" id="toAlumniFreeCall"
                              {if {$advEdutInfo[i].to_alumni_free_call} eq 1} checked="checked" {/if} value="1" />
                            </div>
                          </div>
                          <div class="check_arow_otr">
                            <div class="border_head">Free email</div>
                            <div class="check_arrow">
                              <input type="checkbox" name="toAlumniFreeEmail[]" id="toAlumniFreeEmail"
                              {if {$advEdutInfo[i].to_alumni_free_email} eq 1} checked="checked" {/if} value="1" />
                            </div>
                          </div>
                          <div class="chk_arow_msg">To alumni (Not available yet)</div>
                        </div>
                      </div>-->                     
                      
Code back up from page edit advisor work exp:
<!--<div id="state_block" class="fld_otr" >
                            <label for="login"> State/Province</label>
                            <select  name="stateProvinceId[]" id="stateProvinceId" >
                              {section name=st loop=$stateInfo}
                              		<option value="{$stateInfo[st].state_id}" 
                                    {if $advExpInfo[i].state_province_id eq $stateInfo[st].state_id} selected="selected" {/if}>
                                    {$stateInfo[st].state_name}</option>  	
                                {/section}
                            </select>
                          </div>-->
                          <!--<div class="fld_otr">
                            <label for="login"> Industry </label>
                            <input type="text" name="industryField[]" id="industryField" value="{$advExpInfo[i].industry_id}" >
                          </div>-->
                           <!--   <input type="checkbox" name="timePeriodType[]" value="Work" id="timePeriodWork" 
                                 {if $advExpInfo[i].time_period_type eq 'Work'} checked="checked" {/if} />
                                 <label style="width:250px;">I currently work here</label>
                                <input type="checkbox" name="timePeriodType[]" value="Internship" id="timePeriodInternship" 
                                 {if $advExpInfo[i].time_period_type eq 'Internship'} checked="checked" {/if} />
                                 <label style="width:250px;">Internship</label>-->                        
                      