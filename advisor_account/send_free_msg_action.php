<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

extract($_POST);

if(isset($_SESSION['advisor_id'])){
		$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> You have to Register and Login as an User before sending a free message to an Advisor.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							    </div>';	
		header("location:".site_path."send-free-msg/".$aid);exit;
}
if(!isset($_SESSION['user_id'])){
		$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> You have to Register and Login as an User before sending a free message to an Advisor.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							    </div>';	
		header("location:".site_path."send-free-msg/".$aid);exit;
}
#Objects
	$objCom = new User();
//Get Var
	
	$date = date("Y-m-d H:i:s");
	$description = nl2br($description);
//Send Message


//die;
$table = "communication";
$field = "`from`, `to`, `from_type`, `new_flag`, `subject`, `message`, `date_created`, `date_updated`";
$values = "'".$_SESSION['user_id']."','".$aid."','0','1','".$subject."','".$msgg."','".$date."','".$date."'";
$objCom->insert_row_in_table($table,$field,$values);

	//echo"<pre>"; print_r($_POST); die("here");
$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Your message has been successfully  sent.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							    </div>';	
		header("location:".site_path."send-free-msg/".$aid);	

?>