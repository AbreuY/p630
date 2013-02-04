<?php
require_once("../../pi_classes/commonSetting.php");
chkAdminLogin($_SESSION['adminID']);
require_once("../../pi_classes/Admin.php");
	
$objActReqDtl=new Admin();
$activity_id=base64_decode($_REQUEST['act_id']);
$arrFieldDtl=array();
$objActReqDtl->getActivityRequirement($activity_id);
$i=1;
while($temp=$objActReqDtl->getRow())
{
	$requirement_id=$objActReqDtl->getField('requirement_id');
	$arrFieldDtl[$i]['field_name']=$objActReqDtl->getField('field_name');
	$arrFieldDtl[$i]['field_type']=$objActReqDtl->getField('field_type');	
	$arrFieldDtl[$i]['required_option']=$objActReqDtl->getField('required');	
	$arrFieldDtl[$i]['validation_option']=$objActReqDtl->getField('validation_type');	
		$objActReqOption=clone $objActReqDtl;
		$objActReqOption->getActReqOptionDtl($requirement_id);
		$j=1;
		if($objActReqOption->numofrows()>0)
		{
				while($temp=$objActReqOption->getRow())
				{
					$arrFieldDtl[$i]['option'][$j]['option_name']=$objActReqOption->getField('option_name');	
					$arrFieldDtl[$i]['option'][$j]['option_value']=$objActReqOption->getField('option_values');	
					$j++;
				}
		}
		$i++;
}

/*	echo "<pre>";
		print_r($arrFieldDtl);
	echo "</pre>";
*/
		if(isset($_REQUEST['btnSubmit'])=="Update")
		{
			echo "<pre>";
				print_r($_POST);
			echo "</pre>";
			
				
			$objInsertActReq=clone $objActReqDtl;
			$objInsertActReq->updateActivityExtraDetail($_POST);
			$_SESSION['msg']['activity_requirement_updated']="Activity specific requirement updated successfully.";
			header("location:".AbstractDB::SITE_PATH."admin/activity/list.php?user_id=".$_REQUEST['user_id']);
		}		
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IN ADMIN PANEL | Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/layout.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>admin/css/ie.css" type="text/css" media="screen" />
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>admin/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>css/validationEngine.jquery.css" type="text/css"/>
<script src="<?php echo AbstractDB::SITE_PATH;?>js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery("#frm_activity_requirement").validationEngine();
});
</script>

