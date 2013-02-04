$(document).ready(function() {
	$("#send").click(function(){
		$("#freeMsgForm").validate({
			rules: {
				subject: {
					required: true
				},
				msgg: {
					required: true,
					maxlength: 300
				}
			},
			messages: {
				subject: {
					required: "Please enter a subject."
				},
				msgg: {
					required: "Please enter your message.",
					maxlength: "Please enter no more than {0} characters."
				}
			}
		}); //end validate 
	}); // end click
}); //end document ready