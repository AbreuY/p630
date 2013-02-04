// JavaScript Document
// Verify Account Register - Code Js FORM VALIDATIOPN 
$(document).ready(function() {
	/*$("#register").click(function(){*/
	$("#verifyAccountEmail").validate({
		rules: {
			fname: "required",
			lname: "required",
			pass: {
				required: true,
				minlength: 8
			},
			cpass: {
				required: true,
				minlength: 8,
				equalTo: "#pass"
			},
			email:{
				required: true,
				email: true,
			},
			registrationCode: "required"
		},
		messages: {
			fname: "Please enter your first name.",
			lname: "Please enter your last name.",
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
			},
			registrationCode: "Please enter your registration code."
		}
	});
	/*});*/	
});