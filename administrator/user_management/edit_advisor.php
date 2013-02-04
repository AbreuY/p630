<?php
#RequiresFiles:
	require_once('../../pi_classes/commonSetting.php');
	require_once('../../pi_classes/Admin.php');
#Redirect:
	if(empty($_SESSION['admin_id'])){
		header("location:".site_path."administrator/login.php");
	}

#Objects:
	$objAdmin = new Admin();
	
#Action::Get Advisor Info:
	$objAdvisorInfo = clone $objAdmin;
	$objAdvisorInfo->getAdvisorDtlById(base64_decode($_GET['advisorId']));
	$advisorInfo = $objAdvisorInfo->getAllRow();
	#@~::priceCalculate-For priceWebConsulte.
		#1.
		$adminPrice		= ($advisorInfo['priceWebConsulte']*$globalSettingArr['FIRST_CONSULTATIONS_COST']) / 100;
		$firstPriceWebConsulte	= number_format($advisorInfo['priceWebConsulte']-$adminPrice,2);
		$advisorInfo['firstPriceWebConsulte'] = $firstPriceWebConsulte;
		#2.
		$adminPriceRep = ($advisorInfo['priceWebConsulte']*$globalSettingArr['REPEAT_CONSULTATIONS_COST']) / 100;
		$repeatPriceWebConsulte = number_format($advisorInfo['priceWebConsulte']-$adminPriceRep,2);
		$advisorInfo['repeatPriceWebConsulte'] = $repeatPriceWebConsulte;
	#@~::priceCalculate-For priceEmailConsulte.
		#1.
		$adminPrice		= ($advisorInfo['priceEmailConsulte']*$globalSettingArr['FIRST_CONSULTATIONS_COST']) / 100;
		$firstPriceWebcamEmailConsulte	= number_format($advisorInfo['priceEmailConsulte']-$adminPrice,2);
		$advisorInfo['firstPriceWebcamEmailConsulte'] = $firstPriceWebcamEmailConsulte;
		#2.
		$adminPriceRep = ($advisorInfo['priceEmailConsulte']*$globalSettingArr['REPEAT_CONSULTATIONS_COST']) / 100;
		$repeatPriceWebcamEmailConsulte = number_format($advisorInfo['priceEmailConsulte']-$adminPriceRep,2);
		$advisorInfo['repeatPriceWebcamEmailConsulte'] = $repeatPriceWebcamEmailConsulte;	

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
			
		<form name="frmEditAdvisorInfo" id="frmEditAdvisorInfo" method="post" action="edit_advisor_action.php" enctype="multipart/form-data">
		<input type="hidden" name="advisor_id" id="advisor_id" value="<?php echo base64_decode($_REQUEST['advisorId']);?>" />
		<article class="module width_full">
			<?php 
				$pageName = "personalInfo";
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
						
                        <fieldset style="width:48%; float:left;margin-right: 3%;">
							<label>Change Photo<sup style="color:#FF0000;font-weight:bold;"></sup></label>
                        	<span style=" padding:5px;">
							<?php if(!empty($advisorInfo['image_path'])){?>
                            <img src="<?=site_path?>front_media/images/advisor_images/180X180px/<?=$advisorInfo['image_path'];?>"/>
                            <input type="hidden" name="old_image_path" id="old_image_path" value="<?=$advisorInfo['image_path'];?>" />
                            <input type="hidden" name="old_video_path" id="old_video_path" value="<?=$advisorInfo['video_path'];?>" />
                            <?php }else{?>
                            <img src="<?=site_path?>front_media/images/advisor_images/user-blank-image.png"  
                            width="180" height="180"/>
                            <?php }?>
                            </span>
                            <input type="file" name="profilePhoto" id="profilePhoto"  />
						</fieldset>
                        <fieldset style="width:48%; float:left;">
  							<label>Change Video<sup style="color:#FF0000;font-weight:bold;"></sup></label>
							<span style=" padding:5px;">
                            <?php ?>
                           <object width="425" height="344"><param name="movie" value="http://www.youtube.com/v/opVb89Cmrtkamp;hl=enamp;fs=1">
                              </param><param name="allowFullScreen" value="true">
                              </param><param name="allowscriptaccess" value="always"></param>
                              <embed src="http://www.youtube.com/v/opVb89Cmrtk&hl=en&fs=1" type="application/x-shockwave-flash" 
                              allowscriptaccess="always" allowfullscreen="true" width="190" height="180">
                              </embed>
                            </object>
		                    <?php ?>
                            <img src="<?=site_path?>front_media/videos/advisor_videos/video_blank_image.jpg"
                             width="190" height="180"/></span>
		                    <?php ?>
                            <input type="file" name="profileIntoVideo" id="profileIntoVideo"  />
						</fieldset>
						<div class="clear"></div>
                        
                        <fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>First name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="firstName" id="firstName" value="<?=$advisorInfo['first_name'];?>" style="width:92%;"/>
						</fieldset>
						
						
						<fieldset style="width:48%; float:left;">
							<label>Last name<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="lastName" id="lastName" value="<?=$advisorInfo['last_name'];?>" style="width:92%;" />
						</fieldset>
						
						<fieldset style="width:48%; float:left; margin-right:3%;">
						<label>Email<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
							<input type="text" name="email" id="email" value="<?=$advisorInfo['email'];?>" style="width:92%;" />
                            <input type="hidden" name="old_email" id="old_email" value="<?=$advisorInfo['email'];?>" style="width:92%;" />
						</fieldset>
						
                        <fieldset style="width:48%; float:left; ">
						<label>Phone number</label>
							<?php
								#clone:
								$objCountry = clone $objAdmin;	
                            	$objCountry->getAllCountry();
							?>
                            <select name="phoneCode" id="phoneCode" style="width:52%;">
                            	<?php while($fieldsCountry = $objCountry->getAllRow()){?>
                                <option value="<?= $fieldsCountry['id'];?>" <? if($advisorInfo['phone_code']==$fieldsCountry['id']){?>
                                 selected="selected" <? }?>>
								<?= $fieldsCountry['country_name']."&nbsp;(+".$fieldsCountry['phone'].")";?>
                                </option>
                                <?php }?>
                            </select>
                            <span style="float:right;width:35%;padding:0px 15px;">
                            <input type="text" name="phoneNumber" id="phoneNumber" value="<?=$advisorInfo['contact_no'];?>" style="" /></span>
						</fieldset><div class="clear"></div>
                        <?php
							#GetUserSelectlanguageIdArr:
							 #clone:
								$advSelLangArr = array();	
								$objAdvSelLang = clone $objAdmin;
								$objAdvSelLang->getAdvisorLangSelctInfo($advisorInfo['advisor_id']);
								$k = 0;
								while($advSelLang = $objAdvSelLang->getAllRow()){
									$advSelLangArr[$k] = $advSelLang['lang_id'];
									$k++;
								}

                        	#LaguageDetails:
								#clone:	
								$objLang = clone $objAdmin;
								$objLang->getLanguageDetails();
						?>
                        <fieldset style="width:48%; float:left;">
						<label>Languages<sup style="color:#FF0000;font-weight:bold;"></sup></label>
							<input type="text" name="searchSpeakingLanguage" id="searchSpeakingLanguage" value="" style="width:52%;" />
                            <input id="addLanguage" value="Add Language" type="button" maxlength="30" autocomplete="off"><div class="clear"></div>
                            
                            <table>
                                <tbody>
    								<tr>
									<?php 
										$iter = 1;
										while($langInfo = $objLang->getAllRow()){ 
									?>                                
										 <?php if($langInfo['lang_id']=='17'||$langInfo['lang_id']=='54'||$langInfo['lang_id']=='22'
                                                   ||$langInfo['lang_id']=='25'||$langInfo['lang_id']=='30'||$langInfo['lang_id']=='16')
                                                {
                                          ?>
                                        <td>
                                                <input name="language[]" type="checkbox" value="<?=$langInfo['lang_id'];?>" class="language" 																																	
                                                 <? if(in_array($langInfo['lang_id'],$advSelLangArr)==1){?> checked="checked" <? }?>  />
												 <?=$langInfo['lang_name'];?>
                                        </td>  

										<?php if($iter%3==0){?>
                                        </tr>
                                        <?php }?>   

                                   <?php $iter++;}?>
                                   <?php }?>      
                                </tbody>
                        	</table>
							  <div id="showMoreLangByAdded">
									<?php
									$iter2 = 1;
                                    #GetAllSelectedLangInfo:
                                         #clone:
                                         $objAdvisorLang	= clone $objAdmin;
                                         $setColoumFields = "";	 $tableName = "";	 $whereField = "";
                                         $setColoumFields = "adv.*,lng.lang_name,lng.lang_id";
                                         $tableName 	  = "advisor_language AS adv INNER JOIN ".SUFFIX."language AS lng on adv.lang_id = lng.lang_id ";
                                         $whereField 	  = "adv.advisor_id='".base64_decode($_REQUEST['advisorId'])."' and adv.flag_more_lang = '1' ";
                                         $objAdvisorLang->GET_ANYRECORD_FROM_TABLE($setColoumFields,$tableName,$whereField);
                                         $foundNumRow = $objAdvisorLang->numofrows();
										 if($foundNumRow>0){
											 
                                    ?>
                                    <table>
    	                                <tbody>
	    									<tr>
												<?php while($langInfo = $objAdvisorLang->getAllRow()){?>  		
                                                
                                                  <td>
                                                   <input name="language[]" type="checkbox" checked="checked" value="<?=$langInfo['lang_id'].",1";?>" 
                                                   class="language">
                                                    <?=$langInfo['lang_name'];?>
                                                  </td> 
                                                  <?php if($iter2%3==0){?>
                                                    </tr>
                                                  <?php }?>   
                                                 
                                                  <?php $iter2++; }#endWhile.?>
                                                <?php }#endIf.?>
                                   </tbody>
                                   </table>                             
                               </div>  
						</fieldset>
                        <div class="clear"></div>
						
                        <fieldset style="width:48%; float:left; margin-right: 3%;">
                        <label>Availability<sup style="color:#FF0000;font-weight:bold;">*</sup></label>
                          <table>
                            <tbody>
                              <tr>
                                <td valign="top">&nbsp;</td>
                                <td>
                                      <table cellspacing="0" style="text-align: center">
                                        <tbody>
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td>M</td>
                                            <td>T</td>
                                            <td>W</td>
                                            <td>T</td>
                                            <td>F</td>
                                            <td>S</td>
                                            <td>S</td>
                                            <td>&nbsp;</td>
                                          </tr>
                                          <?php
										  #GetAdvisorAvailabilityTime:
												#clone:
												$objAdvAvailability	= clone $objAdmin;
												$objAdvAvailability->getAdvisorAvailability($advisorInfo['advisor_id']);
												$advAvailability = $objAdvAvailability->getAllRow();
												/*echo "<pre>";
												print_r($advAvailability);
												echo "</pre>";*/
												
												/*#clone:
												$objAdvAvablTim	= clone $objAdmin;
												$objAdvAvablTim->getAdvisorAvailabilityTime();
												while($advAvablTimArr = $objAdvAvablTim->getAllRow()){ */
										  ?>
                                           <?php $ii=1; while($userAvailabilityDtl = $objAdvAvailability->getAllRow()){?>
                                            <tr>
                                                <td><? echo str_replace('.',':',number_format($userAvailabilityDtl['time_id'],2));?></td>
                                                <td><input type="checkbox" <?php if($userAvailabilityDtl['monday']=='Yes'){?>checked="checked"<?php } ?>
                                                 value="Y" name="availability[<?php echo $ii;?>][0]" 
                                                 class="availableday0 availablehour<?=$userAvailabilityDtl['time_id']?>"></td>
                                                <td><input type="checkbox" <?php if($userAvailabilityDtl['tuesday']=='Yes'){?>checked="checked"<?php } ?>
                                                 value="Y" name="availability[<?php echo $ii;?>][1]" 
                                                  class="availableday1 availablehour<?=$userAvailabilityDtl['time_id']?>"></td>
                                                <td><input type="checkbox" <?php if($userAvailabilityDtl['wednesday']=='Yes'){?>checked="checked"<?php } ?>
                                                 value="Y" name="availability[<?php echo $ii;?>][2]" 
												 class="availableday2 availablehour<?=$userAvailabilityDtl['time_id']?>"></td>
                                                <td><input type="checkbox" <?php if($userAvailabilityDtl['thursday']=='Yes'){?>checked="checked"<?php } ?>
                                                 value="Y" name="availability[<?php echo $ii;?>][3]" 
												 class="availableday3 availablehour<?=$userAvailabilityDtl['time_id']?>"></td>
                                                <td><input type="checkbox" <?php if($userAvailabilityDtl['friday']=='Yes'){?>checked="checked"<?php } ?> 
                                                value="Y" name="availability[<?php echo $ii;?>][4]" 
												 class="availableday4 availablehour<?=$userAvailabilityDtl['time_id']?>"></td>
                                                <td><input type="checkbox" <?php if($userAvailabilityDtl['saturday']=='Yes'){?>checked="checked"<?php } ?> 
                                                value="Y" name="availability[<?php echo $ii;?>][5]" 
												 class="availableday5 availablehour<?=$userAvailabilityDtl['time_id']?>"></td>
                                                <td><input type="checkbox" <?php if($userAvailabilityDtl['sunday']=='Yes'){?>checked="checked"<?php } ?> 
                                                value="Y" name="availability[<?php echo $ii;?>][6]" 
												 class="availableday6 availablehour<?=$userAvailabilityDtl['time_id']?>"></td>
                                                 <td><a href="javascript:toggleavailableHour(<?=$userAvailabilityDtl['time_id']?>);">all</a></td>
                                            </tr>
                                            <?php $ii++; } ?>
                                          	
                                          <tr>
                                            <td>&nbsp;</td>
                                            <td><a href="javascript:toggleavailableDay(0)">all</a></td>
                                            <td><a href="javascript:toggleavailableDay(1)">all</a></td>
                                            <td><a href="javascript:toggleavailableDay(2)">all</a></td>
                                            <td><a href="javascript:toggleavailableDay(3)">all</a></td>
                                            <td><a href="javascript:toggleavailableDay(4)">all</a></td>
                                            <td><a href="javascript:toggleavailableDay(5)">all</a></td>
                                            <td><a href="javascript:toggleavailableDay(6)">all</a></td>
                                            <td>&nbsp;</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Comment on availability</label>
                            <textarea name="availability_comment" id="availability_comment" rows="5" cols="18" style="width: 93%;"><?=$advisorInfo['availability_comment'];?></textarea>
						</fieldset><div class="clear"></div>
                        
						<fieldset style="width:48%; float:left; margin-right:3%;">
							<label>Pricing & Payment</label>
						</fieldset><div class="clear"></div>
                        
                        <fieldset style="width:100%; float:left; margin-right:3%;">
						<label>Consultation Type & Rate<sup style="color:#FF0000;font-weight:bold;"></sup></label>
                            <table width="98%">
                            	<tr bgcolor="#000033">
                                    <th><label>Consultation Type</label>
                                    <th colspan="3"><label>Rate</label></td>
                                </tr>  
                                <tr>
                                    <td><label>Webcam consulting (in US $)</label></td>
									<td>
                                         <input type="text" id="yourListedPriceWebConsulte" name="yourListedPriceWebConsulte" 
                                         <?php if($advisorInfo['priceWebConsulte']!=''){?>value="<?php echo number_format($advisorInfo['priceWebConsulte'],2);?>"
                                         <?php }else{?>
	                                         value="00.00" >
                                         <?php }?>                                   
									</td>
									<td>
                                         <input type="text" id="firstPriceWebConsulte" name="firstPriceWebConsulte" readonly="readonly"
                                         <?php if($advisorInfo['firstPriceWebConsulte']!=''){?>value="<?=number_format($advisorInfo['firstPriceWebConsulte'],2);?>"
                                         <?php }else{?>
	                                         value="00.00" readonly="readonly" >
                                         <?php }?>    
									</td>
									<td>
                                         <input type="text" id="repeatPriceWebConsulte" name="repeatPriceWebConsulte" readonly="readonly"
                                         <?php if($advisorInfo['repeatPriceWebConsulte']!=''){?>value="<?=number_format($advisorInfo['repeatPriceWebConsulte'],2);?>"
                                         <?php }else{?>
	                                         value="00.00" readonly="readonly" >
                                         <?php }?>    
									</td>
                                </tr>
                                <tr>
                                    <td><label>Email consulting (in US $)</label></td>
                                   <td>
                                         <input type="text" id="yourListedPriceWebcamEmailConsulte" name="yourListedPriceWebcamEmailConsulte"
										<?php if($advisorInfo['priceEmailConsulte']!=''){?>value="<?=number_format($advisorInfo['priceEmailConsulte'],2);?>"
                                         <?php }else{?>
	                                         value="00.00" >
                                         <?php }?>                                          
                                   </td>
                                   <td>
                                         <input type="text" id="firstPriceWebcamEmailConsulte" name="firstPriceWebcamEmailConsulte" readonly="readonly"
										<?php if($advisorInfo['firstPriceWebcamEmailConsulte']!=''){?> 
                                        	 value="<?=number_format($advisorInfo['firstPriceWebcamEmailConsulte'],2);?>"
                                         <?php }else{?>
	                                         value="00.00" readonly="readonly" >
                                         <?php }?>                                          
                                   </td>
                                   <td>
                                         <input type="text" id="repeatPriceWebcamEmailConsulte" name="repeatPriceWebcamEmailConsulte" readonly="readonly"
										<?php if($advisorInfo['repeatPriceWebcamEmailConsulte']!=''){?> 
                                        	 value="<?=number_format($advisorInfo['repeatPriceWebcamEmailConsulte'],2);?>"
                                         <?php }else{?>
	                                         value="00.00" readonly="readonly" >
                                         <?php }?>                                          
                                   </td>
                                </tr>
                        	</table>
						</fieldset>
                      
                    
                    <div class="clear"></div>
                        <fieldset style="width:48%; float:left; margin-right:3%;">
						<label> Bank account details<sup style="color:#FF0000;font-weight:bold;"></sup></label>
                            <table >
                            	<tr bgcolor="#000033">
                                    <th style="width:50%;"><label>Bank Info.</label>
                                    <th style="width:50%;"><label>Details</label></td>
                                </tr>  
                                <tr>
                                    <td><label>Bank code</label></td>
                                    <td ><input name="bank_code" id="bank_code" type="text" value="<?=$advisorInfo['bank_code'];?>" ></td>
                                </tr>
                                <tr>
                                    <td><label>Branch code</label></td>
                                    <td ><input name="branch_code" id="branch_code" type="text" value="<?=$advisorInfo['branch_code'];?>"></td>
                                </tr>
                                <tr>
                                    <td><label>IBAN number</label></td>
                                    <td><input name="IBAN_code" id="IBAN_code" type="text" value="<?=$advisorInfo['IBAN_code'];?>">
                                    </td>                                
                                </tr>
                        	</table>
						</fieldset>
                        <div class="clear"></div>
                        
                        <?php 
							#Action-SelectSocialMediaInfo-by-AdvisorId:
							$objAdvisorSclInfo = clone $objAdmin;
							$objAdvisorSclInfo->getAdvisorSocialDtlById(base64_decode($_GET['advisorId']));
							$advisorSocialInfo = $objAdvisorSclInfo->getAllRow();
						?>
                        
						<fieldset style="width:100%; float:left;">
							<label>Socail media<sup style="color:#FF0000;font-weight:bold;"></sup></label>
                            <table width="100%">
                            	<tr bgcolor="#000033">
                                    <th style="width:20%;"><label>Site Info.</label>
                                    <th style="width:50%;"><label>Url Info.</label></td>
                                </tr>  
                                <tr>
                                    <td><label>Web site</label></td>
                                    <td ><input name="websitePageLink" id="websitePageLink" type="text" value="<?=$advisorSocialInfo['website'];?>" ></td>
                                </tr>
                                <tr>
                                    <td><label>Blog</label></td>
                                    <td ><input name="blogPageLink" id="blogPageLink" type="text" value="<?=$advisorSocialInfo['blog'];?>"></td>
                                </tr>
                                <tr>
                                    <td><label>Linkedin</label></td>
                                    <td><input name="linkedinPageLink" id="linkedinPageLink" type="text" value="<?=$advisorSocialInfo['linkedin'];?>">
                                    </td>                                
                                </tr>
                                <tr>
                                    <td><label>facebook</label></td>
                                    <td><input name="facebookPageLink" id="facebookPageLink" type="text" value="<?=$advisorSocialInfo['facebook'];?>">
                                    </td>                                
                                </tr>
                                <tr>
                                    <td><label>Twitter</label></td>
                                    <td><input name="twitterPageLink" id="twitterPageLink" type="text" value="<?=$advisorSocialInfo['twitter'];?>">
                                    </td>                                
                                </tr>
                        	</table>
						</fieldset>
                        <div class="clear"></div>

						
					
				</div>
				<div class="clear"></div>
			<footer>
				<div class="submit_link">
					<input type="submit" name="btnSubmit" id="btnSubmit" value="Save" class="alt_btn">
					<input type="button" name="btnCancel" id="btnCancel" value="Cancel" class="btn_cancel">
				</div>
			</footer>
		</article><!-- end of post new article -->
		</form>
		<div class="spacer"></div>
	</section>
    
