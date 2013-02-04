$(document).ready(function() {
	
	$("#au").click(function() {
		$("#au").addClass("abt_active");
		$("#cu").removeClass("abt_active");
		$("#pr").removeClass("abt_active");
		$("#jb").removeClass("abt_active");
		$("#fq").removeClass("abt_active");
		$("#tos").removeClass("abt_active");
		$("#prv").removeClass("abt_active");
		
		getContent("about-us");
	});
	
	$("#cu").click(function() {
		$("#au").removeClass("abt_active");
		$("#cu").addClass("abt_active");
		$("#pr").removeClass("abt_active");
		$("#jb").removeClass("abt_active");
		$("#fq").removeClass("abt_active");
		$("#tos").removeClass("abt_active");
		$("#prv").removeClass("abt_active");
		getContent("contact-us");
	});	
	
	$("#pr").click(function() {
		$("#au").removeClass("abt_active");
		$("#cu").removeClass("abt_active");
		$("#pr").addClass("abt_active");
		$("#jb").removeClass("abt_active");
		$("#fq").removeClass("abt_active");
		$("#tos").removeClass("abt_active");
		$("#prv").removeClass("abt_active");
		
		getContent("press-/-socail-media");
	});
	
	$("#jb").click(function() {
		$("#au").removeClass("abt_active");
		$("#cu").removeClass("abt_active");
		$("#pr").removeClass("abt_active");
		$("#jb").addClass("abt_active");
		$("#fq").removeClass("abt_active");
		$("#tos").removeClass("abt_active");
		$("#prv").removeClass("abt_active");
		
		getContent("jobs");
	});
	
	$("#fq").click(function() {
		$("#au").removeClass("abt_active");
		$("#cu").removeClass("abt_active");
		$("#pr").removeClass("abt_active");
		$("#jb").removeClass("abt_active");
		$("#fq").addClass("abt_active");
		$("#tos").removeClass("abt_active");
		$("#prv").removeClass("abt_active");
		
		getContent("FAQ");
	});
	
	$("#tos").click(function() {
		$("#au").removeClass("abt_active");
		$("#cu").removeClass("abt_active");
		$("#pr").removeClass("abt_active");
		$("#jb").removeClass("abt_active");
		$("#fq").removeClass("abt_active");
		$("#tos").addClass("abt_active");
		$("#prv").removeClass("abt_active");
		
		getContent("terms-and-service");
	});
	
	$("#prv").click(function() {
		$("#au").removeClass("abt_active");
		$("#cu").removeClass("abt_active");
		$("#pr").removeClass("abt_active");
		$("#jb").removeClass("abt_active");
		$("#fq").removeClass("abt_active");
		$("#tos").removeClass("abt_active");
		$("#prv").addClass("abt_active");
		
		getContent("privacy");
	});
		
});

function getContent(content){
		$.post('ajax/ajax_cms_content.php', 
		{ coloumn: content },
		function(result){
			$('#content').html(result).show();
		});
}