// REGISTRATION FORM VALIDATIOPN 
$(document).ready(function() {
	$("#forgot_but").click(function(){

	
		$("#forgot_form").validate({
			rules: {
				femail: {
					required: true,
					email: true,
					remote: 'front_media/js/login/forgot_email_validate.php'
				}
			}, //end rules
			messages: {
				femail: {
					required: "Please enter a email address.",
					email: "Please enter a valid email address.",
					remote: "Email is not registered with us."
				}
			} //end messages
		}); //end validate
		
		
		
	}); // end login click
}); //end document ready