{include file=$header1 title="Register As Advisor"}
<script src="{$site_path}front_media/js/jquery.validate.js" type="text/javascript"></script>
<script src="{$site_path}front_media/js/jquery.livequery.js" type="text/javascript"></script>

{include file=$header2}
<!--/Start::Body/-->
<div id="WrapperOtr">
  <div id="Pageholder">
    <div class="registration_as_advisor">
      <h1>Register as Advisor</h1>
      <div class="line_divider"></div>
      
      <div class="registration_advisor_inner">
      <form action="registration/register_as_advisor_action.php" method="post" id="adv_reg">
        <div class="login_box">
	      <h3>Application</h3>
          <div class="space_top">Please fill out the application form below.</div>
          <div class="adviosr_heading">Name</div>
          <div class="fld_otr">
            <label for="login"> First Name</label>
            <input type="text" name="fname" id="fname">
          </div>
          <div class="fld_otr">
            <label for="login"> Last Name</label>
            <input type="text" name="lname" id="lname">
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
            <label for="login"> Confirm Password</label>
            <input type="password" name="cpass" id="cpass">
          </div>
       
          <div class="adviosr_heading2">Experience</div>
          {*Start*}
          <div class="JobExperience">
              <div class="JOB">
                  <div class="fld_otr">
                    <label for="login"> Employer</label>
                    <input type="text" name="employer[]" id="employer">
                  </div>
                  
                  <div class="fld_otr">
                    <label for="login"> Tile/Position</label>
                    <input type="text" name="titlePosition[]" id="titlePosition">
                  </div>
                  
                  <div class="fld_otr">
                    <label for="login"> Dates</label>
                    <select  name="monthFrom[]" id="monthFrom">
                        <option value="jan">Jan</option>
                        <option value="feb">Feb</option>
                        <option value="mar">Mar</option>
                        <option value="apr">Apr</option>
                        <option value="may">May</option>
                        <option value="jun">Jun</option>
                        <option value="jul">Jul</option>
                        <option value="aug">Aug</option>
                        <option value="sep">Sep</option>
                        <option value="oct">Oct</option>
                        <option value="nov">Nov</option>
                        <option value="dec">Dec</option>
                        </select>
                        <input width="140" type="text" class="date_inpt" id="yearFrom" name="yearFrom[]" value="YYYY" size="20" 
                        onFocus="if (this.value=='YYYY') this.value='';" onBlur="if (this.value=='') this.value='YYYY';">   
                    <font>TO</font>
                    <select  name="monthTo[]" id="monthTo">
                       <option value="jan">Jan</option>
                        <option value="feb">Feb</option>
                        <option value="mar">Mar</option>
                        <option value="apr">Apr</option>
                        <option value="may">May</option>
                        <option value="jun">Jun</option>
                        <option value="jul">Jul</option>
                        <option value="aug">Aug</option>
                        <option value="sep">Sep</option>
                        <option value="oct">Oct</option>
                        <option value="nov">Nov</option>
                        <option value="dec">Dec</option>
                        </select>
                        <input width="140" type="text" class="date_inpt" id="yearTo" name="yearTo[]" value="YYYY" size="20" 
                        onFocus="if (this.value=='YYYY') this.value='';" onBlur="if (this.value=='') this.value='YYYY';">
                  </div>
              </div>
                  <input type="button" name="addJob" id="addJob" value="Add another job">
          </div>
          {*End*}
          <div class="adviosr_heading2">Education</div>
          {*Start*}
          <div class="AddEducation">
          	<div class="Edu1">
                  <div class="fld_otr">
                    <label for="login"> University</label>
                    <input type="text" name="university[]" id="university">
                  </div>
                  
                  <div class="fld_otr">
                    <label for="login"> Degree</label>
                    <input type="text" name="degree[]" id="degree">
                  </div>
            </div>
             <input type="button" name="bttnAddEdut" id="bttnAddEdut" value="Add another school">
          </div>
          {*End::*}
          <div class="adviosr_heading2">Qualifications</div>
          <div class="fld_otr">
            <span> Briefly, what areas would you be able to advise on and Why? </span>
            <textarea name="qual"></textarea>
          </div>
          
          <div class="fld_otr">
            <span> Captcha <strong>(click on image to reload)</strong></span>
           	<div class="cptcha_img"  id="cptcha_img"> <img src="{$captchaimg}" width="226" height="100"></div>
           <input width="140" type="text" name="captchaword" id="captchaword" class="cpt_cls" size="20" value="Type the words here.." onBlur="if (this.value=='') this.value='Type the words here..';" onFocus="if (this.value=='Type the words here..') this.value='';">
          </div>
          
          <div class="fld_otr0">
                            <div class="check_forgot_box">
                            <input type="checkbox" name="tnc" id="tnc">
                             <span>I agree the <a href="{$site_path}terms-of-service" target="_blank">Terms and Service</a></span>
                            
                            </div>
                        </div>
          
          <div class="fld_otr0">
            <div class="login_btn">
              <input type="submit" name="submit" id="register" value="Apply as advisor">
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
<script type="text/javascript" src="{$site_path}front_media/js/registration/advisor_register_validate.js"></script>
<script type="text/javascript" src="{$site_path}front_media/js/gurubul.js"></script>
{literal}
<script>
$(document).ready(function(e) {
    $('#cptcha_img').click(function(){
	
		jQuery.ajax({
			url: "ajax/ajax_captcha.php",	
			success:function(msg){
				$('#cptcha_img').html(msg);
			}
		});

	});
});
</script>
{/literal}
</div>
<!--/End::JS/-->
{include file=$footer}