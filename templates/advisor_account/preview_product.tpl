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
    <div class="about_page_otr">
      <h1>Advisor Account</h1>
      <div class="line_divider"></div>
      <div class="abt_main_otr">  {assign value="abt_active" var=abt_active5}
        {include file=$advisorLeftMenu}
        <div class="advisor_dash_right_part">
          <div class="preview_product_page">
          		<div class="session_heading">Product Preview </div>
                    <div class="session_req_left">
                    <div class="session_req_lef_head">
                    	Video Presentation
                    </div>
                     <div class="video_img">
                     <div class="video_img2">
                     	<img src="{$site_path}front_media/images/video_img2.png">
                      </div>
                      <div class="video_img2">
                     	<img src="{$site_path}front_media/images/video_img2.png">
                      </div>
                      
                     </div>
                     
                     <div class="video_img"><img width="340" height="164" src="{$site_path}front_media/images/video_img.png"></div>
                     <form action="../advisor_account/preview_product_action.php"  id="createProductForm" method="post">
                     <div class="fld_otr">
                    {if $paid eq "paid"}<label for="login"> Set Price </label>
                    <input type="text" id="price" name="price">{/if}
                    <input type="hidden" id="pid" name="pid" value="{$pid}">
                  </div>
                  
                  <div style="width:100%; text-align:center; margin:10px 0;" class="fld_otr">
                    <input type="submit" value="Confirm product"  id="product_sub" name="">
                </div>
                </form>
                    </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="{$site_path}front_media/js/advisor_account/advisor_edit_product.js"></script>
{include file=$footer}
