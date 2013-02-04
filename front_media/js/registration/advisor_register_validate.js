// JavaScript Document

	<!--/Start::Education./-->
	 var itemEdu=1;
	$('.removeModEdu').livequery('click',function(event){
        $(this).parent().remove();
        event.preventDefault();
		itemEdu--;
    });
    $('#bttnAddEdut').click(function(event){
        event.preventDefault();
        if(itemEdu<5){
            $varRootEdu = $(this).parent('.AddEducation');
            $eduBlock = $('.Edu1:first',$varRootEdu).html();
            itemEdu++;     
            //$eduBlock.replace('id','',true);
            $eduBlock =$eduBlock.replace(/id="university"/gi, 'id="university'+itemEdu+'"');
            $eduBlock =$eduBlock.replace(/id="degree"/gi, 'id="degree'+itemEdu+'"');
            $eduBlock= '<div class="Edu1 dynamicMod"><a href="#" title="Remove" class="removeModEdu">Remove</a>'+ $eduBlock+'</div>';
            $($eduBlock).insertBefore(this);
        }else{
            alert('You reached maximum!!!');
        }
    });  
	<!--/End::Education./-->


	<!--/Start::AddJob./-->
	var itemEmp=1;
	$('.removeMod').livequery('click',function(event){
        $(this).parent().remove();
        event.preventDefault();
		itemEmp--;
    });
	$('#addJob').click(function(event){
        event.preventDefault();
        if(itemEmp<5){
            $varRootEdu = $(this).parent('.JobExperience');
            $eduBlock 	= $('.JOB:first',$varRootEdu).html();
            itemEmp++;
            $eduBlock =$eduBlock.replace(/id="employer"/gi, 'id="employer'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="titlePosition"/gi, 'id="titlePosition'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="monthFrom"/gi, 'id="monthFrom'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="monthTo"/gi, 'id="monthTo'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="yearFrom"/gi, 'id="yearFrom'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="yearTo"/gi, 'id="yearTo'+itemEmp+'"');
            $eduBlock= '<div class="edu1 dynamicMod"><a href="#" title="Remove" class="removeMod">Remove</a>'+ $eduBlock+'</div>';
            $($eduBlock).insertBefore(this);
        }else{
            alert('You reached maximum!!!');
        }
    });  
	<!--/End::AddJob./-->	



// REGISTRATION FORM VALIDATIOPN 
$(document).ready(function() {
/*$("#register").click(function(){*/
	$("#adv_reg").validate({
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
			email: {
				required: true,
				email: true,
				remote: 'front_media/js/registration/advisor_email_validate.php'
			},
			captchaword: {
				required: true,
				remote: 'front_media/js/registration/user_captcha_validate.php'
			},
			tnc: {
				required: true,
				minlength: 1,
				maxlength: 1
			},
			'employer[]': {
				required: true,
				minlength: 3
			},
			'titlePosition[]': {
				required: true,
				minlength: 3
			},
			'university[]': {
				required: true,
				minlength: 3
			},
			'degree[]': {
				required: true,
				minlength: 3
			}
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
				remote: "Email address already exist."
			},
			captchaword: {
				required: "Please enter the above letters.",
				remote: "Please enter the above letters."
			},
			tnc: {
				required: "Please read the Terms and Conditions.",
				minlength: "Please read the Terms and Conditions.",
				maxlength: "Please read the Terms and Conditions."
			},
			'employer[]': {
				required: "Please enter your employer/company name.",
				minlength: "Atleast 3 characters long."
			},
			'titlePosition[]': {
				required: "Please enter your position/job profile",
				minlength: "Atleast 3 characters long."
			},
			'university[]': {
				required: "Please enter the name of the university.",
				minlength: "Atleast 3 characters long."
			},
			'degree[]': {
				required: "What degree did you get from there?",
				minlength: "Atleast 3 characters long."
			}
		}
	});
	/*});*/
});