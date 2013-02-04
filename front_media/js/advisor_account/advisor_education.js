// JavaScript Document

<!--/Start::Education./-->
	$('.removeModEdu').livequery('click',function(event){
        $(this).parent().remove();
		$("#numOfEducation").val(parseInt($("#numOfEducation").val())-1); 
        event.preventDefault();
    });
    $('#bttnAddEdut').click(function(event){
		var itemEdu = parseInt(document.getElementById("numOfEducation").value);
        event.preventDefault();
        if(itemEdu<5){
			itemEdu = document.getElementById("numOfEducation").value = parseInt($("#numOfEducation").val()) + 1;
            $varRootEdu = $(this).parent('.AddEducation');
            $eduBlock = $('.edu1:first',$varRootEdu).html();
            itemEdu++;     
            //$eduBlock.replace('id','',true);
		 	$eduBlock =$eduBlock.replace(/id="schoolName"/gi, 'id="schoolName'+itemEdu+'"');
            $eduBlock =$eduBlock.replace(/id="degreeName"/gi, 'id="degreeName'+itemEdu+'"');
            $eduBlock =$eduBlock.replace(/id="concentrationField"/gi, 'id="concentrationField'+itemEdu+'"');
            $eduBlock =$eduBlock.replace(/id="graduationYear"/gi, 'id="graduationYear'+itemEdu+'"');
			
            $eduBlock= '<div class="edu1 dynamicMod">'+ $eduBlock+'<a href="#" title="Remove" class="removeModEdu">Remove</a></div>';
            var newlyObject = $($eduBlock).insertBefore(this);
			
			$(newlyObject).find("#schoolName1").attr("id","schoolName"+itemEdu);
			$(newlyObject).find("#degreeName1").attr("id","degreeName"+itemEdu);
			$(newlyObject).find("#concentrationField1").attr("id","concentrationField"+itemEdu);
			$(newlyObject).find("#graduationYear1").attr("id","graduationYear"+itemEdu);
			
			$('#schoolName'+itemEdu).val('');
			$('#degreeName'+itemEdu).val('');
			$('#concentrationField'+itemEdu).val('');
			$('#graduationYear'+itemEdu).val('');
			//applyValidateRules();
			
        }else{
            alert('You reached maximum!!!');
        }
    });  
	<!--/End::Education./-->