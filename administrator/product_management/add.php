<?php
#RequiresFiles:
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/Admin.php");

#Redirect:
chkAdminLogin();
#Objects:
$Obj		=	new Admin();
#clone:
//$ObjDetail	=	clone $Obj;
$ObjPro		=	clone $Obj;

#ForEditing Details Of Product Action:
	if(isset($_GET['edit_id']) || $_GET['edit_id']!='')
	{
		
		$edit_id=base64_decode($_GET['edit_id']);
		$ObjPro->getProductDtlById($edit_id);
		$editProInfo = $ObjPro->getAllRow();
		
		
		
		
		
		
				#GetCategory:
			$table_name ="category";
			$whereCnd = " where cat_level= 1";
			$objCat = clone $Obj;
			$objCat->retrieve_data_from_table($table_name, $whereCnd);
			$chk_2 = true;
			while($tmpAray = $objCat->getAllRow()){
				$category[] = $tmpAray;
				if($tmpAray['cat_id'] == $editProInfo['category_id']){
					$chk_2 = false;
					$editProInfo['category_id1'] = $tmpAray['cat_id'];
				}
			}
			if($chk_2){
				$table_name ="category";
				$whereCnd = " where cat_id= ".$editProInfo['category_id'];
				$objCat->retrieve_data_from_table($table_name, $whereCnd);
				$cat2 = $objCat->getAllRow();
				$editProInfo['category_id1'] = $cat2['parent_id'];
				$whereCnd = " where parent_id = '".$cat2['parent_id']."'";
				$objCat->retrieve_data_from_table($table_name, $whereCnd);
				while($tmpAray = $objCat->getAllRow()){
					$category2[] = $tmpAray;
					if($tmpAray['cat_id'] == $editProInfo['category_id']){
						$editProInfo['category_id2'] = $tmpAray['cat_id'];
					}
				}
				
			}
		
		
		#GetFiles:
	$table_name ="product_file";
	$whereCnd = " where product_id = '".$edit_id."' and `advisor_id` = '".$editProInfo['advisor_id']."'";
	$objFile = clone $Obj;
	$objFile->retrieve_data_from_table($table_name, $whereCnd);
	while($tmpAray = $objFile->getAllRow()){
		$filesIn[] = $tmpAray['file_id'];
	}
	
	
	#GetFiles:
	$table_name ="files";
	$whereCnd = " where advisor_id=".$editProInfo['advisor_id'];
	
	$objAdv = clone $Obj;
	$objAdv->retrieve_data_from_table($table_name, $whereCnd);
	while($tmpAray = $objAdv->getAllRow()){
		$tmpAray['check'] = false;
		if(in_array($tmpAray['file_id'], $filesIn)){
			$tmpAray['check'] = true;
		}
		$files[$objAdv->getField('type')][] = $tmpAray;
	}
		
		
		
		
	}

