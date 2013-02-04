{include file=$header1 title="Advisor Dashboard"}
{include file=$header2}
<!--/Start::Body/-->

<div id="WrapperOtr">
  <div id="Pageholder">
    <div class="about_page_otr">
      <h1>User Account</h1>
      <div class="line_divider"></div>
      <div class="abt_main_otr">
        {assign value="abt_active" var=abt_active5}
        {include file=$userLeftMenu}
        <div class="session_deails1">
          <div class="pending_req">
            <div class="pending_req_head"> Consultation with Advisor {$adv['first_name']} </div>
            <ul>
              <!--<li> <span>Scheduled for</span> : Not yet scheduled </li>
              <li> <span>Scheduled for</span> : Not yet scheduled </li>-->
              <li> <span>Subject </span> :  {$webcam['subject']} </li>
              <li> <span>Duration</span> : {$webcam['duration']} hour(s) </li>
              <li> <span>Description</span> :-<div> {$webcam['description']} </div></li>
              <!--<li><span> Metting time </span>: Not yet scheduled </li>-->
               {if $files neq ''}
              <li> 
              		<span>Attached Files</span>: <br />
                    <div style="margin-left:120px; float:left;width:100%;">
                    	{foreach from=$files item=i}
                         {$i.indx}].&nbsp;{$i.name}.{$i.format}
                         &nbsp;&nbsp;&nbsp;&nbsp;
                         <a href="{$site_path}dwnldwebcamconsulteattchfile/{$i.webcam_file_id|base64_encode}">Download</a>
                         <br />
                        {/foreach}
                    </div>
                    
	          </li>
            {/if}	  
            </ul>
            
            <!--<div class="fld_otr">
            	<input type="submit" name="" value="Cancel decline metting">
            	<input type="submit" name="" value="Rescheduled">
            </div>-->
          </div>
          <div class="pending_req">
            <div class="edit_menu_start2">
          	<ul>
              <li> <a href="#"> Accept </a></li>
              <li> <a href="#" class="edit_act_nav1"> Payment</a></li>
              <li> <a href="#"> Answer</a></li>
              <li> <a href="#"> Feedback</a></li>
              <li> <a href="#"> Finished</a></li>
             </ul>
             </div>
             
          <div class="session_heading">
          The ball is in the your court. The Advisor is waiting to receive payment from the your side.
         </div>
            <div class="session_heading">YOUR PAYMENT DETAILS -</div>
            <div class="pending_req_head">Agreed Time --- {$webcam['date']}(GMT {if $webcam['user_offset'] gt -1} +{/if}{$webcam['user_offset']} hrs)</div>
            <div class="pending_req_head">Webcam Session Duratiom --- {$webcam['duration']} hrs</div>
            <div class="pending_req_head">Webcam Session Total Cost --- ${$webcam['cost']}</div>
			<br /><br /><br />
            <ul class="agree_time">
              <li><input type="submit" value="Pay" name=""></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--/End::Body/-->
{include file=$footer}