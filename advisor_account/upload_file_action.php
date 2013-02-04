<?php
//REQUIRED FILE :
	require_once("../pi_classes/commonSetting.php");
	require_once("../pi_classes/ThumbLib.inc.php"); 
	include('../pi_classes/User.php');

#Objects:
$objAdv = new User();



	$file_name 	= $_FILES['uploadFile']['name'];
	$file_type 	= $_FILES['uploadFile']['type'];
	$file_tmp_name = $_FILES['uploadFile']['tmp_name'];
	$file_error 	= $_FILES['uploadFile']['error'];
	$file_size 	= $_FILES['uploadFile']['size']  / (1024 * 1024);
	$file_size = round($file_size, 2, PHP_ROUND_HALF_UP);

$pathInfoArr = pathinfo($file_name);

$format = $pathInfoArr['extension'];
$name = $pathInfoArr['filename'];
$rename_file_name = uniqid().".".$format;

//Action::AdvProfilePhotoThunailOptn-
	if($format == "png" || $format == "jpeg" || $format == "gif" || $format == "jpg"){
				

			$org_target_path	= "../front_media/product_files/".$rename_file_name;
			$thumb_target_path	= "../front_media/product_files/180X180px/".$rename_file_name;

			$upsus=move_uploaded_file($file_tmp_name,$org_target_path);				  
			$thumb = PhpThumbFactory::create($org_target_path);
			$thumb->adaptiveResize(100, 100); //width, height
			$thumb->resize(100, 100); //width, height
			$thumb->save($thumb_target_path);
			
			$tableName = "files";
			$fields = "`name`, `location`, `type`, `date`, `advisor_id`, `format`, `size`";
			$values = "'".$name."', '".$rename_file_name."', 'photo', '".date('Y-m-d H:i:s')."', '".$_SESSION['advisor_id']."', '".$format."', '".$file_size."'";
			
			$objAdv->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);
			
			header("Location: ../manage-files-photo");
					
		}
		else if($format == "mp4" || $format == "wmv" || $format == "mov" || $format == "avi" || $format == "flv" || $format == "3gpp"){
				

			$org_target_path	= "../front_media/product_files/".$rename_file_name;
			$upsus=move_uploaded_file($file_tmp_name,$org_target_path);	
			
			
			$tableName = "files";
			$fields = "`name`, `location`, `type`, `date`, `advisor_id`, `format`, `size`";
			$values = "'".$name."', '".$rename_file_name."', 'video', '".date('Y-m-d H:i:s')."', '".$_SESSION['advisor_id']."', '".$format."', '".$file_size."'";
			
			$objAdv->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);
			
			header("Location: ../manage-files-video");
					
		}
		else if($format == "doc" || $format == "docx" || $format == "xlsx" || $format == "pptx" || $format == "xls" || $format == "ppt"){
				

			$org_target_path	= "../front_media/product_files/".$rename_file_name;
			$upsus=move_uploaded_file($file_tmp_name,$org_target_path);	
			
			
			$tableName = "files";
			$fields = "`name`, `location`, `type`, `date`, `advisor_id`, `format`, `size`";
			$values = "'".$name."', '".$rename_file_name."', 'micro', '".date('Y-m-d H:i:s')."', '".$_SESSION['advisor_id']."', '".$format."', '".$file_size."'";
			
			$objAdv->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);	
			header("Location: ../manage-files-micro");	  
					
		}
		else if($format == "mp3" || $format == "wma" || $format == "flac"){
				

			$org_target_path	= "../front_media/product_files/".$rename_file_name;
			$upsus=move_uploaded_file($file_tmp_name,$org_target_path);	
			
			
			$tableName = "files";
			$fields = "`name`, `location`, `type`, `date`, `advisor_id`, `format`, `size`";
			$values = "'".$name."', '".$rename_file_name."', 'audio', '".date('Y-m-d H:i:s')."', '".$_SESSION['advisor_id']."', '".$format."', '".$file_size."'";
			
			$objAdv->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);		
			header("Location: ../manage-files-audio");
		}
		else if($format == "pdf"){
				

			$org_target_path	= "../front_media/product_files/".$rename_file_name;
			$upsus=move_uploaded_file($file_tmp_name,$org_target_path);	
			
			
			$tableName = "files";
			$fields = "`name`, `location`, `type`, `date`, `advisor_id`, `format`, `size`";
			$values = "'".$name."', '".$rename_file_name."', 'pdf', '".date('Y-m-d H:i:s')."', '".$_SESSION['advisor_id']."', '".$format."', '".$file_size."'";
			
			$objAdv->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);		
			header("Location: ../manage-files-pdf");
		}
		else{
			if($format != ""){
				$_SESSION['msg'] = '<div id="user_interface_msg" class="error_msg"> This file format(.'.$format.') is not supported.
									<span id="msg_close"><img id="msg_close" src="'.site_path.'front_media/images/close.png" alt="Close"/></span>
									</div>';
			}
			header('Location:' . $_SERVER['HTTP_REFERER']);
		}
		
?>