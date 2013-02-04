<?php 
#RequirFile:
require_once('../pi_classes/commonSetting.php');

#View:
$smarty->display('../templates/header1.tpl');
$smarty->display('../templates/header2.tpl');
?>
<div id="WrapperOtr">
  <div id="Pageholder">
    <div class="registration_as_user">
    <h1>Register as Service Seeker</h1>
      <div class="line_divider"></div>
       <div class="facebook_login_page">
    
    
<!--<iframe allowtransparency="true" frameborder="no" height="600" scrolling="auto" src="http://www.facebook.com/plugins/registration.php?
client_id=	499539660078768&
             redirect_uri=<?=site_path;?>registration/register_as_user_fb_action.php&
fields=[
 {'name':'name'},
 {'name':'email'},
 {'name':'location'},
 {'name':'gender'},
 {'name':'birthday'},
 {'name':'password'},
 {'name':'captcha'}
]"
scrolling="auto"
frameborder="no" 
style="border: none;" 
width="500"
height="600" onvalidate="validate">
</iframe>-->


<div id="fb-root"></div>
<script src="https://connect.facebook.net/en_US/all.js#appId=499539660078768&xfbml=1"></script>

<fb:registration redirect-uri="<?=site_path;?>registration/register_as_user_fb_action.php"
  fields="[
 {'name':'name'},
 {'name':'email'},
 {'name':'location'},
 {'name':'gender'},
 {'name':'birthday'},
 {'name':'password'},
 {'name':'captcha'}
]" 
  width="530">
</fb:registration>


</div>
    </div>
  </div>
</div>
<?php
#View:
$smarty->display('../templates/footer.tpl');
?>

<!--<script>
function validate(form){
if(typeof(form.password) == "undefined")
{
	return {}
}
errors = {};
if (form.password.length < 5) {
	errors.password = "You password must be greater than 5 characters";
}
return errors;
}
</script>-->