<script type="text/javascript">
$(function() {
	var field_cnt;
	//var i = $('#more_price').size() + 1;
		$('a.add').click(function() {
			$("#submitdiv").css('display','block');
		appendElement="";
		field_cnt=parseInt(jQuery("#noofrequirement").val())+1;

appendElement+='<div id="more_requirement'+field_cnt+'" class="feailds" style="background: none repeat scroll 0 0 #F6F6F6;border: 1px solid #CCCCCC;border-radius: 5px 5px 5px 5px; margin: 5px 10px;padding: 1% 0;">';
appendElement+='<div class="link_div_otr" style="width:98%;min-height:inherit">';
	appendElement+='<div class="form_data">';
			appendElement+='<label for="activity_name">Requirement Title<sup style="color:#FF0000;font-weight:bold;">*</sup></label>';
				appendElement+='<input type="text" name="field['+field_cnt+'][field_name]" style="width:600px" class="validate[required]"> <br> <br>';
	appendElement+='</div>';
	
	appendElement+='<div class="form_data">';
			appendElement+='<label for="activity_name">Requirement Type<sup style="color:#FF0000;font-weight:bold;">*</sup></label>';
				appendElement+='<select name="field['+field_cnt+'][field_type]" id="requirement_type'+field_cnt+'" onchange="control_addField(this.value,'+field_cnt+');" class="validate[required]" class="validate[required]" style="width:200px">';
					appendElement+='<option value="">-- Select--</option>';
					appendElement+='<option value="text">Text Box </option>';
					appendElement+='<option value="textarea">Text Area </option>';
					appendElement+='<option value="checkbox">Check Box</option>';
					appendElement+='<option value="dropdown">DropDown</option>';
					appendElement+='<option value="radio">Radio Button</option>';
				appendElement+='</select>';
				
				appendElement+='&nbsp;<a href="javascript:void(0)" onclick="add_option('+field_cnt+')" id="addoption_'+field_cnt+'" style="display:none">Add Option</a>&nbsp;';
				appendElement+='<a href="javascript:void(0)" onclick="remove_option('+field_cnt+')" id="removeoption_'+field_cnt+'" style="display:none">Remove Option</a>';
				appendElement+='<input type="hidden" name="option_cnt_'+field_cnt+'" id="option_cnt_'+field_cnt+'" value="1">';
				appendElement+='<div id="option_div_'+field_cnt+'" name="option_div_'+field_cnt+'"></div>';
	appendElement+='</div>';		
		
	appendElement+='<div class="form_data"><br>';
			appendElement+='<label for="activity_name">Validation Required<sup style="color:#FF0000;font-weight:bold;">*</sup></label>';
			appendElement+='<select name="field['+field_cnt+'][required_option]" id="required'+field_cnt+'" class="validate[required]" style="width:200px">';
				appendElement+='<option value="">-- Select--</option>';
				appendElement+='<option value="Yes">Yes</option>';
				appendElement+='<option value="No">No</option>';
			appendElement+='</select>';
	appendElement+='</div>';

	appendElement+='<div class="form_data"><br>';
			appendElement+='<label for="activity_name">Validation Type<sup style="color:#FF0000;font-weight:bold;">*</sup></label>';
			appendElement+='<select name="field['+field_cnt+'][validation_option]" id="validation'+field_cnt+'" class="validate[required]" style="width:200px">';
				appendElement+='<option value="">--Select--</option>';
				appendElement+='<option value="text">Text</option>';
				appendElement+='<option value="email">Email</option>';
				appendElement+='<option value="number">Number</option>';
				appendElement+='<option value="date">Date</option>';
			appendElement+='</select>';
	appendElement+='</div>';
appendElement+='</div>';		
appendElement+='</div>';	
	$(appendElement).appendTo('#requirement');
	
			field_cnt++;
			jQuery("#noofrequirement").val(field_cnt-1);
		});		

	$('a.remove').click(function()
	{
		field_cnt=parseInt(jQuery("#noofrequirement").val());
				if(field_cnt >= 1)
				{
					$('#more_requirement'+field_cnt).animate({opacity:"hide"}, "slow").detach();
					jQuery("#noofrequirement").val(field_cnt-1);
				}
		if(field_cnt==1)		
		{
			$("#submitdiv").css('display','none');
		}
	});
	
	$('a.reset').click(function()
	{
		field_cnt=parseInt(jQuery("#noofrequirement").val());
		while(field_cnt > 0) {
			$('#more_requirement'+field_cnt).remove();
			field_cnt--;
		}
		jQuery("#noofrequirement").val(0);
		$("#submitdiv").css('display','none');
	});
});

function add_option(field_id)
{
	var option_cnt=parseInt($("#option_cnt_"+field_id).val());
	var appendEle="";
	appendEle+='<div id="option_div_'+field_id+"_"+option_cnt+'" name="option_div_'+field_id+'" class="option_remove_'+field_id+"_"+option_cnt+'" style="margin-left:25px">';
	appendEle+='<table>';
	if(option_cnt==1)
	{
		appendEle+='<tr><td>Option Name</td><td>Option value</td></tr>';
	}
	
	appendEle+='<tr><td><input type="text" name="field['+field_id+'][option]['+option_cnt+'][option_name]" id="optionName'+option_cnt+'" style="width:200px" class="validate[required]" /></td>';
	appendEle+='<td><input type="text" name="field['+field_id+'][option]['+option_cnt+'][option_value]" id="optionValue'+option_cnt+'" style="width:200px" class="validate[required]" /></td>';
	appendEle+='</tr></table></div>';
	$(appendEle).appendTo('#option_div_'+field_id);
	option_cnt++;
	$('#option_cnt_'+field_id).val(option_cnt);
}

