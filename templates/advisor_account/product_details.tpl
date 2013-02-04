{include file=$header1 title="Advisor Dashboard"}
{include file=$header2}
<!--/Start::Body/-->

<div id="WrapperOtr">
  <div id="Pageholder">
    <div class="product_details_page_caroline">
      <div class="video_completd_otr">
        <div class="video_text">{$ProArr['name']}</div>
        <div class="video_img"><img src="{$site_path}/front_media/images/video_img.png" width="340" height="164"></div>
        <div class="description_otr">
          <div class="left_inn_text">Product Description&nbsp;:</div>
          <div class="right_inn_text">{$ProArr['description']}</div>
        </div>
        <!--*-->
        
        <div class="description_otr">
          <div class="left_inn_text">Rating&nbsp;:</div>
          <div class="right_inn_text"><img src="{$site_path}/front_media/images/rating_img.png" width="101" height="20"></div>
        </div>
        
        <!--*-->
        <div class="description_otr">
          <div class="left_inn_text">Price&nbsp;:</div>
          <div class="right_inn_text">{if $ProArr['type'] eq "free"}This is a Free product.{else}${$ProArr['price']}{/if}</div>
        </div>
        <!--*-->
        <div class="fld_otr" style="width:100%; text-align:center; margin:10px 0;">
          <input type="submit" name="" id="" value="Buy now">
        </div>
      </div>
    </div>
  </div>
</div>


<!--/End::Body/-->
{include file=$footer}