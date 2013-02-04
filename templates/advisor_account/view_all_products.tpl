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
              <li> <a href="{$site_path}view-advisor-profile/{$aid}"> Expert information </a> </li>
              <li> <a href="{$site_path}schedule-web-cam/{$aid}"> Schedule a web-cam session</a></li>
              <li> <a href="{$site_path}book-an-email/{$aid}"> Book an email consultation</a></li>
              <li> <a href="{$site_path}send-free-msg/{$aid}"> Send free messages</a></li>
              <li> <a href="{$site_path}view-all-products/{$aid}" class="edit_act_nav1"> View all products</a></li>
            </ul>
          </div>
          <div class="tab_cont_otr">
            <div class="view_pro_all_tab">
              <div class="personal_info_box">
            	
				<h2> Products
                 <!--<div class="sort_by_rating">
                 Sort by :
                 	<select>
                    	<option> Rating</option>
                    </select>
                 </div>-->
                
                </h2> 
                
                
                {foreach from=$ProArr item=pro}
                <a href="{$site_path}product-details/{$pro.product_id}"><div class="product_one_video">
                	<div class="pro_head"> {$pro.name} </div>
                    {if $pro.combination eq 'video'}<img src="{$site_path}front_media/images/video-icon.png"  />{/if}
                    			{if $pro.combination eq 'videoppt'}<img src="{$site_path}front_media/images/ppt.png"  />{/if}
                                {if $pro.combination eq 'audioppt'}<img src="{$site_path}front_media/images/audio.png"  />{/if}
                </div></a>
                {/foreach}
                
                <!--<div class="product_one_video">
                	<div class="pro_head"> Video </div>
                    <a href="#"><img src="{$site_path}front_media/images/video-icon.png"  /></a>
                </div>
                <div class="product_one_video_ppt">
                	<div class="pro_head"> Video and ppt </div>
                    <a href="#"><img src="{$site_path}front_media/images/ppt.png"  /></a>
                </div>
                <div class="product_one_audio">
                	<div class="pro_head"> Audio and ppt </div>
                   <a href="#"> <img src="{$site_path}front_media/images/audio.png"  /></a>
                </div> -->
                              
               
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