{include file=$header1 title="Register As Advisor"}
<script src="front_media/js/jquery.validate.js" type="text/javascript"></script>
<style type="text/css">
.error{
	color: red;
}
</style>
{include file=$header2}
<!--/Start::Body/-->
<div id="WrapperOtr">
  <div id="Pageholder">
    <div class="registration_as_user">
      <h1>Register as advisor via Linkedin</h1>
      <div class="line_divider"></div>
	  
      <form id="linked_action" method="post" action="registration/register_as_advisor_linked_action.php">
      <div class="login_inner">
        <div class="login_box">
          
          
         
          <div class="fld_otr">
            <label for="login"> Email address</label>
            <input type="text" name="email" id="email" value="">
          </div>
          
          <div class="fld_otr">
            <label for="login">Linkedin public profile</label>
            <input type="text" name="linkd" id="linkd">
          </div>
  
          <div class="fld_otr">
            <div class="login_btn">
              <input type="submit" name="submit" value="Apply Now!" id="register">
               </div>
          </div>
          <div class="otherOptions">
                <a href="{$site_path}register-as-advisor">I don't have a LinkedIn profile »</a><br>
                <a href="{$site_path}register-code">I already have a registration code »</a>
            </div>
        </div>
        <div class="drop_shadwo"></div>
      </div>
      </form>
      
    </div>
  </div>
</div>
<!--/End::Body/-->
<div id="script">
<script src="front_media/js/registration/advisor_register_linked_validate.js" type="text/javascript"></script>
</div>
{include file=$footer}