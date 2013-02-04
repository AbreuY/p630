$(document).ready(function() {
	
	$("#vd").click(function() {
		$("#vd").addClass("abt_active");
		$("#rs").removeClass("abt_active");
		$("#p3").removeClass("abt_active");	
		
		getContent("video");
	});
	
	$("#rs").click(function() {
		$("#vd").removeClass("abt_active");
		$("#rs").addClass("abt_active");
		$("#p3").removeClass("abt_active");
		
		getContent("recommended-software");
	});	
	
	$("#p3").click(function() {
		$("#vd").removeClass("abt_active");
		$("#rs").removeClass("abt_active");
		$("#p3").addClass("abt_active");
		
		getContent("page3");
	});
		
});

function getContent(content){
		$.post('ajax/ajax_cms_content.php', 
		{ coloumn: content },
		function(result){
			$('#content').html(result).show();
		});
}