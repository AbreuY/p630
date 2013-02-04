// REGISTRATION FORM VALIDATIOPN 
$(document).ready(function() {
/*$("#register").click(function(){*/
						   
	$("#userreg").validate({
		rules: {
			name: "required",
			pass: {
				required: true,
				minlength: 8
			},
			cpass: {
				required: true,
				minlength: 8,
				equalTo: "#pass"
			},
			email: {
				required: true,
				email: true,
				remote: 'front_media/js/registration/user_email_validate.php'
			},
			captchaword: {
				required: true,
				remote: 'front_media/js/registration/user_captcha_validate.php'
			},
			tnc: {
				required: true,
				minlength: 1,
				maxlength: 1
			}
		},
		messages: {
			name: "Please enter your first name.",
			pass: {
				required: "Please enter a password.",
				minlength: "Your password must be at least 8 characters long."
			},
			cpass: {
				required: "Please enter a password.",
				minlength: "Your password must be at least 8 characters long.",
				equalTo: "Please enter the same password as above."
			},
			email: {
				required: "Please enter a email address.",
				email: "Please enter a valid email address.",
				remote: "Email address already exist."
			},
			captchaword: {
				required: "Please enter the above letters.",
				remote: "Please enter the above letters.."
			},
			tnc: {
				required: "Please read the Terms and Conditions.",
				minlength: "Please read the Terms and Conditions.",
				maxlength: "Please read the Terms and Conditions."
			}
		}
	});
/*});*/
});