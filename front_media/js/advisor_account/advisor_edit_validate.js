$(document).ready(function() {
//// Edit Advisor Info~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	$("#profileInfoForm").validate({
			rules: {
				firstName: {
					required: true
				},
				lastName: {
					required: true
				},
				time_zone: {
					required: true
				},
				phoneNumber: {
					//required: true,
					digits: true
				},
				'availability[]': {
					required: true,
					minlength: 1
				},
				yourListedPriceWebConsulte:{
					 //required:true,
					 number:true
					 //rexp: '^[1-9]\d*(\.\d+)?$' 
				},
				yourListedPriceWebcamEmailConsulte:{
					 //required:true,
					 number:true
					 //rexp: '^[1-9]\d*(\.\d+)?$' 
				}, 
				websitePageLink:{
					url: true
				},
				blogPageLink:{
					url: true
				},
				linkedinPageLink:{
					url: true
				},
				facebookPageLink:{
					url: true
				},
				twitterPageLink:{
					url: true
				}   
			},
			messages: {
				firstName: {
					required: "Please enter your first name."
				},
				lastName: {
					required: "Please enter your last name."
				},
				time_zone: {
					required: "Please select your time-zone."
				},
				phoneNumber: {
					//required: "Please enter your phone number.",
					digits: "Your phone number has alphabets!"
				},
				'availability[]': {
					required: "Enter your availibility schedule.",
					minlength: "Enter your availibility schedule."
				},
				yourListedPriceWebConsulte:{ 				
				 //required:"Please mention a cost of class.",
				 number:  "Please specify digits."
				 //rexp  :  "Decimal Numbers Only."
				},
				yourListedPriceWebcamEmailConsulte:{ 				
				 //required:"Please mention a cost of class.",
				 number:  "Please specify digits."
				 //rexp  :  "Decimal Numbers Only."
				},
				websitePageLink:{
					url: "Please enter a valid url."
				},
				blogPageLink:{
					url: "Please enter a valid url."
				},
				linkedinPageLink:{
					url: "Please enter a valid url."
				},
				facebookPageLink:{
					url: "Please enter a valid url."
				},
				twitterPageLink:{
					url: "Please enter a valid url."
				}
			}
		});
//end validate~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

///edit advisor education~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	/*

	$("#frmEducationAdvisorInfo").validate({
			rules: {
				'schoolName[]': {
					required: true
				},
				'degreeName[]': {
					required: true
				},
				graduationYear1: {
					digits: true
				}, 
				schoolName2: {
					required: true
				},
				degreeName2: {
					required: true
				},
				graduationYear2: {
					digits: true
				}, 
				schoolName3: {
					required: true
				},
				degreeName3: {
					required: true
				},
				graduationYear3: {
					digits: true
				}, 
				schoolName4: {
					required: true
				},
				degreeName4: {
					required: true
				},
				graduationYear4: {
					digits: true
				}, 
				schoolName5: {
					required: true
				},
				degreeName5: {
					required: true
				},
				graduationYear5: {
					digits: true
				} 
			},
			messages: {
				'schoolName[]': {
					required: "Please enter the name of your school/university."
				},
				'degreeName[]': {
					required: "Please enter the name of your degree."
				},
				graduationYear1: {
					digits: "Enter your graduation year."
				},
				schoolName2: {
					required: "Please enter the name of your school/university."
				},
				degreeName2: {
					required: "Please enter the name of your degree."
				},
				graduationYear2: {
					digits: "Enter your graduation year."
				},
				schoolName3: {
					required: "Please enter the name of your school/university."
				},
				degreeName3: {
					required: "Please enter the name of your degree."
				},
				graduationYear3: {
					digits: "Enter your graduation year."
				},
				schoolName4: {
					required: "Please enter the name of your school/university."
				},
				degreeName4: {
					required: "Please enter the name of your degree."
				},
				graduationYear4: {
					digits: "Enter your graduation year."
				},
				schoolName5: {
					required: "Please enter the name of your school/university."
				},
				degreeName5: {
					required: "Please enter the name of your degree."
				},
				graduationYear5: {
					digits: "Enter your graduation year."
				}   
			}
		});*/
//end validate~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

///edit Work Exp~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~	
	/*$("#frmWrkExpAdvisorInfo").validate({
			rules: {
				'employerField[]': {
					required: true
				}  
			},
			messages: {
				'employerField[]': {
					required: "Please enter the name of your Employer."
				}   
			}
		});*/ 
//end validate
	
////PriceCalculationFunctionNeed:	
	$("#yourListedPriceWebConsulte").keyup(function(){
		calcPrice(this.value);
	});
	$("#yourListedPriceWebcamEmailConsulte").keyup(function(){
		calcPriceEmailConsulte(this.value);
	});
	
	//applyValidateRules();

});
 //end document ready~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


function calcPrice(price){
	$.ajax({
	  url: ""+$("#javascript_sitepath").val()+"ajax/get_price_ajax.php?priceWebConsulte="+price,
	  success: function(data){ 
		   var data = data.split('|8!8|');
		  $("#firstPriceWebConsulte").val(data[0]);
		  $("#repeatPriceWebConsulte").val(data[1]); 
		console.clear();
	  }
	});
}
function calcPriceEmailConsulte(price){
	$.ajax({
	  url: ""+$("#javascript_sitepath").val()+"ajax/get_price_ajax_email_consulte.php?priceEmailConsulte="+price,
	  success: function(data){
		   var data = data.split('|8!8|');
		  $("#firstPriceWebcamEmailConsulte").val(data[0]);
		  $("#repeatPriceWebcamEmailConsulte").val(data[1]); 
		 console.clear();
	  }
	}); 
	
	
}

function validateWorkExperienceForm()
{
	var isValid=true;
	$("#frmWrkExpAdvisorInfo input[rel='validate']").each(function(){
		var theId=$(this).attr("id");
			if(!validateForEmpty(this))
			{
				isValid = false;
			}
		});
	return isValid;
}

function validateEduForm()
{
	var isValid=true;
	$("#frmEducationAdvisorInfo input[rel='validate']").each(function(){
		
		var theId=$(this).attr("id");

		if(theId.substr(0,"graduationYear".length)=="graduationYear")
		{
			if(!validateForDigits(this))
			{
				isValid=false;
			}
		}
		else
		{
			if(!validateForEmpty(this))
			{
				isValid = false;
			}
		}
		});

	return isValid;
}

function validateForEmpty(theObj)
{
	if($(theObj).val()=="")
	{
		$(theObj).addClass("error");
		$(theObj).next("p").css("display","");
		$(theObj).next("p").addClass("error");
		return false;
	}
	$(theObj).removeClass("error");
	$(theObj).next("p").hide();
	return true;
}

function validateForDigits(theObj)
{
	if(isNaN(parseInt($(theObj).val())))
	{
		$(theObj).addClass("error");
		$(theObj).next("p").css("display","");
		$(theObj).next("p").addClass("error");
		return false;
	}
	$(theObj).removeClass("error");
	$(theObj).next("p").hide();
	return true;
}