<!--/JS/-->    
<div id="javaScript">
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
					  action:"chk_advisor_other_email",old_email:jQuery('#old_email').val()
					}
				}
			},	
			phoneNumber:{
				//required: true,
				number  : true
			}, 
			yourListedPriceWebConsulte:{
				number  : true
			}, 
			yourListedPriceWebcamEmailConsulte:{       
				number  : true
			}, 
			/*priceWebcamEmailConsulte:{
				number  : true
			},*/ 
			websitePageLink:{
				url: true
			},
			blogPageLink:{
				url: true
			},
			linkedinPageLink:{
				url: true
			},
			facebookPageLink:{
				url: true
			},
			twitterPageLink:{
				url: true
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
				//required:"Please specify phone number.",
				number: "Please specify digits."	
			},
			yourListedPriceWebConsulte:{
				number: "Please specify digits."	
			},
			yourListedPriceWebcamEmailConsulte:{
				number: "Please specify digits."	
			},
			/*priceWebcamEmailConsulte:{
				number: "Please specify digits."	
			},*/
			websitePageLink:{
				url: "Please enter a valid URL."
			},
			blogPageLink:{
				url: "Please enter a valid URL."
			},
			linkedinPageLink:{
				url: "Please enter a valid URL."
			},
			facebookPageLink:{
				url: "Please enter a valid URL."
			},
			twitterPageLink:{
				url: "Please enter a valid URL."
			} 
		}
	});
	
	//Cancel Button Code:
	jQuery('#btnCancel').click(function(){
		location.href="manage_advisor.php";
	});
	
	//AjaxPriceCalculation:
	$("#yourListedPriceWebConsulte").keyup(function(){
			calcPrice(this.value);
	});
	$("#yourListedPriceWebcamEmailConsulte").keyup(function(){
			calcPriceEmailConsulte(this.value);
	});
});
</script>
<!-- jQuery Autocomplete -->
<script type='text/javascript' src='<?=site_path;?>front_media/js/autocomplete/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="<?=site_path;?>front_media/js/autocomplete/jquery.autocomplete.css" />
<script type="text/javascript">
$(document).ready(function() {
	$("#searchSpeakingLanguage").autocomplete("../ajax/ajax_autocomplete_lang.php?advisorId="+$("#advisor_id").val(),{
			width: 235,
			matchContains: true,
			//mustMatch: true,
			//minChars: 0,
			//multiple: true,
			//highlight: false,
			//multipleSeparator: ",",
			selectFirst: false
		});	
});
<!-- End :: jQuery Autocomplete -->
//AddLanguage:
$('#addLanguage').click(function(){
	if($("#searchSpeakingLanguage").val()!=''){
		$.ajax({
			url: "../ajax/ajax_advisor_language.php",
			type: "post",
			data:"advisorId="+$("#advisor_id").val()+"&languageName="+$("#searchSpeakingLanguage").val()+"&action=add_advisor_language",
			success:function(msg){
				jQuery('#showMoreLangByAdded').html(msg);
			}
		});
	}
});
function toggleavailableDay(value){
	if($(".availableday"+value+":checked").size()==23){
		$(".availableday"+value).each(function(){
			this.checked = "";
		});
	} else {
		$(".availableday"+value).each(function(){
			this.checked = "checked";
		})
	}
}
function toggleavailableHour(value){
	if($(".availablehour"+value+":checked").size()==7){
		$(".availablehour"+value).each(function(){
			this.checked = "";
		});
	} else {
		$(".availablehour"+value).each(function(){
			this.checked = "checked";
		})
	}
}
function calcPrice(price){
	$.ajax({
	  url: "<?=site_path;?>ajax/get_price_ajax.php?priceWebConsulte="+price,
	  success: function(data){ console.clear();
		   var data = data.split('|8!8|');
		  $("#firstPriceWebConsulte").val(data[0]);
		  $("#repeatPriceWebConsulte").val(data[1]); 
		
	  }
	}); 
}
function calcPriceEmailConsulte(price){
	$.ajax({
	  url: "<?=site_path;?>ajax/get_price_ajax_email_consulte.php?priceEmailConsulte="+price,
	  success: function(data){console.clear();
		   var data = data.split('|8!8|');
		  $("#firstPriceWebcamEmailConsulte").val(data[0]);
		  $("#repeatPriceWebcamEmailConsulte").val(data[1]); 
		 
	  }
	}); 
}
</script>
</div>
</body>
</html> 