// JavaScript Document

<!--/Start::AddJob./-->

	$('.removeMod').livequery('click',function(event){
        $(this).parent().remove();
		$("#noOfExperience").val($("#noOfExperience").val()-1); 
        event.preventDefault();
    });
	$('#addJob').click(function(event){
		var itemEmp = document.getElementById("noOfExperience").value;
        event.preventDefault();
        if(itemEmp<5){
			var itemEmp = document.getElementById("noOfExperience").value = parseInt($("#noOfExperience").val()) + 1;
            $varRootEdu = $(this).parent('.JobExperience');
            $eduBlock 	= $('.job:first',$varRootEdu).html();
            itemEmp++;
            $eduBlock =$eduBlock.replace(/id="employerField"/gi, 'id="employerField'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="titleField"/gi, 'id="titleField'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="officeCountry"/gi, 'id="officeCountry'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="graduationYear"/gi, 'id="graduationYear'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="officeCity"/gi, 'id="officeCity'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="industryField"/gi, 'id="industryField'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="timePeriodWork"/gi, 'id="timePeriodWork'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="timePeriodInternship"/gi, 'id="timePeriodInternship'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="timePeriodFrom"/gi, 'id="timePeriodFrom'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="timePeriodTo"/gi, 'id="timePeriodTo'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="description"/gi, 'id="description'+itemEmp+'"');							
            $eduBlock= '<div class="job dynamicMod">'+ $eduBlock+'<a href="#" title="Remove" class="removeMod">Remove</a></div>';
			var newlyObject = $($eduBlock).insertBefore(this);
			
			$(newlyObject).find("#employerField1").attr("id","employerField"+itemEmp);
			$(newlyObject).find("#titleField1").attr("id","titleField"+itemEmp);
			$(newlyObject).find("#officeCountry1").attr("id","officeCountry"+itemEmp);
			$(newlyObject).find("#graduationYear1").attr("id","graduationYear"+itemEmp);

			$(newlyObject).find("#officeCity1").attr("id","officeCity"+itemEmp);
			$(newlyObject).find("#industryField1").attr("id","industryField"+itemEmp);
			$(newlyObject).find("#timePeriodWork1").attr("id","timePeriodWork"+itemEmp);

			$(newlyObject).find("#timePeriodInternship1").attr("id","timePeriodInternship"+itemEmp);
			$(newlyObject).find("#timePeriodFrom1").attr("id","timePeriodFrom"+itemEmp);
			$(newlyObject).find("#timePeriodTo1").attr("id","timePeriodTo"+itemEmp);
			$(newlyObject).find("#description1").attr("id","description"+itemEmp);			
			
			$('#employerField'+itemEmp).val('');
			$('#titleField'+itemEmp).val('');
			$('#officeCountry'+itemEmp).val('');
			$('#graduationYear'+itemEmp).val('');
			$('#officeCity'+itemEmp).val('');
			$('#industryField'+itemEmp).val('');
			$('#timePeriodWork'+itemEmp).val('');
			$('#timePeriodInternship'+itemEmp).val('');
			$('#timePeriodFrom'+itemEmp).val('');
			$('#timePeriodTo'+itemEmp).val('');
			$('#description'+itemEmp).val('');
        }else{
            alert('You reached maximum!!!');
        }
    });  
	<!--/End::AddJob./-->	
$(document).load(function(e) {
	if($('#officeCountry').val() == 233)
	{
		$('#state_block').show();
	}
});
