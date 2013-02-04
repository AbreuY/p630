{include file=$header1 title="Search Advisor"}
{include file=$header2}
<!--/Start::Body/-->

<div id="WrapperOtr">
  <div id="Pageholder">
    	<div class="search_page_otr">
        	<div class="srch_otr">
<form action="{$site_path}/search-page" method="post">        
        <div class="srch_in_one">
          <input width="140" type="text" name="srch" id="srch" class="searchbox" size="20" value="Search..." onblur="if (this.value=='') this.value='Search...';" onfocus="if (this.value=='Search...') this.value='';">
          <input type="submit" name="Submit" class="go_btn" value="">
        </div>
</form>
      </div>
      
      <div class="front_product_otr">
      
      <div class="edit_menu_start">
              <ul>
                <li> <a class="act_arow2 butt" id="exper_but" href="javascript:void(0);"> Expertise <span>  </span></a> </li>
                <!--<li> <a href="#" class="act_arow2 butt"> Industry</a></li>-->
                <li> <a href="javascript:void(0);" class="act_arow2 butt" id="emp_but"> Employer</a></li>
                <li> <a href="javascript:void(0);" class="act_arow2 butt" id="job_tit_but"> Job Title</a></li>
                <li> <a href="javascript:void(0);" class="act_arow2 butt" id="edu_but"> Education</a></li>
              </ul>
              <div class="sort_by_search">
              <span>Sort : </span>
              	<select>
                	<option>Rating</option>
                    <option>Rating</option>
                    <option>Rating</option>
                    <option>Rating</option>
                </select>
              </div>
            </div>
            <div style="border: solid 1px; margin-top:170px; width:125px; float:left;" id="expr_dis"></div>
            <div style="border: solid 1px; margin-top:170px; width:125px; float:left;" id="emp_dis"></div>
            <div style="border: solid 1px; margin-top:170px; width:125px; float:left;" id="job_dis"></div>
            <div style="border: solid 1px; margin-top:170px; width:125px; float:left;" id="edu_dis"></div>
         
         <!-----------------------------EXPERTISE----------------------------------------------------------------------------------------------------------->
            
<div id="wrapper_out" class="exper all_box" style="display:none;">
  <div class="wrapper_inn">
  <a class="closeDrop" id="close_exper" href="javascript:void(0);"></a>
    <div class="filter_by_experties">Filter by Experties </div>
  <!--*-->
      <div class="list_sub">
      <h4>
          <div class="circle bgcolor">
          <span>1</span>
          </div>
      Select a
      <u>Category</u>
      :
      </h4>
      
      
      
      <!--<div id="expr">
          	<div id="level_1">
          	{foreach from=$cat item=i}
          		{$i.cat_name}<br />
          	{/foreach}
            </div>
          </div>  -->
      
      
      <ul>
      {foreach from=$cat item=i}
          <li>
            <a href="javascript:void(0);" onmouseover="" class="li catery" data-idd = "{$i.cat_id}">
            	<label class="label"><input type="checkbox" name="expr_check[]" class = "expr_check" value="{$i.cat_name}" data-cat_id="{$i.cat_id}" /></label>
            	{$i.cat_name}
            </a>
            </li>
      {/foreach}
      </ul>
      
      
      </div>
  <!--*-->
  
  <!--*-->
  <div class="list_sub">
  <h4>
  <div class="circle bgcolor">
  <span>2</span>
  </div>
  Choose a 
  <u>Skill:</u>
  :
  </h4>
  
  {foreach from=$cat item=i}
  <ul style="display: none;" class = "skill" id="{$i.cat_id}">
 {foreach from=$cat2[$i.cat_id] item=k}
 
 <li>
  <a href="javascript:void(0);" class="li skl_hvr" data-idd="{$k.cat_id}">
  <label class="label"><input type="checkbox" name="expr_check[]" class = "expr_check" value="{$k.cat_name}" data-cat_id="{$k.cat_id}" /></label>
   {$k.cat_name}
    </a>
  </li>
 {foreachelse}
 <li>Nothing To Display Here</li>
 {/foreach}
 </ul>
 {/foreach}
 
 
  
  </div>
  <!--*-->
  
  <!--*  Expertise skills    -->
  <!--<div class="list_sub">
  <h4>
  <div class="circle bgcolor">
  <span>3</span>
  </div>
  Choose a 
  <u>Specialty:</u>
  :
  </h4>
  
  {foreach from=$cat item=i}
  {foreach from=$cat2[$i.cat_id] item=j}
  <ul style="display: none;" class = "spl" id="{$j.cat_id}">
 {foreach from=$cat3[$j.cat_id] item=k}
 
 <li>
  <a href="javascript:void(0);" class="li">
  <label class="label"><input type="checkbox" name="expr_check[]" class = "expr_check" value="{$k.cat_name}" data-cat_id="{$k.cat_id}"/></label>
   {$k.cat_name}
    </a>
  </li>
 {foreachelse}
 <li>Nothing To Display Here</li>
 {/foreach}
 </ul>
 {/foreach}
 {/foreach}
 
  
  </div>-->
  <!--*-->
  
  
  </div>
