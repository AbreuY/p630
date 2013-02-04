{include file=$header1 title="Advisor Dashboard"}
{include file=$header2}
<!--/Start::Body/-->

<div id="WrapperOtr">
  <div id="Pageholder">
    <div class="about_page_otr">
      <h1>Advisor Account</h1>
      <div class="line_divider"></div>
      <div class="abt_main_otr">
         {assign value="abt_active" var=abt_active3}
        {include file=$advisorLeftMenu}
        <div class="session_deails1 msg_details_page">
          <!--<div class="edit_menu_start">
            <ul>
              <li> <a class="edit_act_nav1" href="#"> Pending Request </a></li>
              <li> <a href="#"> Accepted Request</a></li>
              <li> <a href="#"> Completed Request</a></li>
            </ul>
          </div>-->
          <div class="pending_req">
            <div class="pending_req_head"> Consultation with {$user['username']} </div>
            <input type="hidden" name="mid" id="mid" value="{$message['message_id']}" />
            <input type="hidden" name="adv_name" id="adv_name" value="{$adv['first_name']}" />
            <input type="hidden" name="usr_name" id="usr_name" value="{$user['username']}" />
            <ul class="msg_topic">
              <!--<li> <span>Topic</span> : Not yet scheduled </li>-->
              <li> <span>Subject </span>: {$message['subject']} </li>
              <li> <span>Deadline</span> : {$message['deadline']} days </li>
              {if $files neq ''}
              <li> 
              		<span>Attached Files</span>: <br />
                    <div style="margin-left:120px; float:left;width:100%;">
                    	{foreach from=$files item=i}
                         {$i.indx}].&nbsp;{$i.name}.{$i.format}
                         &nbsp;&nbsp;&nbsp;&nbsp;
                         <a href="{$site_path}dwnldemailconsulteattchfile/{$i.message_file_id|base64_encode}">Download</a>
                         <br />
                        {/foreach}
                    </div>
                    
	          </li>
            {/if}	  
              
            </ul>
            
            
            <!-- <div class="cmt_img"> <img src="{$site_path}front_media/images/user_images/180X180px/{$user['image_path']}" alt="user" title=""> </div>-->
             
          </div>
          
          <div class="edit_menu_start2">
            <ul>
              <li> <a href="#" class="edit_act_nav1"> Accept </a></li>
              <li> <a href="#"> Payment</a></li>
              <li> <a href="#"> Answer</a></li>
              <li> <a href="#"> Feedback</a></li>
              <li> <a href="#"> Finished</a></li>
             </ul>
             
          	  <div class="accept_tab1">
              	<div class="accept_tab1_head"> You will receive ${$adv['will_get']} for this consultation </div>
                <div class="accept_tab1_head"> Accept or decline to answer this question <a href="{$site_path}advisor_account/message_accept_action.php?mid={$message['message_id']}"><input type="submit" value="Accept" name=""></a> <a href="{$site_path}message-reject/{$message['message_id']}"><input type="submit" value="Decline" name=""></a> </div>
                
              </div>
              
              <div class="accept_below_tab">
              		<div class="pending_req_head"> {$user['username']}'s Question </div>
                   <div class="q_box">
                    	<div class="q_box_left"><div  class="q_head"> {$message['description']} </div></div>
                        <div class="q_box_right">
                        	
                            
                            
       <!-------------------- Chat Box  --------------------------------    -->              
                            
                            <div class="cleara_box">
                            	<div class="cleara_box_head">Clarify</div>
                                <div class="cleara_msg" id="msg_otr" style="overflow:auto; max-height:150px;">
                                	<!--<div>No chat message have ben sent</div>-->
                                    {$chat}
                                </div>
                                <textarea id="msg" onkeydown="if (event.keyCode == 13) $('#send_msg_but').click()"></textarea>
                                <button id="send_msg_but" name="">Enter</button> 
                            </div>
                            
                            
                <!-------------------- Chat Box  --------------------------------    -->                 
                            
                            
                        </div>
                    </div>
              </div>

           
          </div>
          
          
          
        </div>
      </div>
    </div>
  </div>
</div>

<!--/End::Body/-->

<script type="text/javascript" src="../front_media/js/advisor_account/advisor_chat.js"></script>

{include file=$footer}