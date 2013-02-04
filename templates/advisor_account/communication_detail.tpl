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
        
        <div class="recent_communication">
            <div class="cmt_otr">
              <div class="cmt_otr_left">
                <div class="cmt_img"><img align="left" src="{$site_path}front_media/images/user_images/180X180px/{$communication['img']}" alt="" title=""><span>{$communication['uname']}</span></div>
              </div>
              <div class="cmt_otr_right">
                <div class="cmt_rt_head">{$communication['subject']}</div>
               <div class="cmt_rt_descrption">{$communication['message']}</div>
                <div class="cmt_rt_posted"> <span> {$communication['date_created']} </span> </div>
                <!--<div class="msg_bottom_head"><a href="{$site_path}communication-detail/{$communication[record].communication_id}">View Conversation & Reply</a></div>-->
                
              </div>
            </div>
          </div>
        
        
        {section name=record loop=$com_rep}
        			
          <div class="recent_communication">
            <div class="msg_otr">
              <div class="msg_lt">
                <div class="msg_lt_img"><img align="left" src="{$site_path}front_media/images/{$com_rep[record].u_a}/180X180px/{$com_rep[record].img}" alt="" title=""></div>
              </div>
              <div class="msg_rt">
               <!-- <div class="msg_rt_head">{$com_rep[record].message}</div>-->
                <div class="msg_rt_txt_part" style="font-size:14px;">{$com_rep[record].message}</div>
                 <div class="cmt_rt_posted"> <span> {$com_rep[record].date} </span> </div>
                <!-- <div class="msg_bottom_head"><a href="{$site_path}communication-detail/{$communication[record].communication_id}">View Conversation & Reply</a></div>-->
                
              </div>
            </div>
          </div>
          {/section} 
          <div class="recent_communication recnt_rpl">
          <div class="msg_otr">
          <div class="msg_rt_head" style="border-bottom:none">Add a Reply</div>
          <br>
          <form method="post" id="replyFrom" action="{$site_path}advisor_account/com_reply.php">
          <input type="hidden" name="cid" value="{$communication['communication_id']}">
          <input type="hidden" name="to" value="{$communication['from']}">
          <textarea  name="reply_con" id="reply_con"></textarea>
          <div class="fld_otr"><input type="submit" name="reply" id="reply" value="Reply" ></div>
          </form>
          </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
<!--/End::Body/-->
{literal}
<script type="text/javascript">
$(document).ready(function(e) {
    $('#reply').click(function(e) {
        $('#replyFrom').validate({
			rules:{
				reply_con:{
					required: true,
					maxlength: 300
				}
			},
			messages:{
				reply_con:{
					required: "You can not send a blank reply.",
					maxlength: "Maximum size is 300 characters."
				}
			}
		});
    });
    
    $("html, body").animate({ scrollTop: $(document).height()-$(window).height() - 150 }, 1000);
});
</script>
{/literal}
<script src="{$site_path}front_media/js/gurubul.js" type="text/javascript"></script>
{include file=$footer}