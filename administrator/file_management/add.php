<?php
#RequiresFiles:
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/Admin.php");
require_once("../../pi_classes/ThumbLib.inc.php");

#Redirect:
chkAdminLogin();
#Objects:
$Obj		=	new Admin();
#clone:
$objAdv		=	clone $Obj;

#ForEditing Details Of Product Action:
	if(isset($_GET['edit_id']) || $_GET['edit_id']!='')
	{
		
		$edit_id=base64_decode($_GET['edit_id']);
		$advisorId = $edit_id;
		/*$ObjFile->getProductFileById($edit_id);
		$fileInfo = $ObjPro->getAllRow();*/
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		
		$table_name ="files";
	$whereCnd = " where advisor_id=".$advisorId;
	
	
	$objAdv->retrieve_data_from_table($table_name, $whereCnd);
	$objFilePro = clone $objAdv;
	$objPro = clone $objAdv;
	while($tmpAray = $objAdv->getAllRow()){
		
		
		$objFilePro->retrieve_data_from_table("product_file", " where `file_id`=".$tmpAray['file_id']);
		while($tmpFP = $objFilePro->getAllRow()){
			$FP[] = $tmpFP['product_id'];
		}
	if(!empty($FP)){
		$FP_str = implode(",", $FP);
		$objPro->retrieve_data_from_table("product", " where `product_id` in (".$FP_str.")");
		
		while($tmpPro = $objPro->getAllRow()){
			$pro[] = $tmpPro['name'];
		}
		$tmpAray['products'] = $pro;
	}
	else{
		$tmpAray['products'][0] = "No products here";
	}
		unset($pro);
		unset($FP);
		$files[$objAdv->getField('type')][] = $tmpAray;
	}
		//echo "<pre>";print_r($files);die;
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

	}

