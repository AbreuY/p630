{include file=$header1 title=UserDashBoard} 
<script src="front_media/js/jquery.validate.js" type="text/javascript"></script>
<style type="text/css">
.error{
	color: red;
}

</style>
{include file=$header2} 
<!--/Start::Body/-->

<div id="WrapperOtr">
  <div id="Pageholder"> {*--/Start::Msg/--*} {$msg}  {*--/End::Msg/--*}
    <div class="about_page_otr">
      <h1>User Account</h1>
      <div class="line_divider"></div>
      <div class="abt_main_otr">
        {assign value="abt_active" var=abt_active3}
        {include file=$userLeftMenu}
        <div class="add_gur_edit">
          <div class="preference_box_paypal">
            <div class="notifi_head">Edit Your Profile</div>
             <form action="user_account/user_edit_profile_action.php" method="post" id="update_form" enctype="multipart/form-data">
            <div class="profile_upload_img_box">
            
            <div class="profile_upload_img_box" >
                  <div class="profile_img">
                  	 {if {$image_path} neq ''}
	                    <img id="profilePhotoImg" src="{$site_path}front_media/images/user_images/180X180px/{$image_path}"/>
                    {else}
    	                <img id="profilePhotoImg" src="{$site_path}front_media/images/user_images/user-blank-image.png"  
        	            width="180" height="180"/>
                    {/if}
                    <a href="javascript:void(0);" id="changePhotoUser">change photo</a>
                    <input type="hidden" id="user_id" name="user_id" value="{$user_id}"/>	
                    <input type="hidden" id="profilePhoto" name="profilePhoto" size="12"/> 
                    <input type="hidden" name="old_image_path" id="old_image_path" value="{$image_path}"/>
                  </div>
                </div>
            
            
            
                  <!--<div class="profile_img"> <a href="#"> {if $image_path eq ""}<img src="{$site_path}front_media/images/user_images/user-blank-image.png" alt="user" title="">{/if}{if $image_path neq ""}<img src="{$site_path}front_media/images/user_images/180X180px/{$image_path}" alt="user" title=""> {/if}
                  	<input type="file" name="profilePhoto" size="5" /> </a>
                    <input type="hidden" name="old_image_path" value="{$image_path}" />
                  </div>-->
                </div>
              <div class="fld_otr">
                <label for="login"> Name  :</label>
                <input type="text" name="name" id="name" value="{$username}">
              </div>
              <div class="fld_otr">
                <label for="login"> Email  :</label>
                <input type="text" name="email" id="email" value="{$email}">
                <input type="hidden" name="oemail" id="oemail" value="{$email}">
              </div>
              <div class="fld_otr">
                <label for="login"> Bank code :</label>
                <input type="text" name="bank_code" id="bank_code" value="{$bank}">
              </div>
              <div class="fld_otr">
                <label for="login"> Branch code :</label>
                <input type="text" name="branch_code" id="branch_code" value="{$branch}">
              </div>
              <div class="fld_otr">
                <label for="login"> IBAN number :</label>
                <input type="text" name="iban_no" id="iban_no" value="{$iban}">
              </div>
           
              <div id="change_pass" style="display:none;" >
                <div class="fld_otr">
                  <label for="login"> Old Password :</label>
                  <input type="password" name="old_pass" id="old_pass">
                  <input type="hidden" name="old_pass_c" id="old_pass_c" value="{$pass}">
                </div>
                <div class="fld_otr">
                  <label for="login"> New Password :</label>
                  <input type="password" name="new_pass" id="new_pass">
                </div>
                <div class="fld_otr">
                  <label for="login"> Confirm Password :</label>
                  <input type="password" name="c_pass" id="c_pass">
                </div>
              </div>
              <div class="fld_otr">
                <div class="login_btn">
                  <input type="checkbox" name="change_pass_check" id="change_pass_check">
                  <label>Change password </label>
                </div>
              </div>
              <div class="fld_otr">
                <div class="login_btn">
                  <input type="submit" value="Save changes" name="update" id="update">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="script"> 
  <script src="{$site_path}front_media/js/user_account/user_edit_validate.js" type="text/javascript"></script> 
  <script src="{$site_path}front_media/js/gurubul.js" type="text/javascript"></script> 
  <script type="text/javascript" src="{$site_path}front_media/js/lightbox/popup.js"></script>
<script type="text/javascript" src="{$site_path}front_media/js/lightbox/user_thickbox.js"></script>
<link rel="stylesheet" href="{$site_path}front_media/js/lightbox/css/thickbox.css" type="text/css" media="screen" />
</div>

<!--/End::Body/--> 
{include file=$footer}