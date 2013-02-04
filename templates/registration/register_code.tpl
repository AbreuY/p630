{include file=$header1 title="Verify Advisor Account Email"}
<script src="{$site_path}front_media/js/jquery.validate.js" type="text/javascript"></script>
<script src="{$site_path}front_media/js/jquery.livequery.js" type="text/javascript"></script>

{include file=$header2}
<!--/Start::Body/-->
<div id="WrapperOtr">
  <div id="Pageholder">
    {*--/Start::Msg/--*} {$msg}  {*--/End::Msg/--*}
    <div class="registration_as_advisor">
      <h1>Verify Advisor Account Email</h1>
      <div class="line_divider"></div>
      
      <div class="registration_advisor_inner">
      <form action="registration/verify_account_email_action.php" method="post" id="verifyAccountEmail" name="verifyAccountEmail">
        <div class="login_box">
          <div class="adviosr_heading">Welcome!</div>
          <div style="margin-bottom:14px;">Thank you for applying to be an expert with us. Begin your registration process by filling out the following.</div>
          <div style="margin-bottom:14px;">You will need a registration code to register. If you do not have one yet, please apply <a href="{$site_path}register-as-advisor-linkedin">here</a>.</div>

          <div class="fld_otr">
            <label for="login"> First Name</label>
            <input type="text" name="fname" id="fname" autocomplete="off">
          </div>
          <div class="fld_otr">
            <label for="login"> Last Name</label>
            <input type="text" name="lname" id="lname" autocomplete="off">
          </div>
          
          <div class="fld_otr">
            <label for="login"> Email address</label>
            <input type="text" name="email" id="email" autocomplete="off">
          </div>
          
          <div class="fld_otr">
            <label for="login">Password</label>
            <input type="password" name="pass" id="pass" autocomplete="off">
          </div>
          
          <div class="fld_otr">
            <label for="login"> Confirm Password</label>
            <input type="password" name="cpass" id="cpass" autocomplete="off">
          </div>
		 
          <div class="fld_otr">
            <label for="login"> Registration code: </label>
            <input type="text" name="registrationCode" id="registrationCode" autocomplete="off">
          </div>
          <div class="fld_otr">
            <span> By clicking the button below, you are agreeing to our <a href="{$site_path}terms-of-service" target="_blank">Terms and Service</a>. </span>

          </div>
          
          <div class="fld_otr0">
            <div class="login_btn">
              <input type="submit" name="submit" id="register" value="Verify Account Email">
               </div>
          </div>
        </div>
        </form>
        <div class="drop_shadwo2"></div>
      </div>
      
      
    </div>
  </div>
</div>
<!--/End::Body/-->
<!--/Start::JS/-->
<div id="javaScript">
<script type="text/javascript" src="{$site_path}front_media/js/registration/register_code.js"></script>
<script type="text/javascript" src="{$site_path}front_media/js/gurubul.js"></script>
</div>
<!--/End::JS/-->
{include file=$footer}