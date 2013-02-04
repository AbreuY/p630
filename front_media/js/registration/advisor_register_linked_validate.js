$(document).ready(function() {

	jQuery.validator.addMethod("arrEqualTo", function(value, element, param) {
        for (x in param)
			if(value.indexOf(param[x]) > -1) return true;
		return false;
    }, "This has to be different...");

	/*$("#register").click(function(){*/
		$("#linked_action").validate({
			rules: {
				email: {
					required: true,
					email: true,
					remote: 'front_media/js/registration/advisor_email_validate.php'
				},
				linkd: {
					required: true,
					arrEqualTo:['linkedin.com/pub/','linkedin.com/in/'],
					remote: 'front_media/js/registration/advisor_linked_validate.php'
				}
			},
			messages: {
				email: {
					required: "Please enter a email address.",
					email: "Please enter a valid email address.",
					remote: "Email address already exist."
				},
				linkd: {
					required: "Please enter your linkedin public profile link.",
					arrEqualTo:"Enter a vaild linkedin public profile link",
					remote: "This profile is already registered with us"
				}
			}
		});
	/*});*/

});