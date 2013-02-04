// REGISTRATION FORM VALIDATIOPN
$(document).ready(function() {
	$("#login_but").click(function(){

	
		$("#log_form").validate({
			rules: {
				email: {
					required: true,
					email: true,
					remote: 'front_media/js/login/user_email_validate.php'
				}, //end email
				pass: {
					required: true
				} // end pass
			}, //end rules
			messages: {
				email: {
					required: "Please enter a email address.",
					email: "Please enter a valid email address.",
					remote: "Email is not registered."
				}, //end email
				pass: {
					required: "Please enter a password."
				}//end password
			} //end messages
		}); //end validate
		
		
		
	}); // end login click
}); //end document ready