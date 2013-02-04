// JavaScript Document
	
	//Start::::ScriptUserInterfaceMsgClose.
	$(document).ready(function(e){
		$('#msg_close').click(function(){
			$('#user_interface_msg').slideUp();
		});
	});
	//End::::ScriptUserInterfaceMsgClose.
	
	//Start::::Calculate TextArea Letters:::Regarding Advisor Part.
	function countChar(val){
		var len = val.value.length;
		if (len >= 600) {
			val.value = val.value.substring(0, 600);
		}else {
			$('#charNum').text(600 - len);
		}
	};
	//End::::Calculate TextArea Letters:::Regarding Advisor Part.
	
	//Start::::Calculate TextArea Letters:::RegardingFree Msg.
	function countCharMsg(val){
		var len = val.value.length;
		if (len >= 300) {
			val.value = val.value.substring(0, 300);
		}else {
			$('#left_chars').text(300 - len);
		}
	};
	//End::::Calculate TextArea Letters:::Regarding Free msg.
	
	//Start::::To Toggle ForgorPassword Section - From Login Page.
	function onForgotClick()
	{
		$('#forgot_box').toggle(); 
	}
	//End::::To Toggle ForgorPassword Section.

	//Start::::To Toggle ForgorPassword Section - From Login Page.
	$(document).ready(function(){
		$("#abouthead").removeClass("navi_act");
		$("#guidehead").removeClass("navi_act");
		$("#loginhead").addClass("navi_act");
		$("#reghead").removeClass("navi_act");
    });
	//End::::To Toggle ForgorPassword Section.
	
	//Start::::ChangeProfilePhoto.
	function openLightBoxPopup(caption, url, imageGroup)
	{ 
		tb_show(caption, url, imageGroup);
	}
	function updateProfilephotoImg_activateProfile(filename)
	{
		profilePhotoImg ="../../front_media/images/advisor_images/180X180px/"+filename;
		$('#profilePhotoImg').attr("src",profilePhotoImg);
		$("#profilePhoto").val(filename);
	}
	function updateProfilephotoImg_editProfile(filename)
	{
		profilePhotoImg ="../front_media/images/advisor_images/180X180px/"+filename;
		$('#profilePhotoImg').attr("src",profilePhotoImg);
		$("#profilePhoto").val(filename);
	}
	function updateProfilephotoImg_userProfile(filename)
	{
		profilePhotoImg ="front_media/images/user_images/180X180px/"+filename;
		$('#profilePhotoImg').attr("src",profilePhotoImg);
		$("#profilePhoto").val(filename);
	}
	$(document).ready(function()
	{
		jQuery("#changePhotoFront").bind("click", function(event)
		{
			openLightBoxPopup('','../../front_media/js/lightbox/change_photo_activate_profile.php?advId='+$("#advisor_id").val()+'&keepThis=true&modal=true&TB_iframe=true&height=501&width=600','false');
		});
		jQuery("#changePhotoEdit").bind("click", function(event)
		{
			openLightBoxPopup('','../front_media/js/lightbox/change_photo_edit_profile.php?advId='+$("#advisor_id").val()+'&keepThis=true&modal=true&TB_iframe=true&height=501&width=600','false');
		});
		jQuery("#changePhotoUser").bind("click", function(event)
		{
			openLightBoxPopup('','front_media/js/lightbox/change_photo_user_profile.php?usrId='+$("#user_id").val()+'&keepThis=true&modal=true&TB_iframe=true&height=501&width=600','false');
		});
		jQuery(".see_shine").bind("click", function(event)
		{
			openLightBoxPopup('','../front_media/js/lightbox/see_shine.php?keepThis=true&modal=true&TB_iframe=true&height=501&width=700','false');
		});
		jQuery(".see_shine_front").bind("click", function(event)
		{
			openLightBoxPopup('','../../front_media/js/lightbox/see_shine.php?keepThis=true&modal=true&TB_iframe=true&height=501&width=700','false');
		});
	});
	//End::::ChangeProfilePhoto.
	
	//Start::::EditUserProfileJs.
	$(document).ready(function(e) {
		//Toggele For Change Password Section
		$('#change_pass_check').change(function () {
			if ($(this).attr("checked")) 
			{
				$('#change_pass').show();
				return;
			}
			$('#change_pass').hide();
		}); //End Toggle
		
		$('#msg_close').click(function(){
			$('#user_interface_msg').slideUp();
		});
	});
	//End::::EditUserProfileJs.
	
	
	//Choose file--create advisor product--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
/*	function chooseFile_createProduct(filename)
	{
		console.log("Inside chooseFile_createProduct");
		profilePhotoImg ="front_media/images/user_images/180X180px/"+filename;
		$('#profilePhotoImg').attr("src",profilePhotoImg);
		$("#profilePhoto").val(filename);
	}
	$(document).ready(function()
	{
		jQuery("#chooseFile").bind("click", function(event)
		{
			openLightBoxPopup('','../../front_media/js/lightbox/choose_file.php?advId='+$("#advisor_id").val()+'&keepThis=true&modal=true&TB_iframe=true&height=501&width=600','false');
		});
		
	});*/
	
	//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	
	/*---/Start::From Create Product Page/---*/
		$(document).ready(function(e) {
			$("#category").change(function(){
				if($(this).val() != ""){
					$.ajax({
						url: "ajax/product_cat_select.php?id="+$(this).val(),
						success: function(data){
							$("#cats").html(data);
						}
					});//end ajax
				}
				else{$("#cats").html("");}
			});//end change
			
			$("#add_from_existing_file").click(function(){
				$(".manage_file_page").toggle();
			});	
		
		});
		
		function file_menu(obj){
			$('#m_photo').removeClass("edit_act_nav1");
			$('#m_audio').removeClass("edit_act_nav1");
			$('#m_video').removeClass("edit_act_nav1");
			$('#m_micro').removeClass("edit_act_nav1");
			$('#m_pdf').removeClass("edit_act_nav1");
			$('#'+$(obj).attr('id')).addClass("edit_act_nav1");
			$("#photo").hide();
			$("#video").hide();
			$("#audio").hide();
			$("#micro").hide();
			$("#pdf").hide();
			$('#'+$(obj).attr('data-menu')).show();
		}
	/*---/End::From Create Product Page/---*/
	

	//Change file name
	
	$(document).ready(function(e) {
	    $('.change_name').click(function(e) {
	        var id = $(this).attr("data-fd");
			var name = $('#file_name_'+id).val();
			console.log(id+"   "+name);
			$.ajax({
				url: "ajax/change_file_name.php",
				type: "post",
				data: {id: id, name: name},
				success: function(data){
	           $("#mssg").html(data);
	     		 }
				
			});
	    });
	    
	    $('.show_image').click(function(e) {
	    	var location = $(this).attr("data-loc");
	    	openLightBoxPopup('','front_media/js/lightbox/see_image.php?location='+location+'&keepThis=true&modal=true&TB_iframe=true&height=501&width=700','false');
	    });
	    
	    $('.show_doc').click(function(e) {
	    	var location = $(this).attr("data-loc");
	    	openLightBoxPopup('','front_media/js/lightbox/see_doc.php?location='+location+'&keepThis=true&modal=true&TB_iframe=true&height=600&width=700','false');
	    });
	    
	});




	//End change file name