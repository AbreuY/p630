<?php
#RequiresFiles:
	require_once('../../pi_classes/commonSetting.php');
	require_once('../../pi_classes/Admin.php');
	require_once('../../pi_classes/User.php');	
#Redirect:
		chkAdminLogin();
#Objects:
	$objAdmin 	= new Admin();
	$objUser    =	new User();
	$objCat		=	new User();

#GetVar:
	$advisorId	= base64_decode($_GET['advisorId']);

#GetExpertiseAreaCategoryFromDatabase:
	#clone:
	$objGetExperCat = clone $objUser;
	#prameter:
	$setColoumFields = "*";
	$tableName 		 = "category";
	$whereField 	 = "`parent_id`='0' and `cat_level`='1' and `expr`='1' ORDER BY cat_name ASC";
	$objGetExperCat->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
	$numOfExperCat 	 = $objGetExperCat->numofrows();
	$lp = "1"; 
	while($tmpRow = $objGetExperCat->getAllRow()){
		  $tmpRow['lp']	= $lp;
		  $area_expertise_cat[]	= $tmpRow;
		$lp++; 
	}

#GetExpertiseAreaCategoryFromDatabase:
	#clone:
	$objGetExperCat = clone $objUser;
	#prameter:
	$setColoumFields = "*";
	$tableName 		 = "category";
	$whereField 	 = "`parent_id`='0' and `cat_level`='1' and `expr`='1' ORDER BY cat_name ASC";
	$objGetExperCat->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
	$numOfExperCat 	 = $objGetExperCat->numofrows();
	$lp = "1"; 
	while($tmpRow = $objGetExperCat->getAllRow()){
		  $tmpRow['lp']	= $lp;
		  #Query::-
		  	#clone:
			$objGetSubCat = clone $objUser;
			#prameter:
			$setColoumFields = "*";
			$tableName 		 = "category";
			$whereField 	 = "`parent_id`='".$tmpRow['cat_id']."' and `cat_level`='2' and `expr`='1' ORDER BY cat_name ASC";
			$objGetSubCat->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
			$numOfExperSubCat= $objGetSubCat->numofrows();
			$lpSub = "1"; 
			while($tmpSubCatRow = $objGetSubCat->getAllRow()){
				 #Query::-ForFetchingServices:  
					#clone:
					$objGetSubCatService = clone $objUser;
					#prameter:
					$setColoumFields = "*";	$tableName 		 = "category_expertise_services";
					$whereField 	 = "`parent_cat_id`='".$tmpRow['cat_id']."' and `cat_level`='2' and `cat_id`='".$tmpSubCatRow['cat_id']."'";
					$objGetSubCatService->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
					$tmpSubCatService 		 = $objGetSubCatService->getAllRow();
					$numOfExperSubCatService = $objGetSubCatService->numofrows();
						#-:
						$tmpSubCatRow['serviceA']	= $tmpSubCatService['serviceA']; 	
						$tmpSubCatRow['serviceB']	= $tmpSubCatService['serviceB']; 	
						$tmpSubCatRow['serviceC']	= $tmpSubCatService['serviceC']; 	
						$tmpSubCatRow['serviceD']	= $tmpSubCatService['serviceD']; 	
						$tmpSubCatRow['serviceE']	= $tmpSubCatService['serviceE']; 	
						#-:						
						$tmpSubCatRow['lpSub']	= $lpSub;
						$tmpRow['subServices'][] = $tmpSubCatRow;
				$lpSub++;
			}
		  $services_expertise_subcat[]	= $tmpRow;
		$lp++; 
	}
	#echo "<pre>"; print_r($services_expertise_subcat); echo "</pre>";

