{include file=$header1 title="Advisor Dashboard"}
<script src="{$site_path}front_media/js/jquery.validate.js" type="text/javascript"></script>
<style type="text/css">
.error{
	color: red;
}
</style>
{include file=$header2}
<!--/Start::Body/-->
<div id="WrapperOtr">
  <div id="Pageholder">
    <div class="about_page_otr">
      <h1>Advisor Account</h1>
      <div class="line_divider"></div>
      <div class="abt_main_otr">
         {assign value="abt_active" var=abt_active7}
        {include file=$advisorLeftMenu}
        <div class="user_dash_right_part">
        <div class="session_heading_titl">Communication</div>
        
        
        {section name=record loop=$communication}
        			
          <div class="recent_communication">
            <div class="cmt_otr">
              <div class="cmt_otr_left">
                <div class="cmt_img"><img align="left" src="{$site_path}front_media/images/user_images/180X180px/{$communication[record].img}" alt="" title=""><span>{$communication[record].uname}<a href="{$site_path}delete-adv-com/{$communication[record].communication_id}"><div style="border:solid 1px;">Delete</div></a></span></div>
              </div>
              <div class="cmt_otr_right">
                <div class="cmt_rt_head"><strong>{$communication[record].subject}</strong></div>{if $communication[record].new_adv eq 1}<span style="border:solid 1px;">New</span>{/if}

                <div class="cmt_rt_descrption">{$communication[record].message}</div>
                <div class="cmt_rt_posted"> <span> {$communication[record].date_updated} </span> </div>
                <div class="posted_btn"><a href="{$site_path}communication-detail/{$communication[record].communication_id}">View & Reply</a></div>
                
              </div>
            </div>
          </div>
          {/section} 
          
          {if empty($communication)}
           <div class="recent_communication">
            <div class="cmt_otr">
            <strong>No Messages to Display !</strong>
            </div>
           </div>
          {/if}
          
          {*--/Start::PaginationNumbers/--*}
          {if $pagination ne ''}
          <div class="recent_communication">
           <span>{$pagination}</span>
          </div>
          {/if}
          {*--/End::PaginationNumbers/--*}
          
        </div>
      </div>
    </div>
  </div>
</div>
<!--/End::Body/-->
<script src="{$site_path}front_media/js/gurubul.js" type="text/javascript"></script>
{include file=$footer}