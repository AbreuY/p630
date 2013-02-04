<?php
#RequiresFiles:
	require_once('../../pi_classes/commonSetting.php');
	require_once('../../pi_classes/Admin.php');
#Redirect:
	chkAdminLogin();
#Objects:
	$objAdmin = new Admin();

#Action:
	#GetAdvisorEducation:
	$objAdvEdut = clone $objAdmin;
	#prameter:
	$setColoumFields = "*";
	$tableName 		 = "advisor_education";
 	$whereField 	 = "`advisor_id` = '".base64_decode($_GET['advisorId'])."' ";
	$objAdvEdut->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
	$numOfAdvEdut 	 = $objAdvEdut->numofrows();

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
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/jquery.livequery.js"></script>
<script src="<?php echo AbstractDB::SITE_PATH;?>administrator/js/password_strength_plugin.js"  language="javascript" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.core.js"></script> 
<script type="text/javascript" src="<?php echo AbstractDB::SITE_PATH;?>calender/js/ui.datepicker.js"></script>	
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.all.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.theme.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.core.css" rel="stylesheet" /> 
<link type="text/css" href="<?php echo AbstractDB::SITE_PATH;?>calender/base/ui.datepicker.css" rel="stylesheet" /> 
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
		<form name="frmEditAdvisorInfo" id="frmEditAdvisorInfo" method="post" action="edit_advisor_action.php" >
		<input type="hidden" name="advisor_id" id="advisor_id" value="<?php echo base64_decode($_REQUEST['advisorId']);?>" />
		<article class="module width_full">
			<?php 
				$pageName = "educationInfo";
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
                        <span style="color:#FF0000;font-weight:bold;padding-left:12px;">* indicate mandatory field(s)</span>
                    </fieldset>
					<div class="AddEducation">
                     <?php 
					 $lp = "1"; 
					 while($advEdutRow = $objAdvEdut->getAllRow()){ ?>  
					 <?php if($lp>=2){?>
                     <div class="Edu1 dynamicMod"><fieldset><a href="#" title="Remove" class="removeMod">Remove</a>
					 <?php }else{?>
                     <div class="Edu1">
                     <?php }?>
                    <fieldset>
                        <fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>School<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="schoolName[]" id="schoolName" value="<?=$advEdutRow['school'];?>" style="width:92%;"/>
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Degree<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="degreeName[]" id="degreeName" value="<?=$advEdutRow['degree'];?>" style="width:92%;" />
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right:3%;">
						<label>Concentration<sup style="color:#FF0000;font-weight:bold;"></sup></label>
							<input type="text" name="concentrationField[]" id="concentrationField" value="<?=$advEdutRow['concentration'];?>" 
                            style="width:92%;" />
						</fieldset>
                        <fieldset style="width:48%; float:left; ">
						<label>Graduation year<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
                            <input type="text" name="graduationYear[]" id="graduationYear" value="<?=$advEdutRow['graduation_year'];?>" />
						</fieldset><div class="clear"></div>
                        <!--<fieldset style="width:48%; float:left;">
						<label>Offer free help as an alum of this school?<sup style="color:#FF0000;font-weight:bold;"></sup></label>
                            <table class="languages">
									<tr bgcolor="#000033">                                	
                                        <th bgcolor="#F6F6F6"><label>&nbsp;</label></th>
                                        <th><label>Free calls</label></th>
                                        <th><label>Free emails</label></th>
                                    </tr>  
                                    <tr>
                                        <td><b>To current students (Not available yet)</b></td>
                                        <td>
                                            <label>
                                            <input name="crntStudntFreeCall[]" id="crntStudntFreeCall" type="checkbox" 
                                            value="1" <? if($advEdutRow['current_students_free_call']==1){?> checked="checked" <? }?> >
                                            </label>
                                        </td>
                                        <td>
                                        	<label>
                                            <input name="crntStudntFreeEmail[]" id="crntStudntFreeEmail" type="checkbox" 
                                            value="1" <? if($advEdutRow['current_students_free_email']==1){?> checked="checked" <? }?> >
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>To alumni (Not available yet)</b></td>
                                        <td>
                                        	<label>
                                            <input name="toAlumniFreeCall[]" id="toAlumniFreeCall" type="checkbox" 
                                            value="1" <? if($advEdutRow['to_alumni_free_call']==1){?> checked="checked" <? }?> >
                                            </label>
                                        </td>
                                        <td>
                                        	<label>
                                            <input name="toAlumniFreeEmail[]" id="toAlumniFreeEmail" type="checkbox" 
                                            value="1" <? if($advEdutRow['to_alumni_free_email']==1){?> checked="checked" <? }?> >
                                            </label>
                                        </td>
                                    </tr>
                        	</table>
						</fieldset>-->
                     </fieldset>   
                     <?php if($lp==2){?>
	                 </div>                    
					 <?php }else{?>
                     </fieldset></div>
                     <?php }?>
                   <div class="clear"></div>                   
                   <? $lp++;}#whileEnd.?>     
					<input type="button" name="bttnAddEdut" id="bttnAddEdut" value="Add Degree" />
				</div>  
                </div>
				<div class="clear"></div>
			<footer>
				<div class="submit_link">
					<input type="submit" name="btnAdvEdutSubmit" id="btnAdvEdutSubmit" value="Save" class="alt_btn">
					<input type="button" name="btnCancel" id="btnCancel" value="Cancel" class="btn_cancel">
				</div>
			</footer>
		</article><!-- end of post new article -->
		</form>
        <input type="text" name="numOfEducation" id="numOfEducation" value="<?=$numOfAdvEdut?>">
		<div class="spacer"></div>
	</section>
