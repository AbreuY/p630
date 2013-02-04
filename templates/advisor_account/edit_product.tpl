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
      <div class="abt_main_otr"> {assign value="abt_active" var=abt_active6}
        {include file=$advisorLeftMenu}
        <div class="ad_own_product_page">
        <div class="session_heading_titl">View Products</div>
        <form name="createProductForm" id="createProductForm" method="post" action="{$site_path}advisor_account/edit_product_action.php?pid={$ProArr['product_id']}"  enctype="multipart/form-data">
          <div class="preference_box_paypal">
            <div class="notifi_head">Edit product</div>
            <div class="fld_otr">
              <label for="login"> Title :</label>
              <input type="text" name="name" id="name" value="{$ProArr['name']}">
            </div>
            <div class="fld_otr">
              <label for="login"> Category:</label>
              <select id = "category" name="category[]" multiple="multiple">
                <!--<option value="">--Select a category--</option>-->
                {foreach from=$category item=cat}
                <option value="{$cat.cat_id}"{if in_array($cat.cat_id, $ProCatArr)} selected="selected" {/if}>{$cat.cat_name}</option>
                {/foreach} 
              </select>
              <div id="cats">
              {if $chk_2}
                <label for="login">&nbsp;</label>
              <select id = "cat_2" name="category_2[]" multiple="multiple">
                <!--<option value="">--Select a sub-category--</option>-->
                {foreach from=$category2 item=cat2}
                <option value="{$cat2.cat_id}"{if  in_array($cat2.cat_id, $ProCatArr)} selected="selected" {/if}>{$cat2.cat_name}</option>
                {/foreach} 
              </select>
              {/if}
              </div>
              <!--<div id="cats"></div>-->
            </div>
            <div class="fld_otr">
              <label for="login"> Description :</label>
              <textarea name="description" id="description" style="height:154px;width:322px;">{$ProArr['description']}</textarea>
            </div>
            <div class="fld_otr">
              <label for="login"> Allowed product combination :</label>
              <div class="chk_name">
                <!-- <input type="radio" name="combination" value="video" > -->
                <span>Video(only 1 video file)</span> </div>
              <div class="chk_name">
                <!-- <input type="radio" name="combination" value="videoppt"> -->
                <span>Video(only 1 video file) and PPT(only 1 ppt file) </span> </div>
              <div class="chk_name">
               <!-- <input type="radio" name="combination" value="audioppt"> -->
                <span>Audio(only 1 audio file) and PPT(only 1 ppt file) </span> </div>
            </div>
            <div class="fld_otr">
              <label for="login"> Product type:</label>
              <select name="type" id="type">
                <option value="paid" {if $ProArr['type'] eq "paid"} selected="selected" {/if}>Available for purchased</option>
                <option value="free" {if $ProArr['type'] eq "free"} selected="selected" {/if}>Available for free</option>
              </select>
            </div>
            
            <div class="fld_otr" id="price_box" {if $ProArr['type'] eq "free"} style="display:none;" {/if}>
              <label for="login"> Price :</label>
              <input type="text" name="price" id="price" value="{$ProArr['price']}">
            </div>
            
            
            <!----------------------------------------------------------------------------------------------------------------------------->
            
            <div class="fld_otr">
              <label for="login"> &nbsp;</label>
              <div class="chk_name">
                <div style="border:solid; width:120px;"><a href="javascript:void(0);" id="add_from_existing_file" style="color:#666666;">&nbsp;&nbsp;&nbsp;Show/Hide Files</a></div>
              </div>
            </div>
            
            <!----------------------------------------------------------------------------------------------------------------------------->
            
            <div class="manage_file_page" style="width:647px; display:none;">
              <div class="edit_menu_start" style="width:647px;">
                <ul>
                  <li style="width:128px;">
                  <a href="javascript:void(0);" onclick="file_menu(this)" data-menu = "photo" id="m_photo" class="edit_act_nav1"> Photo</a></li>
                  <li style="width:128px;"><a href="javascript:void(0);" onclick="file_menu(this)" data-menu = "video" id="m_video"> Video</a></li>
                  <li style="width:128px;"><a href="javascript:void(0);" onclick="file_menu(this)" data-menu = "audio" id="m_audio"> Audio</a></li>
                  <li style="width:128px;"><a href="javascript:void(0);" onclick="file_menu(this)" data-menu = "micro" id="m_micro"> Microsoft</a></li>
                  <li style="width:128px;"><a href="javascript:void(0);" onclick="file_menu(this)" data-menu = "pdf"  id="m_pdf"> PDF</a></li>
                </ul>
              </div>
              
              <div class="devide_R" style="width:647px;">
                <table id="photo" class="tbl_myorder">
                  <tbody>
                    <tr>
                      <th>Select</th>
                      <th>Image Name</th>
                      <!--<th>Thumbnail</th>-->
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                  {foreach from=$files['photo'] key=k item=i}
                  <tr>
                    <td><input type="checkbox" name="check_file[]" value="{$i.file_id}" {if $i.check} checked="checked" {/if} /></td>
                    <td>{$i.name}</td>
                    <!-- <td><img src="{$sitepath}front_media/product_files/180X180px/{$i.location}"></td>-->
                    <td>{$i.size}MB</td>
                    <td>{$i.format}</td>
                  </tr>
                  {foreachelse}
                  <tr>
                    <td colspan="4">No Records Found.</td>
                  </tr>
                  {/foreach}
                    </tbody>
                  
                </table>
                <table id="video" class="tbl_myorder" style="display:none;">
                  <tbody>
                    <tr>
                      <th>Select</th>
                      <th>Video Clip Name</th>
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                  {foreach from=$files['video'] key=k item=i}
                  <tr>
                    <td><input type="checkbox" name="check_file[]" value="{$i.file_id}" {if $i.check} checked="checked" {/if} /></td>
                    <td>{$i.name}</td>
                    <td>{$i.size}MB</td>
                    <td>{$i.format}</td>
                  </tr>
                  {foreachelse}
                  <tr>
                    <td colspan="4">No Records Found.</td>
                  </tr>
                  {/foreach}
                    </tbody>
                  
                </table>
                <table id="audio" class="tbl_myorder" style="display:none;">
                  <tbody>
                    <tr>
                      <th>Select</th>
                      <th>Audio Clip Name</th>
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                  {foreach from=$files['audio'] key=k item=i}
                  <tr>
                    <td><input type="checkbox" name="check_file[]" value="{$i.file_id}" {if $i.check} checked="checked" {/if} /></td>
                    <td>{$i.name}</td>
                    <td>{$i.size}MB</td>
                    <td>{$i.format}</td>
                  </tr>
                  {foreachelse}
                  <tr>
                    <td colspan="4">No Records Found.</td>
                  </tr>
                  {/foreach}
                    </tbody>
                  
                </table>
                <table id="micro" class="tbl_myorder" style="display:none;">
                  <tbody>
                    <tr>
                      <th>Select</th>
                      <th>Document Name</th>
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                  {foreach from=$files['micro'] key=k item=i}
                  <tr>
                    <td><input type="checkbox" name="check_file[]" value="{$i.file_id}" {if $i.check} checked="checked" {/if} /></td>
                    <td>{$i.name}</td>
                    <td>{$i.size}MB</td>
                    <td>{$i.format}</td>
                  </tr>
                  {foreachelse}
                  <tr>
                    <td colspan="4">No Records Found.</td>
                  </tr>
                  {/foreach}
                    </tbody>
                  
                </table>
                <table id="pdf" class="tbl_myorder" style="display:none;">
                  <tbody>
                    <tr>
                      <th>Select</th>
                      <th>File Name</th>
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                  {foreach from=$files['pdf'] key=k item=i}
                  <tr>
                    <td><input type="checkbox" name="check_file[]" value="{$i.file_id}" {if $i.check} checked="checked" {/if} /></td>
                    <td>{$i.name}</td>
                    <td>{$i.size}MB</td>
                    <td>{$i.format}</td>
                  </tr>
                  {foreachelse}
                  <tr>
                    <td colspan="4">No Records Found.</td>
                  </tr>
                  {/foreach}
                    </tbody>
                  
                </table>
                <div class="spcer"></div>
              </div>
            </div>
            
            <!----------------------------------------------------------------------------------------------------------------------------->
            
            <!----------------------------------------------------------------------------------------------------------------------------->
            
            
            <div class="fld_otr">
              <div class="login_btn">
                <input type="submit" value="Save changes" id="product_sub" name="text">
              </div>
            </div>
          </div>
          </form>
          </div>
      </div>
    </div>
  </div>