function remove_option(field_id)
{
	var option_cnt=parseInt($("#option_cnt_"+field_id).val());
		if(option_cnt > 1)
		{
			//$("#option_div_"+field_id+"_"+(option_cnt-1)).animate({opacity:"hide"}, "slow").detach();
			$("#option_div_"+field_id+"_"+(option_cnt-1)).animate({
				opacity: 0.25,
				height: 'toggle'
			  }, 300, function(){
			 	 $("#option_div_"+field_id+"_"+(option_cnt-1)).remove();
			  });
			  
			$("#option_cnt_"+field_id).val(option_cnt-1);
		}
}
function control_addField(control_type, field_cnt)
{ 
	//var remove_all_option="#fieldSection_"+control_link;
	var control_linkID='#addoption_'+field_cnt;
	var remove_control_linkID='#removeoption_'+field_cnt;
	//var remove_cls=".field"+section_cnt+":last";
	//var removeImage=".option_remove_"+control_link;
	if(control_type=='text')
	{
			$("#option_div_"+field_cnt).animate({
					opacity: 100,
					height: 'toggle'
				  }, 500, function(){
					 $("#option_div_"+field_cnt).html('').css('display','block');
					  $("#option_cnt_"+field_cnt).val(1);
				  });
		$(control_linkID).hide();
		$(remove_control_linkID).hide();
		//#option_div_'+field_id
	}
	else
	if(control_type=='textarea')
	{
			$("#option_div_"+field_cnt).animate({
					opacity: 100,
					height: 'toggle'
				  }, 500, function(){
					 $("#option_div_"+field_cnt).html('').css('display','block');
					 $("#option_cnt_"+field_cnt).val(1);
				  });
		$(control_linkID).hide();
		$(remove_control_linkID).hide();
		//#option_div_'+field_id
	}
     else 
	 if(control_type=='dropdown') 
	 {
	    $(control_linkID).show();	
	    $(remove_control_linkID).show();	
			$("#option_div_"+field_cnt).animate({
					opacity: 100,
					height: 'toggle'
				  }, 500, function(){
					 $("#option_div_"+field_cnt).html('').css('display','block');
					  $("#option_cnt_"+field_cnt).val(1);
				  });
	 } 
	 else if(control_type=='checkbox') 
	 {
	    $(control_linkID).show();	
	    $(remove_control_linkID).show();	
			$("#option_div_"+field_cnt).animate({
					opacity: 100,
					height: 'toggle'
				  }, 500, function(){
					 $("#option_div_"+field_cnt).html('').css('display','block');
					  $("#option_cnt_"+field_cnt).val(1);
				  });
	 }
	  else if(control_type=='radio') 
	 {
	    $(control_linkID).show();	
	    $(remove_control_linkID).show();	
			$("#option_div_"+field_cnt).animate({
					opacity: 100,
					height: 'toggle'
				  }, 500, function(){
					 $("#option_div_"+field_cnt).html('').css('display','block');
					  $("#option_cnt_"+field_cnt).val(1);
				  });
	 }
	else
	{
		$(control_linkID).hide();	
		$(remove_control_linkID).hide();
			$("#option_div_"+field_cnt).animate({
					opacity: 100,
					height: 'toggle'
				  }, 500, function(){
					 $("#option_div_"+field_cnt).html('').css('display','block');
					  $("#option_cnt_"+field_cnt).val(1);
				  });
	}
}
</script>
<title>Add Activity</title>
<style>
#loading { 
width: 70%; 
text-align:center;
padding-top:40px;
position: absolute;
}
</style>
</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>
		<section id="main" class="column">		
		<form name="frm_activity_requirement" id="frm_activity_requirement" method="POST">
		<article class="module width_full" style="width:95%">
		<div id="loading"></div>		
			<?php include("../supplier_menu.php");?>
		<header><h3 class="tabs_involved">Add Activity Requirement</h3>
		</header>
		<div class="module_content">
							<fieldset style="width:100%; float:left;">
								<span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
							</fieldset><div class="clear"></div>
							<input type="hidden" name="noofrequirement" id="noofrequirement" value="<?php echo count($arrFieldDtl);?>">
							<input type="hidden" name="activity_id" id="activity_id" value="<?php echo base64_decode($_REQUEST['act_id']); ?>">
							<fieldset style="width:100%; float:left;">
									<h2 style="margin-left:10px">Activity Specific Requirement</h2>
									<p style="margin-left:15px">Add acitivity specific rquirement here. For example: being under 100kg to tandem skydive.</p>
									<div class="feailds" id="requirement">
													<div class="form_data">
														<span class="maintext" style="margin-top:5px;margin-left:10px">
															<strong>
																<a class="add"><img width="24" height="24" title="add input" alt="add" src="<?php echo AbstractDB::SITE_PATH;?>images/add.png"></a>
																<a class="remove"><img width="24" height="24" alt="remove input" src="<?php echo AbstractDB::SITE_PATH;?>images/remove.png"></a>
																<a class="reset"><img width="24" height="24" alt="reset" src="<?php echo AbstractDB::SITE_PATH;?>images/reset.png"></a>
															</strong>
														</span>
														<span class="maintext">  
															<strong>Requirment?</strong>
														</span>	
													</div>
									 </div>
							<div class="clear"></div>
