<?php 
require_once("../../../pi_classes/commonSetting.php");
require_once("../../../pi_classes/User.php");
require_once("../../../pi_classes/ThumbLib.inc.php"); 

#Object:
$objUser = new User();

#Action::
if(strcmp($_POST['operation'],"change photo")==0){
	
		#Action::AdvisorProfilePhotoThunailOptn-
		if($_FILES['profilePhoto']['name'] != ''){

			$photo_name 	= $_FILES['profilePhoto']['name'];
			$photo_type 	= $_FILES['profilePhoto']['type'];
			$photo_tmp_name = $_FILES['profilePhoto']['tmp_name'];
			$photo_error 	= $_FILES['profilePhoto']['error'];
			$photo_size 	= $_FILES['profilePhoto']['size'];
			
			$pathInfoArr = pathinfo($photo_name);
			$rename_photo_name = uniqid().".".$pathInfoArr['extension'];

			#@-:
			if($pathInfoArr['extension']=="gif"||$pathInfoArr['extension']=="pjpeg"||$pathInfoArr['extension']=="jpg"||$pathInfoArr['extension']=="jpeg"||$pathInfoArr['extension']=="png"){
				
				$org_target_path	= "../../images/advisor_images/".$rename_photo_name;
				$thumb_target_path	= "../../images/advisor_images/180X180px/".$rename_photo_name;
		
				$upsus=move_uploaded_file($photo_tmp_name,$org_target_path);				  
				$thumb = PhpThumbFactory::create($org_target_path);
				$thumb->adaptiveResize(180, 180); //width, height
				$thumb->resize(180, 180); //width, height
				$thumb->save($thumb_target_path);	
				
				#updateProfileImageInAdvisorDetails:
				$advisor_id = base64_decode($_POST['advisor_id']);
					#clone:
					$objUpdtAdvPhotoImg = clone $objUser;
						$tableName 	 = "advisor_details";
						$set_fields  = "`image_path`='".$rename_photo_name."'";
						$where_field = "`advisor_id` = '".$advisor_id."'";
					$rsUpdtAdvAvlblty = $objUpdtAdvPhotoImg->UPDATE_ANYRECORD_IN_TABLE($tableName,$set_fields,$where_field);
			}else{
				$_SESSION['msg'] = "<strong>Invalida image file format !</strong>";
			}
		}
		
		#ChkAnyError:
		if(empty($_SESSION['msg'])&&!empty($rsUpdtAdvAvlblty)){
			echo "<script>self.parent.updateProfilephotoImg_activateProfile('".$rename_photo_name."');self.parent.tb_remove();self.close();</script>";	
		}
}
?>
<html>
<title>Change Photo</title>
<head>
<link rel="stylesheet" href="<?=site_path?>front_media/css/style.css" type="text/css" />
<script src="<?=site_path?>front_media/js/jquery.js"></script>
<script type="text/javascript" src="<?=site_path?>front_media/js/JAlert/jquery.alerts.js"></script>
<link href="<?=site_path?>front_media/js/JAlert/jquery.alerts.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript">
function chkphoto()
{
	if(document.getElementById('profilePhoto').value == '')
	{
		jAlert('Please choose photo');
		document.getElementById('pDfltImg').focus();
		return false;
	}
	document.TheForm.submit();
}
</script>
<style type="text/css">
.fancybox_close {
	background: url(../../../front_media/images/close_pop.png) left top no-repeat;
	cursor: pointer;
	height: 30px;
	position: absolute;
	right: -18px;
	top: -10px;
	width: 30px;
	z-index: 1103;
}
.fancybox-outer {
	width: 500px;
	height: auto;
	padding: 15px;
	float:left;
	background: #fff;
	margin:9px;
	border: 1px solid #807d75;
	border-radius: 5px;
	behavior: url(PIE.htc);
	position: relative;
}
.username_text {
	font-family : "Gill Sans", GillSans, "Gill Sans MT", Arial, "sans-serif";
	font-size : 14px;
	color : #5e5a4f;
	text-align : left;
}
.username_text span {
	font-family : "Gill Sans", GillSans, "Gill Sans MT", Arial, "sans-serif";
	font-size : 14px;
	color : #a00b20;
	font-weight : bold;
}
.input_name {
	width : 245px;
	height : auto;
	text-align : left;
	float : left;
}

.blue_btn_29{
	float:left;
}

</style>
</head>
<body style="background:none;">
<div class="fancybox-outer"><a href="#" class="fancybox_close" onClick="self.parent.tb_remove();self.close();"></a>
  <div class="pop_inbox">
    <form name="TheForm" method="POST" enctype="multipart/form-data" action="<?=$PHP_SELF?>">
      <input type="hidden" name="operation" id="operation" value="change photo">
      <div class="username_outer_pop_scnd">
        <div class="username_pop_otr">
          <div class="username_text_outer">
            <div class="username_text"><strong>Upload Photo</strong></div>
          </div>
          <div class="username_text_outer">
            <div class="username_text">Photo must be JPEG or PNG file format and will be cropped to 180x180 pixels.</div>
          </div>
          <div class="username_text_outer">
            <div class="username_text"> <?=$_SESSION['msg'];?></div>
          </div>
         
          <div class="input_name_pop">
            <input type="file" name="profilePhoto" id="profilePhoto" />
            <input type="hidden" name="advisor_id" id="advisor_id" value="<?=$_GET['advId'];?>"/>
          </div>
        </div>
      
              <div class="blue_btn_29"> <span class="left"></span> <span>
                <input type="button" value="Upload" class="mid" onClick="javascript:chkphoto();" style="margin:15px 0 0 55px;" />
                </span> <span class="right"></span> </div> 
      
      </div>
    </form>
  </div>
</div>
</body>
</html>
