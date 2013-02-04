// JavaScript Document

////Avblty:
function toggleavailableDay(value){
	if($(".availableday"+value+":checked").size()==24){
		$(".availableday"+value).each(function(){
			this.checked = "";
		});
	} else {
		$(".availableday"+value).each(function(){
			this.checked = "checked";
		})
	}
} 
function toggleavailableHour(value){
	if($(".availablehour"+value+":checked").size()==7){
		$(".availablehour"+value).each(function(){
			this.checked = "";
		});
	} else {
		$(".availablehour"+value).each(function(){
			this.checked = "checked";
		})
	}
}


////Speakinglang:
<!-- jQuery Autocomplete -->
$(document).ready(function() {
	$("#searchSpeakingLanguage").autocomplete("../ajax/ajax_autocomplete_lang.php?advisorId="+$("#advisor_id").val(),{
			width: 235,
			matchContains: true,
			//mustMatch: true,
			//minChars: 0,
			//multiple: true,
			//highlight: false,
			//multipleSeparator: ",",
			selectFirst: false
		});	
});
<!-- End :: jQuery Autocomplete -->
//AddLanguage:
$('#addLanguage').click(function(){
	if($("#searchSpeakingLanguage").val()!=''){
		$.ajax({
			url: "../ajax/ajax_advisor_language.php",
			type: "post",
			data:"advisorId="+$("#advisor_id").val()+"&languageName="+$("#searchSpeakingLanguage").val()+"&action=add_advisor_language",
			success:function(msg){
				jQuery('#showMoreLangByAdded').html(msg);
			}
		});
	}
});