</div>
            
            
            
            
            
            
          
         
         <!---------------------------END EXPERTISE------------------------------------------------------------------------------------------------------------->

         <!---------------------------EMPLOYER------------------------------------------------------------------------------------------------------------->
         <div id="wrapper_out" class="emp all_box" style="display: none;">
			<div class="wrapper_inn">
			<a class="closeDrop" href="javascript:void(0);"></a>
			<div class="filter_by_experties">Filter by Employer<!-- : <input name="" type="text" class="txt_medium_div_sec">--></div><!--*-->
			<!--*-->
			<div class="list_sub">
			
			
			{foreach from=$emp item=i}
			<ul>
			  <li>
			  <a href="javascript:void(0);" class="li">
			  <label class="label"><input type="checkbox" name="emp_check[]" class = "emp_check" value="{$i.name}"/></label>
			    {$i.name}
			    </a>
			  </li>  			  
			</ul>
			{/foreach}
			
			</div>
			<!--*-->
			
			</div>
			</div>
         
         
         <!---------------------------END EMPLOYER------------------------------------------------------------------------------------------------------------->
            
		 <!---------------------------Job Title------------------------------------------------------------------------------------------------------------->
         <div id="wrapper_out" class="jt all_box" style="display: none;">
			<div class="wrapper_inn">
			<a class="closeDrop" href="javascript:void(0);"></a>
			<div class="filter_by_experties">Filter by Job Title<!-- : <input name="" type="text" class="txt_medium_div_sec">--></div><!--*-->
			<!--*-->
			<div class="list_sub">
			
			{foreach from=$job item=i}
			<ul>
			  <li>
			  <a href="javascript:void(0);" class="li">
			  <label class="label"><input type="checkbox"  name="job_check[]" class = "job_check" value="{$i.name}" /></label>
			    {$i.name}
			    </a>
			  </li>  			  
			</ul>
			{/foreach}
			
			
			</div>
			<!--*-->
			
			</div>
			</div>
         
         
         <!---------------------------END Job Title------------------------------------------------------------------------------------------------------------->
          
           <!---------------------------Education------------------------------------------------------------------------------------------------------------->
         <div id="wrapper_out" class="edu all_box" style="display: none;">
			<div class="wrapper_inn">
			<a class="closeDrop" href="javascript:void(0);"></a>
			<div class="filter_by_experties">Filter by Education<!-- : <input name="" type="text" class="txt_medium_div_sec">--></div><!--*-->
			<!--*-->
			<div class="list_sub">
			
			{foreach from=$edu item=i}
			<ul>
			  <li>
			  <a href="javascript:void(0);" class="li">
			  <label class="label"><input type="checkbox"  name="edu_check[]" class = "edu_check" value="{$i.name}" /></label>
			    {$i.name}
			    </a>
			  </li>  			  
			</ul>
			{/foreach}
			
			
			</div>
			<!--*-->
			
			</div>
			</div>
         
         
         <!---------------------------END Education------------------------------------------------------------------------------------------------------------->



       <div id="search_res">
       <!----------------------ADVISORS---------------------------------------------------------------------------------------------------->
       <div class="advisor_part1">
      <h1>Advisors</h1>
      
      
          
          {foreach from=$adv item = i}
        <div class="product_cat_main"> <a href="{$site_path}/view-advisor-profile/{$i.advisor_id}">
          <div class="cat_profile_lt">
            <div class="cat_profile_otr">
              <div class="profile_lt"> <img src="{$site_path}front_media/images/advisor_images/180X180px/{$i.image_path}"> </div>
              <div class="profile_rt">
                <div class="profile_rt_titl">{$i.first_name}</div>
                <div class="profile_rt_position">{$i.title} at {$i.employer}</div>
                <div class="profile_rt_rating">
                  <div id="17" style="cursor: default;" title="good"><img class="17" title="good" alt="1" src="{$site_path}front_media/images/star-on.png" id="17-1">&nbsp;<img class="17" title="good" alt="2" src="{$site_path}front_media/images/star-on.png" id="17-2">&nbsp;<img class="17" title="good" alt="3" src="{$site_path}front_media/images/star-on.png" id="17-3">&nbsp;<img class="17" title="good" alt="4" src="{$site_path}front_media/images/star-on.png" id="17-4">&nbsp;<img class="17" title="good" alt="5" src="{$site_path}front_media/images/star-off.png" id="17-5"> </div>
                </div>
              </div>
            </div>
            <div class="profile_time">
              <ul>
                <li>${$i.priceEmailConsulte}/hr<span>|</span></li>
                <li>${$i.priceWebConsulte}<span>|</span></li><!-- class="credit_img" -->
                <li>3 consultatDummy</li>
              </ul>
            </div>
            <div class="profile_head_otr">
              <div class="profile_head_one"> {$i.area_name}  <span>{$i.cat_name}</span> </div>
              <div class="profile_head_two"> {$i.school} - {$i.degree} </div>
            </div>
          </div>
          </a>  </div>
          {/foreach}
          
                  
          </div> 
          <!-------------------------------------------------------------------------------------------------------------------------->
       <div class="product_part1">
          	<h1>Products</h1>
            
											{foreach from=$pro item=i}
                <a href="{$site_path}product-details/{$i.product_id}"><div class="product_one_video">
                	<div class="pro_head"> {$i.name} </div>
                    {if $i.combination eq 'video'}<img src="{$site_path}front_media/images/video-icon.png"  />{/if}
                    			{if $i.combination eq 'videoppt'}<img src="{$site_path}front_media/images/ppt.png"  />{/if}
                                {if $i.combination eq 'audioppt'}<img src="{$site_path}front_media/images/audio.png"  />{/if}
                </div></a>
             {/foreach}            
            
           <!-- <div class="pro_div1"><a href="#"></a></div>
            <div class="pro_div1"><a href="#"></a></div>
            <div class="pro_div1"><a href="#"></a></div>
            <div class="pro_div1"><a href="#"></a></div> -->
          </div>
          <!-- --- ---- -->
       </div>
          
          
      </div>
        
        </div>
  </div>
