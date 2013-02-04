// JavaScript Document
$(document).ready(function() {
	$(".PYtxt").click(function() {
		if($(this).is(':checked')){
			$("#textPY"+$(this).attr("data-ck")).show();
		}
		else{
			$("#textPY"+$(this).attr("data-ck")).hide();
		}
	});
	$(".CMtxt").click(function() {
		if($(this).is(':checked')){
			$("#textCM"+$(this).attr("data-ck")).show();
		}
		else{
			$("#textCM"+$(this).attr("data-ck")).hide();
		}		
	});
	$(".APtxt").click(function() {
		if($(this).is(':checked')){
			$("#textAP"+$(this).attr("data-ck")).show();
		}
		else{
			$("#textAP"+$(this).attr("data-ck")).hide();
		}		
	});
	$(".IPtxt").click(function() {
		if($(this).is(':checked')){
			$("#textIP"+$(this).attr("data-ck")).show();
		}
		else{
			$("#textIP"+$(this).attr("data-ck")).hide();
		}		
	});
	$(".PCtxt").click(function() {
		if($(this).is(':checked')){
			$("#textPC"+$(this).attr("data-ck")).show();
		}
		else{
			$("#textPC"+$(this).attr("data-ck")).hide();
		}		
	});
	
	$(".checkAdd").click(function() {
		//console.log($(this).attr("name"));
		if($(this).is(':checked')){
			$("#detailAdd"+$(this).attr("value")).show();
		}
		else{
			$("#detailAdd"+$(this).attr("value")).hide();
		}
	});
	
});


function showSubServiceArea(divId){
	if($('#expertArea'+divId).is(':checked')){
		$('#divId'+divId).show();
	}
	else{
		$('#divId'+divId).hide();
	}
}



//$('#admission').is(':checked')
	/*$('#admission').click(function(){
		if($('#admission').is(':checked')){
			$('#add').show();
		}
		else{
			$('#add').hide();
		}
	});
	$('#career').click(function(){
		if($('#career').is(':checked')){
			$('#car').show();
		}
		else{
			$('#car').hide();
		}
	});*/
	/*$(".checkCar").click(function() {
		//console.log($(this).attr("name"));
		if($(this).is(':checked')){
			$("#detailCar"+$(this).attr("value")).show();
		}
		else{
			$("#detailCar"+$(this).attr("value")).hide();
		}
	});*/
	/*$(".CAtxt").click(function() {
		if($(this).is(':checked')){
			$("#textCA"+$(this).attr("data-ck")).show();
		}
		else{
			$("#textCA"+$(this).attr("data-ck")).hide();
		}		
	});
	$(".IItxt").click(function() {
		if($(this).is(':checked')){
			$("#textII"+$(this).attr("data-ck")).show();
		}
		else{
			$("#textII"+$(this).attr("data-ck")).hide();
		}		
	});
	$(".RCtxt").click(function() {
		if($(this).is(':checked')){
			$("#textRC"+$(this).attr("data-ck")).show();
		}
		else{
			$("#textRC"+$(this).attr("data-ck")).hide();
		}		
	});
	$(".JStxt").click(function() {
		if($(this).is(':checked')){
			$("#textJS"+$(this).attr("data-ck")).show();
		}
		else{
			$("#textJS"+$(this).attr("data-ck")).hide();
		}		
	});
	$(".IPRtxt").click(function() {
		if($(this).is(':checked')){
			$("#textIPR"+$(this).attr("data-ck")).show();
		}
		else{
			$("#textIPR"+$(this).attr("data-ck")).hide();
		}		
	});*/


