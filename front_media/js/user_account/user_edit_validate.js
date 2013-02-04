$(document).ready(function() {
	$("#update").click(function(){
		$("#update_form").validate({
			rules: {
				name: {
					required: true
				},
				old_pass: {
					required: true,
					equalTo: "#old_pass_c"
				},
				new_pass: {
					required: true,
					minlength: 8
				},
				c_pass: {
					required: true,
					equalTo: "#new_pass"
				},
				email: {
					required: true,
					email: true,
					remote: 'front_media/js/user_account/user_email_validate.php'
				}  
			},
			messages: {
				name: {
					required: "Please enter your name."
				},
				old_pass: {
					required: "Please enter your current password",
					equalTo: "Please check your current password"
				},
				new_pass: {
					required: "Enter your new password",
					minlength: "Your password must be at least 8 characters long."
				},
				c_pass: {
					required: "Enter your new password, again",
					equalTo: "This should be same as New password"
				},
				email: {
					required: "Please enter a email address.",
					email: "Please enter a valid email address.",
					remote: "Email address already exist."
				}  
			}
			
		}); //end validate 
		document.update.submit();
	}); // end login click
}); //end document ready