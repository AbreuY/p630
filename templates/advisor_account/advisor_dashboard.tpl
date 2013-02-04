{include file=$header1 title="Advisor Dashboard"}
{include file=$header2}
<!--/Start::Body/-->
<div id="WrapperOtr">
  <div id="Pageholder">
    <div class="about_page_otr">
      
      <h1>Advisor Account</h1>
      <div class="line_divider"></div>
      
      <div class="abt_main_otr">
      	{assign value="abt_active" var=abt_active1}
        {include file=$advisorLeftMenu}
        
        <div class="user_dash_right_part">
        <div class="session_heading_titl">Dashboard</div>
        
        <div class="session_completd_otr">
        <!--<div class="session_heading">Pending &amp; Paid Requests</div>
        <br /><br /><br />-->
        <div class="session_completd_otr" style="width:99%;">
            <div class="session_req_left">
            	<div class="session_req_lef_head">
                	<div class="request_one">Pending Requests For Webcam Session</div>
                   <!-- <div class="request_two">Status</div>-->
                </div>
                
                {foreach from=$pend_webcam item=i}
                <div class="session_req_lef_comment">
                	<div class="comment_one">{$i.subject}</div>
                    <div class="comment_two"> <a href="{$site_path}webcam-accept-detail/{$i.webcam_id}">View</a></div>
                </div>
                {/foreach}
                
            	<div class="session_req_lef_head">
                	<div class="request_one">Pending Requests For Message Session</div>
                   <!-- <div class="request_two">Status</div>-->
                </div>
                
                 {foreach from=$pend_message item=i}
                <div class="session_req_lef_comment">
                	<div class="comment_one">{$i.subject}</div>
                    <div class="comment_two"> <a href="{$site_path}message-accept-detail/{$i.message_id}">View</a></div>
                </div>
                {/foreach}
                
                {if $pend_message eq '' and $pend_webcam eq ''}
                    <div class="session_req_lef_comment">
                        <div class="comment_one"><strong>No Pending Requests to Display !</strong></div>
                        <div class="comment_two">&nbsp;</div>
                    </div>
                {/if}
            </div>
            
           </div>
           
           
           
           <div class="session_completd_otr" style="width:99%;">
        	<!--<div class="session_heading">requests</div>-->
            <div class="session_req_left">
            	<div class="session_req_lef_head">
                	<div class="request_one">Paid Requests</div>
                    <!--<div class="request_two">Status</div>-->
                    
                </div>
               {foreach from=$paid_webcam item=i}
                <div class="session_req_lef_comment">
                	<div class="comment_one">{$i.subject}W</div>
                    <div class="comment_two">View</div>
                </div>
                {/foreach}
                 {foreach from=$paid_message item=i}
                <div class="session_req_lef_comment">
                	<div class="comment_one">{$i.subject}M</div>
                    <div class="comment_two">View</div>
                </div>
                {/foreach}
                
                {if $paid_webcam eq '' and $paid_message eq ''}
                    <div class="session_req_lef_comment">
                        <div class="comment_one"><strong>No Paid Requests to Display !</strong></div>
                        <div class="comment_two">&nbsp;</div>
                    </div>
                {/if}
            </div>
            <!--<div class="session_req_right">
            <div class="session_req_lef_head">Advisor</div>
            <div class="session_req_lef_comment">Advisor 1</div>
            </div>-->
           </div>
           
           
        </div>
        
        
        
        
        
        
        
        
        <div class="session_completd_otr">
        	<div class="session_heading">Total Earnings</div>
            <div class="session_req_left">
            	<div class="session_req_lef_head">
                	<div class="request_one"><strong>$ 999Dummy</strong></div>
                </div>
            </div>
        </div>
        
        
        
        
        
        
        
        
        
        
        <div class="product_purchased_otr">
        	<div class="session_heading">Total Pending Earnings</div>
            <div class="session_req_left">
            	<div class="session_req_lef_head">
                	<div class="request_one">Earning service type</div>
                   <!-- <div class="request_one">Advisor</div>-->
                    <div class="request_two" style="float:right;">Amount</div>
                </div>
                <div class="session_req_lef_comment">
                	<div class="comment_one">Webcam Sessions</div>
                   <!-- <div class="comment_three">Advisor 1</div>-->
                    <div class="comment_two" style="float:right;">$ 120Dummy</div>
                </div>
               <div class="session_req_lef_comment">
                	<div class="comment_one">E-mail Counsaltancy</div>
                   <!-- <div class="comment_three">Advisor 1</div>-->
                    <div class="comment_two" style="float:right;">$ 120Dummy</div>
                </div>
                <div class="session_req_lef_comment">
                	<div class="comment_one">Product Sales</div>
                    <!--<div class="comment_three">Advisor 1</div>-->
                    <div class="comment_two" style="float:right;">$ 120Dummy</div>
                </div>
                <!--<div class="session_req_lef_comment">
                	<div class="comment_one"><a href="#">Product 1</a></div>
                    <div class="comment_three">Advisor 1</div>
                    <div class="comment_two">$ 120</div>
                </div>
                <div class="session_req_lef_comment">
                	<div class="comment_one"><a href="#">Product 1</a></div>
                    <div class="comment_three">Advisor 1</div>
                    <div class="comment_two">$ 120</div>
                </div>-->
            </div>
        </div>
        
        
       
        
        
        <div class="unread_messages_otr">
        	<div class="session_heading">Unread messages</div>
            <div class="session_req_left">
            	<div class="session_req_lef_head">
                	<div class="request_one"><a href="#">View</a></div>
                    <div class="request_two">Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo.</div>
                </div>
                
                <div class="session_req_lef_head">
                	<div class="request_one"><a href="#">View</a></div>
                    <div class="request_two">Lorem ipsum dolor sit amet, sapien etiam, nunc amet dolor ac odio mauris justo.</div>
                </div>
                
            </div>
        </div>
        
        <div class="recommended_products_otr">
        	<div class="session_heading">My Rates</div>
            <div class="session_req_left">
            	<!--<div class="session_req_lef_head">
                	<div class="request_one">Product</div>
                    <div class="request_two">Amount</div>
                </div>-->
                <div class="session_req_lef_comment">
                	<div class="comment_one">Webcam Sessions(per hour)</div>
                    <div class="comment_two">$ 120Dummy</div>
                </div>
                <div class="session_req_lef_comment">
                	<div class="comment_one">E-mail Consultancy</div>
                    <div class="comment_two">$ 120Dummy</div>
                </div>
                
            </div>
        </div>
        
        
        <div class="recommended_products_otr">
        	<div class="session_heading">My Ratings</div>
            <div class="session_req_left">
                <div class="session_req_lef_comment">
                	<div class="comment_one">Based on Webcam Session/E-mail Consultancy</div>
                    <div class="comment_two"><div class="profile_rt_rating">
                  <div id="17" style="cursor: default;" title="good"><img class="17" title="good" alt="1" src="{$site_path}front_media/images/star-on.png" id="17-1">&nbsp;<img class="17" title="good" alt="2" src="{$site_path}front_media/images/star-on.png" id="17-2">&nbsp;<img class="17" title="good" alt="3" src="{$site_path}front_media/images/star-on.png" id="17-3">&nbsp;<img class="17" title="good" alt="4" src="{$site_path}front_media/images/star-on.png" id="17-4">&nbsp;<img class="17" title="good" alt="5" src="{$site_path}front_media/images/star-off.png" id="17-5"> </div>
                </div></div>
                </div>
                <div class="session_req_lef_comment">
                	<div class="comment_one">Based on Products</div>
                    <div class="comment_two"><div class="profile_rt_rating">
                  <div id="17" style="cursor: default;" title="good"><img class="17" title="good" alt="1" src="{$site_path}front_media/images/star-on.png" id="17-1">&nbsp;<img class="17" title="good" alt="2" src="{$site_path}front_media/images/star-on.png" id="17-2">&nbsp;<img class="17" title="good" alt="3" src="{$site_path}front_media/images/star-on.png" id="17-3">&nbsp;<img class="17" title="good" alt="4" src="{$site_path}front_media/images/star-on.png" id="17-4">&nbsp;<img class="17" title="good" alt="5" src="{$site_path}front_media/images/star-off.png" id="17-5"> </div>
                </div></div>
                </div>
                
            </div>
        </div>
        
        
        </div>
        
      </div>
    </div>
  </div>
</div>
<!--/End::Body/-->
{include file=$footer}