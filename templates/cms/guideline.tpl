{include file=$header1 title="Guidelines"}
{include file=$header2}
<!--/Start::Body/-->
<div id="WrapperOtr">
  <div id="Pageholder">
    <div class="about_page_otr">
      
      <h1>Guidelines</h1>
      <div class="line_divider"></div>
      
      <div class="abt_main_otr">
      	<div class="about_left_category">
        	<ul>
            	<li > <a href="javascript:void(0);" id="vd" class="abt_active">Videos</a></li>
                <li > <a href="javascript:void(0);" id="rs">Recommended Software</a></li>
                <li > <a href="javascript:void(0);" id="p3">Page 3</a></li>
            </ul>
        </div>
        
        <div class="about_right_part" id="content">
        	{$content}
        </div>		
		
      </div>
    </div>
  </div>
</div>

<div id="script">
<script src="front_media/js/cms/guideline.js" type="text/javascript"></script>
{literal}
<script type="text/javascript">
$(document).ready(function() {
	$("#abouthead").removeClass("navi_act");
	$("#guidehead").addClass("navi_act");
	$("#loginhead").removeClass("navi_act");
	$("#reghead").removeClass("navi_act");
});
</script>
{/literal}
</div>
<!--/End::Body/-->
{include file=$footer}