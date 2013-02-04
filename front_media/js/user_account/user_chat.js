$(document).ready(function(e) {
	$('#send_msg_but').click(function(e) {
		send_message();
    });// End button click
	check_new_msg();
	//setTimeout(check_new_msg, 5000)
});//end ready
function check_new_msg(msg){
	var mid = $('#mid').val();
	var name = $('#adv_name').val();
	$.ajax({
		url: "../ajax/check_chat.php",
		type: "post",
		data: {content: msg, from:"user", mid: mid, name: name},
		success: function(data){
					$("#msg_otr").append(data);
					if(data){
						$('#msg_otr').scrollTop($("#msg_otr").attr("scrollHeight") - $("#msg_otr").height());
					}
				},
		complete: function(){
					setTimeout(check_new_msg, 5000);
				}
	});
}
function send_message(){
	var msg = $('#msg').val();
	var mid = $('#mid').val();
	var name = $('#usr_name').val();
	if(msg != ""){
		$.ajax({
			url: "../ajax/send_chat.php",
			type: "post",
			data: {content: msg, from:"user", mid: mid, name: name},
			success: function(selfmsg){
				$("#msg_otr").append(selfmsg);
				$('#msg_otr').scrollTop($("#msg_otr").attr("scrollHeight") - $("#msg_otr").height());
				$('#msg').val('');
			}
		});//end ajax
	}
}