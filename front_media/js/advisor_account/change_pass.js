$(document).ready(function() {
	$("#submit").click(function(){

	
		$("#change_pass").validate({
			rules: {
				old_pass: {
					required: true,
					remote: "front_media/js/advisor_account/change_pass_remote.php"
				},
				new_pass: {
					required: true,
					minlength: 8
				},
				c_pass: {
					required: true,
					equalTo: "#new_pass"
				}  
			},
			messages: {
				old_pass: {
					required: "Please enter your current password.",
					remote: "Please check your current password."
				},
				new_pass: {
					required: "Enter your new password.",
					minlength: "Your password must be at least 8 characters long."
				},
				c_pass: {
					required: "Enter your new password, again.",
					equalTo: "This should be same as New password."
				}   
			}
		}); //end validate
		
		
		
	}); // end login click
}); //end document ready