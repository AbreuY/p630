<?php
#RequiresFiles:
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/Category.php");

#Redirect:
chkAdminLogin();
#Objects:
$Obj		=	new Category();
#clone:
$ObjDetail	=	clone $Obj;
$objCat		=	clone $Obj;

#ForEditing Details Of Category-Info-Details Action:
	if(isset($_GET['edit_id']) || $_GET['edit_id']!='')
	{
		$edit_id=base64_decode($_GET['edit_id']);
		$Obj->getCategoryDtlById($edit_id);
		$editCatInfo = $Obj->getAllRow();
	}

#On Submit Button Below Condtion for Edit And Add Cat Action:
	if($_POST['btnSubmit']!="")
	{
		extract($_POST);
		if($home == "on"){$home = 1;}else{$home = 0;}
		if($expr == "on"){$expr = 1;}else{$expr = 0;}
			
		if($_POST['cat_id']!='')
		{		
			#UpdateAction:
			$tmpComaSeprt = explode(',',$_POST['parentCatId']);
							$parentId = $tmpComaSeprt[0];
							$level	  = $tmpComaSeprt[1] + 1;
			$cat_id=$_POST['cat_id'];
			$set_fields = "`cat_name`='".addslashes($_POST['cat_name'])."',`parent_id`='".$parentId."',`home`='".$home."',`expr`='".$expr."',
							 `cat_level`='".$level."'";	
			$where_field="`cat_id`=".$cat_id;			
			$ObjDetail->updateRecord($set_fields, $where_field);		
			
			if($expr){
			#DeleteExpertiseServiceArea:
				#clone:
				$objDelCatExpertService = clone $objCat;
				$where_field  = "`cat_id`='".$cat_id."' and `parent_cat_id`='".$parentId."' and `cat_level`='".$level."' ";
				$objDelCatExpertService->delete_category_expertise_services($where_field);
			#InsertExpertiseServiceArea:
				#clone:
				$objCatExpertService = clone $objCat;
					#parameters:
					$fields	= "`cat_id`,`parent_cat_id`,`cat_level`,`serviceA`,`serviceB`,`serviceC`,`serviceD`,`serviceE`";
					$values = "'".$cat_id."','".$parentId."','".$level."','".$serviceA."','".$serviceB."','".$serviceC."','".$serviceD."','".$serviceE."'";
				$objCatExpertService->insert_category_expertise_services($fields,$values);
			}
			$_SESSION['msg']['updated']='updated';
		}
		else
		{
			#InsertAction:
			$tmpComaSeprt = explode(',',$_POST['parentId']);
							$parentId = $tmpComaSeprt[0];
							$level	  = $tmpComaSeprt[1] + 1;
			$dfields	   = "`cat_id`,`cat_name`,`parent_id`,`cat_level`,`home`, `expr`" ;
			$dvalues	   = "'','".addslashes($_POST['cat_name'])."','".$parentId."','".$level."','".$home."','".$expr."'";
			$catInsertedId = $ObjDetail->insertRecord($dfields,$dvalues);	
			
			if($expr && $catInsertedId){
			#InsertExpertiseServiceArea:
				#clone:
				$objCatExpertService = clone $objCat;
					#parameters:
					$fields	= "`cat_id`,`parent_cat_id`,`cat_level`,`serviceA`,`serviceB`,`serviceC`,`serviceD`,`serviceE`";
					$values = "'".$catInsertedId."','".$parentId."','".$level."','".$serviceA."','".$serviceB."','".$serviceC."','".$serviceD."',
							  '".$serviceE."'";
				$objCatExpertService->insert_category_expertise_services($fields,$values);
			}
					
			$_SESSION['msg']['added']='added';
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
    <input type="hidden" name="cat_id" id="cat_id" value="<?php echo $Obj->getField('cat_id');?>">
    <article class="module width_full">
      <header>
        <h3>
          <?php if(isset($_GET['edit_id'])){ echo "Edit";}else{ echo "Add";}?>
          Category</h3>
      </header>
      <header>
        <div style="float: left;padding: 5px 0 0 20px;"> <a href="<?php echo AbstractDB::SITE_PATH;?>administrator/category_management/list.php" title="Go back"> <img src="../images/back_icon2.png" border="0" /></a> </div>
      </header>
      <div class="module_content">
        <fieldset>
          <span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
        </fieldset>
        <fieldset style="width:48%; float:left;">
          <label>Category Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
          <input type="text" name="cat_name" id="cat_name" value="<?php echo $Obj->getField('cat_name');?>" style="width:92%;" 
          onkeyup="document.getElementById('serviceName').innerHTML=this.value;"/>
        </fieldset>
        <div class="clear"></div>
        <?php 
				#clone:
				$objParentCat = clone $objCat;
				$objParentCat->getCategoryDtlById($Obj->getField('parent_id'));
				$objParentCat->getRow();
			if($_GET['edit_id']&&$objParentCat->getField('cat_id')){
		?>
        <fieldset style="width:48%; float:left;" id="chngParentCatId">
          <label>Parent Category Name : <sup style="color:#FF0000;font-weight:bold;"></sup></label>
          <input type="text" name="parentCatName" id="parentCatName" value="<?php echo $objParentCat->getField('cat_name');?>" 
                            style="width:92%;" />
          <input type="hidden" name="parentCatId" id="parentCatId" style="width:92%;"
                            value="<?php echo $objParentCat->getField('cat_id').",".$objParentCat->getField('cat_level');?>" />
        </fieldset>
        <div class="clear"></div>
        <?php }?>
        <fieldset style="width:48%;float:left;">
          <label>Parent<sup style="color:#FF0000;font-weight:bold;"></sup></label>
          <select name="parentId" id="parentId" style="width:92%;" 
		  <?php if($_GET['edit_id']){?> onchange="showSelectedParentCatName(this.value);" <?php }?>>
            <option value="0,0">Main</option>
            <?php 
									$obj2=clone $objCat; 
									$arr = $obj2->fetAllCats(0,1);
									echo $obj2->printMyValues($arr); 
                                ?>
          </select>
        </fieldset>
        <div class="clear"></div>
        <fieldset id="chk_home" style="width:48%;float:left;<?php if($Obj->getField('cat_level')>2){?>display:none;<? }?>">
          <label>Display:</label>
          <table border="1">
            <tr>
              <th>On home Page:</th>
              <th>On Expertise:</th>
            </tr>
            <tr>
              <td><input type="checkbox" name="home" id="home"  style="width:92%;" <?php if(isset($_GET['edit_id'])){
																										if($Obj->getField('home')){?> 
                                                                                                        checked="checked"
                                                                                                  <?php }
																									} ?>/></td>
              <td><input type="checkbox" name="expr" id="expr"  style="width:92%;" <?php if(isset($_GET['edit_id'])){
																										if($Obj->getField('expr')){?> 
                                                                                                        checked="checked"
                                                                                                  <?php }
																									} ?>/></td>
            </tr>
          </table>
        </fieldset>
        <div class="clear"></div>

        <div id="expertServicesDiv" style=" <?php if($editCatInfo['cat_level']!=2){?>display:none;<? }?>"> 
        <!--<fieldset style="width:48%;float:left; margin-right: 3%;">
        	<span style="color:#000;font-weight:bold;padding-left:12px;">
			<?//=$objParentCat->getField('cat_name');?></span>
        </fieldset>-->
        <fieldset style="width:48%;float:left; margin-right: 3%;">Which services are you willing to offer in 
        <span id="serviceName" style="color:#000;font-weight:bold;"><?=$Obj->getField('cat_name');?></span></fieldset>
		<!--/Get Service Area Name:/-->	
	   <?php  	         
	   	#clone:
		$objGetExpertService = clone $objCat;
        $objGetExpertService->select_category_expertise_services($catId = $Obj->getField('cat_id'),$parentCatId = $Obj->getField('parent_id'));
        $expertServiceRow = $objGetExpertService->getAllRow();
       ?>     
         <fieldset id="chk_home" style="width:100%;float:left; margin-right: 3%;<?php if($editCatInfo['cat_level']>2){?>display:none;<? }?>">
          <label>Sevices Name:</label>
	                    <fieldset style="width:48%; float:left;">
                            <label><strong>1.</strong>
                            <input type="text" id="serviceA" name="serviceA" value="<?=$expertServiceRow['serviceA'];?>">
                            </label>
                        </fieldset>
                        <fieldset style="width:48%; float:left;">
                            <label><strong>2.</strong>
                            <input type="text" id="serviceB" name="serviceB" value="<?=$expertServiceRow['serviceB'];?>">
                            </label>
                        </fieldset>
                        <fieldset style="width:48%; float:left;">
                            <label><strong>3.</strong>
                            <input type="text" id="serviceC" name="serviceC" value="<?=$expertServiceRow['serviceC'];?>">
                            </label>
                        </fieldset>
                        <fieldset style="width:48%; float:left;">
                            <label><strong>4.</strong>
                            <input type="text" id="serviceD" name="serviceD" value="<?=$expertServiceRow['serviceD'];?>" >
                            </label>
                        </fieldset>
                        <fieldset style="width:48%; float:left;">
                            <label><strong>5.</strong>
                            <input type="text" id="serviceE" name="serviceE" value="<?=$expertServiceRow['serviceE'];?>">
                            </label>
                        </fieldset>
        </fieldset>
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
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery("#frmCategory").validate({
		errorElement:'div',
		rules: {
			cat_name: {
				required: true,
				//remote  : "../ajax/ajax_request.php?crntCatId="+$("#cat_id").val()+"&action=chk_cat_duplication"
			}
		},
		messages: {
			cat_name:{
				required:"Please enter category name",
				//remote  :"Sorry, category name already exists."	
			}
		}
	});
	
	jQuery('#btnCancel').click(function(){
		location.href="list.php";
	});
	$("#parentId").change(function(){

		var arr 	   = $(this).val().split(",");
		     	  		 $('#flagParentId').val(arr[1]);
		var serviceLvl = $("#flagParentId").val();

		if(arr[1]==1 || arr[1]==0){
			$("#chk_home").show();
			if(arr[1]==1 && serviceLvl==1 && $('#expr').is(':checked')){
				$('#expertServicesDiv').show();
				$('#serviceName').html($('#cat_name').val());
			}else{
				$('#expertServicesDiv').hide();
				$('#serviceName').html($('#cat_name').val());
			}
		}else{
			$("#chk_home").hide();
			$('#expertServicesDiv').hide();
			$('#serviceName').html($('#cat_name').val());
		}
	});
	
	/*--ExpertiseService--*/
		$('#expr').click(function(){
			var serviceLvl = $("#flagParentId").val();
			if(serviceLvl==2){
				if($('#expr').is(':checked')){
					$('#expertServicesDiv').show();
					$('#serviceName').html($('#cat_name').val());
				}
				else{
					$('#expertServicesDiv').hide();
					$('#serviceName').html($('#cat_name').val());
				}
			}
		});
	
		if($('#expr').is(':checked')){
			var serviceLvl = $("#flagParentId").val();
			if(serviceLvl==2){
				$('#expertServicesDiv').show();
				$('#serviceName').html($('#cat_name').val());
			}
		}
		else{
			$('#expertServicesDiv').hide();
			$('#serviceName').html($('#cat_name').val());
		}
	/*--ExpertiseService--*/	
});
function showSelectedParentCatName(thisVal){
	var thisVal = thisVal.split(',');
		
	jQuery.ajax({
		url: "../ajax/ajax_request.php",
		type: "post",
		data:"action=get_cat_name_by_id&cat_id="+thisVal[0],
		success:function(msg){
			jQuery('#chngParentCatId').html(msg);
			//window.location.href='<?php//echo AbstractDB::SITE_PATH;?>supplier_registration.php';
			//Hide_Load();
		}
	});
}
</script>
</div>
</body>
</html>
