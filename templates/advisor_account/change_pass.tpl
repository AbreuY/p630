{include file=$header1 title="Advisor Dashboard"}
<script src="{$site_path}front_media/js/jquery.validate.js" type="text/javascript"></script>
<style type="text/css">
.error{
	color: red;
}
</style>
{include file=$header2}
<!--/Start::Body/-->
<div id="WrapperOtr">
  <div id="Pageholder">
    {*--/Start::Msg/--*} {$msg}  {*--/End::Msg/--*}
    <div class="about_page_otr">
      
      <h1>Advisor Account</h1>
      <div class="line_divider"></div>
      
      <div class="abt_main_otr">
      {assign value="abt_active" var=abt_active10}
        {include file=$advisorLeftMenu}
        
        <div class="user_dash_right_part change_pass_page">
        <div class="session_heading_titl">Change my password</div>
        
	        <form name="change_pass" id="change_pass"  method="post" 
            action="{$site_path}advisor_account/change_pass_action.php">
            <input type="hidden" name="advisor_id" id="advisor_id" value="{$advisor_id}"/>
            <div class="personal_info_otr">
				
                    <div class="personal_info_box ">
                        <div class="work_exp_otr">
                        <div class="fld_otr"> This is the password you use to access this control panel.</div>
                          <div class="fld_otr"> 	 	
                            <label for="login">Current Password :</label>
                            <input type="password" name="old_pass" id="old_pass" value="">
                             <input type="hidden" name="chek_pass" id="check_pass" value="{$check_pass}"> 
                          </div>
                          <div class="fld_otr">
                            <label for="login"> New Password :</label>
                            <input type="password" name="new_pass" id="new_pass" value="">
                          </div>
                          
                          
                          <div class="fld_otr">
                            <label for="login"> Confirm Password :</label>
                            <input type="password" name="c_pass" id="c_pass"  value="">
                          </div>
                          
                    
                  <div align="center" class="fld_otr">
                    <input type="submit" name="submit" id="submit" value="Change Password">
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
<script src="{$site_path}front_media/js/gurubul.js" type="text/javascript"></script>
<script src="{$site_path}front_media/js/advisor_account/change_pass.js" type="text/javascript"></script> 
{include file=$footer}