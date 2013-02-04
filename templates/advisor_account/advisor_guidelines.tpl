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
      <div class="abt_main_otr">
        {assign value="abt_active" var=abt_active9}
        {include file=$advisorLeftMenu}
        <div class="ad_own_product_page">
          <div class="preference_box_paypal">
            <div class="session_heading">Advisor Guidelines</div>
            
            <div class="fld_otr">
              {$content}
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
{include file=$footer}