#On Submit Button Below Condtion for Edit And Add Cat Action:
	if($_POST['btnSubmit']!="")
	{
		//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	
		
		#Objects:
$objAdv = new Admin();



	$file_name 	= $_FILES['uploadFile']['name'];
	$file_type 	= $_FILES['uploadFile']['type'];
	$file_tmp_name = $_FILES['uploadFile']['tmp_name'];
	$file_error 	= $_FILES['uploadFile']['error'];
	$file_size 	= $_FILES['uploadFile']['size']  / (1024 * 1024);
	$file_size = round($file_size, 2, PHP_ROUND_HALF_UP);
	
	$aid = $_POST['edit_id'];

$pathInfoArr = pathinfo($file_name);

$format = $pathInfoArr['extension'];
$name = $pathInfoArr['filename'];
$rename_file_name = uniqid().".".$format;
	
//Action::AdvProfilePhotoThunailOptn-
	if($format == "png" || $format == "jpeg" || $format == "gif" || $format == "jpg"){
				

			$org_target_path	= "../../front_media/product_files/".$rename_file_name;
			$thumb_target_path	= "../../front_media/product_files/180X180px/".$rename_file_name;

			$upsus=move_uploaded_file($file_tmp_name,$org_target_path);				  
			$thumb = PhpThumbFactory::create($org_target_path);
			$thumb->adaptiveResize(100, 100); //width, height
			$thumb->resize(100, 100); //width, height
			$thumb->save($thumb_target_path);
			
			$tableName = "files";
			$fields = "`name`, `location`, `type`, `date`, `advisor_id`, `format`, `size`";
			$values = "'".$name."', '".$rename_file_name."', 'photo', '".date('Y-m-d H:i:s')."', '".$aid."', '".$format."', '".$file_size."'";
			
			$objAdv->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);
			
			$_SESSION['msg']['updated']='updated';
					
		}
	else if($format == "mp4" || $format == "wmv"){
			

		$org_target_path	= "../../front_media/product_files/".$rename_file_name;
		$upsus=move_uploaded_file($file_tmp_name,$org_target_path);	
		
		
		$tableName = "files";
		$fields = "`name`, `location`, `type`, `date`, `advisor_id`, `format`, `size`";
		$values = "'".$name."', '".$rename_file_name."', 'video', '".date('Y-m-d H:i:s')."', '".$aid."', '".$format."', '".$file_size."'";
		
		$objAdv->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);
		
		$_SESSION['msg']['updated']='updated';
				
	}
	else if($format == "doc" || $format == "docx" || $format == "xlsx" || $format == "pptx" || $format == "xls" || $format == "ppt"){
			

		$org_target_path	= "../../front_media/product_files/".$rename_file_name;
		$upsus=move_uploaded_file($file_tmp_name,$org_target_path);	
		
		
		$tableName = "files";
		$fields = "`name`, `location`, `type`, `date`, `advisor_id`, `format`, `size`";
		$values = "'".$name."', '".$rename_file_name."', 'micro', '".date('Y-m-d H:i:s')."', '".$aid."', '".$format."', '".$file_size."'";
		
		$objAdv->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);	
		$_SESSION['msg']['updated']='updated';  
				
	}
	else if($format == "mp3" || $format == "wma" || $format == "flac"){
			

		$org_target_path	= "../../front_media/product_files/".$rename_file_name;
		$upsus=move_uploaded_file($file_tmp_name,$org_target_path);	
		
		
		$tableName = "files";
		$fields = "`name`, `location`, `type`, `date`, `advisor_id`, `format`, `size`";
		$values = "'".$name."', '".$rename_file_name."', 'audio', '".date('Y-m-d H:i:s')."', '".$aid."', '".$format."', '".$file_size."'";
		
		$objAdv->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);		
		$_SESSION['msg']['updated']='updated';
	}
	else if($format == "pdf"){
			

		$org_target_path	= "../../front_media/product_files/".$rename_file_name;
		$upsus=move_uploaded_file($file_tmp_name,$org_target_path);	
		
		
		$tableName = "files";
		$fields = "`name`, `location`, `type`, `date`, `advisor_id`, `format`, `size`";
		$values = "'".$name."', '".$rename_file_name."', 'pdf', '".date('Y-m-d H:i:s')."', '".$aid."', '".$format."', '".$file_size."'";
		
		$objAdv->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);		
		$_SESSION['msg']['updated']='updated';
	}
	//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		header("location:add.php?edit_id=".base64_encode($aid));
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IN ADMIN PANEL | Powered by<?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/layout.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/ie.css" type="text/css" media="screen" />
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/hideshow.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.equalHeight.js"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
</head>
<body>
<?php include("../header.php");?>
<?php include("../menu.php");?>
<section id="main" class="column">
  <form name="frmCategory" id="frmCategory" method="post" enctype="multipart/form-data">
    <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $edit_id;?>">
    <article class="module width_full">
      <header>
        <h3> Edit Product Files</h3>
      </header>
      <header>
        <div style="float: left;padding: 5px 0 0 20px;"> <a href="<?php echo AbstractDB::SITE_PATH;?>administrator/file_management/list.php" title="Go back"> <img src="../images/back_icon2.png" border="0" /></a> </div>
      </header>
      <div class="module_content">
      
      		
        <fieldset style="width:48%; float:left; margin-right: 3%;">
          <label>Upload File</label>
          <input type="file" name="uploadFile" id="uploadFile"  style="width:92%;"/>
          <input type="hidden" name="advisor_id" id="advisor_id" value="<?php echo $advisorId;?>"/>
        </fieldset>
             <div class="clear"></div>

           <fieldset>
           <div class="manage_file_page">
           <div class="edit_menu_start" >
                <ul>
                  <li>
                  <a href="javascript:void(0);" onclick="file_menu(this)" data-menu = "photo" id="m_photo" class="edit_act_nav1"> Photo</a></li>
                  <li><a href="javascript:void(0);" onclick="file_menu(this)" data-menu = "video" id="m_video"> Video</a></li>
                  <li><a href="javascript:void(0);" onclick="file_menu(this)" data-menu = "audio" id="m_audio"> Audio</a></li>
                  <li><a href="javascript:void(0);" onclick="file_menu(this)" data-menu = "micro" id="m_micro"> Microsoft</a></li>
                  <li ><a href="javascript:void(0);" onclick="file_menu(this)" data-menu = "pdf"  id="m_pdf"> PDF</a></li>
                </ul>
              </div>
           
        <div class="devide_R" style="width:647px;">
        
        
                <table id="photo" class="tbl_myorder">
                  <tbody>
                    <tr>
                      <th>Select</th>
                      <th>Related Product </th>
                      <th>Image Name</th>
                      <th>Thumbnail</th>
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                  <?php foreach($files['photo'] as $i){ ?>
                  <tr>
                    <td><input type="checkbox" name="check_file[]" value="<?= $i['file_id'] ?>"</td>
                    <td><ul class="related_products"><?php foreach($i['products'] as $k){ ?><li><?=$k?></li><?php } ?></ul></td>
                    <td><?=$i['name']?></td>
                    <td><img src="<?=site_path?>front_media/product_files/180X180px/<?=$i['location']?>"></td>
                    <td><?=$i['size']?>MB</td>
                    <td><?=$i['format']?></td>
                  </tr>
                  <?php } ?>
                  <?php if(count($files['photo']) == 0){ ?>
                  <tr>
                    <td colspan="6">No Records Found.</td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  
                </table>
                <table id="video" class="tbl_myorder" style="display:none;">
                  <tbody>
                    <tr>
                      <th>Select</th>
                      <th>Related Product </th>		
                      <th>Video Clip Name</th>
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                  <?php foreach($files['video'] as $i){ ?>
                  <tr>
                    <td><input type="checkbox" name="check_file[]" value="<?= $i['file_id'] ?>" /></td>
                    <td><ul class="related_products"><?php foreach($i['products'] as $k){ ?><li><?=$k?></li><?php } ?></ul></td>
                    <td><?=$i['name']?></td>
                    <td><?=$i['size']?>MB</td>
                    <td><?=$i['format']?></td>
                  </tr>
                  <?php } ?>
                  <?php if(count($files['video']) == 0){ ?>
                  <tr>
                    <td colspan="5">No Records Found.</td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  
                </table>
                <table id="audio" class="tbl_myorder" style="display:none;">
                  <tbody>
                    <tr>
                      <th>Select</th>
                      <th>Related Product </th>	
                      <th>Audio Clip Name</th>
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                 <?php foreach($files['audio'] as $i){ ?>
                  <tr>
                    <td><input type="checkbox" name="check_file[]" value="<?= $i['file_id'] ?>"   /></td>
                 	<td><ul class="related_products"><?php foreach($i['products'] as $k){ ?><li><?=$k?></li><?php } ?></ul></td>   
                    <td><?=$i['name']?></td>
                    <td><?=$i['size']?>MB</td>
                    <td><?=$i['format']?></td>
                  </tr>
                  <?php } ?>
                  <?php if(count($files['audio']) == 0){ ?>
                  <tr>
                    <td colspan="5">No Records Found.</td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  
                </table>
                <table id="micro" class="tbl_myorder" style="display:none;">
                  <tbody>
                    <tr>
                      <th>Select</th>
                      <th>Related Product </th>		
                      <th>Document Name</th>
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                  <?php foreach($files['micro'] as $i){ ?>
                  <tr>
                    <td><input type="checkbox" name="check_file[]" value="<?= $i['file_id'] ?>"   /></td>
                    <td><ul class="related_products"><?php foreach($i['products'] as $k){ ?><li><?=$k?></li><?php } ?></ul></td>
                    <td><?=$i['name']?></td>
                    <td><?=$i['size']?>MB</td>
                    <td><?=$i['format']?></td>
                  </tr>
                  <?php } ?>
                  <?php if(count($files['micro']) == 0){ ?>
                  <tr>
                    <td colspan="5">No Records Found.</td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  
                </table>
                <table id="pdf" class="tbl_myorder" style="display:none;">
                  <tbody>
                    <tr>
                      <th>Select</th>
                      <th>Related Product </th>		
                      <th>File Name</th>
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                 <?php foreach($files['pdf'] as $i){ ?>
                   <tr>
                    <td><input type="checkbox" name="check_file[]" value="<?= $i['file_id'] ?>" /></td>
                    <td><ul class="related_products"><?php foreach($i['products'] as $k){ ?><li><?=$k?></li><?php } ?></ul></td>
                    <td><?=$i['name']?></td>
                    <td><?=$i['size']?>MB</td>
                    <td><?=$i['format']?></td>
                  </tr>
                  <?php } ?>
                  <?php if(count($files['pdf']) == 0){ ?>
                  <tr>
                    <td colspan="5">No Records Found.</td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  
                </table>
                <div class="spcer"></div>
              </div>
              </div>
        </fieldset>
       
        
		<!--/Get Service Area Name:/-->	
         
        </div>
        
        
        <div class="clear"></div>
      </div>
      <footer>
        <div class="submit_link">
          <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" class="alt_btn">
          <input type="reset" name="btnReset" id="btnReset" value="Reset">
          <input type="button" name="btnCancel" id="btnCancel" value="Cancel" class="btn_cancel">
        </div>
      </footer>
    </article>
    <!-- end of post new article -->
  </form>
    
	<?php if($_GET['edit_id']){?> 
	    <input type="hidden" name="flagParentId" id="flagParentId"  value="<?=$editCatInfo['cat_level'];?>" />
    <?php }else{?>
    	<input type="hidden" name="flagParentId" id="flagParentId"  value="0" />
    <?php }?>
   
  <div class="spacer"></div>
</section>
<div id="javascript">
<script>
$(document).ready(function(e) {
    $("#category").change(function(){
		if($(this).val() != ""){
			$.ajax({
				url: "../../ajax/product_cat_select.php?id="+$(this).val(),
				success: function(data){
					$("#cats").html(data);
				}
			});//end ajax
		}
		else{$("#cats").html("");}
	});//end change
	
	$("#add_from_existing_file").click(function(){
		$(".manage_file_page").toggle();
	});

});

function file_menu(obj){
	$('#m_photo').removeClass("edit_act_nav1");
	$('#m_audio').removeClass("edit_act_nav1");
	$('#m_video').removeClass("edit_act_nav1");
	$('#m_micro').removeClass("edit_act_nav1");
	$('#m_pdf').removeClass("edit_act_nav1");
	$('#'+$(obj).attr('id')).addClass("edit_act_nav1");
	$("#photo").hide();
	$("#video").hide();
	$("#audio").hide();
	$("#micro").hide();
	$("#pdf").hide();
	$('#'+$(obj).attr('data-menu')).show();
}
</script> 
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery("#frmCategory").validate({
		//errorElement:'div',
			rules: {
				name: {
					required: true
				},
				category: {
					required: true
				},
				category_2: {
					required: true
				},
				price: {
					required: true,
					number: true
				}
			},
			messages: {
				name: {
					required: "Please enter a title for your product"
				},
				category: {
					required: "Please select a category"
				},
				category_2: {
					required: "Please select a sub-category"
				},
				price: {
					required: "Enter the price of this product",
					number: "Only digits accepted here"
				} 
			}
			
		});
	
	jQuery('#btnCancel').click(function(){
		location.href="list.php";
	});
});
</script>
</div>
</body>
</html>