<?php foreach($arrFieldDtl as $field_cnt=>$field)
{
?>
<div id="more_requirement<?php echo $field_cnt;?>" class="feailds" style="background: none repeat scroll 0 0 #F6F6F6;border: 1px solid #CCCCCC;border-radius: 5px 5px 5px 5px; margin: 5px 10px;padding: 1% 0;">
<div class="link_div_otr" style="width:98%;min-height:inherit">

	<div class="form_data">
			<label for="activity_name">Requirement Title<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
				<input type="text" name="field[<?php echo $field_cnt;?>][field_name]" style="width:600px" class="validate[required]" value="<?php echo $field['field_name'];?>">
	</div>
	
	<div class="form_data">
	<br /><br />
			<label for="activity_name">Requirement Type<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
				<select name="field[<?php echo $field_cnt;?>][field_type]" id="requirement_type<?php echo $field_cnt;?>" onchange="control_addField(this.value,<?php echo $field_cnt;?>);" class="validate[required]" style="width:200px">
					<option value="">-- Select--</option>
					<option value="text" <?php if($field['field_type']=="text"){?>selected="selected"<?php }?>>Text Box </option>
					<option value="textarea" <?php if($field['field_type']=="textarea"){?>selected="selected"<?php }?>>Text Area </option>
					<option value="checkbox" <?php if($field['field_type']=="checkbox"){?>selected="selected"<?php }?>>Check Box</option>
					<option value="dropdown" <?php if($field['field_type']=="dropdown"){?>selected="selected"<?php }?>>DropDown</option>
					<option value="radio" <?php if($field['field_type']=="radio"){?>selected="selected"<?php }?>>Radio Button</option>
				</select><?php if($field['field_type']=="checkbox" || $field['field_type']=="radio" || $field['field_type']=="dropdown") {?>
				&nbsp;<a href="javascript:void(0)" onclick="add_option(<?php echo $field_cnt;?>)" id="addoption_<?php echo $field_cnt;?>" style="display:inline">Add Option</a>&nbsp;<a href="javascript:void(0)" onclick="remove_option(<?php echo $field_cnt;?>)" id="removeoption_<?php echo $field_cnt;?>" style="display:inline">Remove Option</a>
				<?php } else { ?>
				
					&nbsp;<a href="javascript:void(0)" onclick="add_option(<?php echo $field_cnt;?>)" id="addoption_<?php echo $field_cnt;?>" style="display:none">Add Option</a>&nbsp;<a href="javascript:void(0)" onclick="remove_option(<?php echo $field_cnt;?>)" id="removeoption_<?php echo $field_cnt;?>" style="display:none">Remove Option</a>
				<?php } ?>
				
				<input type="hidden" name="option_cnt_<?php echo $field_cnt;?>" id="option_cnt_<?php echo $field_cnt;?>" value="<?php echo count($field['option'])+1;?>">
				<div id="option_div_<?php echo $field_cnt;?>" name="option_div_<?php echo $field_cnt;?>">
					<?php foreach($field['option'] as $option_cnt=>$option) { ?>
					<div id="option_div_<?php echo $field_cnt;?>_<?php echo $option_cnt;?>" name="option_div_<?php echo $field_cnt;?>" class="option_remove_<?php echo $field_cnt;?>_<?php echo $option_cnt;?>" style="margin-left:25px">
						<table>
						<?php if($option_cnt==1)
						{
						?>
							<tr><td>Option Name</td><td>Option value</td></tr>
						<?php	
						}	
						?>
						<tr>
								<td><input type="text" name="field[<?php echo $field_cnt;?>][option][<?php echo $option_cnt;?>][option_name]" id="optionName<?php echo $option_cnt;?>" style="width:200px" value="<?php echo $option['option_name'];?>" class="validate[required]" /></td>
								<td><input type="text" name="field[<?php echo $field_cnt;?>][option][<?php echo $option_cnt;?>][option_value]" id="optionValue<?php echo $option_cnt;?>" style="width:200px" value="<?php echo $option['option_value'];?>" class="validate[required]" /></td>
							</tr>
							</table>
					</div>
					<?php } ?>
				</div>	
		</div>		
	
	<div class="form_data">
			<label for="activity_name">Validation Required<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
			<select name="field[<?php echo $field_cnt;?>][required_option]" id="required<?php echo $field_cnt;?>" class="validate[required]" style="width:200px">
				<option value="">-- Select--</option>
				<option value="Yes" <?php if($field['required_option']=="Yes"){?>selected="selected" <?php } ?>>Yes</option>
				<option value="No" <?php if($field['required_option']=="No"){?>selected="selected" <?php } ?>>No</option>
			</select>
	</div>

	<div class="form_data">
			<label for="activity_name">Validation Type<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
			<select name="field[<?php echo $field_cnt;?>][validation_option]" id="validation<?php echo $field_cnt;?>" class="validate[required]" style="width:200px">
				<option value="">--Select--</option>
				<option value="text" <?php if($field['validation_option']=="text"){?> selected="selected" <?php }?>>Text</option>
				<option value="email" <?php if($field['validation_option']=="email"){?> selected="selected" <?php }?>>Email</option>
				<option value="number" <?php if($field['validation_option']=="number"){?> selected="selected" <?php }?>>Number</option>
				<option value="date" <?php if($field['validation_option']=="date"){?> selected="selected" <?php }?>>Date</option>
			</select>
	</div>
</div>	
</div>	
<?php 
}
?>
	<div class="feailds" id="requirement"></div>
</fieldset>
				<div id="submitdiv" name="submitdiv" style="background: none repeat scroll 0 0 #F6F6F6;border: 1px solid #CCCCCC;border-radius: 5px 5px 5px 5px; margin: 5px 0px;padding: 1% 0;display:block;width:100%;height:25px">
							<div class="submit_link">
								<input type="submit" name="btnSubmit" id="btnSubmit" value="Update" class="alt_btn">
								<input type="reset" name="btnReset" id="btnReset" value="Reset">
								<input type="button" name="btnCancel" id="btnCancel" value="Cancel" class="btn_cancel">
							</div>
				</div>	
										

							</div><div class="clear"></div>
							
		</div>
</article><!-- end of post new article -->
</form>
	<div class="spacer"></div>
</section>
</body>
</html>