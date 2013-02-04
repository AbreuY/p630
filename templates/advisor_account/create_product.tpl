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
      <div class="abt_main_otr"> {assign value="abt_active" var=abt_active5}
        {include file=$advisorLeftMenu}
        <div class="user_dash_right_part">{$msg}
        
        <div class="session_heading_titl"> <div class="msg_new_head"> Create Product</div></div>
        
        <div class="ad_own_product_page">
        <form action="advisor_account/create_product_action.php" name="createProductForm" id="createProductForm" method="post" enctype="multipart/form-data">
          <div class="preference_box_paypal">
            <!--<div class="notifi_head">Create your own product</div>-->
            <div class="fld_otr">
              <label for="login"> Title :</label>
              <input type="text" name="name" id="name">
            </div>
            <div class="fld_otr">
              <label for="login"> Category:</label>
              <select id = "category" name="category[]" multiple="multiple">
                <!--<option value="">--Select a category--</option>-->
                {foreach from=$category item=cat}
                <option value="{$cat.cat_id}">{$cat.cat_name}</option>
                {/foreach} 
              </select>
              <div id="cats"></div>
            </div>
            
            <div class="fld_otr">
              <label for="login"> Description :</label>
              <textarea name="description" id="description" style="height:154px;width:322px;"></textarea>
            </div>
            <div class="fld_otr">
              <label for="login"> Product type:</label>
              <select name="type">
                <option value="paid">Available for purchased</option>
                <option value="free">Available for free</option>
              </select>
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
              <label for="login"> Optional Files :</label>
              <div class="chk_name">
                 <span> Word, Excel, PDF and Image Files. </span> </div>
            </div>
            
            
            
            
            <div class="fld_otr">
              <label for="login"> Attach files :</label>
              <div class="chk_name">
                <div id="up_file">
                  <input type="file" name="upload_file[]" multiple="multiple">
                  <br>
                  <br>
                </div>
                <div style="border:solid; width:170px;"><a href="javascript:void(0);" id="add_from_existing_file" style="color:#666666;">&nbsp;Add From Existing files</a></div>
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
                    <td><input type="checkbox" name="check_file[]" value="{$i.file_id}" /></td>
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
                    <td><input type="checkbox" name="check_file[]" value="{$i.file_id}" /></td>
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
                    <td><input type="checkbox" name="check_file[]" value="{$i.file_id}" /></td>
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
                    <td><input type="checkbox" name="check_file[]" value="{$i.file_id}" /></td>
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
                    <td><input type="checkbox" name="check_file[]" value="{$i.file_id}" /></td>
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
            
            <div class="fld_otr">
              <div class="login_btn">
                <input type="submit" id="product_sub" value="Preview product" name="text">
              </div>
            </div>
          </div>
          </form>
          </div>
          
          </div>
          
      </div>
    </div>
  </div>
</div>
<!--/End::Body/--> 
<script type="text/javascript" src="{$site_path}front_media/js/advisor_account/advisor_edit_product.js"></script>
<script src="{$site_path}front_media/js/gurubul.js" type="text/javascript"></script>
{include file=$footer}