<?php
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');
require_once("../pi_classes/ThumbLib.inc.php"); 

$objProduct = new User();
extract($_POST);


$check_audio_video = implode(",",$check_file);
/*echo $check_audio_video;
//Variables
echo"<pre>";
//print_r($_POST);
print_r($check_file);
//echo $_FILES['upload_file']['name'][0];
die;*/


$advisorId	= $_SESSION['advisor_id'];

$category = array_merge($category,$category_2);

if($_FILES['upload_file']['name'][0] == "" && !isset($check_file)){
	$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> You can not create a product without attaching files to it.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
	header("Location: ".site_path."create-product");exit;
}


if(!isset($check_file)){
	$num_a = 0;
	$num_v = 0;
	$num_ppt = 0;
}
else{
	$objCheckAudVid = clone $objProduct;
	$objCheckAudVid->retrieve_data_from_table("files", " where `file_id` in (".$check_audio_video.") and type = 'audio'");
	$num_a = $objCheckAudVid->numofrows();
	$objCheckAudVid->retrieve_data_from_table("files", " where `file_id` in (".$check_audio_video.") and type = 'video'");
	$num_v = $objCheckAudVid->numofrows();
	$objCheckAudVid->retrieve_data_from_table("files", " where `file_id` in (".$check_audio_video.") and format in ('ppt', 'pptx')");
	$num_ppt = $objCheckAudVid->numofrows();
}

$num_up_a=0;
$num_up_v=0;
$num_up_ppt=0;
for($i=0;isset($_FILES['upload_file']['name'][$i]);$i++){
	
	$file_name 	= $_FILES['upload_file']['name'][$i];
	$pathInfoArr = pathinfo($file_name);
	$format = $pathInfoArr['extension'];
	if($format == "mp3" || $format == "wma" || $format == "flac"){
		$num_up_a++;
	}
	if($format == "mp4" || $format == "wmv" ){
		$num_up_v++;
	}
	if($format == "ppt" || $format == "pptx" ){
		$num_up_ppt++;
	}
	
}


$num_total_audio = $num_a + $num_up_a;
$num_total_video = $num_v + $num_up_v;
$num_total_ppt = $num_ppt + $num_up_ppt;
if($num_total_audio == 0 && $num_total_video == 0){
	
	$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> You can not create a product without an audio file or a video file.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
	header("Location: ".site_path."create-product");exit;
	
}

if($num_total_video > 0 && $num_total_audio > 0){
	$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> You can not create a product with a video file AND an audio file, chosse any one.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
	header("Location: ".site_path."create-product");exit;
	
}

if($num_total_audio > 1){
	$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> You can not create a product with more than one audio file.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
	header("Location: ".site_path."create-product");exit;
	
}

if($num_total_video > 1){
	$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> You can not create a product with more than one video file.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
	header("Location: ".site_path."create-product");exit;
	
}

if($num_total_ppt > 1){
	$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> You can not create a product with more than one PPT file.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
	header("Location: ".site_path."create-product");exit;
	
}


if($num_total_audio == 1 && $num_total_ppt < 1){
	$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> You can not create an AUDIO product without a PPT file.
								<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
							</div>';
	header("Location: ".site_path."create-product");exit;
	
}

if($num_total_audio == 1 && $num_total_ppt == 1){
	$combination = 'audioppt';
	
}
if($num_total_video == 1 && $num_total_ppt < 1){
	$combination = 'video';
	
}
if($num_total_video == 1 && $num_total_ppt == 1){
	$combination = 'videoppt';
	
}

//Object-Store in dbTable product

$objAdv = clone $objProduct;
$objCat = clone $objProduct;

$table_name		=	"product";
$field			=	"`name`, `type`, `combination`, `description`, `advisor_id`";
$values			=	"'".$name."','".$type."','".$combination."','".$description."','".$advisorId."'";
$pid=$objProduct->insert_row_in_table($table_name, $field, $values);

$table_name="product_category";
$fields = "`product_id`, `cat_id`";
foreach($category as $cat){
	$values = "'".$pid."', '".$cat."'";
	$objCat->insert_row_in_table($table_name, $fields, $values);
}



foreach($check_file as $val1){
	$tableName = "product_file";
$fields = "`product_id`, `file_id`, `advisor_id`";
$values = "'".$pid."', '".$val1."','".$advisorId."'";

$objAdv->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);
}


$objFile = clone $objProduct;
for($i=0;isset($_FILES['upload_file']['name'][$i]);$i++){
	
	$file_name 	= $_FILES['upload_file']['name'][$i];
	$file_type 	= $_FILES['upload_file']['type'][$i];
	$file_tmp_name = $_FILES['upload_file']['tmp_name'][$i];
	$file_error 	= $_FILES['upload_file']['error'][$i];
	$file_size 	= $_FILES['upload_file']['size'][$i]  / (1024 * 1024);
	$file_size = round($file_size, 2, PHP_ROUND_HALF_UP);
	$pathInfoArr = pathinfo($file_name);
	$format = $pathInfoArr['extension'];
	$name = $pathInfoArr['filename'];
	$rename_file_name = uniqid().".".$format;
	
	if($format == "png" || $format == "jpeg" || $format == "gif" || $format == "jpg"){
		
		$org_target_path	= "../front_media/product_files/".$rename_file_name;
		$thumb_target_path	= "../front_media/product_files/180X180px/".$rename_file_name;

		$upsus=move_uploaded_file($file_tmp_name,$org_target_path);				  
		$thumb = PhpThumbFactory::create($org_target_path);
		$thumb->adaptiveResize(100, 100); //width, height
		$thumb->resize(100, 100); //width, height
		$thumb->save($thumb_target_path);
		
		$type = "photo";
		filesIntoDB($type);
	}
	else if($format == "mp4" || $format == "wmv"){
		$type = "video";
		filesIntoDB($type);
	}
	else if($format == "doc" || $format == "docx" || $format == "xlsx" || $format == "pptx" || $format == "xls" || $format == "ppt"){
		$type = "micro";
		filesIntoDB($type);		  	
	}
	else if($format == "mp3" || $format == "wma" || $format == "flac"){
		$type = "audio";
		filesIntoDB($type);
	}
	else if($format == "pdf"){
		$type = "pdf";
		filesIntoDB($type);
	}
}

function filesIntoDB($type){
	global $org_target_path, $file_tmp_name, $name, $rename_file_name, $format, $file_size, $pid, $advisorId, $objFile;
	$org_target_path	= "../front_media/product_files/".$rename_file_name;
	$upsus=move_uploaded_file($file_tmp_name,$org_target_path);	
	$tableName = "files";
	$fields = "`name`, `location`, `type`, `date`, `advisor_id`, `format`, `size`";
	$values = "'".$name."', '".$rename_file_name."', '".$type."', '".date('Y-m-d H:i:s')."', '".$advisorId."', '".$format."', '".$file_size."'";
	$fid = $objFile->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);
	
	$tableName = "product_file";
	$fields = "`product_id`, `file_id`, `advisor_id`";
	$values = "'".$pid."', '".$fid."','".$advisorId."'";
	
	$objFile->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);
	
}

header("Location: ../preview-product/".$pid);
?>