</div>
<!--/End::Body/--> 
{literal} 
<script>
$(document).ready(function(e) {
    $("#category").change(function(){
			$.ajax({
				url: "../ajax/product_cat_select.php?id="+$(this).val(),
				success: function(data){
					$("#cats").html(data);
				}
			});//end ajax
	});//end change
	
	$("#type").change(function(){
		if($(this).val() == "free"){
			$("#price_box").fadeOut();
		}
		else{
			$("#price_box").fadeIn();
		}
	});
	
	$("#add_from_existing_file").click(function(){
				$(".manage_file_page").toggle();
	});
	
	$('#msg_close').click(function(){
			$('#user_interface_msg').slideUp();
	});
	
	
});

function file_menu(obj){
	$('#m_photo').removeClass("edit_act_nav1");
	$('#m_audio').removeClass("edit_act_nav1");
	$('#m_video').removeClass("edit_act_nav1");
	$('#m_micro').removeClass("edit_act_nav1");
	$('#m_pdf').removeClass("edit_act_nav1");
	$('#'+$(obj).attr('id')).addClass("edit_act_nav1");
	$("#photo").hide();
	$("#video").hide();
	$("#audio").hide();
	$("#micro").hide();
	$("#pdf").hide();
	$('#'+$(obj).attr('data-menu')).show();
}
</script> 
{/literal}
<script type="text/javascript" src="{$site_path}front_media/js/advisor_account/advisor_edit_product.js"></script>
{include file=$footer}
