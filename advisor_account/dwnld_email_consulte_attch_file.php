<?php 
#RequirFile:
require_once('../pi_classes/commonSetting.php');
require_once('../pi_classes/User.php');

#Object:
$obj_user = new User();

#Get Variable:
$fileId = base64_decode($_GET['fileId']);

#Action::Get Information of file for download it!
	#clone:
	$objMsgFile = clone $obj_user;
	#Query:
	$table_name = "message_file";
	$where 	    = "where `message_file_id` = ".$fileId;
	$objMsgFile->retrieve_data_from_table($table_name,$where);
	$objMsgFile->numofrows();
	$resulteMsgFile = $objMsgFile->getAllRow();
		#@:-
		$ftype			  = "fl";	 
		$filename 		  = $resulteMsgFile['name'];
		$fileLocationName = $resulteMsgFile['location'];
		$pathInfoArr 	  = pathinfo($fileLocationName);
		$dir         	  = site_abs_path."front_media/message_files/".$fileLocationName;

#--/DOWNLOAD CODE/--:
#HEADER CONTENT: 
	$t = ob_get_contents();
	ob_end_clean();
	ob_start();
	
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.$filename.'"'); 
	header("Content-Transfer-Encoding: Binary"); 
	header("Cache-Control: private");  
	
	#~Condition to change Content-Type : According to `is_folder` data type.
	if($ftype=="fo"){
		header('Content-Type: application/zip'); 
	}else{
		switch($pathInfoArr['extension']){
		  case "pdf": header('Content-type: application/pdf'); break; //ok
		  case "exe": header('Content-type: application/octet-stream'); break;
		  case "zip": header('Content-type: application/zip'); break;
		  case "docx":
		  case "doc": header('Content-type: application/msword'); break; //ok
		  case "ods":
		  case "xls": header('Content-type: application/vnd.ms-excel'); break; //ok
		  case "ppt": header('Content-type: application/vnd.ms-powerpoint'); break;
		  case "gif": header('Content-type: image/gif'); break; //ok
		  case "png": header('Content-type: image/png'); break; //ok
		  case "jpeg":
		  case "jpg": header('Content-type: image/jpg'); break; //ok
		  case "txt": header('Content-type: text/plain'); break; //ok
		  default: header('Content-type: application/force-download');
		}
		
	}
	header("Content-Length:".filesize($dir));
	echo file_get_contents($dir);
	exit();
	
	#~Unlink Folder : In Condition Part:
	#~Condition to change Unlink option : According to `is_folder` data type.
	if($ftype=="fo"){
		unlink($dir);
	}
?>