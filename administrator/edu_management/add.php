<?php
#RequiresFiles:
require_once("../../pi_classes/commonSetting.php");
require_once("../../pi_classes/Admin.php");

#Redirect:
chkAdminLogin();
#Objects:
$Obj		=	new Admin();
#clone:
$ObjDetail	=	clone $Obj;
$objEdu		=	clone $Obj;

#ForEditing Details Of Category-Info-Details Action:
	if(isset($_GET['edit_id']) || $_GET['edit_id']!='')
	{
		$edit_id=base64_decode($_GET['edit_id']);
		$Obj->getEduDtlById($edit_id);
		$editEduInfo = $Obj->getAllRow();
	}

#On Submit Button Below Condtion for Edit And Add Cat Action:
	if($_POST['btnSubmit']!="")
	{
		extract($_POST);
		
			
			$tableName="edu";
			$set_fields = "`name`='".addslashes($name)."'";	
			$where_field="`edu_id`=".$edu_id;			
			$ObjDetail->UPDATE_ANYRECORD_IN_TABLE($tableName,$set_fields, $where_field);		
		
		
			$_SESSION['msg']['updated']='updated';

		header("location:list.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
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
          <label>Educational Institute's Name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
          <input type="text" name="name" id="name" value="<?php echo $editEduInfo['name'];?>" style="width:92%;" />
          <input type="hidden" name="edu_id" id="edu_id" value="<?php echo $editEduInfo['edu_id'];?>" style="width:92%;" />
          
        </fieldset>
        
        <div class="clear"></div>
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
