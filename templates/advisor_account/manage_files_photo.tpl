{include file=$header1 title="My Profile - Personal Information"}
<style type="text/css">
.error{
	color: red;
}
</style>
{include file=$header2}
<div id="WrapperOtr">
  <div id="Pageholder">
    <div class="about_page_otr">
      <h1>Advisor Account</h1>
      <div class="line_divider"></div>
      <div class="abt_main_otr">
        {assign value="abt_active" var=abt_active4}
        {include file=$advisorLeftMenu}
        <div class="advisor_dash_right_part">{$msg}<div id="mssg"></div>
       	<div class="session_heading_titl">Manages Files</div>
          <div class="manage_file_page">
          <form action="{$site_path}advisor_account/upload_file_action.php" method="post" enctype="multipart/form-data">
         	<div class="fld_otr_brws">
                  <label for="login"> Add file</label>
                  <input type="file" name="uploadFile" >
                  <input type="submit" name="upload" value="Upload">
                </div>
           </form>
          	<div class="edit_menu_start">
              <ul>
                <li> <a href="{$site_path}manage-files-photo" class="edit_act_nav1"> Photo </a></li>
                <li> <a  href="{$site_path}manage-files-video"> Video</a></li>
                <li> <a href="{$site_path}manage-files-audio"> Audio</a></li>
                <li> <a href="{$site_path}manage-files-micro"> Microsoft</a></li>
                <li> <a href="{$site_path}manage-files-pdf"> PDF</a></li>
              </ul>
            </div>
            
            <div class="devide_R">
                    	
                        <table class="tbl_myorder">
                        	<tbody>
                            	<tr>
                              
                                <th>Sr No.</th>
                                <th>Related Product </th>
                                <th>Image Name</th>
                                <th>Thumbnail</th>
                                 <th>Size</th>
                                <th>Format</th>
                                  
                                </tr>
                                
                                
                                
                                
                             {foreach from=$files key=k item=i}
                                <tr>
                                	
                                    <td>{$k+1}</td>
                                    <td><ul class="related_products">{foreach from=$i['products'] item=k}<li>  {$k}</li>{/foreach}</ul></td>
                                    <td><input type="text" id="file_name_{$i.file_id}" value="{$i.name}" /> <button class="change_name" data-fd="{$i.file_id}">Change Name</button> <button class="show_image" data-loc="{$i.location}">Show Image</button></td>
                                    <!--<td>{$i.name}</td>-->
                                    <td><img src="{$sitepath}front_media/product_files/180X180px/{$i.location}"></td>
                                    <td>{$i.size}MB</td>
                                    <td>{$i.format}</td>
                                </tr>
                                {/foreach}
                                
                                
                                
                                
                                
                            </tbody>
                        </table>
                        
                        <div class="spcer"></div>
                </div>
                
                
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <script type="text/javascript" src="{$site_path}front_media/js/lightbox/popup.js"></script>
<script type="text/javascript" src="{$site_path}front_media/js/lightbox/user_thickbox.js"></script>
<link rel="stylesheet" href="{$site_path}front_media/js/lightbox/css/thickbox.css" type="text/css" media="screen" />
<script src="front_media/js/gurubul.js" type="text/javascript"></script>
{include file=$footer}