<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

extract($_POST);
if(isset($_SESSION['advisor_id'])){
		$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> You have to Register and Login as an User before booking an Advisor.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							    </div>';	
		header("location:".site_path."schedule-web-cam/".$advisor_id);exit;
}
if(!isset($_SESSION['user_id'])){
		$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> You have to Register and Login as an User before booking an Advisor.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							    </div>';	
		header("location:".site_path."login");exit;
}


//Get Var
	$date = date("Y-m-d H:i:s");
	$description = nl2br($description);
	$objTime = new User();
	$objTime->retrieve_data_from_table("timezones", " where `id` = ".$time_zone);
	$tim = $objTime->getAllRow();
	$offset = $tim['offset'];	
	$date_1 = date("Y-m-d H:i:s", strtotime($date_1));
	$date_2 = date("Y-m-d H:i:s", strtotime($date_2));
	$date_3 = date("Y-m-d H:i:s", strtotime($date_3));
	//echo $offset."              ".$date_1;
//echo"<pre>";print_r($_POST);die;


//Object
$objWebCam = new User();

$table_name		=	"webcam";
$field			=	"`user_id`, `advisor_id`, `duration`, `subject`, `description`, `date_1`, `date_2`, `date_3`, `user_offset`, `status`, `paid`, `date_created`";
$values			=	"'".$_SESSION['user_id']."','".$advisor_id."','".$duration."','".$subject."','".$description."','".$date_1."','".$date_2."','".$date_3."','".$offset."','pending','n','".$date."'";
$wid = $objWebCam->insert_row_in_table($table_name, $field, $values);

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
$objFile = clone $objWebCam;
for($i=0;isset($_FILES['upload_file']['name'][$i]);$i++){
	
	$file_name 	= $_FILES['upload_file']['name'][$i];
	//$file_type 	= $_FILES['upload_file']['type'][$i];
	$file_tmp_name = $_FILES['upload_file']['tmp_name'][$i];
	$file_error 	= $_FILES['upload_file']['error'][$i];
	//$file_size 	= $_FILES['upload_file']['size'][$i]  / (1024 * 1024);
	//$file_size = round($file_size, 2, PHP_ROUND_HALF_UP);
	$pathInfoArr = pathinfo($file_name);
	$format = $pathInfoArr['extension'];
	$name = $pathInfoArr['filename'];
	$rename_file_name = uniqid().".".$format;
	
	$org_target_path	= "../front_media/webcam_files/".$rename_file_name;
	if($format == "png" || $format == "jpeg" || $format == "gif" || $format == "jpg" || $format == "mp4" || $format == "wmv" || $format == "doc" || $format == "docx" || $format == "xlsx" || $format == "pptx" || $format == "xls" || $format == "ppt" || $format == "mp3" || $format == "wma" || $format == "flac" || $format == "pdf"){
		
				
				$upsus=move_uploaded_file($file_tmp_name,$org_target_path);	
				$tableName = "webcam_file";
				$fields = "`name`, `location`, `webcam_id`, `format`";
				$values = "'".$name."', '".$rename_file_name."', '".$wid."', '".$format."'";
				$objFile->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);
	}
}


//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

$_SESSION['msg'] = '<div id="user_interface_msg" class="succes_msg"> Your request for the web-cam session has been sent to the advisor.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							    </div>';
header("location:".site_path."schedule-web-cam/".$advisor_id);

?>