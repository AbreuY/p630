{include file=$header1 title="Advisor Dashboard"}
{include file=$header2}
<!--/Start::Body/-->
<div id="WrapperOtr">
  <div id="Pageholder">
    <div class="advisor_search_main_page">
      <div class="profile_advisor_srch_page">
        <div class="fb_twit_otr"> <a href="#"><img src="{$site_path}front_media/images/fb-main.png" alt="fb-main" title="Facebook"></a> <a href="#"><img src="{$site_path}front_media/images/twit-main.png" alt="twit-main" title="Twitter"></a> </div>
        <div class="inn_profile_otr">
          <div class="inn_profile_left">
            <div class="inn_user_img">{if {$DetArr['image_path']} neq ''}
                            <img src="{$site_path}front_media/images/advisor_images/180X180px/{$DetArr['image_path']}"/>
                            {else}
                            <img src="{$site_path}front_media/images/advisor_images/user-blank-image.png"  
                            width="180" height="180"/>
                            {/if}</div>
            <div class="profile_rt" >
              <div class="profile_rt_titl">{$DetArr['first_name']}&nbsp;{$DetArr['last_name']}</div>
              <div class="profile_rt_position">&nbsp;</div>
              <div class="profile_rt_consult"><strong>Consults in :</strong> {$Lan}.</div>
              <p>{$DetArr['my_pitch']}</p>
            </div>
          </div>
          <div class="inn_profile_right">
            <div class="profile_rt_rating"> <span> Rating </span>
              <div title="good" style="cursor: default;" id="17"><img id="17-1" src="{$site_path}front_media/images/star-on1.png" alt="1" title="good" class="17">&nbsp;<img id="17-2" src="{$site_path}front_media/images/star-on1.png" alt="2" title="good" class="17">&nbsp;<img id="17-3" src="{$site_path}front_media/images/star-on1.png" alt="3" title="good" class="17">&nbsp;<img id="17-4" src="{$site_path}front_media/images/star-on1.png" alt="4" title="good" class="17">&nbsp;<img id="17-5" src="{$site_path}front_media/images/star-off1.png" alt="5" title="good" class="17"> </div>
            </div>
            <div class="btn_pro_otr">
              <a href="{$site_path}schedule-web-cam/{$aid}"><input type="submit" name="" value="Schedule a web-cam session"></a>
              <a href="{$site_path}book-an-email/{$aid}"><input type="submit" name="" value="Email consultation"></a>
            </div>
          </div>
        </div>
        
        <!-- search_page_dash_otr -----------start ------>
        <div class="search_page_dash_otr">
          <div class="edit_menu_start">
            <ul>
              <li> <a href="{$site_path}view-advisor-profile/{$aid}" class="edit_act_nav1"> Expert information </a> </li>
              <li> <a href="{$site_path}schedule-web-cam/{$aid}"> Schedule a web-cam session</a></li>
              <li> <a href="{$site_path}book-an-email/{$aid}"> Book an email consultation</a></li>
              <li> <a href="{$site_path}send-free-msg/{$aid}"> Send free messages</a></li>
              <li> <a href="{$site_path}view-all-products/{$aid}"> View all products</a></li>
            </ul>
          </div>
          <div class="tab_cont_otr">
            <div class="expert_info_tab">
             <div class="experience_inn_all">
             <div class="experience_inn_all_otr">
            <div class="experience_inn_tab_otr">
              <div class="experience_inn_tab">
                <h3>My Experience</h3>
                {foreach from=$WExpArr item=valWExp}
                <div class="my_exp_otr">
                  <div class="my_exp_lt_rt">
                    <div class="my_exp_left"> {$valWExp.time_period_from} - {$valWExp.time_period_to}</div>
                    <div class="my_exp_right">
                      <h4> {$valWExp.employer} </h4>
                      <h5> {$valWExp.title} </h5>
                      <h6> {$valWExp.office_city}{if $valWExp.office_city neq ""}, {/if}{$valWExp.country_name} </h6>
                      {$valWExp.description}
                    </div>
                  </div>
                </div>
                {/foreach}
                <!--<div class="my_exp_otr">
                  <div class="my_exp_lt_rt">
                    <div class="my_exp_left"> 2010 - 2010</div>
                    <div class="my_exp_right">
                      <h4> McKinsey & Company </h4>
                      <h5> Senior Associate </h5>
                      <h6> Toronto, Canada </h6>
                    </div>
                  </div>
                </div>-->
              </div>
              
                      <!-- experience_inn_tab -----------start  ------>

              <div class="experience_inn_tab">
                <h3>My Education</h3>
                {foreach from=$EduArr item=valEdu}
                <div class="my_exp_otr">
                  <div class="my_exp_lt_rt">
                    <div class="my_exp_left"> {$valEdu.graduation_year} </div>
                    <div class="my_exp_right">
                      <h4> {$valEdu.school} </h4>
                      <h5> {$valEdu.degree} </h5>
                      <h6> {$valEdu.concentration} </h6>
                    </div>
                  </div>
                </div>
                {/foreach}
                <!--<div class="my_exp_otr">
                  <div class="my_exp_lt_rt">
                    <div class="my_exp_left"> 2005-present </div>
                    <div class="my_exp_right">
                      <h4> McKinsey & Company </h4>
                      <h5> Senior Associate </h5>
                      <h6> Toronto, Canada </h6>
                    </div>
                  </div>
                </div>-->
              </div>
              
              <!-- experience_inn_tab -----------end  ------>
              
            </div>
              
              <div class="experience_inn_tab_otr2">
              <div class="experience_inn_tab_mid">
                <h3>My Expertise</h3>
                
              <!--  <div class="my_exp_otr">
                  <div class="my_exp_lt_rt">
                    <div class="my_exp_left"> Industry <br>Expertise</div>
                    <div class="my_exp_right">
                      <h4> McKinsey & Company </h4>
                      <h6> 1 year experience </h6>
                      <h4> Health care providers</h4>
                    </div>
                  </div>
                </div>-->
               {assign var="to_prnt" value="" nocache}
                {foreach from=$ExpArr item=valExp name=exp}
                
                <div class="my_exp_otr">
                  <div class="my_exp_lt_rt">
                    {if $to_prnt neq $valExp.area_name}<div class="my_exp_left"> {$valExp.area_name} </div>{/if}
                    <div class="my_exp_right">
                      <h4> {$valExp.cat_name} </h4>
                      <h6>{$valExp.about_experience_info}</h6>
                       <!--<h6> Easy eaditing interview </h6>-->
                       {if $valExp.to_show}
                      <h5> Specialities :</h5>
                      	<ul class="special">
                        	{if $valExp.one eq 'on'}<li><span>{$valExp.A}</span>{$valExp.one_txt}</li>{/if}
                            {if $valExp.two eq 'on'}<li><span>{$valExp.B}</span>{$valExp.two_txt}</li>{/if}
                            {if $valExp.three eq 'on'}<li><span>{$valExp.C}</span>{$valExp.three_txt}</li>{/if}
                            {if $valExp.four eq 'on'}<li><span>{$valExp.D}</span>{$valExp.four_txt}</li>{/if}
                            {if $valExp.five eq 'on'}<li><span>{$valExp.E}</span>{$valExp.five_txt}</li>{/if}
                        </ul>
                        
                      {/if}
                    </div>
                  </div>
                </div>
                {assign var="to_prnt" value=$valExp.area_name nocache}
                 {/foreach}
                
              </div>
              
                  
            </div>
            
            </div>
            
            <div class="experience_inn_tab_otr3">
            <div class="experience_inn_tab">
            	<h3> Hot Products </h3>
                <div class="cat_profile_rt">
            
            
            
            {foreach from=$ProArr item=pro}
           <a href="{$site_path}product-details/{$pro.product_id}"><div class="pop_product">
              <div class="pop_img"> <img src="{$site_path}front_media/images/pop-product.png"> </div>
              <div class="pop_text"><span> {$pro.name} </span> {$pro.description}..</div>
            </div></a>
            {/foreach}
            
           
            
           
            
           
            
            
          </div>
          <a href="{$site_path}view-all-products/{$aid}"> See All </a>
              </div>   
            </div>
            
            </div>
            
            <div class="review_main">
            	<h2> Reviews </h2>
                <div class="review_inn"> 
                <div class="profile_rt_rating"> 
              <div id="17" class="rate_in"><img class="17" title="good" alt="1" src="{$site_path}front_media/images/star-on1.png" id="17-1">&nbsp;<img class="17" title="good" alt="2" src="{$site_path}front_media/images/star-on1.png" id="17-2">&nbsp;<img class="17" title="good" alt="3" src="{$site_path}front_media/images/star-on1.png" id="17-3">&nbsp;<img class="17" title="good" alt="4" src="{$site_path}front_media/images/star-on1.png" id="17-4">&nbsp;<img class="17" title="good" alt="5" src="{$site_path}front_media/images/star-off1.png" id="17-5"> </div>
              <span> 4.5 </span>
              <span class="date_display"> Nov 27 2012</span>
            </div>
            
            <div class="review_titl"> Topic: Legal - Immigration </div>
             <div class="review_comment"> "Share practical insight addressing the communication challenges of legal and communication professionals alike "</div>
             
              </div>
              
              <div class="review_inn"> 
                <div class="profile_rt_rating"> 
              <div id="17" class="rate_in"><img class="17" title="good" alt="1" src="{$site_path}front_media/images/star-on1.png" id="17-1">&nbsp;<img class="17" title="good" alt="2" src="{$site_path}front_media/images/star-on1.png" id="17-2">&nbsp;<img class="17" title="good" alt="3" src="{$site_path}front_media/images/star-on1.png" id="17-3">&nbsp;<img class="17" title="good" alt="4" src="{$site_path}front_media/images/star-on1.png" id="17-4">&nbsp;<img class="17" title="good" alt="5" src="{$site_path}front_media/images/star-off1.png" id="17-5"> </div>
              <span> 4.5 </span>
              <span class="date_display"> Nov 27 2012</span>
            </div>
            
            <div class="review_titl"> Topic: Legal - Immigration </div>
             <div class="review_comment"> "Share practical insight addressing the communication challenges of legal and communication professionals alike "</div>
             
              </div>
              
              
            </div>
            </div>
          </div>
        </div>
        <!-- search_page_dash_otr -----------end ------> 
        
      </div>
    </div>
  </div>
</div>
<!--/End::Body/-->
{include file=$footer}