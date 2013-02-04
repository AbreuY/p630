{include file=$header1 title=Login}
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
  	{*--/Start::Msg/--*}	{$msg}  {*--/End::Msg/--*}	
    <div class="login_page_otr">
    <h1>Log In</h1>    
    <div class="line_divider"></div>

      <div class="login_inner">
        <!--<div class="login_title">Log in as </div>-->
        <div class="login_box">
		<form action="log_in/login_action.php" method="post" id="log_form">
		<div id="log_box">
		  <div class="fld_otr2">
            <input type="radio" name="user_advisor" id="user_advisor" value="user" checked="checked">
            <label> Service Seeker</label>
          </div>
          <div class="fld_otr2">
            <input type="radio" name="user_advisor" id="user_advisor" value="advisor">
            <label> Advisor</label>
          </div>
          <div class="fld_otr">
            <label for="login"> Email address</label>
            <input type="text" name="email" id="email">
          </div>
          <div class="fld_otr">
            <label for="login">Password</label>
            <input type="password" name="pass" id="pass">
          </div>
          <div class="fld_otr">
            <div class="login_btn">
              <input type="submit" value="Log in" name="login_but" id="login_but">
              <a href="javascript:void(0);" onclick="onForgotClick();">Forgot password ?</a> </div>
          </div>
		  </div>
          </form>
		  <form id="forgot_form" action="log_in/forgot_action.php" method="post">
          <div id="forgot_box" class="fld_otr_forgot" style="display:none;">
            <label for="login">Enter your email address</label>
            <input type="text" name="femail" id="femail">
            <div class="login_btn">
              <input type="submit" value="Submit" name="forgot_but" id="forgot_but">
            </div>
          </div>
		  </form>
        </div>
        <div class="drop_shadwo"></div>
      </div>
    </div>
  </div>
</div>
<!--/End::Body/-->
<div id="script">
<!--Validations User and advisor-->
<script src="{$site_path}front_media/js/login/user_advisor_login_validate.js" type="text/javascript"></script>
<script src="{$site_path}front_media/js/gurubul.js" type="text/javascript"></script>
<script src="{$site_path}front_media/js/login/forgot_validate.js" type="text/javascript"></script>
</div>
{include file=$footer}