<!--/JS/-->  
<div id="javaScript">
<script type="text/javascript">
jQuery(document).ready(function() { 
	//Cancel Button Code:
	jQuery('#btnCancel').click(function(){
		location.href="manage_advisor.php";
	});
});
</script>
<!--/Start::AddEducation./-->
<script type="text/javascript">
	$('.removeMod').livequery('click',function(event){
        $(this).parent().remove();
		$("#numOfEducation").val(parseInt($("#numOfEducation").val())-1); 
        event.preventDefault();
		itemEmp--;
    });
	
    $('#bttnAddEdut').click(function(event){
		var itemEmp = document.getElementById("numOfEducation").value;
        //event.preventDefault();
        if(itemEmp<5){
			var itemEmp = document.getElementById("numOfEducation").value = parseInt($("#numOfEducation").val()) + 1;
            $varRootEdu = $(this).parent('.AddEducation');
            $eduBlock = $('.Edu1:first',$varRootEdu).html();
			//alert($eduBlock);
            itemEmp++;     
            //$eduBlock.replace('id','',true);
            $eduBlock =$eduBlock.replace(/id="schoolName"/gi, 'id="schoolName'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="degreeName"/gi, 'id="degreeName'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="concentrationField"/gi, 'id="concentrationField'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="graduationYear"/gi, 'id="graduationYear'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="crntStudntFreeCall"/gi, 'id="crntStudntFreeCall'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="crntStudntFreeEmail"/gi, 'id="crntStudntFreeEmail'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="toAlumniFreeCall"/gi, 'id="toAlumniFreeCall'+itemEmp+'"');
            $eduBlock =$eduBlock.replace(/id="toAlumniFreeEmail"/gi, 'id="toAlumniFreeEmail'+itemEmp+'"');
            $eduBlock= '<div class="Edu1 dynamicMod"><fieldset><a href="#" title="Remove" class="removeMod">Remove</a>'+ $eduBlock+'</fieldset></div>';
            $($eduBlock).insertBefore(this);
        }else{
            alert('You reached maximum!!!');
        }
    });  
</script>
<!--/End::AddExperians./-->
</div>    
</body>
</html>