</div>


<!--/End::Body/-->
{literal}
<script type="text/javascript">
$(document).ready(function(e) {
	
	master_array = Array();
	
	
    $('#close_exper').click(function(e) {
    	$('.butt').removeClass('edit_act_nav1 act_arow1');
        $('.exper').hide();
    });
    $('.closeDrop').click(function(e) {
    	$('.butt').removeClass('edit_act_nav1 act_arow1');
        $('.all_box').hide();
    });
	$('#exper_but').click(function(e) {
		$(this).removeClass('act_arow2');
		$('.butt').removeClass('edit_act_nav1 act_arow1');
		$(this).addClass('edit_act_nav1 act_arow1');
		$('.all_box').hide();
        $('.exper').show();
    });
    $('#emp_but').click(function(e) {
    	$(this).removeClass('act_arow2');
    	$('.butt').removeClass('edit_act_nav1 act_arow1');
		$(this).addClass('edit_act_nav1 act_arow1');
		$('.all_box').hide();
        $('.emp').show();
    }); 
    $('#job_tit_but').click(function(e) {
    	$(this).removeClass('act_arow2');
    	$('.butt').removeClass('edit_act_nav1 act_arow1');
		$(this).addClass('edit_act_nav1 act_arow1');
		$('.all_box').hide();
        $('.jt').show();
    });
    $('#edu_but').click(function(e) {
    	$(this).removeClass('act_arow2');
    	$('.butt').removeClass('edit_act_nav1 act_arow1');
		$(this).addClass('edit_act_nav1 act_arow1');
		$('.all_box').hide();
        $('.edu').show();
    });
    $('.catery').hover(function(e) {
    
		   
        var id = $(this).attr('data-idd');
        $('.skill').hide();
        $('.catery').removeClass('over_effect');
        $(this).addClass('over_effect'); 
        $('#'+id).show();
    });
      $('.skl_hvr').hover(function(e) {
        var id = $(this).attr('data-idd');
        $('.spl').hide();
        $('.skl_hvr').removeClass('over_effect');
        $(this).addClass('over_effect');
        $('#'+id).show();
    });
	
	 $('.expr_check').click(function(e) {
		var name = [];
		var id = [];
		var i = 0;
		var to_echo = "";
		master_array['expr'] = [];
		$("input[name='expr_check[]']:checked").each(function(){name.push($(this).val());id.push($(this).attr('data-cat_id'));});
    	for(i=0; i<name.length; i++){
			//console.log(name[i]);
			to_echo	+= "<div style = 'border: solid 1px;' ><!--<span class = 'x_close'>X &nbsp;</span>-->"+name[i]+"<div>";
			master_array['expr'].push(id[i]);
		}
		$('#expr_dis').html(to_echo);
		//console.log(name);
		//console.log(id);
		change_search_results();
    });
	
	$('.emp_check').click(function(e) {
		var name = [];
		var i = 0;
		var to_echo = "";
		master_array['emp'] = [];
		$("input[name='emp_check[]']:checked").each(function(){name.push($(this).val());});
    	for(i=0; i<name.length; i++){
			//console.log(name[i]);
			to_echo	+= "<div style = 'border: solid 1px;' ><!--<span class = 'x_close'>X &nbsp;</span>-->"+name[i]+"<div>";
			master_array['emp'].push(name[i]);
		}
		$('#emp_dis').html(to_echo);
		//console.log(name);
		//console.log(id);
		change_search_results();
    });
	
	$('.job_check').click(function(e) {
		var name = [];
		var i = 0;
		var to_echo = "";
		master_array['job'] = [];
		$("input[name='job_check[]']:checked").each(function(){name.push($(this).val());});
    	for(i=0; i<name.length; i++){
			//console.log(name[i]);
			to_echo	+= "<div style = 'border: solid 1px;' ><!--<span class = 'x_close'>X &nbsp;</span>-->"+name[i]+"<div>";
			master_array['job'].push(name[i]);
		}
		$('#job_dis').html(to_echo);
		//console.log(name);
		//console.log(id);
		change_search_results();
    });
	
	$('.edu_check').click(function(e) {
		var name = [];
		var i = 0;
		var to_echo = "";
		master_array['edu'] = [];
		$("input[name='edu_check[]']:checked").each(function(){name.push($(this).val());});
    	for(i=0; i<name.length; i++){
			//console.log(name[i]);
			to_echo	+= "<div style = 'border: solid 1px;' ><!--<span class = 'x_close'>X &nbsp;</span>-->"+name[i]+"<div>";
			master_array['edu'].push(name[i]);
		}
		$('#edu_dis').html(to_echo);
		//console.log(name);
		//console.log(id);
		change_search_results();
    });
    
});

	$('#srch').keyup(function(e) {
		console.log($('#srch').val());
		change_search_results();
    });

function change_search_results(){

	var expr = JSON.stringify(master_array['expr']);
	var edu = JSON.stringify(master_array['edu']);
	var emp = JSON.stringify(master_array['emp']);
	var job = JSON.stringify(master_array['job']);
	var txt = $('#srch').val();
	

	$.post('ajax/search_result.php', {'expr': expr, 'edu': edu, 'emp': emp, 'job': job, 'txt': txt}, function(data){
		$('#search_res').html(data);
	});
}

</script>
{/literal}

{include file=$footer}
