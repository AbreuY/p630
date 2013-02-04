{include file=$header1 title="My Profile - Personal Information"} 
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
  {$msg}
    <div class="about_page_otr">
      <h1>Advisor Account</h1>
      <div class="line_divider"></div>
      <div class="abt_main_otr">  {assign value="abt_active" var=abt_active6}
        {include file=$advisorLeftMenu}
        <div class="advisor_dash_right_part">
        	<div class="session_heading_titl">View Products</div>        
        <div class="my_purchases" style="margin-top:2px;">
            <div class="session_req_left">
            	{foreach from=$ProArr item=val}
                <div class="session_req_lef_comment">
                	<div class="comment_one"> {$val.name} </div>
                    <div class="comment_two">
                    	<a href="{$site_path}edit-product/{$val.product_id}">Edit</a>
                    	<a href="{$site_path}delete-product/{$val.product_id}">Delete</a>
                    </div>
                </div>
				{foreachelse}
					<div class="session_req_lef_comment">
                	<div class="comment_one"> <strong>No Any! product information to display here!</strong> </div>
                </div>				
                {/foreach}
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="{$site_path}front_media/js/gurubul.js" type="text/javascript"></script>
{include file=$footer}