#On Submit Button Below Condtion for Edit And Add Cat Action:
	if($_POST['btnSubmit']!="")
	{
		extract($_POST);
		if(!isset($category_2)){
			$category_2 = $category;
		}
		/*if($home == "on"){$home = 1;}else{$home = 0;}
		if($expr == "on"){$expr = 1;}else{$expr = 0;}*/
			
		if($_POST['product_id']!='')
		{		
			
			#UpdateAction:
			$table_name		=	"product";
		$set_field			=	"`name` = '".$name."',
								 `type` = '".$type."',
								 `combination` = '".$combination."',
								 `description` = '".$description."',
								 `price` = '".$price."',
								 `category_id` = '".$category_2."'";
		$whereCnd			=	"`product_id`=".$product_id;
		$ObjPro->UPDATE_ANYRECORD_IN_TABLE($table_name, $set_field, $whereCnd);
		
		//Managing File_product
	$objProFile = clone $Obj;
	$objProFile->deleteProductFile($product_id);
	$tableName = "product_file";
	$fields = "`product_id`, `file_id`, `advisor_id`";
	foreach($check_file as $val1){
		$values = "'".$product_id."', '".$val1."','".$editProInfo['advisor_id']."'";
		$objProFile->INSERT_ANYRECORD_IN_TABLE($tableName,$fields,$values);
	}

			
			$_SESSION['msg']['updated']='updated';
		}
		
		header("location:list.php");
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
  <form name="frmCategory" id="frmCategory" method="post">
    <!--<input type="hidden" name="cat_id" id="cat_id" value="<?php echo $Obj->getField('cat_id');?>">-->
    <article class="module width_full">
      <header>
        <h3> Edit Product</h3>
      </header>
      <header>
        <div style="float: left;padding: 5px 0 0 20px;"> <a href="<?php echo AbstractDB::SITE_PATH;?>administrator/product_management/list.php" title="Go back"> <img src="../images/back_icon2.png" border="0" /></a> </div>
      </header>
      <div class="module_content">
        <fieldset>
          <span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
        </fieldset>
        <fieldset style="width:48%; float:left;">
          <label>Product Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
          <input type="text" name="name" id="name" value="<?php echo $editProInfo['name'];?>" style="width:92%;"/>
          <input type="hidden" name="product_id" id="product_id" value="<?php echo $editProInfo['product_id'];?>"/>
        </fieldset>
        
          <fieldset style="width:48%; float:right;">
          <label>Product type<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
           <select name="type">
                <option value="paid" <?php if($editProInfo['type'] == "paid"){ ?> selected="selected" <?php } ?> >Available for purchased</option>
                <option value="free" <?php if($editProInfo['type'] == "free"){ ?> selected="selected" <?php } ?>>Available for free</option>
           </select>
        </fieldset>
        
        <div class="clear"></div>
        
        <fieldset style="width:48%; float:left;">
          <label>Category <sup style="color:#FF0000;font-weight:bold;">*</sup></label>
          <select id = "category" name="category">
                <option value="">--Select a category--</option>
                <?php foreach($category as $cat){?>
                <option value="<?php echo $cat['cat_id']; ?>" <?php if($editProInfo['category_id1'] == $cat['cat_id']){ ?> selected="selected" <?php } ?>><?php echo $cat['cat_name']; ?></option>
                <?php } ?> 
              </select>
              
              <div id="cats">
              <?php if($chk_2){ ?>
                <label for="login">&nbsp;</label>
              <select id = "cat_2" name="category_2">
                <option value="">--Select a sub-category--</option>
                <?php foreach($category2 as $cat2){ ?>
                <option value="<?=$cat2['cat_id']; ?>" <?php if($editProInfo['category_id2'] == $cat2['cat_id']){ ?> selected="selected" <?php } ?>><?=$cat2['cat_name']; ?></option>
                <?php } ?> 
              </select>
              </div>
              <?php } ?>
              
              
              
        </fieldset>
        <fieldset style="width:48%; float:right;">
          <label>Select Product Combination<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
          <div class="chk_name">
                <input type="radio" name="combination" value="video" <?php if($editProInfo['combination'] == "video"){ ?> checked="checked" <?php } ?>>
                <span>Video | Word/Excel/PDF/Image (optinal)</span> </div>
              <div class="chk_name">
                <input type="radio" name="combination" value="videoppt" <?php if($editProInfo['combination'] == "videoppt"){ ?> checked="checked" <?php } ?>>
                <span>Video and PPT | Word/Excel/PDF/Image (optinal)</span> </div>
              <div class="chk_name">
                <input type="radio" name="combination" value="audioppt" <?php if($editProInfo['combination'] == "audioppt"){ ?> checked="checked" <?php } ?>>
                <span>Audio and PPT | Word/Excel/PDF/Image (optinal)</span> </div>
        </fieldset>
        
        <div class="clear"></div>
        
        <fieldset style="width:48%; float:left;">
          <label>Description<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
          <textarea name="description" id="description" style="width:92%;"><?php echo $editProInfo['description'];?></textarea>
        </fieldset>
        
        <fieldset style="width:48%; float:right;">
          <label>price<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
           <input type="text" name="price" id="price" value="<?php echo $editProInfo['price'];?>">
        </fieldset>
        
        
    
        
        
        <div class="clear"></div>
         <fieldset>
        <center> <a href="javascript:void(0);" id="add_from_existing_file" style="color:#666666;">Show/Hide Files</a></center>
         </fieldset>

           <fieldset>
           <div class="manage_file_page" style="display:none;">
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
                      <th>Image Name</th>
                      <!--<th>Thumbnail</th>-->
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                  <?php foreach($files['photo'] as $i){ ?>
                  <tr>
                    <td><input type="checkbox" name="check_file[]" value="<?= $i['file_id'] ?>" <?php if($i['check']){?> checked="checked" <?php } ?> /></td>
                    <td><?=$i['name']?></td>
                    <!-- <td><img src="{$sitepath}front_media/product_files/180X180px/{$i.location}"></td>-->
                    <td><?=$i['size']?>MB</td>
                    <td><?=$i['format']?></td>
                  </tr>
                  <?php } ?>
                  <?php if(count($files['photo']) == 0){ ?>
                  <tr>
                    <td colspan="4">No Records Found.</td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  
                </table>
                <table id="video" class="tbl_myorder" style="display:none;">
                  <tbody>
                    <tr>
                      <th>Select</th>
                      <th>Video Clip Name</th>
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                  <?php foreach($files['video'] as $i){ ?>
                  <tr>
                    <td><input type="checkbox" name="check_file[]" value="<?= $i['file_id'] ?>" <?php if($i['check']){?> checked="checked" <?php } ?> /></td>
                    <td><?=$i['name']?></td>
                    <td><?=$i['size']?>MB</td>
                    <td><?=$i['format']?></td>
                  </tr>
                  <?php } ?>
                  <?php if(count($files['video']) == 0){ ?>
                  <tr>
                    <td colspan="4">No Records Found.</td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  
                </table>
                <table id="audio" class="tbl_myorder" style="display:none;">
                  <tbody>
                    <tr>
                      <th>Select</th>
                      <th>Audio Clip Name</th>
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                 <?php foreach($files['audio'] as $i){ ?>
                  <tr>
                    <td><input type="checkbox" name="check_file[]" value="<?= $i['file_id'] ?>"  <?php if($i['check']){?> checked="checked" <?php } ?>  /></td>
                    <td><?=$i['name']?></td>
                    <td><?=$i['size']?>MB</td>
                    <td><?=$i['format']?></td>
                  </tr>
                  <?php } ?>
                  <?php if(count($files['audio']) == 0){ ?>
                  <tr>
                    <td colspan="4">No Records Found.</td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  
                </table>
                <table id="micro" class="tbl_myorder" style="display:none;">
                  <tbody>
                    <tr>
                      <th>Select</th>
                      <th>Document Name</th>
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                  <?php foreach($files['micro'] as $i){ ?>
                  <tr>
                    <td><input type="checkbox" name="check_file[]" value="<?= $i['file_id'] ?>"  <?php if($i['check']){?> checked="checked" <?php } ?>  /></td>
                    <td><?=$i['name']?></td>
                    <td><?=$i['size']?>MB</td>
                    <td><?=$i['format']?></td>
                  </tr>
                  <?php } ?>
                  <?php if(count($files['micro']) == 0){ ?>
                  <tr>
                    <td colspan="4">No Records Found.</td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  
                </table>
                <table id="pdf" class="tbl_myorder" style="display:none;">
                  <tbody>
                    <tr>
                      <th>Select</th>
                      <th>File Name</th>
                      <th>Size</th>
                      <th>Format</th>
                    </tr>
                 <?php foreach($files['pdf'] as $i){ ?>
                   <tr>
                    <td><input type="checkbox" name="check_file[]" value="<?= $i['file_id'] ?>"  <?php if($i['check']){?> checked="checked" <?php } ?>  /></td>
                    <td><?=$i['name']?></td>
                    <td><?=$i['size']?>MB</td>
                    <td><?=$i['format']?></td>
                  </tr>
                  <?php } ?>
                  <?php if(count($files['pdf']) == 0){ ?>
                  <tr>
                    <td colspan="4">No Records Found.</td>
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