#Action::ExpertiseInfo:
	/*Case A~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
	#GetAdvisorEducation:
	$objAdvExpr = clone $objUser;

	#prameter:
	$setColoumFields = "*";
	$tableName 		 = "advisor_expertise";
	$whereField 	 = "`advisor_id` = '".$advisorId."'";
	$objAdvExpr->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
	$numOfAdvExpr 	 = $objAdvExpr->numofrows();
	$lp = "1"; 
	while($tmpRow = $objAdvExpr->getAllRow()){
		  $tmpRow['lp']	= $lp;
		  $area_service_catid[]		= $tmpRow['area_service_id'];
		  $area_service_subcatid[]	= $tmpRow['expertise_cat_id'];
		  $advExpAreaServiceInfo[$tmpRow['expertise_cat_id']] = $tmpRow;
		$lp++; 
	}
	#$numOfAdvExpr; 
	/*echo "<pre>"; print_r($area_service_catid);	echo "</pre>";	
	echo "<pre>"; print_r($area_service_subcatid);	echo "</pre>";	
	echo "<pre>"; print_r($advExpAreaServiceInfo);	echo "</pre>";	*/

	/*End::Case A~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/	

			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IN ADMIN PANEL | Powered by <?php echo AbstractDB::SITE_TITLE;?></title>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/layout.css" type="text/css" media="screen" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo AbstractDB::SITE_PATH;?>administrator/css/ie.css" type="text/css" media="screen" />
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/hideshow.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.validate.js" language="javascript" type="text/javascript"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/password_strength_plugin.js"  language="javascript" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.core.js"></script> 
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.datepicker.js"></script>	
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.all.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.theme.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.core.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.datepicker.css" rel="stylesheet" /> 
<script type="text/javascript">
jQuery(document).ready(function() { 
	// CODE FOR ADVISOR PERSONAL INFORMATION //
		jQuery("#frmEditAdvisorInfo").validate({
		errorElement:'div',
		rules: {
			firstName:{
				required:true
			},
			lastName:{
				required:true
			},
			email:{
				required: true,
				email:true,
				remote:{
					url: "../ajax/ajax_request.php",
					type: "post",
					data: {
					  action:"chk_user_other_email",old_email:jQuery('#old_email').val()
					}
				}
			},	
			phoneNumber:{
				required: true
			} 
		},
		messages:{
			firstName:{
				required:"Please specify first name."
			},
			lastName: {
				required:"Please specify last name."
			},
			email: {
				required:"Please specify email id.",
				email:"Please specify valid email id.",
				remote:"This email id already exist, please try another."
			},
			phoneNumber:{
				required:"Please specify address.",
				number: "Please specify numeric charecters."	
			}
		}
	});

	//Cancel Button Code:
	jQuery('#btnCancel').click(function(){
		location.href="manage_advisor.php";
	});
});
</script>

</head>
<body>
	<?php include("../header.php");?>	
	<?php include("../menu.php");?>	
	<section id="main" class="column">
	    <?php if(isset($_SESSION['msg']['delete'])){ ?>
		<h4 class="alert_success">Record deleted successfully!</h4>
		<?php unset($_SESSION['msg']['delete']); } ?>	
		<?php if(isset($_SESSION['msg']['added'])){ ?>
			<h4 class="alert_success">Record added successfully!</h4>
		<?php unset($_SESSION['msg']['added']); } ?>	
		<?php if(isset($_SESSION['msg']['updated'])){ ?>
			<h4 class="alert_success">Record updated successfully!</h4>
		<?php 
			unset($_SESSION['msg']['updated']);
		} ?>			
		<form name="profileExprForm" id="profileExprForm" method="post" action="edit_advisor_action.php" >
		<input type="hidden" name="advisor_id" id="advisor_id" value="<?php echo base64_decode($_REQUEST['advisorId']);?>" />
		<article class="module width_full">
			<?php 
				$pageName = "myExpertiseInfo";
				include("../supplier_menu.php");
			?>
			<header>
				<div style="float: left;padding: 5px 0 0 20px;">
					<a href="<?php echo AbstractDB::SITE_PATH;?>administrator/user_management/manage_advisor.php" title="Go back">
                    <img src="../images/back_icon2.png" border="0" /></a>
				</div>
			</header>
				<div class="module_content">
						<fieldset>
							<span style="color:#000;font-weight:bold;padding-left:12px;">In which areas would you like to offer your services?</span>
						</fieldset>
                        <?php foreach($area_expertise_cat as $key=>$exprAreaRow){ ?>
                        <fieldset style="width:48%; float:left;"><!-- margin-right: 3%;-->
							<label>
                                <input type="checkbox" id="expertArea<?=$exprAreaRow['cat_id'];?>" name="expertArea[]" 
                                value="<?=$exprAreaRow['cat_id'];?>" onclick="showSubServiceArea('<?=$exprAreaRow['cat_id'];?>');"
                                <?php if(in_array($exprAreaRow['cat_id'],$area_service_catid)==1){?> checked="checked" <?php }?> />
                                <strong><?=$exprAreaRow['cat_name'];?></strong>
                            </label>
						</fieldset>
						 <?php }?>
                        <div class="clear"></div>
               <!--{*--/Start::Admission/--*}-->
                 <?php foreach($services_expertise_subcat as $key=>$servicesExpertSubcat){ ?>
                <fieldset>                
                    <div class="clear"></div>
                    <div id="divId<?=$servicesExpertSubcat['cat_id'];?>"
                     <?php if(in_array($servicesExpertSubcat['cat_id'],$area_service_catid)==0){?> style="display:none;" <?php }?>>

                             <fieldset><span style="color:#000;font-weight:bold;padding-left:12px;"><?=$servicesExpertSubcat['cat_name'];?></span></fieldset>
                             <fieldset>In which degree do you have <?=$servicesExpertSubcat['cat_name'];?> expertise (pick up to 3)?</fieldset>
                        
                        
                        <?php foreach($servicesExpertSubcat['subServices'] as $keysbA1=>$subServices){ ?>
                           <fieldset style="width:48%;float:left;">
                                <label>
                                <input type="checkbox" class="checkAdd" name="expertise_cat_id[<?=$servicesExpertSubcat['cat_id'];?>][]"
                                 value="<?=$subServices['cat_id'];?>" data-ck="<?=$subServices['cat_id'];?>" 
                                 <?php if(in_array($subServices['cat_id'],$area_service_subcatid)==1){?> checked="checked" <?php }?>  />
                                  <strong><?=$subServices['cat_name']?></strong></label>
                            </fieldset>
                        <?php } ?>
                        
                        <div class="clear"></div>

                        <?php foreach($servicesExpertSubcat['subServices'] as $k=>$val){?>
                         <div class="clear"></div>                    
                        <div id="<?="detailAdd".$val['cat_id']?>"  
						<?php if(in_array($val['cat_id'],$area_service_subcatid)==0){?> style="display:none;" <?php }?> >
                        
                        <fieldset>
                        <span style="color:#000;font-weight:bold;padding-left:12px;">
                        	<?=$servicesExpertSubcat['cat_name']?>&nbsp;:: <?=$val['cat_name']?>
                        </span>
                        </fieldset>
                          <fieldset style="width:48%;float:left;">
                                <label><textarea style="width:90%;" name="<?="textAdd".$val['cat_id']?>" ><?=$advExpAreaServiceInfo[$val['cat_id']]['about_experience_info'];?></textarea></label></fieldset>
    
                            <div class="clear"></div>
                           <fieldset><span style="color:#000;font-weight:bold;padding-left:12px;">Which services are you willing to offer in College (Undergraduate) (pick at least 1)?</span></fieldset>              
                            
                            <div class="clear"></div>
                             <fieldset style="width:48%; float:left; margin-right:3%;">
                              <label><input type="checkbox" id="PYtxt" class="PYtxt" data-ck="<?=$val['cat_id']?>" name="<?="checkPY".$val['cat_id']?>" 
                                 <?php if($advExpAreaServiceInfo[$val['cat_id']]['one']=="on"){?> checked="checked" <?php }?> >                          
                              <strong>Positioning Yourself</strong>
                            </label>
                            </fieldset>
                            
                            <fieldset style="width:45%; float:right; margin-right:3%;">
                             <textarea  name="<?="textPY".$val['cat_id']?>" id="<?="textPY".$val['cat_id']?>"  <?php if($advExpAreaServiceInfo[$val['cat_id']]['one']!="on"){?> style="display:none;" <?php }?> ><?=$advExpAreaServiceInfo[$val['cat_id']]['one_txt']?></textarea> </fieldset>
                             
                            <div class="clear"></div>
                            <fieldset style="width:48%; float:left; margin-right:3%;">
                              <label><input type="checkbox" id="CMtxt" class="CMtxt" data-ck="<?=$val['cat_id']?>" name="<?="checkCM".$val['cat_id']?>" 
                                 <?php if($advExpAreaServiceInfo[$val['cat_id']]['two']=="on"){?> checked="checked" <?php }?> >                          <strong>College Matching</strong>
                            </label>
                            </fieldset>
                          	<fieldset style="width:45%; float:right; margin-right:3%;">
                            <textarea name="<?="textCM".$val['cat_id']?>" id="<?="textCM".$val['cat_id']?>" <?php if($advExpAreaServiceInfo[$val['cat_id']]['two']!="on"){?> style="display:none;" <?php }?> ><?=$advExpAreaServiceInfo[$val['cat_id']]['two_txt']?></textarea>
                            </textarea>
                            </fieldset>
                            <div class="clear"></div>
                            <fieldset style="width:48%; float:left; margin-right:3%;">
                              <label><input type="checkbox" id="APtxt" class="APtxt" data-ck="<?=$val['cat_id']?>" name="<?="checkAP".$val['cat_id']?>" 
                                 <?php if($advExpAreaServiceInfo[$val['cat_id']]['three']=="on"){?> checked="checked" <?php }?> >
                             <strong>Applications</strong>
                            
                             </label>
                            </fieldset>
                            <fieldset style="width:45%; float:right; margin-right:3%;">
                            <textarea name="<?="textAP".$val['cat_id']?>" id="<?="textAP".$val['cat_id']?>"  <?php if($advExpAreaServiceInfo[$val['cat_id']]['three']!="on"){?> style="display:none;" <?php }?> ><?=$advExpAreaServiceInfo[$val['cat_id']]['three_txt']?></textarea>
                            </textarea>
                            </fieldset>
                            
    
                            <div class="clear"></div>
                             <fieldset style="width:48%; float:left; margin-right:3%;">
                              <label><input type="checkbox" id="IPtxt" class="IPtxt" data-ck="<?=$val['cat_id']?>" name="<?="checkIP".$val['cat_id']?>" 
                                 <?php if($advExpAreaServiceInfo[$val['cat_id']]['four']=="on"){?> checked="checked" <?php }?> >                          <strong>Interview Prep</strong>
                            
                             </label>
                            </fieldset>
                            <fieldset style="width:45%; float:right; margin-right:3%;">
                            <textarea  name="<?="textIP".$val['cat_id']?>" id="<?="textIP".$val['cat_id']?>"  <?php if($advExpAreaServiceInfo[$val['cat_id']]['four']!="on"){?> style="display:none;" <?php }?> ><?=$advExpAreaServiceInfo[$val['cat_id']]['four_txt']?></textarea>
                            </textarea>
                            </fieldset>
                            
                            <div class="clear"></div>
                             <fieldset style="width:48%; float:left; margin-right:3%;">
                              <label><input type="checkbox" id="PCtxt"  class="PCtxt" data-ck="<?=$val['cat_id']?>" name="<?="checkPC".$val['cat_id']?>"
                                 <?php if($advExpAreaServiceInfo[$val['cat_id']]['five']=="on"){?> checked="checked" <?php }?> >                          
                              <strong>Paying for College</strong>
                            
                             </label>
                            </fieldset>
                            <fieldset style="width:45%; float:right; margin-right:3%;">
                            <textarea name="<?="textPC".$val['cat_id']?>" id="<?="textPC".$val['cat_id']?>" <?php if($advExpAreaServiceInfo[$val['cat_id']]['five']!="on"){?> style="display:none;" <?php }?> ><?=$advExpAreaServiceInfo[$val['cat_id']]['five_txt']?></textarea>
                            </fieldset>
    
                      </div>
                      <?php }?>
                      </div>
                </fieldset>
                <?php }#End::Foreach.?>
               <!--{*--/End::Admission/--*}-->
				
                <div class="clear"></div>
                        
				</div>
				<div class="clear"></div>
			<footer>
				<div class="submit_link">
					<input type="submit" name="btnAdvExprSubmit" id="btnAdvExprSubmit" value="Save" class="alt_btn">
					<input type="button" name="btnCancel" id="btnCancel" value="Cancel" class="btn_cancel">
				</div>
			</footer>
		</article><!-- end of post new article -->
		</form>
		<div class="spacer"></div>
	</section>
 
<div id="javascript">
<script type="text/javascript">
// JavaScript Document
$(document).ready(function() {
	$(".PYtxt").click(function() {
		if($(this).is(':checked')){
			$("#textPY"+$(this).attr("data-ck")).show();
		}
		else{
			$("#textPY"+$(this).attr("data-ck")).hide();
		}
	});
	$(".CMtxt").click(function() {
		if($(this).is(':checked')){
			$("#textCM"+$(this).attr("data-ck")).show();
		}
		else{
			$("#textCM"+$(this).attr("data-ck")).hide();
		}		
	});
	$(".APtxt").click(function() {
		if($(this).is(':checked')){
			$("#textAP"+$(this).attr("data-ck")).show();
		}
		else{
			$("#textAP"+$(this).attr("data-ck")).hide();
		}		
	});
	$(".IPtxt").click(function() {
		if($(this).is(':checked')){
			$("#textIP"+$(this).attr("data-ck")).show();
		}
		else{
			$("#textIP"+$(this).attr("data-ck")).hide();
		}		
	});
	$(".PCtxt").click(function() {
		if($(this).is(':checked')){
			$("#textPC"+$(this).attr("data-ck")).show();
		}
		else{
			$("#textPC"+$(this).attr("data-ck")).hide();
		}		
	});
	
	$(".checkAdd").click(function() {
		if($(this).is(':checked')){
			$("#detailAdd"+$(this).attr("value")).show();
		}
		else{
			$("#detailAdd"+$(this).attr("value")).hide();
		}
	});
	
});


function showSubServiceArea(divId){
	if($('#expertArea'+divId).is(':checked')){
		$('#divId'+divId).show();
	}
	else{
		$('#divId'+divId).hide();
	}
}
</script>

</div>    
</body>
</html>
